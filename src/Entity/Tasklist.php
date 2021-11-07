<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\ExistsFilter;
use App\Repository\TasklistRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *     collectionOperations={"get","post"},
 *     itemOperations={"get","patch","delete"},
 *     normalizationContext={"groups"={"tasklist:read"}},
 *     denormalizationContext={"groups"={"tasklist:write"}},
 *     attributes={
 *          "pagination_items_per_page" = 20
 *     }
 * )
 * @ORM\Entity(repositoryClass=TasklistRepository::class)
 * @ApiFilter(SearchFilter::class, properties={"title": "partial"})
 * @ApiFilter(ExistsFilter::class, properties={"archivedAt"})
 */
class Tasklist
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"tasklist:read", "tasklist:write", "user:read"})
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min=2,
     *     max=100,
     *     minMessage="Le titre doit compter au moins 2 caractères",
     *     maxMessage="Le titre doit compter 100 caractères maximum"
     * )
     */
    private $title;

    /**
     * @Groups({"tasklist:read", "user:read"})
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @Groups({"tasklist:read", "user:read"})
     * @ORM\Column(type="datetime_immutable")
     */
    private $updatedAt;

    /**
     * @Groups({"tasklist:read", "user:read"})
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $archivedAt;

    /**
     * @Groups({"tasklist:read", "tasklist:write", "user:read"})
     * @ORM\Column(type="integer", options={"default" : 0})
     */
    private $progress;

    /**
     * @Groups({"tasklist:read", "tasklist:write"})
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="tasklists")
     */
    private $user;

    /**
     * @Groups({"tasklist:read", "user:read"})
     * @ORM\OneToMany(targetEntity=Task::class, mappedBy="tasklist")
     */
    private $tasks;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTimeImmutable();
        $this->progress = 0;
        $this->tasks = new ArrayCollection();
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

    public function getArchivedAt(): ?\DateTimeImmutable
    {
        return $this->archivedAt;
    }

    public function setArchivedAt(?\DateTimeImmutable $archivedAt): self
    {
        $this->archivedAt = $archivedAt;

        return $this;
    }

    public function getProgress(): ?int
    {
        return $this->progress;
    }

    public function setProgress(int $progress): self
    {
        $this->progress = $progress;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Task[]
     */
    public function getTasks(): Collection
    {
        return $this->tasks;
    }

    public function addTask(Task $task): self
    {
        if (!$this->tasks->contains($task)) {
            $this->tasks[] = $task;
            $task->setTasklist($this);
        }

        return $this;
    }

    public function removeTask(Task $task): self
    {
        if ($this->tasks->removeElement($task)) {
            // set the owning side to null (unless already changed)
            if ($task->getTasklist() === $this) {
                $task->setTasklist(null);
            }
        }

        return $this;
    }
}
