<?php
namespace App\Contracts;

use App\Entity\Book;
use Doctrine\ORM\EntityNotFoundException;

/**
 * Interface BookServiceInterface
 * @package App\Contracts
 */
interface BookServiceInterface
{

    /**
     * Retrieves a collection of Book resource
     * @return array|null
     */
    public function findAll(): ?array;

    /**
     *  Retrieves a Book resource by ID
     * @param int $bookId
     * @return Book
     * @throws EntityNotFoundException
     */
    public function find(int $bookId): Book;

    /**
     * Creates a Book resource
     * @param array $attrs
     * @return Book
     */
    public function store(array $attrs): Book;

     /**
     * Updates a Book resource
     * @param array $attrs
     * @return Book
     * @throws EntityNotFoundException
     */
    public function update(array $attrs): Book;

}