<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToMany as ManyToMany;
use Doctrine\ORM\Mapping\JoinTable as JoinTable;
use Doctrine\ORM\Mapping\JoinColumn as JoinColumn;
use function Sodium\add;

/**
 * Quiz
 *
 * @ORM\Table(name="quizzes")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\QuizRepository")
 */
class Quiz
{

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="leader", type="string", nullable=true)
     */
    private $leader;

    /**
     * @var string
     *
     * @ORM\Column(name="countOfQuestions", type="integer", length=255)
     */
    private $countOfQuestions;

    /**
     * @var int
     *
     * @ORM\Column(name="countOfPlayers", type="integer")
     */
    private $countOfPlayers = 0;

    /**
     * @var boolean
     *
     * @ORM\Column(name="enabled", type="boolean")
     */
    private $enabled = true;


    public function getId(): int
    {
        return $this->id;
    }

    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): Quiz
    {
        $this->enabled = $enabled;

        return $this;
    }

    public function getEnabled(): string
    {
        if ($this->enabled) {
            return "true";
        } else {
            return "false";
        }
    }

    public function setName($name): Quiz
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLeader(): ?string
    {
        return $this->leader;
    }

    public function setLeader(string $leader): Quiz
    {
        $this->leader = $leader;

        return $this;
    }

    public function setCountOfQuestions($countOfQuestions): Quiz
    {
        $this->countOfQuestions = $countOfQuestions;

        return $this;
    }

    public function getCountOfQuestions(): int
    {
        return $this->countOfQuestions;
    }

    public function addPlayer(): Quiz
    {
        $this->countOfPlayers += 1;

        return $this;
    }

    public function removePlayer(): Quiz
    {
        $this->countOfPlayers -= 1;

        return $this;
    }

    public function getCountOfPlayers(): int
    {
        return $this->countOfPlayers;
    }
}

