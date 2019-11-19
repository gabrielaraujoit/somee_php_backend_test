<?php
namespace App\Contracts;

use App\Entity\Author;
use Doctrine\ORM\EntityNotFoundException;

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
     *  Retrieves an Author resource by ID
     * @param int $authorId
     * @return Author
     * @throws EntityNotFoundException
     */
    public function find(int $authorId): Author;

    /**
     * Creates an author resource
     * @param array $attrs
     * @return Author
     */
    public function store(array $attrs): Author;

     /**
     * Updates an Author resource
     * @param array $attrs
     * @return Author
     * @throws EntityNotFoundException
     */
    public function update(array $attrs): Author;

     /**
     * Removes an Author resource
     * @param int $authorId
     * @throws EntityNotFoundException
     */
    public function delete(int $authorId): void;
}