<?php

namespace App\DataFixtures;

use App\Entity\Event;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EventFixtures extends Fixture
{
 
    public function load(ObjectManager $manager): void
    {

        $events = [
            [
                "date" => "2022-11-30 20:45:00",
                "log" => "https://classic.warcraftlogs.com/reports/GtrmZdLaC7Pykh2c/#boss=-2&difficulty=0&wipes=2&view=rankings",
                "raid" => "plusieurs",
                "player" => "plusieurs",
                "item" => "plusieurs",
            ],

        ];

        foreach ($events as $currentEvent) {
            
            $eventObj = new Event();

            $eventObj->setDate(new DateTime($currentEvent["date"]));
            $eventObj->setLog($currentEvent['log']);
           


            $raidObj = $this->getReference($currentEvent["raid"]);
            $eventObj->addRaid($raidObj);
            
            $playerObj = $this->getReference($currentEvent["player"]);
            $eventObj->addPlayer($playerObj);
            
            $itemObj = $this->getReference($currentEvent["item"]);
            $eventObj->addItem($itemObj);

            $manager->persist($eventObj);

            //* reference to link fixtures files
            $this->addReference($currentEvent['name'], $eventObj);
        }

        $manager->flush();
    }
}
