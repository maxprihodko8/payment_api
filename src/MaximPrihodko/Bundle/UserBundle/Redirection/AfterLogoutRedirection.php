<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 06.09.17
 * Time: 14:41
 */

namespace MaximPrihodko\Bundle\UserBundle\Redirection;


use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Http\Logout\LogoutSuccessHandlerInterface;

class AfterLogoutRedirection implements LogoutSuccessHandlerInterface
{
    /**
     * @var RouterInterface
     */
    private $router;

    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    /**
     * Creates a Response object to send upon a successful logout.
     *
     * @param Request $request
     *
     * @return Response never null
     */
    public function onLogoutSuccess(Request $request)
    {
        $response = new RedirectResponse($this->router->generate('fos_user_security_login'));
        return $response;
    }
}