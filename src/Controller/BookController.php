<?php

namespace App\Controller;

use App\Contracts\BookServiceInterface;
use App\Service\BookService;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as FOS;
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
     * @FOS\Get("/books")
     * @return View
     */
    public function getBooks(): View
    {
        $books = $this->bookService->findAll();
        
        return View::create($books, Response::HTTP_OK);
    }

    /**
     * Retrieves a Book resource
     * @FOS\Get("/books/{bookId}")
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
     * @FOS\Post("/books")
     * @param Request $request
     * @return View
     */
    public function postbook(Request $request): View
    {
        $book = $this->bookService->store($request->request->all());
        
        return View::create($book, Response::HTTP_CREATED);
    }

    /**
     * Updates a Book resource
     * @FOS\Patch("/books")
     * @param Request $request
     * @return View
     */
    public function patchBook(Request $request): View
    {
        $book = $this->bookService->update($request->request->all());
        
        return View::create($book, Response::HTTP_OK);
    }

    /**
     * Removes a Book resource
     * @FOS\Delete("/books/{bookId}")
     * @param int $bookId
     * @return View
     */
    public function deleteBook(int $bookId): View
    {
        $this->bookService->delete($bookId);

        return View::create([], Response::HTTP_NO_CONTENT);
    }
}
