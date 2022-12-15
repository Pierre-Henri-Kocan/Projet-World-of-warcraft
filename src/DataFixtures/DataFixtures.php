<?php

namespace App\DataFixtures;

use App\Entity\Event;
use App\Entity\Item;
use App\Entity\Location;
use App\Entity\Player;
use App\Entity\Raid;
use App\Entity\Role;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class DataFixtures extends Fixture
{

    private $slugger;

    public function __construct(SluggerInterface $slugger)
    {
         $this->slugger = $slugger;
    }

    public function load(ObjectManager $manager): void
    {

        // ------------------------------- Raids -------------------------------
            $raids = [
                [
                    "name" => "Hors raid",
                ],

                [
                    "name" => "L'oeil de l'éternité",
                ],

                [
                    "name" => "Le sanctum Obsidien",
                ],

                [
                    "name" => "Naxxramas",
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

        // ------------------------------- Roles -------------------------------
            $rolesObjArray = [

                [
                    "name" => "...",
                ],

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
            // $rolesObjArray = [];
            foreach ($rolesObjArray as $currentRole) {
                
                $roleObj = new Role();
                
                $roleObj->setName($currentRole['name']);
                $roleObj->setSlug($this->slugger->slug(mb_strtolower($currentRole['name'])));

                $rolesObjArray[md5($currentRole['name'])] = $roleObj;
                $manager->persist($roleObj);

                //* reference to link fixtures files
                $this->addReference($currentRole['name'], $roleObj);

            }

        // ------------------------------- Locations -------------------------------
            $locationObjArray = [

                [
                    "name" => "...",
                ],

                [
                    "name" => "Back",
                ],

                [
                    "name" => "Chest",
                ],

                [
                    "name" => "Feet",
                ],

                [
                    "name" => "Hands",
                ],

                [
                    "name" => "Head",
                ],

                [
                    "name" => "Legs",
                ],

                [
                    "name" => "Main Hand",
                ],

                [
                    "name" => "Neck",
                ],

                [
                    "name" => "Offhand",
                ],

                [
                    "name" => "Relic-Wand-Ranged",
                ],

                [
                    "name" => "Ring 1",
                ],

                [
                    "name" => "Ring 2",
                ],

                [
                    "name" => "Shoulders",
                ],

                [
                    "name" => "Trinket 1",
                ],

                [
                    "name" => "Trinket 2",
                ],

                [
                    "name" => "Trinket 3",
                ],

                [
                    "name" => "Waist",
                ],

                [
                    "name" => "Wrists",
                ],
            ];

            // $locationObjArray = [];
            foreach ($locationObjArray as $currentLocation) {

                $locationObj = new Location();

                $locationObj->setName($currentLocation['name']);
                $locationObj->setSlug($this->slugger->slug(mb_strtolower($currentLocation['name'])));
                
                $locationObjArray[md5($currentLocation['name'])] = $locationObj;
                $manager->persist($locationObj);
            }

        // ------------------------------- Items -------------------------------
            $itemsObjArray = [
                [
                    "name" => "Vide",
                    "location" => [
                        "...",
                    ],
                    "type" => "...",
                    "role" => [
                        "...",
                        "CAC",
                    ],
                    "raid" => "Hors raid",
                    "detail" => "...",
                ],

                [
                    "name" => "Ambition infinie",
                    "location" => [
                        "Neck",
                    ],
                    "type" => "Contested",
                    "role" => [
                         "Tank",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40387/ambition-infinie",
                ],

                [
                    "name" => "Anneau d'invincibilité",
                    "location" => [
                        "Ring 1",
                        "Ring 2",
                    ],
                    "type" => "Bis",
                    "role" => [
                         "CAC",
                    ],
                    "raid" => "Hors raid",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40717/anneau-dinvincibilit%C3%A9",
                ],

                [
                    "name" => "Anneau de beauté décomposée",
                    "location" => [
                        "Ring 2",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "Healer",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40375/anneau-de-beaut%C3%A9-d%C3%A9compos%C3%A9e",
                ],

                [
                    "name" => "Anneau de la main lourde",
                    "location" => [
                        "Ring 1",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "CAC",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40074/anneau-de-la-main-lourde",
                ],

                [
                    "name" => "Anneau du capteur tellurique",
                    "location" => [
                        "Ring 2",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "CAC",
                    ],
                    "raid" => "L'oeil de l'éternité",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40474/anneau-du-capteur-tellurique",
                ],

                [
                    "name" => "Averse de grêle",
                    "location" => [
                        "Offhand",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "CAC",
                    ],
                    "raid" => "L'oeil de l'éternité",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40491/averse-de-gr%C3%AAle",
                ],

                [
                    "name" => "Bague de magie canalisée",
                    "location" => [
                        "Ring 1",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Caster",
                        "Healer",
                    ],
                    "raid" => "Hors raid",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40719/bague-de-magie-canalis%C3%A9e",
                ],

                [
                    "name" => "Bague usée par le sable",
                    "location" => [
                        "Ring 1",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "Tank",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40107/bague-us%C3%A9e-par-le-sable",
                ],

                [
                    "name" => "Baguette de l'archiliche",
                    "location" => [
                        "Relic-Wand-Ranged",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Caster",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=39426/baguette-de-larchiliche",
                ],

                [
                    "name" => "Baguette des nérubiens ornée",
                    "location" => [
                        "Relic-Wand-Ranged",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "Caster",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=39712/baguette-des-n%C3%A9rubiens-orn%C3%A9e",
                ],

                [
                    "name" => "Beauté ravie",
                    "location" => [
                        "Ring 2",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Healer",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40108/beaut%C3%A9-ravie",
                ],

                [
                    "name" => "Bottes de persuasion",
                    "location" => [
                        "Feet",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Healer",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40269/bottes-de-persuasion",
                ],

                [
                    "name" => "Bottes des énergies soignantes",
                    "location" => [
                        "Feet",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Healer",
                    ],
                    "raid" => "L'oeil de l'éternité",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40592/bottes-des-%C3%A9nergies-soignantes",
                ],

                [
                    "name" => "Bottes des idéaux impétueux",
                    "location" => [
                        "Feet",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Caster",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40246/bottes-des-id%C3%A9aux-imp%C3%A9tueux",
                ],

                [
                    "name" => "Bottes du vol renouvelé",
                    "location" => [
                        "Feet",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "CAC",
                    ],
                    "raid" => "L'oeil de l'éternité",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40549/bottes-du-vol-renouvel%C3%A9",
                ],

                [
                    "name" => "Bottillons de la vile duperie",
                    "location" => [
                        "Feet",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "CAC",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40243/bottillons-de-la-vile-duperie",
                ],

                [
                    "name" => "Brassards de complicité",
                    "location" => [
                        "Wrists",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Healer",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40332/brassards-de-complicit%C3%A9",
                ],

                [
                    "name" => "Brassards de l'attaque implacable",
                    "location" => [
                        "Wrists",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "CAC",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40330/brassards-de-lattaque-implacable",
                ],

                [
                    "name" => "Brassards du chevalier impie",
                    "location" => [
                        "Wrists",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Tank",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40306/brassards-du-chevalier-impie",
                ],

                [
                    "name" => "Brodequins de l'aube",
                    "location" => [
                        "Feet",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "CAC",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=39701/brodequins-de-laube",
                ],

                [
                    "name" => "Cachet de la conscience gelée",
                    "location" => [
                        "Relic-Wand-Ranged",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Tank",
                    ],
                    "raid" => "Hors raid",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40822/cachet-de-la-conscience-gel%C3%A9e",
                ],

                [
                    "name" => "Cachet de lutte du gladiateur fatal",
                    "location" => [
                        "Relic-Wand-Ranged",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "CAC",
                    ],
                    "raid" => "Hors raid",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=42620/cachet-de-lutte-du-gladiateur-fatal",
                ],

                [
                    "name" => "Cachet de vigilance",
                    "location" => [
                        "Relic-Wand-Ranged",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "CAC",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40207/cachet-de-vigilance",
                ],

                [
                    "name" => "Cadran solaire de l'exilé",
                    "location" => [
                        "Trinket 2",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Caster",
                    ],
                    "raid" => "Hors raid",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40682/cadran-solaire-de-lexil%C3%A9",
                ],

                [
                    "name" => "Cape des plumes de kea",
                    "location" => [
                        "Back",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Healer",
                    ],
                    "raid" => "Hors raid",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40724/cape-des-plumes-de-kea",
                ],

                [
                    "name" => "Cape du pennon",
                    "location" => [
                        "Back",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "Caster",
                        "Healer",
                    ],
                    "raid" => "Le sanctum Obsidien",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=44005/cape-du-pennon",
                ],

                [
                    "name" => "Cape du sorcier déméritant",
                    "location" => [
                        "Back",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Caster",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40405/cape-du-sorcier-d%C3%A9m%C3%A9ritant",
                ],

                [
                    "name" => "Cape maillée en platine",
                    "location" => [
                        "Back",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "Tank",
                    ],
                    "raid" => "Hors raid",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40722/cape-maill%C3%A9e-en-platine",
                ],

                [
                    "name" => "Carte de Sombrelune : Grandeur",
                    "location" => [
                        "Trinket 1",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "CAC",
                        "Healer",
                    ],
                    "raid" => "Hors raid",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=44253/carte-de-sombrelune-grandeur",
                ],

                [
                    "name" => "Ceinture de traque-peau",
                    "location" => [
                        "Waist",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "CAC",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40205/ceinture-de-traque-peau",
                ],

                [
                    "name" => "Ceinture rivetée dépravée",
                    "location" => [
                        "Waist",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "CAC",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40275/ceinture-rivet%C3%A9e-d%C3%A9prav%C3%A9e",
                ],

                [
                    "name" => "Ceinturon ablatif en chitine",
                    "location" => [
                        "Waist",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "Tank",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=39759/ceinturon-ablatif-en-chitine",
                ],

                [
                    "name" => "Ceinturon de chevalerie",
                    "location" => [
                        "Waist",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "CAC",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40278/ceinturon-de-chevalerie",
                ],

                [
                    "name" => "Ceinturon de récupération",
                    "location" => [
                        "Waist",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Caster",
                        "Healer",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40327/ceinturon-de-r%C3%A9cup%C3%A9ration",
                ],

                [
                    "name" => "Cercle de mort",
                    "location" => [
                        "Ring 2",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "CAC",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=39401/cercle-de-mort",
                ],

                [
                    "name" => "Chaîne d'adoration",
                    "location" => [
                        "Neck",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Healer",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40071/cha%C3%AEne-dadoration",
                ],

                [
                    "name" => "Chapel de réconciliation",
                    "location" => [
                        "Head",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Healer",
                    ],
                    "raid" => "Le sanctum Obsidien",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=44007/chapel-de-r%C3%A9conciliation",
                ],

                [
                    "name" => "Chaperon de rationalité",
                    "location" => [
                        "Head",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Caster",
                    ],
                    "raid" => "L'oeil de l'éternité",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40562/chaperon-de-rationalit%C3%A9",
                ],

                [
                    "name" => "Chevalière de la forteresse imprenable",
                    "location" => [
                        "Ring 2",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "Tank",
                    ],
                    "raid" => "Hors raid",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40718/chevali%C3%A8re-de-la-forteresse-imprenable",
                ],

                [
                    "name" => "Chevalière de la souffrance manifeste",
                    "location" => [
                        "Ring 1",
                        "Ring 2",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "Healer",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40399/chevali%C3%A8re-de-la-souffrance-manifeste",
                ],

                [
                    "name" => "Chevalière du malveillant",
                    "location" => [
                        "Ring 1",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Caster",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=39389/chevali%C3%A8re-du-malveillant",
                ],

                [
                    "name" => "Clé de l'iris de focalisation",
                    "location" => [
                        "Neck",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "Tank",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=44577/cl%C3%A9-h%C3%A9ro%C3%AFque-de-liris-de-focalisation",
                ],

                [
                    "name" => "Cloche d'Af'Romaj",
                    "location" => [
                        "Trinket 2",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Healer",
                    ],
                    "raid" => "Hors raid",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=37835/cloche-dafromaj",
                ],

                [
                    "name" => "Code du défenseur",
                    "location" => [
                        "Trinket 1",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Tank",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40257/code-du-d%C3%A9fenseur",
                ],

                [
                    "name" => "Collier de puissance du Repos du ver",
                    "location" => [
                        "Neck",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "Caster",
                    ],
                    "raid" => "L'oeil de l'éternité",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=44661/collier-de-puissance-du-repos-du-ver",
                ],

                [
                    "name" => "Cordelette de polarité",
                    "location" => [
                        "Waist",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Caster",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40301/cordelette-de-polarit%C3%A9",
                ],

                [
                    "name" => "Corselet des prouesses indéniables",
                    "location" => [
                        "Chest",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "CAC",
                    ],
                    "raid" => "Le sanctum Obsidien",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=43998/corselet-des-prouesses-ind%C3%A9niables",
                ],

                [
                    "name" => "Corselet du solitaire",
                    "location" => [
                        "Chest",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "CAC",
                    ],
                    "raid" => "L'oeil de l'éternité",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40539/corselet-du-solitaire",
                ],

                [
                    "name" => "Crispins sans souillure",
                    "location" => [
                        "Wrists",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "Caster",
                        "Healer",
                    ],
                    "raid" => "Le sanctum Obsidien",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=44008/crispins-sans-souillure",
                ],

                [
                    "name" => "Cuirasse de l'orage draconique",
                    "location" => [
                        "Chest",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Tank",
                    ],
                    "raid" => "Le sanctum Obsidien",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=44000/cuirasse-de-lorage-draconique",
                ],

                [
                    "name" => "Cuissards de souveraineté",
                    "location" => [
                        "Legs",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "Tank",
                    ],
                    "raid" => "L'oeil de l'éternité",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40589/cuissards-de-souverainet%C3%A9",
                ],

                [
                    "name" => "Drapé de l'ennemi mortel",
                    "location" => [
                        "Back",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "CAC",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40403/drap%C3%A9-de-lennemi-mortel",
                ],

                [
                    "name" => "Effroi coléreux",
                    "location" => [
                        "Main Hand",
                        "Offhand",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "CAC",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40189/effroi-col%C3%A9reux",
                ],

                [
                    "name" => "Emissaire de mortalité",
                    "location" => [
                        "Relic-Wand-Ranged",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "CAC",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40385/emissaire-de-mortalit%C3%A9",
                ],

                [
                    "name" => "Espauliers de mort non naturelle",
                    "location" => [
                        "Shoulders",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Tank",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=39704/espauliers-de-mort-non-naturelle",
                ],

                [
                    "name" => "Essence de tulle",
                    "location" => [
                        "Trinket 1",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Tank",
                    ],
                    "raid" => "Hors raid",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=37220/essence-de-tulle",
                ],

                [
                    "name" => "Etreinte de l'araignée",
                    "location" => [
                        "Trinket 1",
                        "Trinket 2",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Caster",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=39229/etreinte-de-laraign%C3%A9e",
                ],

                [
                    "name" => "Faveur de la reine dragon",
                    "location" => [
                        "Neck",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "CAC",
                    ],
                    "raid" => "L'oeil de l'éternité",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=44664/faveur-de-la-reine-dragon",
                ],

                [
                    "name" => "Figurine de crabe monarchique",
                    "location" => [
                        "Trinket 2",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Tank",
                    ],
                    "raid" => "Hors raid",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=44063/figurine-de-crabe-monarchique",
                ],

                [
                    "name" => "Figurine de lièvre de rubis",
                    "location" => [
                        "Trinket 1",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Tank",
                    ],
                    "raid" => "Hors raid",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=42341/figurine-de-li%C3%A8vre-de-rubis",
                ],

                [
                    "name" => "Fin du voyage",
                    "location" => [
                        "Main Hand",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "CAC",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40388/fin-du-voyage",
                ],

                [
                    "name" => "Fureur des cinq vols",
                    "location" => [
                        "Trinket 2",
                        "Trinket 3",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "CAC",
                    ],
                    "raid" => "Le sanctum Obsidien",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40431/fureur-des-cinq-vols",
                ],

                [
                    "name" => "Fusil de combat blindé",
                    "location" => [
                        "Relic-Wand-Ranged",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Tank",
                    ],
                    "raid" => "Hors raid",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=41168/fusil-de-combat-blind%C3%A9",
                ],

                [
                    "name" => "Gantelets de Zeliek",
                    "location" => [
                        "Hands",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "CAC",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40347/gantelets-de-zeliek",
                ],

                [
                    "name" => "Gants du spectacle d'hiver",
                    "location" => [
                        "Hands",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Healer",
                    ],
                    "raid" => "L'oeil de l'éternité",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40564/gants-du-spectacle-dhiver",
                ],

                [
                    "name" => "Garde-jambes de l'ossuaire",
                    "location" => [
                        "Legs",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Healer",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40379/garde-jambes-de-lossuaire",
                ],

                [
                    "name" => "Garde-mains adroits givrés",
                    "location" => [
                        "Hands",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "CAC",
                    ],
                    "raid" => "L'oeil de l'éternité",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40541/garde-mains-adroits-givr%C3%A9s",
                ],

                [
                    "name" => "Garde-porte",
                    "location" => [
                        "Ring 1",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Tank",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40370/garde-porte",
                ],

                [
                    "name" => "Grand anneau de collision",
                    "location" => [
                        "Ring 2",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "CAC",
                    ],
                    "raid" => "Le sanctum Obsidien",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=43993/grand-anneau-de-collision",
                ],

                [
                    "name" => "Grand heaume en obsidienne",
                    "location" => [
                        "Head",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "CAC",
                    ],
                    "raid" => "Le sanctum Obsidien",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=44006/grand-heaume-en-obsidienne",
                ],

                [
                    "name" => "Grèves d'expiation",
                    "location" => [
                        "Feet",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Healer",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=39734/gr%C3%A8ves-dexpiation",
                ],

                [
                    "name" => "Habits putrides de Heigan",
                    "location" => [
                        "Chest",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Caster",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40234/habits-putrides-de-heigan",
                ],

                [
                    "name" => "Halo pâlissant",
                    "location" => [
                        "Relic-Wand-Ranged",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "Healer",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40245/halo-p%C3%A2lissant",
                ],

                [
                    "name" => "Heaume de l'aspect bleu",
                    "location" => [
                        "Head",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "CAC",
                    ],
                    "raid" => "L'oeil de l'éternité",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40543/heaume-de-laspect-bleu",
                ],

                [
                    "name" => "Idole d'adoration",
                    "location" => [
                        "Relic-Wand-Ranged",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "CAC",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=39757/idole-dadoration",
                ],

                [
                    "name" => "Idole d'éveil",
                    "location" => [
                        "Relic-Wand-Ranged",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Healer",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40342/idole-d%C3%A9veil",
                ],

                [
                    "name" => "Idole de l'étoile filante",
                    "location" => [
                        "Relic-Wand-Ranged",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Caster",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40321/idole-de-l%C3%A9toile-filante",
                ],

                [
                    "name" => "Impitoyable",
                    "location" => [
                        "Ring 1",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "CAC",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40075/impitoyable",
                ],

                [
                    "name" => "Jambards du dragon vaincu",
                    "location" => [
                        "Legs",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Caster",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40376/jambards-du-dragon-vaincu",
                ],

                [
                    "name" => "Jambières d'abomination rivetées",
                    "location" => [
                        "Legs",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "CAC",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40294/jambi%C3%A8res-dabomination-rivet%C3%A9es",
                ],

                [
                    "name" => "Jambières d'arrogance mortelle",
                    "location" => [
                        "Legs",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "Healer",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40398/jambi%C3%A8res-darrogance-mortelle",
                ],

                [
                    "name" => "Jambières de fuite ratée",
                    "location" => [
                        "Legs",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "CAC",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40331/jambi%C3%A8res-de-fuite-rat%C3%A9e",
                ],

                [
                    "name" => "Jambières des honorés",
                    "location" => [
                        "Legs",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "CAC",
                    ],
                    "raid" => "Le sanctum Obsidien",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=44011/jambi%C3%A8res-des-honor%C3%A9s",
                ],

                [
                    "name" => "Jambières du lanceur de sorts dévergondé",
                    "location" => [
                        "Legs",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "Caster",
                    ],
                    "raid" => "L'oeil de l'éternité",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40560/jambi%C3%A8res-du-lanceur-de-sorts-d%C3%A9vergond%C3%A9",
                ],

                [
                    "name" => "Joyau perdu",
                    "location" => [
                        "Ring 1",
                        "Ring 2",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Caster",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40080/joyau-perdu",
                ],

                [
                    "name" => "L'œuf d'essence mortelle",
                    "location" => [
                        "Trinket 1",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Healer",
                    ],
                    "raid" => "Hors raid",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40685/l%C5%93uf-dessence-mortelle",
                ],

                [
                    "name" => "La Marée décisive",
                    "location" => [
                        "Main Hand",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "Caster",
                        "Healer",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40396/la-mar%C3%A9e-d%C3%A9cisive",
                ],

                [
                    "name" => "Laisse de magie insouciante",
                    "location" => [
                        "Waist",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "Caster",
                        "Healer",
                    ],
                    "raid" => "L'oeil de l'éternité",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40561/laisse-de-magie-insouciante",
                ],

                [
                    "name" => "Le dernier sourire",
                    "location" => [
                        "Main Hand",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "CAC",
                        "Tank",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40402/le-dernier-sourire",
                ],

                [
                    "name" => "Le glas sinistre",
                    "location" => [
                        "Trinket 2",
                        "Trinket 3",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "CAC",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40256/le-glas-sinistre",
                ],

                [
                    "name" => "Les habits flottants du Sanctum",
                    "location" => [
                        "Chest",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Caster",
                        "Healer",
                    ],
                    "raid" => "Le sanctum Obsidien",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=44002/les-habits-flottants-du-sanctum",
                ],

                [
                    "name" => "Libram d'obstruction",
                    "location" => [
                        "Relic-Wand-Ranged",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Tank",
                    ],
                    "raid" => "Hors raid",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40707/libram-dobstruction",
                ],

                [
                    "name" => "Libram de renouveau",
                    "location" => [
                        "Relic-Wand-Ranged",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Healer",
                    ],
                    "raid" => "Hors raid",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40705/libram-de-renouveau",
                ],

                [
                    "name" => "Linceul en toile déchirée",
                    "location" => [
                        "Waist",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "CAC",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=39762/linceul-en-toile-d%C3%A9chir%C3%A9e",
                ],

                [
                    "name" => "Malédiction du mourant",
                    "location" => [
                        "Trinket 1",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "Caster",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40255/mal%C3%A9diction-du-mourant",
                ],

                [
                    "name" => "Manchettes de la proie impuissante",
                    "location" => [
                        "Wrists",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "Tank",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=39764/manchettes-de-la-proie-impuissante",
                ],

                [
                    "name" => "Manchettes du décati",
                    "location" => [
                        "Wrists",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Healer",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40209/manchettes-du-d%C3%A9cati",
                ],

                [
                    "name" => "Manchettes du pécheur",
                    "location" => [
                        "Wrists",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "CAC",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=39765/manchettes-du-p%C3%A9cheur",
                ],

                [
                    "name" => "Manteau de dispersion",
                    "location" => [
                        "Shoulders",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Caster",
                    ],
                    "raid" => "L'oeil de l'éternité",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40555/manteau-de-dispersion",
                ],

                [
                    "name" => "Mantelet des sauterelles",
                    "location" => [
                        "Shoulders",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Healer",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=39719/mantelet-des-sauterelles",
                ],

                [
                    "name" => "Médaillon de lieur-de-vie",
                    "location" => [
                        "Neck",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "Healer",
                    ],
                    "raid" => "L'oeil de l'éternité",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=44662/m%C3%A9daillon-de-lieur-de-vie",
                ],

                [
                    "name" => "Membre excédentaire",
                    "location" => [
                        "Offhand",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "Caster",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40273/membre-exc%C3%A9dentaire",
                ],

                [
                    "name" => "Miroir de vérité",
                    "location" => [
                        "Trinket 2",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "CAC",
                    ],
                    "raid" => "Hors raid",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40684/miroir-de-v%C3%A9rit%C3%A9",
                ],

                [
                    "name" => "Mort entoilée",
                    "location" => [
                        "Offhand",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "CAC",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=39714/mort-entoil%C3%A9e",
                ],

                [
                    "name" => "Mur de terreur",
                    "location" => [
                        "Offhand",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "Tank",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40400/mur-de-terreur",
                ],

                [
                    "name" => "Pas de Malygos",
                    "location" => [
                        "Feet",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Caster",
                    ],
                    "raid" => "L'oeil de l'éternité",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40519/pas-de-malygos",
                ],

                [
                    "name" => "Pierre à aiguiser météorique",
                    "location" => [
                        "Trinket 2",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "CAC",
                    ],
                    "raid" => "Hors raid",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=37390/pierre-%C3%A0-aiguiser-m%C3%A9t%C3%A9orique",
                ],

                [
                    "name" => "Piétineurs arcaniques",
                    "location" => [
                        "Feet",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "Caster",
                        "Healer",
                    ],
                    "raid" => "L'oeil de l'éternité",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40558/pi%C3%A9tineurs-arcaniques",
                ],

                [
                    "name" => "Piquant maudit",
                    "location" => [
                        "Offhand",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Caster",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40192/piquant-maudit",
                ],

                [
                    "name" => "Poignets de respect mutuel",
                    "location" => [
                        "Wrists",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Caster",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40324/poignets-de-respect-mutuel",
                ],

                [
                    "name" => "Poignets du ruisseau de vase",
                    "location" => [
                        "Wrists",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "CAC",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40282/poignets-du-ruisseau-de-vase",
                ],

                [
                    "name" => "Promesse rompue",
                    "location" => [
                        "Main Hand",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Tank",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40345/promesse-rompue",
                ],

                [
                    "name" => "Protecteur d'âme",
                    "location" => [
                        "Trinket 2",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Healer",
                    ],
                    "raid" => "Hors raid",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=37111/protecteur-d%C3%A2me#english-comments",
                ],

                [
                    "name" => "Rejeton de la matriarche",
                    "location" => [
                        "Offhand",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Caster",
                        "Healer",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=39719/mantelet-des-sauterelles",
                ],

                [
                    "name" => "Représentation de l'Âme des dragons",
                    "location" => [
                        "Trinket 1",
                        "Trinket 2",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "Caster",
                        "Healer",
                    ],
                    "raid" => "Le sanctum Obsidien",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40432/repr%C3%A9sentation-de-l%C3%A2me-des-dragons",
                ],

                [
                    "name" => "Robes de neige couvrantes",
                    "location" => [
                        "Chest",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Healer",
                    ],
                    "raid" => "L'oeil de l'éternité",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40194/robes-de-neige-couvrantes",
                ],

                [
                    "name" => "Sangle de la grâce divine",
                    "location" => [
                        "Waist",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Healer",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40259/sangle-de-la-gr%C3%A2ce-divine",
                ],

                [
                    "name" => "Soleret des représailles subites",
                    "location" => [
                        "Feet",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "CAC",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=39706/soleret-des-repr%C3%A9sailles-subites",
                ],

                [
                    "name" => "Solerets d'endurance",
                    "location" => [
                        "Feet",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Tank",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40297/solerets-dendurance",
                ],

                [
                    "name" => "Solerets de mélancolie",
                    "location" => [
                        "Feet",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "CAC",
                    ],
                    "raid" => "L'oeil de l'éternité",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40591/solerets-de-m%C3%A9lancolie",
                ],

                [
                    "name" => "Solerets inexorables",
                    "location" => [
                        "Feet",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "Tank",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=39717/solerets-inexorables",
                ],

                [
                    "name" => "T7",
                    "location" => [
                        "Chest",
                        "Hands",
                        "Head",
                        "Legs",
                        "Shoulders",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "CAC",
                        "Caster",
                        "Healer",
                        "Tank",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/guide/raids/tier-7-raid-sets",
                ],   

                [
                    "name" => "Torche du saint feu",
                    "location" => [
                        "Main Hand",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "Caster",
                        "Healer",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40395/torche-du-saint-feu",
                ],

                [
                    "name" => "Torsade de la calamité",
                    "location" => [
                        "Main Hand",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "CAC",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40383/torsade-de-la-calamit%C3%A9",
                ],

                [
                    "name" => "Totem de croissance forestière",
                    "location" => [
                        "Relic-Wand-Ranged",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Healer",
                    ],
                    "raid" => "Hors raid",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40709/totem-de-croissance-foresti%C3%A8re",
                ],

                [
                    "name" => "Totem de maléfice",
                    "location" => [
                        "Relic-Wand-Ranged",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Caster",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40267/totem-de-mal%C3%A9fice",
                ],

                [
                    "name" => "Traître à l'humanité",
                    "location" => [
                        "Main Hand",
                        "Offhand",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "CAC",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40384/tra%C3%AEtre-%C3%A0-lhumanit%C3%A9",
                ],

                [
                    "name" => "Urne des souvenirs perdus",
                    "location" => [
                        "Offhand",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Healer",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40350/urne-des-souvenirs-perdus",
                ],

                [
                    "name" => "Ventaille du trépassé",
                    "location" => [
                        "Head",
                    ],
                    "type" => "Bis",
                    "role" => [
                        "Healer",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40298/ventaille-du-tr%C3%A9pass%C3%A9",
                ],

                [
                    "name" => "Voix de la raison",
                    "location" => [
                        "Offhand",
                    ],
                    "type" => "Contested",
                    "role" => [
                        "Caster",
                        "Healer",
                    ],
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40401/voix-de-la-raison",
                ],
            
            ];

            // $itemsObjArray = [];
            foreach ($itemsObjArray as $currentItem) {
                
                $itemObj = new Item();

                $itemObj->setName($currentItem['name']);
                $itemObj->setType($currentItem['type']);
                $itemObj->setSlug($this->slugger->slug(mb_strtolower($currentItem['name'])));
                $itemObj->setDetail($currentItem['detail']);
                
                $raidObj = $this->getReference($currentItem["raid"]);
                $itemObj->setRaid($raidObj);
                
                // $locationObj = $this->getReference($currentItem["location"]);
                // $itemObj->addLocation($locationObj);
                foreach ($currentItem["location"] as $currentLocationName) {

                    $currentLocationObj = $locationObjArray[md5($currentLocationName)];
                    $itemObj->addLocation($currentLocationObj);
                }

                // $roleObj = $this->getReference($currentItem["role"]);
                // $itemObj->addRole($roleObj);
                foreach ($currentItem["role"] as $currentRoleName) {

                    $currentRoleObj = $rolesObjArray[md5($currentRoleName)];
                    $itemObj->addRole($currentRoleObj);
                }

                $manager->persist($itemObj);

                //* reference to link fixtures files
                $this->addReference($currentItem['name'], $itemObj);
            }

        // ------------------------------- Players -------------------------------
            $players = [

                [
                    "name" => "Arianhrod",
                    "class" => "Druide",
                    "score" => "0",
                    "role" => "CAC",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                    "item" => "Ambition infinie",
                    // "item" => [
                    //     "Ambition infinie",
                    //     "Vide",
                    // ],
                    // item doit pouvoir avoir pluseiurs datas ET doit contenir raid car le raid n'est pas propre au player mais à l'item
                    "raid" => "Naxxramas",
                    // le player participe aux events pas aux raids, la table event_player existe
                ],

                [
                    "name" => "Atanea",
                    "class" => "Prêtre",
                    "score" => "0",
                    "role" => "Healer",
                    "rank" => "Demi",
                    "is_actif" => "1",
                    "item" => "Bottes des énergies soignantes",
                    // "item" => [
                    //     "Bottes des énergies soignantes",
                    // ],
                    "raid" => "L'oeil de l'éternité",
                ],
                
                [
                    "name" => "Belzedar",
                    "class" => "Prêtre",
                    "score" => "0",
                    "role" => "Caster",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                
                [
                    "name" => "Bourla",
                    "class" => "Paladin",
                    "score" => "0",
                    "role" => "CAC",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                
                [
                    "name" => "Burgrogue",
                    "class" => "Voleur",
                    "score" => "0",
                    "role" => "CAC",
                    "rank" => "Demi",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                
                [
                    "name" => "Camchoupette",
                    "class" => "Paladin",
                    "score" => "0",
                    "role" => "Healer",
                    "rank" => "Galopin",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                
                [
                    "name" => "Cegar",
                    "class" => "Paladin",
                    "score" => "0",
                    "role" => "Healer",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                
                [
                    "name" => "Cheren",
                    "class" => "Chasseur",
                    "score" => "0",
                    "role" => "CAC",
                    "rank" => "Galopin",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                
                [
                    "name" => "Chipmage",
                    "class" => "Mage",
                    "score" => "0",
                    "role" => "Caster",
                    "rank" => "Demi",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                
                [
                    "name" => "Chpok",
                    "class" => "Mage",
                    "score" => "0",
                    "role" => "Caster",
                    "rank" => "Galopin",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                
                [
                    "name" => "Demoralyse",
                    "class" => "Démoniste",
                    "score" => "0",
                    "role" => "Caster",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                
                [
                    "name" => "Ekte",
                    "class" => "Paladin",
                    "score" => "0",
                    "role" => "CAC",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                
                [
                    "name" => "Elvi",
                    "class" => "Chevalier de la mort",
                    "score" => "0",
                    "role" => "CAC",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                
                [
                    "name" => "Euphorus",
                    "class" => "Voleur",
                    "score" => "0",
                    "role" => "CAC",
                    "rank" => "Galopin",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                
                [
                    "name" => "Farah",
                    "class" => "Chevalier de la mort",
                    "score" => "0",
                    "role" => "Tank",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                
                [
                    "name" => "Floriel",
                    "class" => "Druide",
                    "score" => "0",
                    "role" => "CAC",
                    "rank" => "Galopin",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                
                [
                    "name" => "Gazzole",
                    "class" => "Voleur",
                    "score" => "0",
                    "role" => "CAC",
                    "rank" => "Galopin",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                
                [
                    "name" => "Grymn",
                    "class" => "Guerrier",
                    "score" => "0",
                    "role" => "CAC",
                    "rank" => "Galopin",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                
                [
                    "name" => "Gulliver",
                    "class" => "Démoniste",
                    "score" => "0",
                    "role" => "Caster",
                    "rank" => "Galopin",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                
                [
                    "name" => "Gwen",
                    "class" => "Druide",
                    "score" => "0",
                    "role" => "Healer",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                
                [
                    "name" => "Icekarr",
                    "class" => "Chaman",
                    "score" => "0",
                    "role" => "Caster",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                
                [
                    "name" => "Judgentix",
                    "class" => "Paladin",
                    "score" => "0",
                    "role" => "CAC",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                
                [
                    "name" => "Kamari",
                    "class" => "Chasseur",
                    "score" => "0",
                    "role" => "CAC",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                
                [
                    "name" => "Keny",
                    "class" => "Chevalier de la mort",
                    "score" => "0",
                    "role" => "CAC",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                
                [
                    "name" => "Kwaky",
                    "class" => "Démoniste",
                    "score" => "0",
                    "role" => "Caster",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                
                [
                    "name" => "Lady",
                    "class" => "Mage",
                    "score" => "0",
                    "role" => "Caster",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                            
                [
                    "name" => "Limdul",
                    "class" => "Prêtre",
                    "score" => "0",
                    "role" => "Caster",
                    "rank" => "Demi",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                
                [
                    "name" => "Lucamar",
                    "class" => "Druide",
                    "score" => "0",
                    "role" => "Healer",
                    "rank" => "Galopin",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                            
                [
                    "name" => "Maxxam",
                    "class" => "Mage",
                    "score" => "0",
                    "role" => "Caster",
                    "rank" => "Galopin",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                
                [
                    "name" => "Mealyn",
                    "class" => "Mage",
                    "score" => "0",
                    "role" => "Caster",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                            
                [
                    "name" => "Mjol",
                    "class" => "Mage",
                    "score" => "0",
                    "role" => "Caster",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                
                [
                    "name" => "Necrogirl",
                    "class" => "Démoniste",
                    "score" => "0",
                    "role" => "Caster",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                            
                [
                    "name" => "Portish",
                    "class" => "Prêtre",
                    "score" => "0",
                    "role" => "Healer",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                
                [
                    "name" => "Pyro",
                    "class" => "Guerrier",
                    "score" => "0",
                    "role" => "CAC",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                            
                [
                    "name" => "Rim",
                    "class" => "Paladin",
                    "score" => "0",
                    "role" => "Healer",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                
                [
                    "name" => "Schaga",
                    "class" => "Chaman",
                    "score" => "0",
                    "role" => "Healer",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                            
                [
                    "name" => "Selena",
                    "class" => "Druide",
                    "score" => "0",
                    "role" => "Caster",
                    "rank" => "Demi",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                
                [
                    "name" => "Sha",
                    "class" => "Chevalier de la mort",
                    "score" => "0",
                    "role" => "CAC",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                            
                [
                    "name" => "Skenz",
                    "class" => "Chaman",
                    "score" => "0",
                    "role" => "Caster",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                
                [
                    "name" => "Sunks",
                    "class" => "Voleur",
                    "score" => "0",
                    "role" => "CAC",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                            
                [
                    "name" => "Tanriel",
                    "class" => "Chasseur",
                    "score" => "0",
                    "role" => "CAC",
                    "rank" => "Galopin",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                
                [
                    "name" => "Tindu",
                    "class" => "Guerrier",
                    "score" => "0",
                    "role" => "CAC",
                    "rank" => "Demi",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                            
                [
                    "name" => "Ulmo",
                    "class" => "Voleur",
                    "score" => "0",
                    "role" => "CAC",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                
                [
                    "name" => "Untardo",
                    "class" => "Chasseur",
                    "score" => "0",
                    "role" => "CAC",
                    "rank" => "Demi",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                            
                [
                    "name" => "Vali",
                    "class" => "Paladin",
                    "score" => "0",
                    "role" => "Tank",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                
                [
                    "name" => "Vultris",
                    "class" => "Démoniste",
                    "score" => "0",
                    "role" => "Caster",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                            
                [
                    "name" => "Xamena",
                    "class" => "Mage",
                    "score" => "0",
                    "role" => "Caster",
                    "rank" => "Demi",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                
                [
                    "name" => "Youyou",
                    "class" => "Druide",
                    "score" => "0",
                    "role" => "Caster",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                    "item" => "Vide",
                    "raid" => "Hors raid",
                ],
                
            ];

            $playersObjArray = [];
            foreach ($players as $currentPlayer) {
                
                $playerObj = new Player();

                $playerObj->setName($currentPlayer['name']);
                $playerObj->setClass($currentPlayer['class']);
                $playerObj->setScore($currentPlayer['score']);
                $playerObj->setRank($currentPlayer['rank']);
                $playerObj->setIsActif($currentPlayer['is_actif']);

                $playerObj->setSlug($this->slugger->slug(mb_strtolower($currentPlayer['name'])));

                $roleObj = $this->getReference($currentPlayer["role"]);
                $playerObj->setRole($roleObj);

                $itemObj = $this->getReference($currentPlayer["item"]);
                $playerObj->addItem($itemObj);               
                // foreach ($currentPlayer["item"] as $currentItemName) {
                //     $currentItemObj = $itemsObjArray[md5($currentItemName)];
                //     $playerObj->addItem($currentItemObj);
                // }

                $raidObj = $this->getReference($currentPlayer["raid"]);
                $playerObj->addRaid($raidObj);

                $manager->persist($playerObj);

                //* reference to link fixtures files
                $this->addReference($currentPlayer['name'], $playerObj);

            }


        // ------------------------------- Events -------------------------------
            $events = [
                [
                    "date" => "2022-11-30 20:45:00",
                    "log" => "https://classic.warcraftlogs.com/reports/GtrmZdLaC7Pykh2c/#boss=-2&difficulty=0&wipes=2&view=rankings",
                    "raid" => "Naxxramas",
                    "player" => "Arianhrod",
                    "item" => "Ambition infinie",
                    "is_bench" => true,
                ],

                [
                    "date" => "2022-12-15 20:45:00",
                    "log" => "https://classic.warcraftlogs.com/reports/GtrmZdLaC7Pykh2c/#boss=-2&difficulty=0&wipes=2&view=rankings",
                    "raid" => "L'oeil de l'éternité",
                    "player" => "Atanea",
                    "item" => "Bottes des énergies soignantes",
                    "is_bench" => true,
                ],

            ];

            foreach ($events as $currentEvent) {
                
                $eventObj = new Event();

                $eventObj->setDate(new DateTimeImmutable($currentEvent["date"]));
                $eventObj->setLog($currentEvent['log']);
            


                $raidObj = $this->getReference($currentEvent["raid"]);
                $eventObj->addRaid($raidObj);
                
                $playerObj = $this->getReference($currentEvent["player"]);
                $eventObj->addPlayer($playerObj);
                
                $itemObj = $this->getReference($currentEvent["item"]);
                $eventObj->addItem($itemObj);

                $manager->persist($eventObj);

            }


        $manager->flush();
    
    }
}