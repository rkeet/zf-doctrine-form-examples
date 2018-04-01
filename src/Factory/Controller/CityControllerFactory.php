<?php

namespace Keet\Form\Examples\Factory\Controller;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use Keet\Form\Examples\Controller\CityController;
use Keet\Form\Examples\Entity\City;
use Keet\Form\Examples\Form\CityForm;
use Keet\Form\Form\GenericDoctrineDeleteForm;
use Zend\ServiceManager\Factory\FactoryInterface;

class CityControllerFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return CityController
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var ObjectManager $objectManager */
        $objectManager = $container->get(EntityManager::class);
        /** @var CityForm $cityForm */
        $cityForm = $container->get('FormElementManager')->build(CityForm::class, []);
        /** @var GenericDoctrineDeleteForm $deleteForm */
        $deleteForm = $container->get('FormElementManager')->build(
            GenericDoctrineDeleteForm::class,
            [
                'entity_name' => City::class,
                'unique_property' => 'id',
            ]);

        return new CityController(
            $objectManager,
            $cityForm,
            $deleteForm
        );
    }
}