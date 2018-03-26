<?php

namespace Keet\Form\Examples\Factory\Controller;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use Keet\Form\Examples\Controller\AddressController;
use Keet\Form\Examples\Form\AddressForm;
use Keet\Form\Form\GenericDoctrineDeleteForm;
use Zend\ServiceManager\Factory\FactoryInterface;

class AddressControllerFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return AddressController
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var ObjectManager $objectManager */
        $objectManager = $container->get(EntityManager::class);
        /** @var AddressForm $addressForm */
        $addressForm = $container->get('FormElementManager')->build(AddressForm::class, []); // TODO pass options for form if any?
        /** @var GenericDoctrineDeleteForm $deleteForm */
        $deleteForm = $container->get('FormElementManager')->build(GenericDoctrineDeleteForm::class, []); // TODO pass options for form if any?

        return new AddressController(
            $objectManager,
            $addressForm,
            $deleteForm
        );
    }
}