<?php

namespace App\API;

use App\Entity\Post;
use App\Entity\User;
use App\GlobalConfig;

class PostAddController
{
    private string $title;
    private string $content;
    private string $description;
    private int $userId;

    /**
     * PostAddController constructor.
     * @param array $postData
     */
    public function __construct(array $postData)
    {
        $this->setTitle($postData['title']);
        $this->setContent($postData['content']);
        $this->setDescription($postData['description']);
        $this->setUserId($postData['user-id']);
    }

    public function savePost()
    {
        $user = GlobalConfig::$entityManager->getRepository(User::class)->find($this->getUserId());

        $post = new Post();
        $post->setTitle($this->getTitle());
        $post->setContent($this->getContent());
        $post->setShortDescription($this->getDescription());
        $post->setCreatedAt(new \DateTime());
        $post->setUpdatedAt(new \DateTime());
        $post->setImageUrl('laravel.png');

        $user->getPosts()->add($post);
        $post->setUser($user);

        GlobalConfig::$entityManager->persist($post);
        GlobalConfig::$entityManager->persist($user);
        GlobalConfig::$entityManager->flush();

        echo json_encode(['success' => true]);
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $userId): void
    {
        $this->userId = (int) $userId;
    }

}