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
     * Retrieves an Author resource by ID
     * @param int $authorId
     * @return Author
     */
    public function find(int $authorId): ?Author;

    /**
     * Stores an author resource
     * @param Author $author
     */
    public function store(Author $author): void;
}