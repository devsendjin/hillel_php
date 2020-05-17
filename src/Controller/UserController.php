<?php


namespace App\Controller;

use App\Entity\User;
use App\GlobalConfig;

class UserController extends AbstractController
{
    private ?object $user;

    public function __construct(int $userId)
    {
        $this->setUser(GlobalConfig::$entityManager->getRepository(User::class)->find($userId));
    }

    public function render(bool $echo = true) {
        $this->renderView('pages/user.html.twig', [
            'user' => $this->getUser(),
        ], $echo);
    }

    /**
     * @return object|null
     */
    public function getUser(): ?object
    {
        return $this->user;
    }

    /**
     * @param object|null $user
     */
    public function setUser(?object $user): void
    {
        if (!$user) {
            throw new \Error('User not found');
        }
        $this->user = $user;
    }
}