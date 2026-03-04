<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;
use Vibedropper\Client;
use Vibedropper\Core\Util;
use Vibedropper\Pages\PageDeleteResponse;
use Vibedropper\Pages\PageGetResponse;
use Vibedropper\Pages\PageListResponse;
use Vibedropper\Pages\PageUpdateResponse;

/**
 * @internal
 */
#[CoversNothing]
final class PagesTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->pages->retrieve('pageId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PageGetResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->pages->update('pageId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PageUpdateResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->pages->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PageListResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->pages->delete('pageId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PageDeleteResponse::class, $result);
    }
}
