<?php
declare(strict_types=1);
namespace App\DataTransferObject;

/**
 * Auto generated data provider
 */
final class UserDataProvider extends \Xervice\DataProvider\Business\Model\DataProvider\AbstractDataProvider implements \Xervice\DataProvider\Business\Model\DataProvider\DataProviderInterface
{
    /** @var int */
    protected $ident;

    /** @var string */
    protected $name;

    /** @var int */
    protected $position;

    /** @var int */
    protected $scoreSum;

    /** @var \App\DataTransferObject\TipDataProvider */
    protected $tips;


    /**
     * @return int
     */
    public function getIdent(): int
    {
        return $this->ident;
    }


    /**
     * @param int $ident
     * @return UserDataProvider
     */
    public function setIdent(int $ident)
    {
        $this->ident = $ident;

        return $this;
    }


    /**
     * @return UserDataProvider
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
    public function getName(): string
    {
        return $this->name;
    }


    /**
     * @param string $name
     * @return UserDataProvider
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }


    /**
     * @return UserDataProvider
     */
    public function unsetName()
    {
        $this->name = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasName()
    {
        return ($this->name !== null && $this->name !== []);
    }


    /**
     * @return int
     */
    public function getPosition(): int
    {
        return $this->position;
    }


    /**
     * @param int $position
     * @return UserDataProvider
     */
    public function setPosition(int $position)
    {
        $this->position = $position;

        return $this;
    }


    /**
     * @return UserDataProvider
     */
    public function unsetPosition()
    {
        $this->position = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasPosition()
    {
        return ($this->position !== null && $this->position !== []);
    }


    /**
     * @return int
     */
    public function getScoreSum(): int
    {
        return $this->scoreSum;
    }


    /**
     * @param int $scoreSum
     * @return UserDataProvider
     */
    public function setScoreSum(int $scoreSum)
    {
        $this->scoreSum = $scoreSum;

        return $this;
    }


    /**
     * @return UserDataProvider
     */
    public function unsetScoreSum()
    {
        $this->scoreSum = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasScoreSum()
    {
        return ($this->scoreSum !== null && $this->scoreSum !== []);
    }


    /**
     * @return \App\DataTransferObject\TipDataProvider
     */
    public function getTips(): TipDataProvider
    {
        return $this->tips;
    }


    /**
     * @param \App\DataTransferObject\TipDataProvider $tips
     * @return UserDataProvider
     */
    public function setTips(TipDataProvider $tips)
    {
        $this->tips = $tips;

        return $this;
    }


    /**
     * @return UserDataProvider
     */
    public function unsetTips()
    {
        $this->tips = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasTips()
    {
        return ($this->tips !== null && $this->tips !== []);
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
          'name' =>
          array (
            'name' => 'name',
            'allownull' => false,
            'default' => '',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'position' =>
          array (
            'name' => 'position',
            'allownull' => false,
            'default' => '',
            'type' => 'int',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'scoreSum' =>
          array (
            'name' => 'scoreSum',
            'allownull' => false,
            'default' => '',
            'type' => 'int',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'tips' =>
          array (
            'name' => 'tips',
            'allownull' => false,
            'default' => '',
            'type' => '\\App\\DataTransferObject\\TipDataProvider',
            'is_collection' => false,
            'is_dataprovider' => true,
            'isCamelCase' => false,
          ),
        );
    }
}
