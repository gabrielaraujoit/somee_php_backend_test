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
     * Stores an author resource
     * @param Author $author
     */
    public function store(Author $author): void;
}