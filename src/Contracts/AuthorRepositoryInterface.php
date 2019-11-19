<?php
namespace App\Contracts;

use App\Entity\Author;

/**
 * Interface AuthorRepositoryInterface
 * @package App\Contracts
 */
interface AuthorRepositoryInterface
{
    /**
     * Retrieves a collection of Author resource
     * @return array
     */
    public function findAll(): array;

    /**
     * Stores an author resource
     * @param Author $author
     */
    public function store(Author $author): void;
}