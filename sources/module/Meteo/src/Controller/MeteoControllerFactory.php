<?php
namespace Meteo\Factory;

use Meteo\Controller\ListController;
use Meteo\Model\MeteoRepositoryInterface;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Meteo\Form\MeteoForm;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

class MeteoControllerFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param null|array $options
     * @return ListController
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $formManager = $container->get('FormElementManager');
        return new MeteoController(
                $container->get(MeteoRepositoryInterface::class),
                $formManager->get(MeteoForm::class)
                
        );
    }
}