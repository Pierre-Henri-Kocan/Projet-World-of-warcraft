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
                "slug" => "naxxramas", 
            ],

            [
                "name" => "L'oeil de l'éternité",
                "slug" => "l-oeil-de-l-eternite", 
            ],

            [
                "name" => "Ingénierie",
                "slug" => "ingenierie", 
            ],

            [
                "name" => "Dalaran",
                "slug" => "dalaran", 
            ],

            [
                "name" => "Le sanctum Obsidien",
                "slug" => "le-sanctum-obsidien", 
            ],

            [
                "name" => "Azjol-Nérub",
                "slug" => "azjol-nerub", 
            ],

            [
                "name" => "Quête",
                "slug" => "quete", 
            ],

            [
                "name" => "Joaillerie",
                "slug" => "joaillerie", 
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
