<?php

declare(strict_types=1);

namespace App\import;

use App\Entity\User;

interface ImportContextInterface
{
    public function register(ImportInterface $import): ImportContextInterface;

    /**
     * @param string $uri
     * @return array<array-key, User>
     */
    public function execute(string $uri): array;
}