<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MessageRepository")
 */
class Message
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
    private $lemessage;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_message;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Topic")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_topic;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLemessage(): ?string
    {
        return $this->lemessage;
    }

    public function setLemessage(string $lemessage): self
    {
        $this->lemessage = $lemessage;

        return $this;
    }

    public function getDateMessage(): ?\DateTimeInterface
    {
        return $this->date_message;
    }

    public function setDateMessage(\DateTimeInterface $date_message): self
    {
        $this->date_message = $date_message;

        return $this;
    }

    public function getIdTopic(): ?Topic
    {
        return $this->id_topic;
    }

    public function setIdTopic(?Topic $id_topic): self
    {
        $this->id_topic = $id_topic;

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
}
