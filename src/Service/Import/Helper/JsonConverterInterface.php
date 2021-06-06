<?php
declare(strict_types=1);
namespace App\Service\Import\Helper;

interface JsonConverterInterface
{
    /**
     * @param string $gameJson
     * @return array
     * @throws \JsonException
     */
    public function convertGameJson(string $gameJson): array;

    /**
     * @param string $userJson
     * @return array
     * @throws \JsonException
     */
    public function convertUserJson(string $userJson): array;
}