<?php

namespace App\API;

use App\Entity\Post;
use App\Entity\User;
use App\GlobalConfig;

class PostDeleteController
{
    private int $postId;
    private int $userId;

    /**
     * PostAddController constructor.
     * @param array $postData
     */
    public function __construct(array $postData)
    {
        $this->setPostId($postData['post-id']);
        $this->setUserId($postData['user-id']);
    }

    public function deletePost()
    {
        $user = GlobalConfig::$entityManager->getRepository(User::class)->find($this->getUserId());
        $post = GlobalConfig::$entityManager->getRepository(Post::class)->find($this->getPostId());

        $user->getPosts()->removeElement($post);
        $post->setUser(null);

        GlobalConfig::$entityManager->persist($post);
        GlobalConfig::$entityManager->persist($user);
        GlobalConfig::$entityManager->flush();

        echo json_encode(['success' => true]);
    }

    /**
     * @return int
     */
    public function getPostId(): int
    {
        return $this->postId;
    }

    /**
     * @param int $postId
     */
    public function setPostId(int $postId): void
    {
        $this->postId = $postId;
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
        $this->userId = $userId;
    }

}