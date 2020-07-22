<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200722090617 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE evenements (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, dates DATETIME NOT NULL, image VARCHAR(255) NOT NULL, prix INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenements_reservations (evenements_id INT NOT NULL, reservations_id INT NOT NULL, INDEX IDX_3F23F0C863C02CD4 (evenements_id), INDEX IDX_3F23F0C8D9A7F869 (reservations_id), PRIMARY KEY(evenements_id, reservations_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE newlesters (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservations (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, INDEX IDX_4DA239A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE spectacles (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, dates DATETIME NOT NULL, image VARCHAR(255) NOT NULL, places INT NOT NULL, prix INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE spectacles_reservations (spectacles_id INT NOT NULL, reservations_id INT NOT NULL, INDEX IDX_126F4C47F26D12FD (spectacles_id), INDEX IDX_126F4C47D9A7F869 (reservations_id), PRIMARY KEY(spectacles_id, reservations_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE evenements_reservations ADD CONSTRAINT FK_3F23F0C863C02CD4 FOREIGN KEY (evenements_id) REFERENCES evenements (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE evenements_reservations ADD CONSTRAINT FK_3F23F0C8D9A7F869 FOREIGN KEY (reservations_id) REFERENCES reservations (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservations ADD CONSTRAINT FK_4DA239A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE spectacles_reservations ADD CONSTRAINT FK_126F4C47F26D12FD FOREIGN KEY (spectacles_id) REFERENCES spectacles (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE spectacles_reservations ADD CONSTRAINT FK_126F4C47D9A7F869 FOREIGN KEY (reservations_id) REFERENCES reservations (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evenements_reservations DROP FOREIGN KEY FK_3F23F0C863C02CD4');
        $this->addSql('ALTER TABLE evenements_reservations DROP FOREIGN KEY FK_3F23F0C8D9A7F869');
        $this->addSql('ALTER TABLE spectacles_reservations DROP FOREIGN KEY FK_126F4C47D9A7F869');
        $this->addSql('ALTER TABLE spectacles_reservations DROP FOREIGN KEY FK_126F4C47F26D12FD');
        $this->addSql('ALTER TABLE reservations DROP FOREIGN KEY FK_4DA239A76ED395');
        $this->addSql('DROP TABLE evenements');
        $this->addSql('DROP TABLE evenements_reservations');
        $this->addSql('DROP TABLE newlesters');
        $this->addSql('DROP TABLE reservations');
        $this->addSql('DROP TABLE spectacles');
        $this->addSql('DROP TABLE spectacles_reservations');
        $this->addSql('DROP TABLE users');
    }
}
