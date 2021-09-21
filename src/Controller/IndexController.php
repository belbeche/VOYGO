<?php

namespace App\Controller;

use App\Entity\Hotel;
use App\Form\HotelType;
use App\Data\searchData;
use App\Form\SearchForm;
use App\Repository\HotelRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index_app")
     */
    public function index(Request $request, EntityManagerInterface $entityManager, HotelRepository $repository): Response
    {
        $data = new SearchData();

        $form = $this->createForm(SearchForm::class, $data);
        $form->handleRequest($request);

        /*$hotel = new Hotel();

        $form = $this->createForm(SearchForm::class, $hotel);
        $form->handleRequest($request);*/

        /*$hotels = $this->getDoctrine()
            ->getRepository(Hotel::class)
            ->findAll();*/
        $hotels = $repository->findSearch($data);
        // $hotels = $entityManager->getRepository(Hotel::class)->findAll();

        return $this->render('index/index.html.twig', [
            'hotels' => $hotels,
            'form' => $form->createView(),
        ]);
    }
}
