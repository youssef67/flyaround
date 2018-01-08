<?php

namespace WCS\CoavBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('WCSCoavBundle:Default:index.html.twig');
    }

    /**
     * @Route("/login", name="registration")
     * @Method({"GET", "POST"})
     */

    public function moteurAction(Request $request)
    {
        $form = $this->createForm('WCS\CoavBundle\Form\RegistrationType');
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            return $this->render('flight\index.html.twig', array(
            ));
        }

        return $this->render('recherche.html.twig', array(
            'form' => $form->createView(),
        ));
    }

}
