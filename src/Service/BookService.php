<?php
namespace App\Service;

use App\Contracts\AuthorServiceInterface;
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
    private $authorService;

    /**
     * BookService constructor.
     * @param BookRepositoryInterface $bookRepository
     */
    public function __construct(BookRepositoryInterface $bookRepository, AuthorServiceInterface $authorService)
    {
        $this->bookRepository = $bookRepository;
        $this->authorService = $authorService;
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
        $book = new Book();
        $book->setTitle($attrs['title']);
        $book->setLaunchDate($book->formatDate($attrs['launchDate']));
        $author = $this->authorService->find($attrs['author']);
        $book->setAuthor($author);
        $this->bookRepository->store($book);

        return $book;
    }

    /**
     * Updates a Book resource
     * @param array $attrs
     * @return Book
     * @throws EntityNotFoundException
     */
    public function update(array $attrs): Book
    {
        $bookId = $attrs['id'];

        if (empty($bookId)) {
            throw new \InvalidArgumentException('Id is required.');
        }

        $book = $this->find($bookId);

        $authorId = $attrs['author'];

        if($authorId != $book->getAuthor()->getId())
        {
            $author = $this->authorService->find($authorId);
            $book->setAuthor($author);
        }
        
        $book->setTitle($attrs['title']);
        $book->setLaunchDate($book->formatDate($attrs['launchDate']));
        $this->bookRepository->store($book);
        
        return $book;
    }

    /**
     * Removes a Book resource
     * @param int $bookId
     * @throws EntityNotFoundException
     */
    public function delete(int $bookId): void
    {
        $book = $this->bookRepository->find($bookId);

        if (!$book) {
            throw new EntityNotFoundException('Book with id '.$bookId.' does not exist!');
        }
        
        $this->bookRepository->delete($book);
    }
}