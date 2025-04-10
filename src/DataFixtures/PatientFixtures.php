<?php

namespace App\DataFixtures;

use App\Entity\Patient;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PatientFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // Création des fiches patients
        $fichePatient1 = new Patient();
        $fichePatient1->setCode('PAT001');
        $fichePatient1->setAdresse('123 rue de la Paix, Paris');
        $fichePatient1->setTelephone('0123456789');
        $fichePatient1->setAntecedent('Allergie aux arachides');
        $fichePatient1->setPatient($this->getReference('patient1-user', User::class));
        $manager->persist($fichePatient1);

        $fichePatient2 = new Patient();
        $fichePatient2->setCode('PAT002');
        $fichePatient2->setAdresse('456 avenue des Champs-Élysées, Paris');
        $fichePatient2->setTelephone('0987654321');
        $fichePatient2->setAntecedent('Asthme');
        $fichePatient2->setPatient($this->getReference('patient2-user', User::class));
        $manager->persist($fichePatient2);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            UserFixtures::class,
        ];
    }
} 