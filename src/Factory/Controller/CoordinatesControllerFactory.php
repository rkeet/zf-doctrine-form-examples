<?php

namespace Keet\Form\Examples\Factory\Controller;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use Keet\Form\Examples\Controller\CoordinatesController;
use Keet\Form\Examples\Entity\Coordinates;
use Keet\Form\Examples\Form\CoordinatesForm;
use Keet\Form\Form\GenericDoctrineDeleteForm;
use Zend\ServiceManager\Factory\FactoryInterface;

class CoordinatesControllerFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return CoordinatesController
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var ObjectManager $objectManager */
        $objectManager = $container->get(EntityManager::class);
        /** @var CoordinatesForm $coordinatesForm */
        $coordinatesForm = $container->get('FormElementManager')->build(CoordinatesForm::class, []); // TODO pass options for form if any?
        /** @var GenericDoctrineDeleteForm $deleteForm */
        $deleteForm = $container->get('FormElementManager')->build(
            GenericDoctrineDeleteForm::class,
            [
                'entity_name' => Coordinates::class,
                'unique_property' => 'id',
            ]
        );

        return new CoordinatesController(
            $objectManager,
            $coordinatesForm,
            $deleteForm
        );
    }
}