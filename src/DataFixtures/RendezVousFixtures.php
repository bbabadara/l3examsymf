<?php

namespace App\DataFixtures;

use App\Entity\Patient;
use App\Entity\RendezVous;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class RendezVousFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // Création des rendez-vous
        $rdv1 = new RendezVous();
        $rdv1->setDate(new \DateTime('2024-03-20 10:00:00'));
        $rdv1->setSpecialite('Cardiologie');
        $rdv1->setPatient($this->getReference('patient1', Patient::class));
        $manager->persist($rdv1);

        $rdv2 = new RendezVous();
        $rdv2->setDate(new \DateTime('2024-03-21 14:30:00'));
        $rdv2->setSpecialite('Pédiatrie');
        $rdv2->setPatient($this->getReference('patient2', Patient::class));
        $manager->persist($rdv2);

        $rdv3 = new RendezVous();
        $rdv3->setDate(new \DateTime('2024-03-22 09:15:00'));
        $rdv3->setSpecialite('Cardiologie');
        $rdv3->setPatient($this->getReference('patient1', Patient::class));
        $manager->persist($rdv3);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            PatientFixtures::class,
        ];
    }
} 