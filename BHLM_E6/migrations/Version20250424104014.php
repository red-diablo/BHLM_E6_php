<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250424104014 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE session_exam (id INT AUTO_INCREMENT NOT NULL, specialite VARCHAR(200) DEFAULT NULL, mois VARCHAR(30) DEFAULT NULL, annee INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session_exam_employe (session_exam_id INT NOT NULL, employe_id INT NOT NULL, INDEX IDX_3B3F37504555DCCB (session_exam_id), INDEX IDX_3B3F37501B65292 (employe_id), PRIMARY KEY(session_exam_id, employe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE session_exam_employe ADD CONSTRAINT FK_3B3F37504555DCCB FOREIGN KEY (session_exam_id) REFERENCES session_exam (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE session_exam_employe ADD CONSTRAINT FK_3B3F37501B65292 FOREIGN KEY (employe_id) REFERENCES employe (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE session_exam_employe DROP FOREIGN KEY FK_3B3F37504555DCCB');
        $this->addSql('ALTER TABLE session_exam_employe DROP FOREIGN KEY FK_3B3F37501B65292');
        $this->addSql('DROP TABLE session_exam');
        $this->addSql('DROP TABLE session_exam_employe');
    }
}
