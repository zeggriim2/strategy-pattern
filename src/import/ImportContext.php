<?php

declare(strict_types=1);

namespace App\import;

use function Symfony\Component\String\u;

final class ImportContext implements ImportContextInterface
{

    /** @var array<array-key, ImportInterface>  */
    private array $imports = [];

    public function register(ImportInterface $import): self
    {
        $this->imports[] = $import;

        return $this;
    }

    /*
     * @inheritDoc
     */
    public function execute(string $uri): array
    {
        return match(u($uri)->afterLast('.')->toString()){
            'csv' => $this->imports[0]->import($uri),
            'json' => $this->imports[1]->import($uri),
            default => throw new \RuntimeException('No importer found for '. $uri),
        };
    }
}