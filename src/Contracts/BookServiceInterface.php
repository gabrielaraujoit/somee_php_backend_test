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
     * Creates a Book resource
     * @param array $attrs
     * @return Book
     */
    public function store(array $attrs): Book;

}