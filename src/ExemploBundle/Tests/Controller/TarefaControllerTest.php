<?php

namespace ExemploBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TarefaControllerTest extends WebTestCase
{
    public function testListar()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/listar');
    }

    public function testStatus()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/listar/status');
    }

}
