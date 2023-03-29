<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230329152540 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CF8697D13');
        $this->addSql('DROP INDEX IDX_9474526CF8697D13 ON comment');
        $this->addSql('ALTER TABLE comment ADD reply_id INT DEFAULT NULL, DROP comment_id');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C8A0E4E7F FOREIGN KEY (reply_id) REFERENCES comment (id)');
        $this->addSql('CREATE INDEX IDX_9474526C8A0E4E7F ON comment (reply_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C8A0E4E7F');
        $this->addSql('DROP INDEX IDX_9474526C8A0E4E7F ON comment');
        $this->addSql('ALTER TABLE comment ADD comment_id INT NOT NULL, DROP reply_id');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CF8697D13 FOREIGN KEY (comment_id) REFERENCES comment (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_9474526CF8697D13 ON comment (comment_id)');
    }
}
