<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250410194837 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE consultation (id INT AUTO_INCREMENT NOT NULL, medecin_id INT NOT NULL, date DATETIME NOT NULL, INDEX IDX_964685A64F31A84 (medecin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE demande_rv (id INT AUTO_INCREMENT NOT NULL, patient_id INT NOT NULL, date DATETIME NOT NULL, etat VARCHAR(255) NOT NULL, INDEX IDX_DA66E4CA6B899279 (patient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE medecin (id INT AUTO_INCREMENT NOT NULL, matricule VARCHAR(255) NOT NULL, specialite VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE medicament (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE ordonnance (id INT AUTO_INCREMENT NOT NULL, consultation_id INT NOT NULL, medicament_id INT NOT NULL, date DATETIME NOT NULL, INDEX IDX_924B326C62FF6CDF (consultation_id), INDEX IDX_924B326CAB0D61F7 (medicament_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE patient (id INT AUTO_INCREMENT NOT NULL, patient_id INT NOT NULL, code VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, telephone VARCHAR(20) NOT NULL, antecedent LONGTEXT DEFAULT NULL, INDEX IDX_1ADAD7EB6B899279 (patient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE rendez_vous (id INT AUTO_INCREMENT NOT NULL, patient_id INT NOT NULL, date DATETIME NOT NULL, specialite VARCHAR(255) NOT NULL, INDEX IDX_65E8AA0A6B899279 (patient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', available_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', delivered_at DATETIME DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE consultation ADD CONSTRAINT FK_964685A64F31A84 FOREIGN KEY (medecin_id) REFERENCES medecin (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE demande_rv ADD CONSTRAINT FK_DA66E4CA6B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ordonnance ADD CONSTRAINT FK_924B326C62FF6CDF FOREIGN KEY (consultation_id) REFERENCES consultation (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ordonnance ADD CONSTRAINT FK_924B326CAB0D61F7 FOREIGN KEY (medicament_id) REFERENCES medicament (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EB6B899279 FOREIGN KEY (patient_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE rendez_vous ADD CONSTRAINT FK_65E8AA0A6B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE consultation DROP FOREIGN KEY FK_964685A64F31A84
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE demande_rv DROP FOREIGN KEY FK_DA66E4CA6B899279
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ordonnance DROP FOREIGN KEY FK_924B326C62FF6CDF
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ordonnance DROP FOREIGN KEY FK_924B326CAB0D61F7
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE patient DROP FOREIGN KEY FK_1ADAD7EB6B899279
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE rendez_vous DROP FOREIGN KEY FK_65E8AA0A6B899279
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE consultation
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE demande_rv
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE medecin
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE medicament
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE ordonnance
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE patient
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE rendez_vous
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE user
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE messenger_messages
        SQL);
    }
}
