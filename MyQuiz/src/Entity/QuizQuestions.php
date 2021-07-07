<?php

namespace App\Entity;

use App\Repository\QuizQuestionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QuizQuestionsRepository::class)
 */
class QuizQuestions
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
     * @ORM\ManyToOne(targetEntity=QuizName::class, inversedBy="quizQuestions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $quizName;

    /**
     * @ORM\OneToMany(targetEntity=QuizAnswers::class, mappedBy="quizQuestions", orphanRemoval=true)
     */
    private $quizAnswers;

    public function __construct()
    {
        $this->quizAnswers = new ArrayCollection();
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

    public function getQuizName(): ?QuizName
    {
        return $this->quizName;
    }

    public function setQuizName(?QuizName $quizName): self
    {
        $this->quizName = $quizName;

        return $this;
    }
    public function __toString()
    {
        return $this->name;
    }

    /**
     * @return Collection|QuizAnswers[]
     */
    public function getQuizAnswers(): Collection
    {
        return $this->quizAnswers;
    }

    public function addQuizAnswer(QuizAnswers $quizAnswer): self
    {
        if (!$this->quizAnswers->contains($quizAnswer)) {
            $this->quizAnswers[] = $quizAnswer;
            $quizAnswer->setQuizQuestions($this);
        }

        return $this;
    }

    public function removeQuizAnswer(QuizAnswers $quizAnswer): self
    {
        if ($this->quizAnswers->removeElement($quizAnswer)) {
            // set the owning side to null (unless already changed)
            if ($quizAnswer->getQuizQuestions() === $this) {
                $quizAnswer->setQuizQuestions(null);
            }
        }

        return $this;
    }
}
