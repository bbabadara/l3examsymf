<?php

namespace App\DataFixtures;

use App\Entity\Consultation;
use App\Entity\Medicament;
use App\Entity\Ordonnance;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class OrdonnanceFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // Création des ordonnances
        $ordonnance1 = new Ordonnance();
        $ordonnance1->setDate(new \DateTime('2024-03-15'));
        $ordonnance1->setConsultation($this->getReference('consultation1', Consultation::class));
        $ordonnance1->setMedicament($this->getReference('medicament1', Medicament::class));
        $manager->persist($ordonnance1);

        $ordonnance2 = new Ordonnance();
        $ordonnance2->setDate(new \DateTime('2024-03-16'));
        $ordonnance2->setConsultation($this->getReference('consultation2', Consultation::class));
        $ordonnance2->setMedicament($this->getReference('medicament2', Medicament::class));
        $manager->persist($ordonnance2);

        $ordonnance3 = new Ordonnance();
        $ordonnance3->setDate(new \DateTime('2024-03-16'));
        $ordonnance3->setConsultation($this->getReference('consultation2', Consultation::class));
        $ordonnance3->setMedicament($this->getReference('medicament3', Medicament::class));
        $manager->persist($ordonnance3);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ConsultationFixtures::class,
            MedicamentFixtures::class,
        ];
    }
} 