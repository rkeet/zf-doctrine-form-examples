<?php

namespace Keet\Form\Examples\Factory\Fieldset;

use Doctrine\ORM\EntityManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject;
use Interop\Container\ContainerInterface;
use Keet\Form\Examples\Entity\City;
use Keet\Form\Examples\Fieldset\AddressFieldset;
use Keet\Form\Examples\Fieldset\CityFieldset;
use Keet\Form\Factory\AbstractDoctrineFieldsetFactory;
use Zend\Form\FormElementManager\FormElementManagerV3Polyfill;

class CityFieldsetFactory extends AbstractDoctrineFieldsetFactory
{
    public function __construct()
    {
        parent::__construct(CityFieldset::class, 'city', City::class);
    }

    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return CityFieldset
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $this->setEntityManager($container->get(EntityManager::class));
        $this->setTranslator($container->get('translator'));

        /** @var FormElementManagerV3Polyfill $formManager */
        $formManager = $container->get('FormElementManager');
        /** @var AddressFieldset $addressFieldset */
        $addressFieldset = $formManager->get(AddressFieldset::class);
        $addressFieldset->remove('city'); // Already being populated with Entity being created in base_fieldset

        /** @var CityFieldset $fieldset */
        $fieldset = new CityFieldset($this->getEntityManager(), 'city', [], $addressFieldset);
        $fieldset->setHydrator(
            new DoctrineObject($this->getEntityManager())
        );
        $fieldset->setObject(new City());
        $fieldset->setTranslator($this->getTranslator());

        return $fieldset;
    }
}