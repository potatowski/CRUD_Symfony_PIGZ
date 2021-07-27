<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210726181208 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE root (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_16F4F95BF85E0677 ON root (username)');
        $this->addSql('DROP INDEX IDX_2132E36135380935');
        $this->addSql('DROP INDEX IDX_2132E361DE734E51');
        $this->addSql('CREATE TEMPORARY TABLE __temp__telefone AS SELECT id, cliente_id, operadora_id, ddd, numero FROM telefone');
        $this->addSql('DROP TABLE telefone');
        $this->addSql('CREATE TABLE telefone (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, cliente_id INTEGER NOT NULL, operadora_id INTEGER NOT NULL, ddd VARCHAR(3) NOT NULL COLLATE BINARY, numero VARCHAR(9) NOT NULL COLLATE BINARY, CONSTRAINT FK_2132E361DE734E51 FOREIGN KEY (cliente_id) REFERENCES cliente (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_2132E36135380935 FOREIGN KEY (operadora_id) REFERENCES operadora (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO telefone (id, cliente_id, operadora_id, ddd, numero) SELECT id, cliente_id, operadora_id, ddd, numero FROM __temp__telefone');
        $this->addSql('DROP TABLE __temp__telefone');
        $this->addSql('CREATE INDEX IDX_2132E36135380935 ON telefone (operadora_id)');
        $this->addSql('CREATE INDEX IDX_2132E361DE734E51 ON telefone (cliente_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE root');
        $this->addSql('DROP INDEX IDX_2132E361DE734E51');
        $this->addSql('DROP INDEX IDX_2132E36135380935');
        $this->addSql('CREATE TEMPORARY TABLE __temp__telefone AS SELECT id, cliente_id, operadora_id, ddd, numero FROM telefone');
        $this->addSql('DROP TABLE telefone');
        $this->addSql('CREATE TABLE telefone (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, cliente_id INTEGER NOT NULL, operadora_id INTEGER NOT NULL, ddd VARCHAR(3) NOT NULL, numero VARCHAR(9) NOT NULL)');
        $this->addSql('INSERT INTO telefone (id, cliente_id, operadora_id, ddd, numero) SELECT id, cliente_id, operadora_id, ddd, numero FROM __temp__telefone');
        $this->addSql('DROP TABLE __temp__telefone');
        $this->addSql('CREATE INDEX IDX_2132E361DE734E51 ON telefone (cliente_id)');
        $this->addSql('CREATE INDEX IDX_2132E36135380935 ON telefone (operadora_id)');
    }
}
