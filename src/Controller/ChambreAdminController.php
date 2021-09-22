<?php

namespace App\Controller;

use App\Entity\Chambre;
use App\Entity\Hotel;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ChambreAdminController extends AbstractController
{
    /**
     * @return Response
     * @Route("/admin/chambres", name="list_app")
     */
    public function ChambresList(EntityManagerInterface $entityManager): Response
    {
        $hotels_list = $entityManager->getRepository(Chambre::class)->findAll();

        return $this->render('admin/chambre/list.html.twig', [
            'hotels_list' => $hotels_list,
        ]);
    }
}
