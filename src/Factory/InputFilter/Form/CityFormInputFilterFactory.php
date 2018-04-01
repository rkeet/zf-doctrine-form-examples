<?php

namespace Keet\Form\Examples\Factory\InputFilter\Form;

use Interop\Container\ContainerInterface;
use Keet\Form\Examples\InputFilter\Fieldset\CityFieldsetInputFilter;
use Keet\Form\Examples\InputFilter\Form\CityFormInputFilter;
use Keet\Form\Factory\AbstractDoctrineFormInputFilterFactory;

class CityFormInputFilterFactory extends AbstractDoctrineFormInputFilterFactory
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return CityFormInputFilter
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        parent::setupRequirements($container);

        /** @var CityFieldsetInputFilter $cityFieldsetInputFilter */
        $cityFieldsetInputFilter = $this->getInputFilterManager()->get(CityFieldsetInputFilter::class);

        return new CityFormInputFilter(
            $this->getObjectManager(),
            $this->getTranslator(),
            $cityFieldsetInputFilter
        );
    }
}