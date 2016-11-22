<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $adManager = $this->get('ad_manager');

        $ads = $adManager->getAllAds();

        return $this->render(
            'homepage/home.html.twig', array('ads' => $ads)
        );
    }
}
