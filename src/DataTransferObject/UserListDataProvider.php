<?php
declare(strict_types=1);
namespace App\DataTransferObject;

/**
 * Auto generated data provider
 */
final class UserListDataProvider extends \Xervice\DataProvider\Business\Model\DataProvider\AbstractDataProvider implements \Xervice\DataProvider\Business\Model\DataProvider\DataProviderInterface
{
    /** @var string */
    protected $event;

    /** @var \App\DataTransferObject\UserDataProvider[] */
    protected $data = [];


    /**
     * @return string
     */
    public function getEvent(): string
    {
        return $this->event;
    }


    /**
     * @param string $event
     * @return UserListDataProvider
     */
    public function setEvent(string $event)
    {
        $this->event = $event;

        return $this;
    }


    /**
     * @return UserListDataProvider
     */
    public function unsetEvent()
    {
        $this->event = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasEvent()
    {
        return ($this->event !== null && $this->event !== []);
    }


    /**
     * @return \App\DataTransferObject\UserDataProvider[]
     */
    public function getData(): array
    {
        return $this->data;
    }


    /**
     * @param \App\DataTransferObject\UserDataProvider[] $data
     * @return UserListDataProvider
     */
    public function setData(array $data)
    {
        $this->data = $data;

        return $this;
    }


    /**
     * @return UserListDataProvider
     */
    public function unsetData()
    {
        $this->data = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasData()
    {
        return ($this->data !== null && $this->data !== []);
    }


    /**
     * @param \App\DataTransferObject\UserDataProvider $Data
     * @return UserListDataProvider
     */
    public function addData(UserDataProvider $Data)
    {
        $this->data[] = $Data; return $this;
    }


    /**
     * @return array
     */
    protected function getElements(): array
    {
        return array (
          'event' =>
          array (
            'name' => 'event',
            'allownull' => false,
            'default' => '',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'data' =>
          array (
            'name' => 'data',
            'allownull' => false,
            'default' => '',
            'type' => '\\App\\DataTransferObject\\UserDataProvider[]',
            'is_collection' => true,
            'is_dataprovider' => false,
            'isCamelCase' => false,
            'singleton' => 'Data',
            'singleton_type' => '\\App\\DataTransferObject\\UserDataProvider',
          ),
        );
    }
}
