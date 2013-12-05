<?php

namespace Yabe\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Yabe\MainBundle\Entity\ProductInteractions;
use Yabe\MainBundle\Form\ProductInteractionsType;

/**
 * ProductInteractions controller.
 *
 */
class ProductInteractionsController extends Controller
{

    /**
     * Lists all ProductInteractions entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('YabeMainBundle:ProductInteractions')->findAll();

        return $this->render('YabeMainBundle:ProductInteractions:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new ProductInteractions entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new ProductInteractions();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('productinteractions_show', array('id' => $entity->getId())));
        }

        return $this->render('YabeMainBundle:ProductInteractions:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a ProductInteractions entity.
    *
    * @param ProductInteractions $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(ProductInteractions $entity)
    {
        $form = $this->createForm(new ProductInteractionsType(), $entity, array(
            'action' => $this->generateUrl('productinteractions_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ProductInteractions entity.
     *
     */
    public function newAction()
    {
        $entity = new ProductInteractions();
        $form   = $this->createCreateForm($entity);

        return $this->render('YabeMainBundle:ProductInteractions:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ProductInteractions entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('YabeMainBundle:ProductInteractions')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProductInteractions entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('YabeMainBundle:ProductInteractions:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing ProductInteractions entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('YabeMainBundle:ProductInteractions')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProductInteractions entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('YabeMainBundle:ProductInteractions:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a ProductInteractions entity.
    *
    * @param ProductInteractions $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ProductInteractions $entity)
    {
        $form = $this->createForm(new ProductInteractionsType(), $entity, array(
            'action' => $this->generateUrl('productinteractions_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ProductInteractions entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('YabeMainBundle:ProductInteractions')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProductInteractions entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('productinteractions_edit', array('id' => $id)));
        }

        return $this->render('YabeMainBundle:ProductInteractions:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a ProductInteractions entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('YabeMainBundle:ProductInteractions')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ProductInteractions entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('productinteractions'));
    }

    /**
     * Creates a form to delete a ProductInteractions entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('productinteractions_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
