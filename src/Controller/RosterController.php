<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RosterController extends AbstractController
{
    /**
     * @Route("/roster", name="app_roster")
     */
    public function index(): Response
    {
        return $this->render('roster/list.html.twig', [
            'controller_name' => 'RosterController',
        ]);
    }
}
