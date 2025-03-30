<?php

namespace Meteo\Controller;

use Meteo\Model\MeteoRepositoryInterface;
use Laminas\Mvc\Controller\AbstractActionController;
// Add the following import statement:
use Laminas\View\Model\ViewModel;
use Meteo\Form\MeteoForm;
use Meteo\Form\Meteo;

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
        #print_r($request->getPost('city'));

        if (!is_null($request->getPost('city'))) {
            $city = $request->getPost('city');
        } else {
            $user_ip = getenv('REMOTE_ADDR');
            $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
            $country = $geo["geoplugin_countryName"];
            $city = $geo["geoplugin_city"];
        }


        $form->setInputFilter($form->getInputFilter());
        $form->setData($request->getPost());

        if (!$form->isValid()) {
            echo "true";
        }
        if (!$request->isPost()) {
            return [
                'form' => $form,
                'meteo' => $this->MeteoRepository->findMeteo($city),
            ];
        }


        $id = $this->params()->fromRoute('meteo/city');
        echo $id;

        $meteo = new MeteoForm();
        $form->setInputFilter($meteo->getInputFilter());
        $form->setData($request->getPost());
        return [
            'form' => $form,
            'meteo' => $this->MeteoRepository->findMeteo($city),
        ];

        #  return new ViewModel([
        #      'form' => $this->form,
        #      'meteo' => $this->MeteoRepository->findMeteo($city),
        #  ]);
    }
}
