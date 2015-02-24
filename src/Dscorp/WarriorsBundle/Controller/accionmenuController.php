<?php

namespace Dscorp\WarriorsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Dscorp\WarriorsBundle\Entity\accionmenu;
use Dscorp\WarriorsBundle\Form\accionmenuType;

/**
 * accionmenu controller.
 *
 */
class accionmenuController extends Controller
{

    /**
     * Lists all accionmenu entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DscorpWarriorsBundle:accionmenu')->findAll();

        return $this->render('DscorpWarriorsBundle:accionmenu:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new accionmenu entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new accionmenu();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('accionmenu_show', array('id' => $entity->getId())));
        }

        return $this->render('DscorpWarriorsBundle:accionmenu:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a accionmenu entity.
     *
     * @param accionmenu $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(accionmenu $entity)
    {
        $form = $this->createForm(new accionmenuType(), $entity, array(
            'action' => $this->generateUrl('accionmenu_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new accionmenu entity.
     *
     */
    public function newAction()
    {
        $entity = new accionmenu();
        $form   = $this->createCreateForm($entity);

        return $this->render('DscorpWarriorsBundle:accionmenu:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a accionmenu entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DscorpWarriorsBundle:accionmenu')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find accionmenu entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DscorpWarriorsBundle:accionmenu:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing accionmenu entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DscorpWarriorsBundle:accionmenu')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find accionmenu entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DscorpWarriorsBundle:accionmenu:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a accionmenu entity.
    *
    * @param accionmenu $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(accionmenu $entity)
    {
        $form = $this->createForm(new accionmenuType(), $entity, array(
            'action' => $this->generateUrl('accionmenu_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing accionmenu entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DscorpWarriorsBundle:accionmenu')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find accionmenu entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('accionmenu_edit', array('id' => $id)));
        }

        return $this->render('DscorpWarriorsBundle:accionmenu:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a accionmenu entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DscorpWarriorsBundle:accionmenu')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find accionmenu entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('accionmenu'));
    }

    /**
     * Creates a form to delete a accionmenu entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('accionmenu_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
