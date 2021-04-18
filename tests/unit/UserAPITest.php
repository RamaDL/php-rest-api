<?php

class UserAPITest extends PHPUnit\Framework\TestCase
{
    private $http;

    public function setUp()
    {
        $this->http = new GuzzleHttp\Client(['base_uri' => 'http://' . $_ENV['API_URL'] . ':' . $_ENV['API_PORT'] . '/']);
    }

    public function tearDown()
    {
        $this->http = null;
    }

    /** @test */
    public function get_all_users()
    {
        $response = $this->http->request('GET', 'user');

        $result = (string) $response->getBody();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('application/json', $response->getHeaderLine('Content-Type'));
        $this->assertStringContainsString('id', $result);
        $this->assertStringContainsString('first_name', $result);
        $this->assertStringContainsString('last_name', $result);
        $this->assertStringContainsString('email', $result);
        $this->assertStringContainsString('active', $result);
        $this->assertStringContainsString('updated_at', $result);
        $this->assertStringContainsString('deleted_at', $result);
        $this->assertStringContainsString('updated_at', $result);
        $this->assertStringNotContainsString('error', $result);
    }

    /** @test */
    public function get_user_by_id()
    {
        $response = $this->http->request('GET', 'user/19');

        $result = (string) $response->getBody();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('application/json', $response->getHeaderLine('Content-Type'));
        $this->assertStringContainsString('id', $result);
        $this->assertStringContainsString('first_name', $result);
        $this->assertStringContainsString('last_name', $result);
        $this->assertStringContainsString('email', $result);
        $this->assertStringContainsString('active', $result);
        $this->assertStringContainsString('updated_at', $result);
        $this->assertStringContainsString('deleted_at', $result);
        $this->assertStringContainsString('updated_at', $result);
        $this->assertStringNotContainsString('error', $result);
    }

    /** @test */
    public function try_to_post_new_user()
    {
        $response = $this->http->post('/user', [
            'json' => [
                "first_name" => "Barbara",
                "last_name"=> "Stracer",
                "email"=> "claymore@yopmail.com",
                "active"=> 0,
                "birth_day"=> "1987-01-05"
            ]
        ]);

        $result = (string) $response->getBody();

        $this->assertEquals(201, $response->getStatusCode());
        $this->assertEquals('application/json', $response->getHeaderLine('Content-Type'));
        $this->assertStringContainsString('id', $result);
        $this->assertStringContainsString('Barbara', $result);
        $this->assertStringContainsString('Stracer', $result);
        $this->assertStringContainsString('claymore@yopmail.com', $result);
        $this->assertStringContainsString('1987-01-05', $result);
        $this->assertStringContainsString('active', $result);
        $this->assertStringContainsString('updated_at', $result);
        $this->assertStringContainsString('deleted_at', $result);
        $this->assertStringContainsString('updated_at', $result);
        $this->assertStringNotContainsString('error', $result);
    }

    /** @test */
    public function try_to_update_user()
    {
        $response = $this->http->put('/user/19', [
            'json' => [
                "first_name" => "Aleksander",
                "last_name"=> "Abramov",
                "email"=> "aa@yopmail.com",
                "active"=> 0,
                "birth_day"=> "1987-01-05"
            ]
        ]);

        $result = (string) $response->getBody();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('application/json', $response->getHeaderLine('Content-Type'));
        $this->assertStringContainsString('id', $result);
        $this->assertStringContainsString('Aleksander', $result);
        $this->assertStringContainsString('Abramov', $result);
        $this->assertStringContainsString('aa@yopmail.com', $result);
        $this->assertStringContainsString('1987-01-05', $result);
        $this->assertStringContainsString('active', $result);
        $this->assertStringContainsString('updated_at', $result);
        $this->assertStringContainsString('deleted_at', $result);
        $this->assertStringContainsString('updated_at', $result);
        $this->assertStringNotContainsString('error', $result);
    }

    /** @test */
    public function try_to_delete_user()
    {
        $response = $this->http->delete('/user/19');

        $result = (string) $response->getBody();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('application/json', $response->getHeaderLine('Content-Type'));
        $this->assertStringContainsString('id', $result);
        $this->assertStringContainsString('first_name', $result);
        $this->assertStringContainsString('last_name', $result);
        $this->assertStringContainsString('email', $result);
        $this->assertStringContainsString('active', $result);
        $this->assertStringContainsString('updated_at', $result);
        $this->assertStringContainsString('deleted_at', $result);
        $this->assertStringContainsString('updated_at', $result);
        $this->assertStringNotContainsString('error', $result);
    }
}
