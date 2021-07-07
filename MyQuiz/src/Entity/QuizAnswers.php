<?php

namespace App\Entity;

use App\Repository\QuizAnswersRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QuizAnswersRepository::class)
 */
class QuizAnswers
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
     * @ORM\Column(type="string", length=255)
     */
    private $expectedAnswer;

    /**
     * @ORM\ManyToOne(targetEntity=QuizQuestions::class, inversedBy="quizAnswers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $quizQuestions;

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

    public function getExpectedAnswer(): ?string
    {
        return $this->expectedAnswer;
    }

    public function setExpectedAnswer(string $expectedAnswer): self
    {
        $this->expectedAnswer = $expectedAnswer;

        return $this;
    }

    public function getQuizQuestions(): ?QuizQuestions
    {
        return $this->quizQuestions;
    }

    public function setQuizQuestions(?QuizQuestions $quizQuestions): self
    {
        $this->quizQuestions = $quizQuestions;

        return $this;
    }
}
