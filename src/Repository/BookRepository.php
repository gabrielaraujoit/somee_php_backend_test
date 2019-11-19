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
     * Stores a book resource
    * @param Book $book
    */
    public function store(Book $book): void
    {
        $this->entityManager->persist($book);
        $this->entityManager->flush();
    }
}