<?php
declare(strict_types=1);
namespace App\DataTransferObject;

/**
 * Auto generated data provider
 */
final class TipDataProvider extends \Xervice\DataProvider\Business\Model\DataProvider\AbstractDataProvider implements \Xervice\DataProvider\Business\Model\DataProvider\DataProviderInterface
{
    /** @var int */
    protected $ident;

    /** @var string */
    protected $matchId;

    /** @var int */
    protected $score;

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
     * @return TipDataProvider
     */
    public function setIdent(int $ident)
    {
        $this->ident = $ident;

        return $this;
    }


    /**
     * @return TipDataProvider
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
     * @return TipDataProvider
     */
    public function setMatchId(string $matchId)
    {
        $this->matchId = $matchId;

        return $this;
    }


    /**
     * @return TipDataProvider
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
     * @return int
     */
    public function getScore(): int
    {
        return $this->score;
    }


    /**
     * @param int $score
     * @return TipDataProvider
     */
    public function setScore(int $score)
    {
        $this->score = $score;

        return $this;
    }


    /**
     * @return TipDataProvider
     */
    public function unsetScore()
    {
        $this->score = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasScore()
    {
        return ($this->score !== null && $this->score !== []);
    }


    /**
     * @return string
     */
    public function getScoreTeam1(): string
    {
        return $this->scoreTeam1;
    }


    /**
     * @param string $scoreTeam1
     * @return TipDataProvider
     */
    public function setScoreTeam1(string $scoreTeam1)
    {
        $this->scoreTeam1 = $scoreTeam1;

        return $this;
    }


    /**
     * @return TipDataProvider
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
    public function getScoreTeam2(): string
    {
        return $this->scoreTeam2;
    }


    /**
     * @param string $scoreTeam2
     * @return TipDataProvider
     */
    public function setScoreTeam2(string $scoreTeam2)
    {
        $this->scoreTeam2 = $scoreTeam2;

        return $this;
    }


    /**
     * @return TipDataProvider
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
          'score' =>
          array (
            'name' => 'score',
            'allownull' => false,
            'default' => '',
            'type' => 'int',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'scoreTeam1' =>
          array (
            'name' => 'scoreTeam1',
            'allownull' => false,
            'default' => '',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'scoreTeam2' =>
          array (
            'name' => 'scoreTeam2',
            'allownull' => false,
            'default' => '',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
        );
    }
}
