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
