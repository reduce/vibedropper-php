<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;
use Vibedropper\Client;
use Vibedropper\Core\Util;
use Vibedropper\Forms\FormDeleteResponse;
use Vibedropper\Forms\FormGetResponse;
use Vibedropper\Forms\FormListResponse;
use Vibedropper\Forms\FormListSubmissionsResponse;
use Vibedropper\Forms\FormUpdateResponse;

/**
 * @internal
 */
#[CoversNothing]
final class FormsTest extends TestCase
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

        $result = $this->client->forms->retrieve('formId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FormGetResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->forms->update('formId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FormUpdateResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->forms->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FormListResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->forms->delete('formId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FormDeleteResponse::class, $result);
    }

    #[Test]
    public function testListSubmissions(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->forms->listSubmissions('formId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FormListSubmissionsResponse::class, $result);
    }
}
