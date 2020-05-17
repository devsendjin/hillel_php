<?php

namespace App\Controller;

use App\Entity\Post;
use App\GlobalConfig;

class PostSingleController extends AbstractController
{
    private ?object $post;

    public function __construct(int $postId)
    {
        $this->setPost(GlobalConfig::$entityManager->getRepository(Post::class)->find($postId));
    }

    public function render(bool $echo = true) {
        $this->renderView('pages/post-single.html.twig', [
            'post' => $this->getPost(),
            'user' => $this->getPost()->getUser(),
        ], $echo);
    }

    /**
     * @return object|null
     */
    public function getPost(): ?object
    {
        return $this->post;
    }

    /**
     * @param object|null $post
     */
    public function setPost(?object $post): void
    {
        if (!$post) {
            throw new \Error('Post not found');
        }
        $this->post = $post;
    }
}
