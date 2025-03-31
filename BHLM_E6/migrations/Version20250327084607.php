<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250327084607 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE secteur_activite (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE entreprise ADD secteur_activite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE entreprise ADD CONSTRAINT FK_D19FA605233A7FC FOREIGN KEY (secteur_activite_id) REFERENCES secteur_activite (id)');
        $this->addSql('CREATE INDEX IDX_D19FA605233A7FC ON entreprise (secteur_activite_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entreprise DROP FOREIGN KEY FK_D19FA605233A7FC');
        $this->addSql('DROP TABLE secteur_activite');
        $this->addSql('DROP INDEX IDX_D19FA605233A7FC ON entreprise');
        $this->addSql('ALTER TABLE entreprise DROP secteur_activite_id');
    }
}
