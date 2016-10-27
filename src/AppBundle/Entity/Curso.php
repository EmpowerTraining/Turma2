<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Curso
 *
 * @ORM\Table(name="curso")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CursoRepository")
 */
class Curso
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="professor", type="string", length=255)
     */
    private $professor;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="text")
     */
    private $descricao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="inicio", type="date")
     */
    private $inicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fim", type="date", nullable=true)
     */
    private $fim;

    /**
     * @var int
     *
     * @ORM\Column(name="cargaHoraria", type="integer", nullable=true)
     */
    private $cargaHoraria;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nome
     *
     * @param string $nome
     *
     * @return Curso
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set professor
     *
     * @param string $professor
     *
     * @return Curso
     */
    public function setProfessor($professor)
    {
        $this->professor = $professor;

        return $this;
    }

    /**
     * Get professor
     *
     * @return string
     */
    public function getProfessor()
    {
        return $this->professor;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     *
     * @return Curso
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get descricao
     *
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set inicio
     *
     * @param \DateTime $inicio
     *
     * @return Curso
     */
    public function setInicio($inicio)
    {
        $this->inicio = $inicio;

        return $this;
    }

    /**
     * Get inicio
     *
     * @return \DateTime
     */
    public function getInicio()
    {
        return $this->inicio;
    }

    /**
     * Set fim
     *
     * @param \DateTime $fim
     *
     * @return Curso
     */
    public function setFim($fim)
    {
        $this->fim = $fim;

        return $this;
    }

    /**
     * Get fim
     *
     * @return \DateTime
     */
    public function getFim()
    {
        return $this->fim;
    }

    /**
     * Set cargaHoraria
     *
     * @param integer $cargaHoraria
     *
     * @return Curso
     */
    public function setCargaHoraria($cargaHoraria)
    {
        $this->cargaHoraria = $cargaHoraria;

        return $this;
    }

    /**
     * Get cargaHoraria
     *
     * @return int
     */
    public function getCargaHoraria()
    {
        return $this->cargaHoraria;
    }
}

