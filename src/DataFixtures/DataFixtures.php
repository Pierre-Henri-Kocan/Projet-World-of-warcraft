<?php

namespace App\DataFixtures;

use App\Entity\Event;
use App\Entity\Item;
use App\Entity\Slot;
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
            $raidsObjArray = [
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

            // $raidsObjArray = [];
            foreach ($raidsObjArray as $currentRaid) {
                
                $raidObj = new Raid();

                $raidObj->setName($currentRaid['name']);
                $raidObj->setSlug($this->slugger->slug(mb_strtolower($currentRaid['name'])));

                $raidsObjArray[md5($currentRaid['name'])] = $raidObj;

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

        // ------------------------------- Slots -------------------------------
            $slotObjArray = [

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

            // $slotObjArray = [];
            foreach ($slotObjArray as $currentSlot) {

                $slotObj = new Slot();

                $slotObj->setName($currentSlot['name']);
                $slotObj->setSlug($this->slugger->slug(mb_strtolower($currentSlot['name'])));
                
                $slotObjArray[md5($currentSlot['name'])] = $slotObj;

                $manager->persist($slotObj);
            }

        // ------------------------------- Items -------------------------------
            $itemsObjArray = [
                [
                    "name" => "Vide",
                    "slot" => [
                        "...",
                    ],
                    "type" => "...",
                    "raid" => "Hors raid",
                    "detail" => "...",
                ],

                [
                    "name" => "Ambition infinie",
                    "slot" => [
                        "Neck",
                    ],
                    "type" => "Contested",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40387/ambition-infinie",
                ],

                [
                    "name" => "Anneau d'invincibilité",
                    "slot" => [
                        "Ring 1",
                        "Ring 2",
                    ],
                    "type" => "Bis",
                    "raid" => "Hors raid",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40717/anneau-dinvincibilit%C3%A9",
                ],

                [
                    "name" => "Anneau de beauté décomposée",
                    "slot" => [
                        "Ring 2",
                    ],
                    "type" => "Contested",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40375/anneau-de-beaut%C3%A9-d%C3%A9compos%C3%A9e",
                ],

                [
                    "name" => "Anneau de la main lourde",
                    "slot" => [
                        "Ring 1",
                    ],
                    "type" => "Contested",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40074/anneau-de-la-main-lourde",
                ],

                [
                    "name" => "Anneau du capteur tellurique",
                    "slot" => [
                        "Ring 2",
                    ],
                    "type" => "Contested",
                    "raid" => "L'oeil de l'éternité",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40474/anneau-du-capteur-tellurique",
                ],

                [
                    "name" => "Averse de grêle",
                    "slot" => [
                        "Offhand",
                    ],
                    "type" => "Bis",
                    "raid" => "L'oeil de l'éternité",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40491/averse-de-gr%C3%AAle",
                ],

                [
                    "name" => "Bague de magie canalisée",
                    "slot" => [
                        "Ring 1",
                    ],
                    "type" => "Bis",
                    "raid" => "Hors raid",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40719/bague-de-magie-canalis%C3%A9e",
                ],

                [
                    "name" => "Bague usée par le sable",
                    "slot" => [
                        "Ring 1",
                    ],
                    "type" => "Contested",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40107/bague-us%C3%A9e-par-le-sable",
                ],

                [
                    "name" => "Baguette de l'archiliche",
                    "slot" => [
                        "Relic-Wand-Ranged",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=39426/baguette-de-larchiliche",
                ],

                [
                    "name" => "Baguette des nérubiens ornée",
                    "slot" => [
                        "Relic-Wand-Ranged",
                    ],
                    "type" => "Contested",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=39712/baguette-des-n%C3%A9rubiens-orn%C3%A9e",
                ],

                [
                    "name" => "Beauté ravie",
                    "slot" => [
                        "Ring 2",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40108/beaut%C3%A9-ravie",
                ],

                [
                    "name" => "Bottes de persuasion",
                    "slot" => [
                        "Feet",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40269/bottes-de-persuasion",
                ],

                [
                    "name" => "Bottes des énergies soignantes",
                    "slot" => [
                        "Feet",
                    ],
                    "type" => "Bis",
                    "raid" => "L'oeil de l'éternité",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40592/bottes-des-%C3%A9nergies-soignantes",
                ],

                [
                    "name" => "Bottes des idéaux impétueux",
                    "slot" => [
                        "Feet",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40246/bottes-des-id%C3%A9aux-imp%C3%A9tueux",
                ],

                [
                    "name" => "Bottes du vol renouvelé",
                    "slot" => [
                        "Feet",
                    ],
                    "type" => "Bis",
                    "raid" => "L'oeil de l'éternité",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40549/bottes-du-vol-renouvel%C3%A9",
                ],

                [
                    "name" => "Bottillons de la vile duperie",
                    "slot" => [
                        "Feet",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40243/bottillons-de-la-vile-duperie",
                ],

                [
                    "name" => "Brassards de complicité",
                    "slot" => [
                        "Wrists",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40332/brassards-de-complicit%C3%A9",
                ],

                [
                    "name" => "Brassards de l'attaque implacable",
                    "slot" => [
                        "Wrists",
                    ],
                    "type" => "Contested",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40330/brassards-de-lattaque-implacable",
                ],

                [
                    "name" => "Brassards du chevalier impie",
                    "slot" => [
                        "Wrists",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40306/brassards-du-chevalier-impie",
                ],

                [
                    "name" => "Brodequins de l'aube",
                    "slot" => [
                        "Feet",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=39701/brodequins-de-laube",
                ],

                [
                    "name" => "Cachet de la conscience gelée",
                    "slot" => [
                        "Relic-Wand-Ranged",
                    ],
                    "type" => "Bis",
                    "raid" => "Hors raid",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40822/cachet-de-la-conscience-gel%C3%A9e",
                ],

                [
                    "name" => "Cachet de lutte du gladiateur fatal",
                    "slot" => [
                        "Relic-Wand-Ranged",
                    ],
                    "type" => "Bis",
                    "raid" => "Hors raid",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=42620/cachet-de-lutte-du-gladiateur-fatal",
                ],

                [
                    "name" => "Cachet de vigilance",
                    "slot" => [
                        "Relic-Wand-Ranged",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40207/cachet-de-vigilance",
                ],

                [
                    "name" => "Cadran solaire de l'exilé",
                    "slot" => [
                        "Trinket 2",
                    ],
                    "type" => "Bis",
                    "raid" => "Hors raid",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40682/cadran-solaire-de-lexil%C3%A9",
                ],

                [
                    "name" => "Cape des plumes de kea",
                    "slot" => [
                        "Back",
                    ],
                    "type" => "Bis",
                    "raid" => "Hors raid",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40724/cape-des-plumes-de-kea",
                ],

                [
                    "name" => "Cape du pennon",
                    "slot" => [
                        "Back",
                    ],
                    "type" => "Contested",
                    "raid" => "Le sanctum Obsidien",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=44005/cape-du-pennon",
                ],

                [
                    "name" => "Cape du sorcier déméritant",
                    "slot" => [
                        "Back",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40405/cape-du-sorcier-d%C3%A9m%C3%A9ritant",
                ],

                [
                    "name" => "Cape maillée en platine",
                    "slot" => [
                        "Back",
                    ],
                    "type" => "Contested",
                    "raid" => "Hors raid",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40722/cape-maill%C3%A9e-en-platine",
                ],

                [
                    "name" => "Carte de Sombrelune : Grandeur",
                    "slot" => [
                        "Trinket 1",
                    ],
                    "type" => "Bis",
                    "raid" => "Hors raid",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=44253/carte-de-sombrelune-grandeur",
                ],

                [
                    "name" => "Ceinture de traque-peau",
                    "slot" => [
                        "Waist",
                    ],
                    "type" => "Contested",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40205/ceinture-de-traque-peau",
                ],

                [
                    "name" => "Ceinture rivetée dépravée",
                    "slot" => [
                        "Waist",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40275/ceinture-rivet%C3%A9e-d%C3%A9prav%C3%A9e",
                ],

                [
                    "name" => "Ceinturon ablatif en chitine",
                    "slot" => [
                        "Waist",
                    ],
                    "type" => "Contested",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=39759/ceinturon-ablatif-en-chitine",
                ],

                [
                    "name" => "Ceinturon de chevalerie",
                    "slot" => [
                        "Waist",
                    ],
                    "type" => "Contested",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40278/ceinturon-de-chevalerie",
                ],

                [
                    "name" => "Ceinturon de récupération",
                    "slot" => [
                        "Waist",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40327/ceinturon-de-r%C3%A9cup%C3%A9ration",
                ],

                [
                    "name" => "Cercle de mort",
                    "slot" => [
                        "Ring 2",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=39401/cercle-de-mort",
                ],

                [
                    "name" => "Chaîne d'adoration",
                    "slot" => [
                        "Neck",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40071/cha%C3%AEne-dadoration",
                ],

                [
                    "name" => "Chapel de réconciliation",
                    "slot" => [
                        "Head",
                    ],
                    "type" => "Bis",
                    "raid" => "Le sanctum Obsidien",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=44007/chapel-de-r%C3%A9conciliation",
                ],

                [
                    "name" => "Chaperon de rationalité",
                    "slot" => [
                        "Head",
                    ],
                    "type" => "Bis",
                    "raid" => "L'oeil de l'éternité",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40562/chaperon-de-rationalit%C3%A9",
                ],

                [
                    "name" => "Chevalière de la forteresse imprenable",
                    "slot" => [
                        "Ring 2",
                    ],
                    "type" => "Contested",
                    "raid" => "Hors raid",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40718/chevali%C3%A8re-de-la-forteresse-imprenable",
                ],

                [
                    "name" => "Chevalière de la souffrance manifeste",
                    "slot" => [
                        "Ring 1",
                        "Ring 2",
                    ],
                    "type" => "Contested",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40399/chevali%C3%A8re-de-la-souffrance-manifeste",
                ],

                [
                    "name" => "Chevalière du malveillant",
                    "slot" => [
                        "Ring 1",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=39389/chevali%C3%A8re-du-malveillant",
                ],

                [
                    "name" => "Clé de l'iris de focalisation",
                    "slot" => [
                        "Neck",
                    ],
                    "type" => "Contested",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=44577/cl%C3%A9-h%C3%A9ro%C3%AFque-de-liris-de-focalisation",
                ],

                [
                    "name" => "Cloche d'Af'Romaj",
                    "slot" => [
                        "Trinket 2",
                    ],
                    "type" => "Bis",
                    "raid" => "Hors raid",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=37835/cloche-dafromaj",
                ],

                [
                    "name" => "Code du défenseur",
                    "slot" => [
                        "Trinket 1",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40257/code-du-d%C3%A9fenseur",
                ],

                [
                    "name" => "Collier de puissance du Repos du ver",
                    "slot" => [
                        "Neck",
                    ],
                    "type" => "Contested",
                    "raid" => "L'oeil de l'éternité",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=44661/collier-de-puissance-du-repos-du-ver",
                ],

                [
                    "name" => "Cordelette de polarité",
                    "slot" => [
                        "Waist",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40301/cordelette-de-polarit%C3%A9",
                ],

                [
                    "name" => "Corselet des prouesses indéniables",
                    "slot" => [
                        "Chest",
                    ],
                    "type" => "Bis",
                    "raid" => "Le sanctum Obsidien",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=43998/corselet-des-prouesses-ind%C3%A9niables",
                ],

                [
                    "name" => "Corselet du solitaire",
                    "slot" => [
                        "Chest",
                    ],
                    "type" => "Contested",
                    "raid" => "L'oeil de l'éternité",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40539/corselet-du-solitaire",
                ],

                [
                    "name" => "Crispins sans souillure",
                    "slot" => [
                        "Wrists",
                    ],
                    "type" => "Contested",
                    "raid" => "Le sanctum Obsidien",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=44008/crispins-sans-souillure",
                ],

                [
                    "name" => "Cuirasse de l'orage draconique",
                    "slot" => [
                        "Chest",
                    ],
                    "type" => "Bis",
                    "raid" => "Le sanctum Obsidien",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=44000/cuirasse-de-lorage-draconique",
                ],

                [
                    "name" => "Cuissards de souveraineté",
                    "slot" => [
                        "Legs",
                    ],
                    "type" => "Contested",
                    "raid" => "L'oeil de l'éternité",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40589/cuissards-de-souverainet%C3%A9",
                ],

                [
                    "name" => "Drapé de l'ennemi mortel",
                    "slot" => [
                        "Back",
                    ],
                    "type" => "Contested",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40403/drap%C3%A9-de-lennemi-mortel",
                ],

                [
                    "name" => "Effroi coléreux",
                    "slot" => [
                        "Main Hand",
                        "Offhand",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40189/effroi-col%C3%A9reux",
                ],

                [
                    "name" => "Emissaire de mortalité",
                    "slot" => [
                        "Relic-Wand-Ranged",
                    ],
                    "type" => "Contested",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40385/emissaire-de-mortalit%C3%A9",
                ],

                [
                    "name" => "Espauliers de mort non naturelle",
                    "slot" => [
                        "Shoulders",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=39704/espauliers-de-mort-non-naturelle",
                ],

                [
                    "name" => "Essence de tulle",
                    "slot" => [
                        "Trinket 1",
                    ],
                    "type" => "Bis",
                    "raid" => "Hors raid",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=37220/essence-de-tulle",
                ],

                [
                    "name" => "Etreinte de l'araignée",
                    "slot" => [
                        "Trinket 1",
                        "Trinket 2",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=39229/etreinte-de-laraign%C3%A9e",
                ],

                [
                    "name" => "Faveur de la reine dragon",
                    "slot" => [
                        "Neck",
                    ],
                    "type" => "Contested",
                    "raid" => "L'oeil de l'éternité",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=44664/faveur-de-la-reine-dragon",
                ],

                [
                    "name" => "Figurine de crabe monarchique",
                    "slot" => [
                        "Trinket 2",
                    ],
                    "type" => "Bis",
                    "raid" => "Hors raid",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=44063/figurine-de-crabe-monarchique",
                ],

                [
                    "name" => "Figurine de lièvre de rubis",
                    "slot" => [
                        "Trinket 1",
                    ],
                    "type" => "Bis",
                    "raid" => "Hors raid",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=42341/figurine-de-li%C3%A8vre-de-rubis",
                ],

                [
                    "name" => "Fin du voyage",
                    "slot" => [
                        "Main Hand",
                    ],
                    "type" => "Contested",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40388/fin-du-voyage",
                ],

                [
                    "name" => "Fureur des cinq vols",
                    "slot" => [
                        "Trinket 2",
                        "Trinket 3",
                    ],
                    "type" => "Contested",
                    "raid" => "Le sanctum Obsidien",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40431/fureur-des-cinq-vols",
                ],

                [
                    "name" => "Fusil de combat blindé",
                    "slot" => [
                        "Relic-Wand-Ranged",
                    ],
                    "type" => "Bis",
                    "raid" => "Hors raid",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=41168/fusil-de-combat-blind%C3%A9",
                ],

                [
                    "name" => "Gantelets de Zeliek",
                    "slot" => [
                        "Hands",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40347/gantelets-de-zeliek",
                ],

                [
                    "name" => "Gants du spectacle d'hiver",
                    "slot" => [
                        "Hands",
                    ],
                    "type" => "Bis",
                    "raid" => "L'oeil de l'éternité",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40564/gants-du-spectacle-dhiver",
                ],

                [
                    "name" => "Garde-jambes de l'ossuaire",
                    "slot" => [
                        "Legs",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40379/garde-jambes-de-lossuaire",
                ],

                [
                    "name" => "Garde-mains adroits givrés",
                    "slot" => [
                        "Hands",
                    ],
                    "type" => "Contested",
                    "raid" => "L'oeil de l'éternité",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40541/garde-mains-adroits-givr%C3%A9s",
                ],

                [
                    "name" => "Garde-porte",
                    "slot" => [
                        "Ring 1",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40370/garde-porte",
                ],

                [
                    "name" => "Grand anneau de collision",
                    "slot" => [
                        "Ring 2",
                    ],
                    "type" => "Bis",
                    "raid" => "Le sanctum Obsidien",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=43993/grand-anneau-de-collision",
                ],

                [
                    "name" => "Grand heaume en obsidienne",
                    "slot" => [
                        "Head",
                    ],
                    "type" => "Contested",
                    "raid" => "Le sanctum Obsidien",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=44006/grand-heaume-en-obsidienne",
                ],

                [
                    "name" => "Grèves d'expiation",
                    "slot" => [
                        "Feet",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=39734/gr%C3%A8ves-dexpiation",
                ],

                [
                    "name" => "Habits putrides de Heigan",
                    "slot" => [
                        "Chest",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40234/habits-putrides-de-heigan",
                ],

                [
                    "name" => "Halo pâlissant",
                    "slot" => [
                        "Relic-Wand-Ranged",
                    ],
                    "type" => "Contested",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40245/halo-p%C3%A2lissant",
                ],

                [
                    "name" => "Heaume de l'aspect bleu",
                    "slot" => [
                        "Head",
                    ],
                    "type" => "Bis",
                    "raid" => "L'oeil de l'éternité",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40543/heaume-de-laspect-bleu",
                ],

                [
                    "name" => "Idole d'adoration",
                    "slot" => [
                        "Relic-Wand-Ranged",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=39757/idole-dadoration",
                ],

                [
                    "name" => "Idole d'éveil",
                    "slot" => [
                        "Relic-Wand-Ranged",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40342/idole-d%C3%A9veil",
                ],

                [
                    "name" => "Idole de l'étoile filante",
                    "slot" => [
                        "Relic-Wand-Ranged",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40321/idole-de-l%C3%A9toile-filante",
                ],

                [
                    "name" => "Impitoyable",
                    "slot" => [
                        "Ring 1",
                    ],
                    "type" => "Contested",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40075/impitoyable",
                ],

                [
                    "name" => "Jambards du dragon vaincu",
                    "slot" => [
                        "Legs",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40376/jambards-du-dragon-vaincu",
                ],

                [
                    "name" => "Jambières d'abomination rivetées",
                    "slot" => [
                        "Legs",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40294/jambi%C3%A8res-dabomination-rivet%C3%A9es",
                ],

                [
                    "name" => "Jambières d'arrogance mortelle",
                    "slot" => [
                        "Legs",
                    ],
                    "type" => "Contested",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40398/jambi%C3%A8res-darrogance-mortelle",
                ],

                [
                    "name" => "Jambières de fuite ratée",
                    "slot" => [
                        "Legs",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40331/jambi%C3%A8res-de-fuite-rat%C3%A9e",
                ],

                [
                    "name" => "Jambières des honorés",
                    "slot" => [
                        "Legs",
                    ],
                    "type" => "Contested",
                    "raid" => "Le sanctum Obsidien",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=44011/jambi%C3%A8res-des-honor%C3%A9s",
                ],

                [
                    "name" => "Jambières du lanceur de sorts dévergondé",
                    "slot" => [
                        "Legs",
                    ],
                    "type" => "Contested",
                    "raid" => "L'oeil de l'éternité",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40560/jambi%C3%A8res-du-lanceur-de-sorts-d%C3%A9vergond%C3%A9",
                ],

                [
                    "name" => "Joyau perdu",
                    "slot" => [
                        "Ring 1",
                        "Ring 2",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40080/joyau-perdu",
                ],

                [
                    "name" => "L'œuf d'essence mortelle",
                    "slot" => [
                        "Trinket 1",
                    ],
                    "type" => "Bis",
                    "raid" => "Hors raid",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40685/l%C5%93uf-dessence-mortelle",
                ],

                [
                    "name" => "La Marée décisive",
                    "slot" => [
                        "Main Hand",
                    ],
                    "type" => "Contested",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40396/la-mar%C3%A9e-d%C3%A9cisive",
                ],

                [
                    "name" => "Laisse de magie insouciante",
                    "slot" => [
                        "Waist",
                    ],
                    "type" => "Contested",
                    "raid" => "L'oeil de l'éternité",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40561/laisse-de-magie-insouciante",
                ],

                [
                    "name" => "Le dernier sourire",
                    "slot" => [
                        "Main Hand",
                    ],
                    "type" => "Contested",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40402/le-dernier-sourire",
                ],

                [
                    "name" => "Le glas sinistre",
                    "slot" => [
                        "Trinket 2",
                        "Trinket 3",
                    ],
                    "type" => "Contested",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40256/le-glas-sinistre",
                ],

                [
                    "name" => "Les habits flottants du Sanctum",
                    "slot" => [
                        "Chest",
                    ],
                    "type" => "Bis",
                    "raid" => "Le sanctum Obsidien",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=44002/les-habits-flottants-du-sanctum",
                ],

                [
                    "name" => "Libram d'obstruction",
                    "slot" => [
                        "Relic-Wand-Ranged",
                    ],
                    "type" => "Bis",
                    "raid" => "Hors raid",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40707/libram-dobstruction",
                ],

                [
                    "name" => "Libram de renouveau",
                    "slot" => [
                        "Relic-Wand-Ranged",
                    ],
                    "type" => "Bis",
                    "raid" => "Hors raid",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40705/libram-de-renouveau",
                ],

                [
                    "name" => "Linceul en toile déchirée",
                    "slot" => [
                        "Waist",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=39762/linceul-en-toile-d%C3%A9chir%C3%A9e",
                ],

                [
                    "name" => "Malédiction du mourant",
                    "slot" => [
                        "Trinket 1",
                    ],
                    "type" => "Contested",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40255/mal%C3%A9diction-du-mourant",
                ],

                [
                    "name" => "Manchettes de la proie impuissante",
                    "slot" => [
                        "Wrists",
                    ],
                    "type" => "Contested",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=39764/manchettes-de-la-proie-impuissante",
                ],

                [
                    "name" => "Manchettes du décati",
                    "slot" => [
                        "Wrists",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40209/manchettes-du-d%C3%A9cati",
                ],

                [
                    "name" => "Manchettes du pécheur",
                    "slot" => [
                        "Wrists",
                    ],
                    "type" => "Contested",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=39765/manchettes-du-p%C3%A9cheur",
                ],

                [
                    "name" => "Manteau de dispersion",
                    "slot" => [
                        "Shoulders",
                    ],
                    "type" => "Bis",
                    "raid" => "L'oeil de l'éternité",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40555/manteau-de-dispersion",
                ],

                [
                    "name" => "Mantelet des sauterelles",
                    "slot" => [
                        "Shoulders",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=39719/mantelet-des-sauterelles",
                ],

                [
                    "name" => "Médaillon de lieur-de-vie",
                    "slot" => [
                        "Neck",
                    ],
                    "type" => "Contested",
                    "raid" => "L'oeil de l'éternité",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=44662/m%C3%A9daillon-de-lieur-de-vie",
                ],

                [
                    "name" => "Membre excédentaire",
                    "slot" => [
                        "Offhand",
                    ],
                    "type" => "Contested",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40273/membre-exc%C3%A9dentaire",
                ],

                [
                    "name" => "Miroir de vérité",
                    "slot" => [
                        "Trinket 2",
                    ],
                    "type" => "Bis",
                    "raid" => "Hors raid",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40684/miroir-de-v%C3%A9rit%C3%A9",
                ],

                [
                    "name" => "Mort entoilée",
                    "slot" => [
                        "Offhand",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=39714/mort-entoil%C3%A9e",
                ],

                [
                    "name" => "Mur de terreur",
                    "slot" => [
                        "Offhand",
                    ],
                    "type" => "Contested",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40400/mur-de-terreur",
                ],

                [
                    "name" => "Pas de Malygos",
                    "slot" => [
                        "Feet",
                    ],
                    "type" => "Bis",
                    "raid" => "L'oeil de l'éternité",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40519/pas-de-malygos",
                ],

                [
                    "name" => "Pierre à aiguiser météorique",
                    "slot" => [
                        "Trinket 2",
                    ],
                    "type" => "Bis",
                    "raid" => "Hors raid",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=37390/pierre-%C3%A0-aiguiser-m%C3%A9t%C3%A9orique",
                ],

                [
                    "name" => "Piétineurs arcaniques",
                    "slot" => [
                        "Feet",
                    ],
                    "type" => "Contested",
                    "raid" => "L'oeil de l'éternité",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40558/pi%C3%A9tineurs-arcaniques",
                ],

                [
                    "name" => "Piquant maudit",
                    "slot" => [
                        "Offhand",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40192/piquant-maudit",
                ],

                [
                    "name" => "Poignets de respect mutuel",
                    "slot" => [
                        "Wrists",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40324/poignets-de-respect-mutuel",
                ],

                [
                    "name" => "Poignets du ruisseau de vase",
                    "slot" => [
                        "Wrists",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40282/poignets-du-ruisseau-de-vase",
                ],

                [
                    "name" => "Promesse rompue",
                    "slot" => [
                        "Main Hand",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40345/promesse-rompue",
                ],

                [
                    "name" => "Protecteur d'âme",
                    "slot" => [
                        "Trinket 2",
                    ],
                    "type" => "Bis",
                    "raid" => "Hors raid",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=37111/protecteur-d%C3%A2me#english-comments",
                ],

                [
                    "name" => "Rejeton de la matriarche",
                    "slot" => [
                        "Offhand",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=39719/mantelet-des-sauterelles",
                ],

                [
                    "name" => "Représentation de l'Âme des dragons",
                    "slot" => [
                        "Trinket 1",
                        "Trinket 2",
                    ],
                    "type" => "Contested",
                    "raid" => "Le sanctum Obsidien",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40432/repr%C3%A9sentation-de-l%C3%A2me-des-dragons",
                ],

                [
                    "name" => "Robes de neige couvrantes",
                    "slot" => [
                        "Chest",
                    ],
                    "type" => "Bis",
                    "raid" => "L'oeil de l'éternité",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40194/robes-de-neige-couvrantes",
                ],

                [
                    "name" => "Sangle de la grâce divine",
                    "slot" => [
                        "Waist",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40259/sangle-de-la-gr%C3%A2ce-divine",
                ],

                [
                    "name" => "Soleret des représailles subites",
                    "slot" => [
                        "Feet",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=39706/soleret-des-repr%C3%A9sailles-subites",
                ],

                [
                    "name" => "Solerets d'endurance",
                    "slot" => [
                        "Feet",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40297/solerets-dendurance",
                ],

                [
                    "name" => "Solerets de mélancolie",
                    "slot" => [
                        "Feet",
                    ],
                    "type" => "Contested",
                    "raid" => "L'oeil de l'éternité",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40591/solerets-de-m%C3%A9lancolie",
                ],

                [
                    "name" => "Solerets inexorables",
                    "slot" => [
                        "Feet",
                    ],
                    "type" => "Contested",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=39717/solerets-inexorables",
                ],

                [
                    "name" => "T7",
                    "slot" => [
                        "Chest",
                        "Hands",
                        "Head",
                        "Legs",
                        "Shoulders",
                    ],
                    "type" => "Contested",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/guide/raids/tier-7-raid-sets",
                ],   

                [
                    "name" => "Torche du saint feu",
                    "slot" => [
                        "Main Hand",
                    ],
                    "type" => "Contested",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40395/torche-du-saint-feu",
                ],

                [
                    "name" => "Torsade de la calamité",
                    "slot" => [
                        "Main Hand",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40383/torsade-de-la-calamit%C3%A9",
                ],

                [
                    "name" => "Totem de croissance forestière",
                    "slot" => [
                        "Relic-Wand-Ranged",
                    ],
                    "type" => "Bis",
                    "raid" => "Hors raid",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40709/totem-de-croissance-foresti%C3%A8re",
                ],

                [
                    "name" => "Totem de maléfice",
                    "slot" => [
                        "Relic-Wand-Ranged",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40267/totem-de-mal%C3%A9fice",
                ],

                [
                    "name" => "Traître à l'humanité",
                    "slot" => [
                        "Main Hand",
                        "Offhand",
                    ],
                    "type" => "Contested",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40384/tra%C3%AEtre-%C3%A0-lhumanit%C3%A9",
                ],

                [
                    "name" => "Urne des souvenirs perdus",
                    "slot" => [
                        "Offhand",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40350/urne-des-souvenirs-perdus",
                ],

                [
                    "name" => "Ventaille du trépassé",
                    "slot" => [
                        "Head",
                    ],
                    "type" => "Bis",
                    "raid" => "Naxxramas",
                    "detail" => "https://www.wowhead.com/wotlk/fr/item=40298/ventaille-du-tr%C3%A9pass%C3%A9",
                ],

                [
                    "name" => "Voix de la raison",
                    "slot" => [
                        "Offhand",
                    ],
                    "type" => "Contested",
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
                
                // $slotObj = $this->getReference($currentItem["slot"]);
                // $itemObj->addSlot($slotObj);
                foreach ($currentItem["slot"] as $currentSlotName) {

                    $currentSlotObj = $slotObjArray[md5($currentSlotName)];
                    $itemObj->addSlot($currentSlotObj);
                };

                $itemsObjArray[md5($currentItem['name'])] = $itemObj;

                $manager->persist($itemObj);

                //* reference to link fixtures files
                $this->addReference($currentItem['name'], $itemObj);
            }

        // ------------------------------- Players -------------------------------
            $playersObjArray = [

                [
                    "name" => "Arianhrod",
                    "class" => "Druide",
                    "score" => "0",
                    "role" => "CAC",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                ],

                [
                    "name" => "Atanea",
                    "class" => "Prêtre",
                    "score" => "0",
                    "role" => "Healer",
                    "rank" => "Demi",
                    "is_actif" => "1",
                ],
                
                [
                    "name" => "Belzedar",
                    "class" => "Prêtre",
                    "score" => "0",
                    "role" => "Caster",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                ],
                
                [
                    "name" => "Bourla",
                    "class" => "Paladin",
                    "score" => "0",
                    "role" => "CAC",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                ],
                
                [
                    "name" => "Burgrogue",
                    "class" => "Voleur",
                    "score" => "0",
                    "role" => "CAC",
                    "rank" => "Demi",
                    "is_actif" => "1",
                ],
                
                [
                    "name" => "Camchoupette",
                    "class" => "Paladin",
                    "score" => "0",
                    "role" => "Healer",
                    "rank" => "Galopin",
                    "is_actif" => "1",
                ],
                
                [
                    "name" => "Cegar",
                    "class" => "Paladin",
                    "score" => "0",
                    "role" => "Healer",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                ],
                
                [
                    "name" => "Cheren",
                    "class" => "Chasseur",
                    "score" => "0",
                    "role" => "CAC",
                    "rank" => "Galopin",
                    "is_actif" => "1",
                ],
                
                [
                    "name" => "Chipmage",
                    "class" => "Mage",
                    "score" => "0",
                    "role" => "Caster",
                    "rank" => "Demi",
                    "is_actif" => "1",
                ],
                
                [
                    "name" => "Chpok",
                    "class" => "Mage",
                    "score" => "0",
                    "role" => "Caster",
                    "rank" => "Galopin",
                    "is_actif" => "1",
                ],
                
                [
                    "name" => "Demoralyse",
                    "class" => "Démoniste",
                    "score" => "0",
                    "role" => "Caster",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                ],
                
                [
                    "name" => "Ekte",
                    "class" => "Paladin",
                    "score" => "0",
                    "role" => "CAC",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                ],
                
                [
                    "name" => "Elvi",
                    "class" => "Chevalier de la mort",
                    "score" => "0",
                    "role" => "CAC",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                ],
                
                [
                    "name" => "Euphorus",
                    "class" => "Voleur",
                    "score" => "0",
                    "role" => "CAC",
                    "rank" => "Galopin",
                    "is_actif" => "1",
                ],
                
                [
                    "name" => "Farah",
                    "class" => "Chevalier de la mort",
                    "score" => "0",
                    "role" => "Tank",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                ],
                
                [
                    "name" => "Floriel",
                    "class" => "Druide",
                    "score" => "0",
                    "role" => "CAC",
                    "rank" => "Galopin",
                    "is_actif" => "1",
                ],
                
                [
                    "name" => "Gazzole",
                    "class" => "Voleur",
                    "score" => "0",
                    "role" => "CAC",
                    "rank" => "Galopin",
                    "is_actif" => "1",
                ],
                
                [
                    "name" => "Grymn",
                    "class" => "Guerrier",
                    "score" => "0",
                    "role" => "CAC",
                    "rank" => "Galopin",
                    "is_actif" => "1",
                ],
                
                [
                    "name" => "Gulliver",
                    "class" => "Démoniste",
                    "score" => "0",
                    "role" => "Caster",
                    "rank" => "Galopin",
                    "is_actif" => "1",
                ],
                
                [
                    "name" => "Gwen",
                    "class" => "Druide",
                    "score" => "0",
                    "role" => "Healer",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                ],
                
                [
                    "name" => "Icekarr",
                    "class" => "Chaman",
                    "score" => "0",
                    "role" => "Caster",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                ],
                
                [
                    "name" => "Judgentix",
                    "class" => "Paladin",
                    "score" => "0",
                    "role" => "CAC",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                ],
                
                [
                    "name" => "Kamari",
                    "class" => "Chasseur",
                    "score" => "0",
                    "role" => "CAC",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                ],
                
                [
                    "name" => "Keny",
                    "class" => "Chevalier de la mort",
                    "score" => "0",
                    "role" => "CAC",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                ],
                
                [
                    "name" => "Kwaky",
                    "class" => "Démoniste",
                    "score" => "0",
                    "role" => "Caster",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                ],
                
                [
                    "name" => "Lady",
                    "class" => "Mage",
                    "score" => "0",
                    "role" => "Caster",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                ],
                            
                [
                    "name" => "Limdul",
                    "class" => "Prêtre",
                    "score" => "0",
                    "role" => "Caster",
                    "rank" => "Demi",
                    "is_actif" => "1",
                ],
                
                [
                    "name" => "Lucamar",
                    "class" => "Druide",
                    "score" => "0",
                    "role" => "Healer",
                    "rank" => "Galopin",
                    "is_actif" => "1",
                ],
                            
                [
                    "name" => "Maxxam",
                    "class" => "Mage",
                    "score" => "0",
                    "role" => "Caster",
                    "rank" => "Galopin",
                    "is_actif" => "1",
                ],
                
                [
                    "name" => "Mealyn",
                    "class" => "Mage",
                    "score" => "0",
                    "role" => "Caster",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                ],
                            
                [
                    "name" => "Mjol",
                    "class" => "Mage",
                    "score" => "0",
                    "role" => "Caster",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                ],
                
                [
                    "name" => "Necrogirl",
                    "class" => "Démoniste",
                    "score" => "0",
                    "role" => "Caster",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                ],
                            
                [
                    "name" => "Portish",
                    "class" => "Prêtre",
                    "score" => "0",
                    "role" => "Healer",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                ],
                
                [
                    "name" => "Pyro",
                    "class" => "Guerrier",
                    "score" => "0",
                    "role" => "CAC",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                ],
                            
                [
                    "name" => "Rim",
                    "class" => "Paladin",
                    "score" => "0",
                    "role" => "Healer",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                ],
                
                [
                    "name" => "Schaga",
                    "class" => "Chaman",
                    "score" => "0",
                    "role" => "Healer",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                ],
                            
                [
                    "name" => "Selena",
                    "class" => "Druide",
                    "score" => "0",
                    "role" => "Caster",
                    "rank" => "Demi",
                    "is_actif" => "1",
                ],
                
                [
                    "name" => "Sha",
                    "class" => "Chevalier de la mort",
                    "score" => "0",
                    "role" => "CAC",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                ],
                            
                [
                    "name" => "Skenz",
                    "class" => "Chaman",
                    "score" => "0",
                    "role" => "Caster",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                ],
                
                [
                    "name" => "Sunks",
                    "class" => "Voleur",
                    "score" => "0",
                    "role" => "CAC",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                ],
                            
                [
                    "name" => "Tanriel",
                    "class" => "Chasseur",
                    "score" => "0",
                    "role" => "CAC",
                    "rank" => "Galopin",
                    "is_actif" => "1",
                ],
                
                [
                    "name" => "Tindu",
                    "class" => "Guerrier",
                    "score" => "0",
                    "role" => "CAC",
                    "rank" => "Demi",
                    "is_actif" => "1",
                ],
                            
                [
                    "name" => "Ulmo",
                    "class" => "Voleur",
                    "score" => "0",
                    "role" => "CAC",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                ],
                
                [
                    "name" => "Untardo",
                    "class" => "Chasseur",
                    "score" => "0",
                    "role" => "CAC",
                    "rank" => "Demi",
                    "is_actif" => "1",
                ],
                            
                [
                    "name" => "Vali",
                    "class" => "Paladin",
                    "score" => "0",
                    "role" => "Tank",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                ],
                
                [
                    "name" => "Vultris",
                    "class" => "Démoniste",
                    "score" => "0",
                    "role" => "Caster",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                ],
                            
                [
                    "name" => "Xamena",
                    "class" => "Mage",
                    "score" => "0",
                    "role" => "Caster",
                    "rank" => "Demi",
                    "is_actif" => "1",
                ],
                
                [
                    "name" => "Youyou",
                    "class" => "Druide",
                    "score" => "0",
                    "role" => "Caster",
                    "rank" => "Sérieux",
                    "is_actif" => "1",
                ],
                
            ];

            // $playersObjArray = [];
            foreach ($playersObjArray as $currentPlayer) {
                
                $playerObj = new Player();

                $playerObj->setName($currentPlayer['name']);
                $playerObj->setClass($currentPlayer['class']);
                $playerObj->setScore($currentPlayer['score']);
                $playerObj->setRank($currentPlayer['rank']);
                $playerObj->setIsActif($currentPlayer['is_actif']);

                $playerObj->setSlug($this->slugger->slug(mb_strtolower($currentPlayer['name'])));

                $roleObj = $this->getReference($currentPlayer["role"]);
                $playerObj->setRole($roleObj);

                $playersObjArray[md5($currentPlayer['name'])] = $playerObj;

                $manager->persist($playerObj);

                //* reference to link fixtures files
                $this->addReference($currentPlayer['name'], $playerObj);

            }


        // ------------------------------- Events -------------------------------
            $events = [
                [
                    "date" => "2022-11-30 20:45:00",
                    "log" => "https://classic.warcraftlogs.com/reports/GtrmZdLaC7Pykh2c/#boss=-2&difficulty=0&wipes=2&view=rankings",
                    "raid" => [
                        "Naxxramas",
                        "L'oeil de l'éternité",
                    ],
                    "item" => [
                        "Ambition infinie",
                        "Bottes des énergies soignantes",
                    ],
                ],

                [
                    "date" => "2022-12-15 20:45:00",
                    "log" => "https://classic.warcraftlogs.com/reports/GtrmZdLaC7Pykh2c/#boss=-2&difficulty=0&wipes=2&view=rankings",
                    "raid" => [
                        "L'oeil de l'éternité",
                    ],
                    "item" => [
                        "Bottes des énergies soignantes",
                    ],
                ],

            ];

            foreach ($events as $currentEvent) {
                
                $eventObj = new Event();

                $eventObj->setDate(new DateTimeImmutable($currentEvent["date"]));
                $eventObj->setLog($currentEvent['log']);
    
                // $raidObj = $this->getReference($currentEvent["raid"]);
                // $eventObj->addRaid($raidObj);
                foreach ($currentEvent["raid"] as $currentRaidName) {
                    $currentEventObj = $raidsObjArray[md5($currentRaidName)];
                    $eventObj->addRaid($currentEventObj);
                };
                
                // $itemObj = $this->getReference($currentEvent["item"]);
                // $eventObj->addItem($itemObj);
                foreach ($currentEvent["item"] as $currentItemName) {
                    $currentEventObj = $itemsObjArray[md5($currentItemName)];
                    $eventObj->addItem($currentEventObj);
                };

                $manager->persist($eventObj);

            }


        $manager->flush();
    
    }
}