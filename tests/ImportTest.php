<?php

declare(strict_types=1);

namespace App\Tests;

use App\Entity\User;
use App\Import\ImportContextInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ImportTest extends KernelTestCase
{
    /**
     * @dataProvider providerUri
     */
    public function testImport(string $uri): void
    {

        self::bootKernel();

        /** @var ImportContextInterface $importsContext */
        $importsContext = static::getContainer()->get(ImportContextInterface::class);

        $users = $importsContext->execute($uri);
        self::assertCount(3, $users);
        self::assertContainsOnlyInstancesOf(User::class, $users);
    }

    public function providerUri(): \Generator
    {
        yield 'csv' => [__DIR__. '\Fixtures\user.csv'];
        yield 'json' => [__DIR__. '\Fixtures\user.json'];
    }
}