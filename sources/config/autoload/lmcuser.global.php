<?php

/**
 * LmcUser Configuration
 *
 * If you have a ./config/autoload/ directory set up for your project, you can
 * drop this config file in it and change the values as you wish.
 */

$settings = [
    /**
     * Laminas\Db\Adapter\Adapter DI Alias
     *
     * Please specify the DI alias for the configured Laminas\Db\Adapter\Adapter
     * instance that LmcUser should use.
     */
    //'laminas_db_adapter' => \Laminas\Db\Adapter\Adapter::class,

    /**
     * User Model Entity Class
     *
     * Name of Entity class to use. Useful for using your own entity class
     * instead of the default one provided. Default is LmcUser\Entity\User.
     * The entity class should implement LmcUser\Entity\UserInterface
     */
    'user_entity_class' => \User\Entity\User::class,
    /**
     * Enable registration
     *
     * Allows users to register through the website.
     *
     * Accepted values: boolean true or false
     */
    //'enable_registration' => true,

    /**
     * Enable Username
     *
     * Enables username field on the registration form, and allows users to log
     * in using their username OR email address. Default is false.
     *
     * Accepted values: boolean true or false
     */
    //'enable_username' => false,

    /**
     * Authentication Adapters
     *
     * Specify the adapters that will be used to try and authenticate the user
     *
     * Default value: array containing 'LmcUser\Authentication\Adapter\Db' with priority 100
     * Accepted values: array containing services that implement 'LmcUser\Authentication\Adapter\ChainableAdapter'
     */
    //'auth_adapters' => [100 => '\LmcUser\Authentication\Adapter\Db'],

    /**
     * Enable Display Name
     *
     * Enables a display name field on the registration form, which is persisted
     * in the database. Default value is false.
     *
     * Accepted values: boolean true or false
     */
    'enable_display_name' => true,

    /**
     * Modes for authentication identity match
     *
     * Specify the allowable identity modes, in the order they should be
     * checked by the Authentication plugin.
     *
     * Default value: array containing 'email'
     * Accepted values: array containing one or more of: email, username
     */
    //'auth_identity_fields' => ['email'],

    /**
     * Login form timeout
     *
     * Specify the timeout for the CSRF security field of the login form
     * in seconds. Default value is 300 seconds.
     *
     * Accepted values: positive int value
     */
    //'login_form_timeout' => 300,

    /**
     * Registration form timeout
     *
     * Specify the timeout for the CSRF security field of the registration form
     * in seconds. Default value is 300 seconds.
     *
     * Accepted values: positive int value
     */
    //'user_form_timeout' => 300,

    /**
     * Login After Registration
     *
     * Automatically logs the user in after they successfully register. Default
     * value is false.
     *
     * Accepted values: boolean true or false
     */
    //'login_after_registration' => true,

    /**
     * Registration Form Captcha
     *
     * Determines if a captcha should be utilized on the user registration form.
     * Default value is false.
     */
    //'use_registration_form_captcha' => false,

    /**
     * Login Form Captcha
     *
     * Determines if a captcha should be utilized on the user login form.
     * Default value is false.
     */
    //'use_login_form_captcha' => false,

	/**
     * Login Form CSRF
     *
     * Determines if a csrf should be utilized on the user login form.
     * Default value is true.
     */
    //'use_login_form_csrf' => true,

    /**
     * Form Captcha Options
     *
     * Currently used for the registration form, but re-usable anywhere. Use
     * this to configure which Laminas\Captcha adapter to use, and the options to
     * pass to it. The default uses the Figlet captcha.
     */
    /*'form_captcha_options' => [
        'class'   => 'figlet',
        'options' =>[
            'wordLen'    => 5,
            'expiration' => 300,
            'timeout'    => 300,
        ],
    ],*/

    /**
     * Use Redirect Parameter If Present
     *
     * Upon successful authentication, check for a 'redirect' POST or GET parameter
     *
     * Accepted values: boolean true or false
     */
    //'use_redirect_parameter_if_present' => true,

    /**
     * Sets the view template for the user login widget
     *
     * Default value: 'lmc-user/user/login.phtml'
     * Accepted values: string path to a view script
     */
    //'user_login_widget_view_template' => 'lmc-user/user/login.phtml',

    /**
     * Login Redirect Route
     *
     * Upon successful login the user will be redirected to the entered route
     *
     * Default value: 'lmcuser'
     * Accepted values: A valid route name within your application
     *
     */
    'login_redirect_route' => 'album',

    /**
     * Logout Redirect Route
     *
     * Upon logging out the user will be redirected to the entered route
     *
     * Default value: 'lmcuser/login'
     * Accepted values: A valid route name within your application
     */
    'logout_redirect_route' => 'home',

    /**
     * Password Security
     *
     * DO NOT CHANGE THE PASSWORD HASH SETTINGS FROM THEIR DEFAULTS
     * Unless A) you have done sufficient research and fully understand exactly
     * what you are changing, AND B) you have a very specific reason to deviate
     * from the default settings and know what you're doing.
     *
     * The password hash settings may be changed at any time without
     * invalidating existing user accounts. Existing user passwords will be
     * re-hashed automatically on their next successful login.
     */

    /**
     * Password Cost
     *
     * The number represents the base-2 logarithm of the iteration count used for
     * hashing. Default is 14 (about 10 hashes per second on an i5).
     *
     * Accepted values: integer between 4 and 31
     */
    //'password_cost' => 14,

    /**
     * Enable user state usage
     *
     * Should user's state be used in the registration/login process?
     */
    //'enable_user_state' => false,

    /**
     * Default user state upon registration
     *
     * What state user should have upon registration?
     * Allowed value type: integer
     */
    //'default_user_state' => 1,

    /**
     * States which are allowing user to login
     *
     * When user tries to login, is his/her state one of the following?
     * Include null if you want user's with no state to login as well.
     * Allowed value types: null and integer
     */
    //'allowed_login_states' => [null, 1],

    /**
     * User table name
     */
    //'table_name' => 'user',

    /**
     * End of LmcUser configuration
     */
];

/**
 * You do not need to edit below this line
 */
return [
    'lmcuser' => $settings,
    'service_manager' => [
        'aliases' => [
            'lmcuser_laminas_db_adapter' => (isset($settings['laminas_db_adapter'])) ?
                $settings['laminas_db_adapter'] : \Laminas\Db\Adapter\Adapter::class,
        ],
    ],
];
