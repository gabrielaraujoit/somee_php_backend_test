<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Traits\FormatDate;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\BookRepository")
 */
class Book
{
    use FormatDate;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Id is required")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Title is required")
     */
    private $title;

    /**
     * @ORM\Column(type="date")
     */
    private $launchDate;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Author", inversedBy="books")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank(message="Author is required")
     */
    private $author;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        if(empty($title)) {
            throw new \InvalidArgumentException('Title is required.');
        }

        $this->title = $title;

        return $this;
    }

    public function getLaunchDate(): ?\DateTimeInterface
    {
        return $this->launchDate;
    }

    public function setLaunchDate(\DateTimeInterface $launchDate): self
    {
        if(empty($launchDate) || !$launchDate instanceof \DateTimeInterface) {
            throw new \InvalidArgumentException('A valid launch date is required.');
        }

        $this->launchDate = $launchDate;

        return $this;
    }

    public function getAuthor(): ?Author
    {
        return $this->author;
    }

    public function setAuthor(?Author $author): self
    {
        $this->author = $author;

        return $this;
    }
}
