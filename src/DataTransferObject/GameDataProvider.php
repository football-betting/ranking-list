<?php
declare(strict_types=1);
namespace App\DataTransferObject;

/**
 * Auto generated data provider
 */
final class GameDataProvider extends \Xervice\DataProvider\Business\Model\DataProvider\AbstractDataProvider implements \Xervice\DataProvider\Business\Model\DataProvider\DataProviderInterface
{
    /** @var int */
    protected $ident;

    /** @var string */
    protected $matchId;

    /** @var string */
    protected $team1;

    /** @var string */
    protected $team2;

    /** @var string */
    protected $matchDatetime;

    /** @var string */
    protected $scoreTeam1;

    /** @var string */
    protected $scoreTeam2;


    /**
     * @return int
     */
    public function getIdent(): int
    {
        return $this->ident;
    }


    /**
     * @param int $ident
     * @return GameDataProvider
     */
    public function setIdent(int $ident)
    {
        $this->ident = $ident;

        return $this;
    }


    /**
     * @return GameDataProvider
     */
    public function unsetIdent()
    {
        $this->ident = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasIdent()
    {
        return ($this->ident !== null && $this->ident !== []);
    }


    /**
     * @return string
     */
    public function getMatchId(): string
    {
        return $this->matchId;
    }


    /**
     * @param string $matchId
     * @return GameDataProvider
     */
    public function setMatchId(string $matchId)
    {
        $this->matchId = $matchId;

        return $this;
    }


    /**
     * @return GameDataProvider
     */
    public function unsetMatchId()
    {
        $this->matchId = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasMatchId()
    {
        return ($this->matchId !== null && $this->matchId !== []);
    }


    /**
     * @return string
     */
    public function getTeam1(): string
    {
        return $this->team1;
    }


    /**
     * @param string $team1
     * @return GameDataProvider
     */
    public function setTeam1(string $team1)
    {
        $this->team1 = $team1;

        return $this;
    }


    /**
     * @return GameDataProvider
     */
    public function unsetTeam1()
    {
        $this->team1 = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasTeam1()
    {
        return ($this->team1 !== null && $this->team1 !== []);
    }


    /**
     * @return string
     */
    public function getTeam2(): string
    {
        return $this->team2;
    }


    /**
     * @param string $team2
     * @return GameDataProvider
     */
    public function setTeam2(string $team2)
    {
        $this->team2 = $team2;

        return $this;
    }


    /**
     * @return GameDataProvider
     */
    public function unsetTeam2()
    {
        $this->team2 = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasTeam2()
    {
        return ($this->team2 !== null && $this->team2 !== []);
    }


    /**
     * @return string
     */
    public function getMatchDatetime(): string
    {
        return $this->matchDatetime;
    }


    /**
     * @param string $matchDatetime
     * @return GameDataProvider
     */
    public function setMatchDatetime(string $matchDatetime)
    {
        $this->matchDatetime = $matchDatetime;

        return $this;
    }


    /**
     * @return GameDataProvider
     */
    public function unsetMatchDatetime()
    {
        $this->matchDatetime = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasMatchDatetime()
    {
        return ($this->matchDatetime !== null && $this->matchDatetime !== []);
    }


    /**
     * @return string
     */
    public function getScoreTeam1(): ?string
    {
        return $this->scoreTeam1;
    }


    /**
     * @param string $scoreTeam1
     * @return GameDataProvider
     */
    public function setScoreTeam1(?string $scoreTeam1 = null)
    {
        $this->scoreTeam1 = $scoreTeam1;

        return $this;
    }


    /**
     * @return GameDataProvider
     */
    public function unsetScoreTeam1()
    {
        $this->scoreTeam1 = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasScoreTeam1()
    {
        return ($this->scoreTeam1 !== null && $this->scoreTeam1 !== []);
    }


    /**
     * @return string
     */
    public function getScoreTeam2(): ?string
    {
        return $this->scoreTeam2;
    }


    /**
     * @param string $scoreTeam2
     * @return GameDataProvider
     */
    public function setScoreTeam2(?string $scoreTeam2 = null)
    {
        $this->scoreTeam2 = $scoreTeam2;

        return $this;
    }


    /**
     * @return GameDataProvider
     */
    public function unsetScoreTeam2()
    {
        $this->scoreTeam2 = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasScoreTeam2()
    {
        return ($this->scoreTeam2 !== null && $this->scoreTeam2 !== []);
    }


    /**
     * @return array
     */
    protected function getElements(): array
    {
        return array (
          'ident' =>
          array (
            'name' => 'ident',
            'allownull' => false,
            'default' => '',
            'type' => 'int',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'matchId' =>
          array (
            'name' => 'matchId',
            'allownull' => false,
            'default' => '',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'team1' =>
          array (
            'name' => 'team1',
            'allownull' => false,
            'default' => '',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'team2' =>
          array (
            'name' => 'team2',
            'allownull' => false,
            'default' => '',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'matchDatetime' =>
          array (
            'name' => 'matchDatetime',
            'allownull' => false,
            'default' => '',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'scoreTeam1' =>
          array (
            'name' => 'scoreTeam1',
            'allownull' => true,
            'default' => '',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'scoreTeam2' =>
          array (
            'name' => 'scoreTeam2',
            'allownull' => true,
            'default' => '',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
        );
    }
}
