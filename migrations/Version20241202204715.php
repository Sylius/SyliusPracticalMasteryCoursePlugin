<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241202204715 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sylius_academy_workshop_brand (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, code VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, enabled TINYINT(1) NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, state VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_1A53F48277153098 (code), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_academy_workshop_plugin_brand_channel (brand_id INT NOT NULL, channel_id INT NOT NULL, INDEX IDX_67A93DBF44F5D008 (brand_id), INDEX IDX_67A93DBF72F5A1AA (channel_id), PRIMARY KEY(brand_id, channel_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_academy_workshop_brand_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT NOT NULL, description LONGTEXT DEFAULT NULL, locale VARCHAR(255) NOT NULL, INDEX IDX_34FFE7A42C2AC5D3 (translatable_id), UNIQUE INDEX sylius_academy_workshop_brand_translation_uniq_trans (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sylius_academy_workshop_plugin_brand_channel ADD CONSTRAINT FK_67A93DBF44F5D008 FOREIGN KEY (brand_id) REFERENCES sylius_academy_workshop_brand (id)');
        $this->addSql('ALTER TABLE sylius_academy_workshop_plugin_brand_channel ADD CONSTRAINT FK_67A93DBF72F5A1AA FOREIGN KEY (channel_id) REFERENCES sylius_channel (id)');
        $this->addSql('ALTER TABLE sylius_academy_workshop_brand_translation ADD CONSTRAINT FK_34FFE7A42C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES sylius_academy_workshop_brand (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_product ADD brand_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_product ADD CONSTRAINT FK_677B9B7444F5D008 FOREIGN KEY (brand_id) REFERENCES sylius_academy_workshop_brand (id) ON DELETE SET NULL');
        $this->addSql('CREATE INDEX IDX_677B9B7444F5D008 ON sylius_product (brand_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_product DROP FOREIGN KEY FK_677B9B7444F5D008');
        $this->addSql('ALTER TABLE sylius_academy_workshop_plugin_brand_channel DROP FOREIGN KEY FK_67A93DBF44F5D008');
        $this->addSql('ALTER TABLE sylius_academy_workshop_plugin_brand_channel DROP FOREIGN KEY FK_67A93DBF72F5A1AA');
        $this->addSql('ALTER TABLE sylius_academy_workshop_brand_translation DROP FOREIGN KEY FK_34FFE7A42C2AC5D3');
        $this->addSql('DROP TABLE sylius_academy_workshop_brand');
        $this->addSql('DROP TABLE sylius_academy_workshop_plugin_brand_channel');
        $this->addSql('DROP TABLE sylius_academy_workshop_brand_translation');
        $this->addSql('DROP INDEX IDX_677B9B7444F5D008 ON sylius_product');
        $this->addSql('ALTER TABLE sylius_product DROP brand_id');
    }
}
