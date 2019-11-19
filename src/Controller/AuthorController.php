<?php

namespace App\Controller;

use App\Contracts\AuthorServiceInterface;
use App\Service\AuthorService;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthorController extends AbstractFOSRestController
{

    /**
     * @var AuthorService
     */
    private $authorService;
    /**
     * AuthorController constructor.
     * @param AuthorService $authorService
     */
    public function __construct(AuthorServiceInterface $authorServiceInterface)
    {
        $this->authorService = $authorServiceInterface;
    }

    /**
     * Retrieves a collection of Author resource
     * @FOS\Get("/authors")
     * @return View
     */
    public function getAuthors(): View
    {
        $authors = $this->authorService->findAll();
        
        return View::create($authors, Response::HTTP_OK);
    }

    /**
     * Retrieves an Author resource
     * @FOS\Get("/authors/{authorId}")
     * @param int $authorId
     * @return View
     */
    public function getAuthor(int $authorId): View
    {
        $author = $this->authorService->find($authorId);

        return View::create($author, Response::HTTP_OK);
    }

    /**
     * Creates an author resource
     * @FOS\Post("/authors")
     * @param Request $request
     * @return View
     */
    public function postauthor(Request $request): View
    {
        $author = $this->authorService->store($request->request->all());
        
        return View::create($author, Response::HTTP_CREATED);
    }

    /**
     * Updates an Author resource
     * @FOS\Patch("/authors")
     * @param Request $request
     * @return View
     */
    public function patchAuthor(Request $request): View
    {
        $author = $this->authorService->update($request->request->all());
        
        return View::create($author, Response::HTTP_OK);
    }

    /**
     * Removes an Author resource
     * @FOS\Delete("/authors/{authorId}")
     * @param int $authorId
     * @return View
     */
    public function deleteAuthor(int $authorId): View
    {
        $this->authorService->delete($authorId);

        return View::create([], Response::HTTP_NO_CONTENT);
    }
}
