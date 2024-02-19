<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240219170435 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE carte_de_scores (id INT AUTO_INCREMENT NOT NULL, flight_id INT NOT NULL, competition_id INT NOT NULL, est_signee TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_FBB1A70D91F478C5 (flight_id), INDEX IDX_FBB1A70D7B39D312 (competition_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cible (id INT AUTO_INCREMENT NOT NULL, depart_id INT NOT NULL, arrivee_id INT NOT NULL, INDEX IDX_E15DEC3BAE02FE4B (depart_id), INDEX IDX_E15DEC3BEAF07E42 (arrivee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cible_de_parcours (id INT AUTO_INCREMENT NOT NULL, cible_id INT NOT NULL, formule_de_jeu_id INT NOT NULL, ordre INT NOT NULL, INDEX IDX_9AB29D8BA96E5E09 (cible_id), INDEX IDX_9AB29D8BAD32194C (formule_de_jeu_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE club (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competition (id INT AUTO_INCREMENT NOT NULL, reglement_id INT NOT NULL, parcours_id INT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_B50A2CB16A477111 (reglement_id), INDEX IDX_B50A2CB16E38C0DB (parcours_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipe (id INT AUTO_INCREMENT NOT NULL, club_id INT NOT NULL, flight_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_2449BA1561190A32 (club_id), INDEX IDX_2449BA1591F478C5 (flight_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE flight (id INT AUTO_INCREMENT NOT NULL, competition_id INT NOT NULL, nom VARCHAR(255) NOT NULL, ordre INT NOT NULL, INDEX IDX_C257E60E7B39D312 (competition_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formule_de_jeu (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE joueur (id INT AUTO_INCREMENT NOT NULL, club_id INT DEFAULT NULL, equipe_id INT DEFAULT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) DEFAULT NULL, pseudo VARCHAR(255) DEFAULT NULL, INDEX IDX_FD71A9C561190A32 (club_id), INDEX IDX_FD71A9C56D861B89 (equipe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mode_calcul_championnat (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mode_competition (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parcours (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parcours_cible_de_parcours (parcours_id INT NOT NULL, cible_de_parcours_id INT NOT NULL, INDEX IDX_3B9456326E38C0DB (parcours_id), INDEX IDX_3B9456326AA1173C (cible_de_parcours_id), PRIMARY KEY(parcours_id, cible_de_parcours_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE points_classement_equipe (id INT AUTO_INCREMENT NOT NULL, reglement_championnat_id INT NOT NULL, classement INT NOT NULL, points INT NOT NULL, INDEX IDX_250EF5FC39EF49E2 (reglement_championnat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE regle_croix (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, valeur_croix INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reglement_championnat (id INT AUTO_INCREMENT NOT NULL, repartition_points_id INT NOT NULL, mode_calcul_championnat_id INT NOT NULL, nombre_competition_requis INT NOT NULL, INDEX IDX_8721CB2225F98EFB (repartition_points_id), INDEX IDX_8721CB22B4C1EA5E (mode_calcul_championnat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reglement_competition (id INT AUTO_INCREMENT NOT NULL, accueil_id INT DEFAULT NULL, mode_competition_id INT NOT NULL, regle_croix_id INT NOT NULL, date_competition DATE NOT NULL, date_publication_resultat DATE NOT NULL, nombre_joueur_par_equipe INT NOT NULL, nombre_equipe_par_flight INT NOT NULL, INDEX IDX_389325B37C9E3DC1 (accueil_id), INDEX IDX_389325B3A47D027E (mode_competition_id), INDEX IDX_389325B32ADFFD31 (regle_croix_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE repartition_points (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE repere (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, latitude VARCHAR(20) DEFAULT NULL, longitude VARCHAR(20) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE score (id INT AUTO_INCREMENT NOT NULL, cible_de_parcours_id INT NOT NULL, joueur_id INT NOT NULL, equipe_id INT NOT NULL, carte_de_scores_id INT NOT NULL, score INT NOT NULL, INDEX IDX_329937516AA1173C (cible_de_parcours_id), INDEX IDX_32993751A9E2D76C (joueur_id), INDEX IDX_329937516D861B89 (equipe_id), INDEX IDX_3299375133B9FFAC (carte_de_scores_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE carte_de_scores ADD CONSTRAINT FK_FBB1A70D91F478C5 FOREIGN KEY (flight_id) REFERENCES flight (id)');
        $this->addSql('ALTER TABLE carte_de_scores ADD CONSTRAINT FK_FBB1A70D7B39D312 FOREIGN KEY (competition_id) REFERENCES competition (id)');
        $this->addSql('ALTER TABLE cible ADD CONSTRAINT FK_E15DEC3BAE02FE4B FOREIGN KEY (depart_id) REFERENCES repere (id)');
        $this->addSql('ALTER TABLE cible ADD CONSTRAINT FK_E15DEC3BEAF07E42 FOREIGN KEY (arrivee_id) REFERENCES repere (id)');
        $this->addSql('ALTER TABLE cible_de_parcours ADD CONSTRAINT FK_9AB29D8BA96E5E09 FOREIGN KEY (cible_id) REFERENCES cible (id)');
        $this->addSql('ALTER TABLE cible_de_parcours ADD CONSTRAINT FK_9AB29D8BAD32194C FOREIGN KEY (formule_de_jeu_id) REFERENCES formule_de_jeu (id)');
        $this->addSql('ALTER TABLE competition ADD CONSTRAINT FK_B50A2CB16A477111 FOREIGN KEY (reglement_id) REFERENCES reglement_competition (id)');
        $this->addSql('ALTER TABLE competition ADD CONSTRAINT FK_B50A2CB16E38C0DB FOREIGN KEY (parcours_id) REFERENCES parcours (id)');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT FK_2449BA1561190A32 FOREIGN KEY (club_id) REFERENCES club (id)');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT FK_2449BA1591F478C5 FOREIGN KEY (flight_id) REFERENCES flight (id)');
        $this->addSql('ALTER TABLE flight ADD CONSTRAINT FK_C257E60E7B39D312 FOREIGN KEY (competition_id) REFERENCES competition (id)');
        $this->addSql('ALTER TABLE joueur ADD CONSTRAINT FK_FD71A9C561190A32 FOREIGN KEY (club_id) REFERENCES club (id)');
        $this->addSql('ALTER TABLE joueur ADD CONSTRAINT FK_FD71A9C56D861B89 FOREIGN KEY (equipe_id) REFERENCES equipe (id)');
        $this->addSql('ALTER TABLE parcours_cible_de_parcours ADD CONSTRAINT FK_3B9456326E38C0DB FOREIGN KEY (parcours_id) REFERENCES parcours (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE parcours_cible_de_parcours ADD CONSTRAINT FK_3B9456326AA1173C FOREIGN KEY (cible_de_parcours_id) REFERENCES cible_de_parcours (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE points_classement_equipe ADD CONSTRAINT FK_250EF5FC39EF49E2 FOREIGN KEY (reglement_championnat_id) REFERENCES reglement_championnat (id)');
        $this->addSql('ALTER TABLE reglement_championnat ADD CONSTRAINT FK_8721CB2225F98EFB FOREIGN KEY (repartition_points_id) REFERENCES repartition_points (id)');
        $this->addSql('ALTER TABLE reglement_championnat ADD CONSTRAINT FK_8721CB22B4C1EA5E FOREIGN KEY (mode_calcul_championnat_id) REFERENCES mode_calcul_championnat (id)');
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
        $this->addSql('ALTER TABLE carte_de_scores DROP FOREIGN KEY FK_FBB1A70D7B39D312');
        $this->addSql('ALTER TABLE cible DROP FOREIGN KEY FK_E15DEC3BAE02FE4B');
        $this->addSql('ALTER TABLE cible DROP FOREIGN KEY FK_E15DEC3BEAF07E42');
        $this->addSql('ALTER TABLE cible_de_parcours DROP FOREIGN KEY FK_9AB29D8BA96E5E09');
        $this->addSql('ALTER TABLE cible_de_parcours DROP FOREIGN KEY FK_9AB29D8BAD32194C');
        $this->addSql('ALTER TABLE competition DROP FOREIGN KEY FK_B50A2CB16A477111');
        $this->addSql('ALTER TABLE competition DROP FOREIGN KEY FK_B50A2CB16E38C0DB');
        $this->addSql('ALTER TABLE equipe DROP FOREIGN KEY FK_2449BA1561190A32');
        $this->addSql('ALTER TABLE equipe DROP FOREIGN KEY FK_2449BA1591F478C5');
        $this->addSql('ALTER TABLE flight DROP FOREIGN KEY FK_C257E60E7B39D312');
        $this->addSql('ALTER TABLE joueur DROP FOREIGN KEY FK_FD71A9C561190A32');
        $this->addSql('ALTER TABLE joueur DROP FOREIGN KEY FK_FD71A9C56D861B89');
        $this->addSql('ALTER TABLE parcours_cible_de_parcours DROP FOREIGN KEY FK_3B9456326E38C0DB');
        $this->addSql('ALTER TABLE parcours_cible_de_parcours DROP FOREIGN KEY FK_3B9456326AA1173C');
        $this->addSql('ALTER TABLE points_classement_equipe DROP FOREIGN KEY FK_250EF5FC39EF49E2');
        $this->addSql('ALTER TABLE reglement_championnat DROP FOREIGN KEY FK_8721CB2225F98EFB');
        $this->addSql('ALTER TABLE reglement_championnat DROP FOREIGN KEY FK_8721CB22B4C1EA5E');
        $this->addSql('ALTER TABLE reglement_competition DROP FOREIGN KEY FK_389325B37C9E3DC1');
        $this->addSql('ALTER TABLE reglement_competition DROP FOREIGN KEY FK_389325B3A47D027E');
        $this->addSql('ALTER TABLE reglement_competition DROP FOREIGN KEY FK_389325B32ADFFD31');
        $this->addSql('ALTER TABLE score DROP FOREIGN KEY FK_329937516AA1173C');
        $this->addSql('ALTER TABLE score DROP FOREIGN KEY FK_32993751A9E2D76C');
        $this->addSql('ALTER TABLE score DROP FOREIGN KEY FK_329937516D861B89');
        $this->addSql('ALTER TABLE score DROP FOREIGN KEY FK_3299375133B9FFAC');
        $this->addSql('DROP TABLE carte_de_scores');
        $this->addSql('DROP TABLE cible');
        $this->addSql('DROP TABLE cible_de_parcours');
        $this->addSql('DROP TABLE club');
        $this->addSql('DROP TABLE competition');
        $this->addSql('DROP TABLE equipe');
        $this->addSql('DROP TABLE flight');
        $this->addSql('DROP TABLE formule_de_jeu');
        $this->addSql('DROP TABLE joueur');
        $this->addSql('DROP TABLE mode_calcul_championnat');
        $this->addSql('DROP TABLE mode_competition');
        $this->addSql('DROP TABLE parcours');
        $this->addSql('DROP TABLE parcours_cible_de_parcours');
        $this->addSql('DROP TABLE points_classement_equipe');
        $this->addSql('DROP TABLE regle_croix');
        $this->addSql('DROP TABLE reglement_championnat');
        $this->addSql('DROP TABLE reglement_competition');
        $this->addSql('DROP TABLE repartition_points');
        $this->addSql('DROP TABLE repere');
        $this->addSql('DROP TABLE score');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
