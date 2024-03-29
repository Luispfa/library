<?php

declare(strict_types=1);

namespace App\Tests\list\infrastructure\controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GetOrdersListerControllerTest extends WebTestCase
{
    public function test_should_return_list_of_orders(): void
    {
        $client = static::createClient();
        $client->request(Request::METHOD_GET, '/orders-lister');

        $response = $client->getResponse();
        $content = $response->getContent();

        self::assertSame(Response::HTTP_OK, $response->getStatusCode());
        self::assertJson($content);

        $data = json_decode($content, true);
        self::assertArrayHasKey('id', $data[0]);
        self::assertArrayHasKey('name', $data[0]);
        self::assertArrayHasKey('totalPrice', $data[0]);

        self::assertEquals('68ba2622-c8da-41d7-9a5c-64a19214d7de', $data[0]['id']);
        self::assertEquals('order 1 in dataBase', $data[0]['name']);
        self::assertEquals(0, $data[0]['totalPrice']);
    }
}
