<?php

declare(strict_types=1);

namespace App\import;

use App\Entity\User;

class CsvImport implements ImportInterface
{

    /**
     * @inheritDoc
     */
    public function import(string $uri): array
    {
        $users = [];

        $handle = fopen($uri, 'r');

        /** @var array{string, string, string} $data */
        while(($data = fgetcsv($handle, 1000, ',')) !== false){

            $users[] = new User($data[0], $data[1], $data[2]);
        }

        fclose($handle);

        return $users;
    }
}