<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Type;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AuthorRepository")
 */
class Author
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Id is required")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Name is required.")
     */
    private $name;

    /**
     * @ORM\Column(type="date")
     * @Type("DateTime<'Y-m-d'>")
     * @Assert\NotBlank(message="Date of birth is required")
     */
    private $dob;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        if(empty($name)) {
            throw new \InvalidArgumentException('Name is required.');
        }

        $this->name = $name;

        return $this;
    }

    public function getDob(): ?\DateTimeInterface
    {
        return $this->dob;
    }

    public function setDob(\DateTimeInterface $dob): self
    {
        if(empty($dob)) {
            throw new \InvalidArgumentException('Date of birth is required.');
        }

        $this->dob = $dob;

        return $this;
    }
}
