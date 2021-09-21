<?php

namespace App\Controller;

use App\Entity\Hotel;
use App\Form\HotelType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HotelAdminController extends AbstractController
{
    /**
     * @param EntityManagerInterface $entityManager
     * @return Response
     * @Route("/admin/hotels", name="admin_hotel_list")
     */
    public function listAction(EntityManagerInterface $entityManager)
    {
        $hotels = $entityManager->getRepository(Hotel::class)->findAll();

        return $this->render('admin/hotel/list.html.twig', array(
            'hotels' => $hotels
        ));
    }

    /**
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     * @Route("/admin/hotels/new", name="admin_hotel_new")
     */
    public function newAction(Request $request, EntityManagerInterface $entityManager)
    {
        $hotel = new Hotel();

        $form = $this->createForm(HotelType::class, $hotel);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $entityManager->persist($hotel);
                $entityManager->flush();

                return $this->redirect($this->generateUrl('admin_hotel_list'));
            }
        }

        return $this->render('admin/hotel/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
