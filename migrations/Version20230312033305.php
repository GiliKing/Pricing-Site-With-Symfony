<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230312033305 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pricing_plan (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, price INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pricing_plan_pricing_plan_feature (pricing_plan_id INT NOT NULL, pricing_plan_feature_id INT NOT NULL, INDEX IDX_D19087D429628C71 (pricing_plan_id), INDEX IDX_D19087D46C9002D8 (pricing_plan_feature_id), PRIMARY KEY(pricing_plan_id, pricing_plan_feature_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pricing_plan_benefit (id INT AUTO_INCREMENT NOT NULL, pricing_plan_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_E6A62C5F29628C71 (pricing_plan_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pricing_plan_feature (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pricing_plan_pricing_plan_feature ADD CONSTRAINT FK_D19087D429628C71 FOREIGN KEY (pricing_plan_id) REFERENCES pricing_plan (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pricing_plan_pricing_plan_feature ADD CONSTRAINT FK_D19087D46C9002D8 FOREIGN KEY (pricing_plan_feature_id) REFERENCES pricing_plan_feature (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pricing_plan_benefit ADD CONSTRAINT FK_E6A62C5F29628C71 FOREIGN KEY (pricing_plan_id) REFERENCES pricing_plan (id)');


        $this->addSql('INSERT INTO pricing_plan (`id`, `name`, `price`) VALUE(1, "Free", 0)');
        $this->addSql('INSERT INTO pricing_plan (`id`, `name`, `price`) VALUE(2, "Pro", 15)');
        $this->addSql('INSERT INTO pricing_plan (`id`, `name`, `price`) VALUE(3, "Enterprice", 29)');


        $this->addSql('INSERT INTO pricing_plan_benefit (`id`, `pricing_plan_id`, `name`) VALUE(1, 1, "10 users included")');
        $this->addSql('INSERT INTO pricing_plan_benefit (`id`, `pricing_plan_id`, `name`) VALUE(2, 1, "2 GB of storage")');
        $this->addSql('INSERT INTO pricing_plan_benefit (`id`, `pricing_plan_id`, `name`) VALUE(3, 1, "Email Support")');
        $this->addSql('INSERT INTO pricing_plan_benefit (`id`, `pricing_plan_id`, `name`) VALUE(4, 1, "Help Center Account")');

        $this->addSql('INSERT INTO pricing_plan_benefit (`id`, `pricing_plan_id`, `name`) VALUE(5, 2, "20 users included")');
        $this->addSql('INSERT INTO pricing_plan_benefit (`id`, `pricing_plan_id`, `name`) VALUE(6, 2, "10 GB of storage")');
        $this->addSql('INSERT INTO pricing_plan_benefit (`id`, `pricing_plan_id`, `name`) VALUE(7, 2, "Priority Email Support")');
        $this->addSql('INSERT INTO pricing_plan_benefit (`id`, `pricing_plan_id`, `name`) VALUE(8, 2, "Help Center Account")');

        $this->addSql('INSERT INTO pricing_plan_benefit (`id`, `pricing_plan_id`, `name`) VALUE(9, 3, "30 users included")');
        $this->addSql('INSERT INTO pricing_plan_benefit (`id`, `pricing_plan_id`, `name`) VALUE(10, 3, "15 GB of storage")');
        $this->addSql('INSERT INTO pricing_plan_benefit (`id`, `pricing_plan_id`, `name`) VALUE(11, 3, "Phone and Email Support")');
        $this->addSql('INSERT INTO pricing_plan_benefit (`id`, `pricing_plan_id`, `name`) VALUE(12, 3, "Help Center Account")');

        $this->addSql('INSERT INTO pricing_plan_feature (`id`, `name`) VALUE(1, "Public")');
        $this->addSql('INSERT INTO pricing_plan_feature (`id`, `name`) VALUE(2, "Private")');
        $this->addSql('INSERT INTO pricing_plan_feature (`id`, `name`) VALUE(3, "Permissions")');
        $this->addSql('INSERT INTO pricing_plan_feature (`id`, `name`) VALUE(4, "Sharing")');
        $this->addSql('INSERT INTO pricing_plan_feature (`id`, `name`) VALUE(5, "Unlimited Members")');
        $this->addSql('INSERT INTO pricing_plan_feature (`id`, `name`) VALUE(6, "Extra Security")');

        $this->addSql('INSERT INTO pricing_plan_pricing_plan_feature (`pricing_plan_id`, `pricing_plan_feature_id`) VALUE(1, 1)');
        $this->addSql('INSERT INTO pricing_plan_pricing_plan_feature (`pricing_plan_id`, `pricing_plan_feature_id`) VALUE(1, 3)');

        $this->addSql('INSERT INTO pricing_plan_pricing_plan_feature (`pricing_plan_id`, `pricing_plan_feature_id`) VALUE(2, 1)');
        $this->addSql('INSERT INTO pricing_plan_pricing_plan_feature (`pricing_plan_id`, `pricing_plan_feature_id`) VALUE(2, 2)');
        $this->addSql('INSERT INTO pricing_plan_pricing_plan_feature (`pricing_plan_id`, `pricing_plan_feature_id`) VALUE(2, 3)');
        $this->addSql('INSERT INTO pricing_plan_pricing_plan_feature (`pricing_plan_id`, `pricing_plan_feature_id`) VALUE(2, 4)');
        $this->addSql('INSERT INTO pricing_plan_pricing_plan_feature (`pricing_plan_id`, `pricing_plan_feature_id`) VALUE(2, 5)');

        $this->addSql('INSERT INTO pricing_plan_pricing_plan_feature (`pricing_plan_id`, `pricing_plan_feature_id`) VALUE(3, 1)');
        $this->addSql('INSERT INTO pricing_plan_pricing_plan_feature (`pricing_plan_id`, `pricing_plan_feature_id`) VALUE(3, 2)');
        $this->addSql('INSERT INTO pricing_plan_pricing_plan_feature (`pricing_plan_id`, `pricing_plan_feature_id`) VALUE(3, 3)');
        $this->addSql('INSERT INTO pricing_plan_pricing_plan_feature (`pricing_plan_id`, `pricing_plan_feature_id`) VALUE(3, 4)');
        $this->addSql('INSERT INTO pricing_plan_pricing_plan_feature (`pricing_plan_id`, `pricing_plan_feature_id`) VALUE(3, 5)');
        $this->addSql('INSERT INTO pricing_plan_pricing_plan_feature (`pricing_plan_id`, `pricing_plan_feature_id`) VALUE(3, 6)');



    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pricing_plan_pricing_plan_feature DROP FOREIGN KEY FK_D19087D429628C71');
        $this->addSql('ALTER TABLE pricing_plan_pricing_plan_feature DROP FOREIGN KEY FK_D19087D46C9002D8');
        $this->addSql('ALTER TABLE pricing_plan_benefit DROP FOREIGN KEY FK_E6A62C5F29628C71');
        $this->addSql('DROP TABLE pricing_plan');
        $this->addSql('DROP TABLE pricing_plan_pricing_plan_feature');
        $this->addSql('DROP TABLE pricing_plan_benefit');
        $this->addSql('DROP TABLE pricing_plan_feature');
    }
}
