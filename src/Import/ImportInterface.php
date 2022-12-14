<?php

declare(strict_types=1);

namespace App\Import;

use App\Entity\User;

interface ImportInterface
{
    /**
     * @param string $uri
     * @return array<array-key, User>
     */
    public function import(string $uri): array;

    public static function supports(string $uri): bool;
}