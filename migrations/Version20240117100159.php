<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240117100159 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE back_category_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE back_product_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE back_category (id INT NOT NULL, name VARCHAR(255) NOT NULL, status INT NOT NULL, description TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE back_product (id INT NOT NULL, back_category_id INT NOT NULL, name VARCHAR(255) NOT NULL, status INT NOT NULL, discription TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_820E7B387375BC6 ON back_product (back_category_id)');
        $this->addSql('ALTER TABLE back_product ADD CONSTRAINT FK_820E7B387375BC6 FOREIGN KEY (back_category_id) REFERENCES back_category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE back_category_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE back_product_id_seq CASCADE');
        $this->addSql('ALTER TABLE back_product DROP CONSTRAINT FK_820E7B387375BC6');
        $this->addSql('DROP TABLE back_category');
        $this->addSql('DROP TABLE back_product');
    }
}
