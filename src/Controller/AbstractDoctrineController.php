<?php

namespace Keet\Form\Examples\Controller;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;
use Keet\Form\Form\AbstractDoctrineForm;
use Keet\Form\Form\GenericDoctrineDeleteForm;
use Zend\Mvc\Controller\AbstractActionController;

abstract class AbstractDoctrineController extends AbstractActionController
{
    /**
     * @var ObjectManager|EntityManager
     */
    protected $objectManager;

    /**
     * @var AbstractDoctrineForm
     */
    protected $objectForm;

    /**
     * @var GenericDoctrineDeleteForm
     */
    protected $objectDeleteForm;

    /**
     * AbstractDoctrineController constructor.
     * @param ObjectManager $objectManager
     * @param AbstractDoctrineForm $objectForm
     * @param GenericDoctrineDeleteForm $objectDeleteForm
     */
    public function __construct(
        ObjectManager $objectManager,
        AbstractDoctrineForm $objectForm,
        GenericDoctrineDeleteForm $objectDeleteForm
    ) {
        $this->setObjectManager($objectManager);
        $this->setObjectForm($objectForm);
        $this->setObjectDeleteForm($objectDeleteForm);
    }

    /**
     * Redirect to a route, or pass the url to the view for a javascript redirect
     *
     * @return mixed|\Zend\Http\Response
     */
    public function redirectToRoute ()
    {
        if ($this->getRequest()->isXmlHttpRequest()) {
            return [
                'redirect' => call_user_func_array([
                    $this->url(), 'fromRoute'
                ], func_get_args())
            ];
        }

        return call_user_func_array([
            $this->redirect(), 'toRoute'
        ], func_get_args());
    }

    /**
     * @return ObjectManager|EntityManager
     */
    public function getObjectManager(): ObjectManager
    {
        return $this->objectManager;
    }

    /**
     * @param ObjectManager|EntityManager $objectManager
     * @return AbstractDoctrineController
     */
    public function setObjectManager(ObjectManager $objectManager): AbstractActionController
    {
        $this->objectManager = $objectManager;
        return $this;
    }

    /**
     * @return AbstractDoctrineForm
     */
    public function getObjectForm(): AbstractDoctrineForm
    {
        return $this->objectForm;
    }

    /**
     * @param AbstractDoctrineForm $objectForm
     * @return AbstractDoctrineController
     */
    public function setObjectForm(AbstractDoctrineForm $objectForm): AbstractDoctrineController
    {
        $this->objectForm = $objectForm;
        return $this;
    }

    /**
     * @return GenericDoctrineDeleteForm
     */
    public function getObjectDeleteForm(): GenericDoctrineDeleteForm
    {
        return $this->objectDeleteForm;
    }

    /**
     * @param GenericDoctrineDeleteForm $objectDeleteForm
     * @return AbstractDoctrineController
     */
    public function setObjectDeleteForm(GenericDoctrineDeleteForm $objectDeleteForm): AbstractDoctrineController
    {
        $this->objectDeleteForm = $objectDeleteForm;
        return $this;
    }

}