<?php
namespace App\Contracts;

use App\Entity\Author;

/**
 * Interface AuthorServiceInterface
 * @package App\Contracts
 */
interface AuthorServiceInterface
{

    /**
     * Retrieves a collection of Author resource
     * @return array|null
     */
    public function findAll(): ?array;

    /**
     * Creates an author resource
     * @param array $attrs
     * @return Author
     */
    public function store(array $attrs): Author;
}