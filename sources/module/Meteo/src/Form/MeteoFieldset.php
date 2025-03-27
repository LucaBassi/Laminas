<?php

namespace Meteo\Form;

use Laminas\Form\Fieldset;

class MeteoFieldset extends Fieldset
{
    public function init()
    {

        $this->add([
            'type' => 'text',
            'name' => 'city',
            'options' => [
                'label' => 'Post Title',
            ],
        ]);
    }
}