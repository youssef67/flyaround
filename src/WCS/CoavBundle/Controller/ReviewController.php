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
     * @Route("/", name="review_index")
     * @Method("GET")
     */

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $reviews = $em->getRepository("WCSCoavBundle:Review")->findAll();

        return $this->render("review/index.html.twig", array(
           'reviews'=>$reviews
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
        $review = new Review();
        $form = $this->createForm('WCS\CoavBundle\Form\ReviewType', $review);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($review);
            $em->flush();

            return $this->redirectToRoute('review_index', array('id' => $review->getId()));
        }

        return $this->render('review/new.html.twig', array(
           'review' => $review,
           'form' => $form->createView()
        ));


    }


    

}
