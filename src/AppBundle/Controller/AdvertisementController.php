<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Ad;
use AppBundle\Form\AdForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdvertisementController extends Controller
{
    /**
     * @Route("/add", name="add_ad")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function addAdvertisementAction(Request $request)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            throw $this->createAccessDeniedException();
        }

        $user = $this->getUser();

        $ad = new Ad();
        $form = $this->createForm(AdForm::class, $ad);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $today = new \DateTime();
            $ad->setDate($today);
            $ad->setUserId($user);

            $em = $this->getDoctrine()->getManager();
            $em->persist($ad);
            $em->flush();

            $this->addFlash(
                'notice',
                'You just added a new advertisement!'
            );

            return $this->redirectToRoute('homepage');
        }

        return $this->render(
            'advertisement/add.html.twig',
            array('form' => $form->createView())
        );
    }

    /**
     * @Route("/myads", name="my_ads")
     */
    public function showMyAdsAction()
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            throw $this->createAccessDeniedException();
        }

        $adManager = $this->get('ad_manager');
        $user = $this->getUser();

        $ads = $adManager->getUserAds($user);

        return $this->render(
            'advertisement/myads.html.twig', array('myads' => $ads)
        );
    }
}
