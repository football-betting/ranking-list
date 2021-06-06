<?php
declare(strict_types=1);

namespace App\Service\Import\Helper;


class JsonConverter implements JsonConverterInterface
{
    /**
     * @param string $gameJson
     * @return array
     * @throws \JsonException
     */
    public function convertGameJson(string $gameJson):array
    {
        return json_decode($gameJson, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @param string $userJson
     * @return array
     * @throws \JsonException
     */
    public function convertUserJson(string $userJson):array
    {
        return json_decode($userJson, true, 512, JSON_THROW_ON_ERROR);
    }

}