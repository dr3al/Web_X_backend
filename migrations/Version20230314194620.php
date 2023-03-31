<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230314194620 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_connection ADD user_id INT NOT NULL, ADD follower_id INT NOT NULL, DROP user, DROP follower');
        $this->addSql('ALTER TABLE user_connection ADD CONSTRAINT FK_8E90B58AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_connection ADD CONSTRAINT FK_8E90B58AAC24F853 FOREIGN KEY (follower_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_8E90B58AA76ED395 ON user_connection (user_id)');
        $this->addSql('CREATE INDEX IDX_8E90B58AAC24F853 ON user_connection (follower_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_connection DROP FOREIGN KEY FK_8E90B58AA76ED395');
        $this->addSql('ALTER TABLE user_connection DROP FOREIGN KEY FK_8E90B58AAC24F853');
        $this->addSql('DROP INDEX IDX_8E90B58AA76ED395 ON user_connection');
        $this->addSql('DROP INDEX IDX_8E90B58AAC24F853 ON user_connection');
        $this->addSql('ALTER TABLE user_connection ADD user INT NOT NULL, ADD follower INT NOT NULL, DROP user_id, DROP follower_id');
    }
}
