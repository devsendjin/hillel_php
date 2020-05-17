<?php

namespace App\Controller;

use App\Entity\Post;
use App\GlobalConfig;

class IndexController extends AbstractController
{
    private ?array $posts;

    /*public function __construct()
    {
        $this->setPosts(GlobalConfig::$entityManager->getRepository(Post::class)->findAll());
    }*/

    public function render(bool $echo = true) {
        $this->renderView('pages/main.html.twig', [
            'postsUrl' => '/posts',
        ], $echo);
    }

}
