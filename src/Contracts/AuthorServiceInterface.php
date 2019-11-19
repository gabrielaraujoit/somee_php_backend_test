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
     * Creates an author resource
     * @param array $attrs
     * @return Author
     */
    public function store(array $attrs): Author;
}