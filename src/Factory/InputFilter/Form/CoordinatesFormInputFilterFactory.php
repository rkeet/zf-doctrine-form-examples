<?php

namespace Keet\Form\Examples\Factory\InputFilter\Form;

use Interop\Container\ContainerInterface;
use Keet\Form\Examples\InputFilter\Fieldset\CoordinatesFieldsetInputFilter;
use Keet\Form\Examples\InputFilter\Form\CoordinatesFormInputFilter;
use Keet\Form\Factory\AbstractDoctrineFormInputFilterFactory;

class CoordinatesFormInputFilterFactory extends AbstractDoctrineFormInputFilterFactory
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return CoordinatesFormInputFilter
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        parent::setupRequirements($container);

        /** @var CoordinatesFieldsetInputFilter $coordinatesFieldsetInputFilter */
        $coordinatesFieldsetInputFilter = $this->getInputFilterManager()->get(CoordinatesFieldsetInputFilter::class);

        return new CoordinatesFormInputFilter(
            $this->getObjectManager(),
            $this->getTranslator(),
            $coordinatesFieldsetInputFilter
        );
    }
}