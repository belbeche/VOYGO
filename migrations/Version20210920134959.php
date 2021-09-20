<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210920134959 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category_chambres (category_id INT NOT NULL, chambres_id INT NOT NULL, INDEX IDX_81B3AD1912469DE2 (category_id), INDEX IDX_81B3AD198BEC3FB7 (chambres_id), PRIMARY KEY(category_id, chambres_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category_chambres ADD CONSTRAINT FK_81B3AD1912469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_chambres ADD CONSTRAINT FK_81B3AD198BEC3FB7 FOREIGN KEY (chambres_id) REFERENCES chambres (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE category_chambres');
    }
}
