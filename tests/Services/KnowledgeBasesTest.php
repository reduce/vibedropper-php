<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;
use Vibedropper\Client;
use Vibedropper\Core\Util;
use Vibedropper\KnowledgeBases\KnowledgeBaseGetResponse;
use Vibedropper\KnowledgeBases\KnowledgeBaseListResponse;
use Vibedropper\KnowledgeBases\KnowledgeBaseUpdateResponse;

/**
 * @internal
 */
#[CoversNothing]
final class KnowledgeBasesTest extends TestCase
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

        $result = $this->client->knowledgeBases->retrieve('kbId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(KnowledgeBaseGetResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->knowledgeBases->update('kbId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(KnowledgeBaseUpdateResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->knowledgeBases->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(KnowledgeBaseListResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->knowledgeBases->delete('kbId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }
}
