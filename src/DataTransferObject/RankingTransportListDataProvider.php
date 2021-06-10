<?php
declare(strict_types=1);
namespace App\DataTransferObject;

/**
 * Auto generated data provider
 */
final class RankingTransportListDataProvider extends \Xervice\DataProvider\Business\Model\DataProvider\AbstractDataProvider implements \Xervice\DataProvider\Business\Model\DataProvider\DataProviderInterface
{
    /** @var \App\DataTransferObject\MatchListDataProvider */
    protected $games;

    /** @var \App\DataTransferObject\RankingListDataProvider */
    protected $rankings;


    /**
     * @return \App\DataTransferObject\MatchListDataProvider
     */
    public function getGames(): MatchListDataProvider
    {
        return $this->games;
    }


    /**
     * @param \App\DataTransferObject\MatchListDataProvider $games
     * @return RankingTransportListDataProvider
     */
    public function setGames(MatchListDataProvider $games)
    {
        $this->games = $games;

        return $this;
    }


    /**
     * @return RankingTransportListDataProvider
     */
    public function unsetGames()
    {
        $this->games = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasGames()
    {
        return ($this->games !== null && $this->games !== []);
    }


    /**
     * @return \App\DataTransferObject\RankingListDataProvider
     */
    public function getRankings(): RankingListDataProvider
    {
        return $this->rankings;
    }


    /**
     * @param \App\DataTransferObject\RankingListDataProvider $rankings
     * @return RankingTransportListDataProvider
     */
    public function setRankings(RankingListDataProvider $rankings)
    {
        $this->rankings = $rankings;

        return $this;
    }


    /**
     * @return RankingTransportListDataProvider
     */
    public function unsetRankings()
    {
        $this->rankings = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasRankings()
    {
        return ($this->rankings !== null && $this->rankings !== []);
    }


    /**
     * @return array
     */
    protected function getElements(): array
    {
        return array (
          'games' =>
          array (
            'name' => 'games',
            'allownull' => false,
            'default' => '',
            'type' => '\\App\\DataTransferObject\\MatchListDataProvider',
            'is_collection' => false,
            'is_dataprovider' => true,
            'isCamelCase' => false,
          ),
          'rankings' =>
          array (
            'name' => 'rankings',
            'allownull' => false,
            'default' => '',
            'type' => '\\App\\DataTransferObject\\RankingListDataProvider',
            'is_collection' => false,
            'is_dataprovider' => true,
            'isCamelCase' => false,
          ),
        );
    }
}
