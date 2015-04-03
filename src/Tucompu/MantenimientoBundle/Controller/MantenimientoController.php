<?php

namespace Tucompu\MantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tucompu\MantenimientoBundle\Entity\Mantenimiento;
use Tucompu\MantenimientoBundle\Form\MantenimientoType;

/**
 * Mantenimiento controller.
 *
 */
class MantenimientoController extends Controller
{

    /**
     * Lists all Mantenimiento entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MantenimientoBundle:Mantenimiento')->findAll();

        return $this->render('MantenimientoBundle:Mantenimiento:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Mantenimiento entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Mantenimiento();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('mantenimiento_show', array('id' => $entity->getId())));
        }

        return $this->render('MantenimientoBundle:Mantenimiento:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Mantenimiento entity.
     *
     * @param Mantenimiento $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Mantenimiento $entity)
    {
        $form = $this->createForm(new MantenimientoType(), $entity, array(
            'action' => $this->generateUrl('mantenimiento_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Mantenimiento entity.
     *
     */
    public function newAction()
    {
        $entity = new Mantenimiento();
        $form   = $this->createCreateForm($entity);

        return $this->render('MantenimientoBundle:Mantenimiento:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Mantenimiento entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MantenimientoBundle:Mantenimiento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Mantenimiento entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('MantenimientoBundle:Mantenimiento:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Mantenimiento entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MantenimientoBundle:Mantenimiento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Mantenimiento entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('MantenimientoBundle:Mantenimiento:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Mantenimiento entity.
    *
    * @param Mantenimiento $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Mantenimiento $entity)
    {
        $form = $this->createForm(new MantenimientoType(), $entity, array(
            'action' => $this->generateUrl('mantenimiento_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Mantenimiento entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MantenimientoBundle:Mantenimiento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Mantenimiento entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('mantenimiento_edit', array('id' => $id)));
        }

        return $this->render('MantenimientoBundle:Mantenimiento:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Mantenimiento entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MantenimientoBundle:Mantenimiento')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Mantenimiento entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('mantenimiento'));
    }

    /**
     * Creates a form to delete a Mantenimiento entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mantenimiento_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
