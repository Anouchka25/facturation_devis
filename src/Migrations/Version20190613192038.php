<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190613192038 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, mailde VARCHAR(255) NOT NULL, date_of_birth DATETIME NOT NULL, message VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE devis CHANGE designation2 designation2 VARCHAR(255) DEFAULT NULL, CHANGE taxe2 taxe2 NUMERIC(10, 0) DEFAULT NULL, CHANGE prixht3 prixht3 NUMERIC(10, 0) DEFAULT NULL, CHANGE taxe3 taxe3 NUMERIC(10, 0) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE contact');
        $this->addSql('ALTER TABLE devis CHANGE designation2 designation2 VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE taxe2 taxe2 NUMERIC(10, 0) NOT NULL, CHANGE prixht3 prixht3 NUMERIC(10, 0) NOT NULL, CHANGE taxe3 taxe3 NUMERIC(10, 0) NOT NULL');
    }
}
