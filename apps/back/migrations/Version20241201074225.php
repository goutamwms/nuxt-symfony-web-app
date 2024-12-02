<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241201074225 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE location (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, latitude DOUBLE PRECISION NOT NULL, longitude DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE transaction (id INT AUTO_INCREMENT NOT NULL, amount DOUBLE PRECISION NOT NULL, description VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, location_name VARCHAR(255) DEFAULT NULL, location_updated_at DATETIME DEFAULT NULL, user_id VARCHAR(36) NOT NULL, location_id INT NOT NULL, INDEX IDX_723705D1A76ED395 (user_id), INDEX IDX_723705D164D218E (location_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D164D218E FOREIGN KEY (location_id) REFERENCES location (id)');
        $this->addSql('ALTER TABLE user ADD first_name VARCHAR(255) NOT NULL, ADD last_name VARCHAR(255) NOT NULL, ADD score INT UNSIGNED DEFAULT 0 NOT NULL, ADD pending_transaction INT UNSIGNED DEFAULT 0 NOT NULL, ADD locale VARCHAR(20) DEFAULT \'en_US\' NOT NULL, ADD currency VARCHAR(20) DEFAULT \'USD\' NOT NULL, CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1A76ED395');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D164D218E');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP TABLE transaction');
        $this->addSql('ALTER TABLE user DROP first_name, DROP last_name, DROP score, DROP pending_transaction, DROP locale, DROP currency, CHANGE roles roles JSON NOT NULL COMMENT \'(DC2Type:json)\'');
    }
}
