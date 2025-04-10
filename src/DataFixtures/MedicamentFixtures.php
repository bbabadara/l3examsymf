<?php

namespace App\DataFixtures;

use App\Entity\Medicament;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MedicamentFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Création des médicaments
        $medicament1 = new Medicament();
        $medicament1->setCode('MED001');
        $medicament1->setNom('Paracétamol');
        $manager->persist($medicament1);
        $this->addReference('medicament1', $medicament1);

        $medicament2 = new Medicament();
        $medicament2->setCode('MED002');
        $medicament2->setNom('Ibuprofène');
        $manager->persist($medicament2);
        $this->addReference('medicament2', $medicament2);

        $medicament3 = new Medicament();
        $medicament3->setCode('MED003');
        $medicament3->setNom('Amoxicilline');
        $manager->persist($medicament3);
        $this->addReference('medicament3', $medicament3);

        $manager->flush();
    }
} 