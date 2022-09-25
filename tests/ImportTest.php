<?php

declare(strict_types=1);

namespace App\Tests;

use App\Entity\User;
use App\import\CsvImport;
use App\import\ImportContext;
use App\import\JsonImport;
use PHPUnit\Framework\TestCase;

class ImportTest extends TestCase
{
    private ImportContext $importContext;

    protected function setUp(): void
    {
        $this->importContext = (new ImportContext())
            ->register('csv', new CsvImport())
            ->register('json', new JsonImport())
        ;
    }

    /**
     * @dataProvider providerUri
     */
    public function testImport(string $uri): void
    {
        $users = $this->importContext->execute($uri);
        self::assertCount(3, $users);
        self::assertContainsOnlyInstancesOf(User::class, $users);
    }

    public function providerUri(): \Generator
    {
        yield 'csv' => [__DIR__. '\Fixtures\user.csv'];
        yield 'json' => [__DIR__. '\Fixtures\user.json'];
    }
}