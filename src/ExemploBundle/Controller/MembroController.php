<?php

namespace ExemploBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use ExemploBundle\Entity\Membro;
use ExemploBundle\Form\MembroType;

/**
 * Membro controller.
 *
 * @Route("/membro")
 */
class MembroController extends Controller
{
    /**
     * Lists all Membro entities.
     *
     * @Route("/", name="membro_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $membros = $em->getRepository('ExemploBundle:Membro')->findAll();
        $usuarios = $em->getRepository('AppBundle:Usuario')->findAll();

        return $this->render('membro/index.html.twig', array(
            'membros' => $membros,
            'usuarios' => $usuarios
        ));
    }

    /**
     * Creates a new Membro entity.
     *
     * @Route("/new", name="membro_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $membro = new Membro();
        $form = $this->createForm('ExemploBundle\Form\MembroType', $membro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($membro);
            $em->flush();

            return $this->redirectToRoute('membro_show', array('id' => $membro->getId()));
        }

        return $this->render('membro/new.html.twig', array(
            'membro' => $membro,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Membro entity.
     *
     * @Route("/{id}", name="membro_show")
     * @Method("GET")
     */
    public function showAction(Membro $membro)
    {
        $deleteForm = $this->createDeleteForm($membro);

        return $this->render('membro/show.html.twig', array(
            'membro' => $membro,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Membro entity.
     *
     * @Route("/{id}/edit", name="membro_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Membro $membro)
    {
        $deleteForm = $this->createDeleteForm($membro);
        $editForm = $this->createForm('ExemploBundle\Form\MembroType', $membro);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($membro);
            $em->flush();

            return $this->redirectToRoute('membro_edit', array('id' => $membro->getId()));
        }

        return $this->render('membro/edit.html.twig', array(
            'membro' => $membro,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Membro entity.
     *
     * @Route("/{id}/delete", name="membro_delete")
     */
    public function deleteAction(Request $request, Membro $membro)
    {
        //$form = $this->createDeleteForm($membro);
        //$form->handleRequest($request);

        //if ($form->isSubmitted() && $form->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $em->remove($membro);
        $em->flush();
        //}

        return $this->redirectToRoute('membro_index');
    }

    /**
     * Creates a form to delete a Membro entity.
     *
     * @param Membro $membro The Membro entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Membro $membro)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('membro_delete', array('id' => $membro->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
