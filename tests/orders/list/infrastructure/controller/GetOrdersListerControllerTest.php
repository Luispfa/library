<?php

declare(strict_types=1);

namespace App\Tests\list\infrastructure\controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GetOrdersListerControllerTest extends WebTestCase
{
    public function test_should_return_list_of_orders(): void
    {
        $client = static::createClient();
        $client->request('GET', '/orders-lister');

        $response = $client->getResponse();
        $content = $response->getContent();

        self::assertSame(200, $response->getStatusCode());
        self::assertJson($content);

        $data = json_decode($content, true);
        self::assertArrayHasKey('id', $data[0]);
        self::assertArrayHasKey('name', $data[0]);
        self::assertArrayHasKey('totalPrice', $data[0]);

        self::assertEquals(1, $data[0]['id']);
        self::assertEquals('order 1 in File', $data[0]['name']);
        self::assertEquals(0, $data[0]['totalPrice']);
    }
}
