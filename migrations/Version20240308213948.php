<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240308213948 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cinema (id INT AUTO_INCREMENT NOT NULL, localisation_id INT NOT NULL, ville_id INT NOT NULL, nom VARCHAR(255) NOT NULL, nb_salles INT NOT NULL, UNIQUE INDEX UNIQ_D48304B4C68BE09C (localisation_id), INDEX IDX_D48304B4A73F0036 (ville_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE film (id INT AUTO_INCREMENT NOT NULL, categorie_id INT NOT NULL, titre VARCHAR(200) NOT NULL, duree DOUBLE PRECISION NOT NULL, realisteur VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, photo LONGBLOB DEFAULT NULL, date_sortie DATE NOT NULL, INDEX IDX_8244BE22BCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE localisation (id INT AUTO_INCREMENT NOT NULL, longitude DOUBLE PRECISION NOT NULL, latitude DOUBLE PRECISION NOT NULL, altitude DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personne (id INT AUTO_INCREMENT NOT NULL, cinema_id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, adresse VARCHAR(255) DEFAULT NULL, tel VARCHAR(20) DEFAULT NULL, email VARCHAR(100) DEFAULT NULL, date_naissance DATE DEFAULT NULL, discr VARCHAR(255) NOT NULL, no_client INT DEFAULT NULL, abonne TINYINT(1) DEFAULT NULL, no_ref INT DEFAULT NULL, mission VARCHAR(255) DEFAULT NULL, INDEX IDX_FCEC9EFB4CB84B6 (cinema_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE place (id INT AUTO_INCREMENT NOT NULL, salle_id INT NOT NULL, ticket_id INT DEFAULT NULL, numero INT NOT NULL, INDEX IDX_741D53CDDC304035 (salle_id), UNIQUE INDEX UNIQ_741D53CD700047D2 (ticket_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projection_film (id INT AUTO_INCREMENT NOT NULL, salle_id INT DEFAULT NULL, film_id INT DEFAULT NULL, seance_id INT NOT NULL, date_projection DATE NOT NULL, prix DOUBLE PRECISION NOT NULL, INDEX IDX_1E93E2E3DC304035 (salle_id), INDEX IDX_1E93E2E3567F5183 (film_id), UNIQUE INDEX UNIQ_1E93E2E3E3797A94 (seance_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salle (id INT AUTO_INCREMENT NOT NULL, cinema_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, nb_places INT NOT NULL, INDEX IDX_4E977E5CB4CB84B6 (cinema_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salle_employee (salle_id INT NOT NULL, employee_id INT NOT NULL, INDEX IDX_41DE22AFDC304035 (salle_id), INDEX IDX_41DE22AF8C03F15C (employee_id), PRIMARY KEY(salle_id, employee_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE seance (id INT AUTO_INCREMENT NOT NULL, heure_debut TIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ticket (id INT AUTO_INCREMENT NOT NULL, projection_film_id INT NOT NULL, client_id INT NOT NULL, prix DOUBLE PRECISION NOT NULL, code_payment INT NOT NULL, INDEX IDX_97A0ADA3C8ABF847 (projection_film_id), INDEX IDX_97A0ADA319EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ville (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(200) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cinema ADD CONSTRAINT FK_D48304B4C68BE09C FOREIGN KEY (localisation_id) REFERENCES localisation (id)');
        $this->addSql('ALTER TABLE cinema ADD CONSTRAINT FK_D48304B4A73F0036 FOREIGN KEY (ville_id) REFERENCES ville (id)');
        $this->addSql('ALTER TABLE film ADD CONSTRAINT FK_8244BE22BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE personne ADD CONSTRAINT FK_FCEC9EFB4CB84B6 FOREIGN KEY (cinema_id) REFERENCES cinema (id)');
        $this->addSql('ALTER TABLE place ADD CONSTRAINT FK_741D53CDDC304035 FOREIGN KEY (salle_id) REFERENCES salle (id)');
        $this->addSql('ALTER TABLE place ADD CONSTRAINT FK_741D53CD700047D2 FOREIGN KEY (ticket_id) REFERENCES ticket (id)');
        $this->addSql('ALTER TABLE projection_film ADD CONSTRAINT FK_1E93E2E3DC304035 FOREIGN KEY (salle_id) REFERENCES salle (id)');
        $this->addSql('ALTER TABLE projection_film ADD CONSTRAINT FK_1E93E2E3567F5183 FOREIGN KEY (film_id) REFERENCES film (id)');
        $this->addSql('ALTER TABLE projection_film ADD CONSTRAINT FK_1E93E2E3E3797A94 FOREIGN KEY (seance_id) REFERENCES seance (id)');
        $this->addSql('ALTER TABLE salle ADD CONSTRAINT FK_4E977E5CB4CB84B6 FOREIGN KEY (cinema_id) REFERENCES cinema (id)');
        $this->addSql('ALTER TABLE salle_employee ADD CONSTRAINT FK_41DE22AFDC304035 FOREIGN KEY (salle_id) REFERENCES salle (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE salle_employee ADD CONSTRAINT FK_41DE22AF8C03F15C FOREIGN KEY (employee_id) REFERENCES personne (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA3C8ABF847 FOREIGN KEY (projection_film_id) REFERENCES projection_film (id)');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA319EB6921 FOREIGN KEY (client_id) REFERENCES personne (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cinema DROP FOREIGN KEY FK_D48304B4C68BE09C');
        $this->addSql('ALTER TABLE cinema DROP FOREIGN KEY FK_D48304B4A73F0036');
        $this->addSql('ALTER TABLE film DROP FOREIGN KEY FK_8244BE22BCF5E72D');
        $this->addSql('ALTER TABLE personne DROP FOREIGN KEY FK_FCEC9EFB4CB84B6');
        $this->addSql('ALTER TABLE place DROP FOREIGN KEY FK_741D53CDDC304035');
        $this->addSql('ALTER TABLE place DROP FOREIGN KEY FK_741D53CD700047D2');
        $this->addSql('ALTER TABLE projection_film DROP FOREIGN KEY FK_1E93E2E3DC304035');
        $this->addSql('ALTER TABLE projection_film DROP FOREIGN KEY FK_1E93E2E3567F5183');
        $this->addSql('ALTER TABLE projection_film DROP FOREIGN KEY FK_1E93E2E3E3797A94');
        $this->addSql('ALTER TABLE salle DROP FOREIGN KEY FK_4E977E5CB4CB84B6');
        $this->addSql('ALTER TABLE salle_employee DROP FOREIGN KEY FK_41DE22AFDC304035');
        $this->addSql('ALTER TABLE salle_employee DROP FOREIGN KEY FK_41DE22AF8C03F15C');
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA3C8ABF847');
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA319EB6921');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE cinema');
        $this->addSql('DROP TABLE film');
        $this->addSql('DROP TABLE localisation');
        $this->addSql('DROP TABLE personne');
        $this->addSql('DROP TABLE place');
        $this->addSql('DROP TABLE projection_film');
        $this->addSql('DROP TABLE salle');
        $this->addSql('DROP TABLE salle_employee');
        $this->addSql('DROP TABLE seance');
        $this->addSql('DROP TABLE ticket');
        $this->addSql('DROP TABLE ville');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
