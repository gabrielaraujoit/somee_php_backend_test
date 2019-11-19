<?php
namespace App\Repository;

use App\Contracts\BookRepositoryInterface;
use App\Entity\Book;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class BookRepository
 * @package App\Repository
 */
final class BookRepository implements BookRepositoryInterface
{
     /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * BookRepository constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Retrieves a collection of Book resource
     * @return array
     */
    public function findAll(): array
    {
        return $this->entityManager->getRepository(Book::class)->findAll();
    }

    /**
     * Retrieves a Book resource by ID
     * @param int $bookId
     * @return Book
     */
    public function find(int $bookId): ?Book
    {
        return $this->entityManager->find(Book::class, $bookId);
    }

    /**
     * Stores a book resource
    * @param Book $book
    */
    public function store(Book $book): void
    {
        $this->entityManager->persist($book);
        $this->entityManager->flush();
    }
}