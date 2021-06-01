<?php


namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TipRepository")
 */

class Tip
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $matchId;


    /**
     * @ORM\Column(type="integer")
     */
    private $score;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $scoreTeam1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $scoreTeam2;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getMatchId()
    {
        return $this->matchId;
    }

    /**
     * @param mixed $matchId
     */
    public function setMatchId($matchId): void
    {
        $this->matchId = $matchId;
    }

    /**
     * @return mixed
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @param mixed $score
     */
    public function setScore($score): void
    {
        $this->score = $score;
    }

    /**
     * @return mixed
     */
    public function getScoreTeam1()
    {
        return $this->scoreTeam1;
    }

    /**
     * @param mixed $scoreTeam1
     */
    public function setScoreTeam1($scoreTeam1): void
    {
        $this->scoreTeam1 = $scoreTeam1;
    }

    /**
     * @return mixed
     */
    public function getScoreTeam2()
    {
        return $this->scoreTeam2;
    }

    /**
     * @param mixed $scoreTeam2
     */
    public function setScoreTeam2($scoreTeam2): void
    {
        $this->scoreTeam2 = $scoreTeam2;
    }

}