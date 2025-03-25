<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PortfolioController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(): Response
    {
        return $this->render('portfolio/home.html.twig');
    }

    #[Route('/projects', name: 'projects')]
    public function projects(): Response
    {
        $projects = [
            [
                'title' => 'Projet Youtube MP3',
                'description' => "Création d'un 'youtube to MP3', la problématique était que j'avais besoin de télécharger des musiques sur une clé USB pour ma famille, et les sites le permettant était trop long ou rempli de pubs. Voici donc un YTMP3 fonctionnel, il y a un installer qui se trouve dans le github, vous pouvez le télécharger et l'essayer. ",
                'link' => 'https://github.com/Akunesquik/Ytmp3',
                'image' => 'ytmp3.png'
            ],
            [
                'title' => 'Portfolio Personnel',
                'description' => 'Mon propre portfolio codé en Symfony et Twig.',
                'link' => 'https://mon-portfolio.com',
                'image' => 'moi.png'
            ],
        ];

        return $this->render('portfolio/projects.html.twig', [
            'projects' => $projects
        ]);
    }

    #[Route('/contact', name: 'contact', methods: ['GET'])]
    public function contact(Request $request): Response
    {
        return $this->render('portfolio/contact.html.twig');
    }
}
