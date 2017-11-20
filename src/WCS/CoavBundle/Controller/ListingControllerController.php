<?php

namespace WCS\CoavBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use WCS\CoavBundle\Entity\Flight;
use WCS\CoavBundle\Entity\PlaneModel;
use WCS\CoavBundle\Entity\Reservation;


/**
 * Listing controller
 * @Route("listing")
 */

class ListingControllerController extends Controller
{

    /**
    * List one reservation with one flight and one planemodel with few ID
    *
    * @Route("/{reservation_id}/flight/{flight_id}/planeModel/{planeModel_id}", name="listing_index", requirements={"reservation_id": "\d+"})
    * @Method("GET");
    * @ParamConverter("reservation",   options={"mapping": {"reservation_id": "id"}})
    * @ParamConverter("flight",   options={"mapping": {"flight_id": "id"}})
    * @ParamConverter("planeModel",   options={"mapping": {"planeModel_id": "id"}})
    */
    public function indexAction(Reservation $reservation, Flight $flight, PlaneModel $planeModel)
    {
        return $this->render('listing/index.html.twig', array(
           'reservation'=> $reservation,
            'flight'=>$flight,
            'planeModel'=>$planeModel
        ));
    }
}
