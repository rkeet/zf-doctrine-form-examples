<?php

namespace Keet\Form\Examples\Factory\InputFilter\Fieldset;

use Interop\Container\ContainerInterface;
use Keet\Form\Examples\Entity\City;
use Keet\Form\Examples\InputFilter\Fieldset\AddressFieldsetInputFilter;
use Keet\Form\Examples\InputFilter\Fieldset\CityFieldsetInputFilter;
use Keet\Form\Examples\InputFilter\Fieldset\CoordinatesFieldsetInputFilter;
use Keet\Form\Factory\AbstractDoctrineFieldsetInputFilterFactory;
use Keet\Form\InputFilter\CollectionInputFilter;

class CityFieldsetInputFilterFactory extends AbstractDoctrineFieldsetInputFilterFactory
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return CityFieldsetInputFilter
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        parent::setupRequirements($container, City::class);

        /** @var AddressFieldsetInputFilter $addressFieldsetInputFilter */
        $addressFieldsetInputFilter = $this->getInputFilterManager()->get(AddressFieldsetInputFilter::class);
        $addressFieldsetInputFilter->setRequired(false);
        $addressFieldsetInputFilter->remove('city'); // Will be set with the City being created in base_fieldset

        /** @var CollectionInputFilter $addressFieldsetCollectionInputFilter */
        $addressFieldsetCollectionInputFilter = new CollectionInputFilter();
        $addressFieldsetCollectionInputFilter->setInputFilter($addressFieldsetInputFilter);
        $addressFieldsetCollectionInputFilter->setIsRequired(false);

        /** @var CoordinatesFieldsetInputFilter $coordinatesFieldsetInputFilter */
        $coordinatesFieldsetInputFilter = $this->getInputFilterManager()->get(CoordinatesFieldsetInputFilter::class);
        $coordinatesFieldsetInputFilter->setRequired(false);

        return new CityFieldsetInputFilter(
            $this->getObjectManager(),
            $this->getTranslator(),
            $addressFieldsetCollectionInputFilter,
            $coordinatesFieldsetInputFilter
        );
    }
}