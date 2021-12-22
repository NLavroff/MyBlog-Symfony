<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('', name: 'home')]

    public function listAction(ArticleRepository $articleRepository, PaginatorInterface $paginator, Request $request)
    {
        $query = $articleRepository->createQueryBuilder('a')->getQuery();

        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            3
        );

        return $this->render('home/index.html.twig', ['pagination' => $pagination]);
    }

    public function index(ManagerRegistry $doctrine): Response
    {
         $articles = $doctrine->getRepository(Article::class)
            ->findAll();

            return $this->render(
                'home/index.html.twig',
                ['articles' => $articles]
            );
    }
    /*public function list(ArticleRepository $articleRepository): Response
    {
        return->$this->render('article/list.html.twig', ['articles' => $articleRepository->findAll(),]);
    }*/

}
