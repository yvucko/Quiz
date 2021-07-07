<?php

namespace App\Entity;

use App\Repository\QuizNameRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QuizNameRepository::class)
 */
class QuizName
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
     * @ORM\ManyToOne(targetEntity=QuizCategorie::class, inversedBy="quizNames")
     * @ORM\JoinColumn(nullable=false)
     */
    private $quiz_categories;

    /**
     * @ORM\OneToMany(targetEntity=QuizQuestions::class, mappedBy="quizName", orphanRemoval=true)
     */
    private $quizQuestions;

    public function __construct()
    {
        $this->quizQuestions = new ArrayCollection();
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

    public function getQuizCategories(): ?QuizCategorie
    {
        return $this->quiz_categories;
    }

    public function setQuizCategories(?QuizCategorie $quiz_categories): self
    {
        $this->quiz_categories = $quiz_categories;

        return $this;
    }

    /**
     * @return Collection|QuizQuestions[]
     */
    public function getQuizQuestions(): Collection
    {
        return $this->quizQuestions;
    }

    public function addQuizQuestion(QuizQuestions $quizQuestion): self
    {
        if (!$this->quizQuestions->contains($quizQuestion)) {
            $this->quizQuestions[] = $quizQuestion;
            $quizQuestion->setQuizName($this);
        }

        return $this;
    }

    public function removeQuizQuestion(QuizQuestions $quizQuestion): self
    {
        if ($this->quizQuestions->removeElement($quizQuestion)) {
            // set the owning side to null (unless already changed)
            if ($quizQuestion->getQuizName() === $this) {
                $quizQuestion->setQuizName(null);
            }
        }

        return $this;
    }
}
