<?php
namespace App\Service;

use App\Contracts\AuthorRepositoryInterface;
use App\Contracts\BookRepositoryInterface;
use App\Contracts\BookServiceInterface;
use App\Entity\Book;
use Doctrine\ORM\EntityNotFoundException;

/**
 * Class BookService
 * @package App\Service
 */
final class BookService implements BookServiceInterface
{
    /**
     * @var BookRepositoryInterface
     */
    private $bookRepository;

    /**
     * @var BookRepositoryInterface
     */
    private $authorRepository;

    /**
     * BookService constructor.
     * @param BookRepositoryInterface $bookRepository
     */
    public function __construct(BookRepositoryInterface $bookRepository, AuthorRepositoryInterface $authorRepository)
    {
        $this->bookRepository = $bookRepository;
        $this->authorRepository = $authorRepository;
    }

    /**
     * Retrieves a collection of Book resource
     * @return array|null
     */
    public function findAll(): ?array
    {
        return $this->bookRepository->findAll();
    }

    /**
     * @param int $bookId
     * @return Book
     * @throws EntityNotFoundException
     */
    public function find(int $bookId): Book
    {
        $book = $this->bookRepository->find($bookId);

        if (!$book) {
            throw new EntityNotFoundException('Book with id '.$bookId.' does not exist!');
        }

        return $book;
    }

     /**
      * Creates a book resource
     * @param array $attrs
     * @return Book
     */
    public function store(array $attrs): Book
    {
        $authorId = $attrs['author'];

        $book = new Book();
        $book->setTitle($attrs['title']);


        if(!$attrs['lauchDate'] instanceof \DateTimeInterface) {
            throw new \InvalidArgumentException('A valid lauch date is required.');
        }

        $book->setLauchDate(\DateTime::createFromFormat('Y-m-d', $attrs['lauchDate']));

        $author = $this->authorRepository->find($authorId);

        if(!$author)
        {
            throw new EntityNotFoundException('Author with id '.$authorId.' does not exist!');
        }

        $book->setAuthor($author);

        $this->bookRepository->store($book);

        return $book;
    }
}