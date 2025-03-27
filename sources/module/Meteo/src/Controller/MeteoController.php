<?php

namespace Meteo\Controller;

use Meteo\Model\MeteoRepositoryInterface;
use Laminas\Mvc\Controller\AbstractActionController;
// Add the following import statement:
use Laminas\View\Model\ViewModel;
use Meteo\Form\MeteoForm;

class MeteoController extends AbstractActionController {

    /**
     * @var PostRepositoryInterface
     */
    private $MeteoRepository;
    private $form;
    public function __construct(MeteoRepositoryInterface $MeteoRepository ) {
        $this->MeteoRepository = $MeteoRepository;
                
    }

    // Add the following method:
    public function indexAction() {

        $user_ip = getenv('REMOTE_ADDR');
        $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
        $country = $geo["geoplugin_countryName"];
        $city = $geo["geoplugin_city"];

        
        return new ViewModel([
            'form' => $this->form,
            'meteo' => $this->MeteoRepository->findMeteo($city),
        ]);
    }

    public function cityAction() {
        $city = $this->params()->fromRoute('city');
        
        if(!isset($city)){
        $user_ip = getenv('REMOTE_ADDR');
        $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
        $country = $geo["geoplugin_countryName"];
        $city = $geo["geoplugin_city"];
            
        }
        return new ViewModel([
            'meteo' => $this->MeteoRepository->findMeteo($city),
        ]);
    }
}
