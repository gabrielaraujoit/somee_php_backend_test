<?php
namespace App\Contracts;

use App\Entity\Book;

/**
 * Interface BookRepositoryInterface
 * @package App\Contracts
 */
interface BookRepositoryInterface
{
    /**
     * Retrieves a collection of Book resource
     * @return array
     */
    public function findAll(): array;

    /**
     * Stores a book resource
     * @param Book $book
     */
    public function store(Book $book): void;

}