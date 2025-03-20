<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250320080235 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE etudiant (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, prenom VARCHAR(100) NOT NULL, annee INT NOT NULL, bts VARCHAR(10) NOT NULL, specialite VARCHAR(4) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etudiant_entreprise (etudiant_id INT NOT NULL, entreprise_id INT NOT NULL, INDEX IDX_C3B6951ADDEAB1A3 (etudiant_id), INDEX IDX_C3B6951AA4AEAFEA (entreprise_id), PRIMARY KEY(etudiant_id, entreprise_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE etudiant_entreprise ADD CONSTRAINT FK_C3B6951ADDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE etudiant_entreprise ADD CONSTRAINT FK_C3B6951AA4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etudiant_entreprise DROP FOREIGN KEY FK_C3B6951ADDEAB1A3');
        $this->addSql('ALTER TABLE etudiant_entreprise DROP FOREIGN KEY FK_C3B6951AA4AEAFEA');
        $this->addSql('DROP TABLE etudiant');
        $this->addSql('DROP TABLE etudiant_entreprise');
    }
}
