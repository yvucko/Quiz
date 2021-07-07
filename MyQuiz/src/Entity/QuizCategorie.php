<?php

namespace App\Entity;

use App\Repository\QuizCategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QuizCategorieRepository::class)
 */
class QuizCategorie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=QuizName::class, mappedBy="quiz_categories", orphanRemoval=true)
     */
    private $quizNames;

    public function __construct()
    {
        $this->quizNames = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
    public function __toString()
    {
        return $this->name;
    }

    /**
     * @return Collection|QuizName[]
     */
    public function getQuizNames(): Collection
    {
        return $this->quizNames;
    }

    public function addQuizName(QuizName $quizName): self
    {
        if (!$this->quizNames->contains($quizName)) {
            $this->quizNames[] = $quizName;
            $quizName->setQuizCategories($this);
        }

        return $this;
    }

    public function removeQuizName(QuizName $quizName): self
    {
        if ($this->quizNames->removeElement($quizName)) {
            // set the owning side to null (unless already changed)
            if ($quizName->getQuizCategories() === $this) {
                $quizName->setQuizCategories(null);
            }
        }

        return $this;
    }
}
