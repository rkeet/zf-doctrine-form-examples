<?php

namespace Keet\Form\Examples\Factory\InputFilter\Fieldset;

use Interop\Container\ContainerInterface;
use Keet\Form\Examples\Entity\Address;
use Keet\Form\Examples\InputFilter\Fieldset\AddressFieldsetInputFilter;
use Keet\Form\Examples\InputFilter\Fieldset\CoordinatesFieldsetInputFilter;
use Keet\Form\Factory\AbstractDoctrineFieldsetInputFilterFactory;

class AddressFieldsetInputFilterFactory extends AbstractDoctrineFieldsetInputFilterFactory
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return AddressFieldsetInputFilter
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        parent::setupRequirements($container, Address::class);

        /** @var CoordinatesFieldsetInputFilter $coordinatesFieldsetInputFilter */
        $coordinatesFieldsetInputFilter = $this->getInputFilterManager()->get(CoordinatesFieldsetInputFilter::class);
        $coordinatesFieldsetInputFilter->setRequired(false);

        return new AddressFieldsetInputFilter(
            $this->getObjectManager(),
            $this->getTranslator(),
            $coordinatesFieldsetInputFilter
        );
    }
}