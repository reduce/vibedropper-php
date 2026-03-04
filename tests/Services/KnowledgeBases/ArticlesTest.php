<?php

namespace Tests\Services\KnowledgeBases;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;
use Vibedropper\Client;
use Vibedropper\Core\Util;
use Vibedropper\KnowledgeBases\Articles\ArticleListResponse;
use Vibedropper\KnowledgeBases\Articles\ArticleNewResponse;

/**
 * @internal
 */
#[CoversNothing]
final class ArticlesTest extends TestCase
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
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->knowledgeBases->articles->create(
            'kbId',
            title: 'title'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ArticleNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->knowledgeBases->articles->create(
            'kbId',
            title: 'title',
            categoryID: 'categoryId',
            content: 'content',
            excerpt: 'excerpt',
            published: true,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ArticleNewResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->knowledgeBases->articles->list('kbId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ArticleListResponse::class, $result);
    }
}
