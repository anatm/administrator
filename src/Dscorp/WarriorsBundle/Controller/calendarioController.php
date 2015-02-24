<?php

namespace Dscorp\WarriorsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Dscorp\WarriorsBundle\Entity\calendario;
use Dscorp\WarriorsBundle\Form\calendarioType;

/**
 * calendario controller.
 *
 */
class calendarioController extends Controller
{

    /**
     * Lists all calendario entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DscorpWarriorsBundle:calendario')->findAll();

        return $this->render('DscorpWarriorsBundle:calendario:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new calendario entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new calendario();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('calendario_show', array('id' => $entity->getId())));
        }

        return $this->render('DscorpWarriorsBundle:calendario:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a calendario entity.
     *
     * @param calendario $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(calendario $entity)
    {
        $form = $this->createForm(new calendarioType(), $entity, array(
            'action' => $this->generateUrl('calendario_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new calendario entity.
     *
     */
    public function newAction()
    {
        $entity = new calendario();
        $form   = $this->createCreateForm($entity);

        return $this->render('DscorpWarriorsBundle:calendario:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a calendario entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DscorpWarriorsBundle:calendario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find calendario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DscorpWarriorsBundle:calendario:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing calendario entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DscorpWarriorsBundle:calendario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find calendario entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DscorpWarriorsBundle:calendario:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a calendario entity.
    *
    * @param calendario $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(calendario $entity)
    {
        $form = $this->createForm(new calendarioType(), $entity, array(
            'action' => $this->generateUrl('calendario_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing calendario entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DscorpWarriorsBundle:calendario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find calendario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('calendario_edit', array('id' => $id)));
        }

        return $this->render('DscorpWarriorsBundle:calendario:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a calendario entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DscorpWarriorsBundle:calendario')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find calendario entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('calendario'));
    }

    /**
     * Creates a form to delete a calendario entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('calendario_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
