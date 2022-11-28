<?php

namespace App\DataFixtures;

use App\Entity\Raid;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class RaidFixtures extends Fixture
{
    private $slugger;

    public function __construct(SluggerInterface $slugger)
    {
         $this->slugger = $slugger;
    }

    public function load(ObjectManager $manager): void
    {
        $raids = [
            [
                "name" => "Naxxramas",
            ],

            [
                "name" => "L'oeil de l'éternité",
            ],

            [
                "name" => "Ingénierie",
            ],

            [
                "name" => "Dalaran",
            ],

            [
                "name" => "Le sanctum Obsidien",
            ],

            [
                "name" => "Azjol-Nérub",
            ],

            [
                "name" => "Quête",
            ],

            [
                "name" => "Joaillerie",
            ],
        ];

        $raidsObjArray = [];
        foreach ($raids as $currentRaid) {
            
            $raidObj = new Raid();
            $raidObj->setName($currentRaid['name']);
            $raidObj->setSlug($this->slugger->slug(mb_strtolower($currentRaid['name'])));

            $manager->persist($raidObj);

            //* reference to link fixtures files
            $this->addReference($currentRaid['name'], $raidObj);
 
        }

        $manager->flush();
    }
}
