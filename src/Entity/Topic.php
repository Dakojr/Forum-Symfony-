<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TopicRepository")
 */
class Topic
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name_topic;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_topic;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="topics")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categorie")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameTopic(): ?string
    {
        return $this->name_topic;
    }

    public function setNameTopic(string $name_topic): self
    {
        $this->name_topic = $name_topic;

        return $this;
    }

    public function getDateTopic(): ?\DateTimeInterface
    {
        return $this->date_topic;
    }

    public function setDateTopic(\DateTimeInterface $date_topic): self
    {
        $this->date_topic = $date_topic;

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->id_user;
    }

    public function setIdUser(?User $id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCat(): ?categorie
    {
        return $this->cat;
    }

    public function setCat(?categorie $cat): self
    {
        $this->cat = $cat;

        return $this;
    }
}
