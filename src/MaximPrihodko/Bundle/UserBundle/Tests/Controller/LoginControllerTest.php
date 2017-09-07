<?php

namespace MaximPrihodko\Bundle\UserBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LoginControllerTest extends WebTestCase
{
    public function testLogincheck()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/loginCheck');
    }

}
