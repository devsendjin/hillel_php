<?php


namespace App\Model;

final class User extends Model
{
    private ?int $id;
    private ?string $name;
    private ?string $email;

    /**
     * User constructor.
     * @param int|null $id
     * @param string|null $name
     * @param string|null $email
     */
    public function __construct(?int $id = null, ?string $name = null, ?string $email = null)
    {
        $this->id = $id;
        $this->setName($name);
        $this->setEmail($email);
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
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    static function getTable(): string
    {
        return 'users';
    }
}
