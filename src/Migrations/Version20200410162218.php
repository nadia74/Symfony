<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200410162218 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE movie (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, year VARCHAR(255) DEFAULT NULL, rated VARCHAR(255) DEFAULT NULL, released VARCHAR(255) DEFAULT NULL, runtime VARCHAR(255) DEFAULT NULL, genre VARCHAR(255) DEFAULT NULL, director VARCHAR(255) DEFAULT NULL, writer VARCHAR(255) DEFAULT NULL, actors VARCHAR(255) DEFAULT NULL, plot LONGTEXT DEFAULT NULL, language VARCHAR(255) DEFAULT NULL, country VARCHAR(255) DEFAULT NULL, awards VARCHAR(255) DEFAULT NULL, movie_favorite TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, admin TINYINT(1) NOT NULL, banned TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_liste_relationship (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, liste_id_id INT NOT NULL, INDEX IDX_25E572D49D86650F (user_id_id), INDEX IDX_25E572D460BF4AF9 (liste_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE liste (id INT AUTO_INCREMENT NOT NULL, listename VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, liste_favorite TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE liste_movie_relationship (id INT AUTO_INCREMENT NOT NULL, liste_id_id INT NOT NULL, movie_id_id INT NOT NULL, INDEX IDX_C9FDF31F60BF4AF9 (liste_id_id), INDEX IDX_C9FDF31F10684CB (movie_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_liste_relationship ADD CONSTRAINT FK_25E572D49D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_liste_relationship ADD CONSTRAINT FK_25E572D460BF4AF9 FOREIGN KEY (liste_id_id) REFERENCES liste (id)');
        $this->addSql('ALTER TABLE liste_movie_relationship ADD CONSTRAINT FK_C9FDF31F60BF4AF9 FOREIGN KEY (liste_id_id) REFERENCES liste (id)');
        $this->addSql('ALTER TABLE liste_movie_relationship ADD CONSTRAINT FK_C9FDF31F10684CB FOREIGN KEY (movie_id_id) REFERENCES movie (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE liste_movie_relationship DROP FOREIGN KEY FK_C9FDF31F10684CB');
        $this->addSql('ALTER TABLE user_liste_relationship DROP FOREIGN KEY FK_25E572D49D86650F');
        $this->addSql('ALTER TABLE user_liste_relationship DROP FOREIGN KEY FK_25E572D460BF4AF9');
        $this->addSql('ALTER TABLE liste_movie_relationship DROP FOREIGN KEY FK_C9FDF31F60BF4AF9');
        $this->addSql('DROP TABLE movie');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_liste_relationship');
        $this->addSql('DROP TABLE liste');
        $this->addSql('DROP TABLE liste_movie_relationship');
    }
}
