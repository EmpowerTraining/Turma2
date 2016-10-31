<?php

namespace ExemploBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Membro
 *
 * @ORM\Table(name="membro")
 * @ORM\Entity(repositoryClass="ExemploBundle\Repository\MembroRepository")
 */
class Membro
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
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataNascimento", type="date")
     */
    private $dataNascimento;

    /**
     * @var string
     *
     * @ORM\Column(name="sexo", type="string", length=1)
     */
    private $sexo;

    /**
     * @var string
     *
     * @ORM\Column(name="telefone", type="string", length=11, nullable=true)
     */
    private $telefone;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataRegistro", type="datetime")
     */
    private $dataRegistro;


    public function __construct(){
      $this->dataRegistro = new \DateTime();
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
     * Set nome
     *
     * @param string $nome
     *
     * @return Membro
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
     * Set email
     *
     * @param string $email
     *
     * @return Membro
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set dataNascimento
     *
     * @param \DateTime $dataNascimento
     *
     * @return Membro
     */
    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;

        return $this;
    }

    /**
     * Get dataNascimento
     *
     * @return \DateTime
     */
    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    /**
     * Set sexo
     *
     * @param string $sexo
     *
     * @return Membro
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get sexo
     *
     * @return string
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set telefone
     *
     * @param string $telefone
     *
     * @return Membro
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get telefone
     *
     * @return string
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Set dataRegistro
     *
     * @param \DateTime $dataRegistro
     *
     * @return Membro
     */
    public function setDataRegistro($dataRegistro)
    {
        $this->dataRegistro = $dataRegistro;

        return $this;
    }

    /**
     * Get dataRegistro
     *
     * @return \DateTime
     */
    public function getDataRegistro()
    {
        return $this->dataRegistro;
    }
}
