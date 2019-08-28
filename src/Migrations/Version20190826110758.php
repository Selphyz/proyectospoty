<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190826110758 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE canciones (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(100) DEFAULT \'NULL\', album VARCHAR(100) DEFAULT \'NULL\', genero VARCHAR(50) DEFAULT \'NULL\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE listas (id_lista INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(25) DEFAULT \'NULL\', PRIMARY KEY(id_lista)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE listas_canciones (id_lista INT NOT NULL, id_cancion INT NOT NULL, PRIMARY KEY(id_lista, id_cancion)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuarios (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(70) DEFAULT \'NULL\', roles JSON NOT NULL, password VARCHAR(70) DEFAULT \'NULL\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE canciones');
        $this->addSql('DROP TABLE listas');
        $this->addSql('DROP TABLE listas_canciones');
        $this->addSql('DROP TABLE usuarios');
    }
}
