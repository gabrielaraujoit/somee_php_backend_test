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
     * Creates a Book resource
     * @param array $attrs
     * @return Book
     */
    public function store(array $attrs): Book;
}