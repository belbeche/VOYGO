<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Entity\Chambre;
use App\Form\SearchForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChambreController extends AbstractController
{
    /**
     * @Route("/chambre/{id}", name="front_chambre")
     */
    public function index($id,EntityManagerInterface $entityManager,Request $request): Response
    {
        $chambre = new SearchData();
        $form = $this->createForm(SearchForm::class, $chambre);
        $form->handleRequest($request);

        $hotels = $entityManager->getRepository(Chambre::class)->findAll();

        return $this->render('chambre/index.html.twig', [
            'form' => $form->createView(),
            'hotels' => $hotels,
        ]);
    }
}
