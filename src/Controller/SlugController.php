<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SlugController extends AbstractController
{
    #[Route('/article/slug', name: 'slug')]
    public function index(): Response
    {
        return $this->render('slug/index.html.twig', [
            'controller_name' => 'SlugController',
        ]);
    }
}
