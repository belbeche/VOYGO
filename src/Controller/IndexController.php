<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Entity\Chambres;
use App\Form\SearchForm;
use App\Repository\ChambresRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(ChambresRepository $repository, Request $request): Response
    {
        $data = new SearchData();

        $form = $this->createForm(SearchForm::class, $data);
        $form->handleRequest($request);
        // dd($data);
        // je démarre ma request
        $request = Request::createFromGlobals();
        /* je fait une request a l'url en GET , sinon valeur par défault
        /* cela remplace les if !empty alors echo 
        /* (fonctionnel)
        /* $age = $request->query->get('age', 0);
        /* dd("Quelle est votre age ? :  $age");
        */

        $hotels = $repository->findSearch($data);

        return $this->render('index/index.html.twig', [
            'hotels' => $hotels,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/result", name="result_app")
     */
    public function resultSearch(): Response
    {
        return $this->render('index/index.html.twig');
    }
}
