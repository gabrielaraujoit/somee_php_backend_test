<?php

namespace App\Controller;

use App\Contracts\BookServiceInterface;
use App\Service\BookService;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BookController extends AbstractFOSRestController
{

    /**
     * @var BookService
     */
    private $bookService;
    /**
     * BookController constructor.
     * @param BookService $bookService
     */
    public function __construct(BookServiceInterface $bookServiceInterface)
    {
        $this->bookService = $bookServiceInterface;
    }

    /**
     * Retrieves a collection of Book resource
     * @Rest\Get("/books")
     * @return View
     */
    public function getBooks(): View
    {
        $books = $this->bookService->findAll();
        
        return View::create($books, Response::HTTP_OK);
    }

    /**
     * Retrieves a Book resource
     * @Rest\Get("/books/{bookId}")
     * @param int $bookId
     * @return View
     */
    public function getBook(int $bookId): View
    {
        $book = $this->bookService->find($bookId);

        return View::create($book, Response::HTTP_OK);
    }

    /**
     * Creates an book resource
     * @Rest\Post("/books")
     * @param Request $request
     * @return View
     */
    public function postbook(Request $request): View
    {
        $book = $this->bookService->store($request->request->all());
        
        return View::create($book, Response::HTTP_CREATED);
    }
}
