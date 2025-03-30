<?php

namespace App\Controller;

use App\Entity\Voiture;
use App\Repository\VoitureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class VoituresController extends AbstractController
{
    #[Route('/', name: 'app_home', methods: ['GET'])]
    public function index(VoitureRepository $repository): Response
    {
        $voitures = $repository->findAll();

        return $this->render('accueil.html.twig', [
            'controller_name' => 'VoituresController',
            'voitures' => $voitures,
        ]);
    }

    #[Route('/voiture/car/{id}', name: 'app_voiture_car', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function car( ?Voiture $voiture): Response
    {
        return $this->render('voiture/car.html.twig', [
            'voiture' => $voiture,
        ]);
    }

    #[Route('/voiture/car/{id}/supprimer', name: 'app_voiture_car_delete', requirements: ['id' => '\d+'], methods: ['GET', 'POST'])]
    public function deleteCar(int $id, VoitureRepository $repository, EntityManagerInterface $manager): Response
    {
        $voiture = $repository->find($id);
        $manager->remove($voiture);
        $manager->flush();

        $this->redirectToRoute("app_voiture_car_delete", ['id' => $voiture->getId()]);

        return $this->render('accueil.html.twig', [
            'voiture' => $voiture,
        ]);
    }

}
