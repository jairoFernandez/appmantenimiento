<?php

namespace Tucompu\MantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tucompu\MantenimientoBundle\Entity\TipoEquipo;
use Tucompu\MantenimientoBundle\Form\TipoEquipoType;

/**
 * TipoEquipo controller.
 *
 */
class TipoEquipoController extends Controller
{

    /**
     * Lists all TipoEquipo entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MantenimientoBundle:TipoEquipo')->findAll();

        return $this->render('MantenimientoBundle:TipoEquipo:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new TipoEquipo entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new TipoEquipo();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipoequipo_show', array('id' => $entity->getId())));
        }

        return $this->render('MantenimientoBundle:TipoEquipo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a TipoEquipo entity.
     *
     * @param TipoEquipo $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(TipoEquipo $entity)
    {
        $form = $this->createForm(new TipoEquipoType(), $entity, array(
            'action' => $this->generateUrl('tipoequipo_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new TipoEquipo entity.
     *
     */
    public function newAction()
    {
        $entity = new TipoEquipo();
        $form   = $this->createCreateForm($entity);

        return $this->render('MantenimientoBundle:TipoEquipo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TipoEquipo entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MantenimientoBundle:TipoEquipo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoEquipo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('MantenimientoBundle:TipoEquipo:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TipoEquipo entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MantenimientoBundle:TipoEquipo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoEquipo entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('MantenimientoBundle:TipoEquipo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a TipoEquipo entity.
    *
    * @param TipoEquipo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TipoEquipo $entity)
    {
        $form = $this->createForm(new TipoEquipoType(), $entity, array(
            'action' => $this->generateUrl('tipoequipo_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TipoEquipo entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MantenimientoBundle:TipoEquipo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoEquipo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('tipoequipo_edit', array('id' => $id)));
        }

        return $this->render('MantenimientoBundle:TipoEquipo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a TipoEquipo entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MantenimientoBundle:TipoEquipo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TipoEquipo entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tipoequipo'));
    }

    /**
     * Creates a form to delete a TipoEquipo entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tipoequipo_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
