<?php

namespace Dscorp\WarriorsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Dscorp\WarriorsBundle\Entity\menu;
use Dscorp\WarriorsBundle\Form\menuType;

/**
 * menu controller.
 *
 */
class menuController extends Controller
{

    /**
     * Lists all menu entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DscorpWarriorsBundle:menu')->findAll();

        return $this->render('DscorpWarriorsBundle:menu:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new menu entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new menu();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('menu_show', array('id' => $entity->getId())));
        }

        return $this->render('DscorpWarriorsBundle:menu:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a menu entity.
     *
     * @param menu $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(menu $entity)
    {
        $form = $this->createForm(new menuType(), $entity, array(
            'action' => $this->generateUrl('menu_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new menu entity.
     *
     */
    public function newAction()
    {
        $entity = new menu();
        $form   = $this->createCreateForm($entity);

        return $this->render('DscorpWarriorsBundle:menu:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a menu entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DscorpWarriorsBundle:menu')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find menu entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DscorpWarriorsBundle:menu:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing menu entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DscorpWarriorsBundle:menu')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find menu entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DscorpWarriorsBundle:menu:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a menu entity.
    *
    * @param menu $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(menu $entity)
    {
        $form = $this->createForm(new menuType(), $entity, array(
            'action' => $this->generateUrl('menu_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing menu entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DscorpWarriorsBundle:menu')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find menu entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('menu_edit', array('id' => $id)));
        }

        return $this->render('DscorpWarriorsBundle:menu:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a menu entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DscorpWarriorsBundle:menu')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find menu entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('menu'));
    }

    /**
     * Creates a form to delete a menu entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('menu_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
