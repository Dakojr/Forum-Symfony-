<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190201131220 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX IDX_B6BD307F4F8ECCA8');
        $this->addSql('DROP INDEX IDX_B6BD307F79F37AE5');
        $this->addSql('CREATE TEMPORARY TABLE __temp__message AS SELECT id, id_topic_id, id_user_id, lemessage, date_message FROM message');
        $this->addSql('DROP TABLE message');
        $this->addSql('CREATE TABLE message (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_topic_id INTEGER NOT NULL, id_user_id INTEGER NOT NULL, lemessage VARCHAR(255) NOT NULL COLLATE BINARY, date_message DATETIME NOT NULL, CONSTRAINT FK_B6BD307F4F8ECCA8 FOREIGN KEY (id_topic_id) REFERENCES topic (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_B6BD307F79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO message (id, id_topic_id, id_user_id, lemessage, date_message) SELECT id, id_topic_id, id_user_id, lemessage, date_message FROM __temp__message');
        $this->addSql('DROP TABLE __temp__message');
        $this->addSql('CREATE INDEX IDX_B6BD307F4F8ECCA8 ON message (id_topic_id)');
        $this->addSql('CREATE INDEX IDX_B6BD307F79F37AE5 ON message (id_user_id)');
        $this->addSql('DROP INDEX IDX_9D40DE1B79F37AE5');
        $this->addSql('CREATE TEMPORARY TABLE __temp__topic AS SELECT id, id_user_id, name_topic, date_topic, description FROM topic');
        $this->addSql('DROP TABLE topic');
        $this->addSql('CREATE TABLE topic (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_user_id INTEGER NOT NULL, cat_id INTEGER NOT NULL, name_topic VARCHAR(255) NOT NULL COLLATE BINARY, description VARCHAR(255) NOT NULL COLLATE BINARY, date_topic DATETIME NOT NULL, CONSTRAINT FK_9D40DE1B79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_9D40DE1BE6ADA943 FOREIGN KEY (cat_id) REFERENCES categorie (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO topic (id, id_user_id, name_topic, date_topic, description) SELECT id, id_user_id, name_topic, date_topic, description FROM __temp__topic');
        $this->addSql('DROP TABLE __temp__topic');
        $this->addSql('CREATE INDEX IDX_9D40DE1B79F37AE5 ON topic (id_user_id)');
        $this->addSql('CREATE INDEX IDX_9D40DE1BE6ADA943 ON topic (cat_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX IDX_B6BD307F4F8ECCA8');
        $this->addSql('DROP INDEX IDX_B6BD307F79F37AE5');
        $this->addSql('CREATE TEMPORARY TABLE __temp__message AS SELECT id, id_topic_id, id_user_id, lemessage, date_message FROM message');
        $this->addSql('DROP TABLE message');
        $this->addSql('CREATE TABLE message (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_topic_id INTEGER NOT NULL, id_user_id INTEGER NOT NULL, lemessage VARCHAR(255) NOT NULL, date_message DATETIME NOT NULL)');
        $this->addSql('INSERT INTO message (id, id_topic_id, id_user_id, lemessage, date_message) SELECT id, id_topic_id, id_user_id, lemessage, date_message FROM __temp__message');
        $this->addSql('DROP TABLE __temp__message');
        $this->addSql('CREATE INDEX IDX_B6BD307F4F8ECCA8 ON message (id_topic_id)');
        $this->addSql('CREATE INDEX IDX_B6BD307F79F37AE5 ON message (id_user_id)');
        $this->addSql('DROP INDEX IDX_9D40DE1B79F37AE5');
        $this->addSql('DROP INDEX IDX_9D40DE1BE6ADA943');
        $this->addSql('CREATE TEMPORARY TABLE __temp__topic AS SELECT id, id_user_id, name_topic, date_topic, description FROM topic');
        $this->addSql('DROP TABLE topic');
        $this->addSql('CREATE TABLE topic (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_user_id INTEGER NOT NULL, name_topic VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, date_topic DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL)');
        $this->addSql('INSERT INTO topic (id, id_user_id, name_topic, date_topic, description) SELECT id, id_user_id, name_topic, date_topic, description FROM __temp__topic');
        $this->addSql('DROP TABLE __temp__topic');
        $this->addSql('CREATE INDEX IDX_9D40DE1B79F37AE5 ON topic (id_user_id)');
    }
}
