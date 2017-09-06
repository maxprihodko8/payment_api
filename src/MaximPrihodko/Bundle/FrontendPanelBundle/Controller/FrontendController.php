<?php

namespace MaximPrihodko\Bundle\FrontendPanelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FrontendController extends Controller
{
    public function indexAction()
    {
        return $this->render('FrontendPanelBundle:FrontendController:index.html.twig', array(
            // ...
        ));
    }

}
