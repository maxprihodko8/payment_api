<?php

namespace MaximPrihodko\Bundle\UserBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Client;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class DefaultControllerTest extends WebTestCase
{

    /**
     * @var Client
     */
    private $client = null;


    public function setUp()
    {
        $this->client = static::createClient();
    }

    public function testLoginPage() {

        $this->client = static::createClient();
        $username = 'admin';
        $password = 'admin';

        $crawler = $this->client->request('GET', '/login');
        $form = $crawler->selectButton('fs-submit')->form();


        $crawler = $this->client
            ->submit($form,
                array(
                    '_username' => $username,
                    '_password' => $password,
                )
            );
        $this->client->followRedirect();
        $this->assertSame('Welcome to the FrontendController:index page', $crawler->filter('h1')->text());

    }

    private function logIn()
    {
        $session = $this->client->getContainer()->get('session');

        $firewallContext = 'secured_area';

        $token = new UsernamePasswordToken('admin', 'admin', $firewallContext, array('ROLE_ADMIN'));
        $session->set('_security_'.$firewallContext, serialize($token));
        $session->save();

        $cookie = new Cookie($session->getName(), $session->getId());
        $this->client->getCookieJar()->set($cookie);
    }
}
