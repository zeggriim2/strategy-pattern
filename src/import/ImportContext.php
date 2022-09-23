<?php

declare(strict_types=1);

namespace App\import;

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
//        foreach ($this->imports as $import){
//
//        }
        return [];
    }
}