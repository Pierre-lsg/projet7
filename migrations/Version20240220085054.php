<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240220085054 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE championnat (id INT AUTO_INCREMENT NOT NULL, reglement_championnat_id INT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, saison VARCHAR(255) NOT NULL, INDEX IDX_AB8C22039EF49E2 (reglement_championnat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE championnat_club (championnat_id INT NOT NULL, club_id INT NOT NULL, INDEX IDX_C9EC06C2627A0DA8 (championnat_id), INDEX IDX_C9EC06C261190A32 (club_id), PRIMARY KEY(championnat_id, club_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE championnat_joueur (championnat_id INT NOT NULL, joueur_id INT NOT NULL, INDEX IDX_D8D56BD4627A0DA8 (championnat_id), INDEX IDX_D8D56BD4A9E2D76C (joueur_id), PRIMARY KEY(championnat_id, joueur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classement_club (id INT AUTO_INCREMENT NOT NULL, championnat_id INT NOT NULL, club_id INT NOT NULL, points INT NOT NULL, INDEX IDX_AFF39657627A0DA8 (championnat_id), INDEX IDX_AFF3965761190A32 (club_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classement_joueur (id INT AUTO_INCREMENT NOT NULL, championnat_id INT NOT NULL, joueur_id INT NOT NULL, points INT NOT NULL, INDEX IDX_24ECE0D0627A0DA8 (championnat_id), INDEX IDX_24ECE0D0A9E2D76C (joueur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE championnat ADD CONSTRAINT FK_AB8C22039EF49E2 FOREIGN KEY (reglement_championnat_id) REFERENCES reglement_championnat (id)');
        $this->addSql('ALTER TABLE championnat_club ADD CONSTRAINT FK_C9EC06C2627A0DA8 FOREIGN KEY (championnat_id) REFERENCES championnat (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE championnat_club ADD CONSTRAINT FK_C9EC06C261190A32 FOREIGN KEY (club_id) REFERENCES club (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE championnat_joueur ADD CONSTRAINT FK_D8D56BD4627A0DA8 FOREIGN KEY (championnat_id) REFERENCES championnat (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE championnat_joueur ADD CONSTRAINT FK_D8D56BD4A9E2D76C FOREIGN KEY (joueur_id) REFERENCES joueur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE classement_club ADD CONSTRAINT FK_AFF39657627A0DA8 FOREIGN KEY (championnat_id) REFERENCES championnat (id)');
        $this->addSql('ALTER TABLE classement_club ADD CONSTRAINT FK_AFF3965761190A32 FOREIGN KEY (club_id) REFERENCES club (id)');
        $this->addSql('ALTER TABLE classement_joueur ADD CONSTRAINT FK_24ECE0D0627A0DA8 FOREIGN KEY (championnat_id) REFERENCES championnat (id)');
        $this->addSql('ALTER TABLE classement_joueur ADD CONSTRAINT FK_24ECE0D0A9E2D76C FOREIGN KEY (joueur_id) REFERENCES joueur (id)');
        $this->addSql('ALTER TABLE competition ADD championnat_id INT NOT NULL');
        $this->addSql('ALTER TABLE competition ADD CONSTRAINT FK_B50A2CB1627A0DA8 FOREIGN KEY (championnat_id) REFERENCES championnat (id)');
        $this->addSql('CREATE INDEX IDX_B50A2CB1627A0DA8 ON competition (championnat_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE competition DROP FOREIGN KEY FK_B50A2CB1627A0DA8');
        $this->addSql('ALTER TABLE championnat DROP FOREIGN KEY FK_AB8C22039EF49E2');
        $this->addSql('ALTER TABLE championnat_club DROP FOREIGN KEY FK_C9EC06C2627A0DA8');
        $this->addSql('ALTER TABLE championnat_club DROP FOREIGN KEY FK_C9EC06C261190A32');
        $this->addSql('ALTER TABLE championnat_joueur DROP FOREIGN KEY FK_D8D56BD4627A0DA8');
        $this->addSql('ALTER TABLE championnat_joueur DROP FOREIGN KEY FK_D8D56BD4A9E2D76C');
        $this->addSql('ALTER TABLE classement_club DROP FOREIGN KEY FK_AFF39657627A0DA8');
        $this->addSql('ALTER TABLE classement_club DROP FOREIGN KEY FK_AFF3965761190A32');
        $this->addSql('ALTER TABLE classement_joueur DROP FOREIGN KEY FK_24ECE0D0627A0DA8');
        $this->addSql('ALTER TABLE classement_joueur DROP FOREIGN KEY FK_24ECE0D0A9E2D76C');
        $this->addSql('DROP TABLE championnat');
        $this->addSql('DROP TABLE championnat_club');
        $this->addSql('DROP TABLE championnat_joueur');
        $this->addSql('DROP TABLE classement_club');
        $this->addSql('DROP TABLE classement_joueur');
        $this->addSql('DROP INDEX IDX_B50A2CB1627A0DA8 ON competition');
        $this->addSql('ALTER TABLE competition DROP championnat_id');
    }
}
