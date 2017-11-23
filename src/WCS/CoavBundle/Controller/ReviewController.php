<?php

namespace WCS\CoavBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

use WCS\CoavBundle\Entity\Review;

/**
 * Class ReviewController
 * @Route("review")
 */


class ReviewController extends Controller
{

    /**
     * List all review entities
     *
     * @Route("/", name="review")
     * @Method("GET")
     */

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $review = $em->getRepository("WCSCoavBundle:Review")->findAll();

        return $this->render("review/index.html.twig", array(
           'review'=>$review
        ));
    }


    /**
     * Create a new review entity
     *
     * @Route("/new", name="review_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $review = $em->getRepository("WCSCoavBundle:Review")->findAll();

        return $this->render("review/new.html.twig", array(
            'review'=>$review
        ));
    }

}
