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
                "raid" => "Naxxramas",
                "name" => "Ambition infinie",
                "location" => "Neck",
                "type" => "Contested",
                "role" => "Tank",
                "detail" => "https://www.wowhead.com/wotlk/fr/item=40387/ambition-infinie",
            ],

            // [
            //     "name" => "Anneau d'invincibilité - Ring 1",
            //     "location" => "Ring 1",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Anneau d'invincibilité - Ring 2",
            //     "location" => "Ring 2",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Anneau de beauté décomposée",
            //     "location" => "Ring 2",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Anneau de la main lourde",
            //     "location" => "Ring 1",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Anneau du capteur tellurique",
            //     "location" => "Ring 2",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Averse de grêle",
            //     "location" => "Offhand",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Bague de magie canalisée - Caster",
            //     "location" => "Ring 1",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Bague de magie canalisée - Healer",
            //     "location" => "Ring 1",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Bague usée par le sable",
            //     "location" => "Ring 1",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Baguette de l'archiliche",
            //     "location" => "Relic-Wand-Ranged",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Baguette des nérubiens ornée",
            //     "location" => "Relic-Wand-Ranged",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Beauté ravie",
            //     "location" => "Ring 2",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Bottes de persuasion",
            //     "location" => "Feet",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Bottes des énergies soignantes",
            //     "location" => "Feet",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Bottes des idéaux impétueux",
            //     "location" => "Feet",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Bottes du vol renouvelé",
            //     "location" => "Feet",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Bottillons de la vile duperie",
            //     "location" => "Feet",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Brassards de complicité",
            //     "location" => "Wrists",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Brassards de l'attaque implacable",
            //     "location" => "Wrists",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Brassards du chevalier impie",
            //     "location" => "Wrists",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Brodequins de l'aube",
            //     "location" => "Feet",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Cachet de la conscience gelée",
            //     "location" => "Relic-Wand-Ranged",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Cachet de lutte du gladiateur fatal",
            //     "location" => "Relic-Wand-Ranged",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Cachet de vigilance",
            //     "location" => "Relic-Wand-Ranged",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Cadran solaire de l'exilé",
            //     "location" => "Trinket 2",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Cape des plumes de kea",
            //     "location" => "Back",
            //     "type" => "Bis", 
            // ],

            // [
            //     "name" => "Cape du pennon - Caster",
            //     "location" => "Back",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Cape du pennon - Healer",
            //     "location" => "Back",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Cape du sorcier déméritant",
            //     "location" => "Back",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Cape maillée en platine",
            //     "location" => "Back",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Carte de Sombrelune : Grandeur - CAC",
            //     "location" => "Trinket 1",
            //     "type" => "Bis", 
            // ],

            // [
            //     "name" => "Carte de Sombrelune : Grandeur - Healer",
            //     "location" => "Trinket 1",
            //     "type" => "Bis", 
            // ],

            // [
            //     "name" => "Ceinture de traque-peau",
            //     "location" => "Waist",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Ceinture rivetée dépravée",
            //     "location" => "Waist",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Ceinturon ablatif en chitine",
            //     "location" => "Waist",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Ceinturon de chevalerie",
            //     "location" => "Waist",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Ceinturon de récupération - Caster",
            //     "location" => "Waist",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Ceinturon de récupération - Healer",
            //     "location" => "Waist",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Cercle de mort",
            //     "location" => "Ring 2",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Chaîne d'adoration",
            //     "location" => "Neck",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Chapel de réconciliation",
            //     "location" => "Head",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Chaperon de rationalité",
            //     "location" => "Head",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Chevalière de la forteresse imprenable",
            //     "location" => "Ring 2",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Chevalière de la souffrance manifeste - Ring 1",
            //     "location" => "Ring 1",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Chevalière de la souffrance manifeste - Ring 2",
            //     "location" => "Ring 2",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Chevalière du malveillant",
            //     "location" => "Ring 1",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Clé de l'iris de focalisation",
            //     "location" => "Neck",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Cloche d'Af'Romaj",
            //     "location" => "Trinket 2",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Code du défenseur",
            //     "location" => "Trinket 1",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Collier de puissance du Repos du ver",
            //     "location" => "Neck",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Cordelette de polarité",
            //     "location" => "Waist",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Corselet des prouesses indéniables",
            //     "location" => "Chest",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Corselet du solitaire",
            //     "location" => "Chest",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Crispins sans souillure - Caster",
            //     "location" => "Wrists",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Crispins sans souillure - Healer",
            //     "location" => "Wrists",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Cuirasse de l'orage draconique",
            //     "location" => "Chest",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Cuissards de souveraineté",
            //     "location" => "Legs",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Drapé de l'ennemi mortel",
            //     "location" => "Back",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Effroi coléreux - Main Hand",
            //     "location" => "Main Hand",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Effroi coléreux - Offhand",
            //     "location" => "Offhand",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Emissaire de mortalité",
            //     "location" => "Relic-Wand-Ranged",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Espauliers de mort non naturelle",
            //     "location" => "Shoulders",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Essence de tulle",
            //     "location" => "Trinket 1",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Etreinte de l'araignée - Trinket 1",
            //     "location" => "Trinket 1",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Etreinte de l'araignée - Trinket 2",
            //     "location" => "Trinket 2",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Faveur de la reine dragon",
            //     "location" => "Neck",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Figurine de crabe monarchique",
            //     "location" => "Trinket 2",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Figurine de lièvre de rubis",
            //     "location" => "Trinket 1",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Fin du voyage",
            //     "location" => "Main Hand",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Fureur des cinq vols - Trinket 2",
            //     "location" => "Trinket 2",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Fureur des cinq vols - Trinket 3",
            //     "location" => "Trinket 3",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Fusil de combat blindé",
            //     "location" => "Relic-Wand-Ranged",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Gantelets de Zeliek",
            //     "location" => "Hands",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Gants du spectacle d'hiver",
            //     "location" => "Hands",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Garde-jambes de l'ossuaire",
            //     "location" => "Legs",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Garde-mains adroits givrés",
            //     "location" => "Hands",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Garde-porte",
            //     "location" => "Ring 1",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Grand anneau de collision",
            //     "location" => "Ring 2",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Grand heaume en obsidienne",
            //     "location" => "Head",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Grèves d'expiation",
            //     "location" => "Feet",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Habits putrides de Heigan",
            //     "location" => "Chest",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Halo pâlissant",
            //     "location" => "Relic-Wand-Ranged",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Heaume de l'aspect bleu",
            //     "location" => "Head",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Idole d'adoration",
            //     "location" => "Relic-Wand-Ranged",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Idole d'éveil",
            //     "location" => "Relic-Wand-Ranged",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Idole de l'étoile filante",
            //     "location" => "Relic-Wand-Ranged",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Impitoyable",
            //     "location" => "Ring 1",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Jambards du dragon vaincu",
            //     "location" => "Legs",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Jambières d'abomination rivetées",
            //     "location" => "Legs",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Jambières d'arrogance mortelle",
            //     "location" => "Legs",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Jambières de fuite ratée",
            //     "location" => "Legs",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Jambières des honorés",
            //     "location" => "Legs",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Jambières du lanceur de sorts dévergondé",
            //     "location" => "Legs",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Joyau perdu - Ring 1",
            //     "location" => "Ring 1",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Joyau perdu - Ring 2",
            //     "location" => "Ring 2",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "L'œuf d'essence mortelle",
            //     "location" => "Trinket 1",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "La Marée décisive - Caster",
            //     "location" => "Main Hand",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "La Marée décisive - Healer",
            //     "location" => "Main Hand",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Laisse de magie insouciante - Caster",
            //     "location" => "Waist",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Laisse de magie insouciante - Healer",
            //     "location" => "Waist",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Le dernier sourire - Main Hand - CAC",
            //     "location" => "Main Hand",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Le dernier sourire - Main Hand - Tank",
            //     "location" => "Main Hand",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Le dernier sourire - Offhand",
            //     "location" => "Offhand",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Le glas sinistre - Trinket 2",
            //     "location" => "Trinket 2",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Le glas sinistre - Trinket 3",
            //     "location" => "Trinket 3",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Les habits flottants du Sanctum - Caster",
            //     "location" => "Chest",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Les habits flottants du Sanctum - Healer",
            //     "location" => "Chest",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Libram d'obstruction",
            //     "location" => "Relic-Wand-Ranged",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Libram de renouveau",
            //     "location" => "Relic-Wand-Ranged",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Linceul en toile déchirée",
            //     "location" => "Waist",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Malédiction du mourant",
            //     "location" => "Trinket 1",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Manchettes de la proie impuissante",
            //     "location" => "Wrists",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Manchettes du décati",
            //     "location" => "Wrists",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Manchettes du pécheur",
            //     "location" => "Wrists",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Manteau de dispersion",
            //     "location" => "Shoulders",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Mantelet des sauterelles",
            //     "location" => "Shoulders",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Médaillon de lieur-de-vie",
            //     "location" => "Neck",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Membre excédentaire",
            //     "location" => "Offhand",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Miroir de vérité",
            //     "location" => "Trinket 2",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Mort entoilée",
            //     "location" => "Offhand",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Mur de terreur",
            //     "location" => "Offhand",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Pas de Malygos",
            //     "location" => "Feet",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Pierre à aiguiser météorique",
            //     "location" => "Trinket 2",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Piétineurs arcaniques - Caster",
            //     "location" => "Feet",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Piétineurs arcaniques - Healer",
            //     "location" => "Feet",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Piquant maudit",
            //     "location" => "Offhand",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Poignets de respect mutuel",
            //     "location" => "Wrists",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Poignets du ruisseau de vase",
            //     "location" => "Wrists",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Promesse rompue",
            //     "location" => "Main Hand",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Protecteur d'âme",
            //     "location" => "Trinket 2",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Rejeton de la matriarche - Caster",
            //     "location" => "Offhand",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Rejeton de la matriarche - Healer",
            //     "location" => "Offhand",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Représentation de l'Âme des dragons - Trinket 1",
            //     "location" => "Trinket 1",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Représentation de l'Âme des dragons - Trinket 2",
            //     "location" => "Trinket 2",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Robes de neige couvrantes",
            //     "location" => "Chest",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Sangle de la grâce divine",
            //     "location" => "Waist",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Soleret des représailles subites",
            //     "location" => "Feet",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Solerets d'endurance",
            //     "location" => "Feet",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Solerets de mélancolie",
            //     "location" => "Feet",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Solerets inexorables",
            //     "location" => "Feet",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Torche du saint feu - Caster",
            //     "location" => "Main Hand",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Torche du saint feu - Healer",
            //     "location" => "Main Hand",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Torsade de la calamité",
            //     "location" => "Main Hand",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Totem de croissance forestière",
            //     "location" => "Relic-Wand-Ranged",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Totem de maléfice",
            //     "location" => "Relic-Wand-Ranged",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Traître à l'humanité - Main Hand",
            //     "location" => "Main Hand",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Traître à l'humanité - Offhand",
            //     "location" => "Offhand",
            //     "type" => "Contested",
            // ],

            // [
            //     "name" => "Urne des souvenirs perdus",
            //     "location" => "Offhand",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Ventaille du trépassé",
            //     "location" => "Head",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Voix de la raison - Caster",
            //     "location" => "Offhand",
            //     "type" => "Bis",
            // ],

            // [
            //     "name" => "Voix de la raison - Healer",
            //     "location" => "Offhand",
            //     "type" => "Contested",
            // ],
          
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
            $itemObj->getRole($roleObj);

            $manager->persist($itemObj);

            //* reference to link fixtures files
            $this->addReference($currentItem['name'], $itemObj);
 
        }

        $manager->flush();
    }
}
