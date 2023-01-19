<?php

declare(strict_types=1);

namespace Tests\Contracts;

use Meilisearch\Contracts\KeysQuery;
use PHPUnit\Framework\TestCase;

class KeysQueryTest extends TestCase
{
    public function testToArrayWithSetOffsetAndSetLimit(): void
    {
        $data = (new KeysQuery())->setLimit(10)->setOffset(18);

        $this->assertEquals($data->toArray(), ['limit' => 10, 'offset' => 18]);
    }

    public function testToArrayWithSetOffset(): void
    {
        $data = (new KeysQuery())->setOffset(5);

        $this->assertEquals($data->toArray(), ['offset' => 5]);
    }

    public function testToArrayWithoutSet(): void
    {
        $data = new KeysQuery();

        $this->assertEquals($data->toArray(), []);
    }

    public function testToArrayWithZeros(): void
    {
        $data = (new KeysQuery())->setLimit(0)->setOffset(0);

        $this->assertEquals($data->toArray(), ['limit' => 0, 'offset' => 0]);
    }
}