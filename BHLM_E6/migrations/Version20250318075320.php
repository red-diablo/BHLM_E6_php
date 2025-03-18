<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250318075320 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tuteur ADD id_entreprise_id INT NOT NULL');
        $this->addSql('ALTER TABLE tuteur ADD CONSTRAINT FK_564122681A867E8F FOREIGN KEY (id_entreprise_id) REFERENCES entreprise (id)');
        $this->addSql('CREATE INDEX IDX_564122681A867E8F ON tuteur (id_entreprise_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tuteur DROP FOREIGN KEY FK_564122681A867E8F');
        $this->addSql('DROP INDEX IDX_564122681A867E8F ON tuteur');
        $this->addSql('ALTER TABLE tuteur DROP id_entreprise_id');
    }
}
