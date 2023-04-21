<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230421072918 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE telefono (id INT AUTO_INCREMENT NOT NULL, persona_id INT NOT NULL, descripcion VARCHAR(20) DEFAULT NULL, numero VARCHAR(20) NOT NULL, INDEX IDX_C1E70A7FF5F88DB9 (persona_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE telefono ADD CONSTRAINT FK_C1E70A7FF5F88DB9 FOREIGN KEY (persona_id) REFERENCES persona (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE telefono DROP FOREIGN KEY FK_C1E70A7FF5F88DB9');
        $this->addSql('DROP TABLE telefono');
    }
}
