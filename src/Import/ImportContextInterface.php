<?php

declare(strict_types=1);

namespace App\Import;

use App\Entity\User;

interface ImportContextInterface
{
    /**
     * @param string $uri
     * @return array<array-key, User>
     */
    public function execute(string $uri): array;
}