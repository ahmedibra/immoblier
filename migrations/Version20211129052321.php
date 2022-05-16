<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211129052321 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE confier');
        $this->addSql('ALTER TABLE annonce ADD budget_min DOUBLE PRECISION DEFAULT NULL, ADD budget_max DOUBLE PRECISION DEFAULT NULL, ADD surface_min DOUBLE PRECISION DEFAULT NULL, ADD surface_max DOUBLE PRECISION DEFAULT NULL, ADD annonce_confier VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE confier (id INT AUTO_INCREMENT NOT NULL, budget_min DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE annonce DROP budget_min, DROP budget_max, DROP surface_min, DROP surface_max, DROP annonce_confier');
    }
}
