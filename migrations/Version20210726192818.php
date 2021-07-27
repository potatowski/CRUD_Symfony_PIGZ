<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210726192818 extends AbstractMigration
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
        $this->addSql('CREATE TABLE root (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_16F4F95BF85E0677 ON root (username)');
        $this->addSql('CREATE TABLE telefone (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, cliente_id INTEGER NOT NULL, operadora_id INTEGER NOT NULL, ddd VARCHAR(3) NOT NULL, numero VARCHAR(9) NOT NULL)');
        $this->addSql('CREATE INDEX IDX_2132E361DE734E51 ON telefone (cliente_id)');
        $this->addSql('CREATE INDEX IDX_2132E36135380935 ON telefone (operadora_id)');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649F85E0677 ON user (username)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE cliente');
        $this->addSql('DROP TABLE operadora');
        $this->addSql('DROP TABLE root');
        $this->addSql('DROP TABLE telefone');
        $this->addSql('DROP TABLE user');
    }
}
