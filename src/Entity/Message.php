<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MessageRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"listmessage"}}
 * )
 * @ORM\Entity(repositoryClass=MessageRepository::class)
 */
class Message
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups ({"messages", "listmessage"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups ({"messages", "listmessage"})
     */
    private $titre;

    /**
     * @ORM\Column(type="datetime")
     *  @Groups ({"listmessage"})
     */
    private $date;

    /**
     * @ORM\Column(type="text")
     * @Groups ({"messages","listmessage"})
     */
    private $contenu;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="messages")
     * @ORM\JoinColumn(nullable=false)
     * @Groups ({"listmessage"})
     */
    private $category;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }
}
