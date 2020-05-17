<?php

namespace App\Controller;

use App\Entity\Post;
use App\GlobalConfig;

class PostArchiveController extends AbstractController
{
    private ?array $posts;

    public function __construct()
    {
        $this->setPosts(GlobalConfig::$entityManager->getRepository(Post::class)->findAll());
    }

    public function render(bool $echo = true) {
        $this->renderView('pages/posts-archive.html.twig', [
            'postsData' => $this->getPostsData(),
            'postsUrl' => '/post/',
        ], $echo);
    }

    /**
     * Returns array with post and user
     *
     * @return array
     */
    public function getPostsData(): array
    {
        foreach ($this->getPosts() as $post) {
            $data[] = [
                'post' => $post,
                'user' => $post->getUser(),
            ];
        }
        return $data;
    }

    /**
     * @return array|null
     */
    public function getPosts(): ?array
    {
        return $this->posts;
    }

    /**
     * @param array|null $posts
     */
    public function setPosts(?array $posts): void
    {
        if (!$posts) {
            throw new \Error('Posts not found');
        }
        $this->posts = $posts;
    }
}
