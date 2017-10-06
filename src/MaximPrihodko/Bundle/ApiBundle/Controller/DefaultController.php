<?php

namespace MaximPrihodko\Bundle\ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as FOS;
use MaximPrihodko\Bundle\AppBundle\Entity\user\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @FOS\Get("/api/test")
     * @return Response
     */
    public function testAction() {
        return new Response('afaf');
    }

    /**
     * @FOS\Get("/api/{id}", requirements={"id": "\d+"})
     * @return User
     */
    public function indexAction(User $user)
    {
        return $user;
    }
}
