<?php

namespace Keet\Form\Examples\Controller;

use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator as OrmPaginator;
use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as OrmAdapter;
use Keet\Form\Examples\Entity\AbstractEntity;
use Keet\Form\Examples\Entity\City;
use Keet\Form\Form\AbstractForm;
use Keet\Form\Form\GenericDoctrineDeleteForm;
use Zend\Http\Request;
use Zend\Paginator\Paginator;

class CityController extends AbstractDoctrineController
{
    public function indexAction()
    {
        $page = $this->params()->fromQuery('page', 1);

        /** @var QueryBuilder $qb */
        $qb = $this->getObjectManager()->createQueryBuilder();
        $qb->select('cit')
            ->from(City::class, 'cit');

        $paginator = new Paginator(new OrmAdapter(new OrmPaginator($qb)));
        $paginator->setCurrentPageNumber($page);
        $paginator->setItemCountPerPage(25);

        return [
            'paginator' => $paginator,
            'queryParams' => $this->params()->fromQuery(),
        ];
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function viewAction()
    {
        $identifier = $this->params()->fromRoute('id', null);
        if (is_null($identifier)) {

            throw new \Exception('Did not receive id for ' . __CLASS__ . '#' . __FUNCTION__);
        }

        $entity = $this->getObjectManager()->getRepository(City::class)->findOneBy(['id' => $identifier]);
        if (!$entity instanceof AbstractEntity) {

            throw new \Exception('In ' . __CLASS__ . '#' . __FUNCTION__ . ' could not find entity with id: ' . $identifier);
        }

        return [
            'city' => $entity,
        ];
    }

    /**
     * @return array|mixed|\Zend\Http\Response
     * @throws \Exception
     */
    public function addAction()
    {
        /** @var AbstractForm $form */
        $form = $this->getObjectForm();

        /** @var Request $request */
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $entity = $form->getObject();

                $this->getObjectManager()->persist($entity);

                try {
                    $this->getObjectManager()->flush();
                } catch (\Exception $e) {

                    throw new \Exception('Could not save. Error was thrown, details: ', $e->getMessage());
                }

                return $this->redirectToRoute('cities/view', ['id' => $entity->getId()]);
            }
        }

        return [
            'form' => $form,
            'validationMessages' => $form->getMessages() ?: '',
        ];
    }

    /**
     * @return array|mixed|\Zend\Http\Response
     * @throws \Exception
     */
    public function editAction()
    {
        $identifier = $this->params()->fromRoute('id', null);
        if (is_null($identifier)) {

            throw new \Exception('Did not receive id for ' . __CLASS__ . '#' . __FUNCTION__);
        }

        $entity = $this->getObjectManager()->getRepository(City::class)->findOneBy(['id' => $identifier]);
        if (!$entity instanceof AbstractEntity) {

            throw new \Exception('In ' . __CLASS__ . '#' . __FUNCTION__ . ' could not find entity with id: ' . $identifier);
        }

        /** @var AbstractForm $form */
        $form = $this->getObjectForm();
        $form->bind($entity);

        /** @var Request $request */
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $entity = $form->getObject();

                $this->getObjectManager()->persist($entity);

                try {
                    $this->getObjectManager()->flush();
                } catch (\Exception $e) {

                    throw new \Exception('Could not edit. Error was thrown, details: ', $e->getMessage());
                }

                return $this->redirectToRoute('cities/view', ['id' => $entity->getId()]);
            }
        }

        return [
            'form' => $form,
            'validationMessages' => $form->getMessages() ?: '',
        ];
    }

    /**
     * @return array|mixed|\Zend\Http\Response
     * @throws \Exception
     */
    public function deleteAction()
    {
        $identifier = $this->params()->fromRoute('id', null);
        if (is_null($identifier)) {

            throw new \Exception('Did not receive id for ' . __CLASS__ . '#' . __FUNCTION__);
        }

        $entity = $this->getObjectManager()->getRepository(City::class)->findOneBy(['id' => $identifier]);
        if (!$entity instanceof AbstractEntity) {

            throw new \Exception('In ' . __CLASS__ . '#' . __FUNCTION__ . ' could not find entity with id: ' . $identifier);
        }

        /** @var GenericDoctrineDeleteForm $form */
        $form = $this->getObjectDeleteForm();
        $form->bind($entity);

        /** @var Request $request */
        $request = $this->getRequest();
        if ($request->isPost()) {

            $form->setData($request->getPost());

            if ($form->isValid()) {

                if ($form->get('delete')->getValue() === 'yes') {
                    try {
                        $this->getObjectManager()->remove($form->getObject());
                        $this->getObjectManager()->flush();
                    } catch (\Exception $e) {

                        throw new \Exception('Could not remove. Error was thrown, details: ', $e->getMessage());
                    }

                    return $this->redirectToRoute('city');
                }

                return $this->redirectToRoute('cities/view', ['id' => $entity->getId()]);
            }
        }

        return [
            'form' => $form,
            'validationMessages' => $form->getMessages() ?: '',
        ];
    }
}