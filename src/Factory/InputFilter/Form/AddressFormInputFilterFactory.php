<?php

namespace Keet\Form\Examples\Factory\InputFilter\Form;

use Interop\Container\ContainerInterface;
use Keet\Form\Examples\InputFilter\Fieldset\AddressFieldsetInputFilter;
use Keet\Form\Examples\InputFilter\Form\AddressFormInputFilter;
use Keet\Form\Factory\AbstractDoctrineFormInputFilterFactory;

class AddressFormInputFilterFactory extends AbstractDoctrineFormInputFilterFactory
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return AddressFormInputFilter
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        parent::setupRequirements($container);

        /** @var AddressFieldsetInputFilter $addressFieldsetInputFilter */
        $addressFieldsetInputFilter = $this->getInputFilterManager()->get(AddressFieldsetInputFilter::class);

        return new AddressFormInputFilter(
            $this->getObjectManager(),
            $this->getTranslator(),
            $addressFieldsetInputFilter
        );
    }
}