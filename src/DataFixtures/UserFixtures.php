<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Patient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        // Création des utilisateurs avec différents rôles
        $admin = new User();
        $admin->setEmail('admin@example.com');
        $admin->setNom('Admin');
        $admin->setPrenom('Super');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setPassword($this->passwordHasher->hashPassword($admin, 'admin123'));
        $manager->persist($admin);
        $this->addReference('admin-user', $admin);

        $medecin1 = new User();
        $medecin1->setEmail('medecin1@example.com');
        $medecin1->setNom('Dupont');
        $medecin1->setPrenom('Jean');
        $medecin1->setRoles(['ROLE_MEDECIN']);
        $medecin1->setPassword($this->passwordHasher->hashPassword($medecin1, 'medecin123'));
        $manager->persist($medecin1);
        $this->addReference('medecin1-user', $medecin1);

        $medecin2 = new User();
        $medecin2->setEmail('medecin2@example.com');
        $medecin2->setNom('Martin');
        $medecin2->setPrenom('Marie');
        $medecin2->setRoles(['ROLE_MEDECIN']);
        $medecin2->setPassword($this->passwordHasher->hashPassword($medecin2, 'medecin123'));
        $manager->persist($medecin2);
        $this->addReference('medecin2-user', $medecin2);

        $secretaire = new User();
        $secretaire->setEmail('secretaire@example.com');
        $secretaire->setNom('Dubois');
        $secretaire->setPrenom('Sophie');
        $secretaire->setRoles(['ROLE_SECRETAIRE']);
        $secretaire->setPassword($this->passwordHasher->hashPassword($secretaire, 'secretaire123'));
        $manager->persist($secretaire);
        $this->addReference('secretaire-user', $secretaire);

        // Création des patients
        $patient1 = new User();
        $patient1->setEmail('patient1@example.com');
        $patient1->setNom('Petit');
        $patient1->setPrenom('Pierre');
        $patient1->setRoles(['ROLE_PATIENT']);
        $patient1->setPassword($this->passwordHasher->hashPassword($patient1, 'patient123'));
        $manager->persist($patient1);
        $this->addReference('patient1-user', $patient1);

        $patient2 = new User();
        $patient2->setEmail('patient2@example.com');
        $patient2->setNom('Robert');
        $patient2->setPrenom('Claire');
        $patient2->setRoles(['ROLE_PATIENT']);
        $patient2->setPassword($this->passwordHasher->hashPassword($patient2, 'patient123'));
        $manager->persist($patient2);
        $this->addReference('patient2-user', $patient2);

        $manager->flush();
    }
} 