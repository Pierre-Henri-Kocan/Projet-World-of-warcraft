<?php

namespace App\DataFixtures;

use App\Entity\Item;
use App\Entity\Raid;
use App\Entity\Role;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class ItemFixtures extends Fixture implements DependentFixtureInterface 
{
    public function getDependencies()
   {
      return [
         RaidFixtures::class
      ];
   }

    private $slugger;

    public function __construct(SluggerInterface $slugger)
    {
         $this->slugger = $slugger;
    }

    public function load(ObjectManager $manager): void
    {
        $items = [
            [
                "name" => "Ambition infinie",
                "location" => "Neck",
                "type" => "Contested",
                "role" => "Tank",
                "raid" => "Naxxramas",
                "detail" => "https://www.wowhead.com/wotlk/fr/item=40387/ambition-infinie",
            ],

            [
                "name" => "Anneau d'invincibilité - Ring 1",
                "location" => "Ring 1",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Anneau d'invincibilité - Ring 2",
                "location" => "Ring 2",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],
 
            [
                "name" => "Anneau de beauté décomposée",
                "location" => "Ring 2",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Anneau de la main lourde",
                "location" => "Ring 1",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Anneau du capteur tellurique",
                "location" => "Ring 2",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Averse de grêle",
                "location" => "Offhand",
                "type" => "Bis",
            ],

            [
                "name" => "Bague de magie canalisée - Caster",
                "location" => "Ring 1",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Bague de magie canalisée - Healer",
                "location" => "Ring 1",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Bague usée par le sable",
                "location" => "Ring 1",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Baguette de l'archiliche",
                "location" => "Relic-Wand-Ranged",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Baguette des nérubiens ornée",
                "location" => "Relic-Wand-Ranged",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Beauté ravie",
                "location" => "Ring 2",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Bottes de persuasion",
                "location" => "Feet",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Bottes des énergies soignantes",
                "location" => "Feet",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Bottes des idéaux impétueux",
                "location" => "Feet",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Bottes du vol renouvelé",
                "location" => "Feet",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Bottillons de la vile duperie",
                "location" => "Feet",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Brassards de complicité",
                "location" => "Wrists",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Brassards de l'attaque implacable",
                "location" => "Wrists",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Brassards du chevalier impie",
                "location" => "Wrists",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Brodequins de l'aube",
                "location" => "Feet",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Cachet de la conscience gelée",
                "location" => "Relic-Wand-Ranged",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Cachet de lutte du gladiateur fatal",
                "location" => "Relic-Wand-Ranged",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Cachet de vigilance",
                "location" => "Relic-Wand-Ranged",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Cadran solaire de l'exilé",
                "location" => "Trinket 2",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Cape des plumes de kea",
                "location" => "Back",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Cape du pennon - Caster",
                "location" => "Back",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Cape du pennon - Healer",
                "location" => "Back",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Cape du sorcier déméritant",
                "location" => "Back",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Cape maillée en platine",
                "location" => "Back",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Carte de Sombrelune : Grandeur - CAC",
                "location" => "Trinket 1",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Carte de Sombrelune : Grandeur - Healer",
                "location" => "Trinket 1",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Ceinture de traque-peau",
                "location" => "Waist",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Ceinture rivetée dépravée",
                "location" => "Waist",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Ceinturon ablatif en chitine",
                "location" => "Waist",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Ceinturon de chevalerie",
                "location" => "Waist",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Ceinturon de récupération - Caster",
                "location" => "Waist",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Ceinturon de récupération - Healer",
                "location" => "Waist",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Cercle de mort",
                "location" => "Ring 2",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Chaîne d'adoration",
                "location" => "Neck",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Chapel de réconciliation",
                "location" => "Head",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Chaperon de rationalité",
                "location" => "Head",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Chevalière de la forteresse imprenable",
                "location" => "Ring 2",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Chevalière de la souffrance manifeste - Ring 1",
                "location" => "Ring 1",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Chevalière de la souffrance manifeste - Ring 2",
                "location" => "Ring 2",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Chevalière du malveillant",
                "location" => "Ring 1",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Clé de l'iris de focalisation",
                "location" => "Neck",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Cloche d'Af'Romaj",
                "location" => "Trinket 2",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Code du défenseur",
                "location" => "Trinket 1",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Collier de puissance du Repos du ver",
                "location" => "Neck",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Cordelette de polarité",
                "location" => "Waist",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Corselet des prouesses indéniables",
                "location" => "Chest",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Corselet du solitaire",
                "location" => "Chest",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Crispins sans souillure - Caster",
                "location" => "Wrists",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Crispins sans souillure - Healer",
                "location" => "Wrists",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Cuirasse de l'orage draconique",
                "location" => "Chest",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Cuissards de souveraineté",
                "location" => "Legs",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Drapé de l'ennemi mortel",
                "location" => "Back",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Effroi coléreux - Main Hand",
                "location" => "Main Hand",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Effroi coléreux - Offhand",
                "location" => "Offhand",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Emissaire de mortalité",
                "location" => "Relic-Wand-Ranged",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Espauliers de mort non naturelle",
                "location" => "Shoulders",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Essence de tulle",
                "location" => "Trinket 1",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Etreinte de l'araignée - Trinket 1",
                "location" => "Trinket 1",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Etreinte de l'araignée - Trinket 2",
                "location" => "Trinket 2",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Faveur de la reine dragon",
                "location" => "Neck",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Figurine de crabe monarchique",
                "location" => "Trinket 2",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Figurine de lièvre de rubis",
                "location" => "Trinket 1",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Fin du voyage",
                "location" => "Main Hand",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Fureur des cinq vols - Trinket 2",
                "location" => "Trinket 2",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Fureur des cinq vols - Trinket 3",
                "location" => "Trinket 3",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Fusil de combat blindé",
                "location" => "Relic-Wand-Ranged",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Gantelets de Zeliek",
                "location" => "Hands",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Gants du spectacle d'hiver",
                "location" => "Hands",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Garde-jambes de l'ossuaire",
                "location" => "Legs",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Garde-mains adroits givrés",
                "location" => "Hands",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Garde-porte",
                "location" => "Ring 1",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Grand anneau de collision",
                "location" => "Ring 2",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Grand heaume en obsidienne",
                "location" => "Head",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Grèves d'expiation",
                "location" => "Feet",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Habits putrides de Heigan",
                "location" => "Chest",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Halo pâlissant",
                "location" => "Relic-Wand-Ranged",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Heaume de l'aspect bleu",
                "location" => "Head",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Idole d'adoration",
                "location" => "Relic-Wand-Ranged",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Idole d'éveil",
                "location" => "Relic-Wand-Ranged",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Idole de l'étoile filante",
                "location" => "Relic-Wand-Ranged",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Impitoyable",
                "location" => "Ring 1",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Jambards du dragon vaincu",
                "location" => "Legs",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Jambières d'abomination rivetées",
                "location" => "Legs",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Jambières d'arrogance mortelle",
                "location" => "Legs",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Jambières de fuite ratée",
                "location" => "Legs",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Jambières des honorés",
                "location" => "Legs",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Jambières du lanceur de sorts dévergondé",
                "location" => "Legs",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Joyau perdu - Ring 1",
                "location" => "Ring 1",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Joyau perdu - Ring 2",
                "location" => "Ring 2",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "L'œuf d'essence mortelle",
                "location" => "Trinket 1",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "La Marée décisive - Caster",
                "location" => "Main Hand",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "La Marée décisive - Healer",
                "location" => "Main Hand",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Laisse de magie insouciante - Caster",
                "location" => "Waist",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Laisse de magie insouciante - Healer",
                "location" => "Waist",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Le dernier sourire - Main Hand - CAC",
                "location" => "Main Hand",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Le dernier sourire - Main Hand - Tank",
                "location" => "Main Hand",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Le dernier sourire - Offhand",
                "location" => "Offhand",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Le glas sinistre - Trinket 2",
                "location" => "Trinket 2",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Le glas sinistre - Trinket 3",
                "location" => "Trinket 3",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Les habits flottants du Sanctum - Caster",
                "location" => "Chest",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Les habits flottants du Sanctum - Healer",
                "location" => "Chest",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Libram d'obstruction",
                "location" => "Relic-Wand-Ranged",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Libram de renouveau",
                "location" => "Relic-Wand-Ranged",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Linceul en toile déchirée",
                "location" => "Waist",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Malédiction du mourant",
                "location" => "Trinket 1",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Manchettes de la proie impuissante",
                "location" => "Wrists",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Manchettes du décati",
                "location" => "Wrists",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Manchettes du pécheur",
                "location" => "Wrists",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Manteau de dispersion",
                "location" => "Shoulders",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Mantelet des sauterelles",
                "location" => "Shoulders",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Médaillon de lieur-de-vie",
                "location" => "Neck",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Membre excédentaire",
                "location" => "Offhand",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Miroir de vérité",
                "location" => "Trinket 2",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Mort entoilée",
                "location" => "Offhand",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Mur de terreur",
                "location" => "Offhand",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Pas de Malygos",
                "location" => "Feet",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Pierre à aiguiser météorique",
                "location" => "Trinket 2",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Piétineurs arcaniques - Caster",
                "location" => "Feet",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Piétineurs arcaniques - Healer",
                "location" => "Feet",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Piquant maudit",
                "location" => "Offhand",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Poignets de respect mutuel",
                "location" => "Wrists",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Poignets du ruisseau de vase",
                "location" => "Wrists",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Promesse rompue",
                "location" => "Main Hand",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Protecteur d'âme",
                "location" => "Trinket 2",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Rejeton de la matriarche - Caster",
                "location" => "Offhand",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Rejeton de la matriarche - Healer",
                "location" => "Offhand",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Représentation de l'Âme des dragons - Trinket 1",
                "location" => "Trinket 1",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Représentation de l'Âme des dragons - Trinket 2",
                "location" => "Trinket 2",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Robes de neige couvrantes",
                "location" => "Chest",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Sangle de la grâce divine",
                "location" => "Waist",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Soleret des représailles subites",
                "location" => "Feet",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Solerets d'endurance",
                "location" => "Feet",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Solerets de mélancolie",
                "location" => "Feet",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Solerets inexorables",
                "location" => "Feet",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Torche du saint feu - Caster",
                "location" => "Main Hand",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Torche du saint feu - Healer",
                "location" => "Main Hand",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Torsade de la calamité",
                "location" => "Main Hand",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Totem de croissance forestière",
                "location" => "Relic-Wand-Ranged",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Totem de maléfice",
                "location" => "Relic-Wand-Ranged",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Traître à l'humanité - Main Hand",
                "location" => "Main Hand",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Traître à l'humanité - Offhand",
                "location" => "Offhand",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Urne des souvenirs perdus",
                "location" => "Offhand",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Ventaille du trépassé",
                "location" => "Head",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Voix de la raison - Caster",
                "location" => "Offhand",
                "type" => "Bis",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],

            [
                "name" => "Voix de la raison - Healer",
                "location" => "Offhand",
                "type" => "Contested",
                "role" => "",
                "raid" => "",
                "detail" => "",
            ],
          
        ];

        $itemsObjArray = [];
        foreach ($items as $currentItem) {
            
            $itemObj = new Item();

            $itemObj->setName($currentItem['name']);
            $itemObj->setLocation($currentItem['location']);
            $itemObj->setType($currentItem['type']);
            $itemObj->setSlug($this->slugger->slug(mb_strtolower($currentItem['name'])));
            $itemObj->setDetail($currentItem['detail']);

            $raidObj = $this->getReference($currentItem["raid"]);
            $itemObj->setRaid($raidObj);

            $roleObj = $this->getReference($currentItem["role"]);
            $itemObj->addRole($roleObj);

            $manager->persist($itemObj);

            //* reference to link fixtures files
            $this->addReference($currentItem['name'], $itemObj);
 
        }

        $manager->flush();
    }
}
