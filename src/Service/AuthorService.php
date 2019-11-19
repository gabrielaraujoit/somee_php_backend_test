<?php
namespace App\Service;

use App\Contracts\AuthorRepositoryInterface;
use App\Contracts\AuthorServiceInterface;
use App\Entity\Author;
use Doctrine\ORM\EntityNotFoundException;

/**
 * Class AuthorService
 * @package App\Service
 */
final class AuthorService implements AuthorServiceInterface
{
    /**
     * @var AuthorRepositoryInterface
     */
    private $authorRepository;

    /**
     * AuthorService constructor.
     * @param AuthorRepositoryInterface $authorRepository
     */
    public function __construct(AuthorRepositoryInterface $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

     /**
      * Creates an author resource
     * @param array $attrs
     * @return Author
     */
    public function store(array $attrs): Author
    {
        if(!$attrs['dob'] instanceof \DateTimeInterface) {
            throw new \InvalidArgumentException('A valid date of birth is required.');
        }

        $author = new Author();
        $author->setName($attrs['name']);
        $author->setDob(\DateTime::createFromFormat('Y-m-d', $attrs['dob']));

        $this->authorRepository->store($author);

        return $author;
    }

}