<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tarefa
 *
 * @ORM\Table(name="tarefa")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TarefaRepository")
 */
class Tarefa
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
     * @ORM\Column(name="descricao", type="string", length=255)
     */
    private $descricao;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumn(name="responsavel", referencedColumnName="id")
     */
    private $responsavel;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumn(name="demandante", referencedColumnName="id")
     */
    private $demandante;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="TarefaStatus")
     * @ORM\JoinColumn(name="status", referencedColumnName="id")
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_fim", type="datetime", nullable=true)
     */
    private $dataFim;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_cadastro", type="datetime")
     */
    private $dataCadastro;

    public function __construct()
    {
        $this->dataCadastro = new \DateTime();
    }


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
     * Set descricao
     *
     * @param string $descricao
     *
     * @return Tarefa
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
     * Set responsavel
     *
     * @param integer $responsavel
     *
     * @return Tarefa
     */
    public function setResponsavel($responsavel)
    {
        $this->responsavel = $responsavel;

        return $this;
    }

    /**
     * Get responsavel
     *
     * @return int
     */
    public function getResponsavel()
    {
        return $this->responsavel;
    }

    /**
     * Set demandante
     *
     * @param integer $demandante
     *
     * @return Tarefa
     */
    public function setDemandante($demandante)
    {
        $this->demandante = $demandante;

        return $this;
    }

    /**
     * Get demandante
     *
     * @return int
     */
    public function getDemandante()
    {
        return $this->demandante;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Tarefa
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set dataFim
     *
     * @param \DateTime $dataFim
     *
     * @return Tarefa
     */
    public function setDataFim($dataFim)
    {
        $this->dataFim = $dataFim;

        return $this;
    }

    /**
     * Get dataFim
     *
     * @return \DateTime
     */
    public function getDataFim()
    {
        return $this->dataFim;
    }

    /**
     * Set dataCadastro
     *
     * @param \DateTime $dataCadastro
     *
     * @return Tarefa
     */
    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = $dataCadastro;

        return $this;
    }

    /**
     * Get dataCadastro
     *
     * @return \DateTime
     */
    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }
}
