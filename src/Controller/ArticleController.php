<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Psr\Log\LoggerInterface;
use Twig\Environment;

class ArticleController extends AbstractController {

    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage() {
        return $this->render("articles/homepage.html.twig");
    }

    /**
     * @Route("/topic/{slug}", name="articles_show")
     */
    public function show($slug, Environment $twigEnvironment) {

        $comments = [
            "I LOVE JS",
            "YOU LOVE JS",
            "Everybody love js",
        ];

        $html = $twigEnvironment->render("articles/article.html.twig", [
            "title" => ucwords(str_replace('-', ' ', $slug)),
            "comments" => $comments,
            "slug" => $slug,
        ]);

        return new Response($html);
    }

    /**
     * @Route("/news/{slug}/heart", name="articles_toggle_heart", methods={"POST"})
     */
    public function toggleArticleHeart($slug, LoggerInterface $logger) {
        return $this->json(['hearts' => random_int(5, 100)]);
    }
}