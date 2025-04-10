<?php

namespace App\DataFixtures;

use App\Entity\Medecin;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MedecinFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Création des médecins
        $medecin1 = new Medecin();
        $medecin1->setMatricule('MED001');
        $medecin1->setSpecialite('Cardiologie');
        $manager->persist($medecin1);
        $this->addReference('medecin1', $medecin1);

        $medecin2 = new Medecin();
        $medecin2->setMatricule('MED002');
        $medecin2->setSpecialite('Pédiatrie');
        $manager->persist($medecin2);
        $this->addReference('medecin2', $medecin2);

        $manager->flush();
    }
} 