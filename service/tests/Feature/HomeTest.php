<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{
    /**
     * HTTPステータスコード200の検証
     */
    public function testStatusCode(): void
    {
        $response = $this->get('/home'); /* アクセス結果を$responseに格納 */
        $response->assertStatus(200); /* $responseのHHTTPステータスコードが200であることを検証 */
    }

    /**
     * HTTPステータスコード200の検証
     */
    public function testBody(): void
    {
        $response = $this->get('/home');
        $response->assertSeeText('こんにちは！');
    }
}
