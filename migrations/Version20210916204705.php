<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210916204705 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE chambres_user (chambres_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_F91C5E718BEC3FB7 (chambres_id), INDEX IDX_F91C5E71A76ED395 (user_id), PRIMARY KEY(chambres_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE chambres_user ADD CONSTRAINT FK_F91C5E718BEC3FB7 FOREIGN KEY (chambres_id) REFERENCES chambres (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE chambres_user ADD CONSTRAINT FK_F91C5E71A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('ALTER TABLE chambres DROP FOREIGN KEY FK_36C929629D86650F');
        $this->addSql('DROP INDEX IDX_36C929629D86650F ON chambres');
        $this->addSql('ALTER TABLE chambres DROP user_id_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, depart DATETIME NOT NULL, arrive DATETIME NOT NULL, nb_adultes INT NOT NULL, nb_child INT NOT NULL, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, message TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE chambres_user');
        $this->addSql('ALTER TABLE chambres ADD user_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE chambres ADD CONSTRAINT FK_36C929629D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_36C929629D86650F ON chambres (user_id_id)');
    }
}
