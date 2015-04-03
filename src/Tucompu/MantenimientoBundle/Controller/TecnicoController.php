<?php

namespace Tucompu\MantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tucompu\MantenimientoBundle\Entity\Tecnico;
use Tucompu\MantenimientoBundle\Form\TecnicoType;

/**
 * Tecnico controller.
 *
 */
class TecnicoController extends Controller
{

    /**
     * Lists all Tecnico entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MantenimientoBundle:Tecnico')->findAll();

        return $this->render('MantenimientoBundle:Tecnico:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Tecnico entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Tecnico();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tecnico_show', array('id' => $entity->getId())));
        }

        return $this->render('MantenimientoBundle:Tecnico:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Tecnico entity.
     *
     * @param Tecnico $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Tecnico $entity)
    {
        $form = $this->createForm(new TecnicoType(), $entity, array(
            'action' => $this->generateUrl('tecnico_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Tecnico entity.
     *
     */
    public function newAction()
    {
        $entity = new Tecnico();
        $form   = $this->createCreateForm($entity);

        return $this->render('MantenimientoBundle:Tecnico:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tecnico entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MantenimientoBundle:Tecnico')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tecnico entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('MantenimientoBundle:Tecnico:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Tecnico entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MantenimientoBundle:Tecnico')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tecnico entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('MantenimientoBundle:Tecnico:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Tecnico entity.
    *
    * @param Tecnico $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tecnico $entity)
    {
        $form = $this->createForm(new TecnicoType(), $entity, array(
            'action' => $this->generateUrl('tecnico_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Tecnico entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MantenimientoBundle:Tecnico')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tecnico entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('tecnico_edit', array('id' => $id)));
        }

        return $this->render('MantenimientoBundle:Tecnico:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Tecnico entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MantenimientoBundle:Tecnico')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tecnico entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tecnico'));
    }

    /**
     * Creates a form to delete a Tecnico entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tecnico_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
