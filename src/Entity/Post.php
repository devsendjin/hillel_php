<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Post
 * @package App\Entity
 * @ORM\Entity()
 * @ORM\Table(name="posts")
 */
class Post
{
    /**
     * @var int
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue()
     */
    private int $id;

    /**
     * @var string|null
     * @ORM\Column(type="string")
     */
    private ?string $title;

    /**
     * @var string|null
     * @ORM\Column(type="text")
     */
    private ?string $content;

    /**
     * @var string|null
     * @ORM\Column(type="text", nullable=true)
     */
    private ?string $shortDescription;

    /**
     * @var string|null
     * @ORM\Column(type="string", nullable=true)
     */
    private ?string $imageUrl;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private \DateTime $createdAt;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private \DateTime $updatedAt;

    /**
     * @var User|null
     * @ORM\ManyToOne(targetEntity="User", inversedBy="posts")
     */
    private ?User $user;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
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
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt(\DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User|null $user
     */
    public function setUser(?User $user): void
    {
        $this->user = $user;
    }

    /**
     * @return string|null
     */
    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    /**
     * @param string|null $imageUrl
     */
    public function setImageUrl(?string $imageUrl): void
    {
        $this->imageUrl = $imageUrl;
    }

    /**
     * @return string|null
     */
    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }

    /**
     * @param string|null $shortDescription
     */
    public function setShortDescription(?string $shortDescription): void
    {
        $this->shortDescription = $shortDescription;
    }

}