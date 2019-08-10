<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190721150824 extends AbstractMigration
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
        $this->addSql('CREATE TABLE devis (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, numdevis VARCHAR(10) NOT NULL, numtva VARCHAR(13) NOT NULL, datedevis DATETIME NOT NULL, vosinfos VARCHAR(255) NOT NULL, infosclient VARCHAR(255) NOT NULL, conditions VARCHAR(255) NOT NULL, consignes VARCHAR(255) NOT NULL, designation1 VARCHAR(255) NOT NULL, quantite1 INT NOT NULL, prixht1 NUMERIC(10, 0) NOT NULL, taxe1 NUMERIC(10, 0) NOT NULL, designation2 VARCHAR(255) DEFAULT NULL, quantite2 INT DEFAULT NULL, prixht2 NUMERIC(10, 0) DEFAULT NULL, taxe2 NUMERIC(10, 0) DEFAULT NULL, designation3 VARCHAR(255) DEFAULT NULL, quantite3 INT DEFAULT NULL, prixht3 NUMERIC(10, 0) DEFAULT NULL, taxe3 NUMERIC(10, 0) DEFAULT NULL, INDEX IDX_8B27C52BA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facture (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, numfacture VARCHAR(10) NOT NULL, numtva VARCHAR(13) NOT NULL, datefacture DATETIME NOT NULL, vosinfos VARCHAR(255) NOT NULL, infosclient VARCHAR(255) NOT NULL, conditions VARCHAR(255) NOT NULL, consignes VARCHAR(255) NOT NULL, designation1 VARCHAR(255) NOT NULL, quantite1 INT NOT NULL, prixht1 NUMERIC(10, 0) NOT NULL, taxe1 NUMERIC(10, 0) NOT NULL, designation2 VARCHAR(255) DEFAULT NULL, quantite2 INT DEFAULT NULL, prixht2 NUMERIC(10, 0) DEFAULT NULL, taxe2 NUMERIC(10, 0) DEFAULT NULL, designation3 VARCHAR(255) DEFAULT NULL, quantite3 INT DEFAULT NULL, prixht3 NUMERIC(10, 0) DEFAULT NULL, taxe3 NUMERIC(10, 0) DEFAULT NULL, INDEX IDX_FE866410A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, confirm_password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE devis ADD CONSTRAINT FK_8B27C52BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE866410A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE devis DROP FOREIGN KEY FK_8B27C52BA76ED395');
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE866410A76ED395');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE devis');
        $this->addSql('DROP TABLE facture');
        $this->addSql('DROP TABLE user');
    }
}
