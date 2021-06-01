<?php


namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GameRepository")
 */

class Game
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
     * @ORM\Column(type="string", length=255)
     */
    private $team1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $team2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $matchDatetime;

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
    public function getTeam1()
    {
        return $this->team1;
    }

    /**
     * @param mixed $team1
     */
    public function setTeam1($team1): void
    {
        $this->team1 = $team1;
    }

    /**
     * @return mixed
     */
    public function getTeam2()
    {
        return $this->team2;
    }

    /**
     * @param mixed $team2
     */
    public function setTeam2($team2): void
    {
        $this->team2 = $team2;
    }

    /**
     * @return mixed
     */
    public function getMatchDatetime()
    {
        return $this->matchDatetime;
    }

    /**
     * @param mixed $matchDatetime
     */
    public function setMatchDatetime($matchDatetime): void
    {
        $this->matchDatetime = $matchDatetime;
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