<?php
namespace App\Repository;

use App\Contracts\AuthorRepositoryInterface;
use App\Entity\Author;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class AuthorRepository
 * @package App\Repository
 */
final class AuthorRepository implements AuthorRepositoryInterface
{
     /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * AuthorRepository constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Retrieves a collection of Author resource
     * @return array
     */
    public function findAll(): array
    {
        return $this->entityManager->getRepository(Author::class)->findAll();
    }

    /**
     * Retrieves an Author resource by ID
     * @param int $authorId
     * @return Author
     */
    public function find(int $authorId): ?Author
    {
        return $this->entityManager->find(Author::class, $authorId);
    }

     /**
      * Stores an author resource
     * @param Author $author
     */
    public function store(Author $author): void
    {
        $this->entityManager->persist($author);
        $this->entityManager->flush();
    }
}