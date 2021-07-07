<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210509131927 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE quiz_answers (id INT AUTO_INCREMENT NOT NULL, quiz_questions_id INT NOT NULL, name VARCHAR(255) NOT NULL, expected_answer VARCHAR(255) NOT NULL, INDEX IDX_428A6BA66A48B135 (quiz_questions_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quiz_categorie (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quiz_name (id INT AUTO_INCREMENT NOT NULL, quiz_categories_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_94D2825D88ABC6A6 (quiz_categories_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quiz_questions (id INT AUTO_INCREMENT NOT NULL, quiz_name_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_8CBC2533634D3176 (quiz_name_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reset_password_request (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, selector VARCHAR(20) NOT NULL, hashed_token VARCHAR(100) NOT NULL, requested_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', expires_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7CE748AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, pseudo VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE quiz_answers ADD CONSTRAINT FK_428A6BA66A48B135 FOREIGN KEY (quiz_questions_id) REFERENCES quiz_questions (id)');
        $this->addSql('ALTER TABLE quiz_name ADD CONSTRAINT FK_94D2825D88ABC6A6 FOREIGN KEY (quiz_categories_id) REFERENCES quiz_categorie (id)');
        $this->addSql('ALTER TABLE quiz_questions ADD CONSTRAINT FK_8CBC2533634D3176 FOREIGN KEY (quiz_name_id) REFERENCES quiz_name (id)');
        $this->addSql('ALTER TABLE reset_password_request ADD CONSTRAINT FK_7CE748AA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE quiz_name DROP FOREIGN KEY FK_94D2825D88ABC6A6');
        $this->addSql('ALTER TABLE quiz_questions DROP FOREIGN KEY FK_8CBC2533634D3176');
        $this->addSql('ALTER TABLE quiz_answers DROP FOREIGN KEY FK_428A6BA66A48B135');
        $this->addSql('ALTER TABLE reset_password_request DROP FOREIGN KEY FK_7CE748AA76ED395');
        $this->addSql('DROP TABLE quiz_answers');
        $this->addSql('DROP TABLE quiz_categorie');
        $this->addSql('DROP TABLE quiz_name');
        $this->addSql('DROP TABLE quiz_questions');
        $this->addSql('DROP TABLE reset_password_request');
        $this->addSql('DROP TABLE users');
    }
}
