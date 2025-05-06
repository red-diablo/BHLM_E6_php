<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250428093312 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE profil_entreprise (profil_id INT NOT NULL, entreprise_id INT NOT NULL, INDEX IDX_36DFA19E275ED078 (profil_id), INDEX IDX_36DFA19EA4AEAFEA (entreprise_id), PRIMARY KEY(profil_id, entreprise_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE profil_entreprise ADD CONSTRAINT FK_36DFA19E275ED078 FOREIGN KEY (profil_id) REFERENCES profil (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE profil_entreprise ADD CONSTRAINT FK_36DFA19EA4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE profil_entreprise DROP FOREIGN KEY FK_36DFA19E275ED078');
        $this->addSql('ALTER TABLE profil_entreprise DROP FOREIGN KEY FK_36DFA19EA4AEAFEA');
        $this->addSql('DROP TABLE profil_entreprise');
    }
}
