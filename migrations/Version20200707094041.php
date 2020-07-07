<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200707094041 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE place (id INT AUTO_INCREMENT NOT NULL, place VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE session ADD place_id INT NOT NULL');
        $this->addSql('ALTER TABLE session ADD CONSTRAINT FK_D044D5D4DA6A219 FOREIGN KEY (place_id) REFERENCES place (id)');
        $this->addSql('CREATE INDEX IDX_D044D5D4DA6A219 ON session (place_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE session DROP FOREIGN KEY FK_D044D5D4DA6A219');
        $this->addSql('DROP TABLE place');
        $this->addSql('DROP INDEX IDX_D044D5D4DA6A219 ON session');
        $this->addSql('ALTER TABLE session DROP place_id');
    }
}
