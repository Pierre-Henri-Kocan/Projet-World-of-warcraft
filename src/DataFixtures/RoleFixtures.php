<?php

namespace App\DataFixtures;

use App\Entity\Role;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class RoleFixtures extends Fixture
{
    private $slugger;

    public function __construct(SluggerInterface $slugger)
    {
         $this->slugger = $slugger;
    }

    public function load(ObjectManager $manager): void
    {
        $roles = [
            [
                "name" => "CAC",
            ],

            [
                "name" => "Caster",
            ],

            [
                "name" => "Healer",
            ],

            [
                "name" => "Tank",
            ],
        ];
        $raidsObjArray = [];
        foreach ($roles as $currentRaid) {
            
            $raidObj = new Role();
            $raidObj->setName($currentRaid['name']);
            $raidObj->setSlug($this->slugger->slug(mb_strtolower($currentRaid['name'])));

            $manager->persist($raidObj);

            //* reference to link fixtures files
            $this->addReference($currentRaid['name'], $raidObj);
 
        }

        $manager->flush();
    }
}