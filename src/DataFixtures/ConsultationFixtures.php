<?php

namespace App\DataFixtures;

use App\Entity\Consultation;
use App\Entity\Medecin;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ConsultationFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // Création des consultations
        $consultation1 = new Consultation();
        $consultation1->setDate(new \DateTime('2024-03-15 09:00:00'));
        $consultation1->setMedecin($this->getReference('medecin1', Medecin::class));
        $manager->persist($consultation1);
        $this->addReference('consultation1', $consultation1);

        $consultation2 = new Consultation();
        $consultation2->setDate(new \DateTime('2024-03-16 14:30:00'));
        $consultation2->setMedecin($this->getReference('medecin2', Medecin::class));
        $manager->persist($consultation2);
        $this->addReference('consultation2', $consultation2);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            MedecinFixtures::class,
        ];
    }
} 