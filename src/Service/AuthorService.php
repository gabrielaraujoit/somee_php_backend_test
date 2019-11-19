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
     * Retrieves a collection of Author resource
     * @return array|null
     */
    public function findAll(): ?array
    {
        return $this->authorRepository->findAll();
    }

    /**
     * @param int $authorId
     * @return Author
     * @throws EntityNotFoundException
     */
    public function find(int $authorId): Author
    {
        $author = $this->authorRepository->find($authorId);

        if (!$author) {
            throw new EntityNotFoundException('Author with id '.$authorId.' does not exist!');
        }

        return $author;
    }

     /**
      * Creates an author resource
     * @param array $attrs
     * @return Author
     */
    public function store(array $attrs): Author
    {
        $author = new Author();
        $author->setName($attrs['name']);
        $author->setDob(\DateTime::createFromFormat('Y-m-d', $attrs['dob']));

        $this->authorRepository->store($author);

        return $author;
    }


    /**
     * Updates an Author resource
     * @param array $attrs
     * @return Author
     * @throws EntityNotFoundException
     */
    public function update(array $attrs): Author
    {
        $authorId = $attrs['id'];

        if (empty($authorId)) {
            throw new \InvalidArgumentException('Id is required.');
        }

        $author = $this->authorRepository->find($authorId);
        
        if (!$author) {
            throw new EntityNotFoundException('Author with id '.$authorId.' does not exist!');
        }
        
        $author->setName($attrs['name']);
        $author->setDob(\DateTime::createFromFormat('Y-m-d', $attrs['dob']));
        $this->authorRepository->store($author);
        
        return $author;
    }
}