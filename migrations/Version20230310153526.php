<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230310153526 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE goal (id INT AUTO_INCREMENT NOT NULL, users_id INT NOT NULL, name VARCHAR(50) NOT NULL, description LONGTEXT NOT NULL, date_create DATETIME NOT NULL COMMENT \'(DC2Type:datetimetz_immutable)\', date_modify DATETIME NOT NULL COMMENT \'(DC2Type:datetimetz_immutable)\', INDEX IDX_FCDCEB2E67B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE like_connection (id INT AUTO_INCREMENT NOT NULL, posts_id INT NOT NULL, users_id INT NOT NULL, date_create DATETIME NOT NULL COMMENT \'(DC2Type:datetimetz_immutable)\', INDEX IDX_8A63D39ED5E258C5 (posts_id), INDEX IDX_8A63D39E67B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE posts (id INT AUTO_INCREMENT NOT NULL, goal_id INT NOT NULL, text LONGTEXT NOT NULL, progress INT NOT NULL, date_create DATETIME NOT NULL COMMENT \'(DC2Type:datetimetz_immutable)\', date_modify DATETIME NOT NULL COMMENT \'(DC2Type:datetimetz_immutable)\', INDEX IDX_885DBAFA667D1AFE (goal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(40) NOT NULL, password VARCHAR(40) NOT NULL, email VARCHAR(40) NOT NULL, first_name VARCHAR(20) NOT NULL, last_name VARCHAR(20) NOT NULL, role VARCHAR(15) NOT NULL, date_create DATETIME NOT NULL COMMENT \'(DC2Type:datetimetz_immutable)\', date_modify DATETIME NOT NULL COMMENT \'(DC2Type:datetimetz_immutable)\', UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE goal ADD CONSTRAINT FK_FCDCEB2E67B3B43D FOREIGN KEY (users_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE like_connection ADD CONSTRAINT FK_8A63D39ED5E258C5 FOREIGN KEY (posts_id) REFERENCES posts (id)');
        $this->addSql('ALTER TABLE like_connection ADD CONSTRAINT FK_8A63D39E67B3B43D FOREIGN KEY (users_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE posts ADD CONSTRAINT FK_885DBAFA667D1AFE FOREIGN KEY (goal_id) REFERENCES goal (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE goal DROP FOREIGN KEY FK_FCDCEB2E67B3B43D');
        $this->addSql('ALTER TABLE like_connection DROP FOREIGN KEY FK_8A63D39ED5E258C5');
        $this->addSql('ALTER TABLE like_connection DROP FOREIGN KEY FK_8A63D39E67B3B43D');
        $this->addSql('ALTER TABLE posts DROP FOREIGN KEY FK_885DBAFA667D1AFE');
        $this->addSql('DROP TABLE goal');
        $this->addSql('DROP TABLE like_connection');
        $this->addSql('DROP TABLE posts');
        $this->addSql('DROP TABLE user');
    }
}
