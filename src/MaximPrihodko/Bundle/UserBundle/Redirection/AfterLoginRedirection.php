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
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;

/**
 * Class AfterLoginRedirection
 * @package MaximPrihodko\Bundle\UserBundle\Redirection
 */
class AfterLoginRedirection implements AuthenticationSuccessHandlerInterface
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
     * This is called when an interactive authentication attempt succeeds. This
     * is called by authentication listeners inheriting from
     * AbstractAuthenticationListener.
     *
     * @param Request $request
     * @param TokenInterface $token
     *
     * @return Response never null
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        // Get list of roles for current user
        $roles = $token->getRoles();
        // Tranform this list in array
        $rolesTab = array_map(
            function ($role) {
                return $role->getRole();
            }, $roles);
        if (in_array('ROLE_ADMIN', $rolesTab, true) || in_array('ROLE_SUPER_ADMIN', $rolesTab, true))
            $redirection = new RedirectResponse($this->router->generate('frontend_index')); // @TODO make backend link
        elseif (in_array('ROLE_USER', $rolesTab, true))
            $redirection = new RedirectResponse($this->router->generate('frontend_index'));
        return $redirection;
    }
}