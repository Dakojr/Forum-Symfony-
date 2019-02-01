<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategorieRepository;
use App\Repository\TopicRepository;


class CategorieController extends AbstractController
{
    
    /**
     * @Route("/categorie", name="categorie")
     */
    public function index(CategorieRepository $categorie)
    {
        $cat = $categorie->findAll();

        return $this->render('categorie/index.html.twig', [
            'controller_name' => 'CategorieController',
            'cat' => $cat,
        ]);
    }

    /**
     * @Route("/topics/{slug}", name="topics")
     */
    public function topics($slug, TopicRepository $topic)
    {
        $top = $topic->findBy(['cat' => $slug]);
        //$top = $topic->findAll();

        return $this->render('categorie/topics.html.twig', [
            'controller_name' => 'CategorieController',
            'top' => $top,
            'slug' => $slug
        ]);
    }

    /**
    * @Route("/topics", name="alltopics")
    */
    public function allTopics(TopicRepository $topic) 
    {
        $top = $topic->findAll();

        return $this->render('categorie/alltopics.html.twig', [
            'controller_name' => 'CategorieController',
            'top' => $top,
        ]);
    }
}