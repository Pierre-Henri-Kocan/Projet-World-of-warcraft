<?php

namespace App\Controller;

use App\Entity\Player;
use App\Repository\PlayerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/roster", name="app_roster_")
 */
class RosterController extends AbstractController
{
    /**
     * @Route("/", name="list", methods={"GET"})
     */
    public function list(PlayerRepository $playerRepository): Response
    {
        return $this->render('roster/list.html.twig', [
            'controller_name' => 'RosterController',
            'rosters' => $playerRepository->findAll(),
        ]);
    }

    /**
     * @Route("/create", name="create", methods={"GET", "POST"})
     */
    public function create(Request $request, PlayerRepository $playerRepository): Response
    {
        $player = new Player();

        $form = $this->createForm(PlayerType::class, $player);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $playerRepository->add($player, true);

            $this->addFlash('success', 'Joueur ajouté');
            return $this->redirectToRoute('app_roster_list', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('roster/create.html.twig', [
            'player' => $player,
            'form' => $form,
        ]);
    }

    /**
     * @Route ("/{id<\d+>}", name="read", methods={"GET"})
     */
    public function read(Player $player): Response
    {
        return $this->render('roster/read.html.twig', [
            'event' => $player,
        ]);
    }

    /**
     * @Route ("/{id<\d+>}/update", name="update", methods={"GET", "POST"})
     */
    public function update(Request $request, Player $player, PlayerRepository $playerRepository): Response
    {
        $form = $this->createForm(PlayerType::class, $player);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $playerRepository->add($player, true);

            $this->addFlash('warning', 'Joueur modifié');
            return $this->redirectToRoute('app_roster_list', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('roster/update.html.twig', [
            'player' => $player,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id<\d+>}", name="delete", methods={"POST"})
     */
    public function delete(Request $request, Player $event, PlayerRepository $eventRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$event->getId(), $request->request->get('_token'))) {
            $eventRepository->remove($event, true);
        }

        $this->addFlash('success', 'Joueur supprimé');
        return $this->redirectToRoute('app_roster_list', [], Response::HTTP_SEE_OTHER);
    }
}
