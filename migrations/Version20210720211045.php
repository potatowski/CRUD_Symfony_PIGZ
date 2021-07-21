<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210720211045 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cliente (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nome VARCHAR(255) NOT NULL, cpf VARCHAR(255) NOT NULL, nascimento DATE NOT NULL)');
        $this->addSql('CREATE TABLE operadora (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nome VARCHAR(30) NOT NULL)');
        $this->addSql('CREATE TABLE telefone (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, ddd VARCHAR(3) NOT NULL, numero VARCHAR(9) NOT NULL)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE cliente');
        $this->addSql('DROP TABLE operadora');
        $this->addSql('DROP TABLE telefone');
    }
}
