<?php

namespace MaximPrihodko\Bundle\UserBundle\Controller;

use MaximPrihodko\Bundle\UserBundle\Entity\User;
use MaximPrihodko\Bundle\UserBundle\Repository\UserRepository;
use MaximPrihodko\Bundle\UserBundle\Service\MessageExecutor;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('UserBundle:Default:index.html.twig');
    }

    public function blogAction($slug, MessageExecutor $generator, UserRepository $userRepository) {

        //$user = $this->getDoctrine()->getRepository('UserBundle:User')->find(3);
        //$user->addRole(User::ROLE_SUPER_ADMIN);
        //$this->getDoctrine()->getManager()->persist($user);
        //$this->getDoctrine()->getManager()->flush();
        //$this->container->get('MaximPrihodko\Bundle\UserBundle\Service\MessageGenerator');
        return $this->render('UserBundle:Default:index.html.twig');
    }
}
