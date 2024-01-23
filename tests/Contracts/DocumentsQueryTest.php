<?php

declare(strict_types=1);

namespace Tests\Contracts;

use Meilisearch\Contracts\DocumentsQuery;
use PHPUnit\Framework\TestCase;

class DocumentsQueryTest extends TestCase
{
    public function testSetFields(): void
    {
        $data = (new DocumentsQuery())->setLimit(10)->setFields(['abc', 'xyz']);

        self::assertSame(['limit' => 10, 'fields' => 'abc,xyz'], $data->toArray());
    }

    public function testToArrayWithoutSetFields(): void
    {
        $data = (new DocumentsQuery())->setLimit(10);

        self::assertSame(['limit' => 10], $data->toArray());
    }

    public function testToArrayWithoutSetOffset(): void
    {
        $data = (new DocumentsQuery())->setOffset(10);

        self::assertSame(['offset' => 10], $data->toArray());
    }

    public function testToArrayWithZeros(): void
    {
        $data = (new DocumentsQuery())->setLimit(0)->setOffset(0);

        self::assertSame(['offset' => 0, 'limit' => 0], $data->toArray());
    }
}
