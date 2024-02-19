<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240219094453 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE carte_de_scores (id INT AUTO_INCREMENT NOT NULL, flight_id INT NOT NULL, est_signee TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_FBB1A70D91F478C5 (flight_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE club (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipe (id INT AUTO_INCREMENT NOT NULL, club_id INT NOT NULL, flight_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_2449BA1561190A32 (club_id), INDEX IDX_2449BA1591F478C5 (flight_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE flight (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, ordre INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE joueur (id INT AUTO_INCREMENT NOT NULL, club_id INT DEFAULT NULL, equipe_id INT DEFAULT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) DEFAULT NULL, pseudo VARCHAR(255) DEFAULT NULL, INDEX IDX_FD71A9C561190A32 (club_id), INDEX IDX_FD71A9C56D861B89 (equipe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mode_competition (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE regle_croix (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, valeur_croix INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reglement_competition (id INT AUTO_INCREMENT NOT NULL, accueil_id INT DEFAULT NULL, mode_competition_id INT NOT NULL, regle_croix_id INT NOT NULL, date_competition DATE NOT NULL, date_publication_resultat DATE NOT NULL, nombre_joueur_par_equipe INT NOT NULL, nombre_equipe_par_flight INT NOT NULL, INDEX IDX_389325B37C9E3DC1 (accueil_id), INDEX IDX_389325B3A47D027E (mode_competition_id), INDEX IDX_389325B32ADFFD31 (regle_croix_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE score (id INT AUTO_INCREMENT NOT NULL, cible_de_parcours_id INT NOT NULL, joueur_id INT NOT NULL, equipe_id INT NOT NULL, carte_de_scores_id INT NOT NULL, score INT NOT NULL, INDEX IDX_329937516AA1173C (cible_de_parcours_id), INDEX IDX_32993751A9E2D76C (joueur_id), INDEX IDX_329937516D861B89 (equipe_id), INDEX IDX_3299375133B9FFAC (carte_de_scores_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE carte_de_scores ADD CONSTRAINT FK_FBB1A70D91F478C5 FOREIGN KEY (flight_id) REFERENCES flight (id)');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT FK_2449BA1561190A32 FOREIGN KEY (club_id) REFERENCES club (id)');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT FK_2449BA1591F478C5 FOREIGN KEY (flight_id) REFERENCES flight (id)');
        $this->addSql('ALTER TABLE joueur ADD CONSTRAINT FK_FD71A9C561190A32 FOREIGN KEY (club_id) REFERENCES club (id)');
        $this->addSql('ALTER TABLE joueur ADD CONSTRAINT FK_FD71A9C56D861B89 FOREIGN KEY (equipe_id) REFERENCES equipe (id)');
        $this->addSql('ALTER TABLE reglement_competition ADD CONSTRAINT FK_389325B37C9E3DC1 FOREIGN KEY (accueil_id) REFERENCES repere (id)');
        $this->addSql('ALTER TABLE reglement_competition ADD CONSTRAINT FK_389325B3A47D027E FOREIGN KEY (mode_competition_id) REFERENCES mode_competition (id)');
        $this->addSql('ALTER TABLE reglement_competition ADD CONSTRAINT FK_389325B32ADFFD31 FOREIGN KEY (regle_croix_id) REFERENCES regle_croix (id)');
        $this->addSql('ALTER TABLE score ADD CONSTRAINT FK_329937516AA1173C FOREIGN KEY (cible_de_parcours_id) REFERENCES cible_de_parcours (id)');
        $this->addSql('ALTER TABLE score ADD CONSTRAINT FK_32993751A9E2D76C FOREIGN KEY (joueur_id) REFERENCES joueur (id)');
        $this->addSql('ALTER TABLE score ADD CONSTRAINT FK_329937516D861B89 FOREIGN KEY (equipe_id) REFERENCES equipe (id)');
        $this->addSql('ALTER TABLE score ADD CONSTRAINT FK_3299375133B9FFAC FOREIGN KEY (carte_de_scores_id) REFERENCES carte_de_scores (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE carte_de_scores DROP FOREIGN KEY FK_FBB1A70D91F478C5');
        $this->addSql('ALTER TABLE equipe DROP FOREIGN KEY FK_2449BA1561190A32');
        $this->addSql('ALTER TABLE equipe DROP FOREIGN KEY FK_2449BA1591F478C5');
        $this->addSql('ALTER TABLE joueur DROP FOREIGN KEY FK_FD71A9C561190A32');
        $this->addSql('ALTER TABLE joueur DROP FOREIGN KEY FK_FD71A9C56D861B89');
        $this->addSql('ALTER TABLE reglement_competition DROP FOREIGN KEY FK_389325B37C9E3DC1');
        $this->addSql('ALTER TABLE reglement_competition DROP FOREIGN KEY FK_389325B3A47D027E');
        $this->addSql('ALTER TABLE reglement_competition DROP FOREIGN KEY FK_389325B32ADFFD31');
        $this->addSql('ALTER TABLE score DROP FOREIGN KEY FK_329937516AA1173C');
        $this->addSql('ALTER TABLE score DROP FOREIGN KEY FK_32993751A9E2D76C');
        $this->addSql('ALTER TABLE score DROP FOREIGN KEY FK_329937516D861B89');
        $this->addSql('ALTER TABLE score DROP FOREIGN KEY FK_3299375133B9FFAC');
        $this->addSql('DROP TABLE carte_de_scores');
        $this->addSql('DROP TABLE club');
        $this->addSql('DROP TABLE equipe');
        $this->addSql('DROP TABLE flight');
        $this->addSql('DROP TABLE joueur');
        $this->addSql('DROP TABLE mode_competition');
        $this->addSql('DROP TABLE regle_croix');
        $this->addSql('DROP TABLE reglement_competition');
        $this->addSql('DROP TABLE score');
    }
}
