<?php

namespace App\Controller;

use App\Contracts\AuthorServiceInterface;
use App\Service\AuthorService;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
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
     * Creates an author resource
     * @Rest\Post("/authors")
     * @param Request $request
     * @return View
     */
    public function postauthor(Request $request): View
    {
        $author = $this->authorService->store($request->request->all());
        
        return View::create($author, Response::HTTP_CREATED);
    }
}
