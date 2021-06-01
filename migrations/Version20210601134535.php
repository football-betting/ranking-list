<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210601134535 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE game (id INT AUTO_INCREMENT NOT NULL, match_id VARCHAR(255) NOT NULL, team1 VARCHAR(255) NOT NULL, team2 VARCHAR(255) NOT NULL, match_datetime VARCHAR(255) NOT NULL, score_team1 VARCHAR(255) NOT NULL, score_team2 VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tip (id INT AUTO_INCREMENT NOT NULL, match_id VARCHAR(255) NOT NULL, score INT NOT NULL, score_team1 VARCHAR(255) NOT NULL, score_team2 VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, position INT NOT NULL, score_sum INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tips (user_id INT NOT NULL, tip_id INT NOT NULL, INDEX IDX_642C4108A76ED395 (user_id), INDEX IDX_642C4108476C47F6 (tip_id), PRIMARY KEY(user_id, tip_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tips ADD CONSTRAINT FK_642C4108A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tips ADD CONSTRAINT FK_642C4108476C47F6 FOREIGN KEY (tip_id) REFERENCES tip (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tips DROP FOREIGN KEY FK_642C4108476C47F6');
        $this->addSql('ALTER TABLE tips DROP FOREIGN KEY FK_642C4108A76ED395');
        $this->addSql('DROP TABLE game');
        $this->addSql('DROP TABLE tip');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE tips');
    }
}
