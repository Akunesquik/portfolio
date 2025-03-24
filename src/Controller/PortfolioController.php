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
                'title' => 'Projet Symfony',
                'description' => 'Un projet développé avec Symfony pour la gestion des utilisateurs.',
                'link' => 'https://github.com/mon-projet-symfony'
            ],
            [
                'title' => 'Portfolio Personnel',
                'description' => 'Mon propre portfolio codé en Symfony et Twig.',
                'link' => 'https://mon-portfolio.com'
            ],
        ];

        return $this->render('portfolio/projects.html.twig', [
            'projects' => $projects
        ]);
    }

    #[Route('/contact', name: 'contact', methods: ['GET', 'POST'])]
    public function contact(Request $request): Response
    {
        if ($request->isMethod('POST')) {
            $name = $request->request->get('name');
            $email = $request->request->get('email');
            $message = $request->request->get('message');

            // Normalement, ici tu enverrais un email ou enregistrerais les infos en BDD
            $this->addFlash('success', 'Merci pour ton message, je te répondrai bientôt !');

            return $this->redirectToRoute('contact');
        }

        return $this->render('portfolio/contact.html.twig');
    }
}
