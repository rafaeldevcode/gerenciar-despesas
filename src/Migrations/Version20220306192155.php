<?php

declare(strict_types=1);

namespace Manage\Expenses\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220306192155 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE Company (id INT NOT NULL, name VARCHAR(255) NOT NULL, cnpj VARCHAR(255) NOT NULL, logo_comapany VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE company_gain (company_id INT NOT NULL, gain_id INT NOT NULL, INDEX IDX_93F837EE979B1AD6 (company_id), INDEX IDX_93F837EEC60EF8C4 (gain_id), PRIMARY KEY(company_id, gain_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE company_expenses (company_id INT NOT NULL, expenses_id INT NOT NULL, INDEX IDX_3C01E636979B1AD6 (company_id), INDEX IDX_3C01E6362055804A (expenses_id), PRIMARY KEY(company_id, expenses_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Expenses (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, value_expenses VARCHAR(255) NOT NULL, month VARCHAR(255) NOT NULL, year INT NOT NULL, type_expenses VARCHAR(255) NOT NULL, taxCoupon VARCHAR(255) NOT NULL, INDEX IDX_DDE0910DA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE expenses_company (expenses_id INT NOT NULL, company_id INT NOT NULL, INDEX IDX_99535B7C2055804A (expenses_id), INDEX IDX_99535B7C979B1AD6 (company_id), PRIMARY KEY(expenses_id, company_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Gain (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, value_gain VARCHAR(255) NOT NULL, type_gain VARCHAR(255) NOT NULL, receipt_gain VARCHAR(255) NOT NULL, INDEX IDX_70A7823EA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gain_company (gain_id INT NOT NULL, company_id INT NOT NULL, INDEX IDX_51C348C7C60EF8C4 (gain_id), INDEX IDX_51C348C7979B1AD6 (company_id), PRIMARY KEY(gain_id, company_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE company_gain ADD CONSTRAINT FK_93F837EE979B1AD6 FOREIGN KEY (company_id) REFERENCES Company (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE company_gain ADD CONSTRAINT FK_93F837EEC60EF8C4 FOREIGN KEY (gain_id) REFERENCES Gain (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE company_expenses ADD CONSTRAINT FK_3C01E636979B1AD6 FOREIGN KEY (company_id) REFERENCES Company (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE company_expenses ADD CONSTRAINT FK_3C01E6362055804A FOREIGN KEY (expenses_id) REFERENCES Expenses (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE Expenses ADD CONSTRAINT FK_DDE0910DA76ED395 FOREIGN KEY (user_id) REFERENCES User (id)');
        $this->addSql('ALTER TABLE expenses_company ADD CONSTRAINT FK_99535B7C2055804A FOREIGN KEY (expenses_id) REFERENCES Expenses (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE expenses_company ADD CONSTRAINT FK_99535B7C979B1AD6 FOREIGN KEY (company_id) REFERENCES Company (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE Gain ADD CONSTRAINT FK_70A7823EA76ED395 FOREIGN KEY (user_id) REFERENCES User (id)');
        $this->addSql('ALTER TABLE gain_company ADD CONSTRAINT FK_51C348C7C60EF8C4 FOREIGN KEY (gain_id) REFERENCES Gain (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE gain_company ADD CONSTRAINT FK_51C348C7979B1AD6 FOREIGN KEY (company_id) REFERENCES Company (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE company_gain DROP FOREIGN KEY FK_93F837EE979B1AD6');
        $this->addSql('ALTER TABLE company_expenses DROP FOREIGN KEY FK_3C01E636979B1AD6');
        $this->addSql('ALTER TABLE expenses_company DROP FOREIGN KEY FK_99535B7C979B1AD6');
        $this->addSql('ALTER TABLE gain_company DROP FOREIGN KEY FK_51C348C7979B1AD6');
        $this->addSql('ALTER TABLE company_expenses DROP FOREIGN KEY FK_3C01E6362055804A');
        $this->addSql('ALTER TABLE expenses_company DROP FOREIGN KEY FK_99535B7C2055804A');
        $this->addSql('ALTER TABLE company_gain DROP FOREIGN KEY FK_93F837EEC60EF8C4');
        $this->addSql('ALTER TABLE gain_company DROP FOREIGN KEY FK_51C348C7C60EF8C4');
        $this->addSql('DROP TABLE Company');
        $this->addSql('DROP TABLE company_gain');
        $this->addSql('DROP TABLE company_expenses');
        $this->addSql('DROP TABLE Expenses');
        $this->addSql('DROP TABLE expenses_company');
        $this->addSql('DROP TABLE Gain');
        $this->addSql('DROP TABLE gain_company');
        $this->addSql('ALTER TABLE User CHANGE name name VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, CHANGE email email VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, CHANGE pass pass VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`');
    }
}
