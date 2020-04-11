<?php


namespace App\Model;


final class Post extends Model
{
    private ?int $id;
    private ?string $title;
    private ?string $content;

    /**
     * User constructor.
     * @param int|null $id
     * @param string|null $title
     * @param string|null $content
     */
    public function __construct(?int $id = null, ?string $title = null, ?string $content = null)
    {
        $this->id = $id;
        $this->setTitle($title);
        $this->setContent($content);
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param string|null $content
     */
    public function setContent(?string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    static function getTable(): string
    {
        return 'posts';
    }
}