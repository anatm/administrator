<?php

namespace Dscorp\WarriorsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Dscorp\WarriorsBundle\Entity\mapa;
use Dscorp\WarriorsBundle\Form\mapaType;

/**
 * mapa controller.
 *
 */
class mapaController extends Controller
{

    /**
     * Lists all mapa entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DscorpWarriorsBundle:mapa')->findAll();

        return $this->render('DscorpWarriorsBundle:mapa:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new mapa entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new mapa();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('mapa_show', array('id' => $entity->getId())));
        }

        return $this->render('DscorpWarriorsBundle:mapa:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a mapa entity.
     *
     * @param mapa $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(mapa $entity)
    {
        $form = $this->createForm(new mapaType(), $entity, array(
            'action' => $this->generateUrl('mapa_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new mapa entity.
     *
     */
    public function newAction()
    {
        $entity = new mapa();
        $form   = $this->createCreateForm($entity);

        return $this->render('DscorpWarriorsBundle:mapa:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a mapa entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DscorpWarriorsBundle:mapa')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find mapa entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DscorpWarriorsBundle:mapa:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing mapa entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DscorpWarriorsBundle:mapa')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find mapa entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DscorpWarriorsBundle:mapa:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a mapa entity.
    *
    * @param mapa $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(mapa $entity)
    {
        $form = $this->createForm(new mapaType(), $entity, array(
            'action' => $this->generateUrl('mapa_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing mapa entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DscorpWarriorsBundle:mapa')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find mapa entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('mapa_edit', array('id' => $id)));
        }

        return $this->render('DscorpWarriorsBundle:mapa:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a mapa entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DscorpWarriorsBundle:mapa')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find mapa entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('mapa'));
    }

    /**
     * Creates a form to delete a mapa entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mapa_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
