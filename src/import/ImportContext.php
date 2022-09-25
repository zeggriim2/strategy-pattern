<?php

declare(strict_types=1);

namespace App\import;

use function Symfony\Component\String\u;

final class ImportContext implements ImportContextInterface
{

    /** @var array<string, ImportInterface>  */
    private array $imports = [];

    public function register(string $extension, ImportInterface $import): self
    {
        $this->imports[$extension] = $import;

        return $this;
    }

    /*
     * @inheritDoc
     */
    public function execute(string $uri): array
    {
        return $this->imports[u($uri)->afterLast('.')->toString()]->import($uri);
    }
}