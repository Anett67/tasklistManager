<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TaskRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     collectionOperations={"get","post"},
 *     itemOperations={"get","patch","delete"},
 *     normalizationContext={"groups"={"task:read"}},
 *     denormalizationContext={"groups"={"task:write"}},
 *     attributes={
 *          "pagination_items_per_page" = 20
 *     }
 * )
 * @ORM\Entity(repositoryClass=TaskRepository::class)
 */
class Task
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"task:read", "task:write"})
     */
    private $title;

    /**
     * @ORM\ManyToOne(targetEntity=TaskStatus::class, inversedBy="tasks")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"task:read", "task:write"})
     */
    private $status;

    /**
     * @ORM\Column(type="datetime_immutable")
     * @Groups({"task:read"})
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime_immutable")
     * @Groups({"task:read"})
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"task:read", "task:write"})
     */
    private $priority;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"task:read", "task:write"})
     */
    private $deadline;

    /**
     * @ORM\ManyToOne(targetEntity=Tasklist::class, inversedBy="tasks")
     * @Groups({"task:read", "task:write"})
     */
    private $tasklist;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getStatus(): ?TaskStatus
    {
        return $this->status;
    }

    public function setStatus(?TaskStatus $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getPriority(): ?int
    {
        return $this->priority;
    }

    public function setPriority(int $priority): self
    {
        $this->priority = $priority;

        return $this;
    }

    public function getDeadline(): ?\DateTimeInterface
    {
        return $this->deadline;
    }

    public function setDeadline(?\DateTimeInterface $deadline): self
    {
        $this->deadline = $deadline;

        return $this;
    }

    public function getTasklist(): ?Tasklist
    {
        return $this->tasklist;
    }

    public function setTasklist(?Tasklist $tasklist): self
    {
        $this->tasklist = $tasklist;

        return $this;
    }
}
