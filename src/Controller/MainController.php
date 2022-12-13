<?php

namespace App\Controller;

use App\Repository\EventRepository;
use App\Repository\ItemRepository;
use App\Repository\PlayerRepository;
use App\Repository\RaidRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/main", name="app_main")
 */
class MainController extends AbstractController
{

    public function index(EventRepository $eventRepository, ItemRepository $itemRepository, RaidRepository $raidRepository, PlayerRepository $playerRepository): Response
    {
        $eventList = $eventRepository->findAll();
        $itemList = $itemRepository->findAll();
        $raidList = $raidRepository->findAll();
        $playerList = $playerRepository->findAll();

        return $this->render('main/index.html.twig', [
            'event' => $eventList,
            'item'  => $itemList,
            'raid'  => $raidList,
            'player'=> $playerList
        ]);
    }
}
