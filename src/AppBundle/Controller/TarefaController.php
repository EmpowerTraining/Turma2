<?php

namespace AppBundle\Controller;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Tarefa;
use AppBundle\Form\TarefaType;

/**
 * Tarefa controller.
 *
 * @Route("/tarefa")
 */
class TarefaController extends Controller
{
    /**
     * Lists all Tarefa entities.
     *
     * @Route("/", name="tarefa_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tarefas = $em->getRepository('AppBundle:Tarefa')->findAll();

        return $this->render('tarefa/index.html.twig', array(
            'tarefas' => $tarefas,
        ));
    }

    /**
     * Creates a new Tarefa entity.
     *
     * @Route("/new", name="tarefa_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $tarefa = new Tarefa();
        $form = $this->createForm('AppBundle\Form\TarefaType', $tarefa);
        $form->handleRequest($request);
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        $usuarios = $em->getRepository('AppBundle:Usuario')->findAll();

        if ($request->getMethod() == 'POST') {
            $tarefa = new Tarefa();

            $demandante = $em->getPartialReference('AppBundle:Usuario', $request->get('demandante')); //Certo
            $responsavel = $em->getRepository('AppBundle:Usuario')->find($request->get('responsavel'));
            $status = $em->getPartialReference('AppBundle:TarefaStatus', 1); //Certo

            $tarefa->setDemandante($demandante);
            $tarefa->setResponsavel($responsavel);
            $tarefa->setStatus($status);

            $tarefa->setDescricao($request->get('descricao'));
            $tarefa->setDataCadastro(new \DateTime());

            $em->persist($tarefa);
            $em->flush();

            return $this->redirectToRoute('tarefa_show', array('id' => $tarefa->getId()));
        }



        return $this->render('tarefa/new.html.twig', array(
            'usuarios' => $usuarios,
        ));
    }

    /**
     * Finds and displays a Tarefa entity.
     *
     * @Route("/{id}", name="tarefa_show")
     * @Method("GET")
     */
    public function showAction(Tarefa $tarefa)
    {
        $deleteForm = $this->createDeleteForm($tarefa);

        return $this->render('tarefa/show.html.twig', array(
            'tarefa' => $tarefa,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Tarefa entity.
     *
     * @Route("/{id}/edit", name="tarefa_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Tarefa $tarefa)
    {
        $deleteForm = $this->createDeleteForm($tarefa);
        $editForm = $this->createForm('AppBundle\Form\TarefaType', $tarefa);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tarefa);
            $em->flush();

            return $this->redirectToRoute('tarefa_edit', array('id' => $tarefa->getId()));
        }

        return $this->render('tarefa/edit.html.twig', array(
            'tarefa' => $tarefa,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Tarefa entity.
     *
     * @Route("/{id}", name="tarefa_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Tarefa $tarefa)
    {
        $form = $this->createDeleteForm($tarefa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tarefa);
            $em->flush();
        }

        return $this->redirectToRoute('tarefa_index');
    }

    /**
     * Creates a form to delete a Tarefa entity.
     *
     * @param Tarefa $tarefa The Tarefa entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Tarefa $tarefa)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tarefa_delete', array('id' => $tarefa->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
