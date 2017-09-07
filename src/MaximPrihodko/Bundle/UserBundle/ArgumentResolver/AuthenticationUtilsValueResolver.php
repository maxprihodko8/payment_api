<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 07.09.17
 * Time: 15:47
 */

namespace MaximPrihodko\Bundle\UserBundle\ArgumentResolver;


use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AuthenticationUtilsValueResolver implements ArgumentValueResolverInterface
{

    private $tokenStorage;
    private $container;

    public function __construct(TokenStorageInterface $tokenStorage, Container $container)
    {
        $this->tokenStorage = $tokenStorage;
        $this->container = $container;
    }

    /**
     * Whether this resolver can resolve the value for the given ArgumentMetadata.
     *
     * @param Request $request
     * @param ArgumentMetadata $argument
     *
     * @return bool
     */
    public function supports(Request $request, ArgumentMetadata $argument)
    {
        if (AuthenticationUtils::class !== $argument->getType()) {
            return false;
        }

        return $this->container->get('security.authentication_utils') instanceof AuthenticationUtils;
    }

    /**
     * Returns the possible value(s).
     *
     * @param Request $request
     * @param ArgumentMetadata $argument
     *
     * @return \Generator
     */
    public function resolve(Request $request, ArgumentMetadata $argument)
    {
        yield $this->container->get('security.authentication_utils');
    }
}