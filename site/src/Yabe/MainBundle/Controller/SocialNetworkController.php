<?php

namespace Yabe\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Yabe\MainBundle\Entity\SocialNetwork;
use Yabe\MainBundle\Form\SocialNetworkType;

/**
 * SocialNetwork controller.
 *
 */
class SocialNetworkController extends Controller
{

    /**
     * Lists all SocialNetwork entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('YabeMainBundle:SocialNetwork')->findAll();

        return $this->render('YabeMainBundle:SocialNetwork:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new SocialNetwork entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new SocialNetwork();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('socialnetwork_show', array('id' => $entity->getId())));
        }

        return $this->render('YabeMainBundle:SocialNetwork:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a SocialNetwork entity.
    *
    * @param SocialNetwork $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(SocialNetwork $entity)
    {
        $form = $this->createForm(new SocialNetworkType(), $entity, array(
            'action' => $this->generateUrl('socialnetwork_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new SocialNetwork entity.
     *
     */
    public function newAction()
    {
        $entity = new SocialNetwork();
        $form   = $this->createCreateForm($entity);

        return $this->render('YabeMainBundle:SocialNetwork:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SocialNetwork entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('YabeMainBundle:SocialNetwork')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SocialNetwork entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('YabeMainBundle:SocialNetwork:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing SocialNetwork entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('YabeMainBundle:SocialNetwork')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SocialNetwork entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('YabeMainBundle:SocialNetwork:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a SocialNetwork entity.
    *
    * @param SocialNetwork $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(SocialNetwork $entity)
    {
        $form = $this->createForm(new SocialNetworkType(), $entity, array(
            'action' => $this->generateUrl('socialnetwork_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing SocialNetwork entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('YabeMainBundle:SocialNetwork')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SocialNetwork entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('socialnetwork_edit', array('id' => $id)));
        }

        return $this->render('YabeMainBundle:SocialNetwork:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a SocialNetwork entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('YabeMainBundle:SocialNetwork')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find SocialNetwork entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('socialnetwork'));
    }

    /**
     * Creates a form to delete a SocialNetwork entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('socialnetwork_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
