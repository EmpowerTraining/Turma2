<?php

namespace ExemploBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class TarefaController extends Controller
{
    /**
     * @Route("/listar")
     */
    public function listarAction()
    {
        return $this->render('ExemploBundle:Tarefa:listar.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/listar/status")
     */
    public function statusAction()
    {
        return $this->render('ExemploBundle:Tarefa:status.html.twig', array(
            // ...
        ));
    }

}
