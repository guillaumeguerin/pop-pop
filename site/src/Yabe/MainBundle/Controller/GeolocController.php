<?php

namespace Yabe\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Yabe\MainBundle\Entity\Geoloc;
use Yabe\MainBundle\Form\GeolocType;

/**
 * Geoloc controller.
 *
 */
class GeolocController extends Controller
{

    /**
     * Lists all Geoloc entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('YabeMainBundle:Geoloc')->findAll();

        return $this->render('YabeMainBundle:Geoloc:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Geoloc entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Geoloc();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('geoloc_show', array('id' => $entity->getId())));
        }

        return $this->render('YabeMainBundle:Geoloc:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Geoloc entity.
    *
    * @param Geoloc $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Geoloc $entity)
    {
        $form = $this->createForm(new GeolocType(), $entity, array(
            'action' => $this->generateUrl('geoloc_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Geoloc entity.
     *
     */
    public function newAction()
    {
        $entity = new Geoloc();
        $form   = $this->createCreateForm($entity);

        return $this->render('YabeMainBundle:Geoloc:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Geoloc entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('YabeMainBundle:Geoloc')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Geoloc entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('YabeMainBundle:Geoloc:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Geoloc entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('YabeMainBundle:Geoloc')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Geoloc entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('YabeMainBundle:Geoloc:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Geoloc entity.
    *
    * @param Geoloc $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Geoloc $entity)
    {
        $form = $this->createForm(new GeolocType(), $entity, array(
            'action' => $this->generateUrl('geoloc_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Geoloc entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('YabeMainBundle:Geoloc')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Geoloc entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('geoloc_edit', array('id' => $id)));
        }

        return $this->render('YabeMainBundle:Geoloc:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Geoloc entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('YabeMainBundle:Geoloc')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Geoloc entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('geoloc'));
    }

    /**
     * Creates a form to delete a Geoloc entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('geoloc_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
