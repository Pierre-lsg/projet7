<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240218153055 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cible (id INT AUTO_INCREMENT NOT NULL, depart_id INT NOT NULL, arrivee_id INT NOT NULL, INDEX IDX_E15DEC3BAE02FE4B (depart_id), INDEX IDX_E15DEC3BEAF07E42 (arrivee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cible_de_parcours (id INT AUTO_INCREMENT NOT NULL, cible_id INT NOT NULL, formule_de_jeu_id INT NOT NULL, ordre INT NOT NULL, INDEX IDX_9AB29D8BA96E5E09 (cible_id), INDEX IDX_9AB29D8BAD32194C (formule_de_jeu_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parcours (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parcours_cible_de_parcours (parcours_id INT NOT NULL, cible_de_parcours_id INT NOT NULL, INDEX IDX_3B9456326E38C0DB (parcours_id), INDEX IDX_3B9456326AA1173C (cible_de_parcours_id), PRIMARY KEY(parcours_id, cible_de_parcours_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cible ADD CONSTRAINT FK_E15DEC3BAE02FE4B FOREIGN KEY (depart_id) REFERENCES repere (id)');
        $this->addSql('ALTER TABLE cible ADD CONSTRAINT FK_E15DEC3BEAF07E42 FOREIGN KEY (arrivee_id) REFERENCES repere (id)');
        $this->addSql('ALTER TABLE cible_de_parcours ADD CONSTRAINT FK_9AB29D8BA96E5E09 FOREIGN KEY (cible_id) REFERENCES cible (id)');
        $this->addSql('ALTER TABLE cible_de_parcours ADD CONSTRAINT FK_9AB29D8BAD32194C FOREIGN KEY (formule_de_jeu_id) REFERENCES formule_de_jeu (id)');
        $this->addSql('ALTER TABLE parcours_cible_de_parcours ADD CONSTRAINT FK_3B9456326E38C0DB FOREIGN KEY (parcours_id) REFERENCES parcours (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE parcours_cible_de_parcours ADD CONSTRAINT FK_3B9456326AA1173C FOREIGN KEY (cible_de_parcours_id) REFERENCES cible_de_parcours (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cible DROP FOREIGN KEY FK_E15DEC3BAE02FE4B');
        $this->addSql('ALTER TABLE cible DROP FOREIGN KEY FK_E15DEC3BEAF07E42');
        $this->addSql('ALTER TABLE cible_de_parcours DROP FOREIGN KEY FK_9AB29D8BA96E5E09');
        $this->addSql('ALTER TABLE cible_de_parcours DROP FOREIGN KEY FK_9AB29D8BAD32194C');
        $this->addSql('ALTER TABLE parcours_cible_de_parcours DROP FOREIGN KEY FK_3B9456326E38C0DB');
        $this->addSql('ALTER TABLE parcours_cible_de_parcours DROP FOREIGN KEY FK_3B9456326AA1173C');
        $this->addSql('DROP TABLE cible');
        $this->addSql('DROP TABLE cible_de_parcours');
        $this->addSql('DROP TABLE parcours');
        $this->addSql('DROP TABLE parcours_cible_de_parcours');
    }
}
