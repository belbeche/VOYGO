<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210921121931 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE chambres_user');
        $this->addSql('ALTER TABLE hotel ADD promo TINYINT(1) NOT NULL, CHANGE image image VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE chambres_user (chambres_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_F91C5E718BEC3FB7 (chambres_id), INDEX IDX_F91C5E71A76ED395 (user_id), PRIMARY KEY(chambres_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE hotel DROP promo, CHANGE image image VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'https://picsum.photos/seed/picsum/200/300\' NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
