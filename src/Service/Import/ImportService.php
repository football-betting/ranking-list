<?php
declare(strict_types=1);

namespace App\Service\Import;


use App\Repository\GameWriteManagerInterface;
use App\Repository\UserWriteManagerInterface;
use App\Service\Import\Helper\GameValidator;
use App\Service\Import\Helper\GameValidatorInterface;
use App\Service\Import\Helper\ImportMapperInterface;
use App\Service\Import\Helper\JsonConverter;
use App\Service\Import\Helper\JsonConverterInterface;
use App\Service\Import\Helper\UserValidator;
use App\Service\Import\Helper\UserValidatorInterface;
use Safe\Exceptions\JsonException;

class ImportService
{
    /**
     * @var \App\Service\Import\UserWriteManagerInterface
     */
    private $userWriteManager;

    /**
     * @var \App\Service\Import\GameWriteManagerInterface
     */
    private GameWriteManagerInterface $gameWriteManager;

    /**
     * @var \App\Service\Import\Helper\ImportMapperInterface $importMapper
     */
    private $importMapper;

    /**
     * @var \App\Service\Import\GameValidatorInterface $gameValidator
     */
    private $gameValidator;

    /**
     * @var \App\Service\Import\UserValidatorInterface $userValidator
     */
    private $userValidator;

    /**
     * @var \App\Service\Import\Helper\JsonConverterInterface $jsonConverter
     */
    private $jsonConverter;

    public function __construct(
        UserWriteManagerInterface $userWriteManager,
        GameWriteManagerInterface $gameWriteManager,
        ImportMapperInterface $importMapper,
        GameValidatorInterface $gameValidator,
        UserValidatorInterface $userValidator,
        JsonConverterInterface $jsonConverter

    )
    {
        $this->userWriteManager = $userWriteManager;
        $this->gameWriteManager = $gameWriteManager;
        $this->importMapper = $importMapper;
        $this->gameValidator = $gameValidator;
        $this->userValidator = $userValidator;
        $this->jsonConverter = $jsonConverter;
    }

    /**
     * @param string $inputJson
     * @throws \JsonException
     */
    public function importCalculationList(string $inputJson): string
    {
        try {
            $userList = $this->jsonConverter->convertUserJson($inputJson)['data'];
            if ($this->userValidator->validate($userList)) {
                foreach ($userList as $user) {
                    $this->userWriteManager->save($this->importMapper->mapToUserDataProvider($user));
                }
            }
            return '';
        } catch (JsonException $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param string $inputJson
     * @throws \JsonException
     */
    public function importMatchList(string $inputJson): string
    {
        try {
            $gameList = $this->jsonConverter->convertGameJson($inputJson)['data'];
            foreach ($gameList as $game) {
                if ($this->gameValidator->validate($game)) {
                    $this->gameWriteManager->save($this->importMapper->mapToGameDataProvider($game));
                }
            }
            return '';
        } catch (JsonException $e) {
            return $e->getMessage();
        }
    }
}