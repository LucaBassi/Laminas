<?php

namespace Meteo\Controller;

use Meteo\Model\MeteoRepositoryInterface;
use Laminas\Mvc\Controller\AbstractActionController;
// Add the following import statement:
use Meteo\Form\MeteoForm;

class MeteoController extends AbstractActionController {

    /**
     * @var PostRepositoryInterface
     */
    private $MeteoRepository;

    public function __construct(MeteoRepositoryInterface $MeteoRepository) {
        $this->MeteoRepository = $MeteoRepository;
    }

    // Add the following method:
    public function indexAction() {

        $form = new MeteoForm();
        $form->get('submit')->setValue('Chercher');

        $request = $this->getRequest();

        if (!is_null($request->getPost('city'))) {
            $city = $request->getPost('city');
        } else {
            $user_ip = getenv('REMOTE_ADDR');
            $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
            $country = $geo["geoplugin_countryName"];
            $city = $geo["geoplugin_city"];
        }

        return [
            'form' => $form,
            'meteo' => $this->MeteoRepository->findMeteo($city),
        ];

    }
}
