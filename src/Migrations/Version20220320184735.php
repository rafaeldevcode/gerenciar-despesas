<?php

declare(strict_types=1);

namespace Manage\Expenses\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220320184735 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE company_expenses');
        $this->addSql('DROP TABLE company_gain');
        $this->addSql('DROP TABLE expenses_company');
        $this->addSql('DROP TABLE gain_company');
        $this->addSql('ALTER TABLE expenses ADD comapany_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE expenses ADD CONSTRAINT FK_DDE0910DB5C5EE32 FOREIGN KEY (comapany_id) REFERENCES Company (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DDE0910DB5C5EE32 ON expenses (comapany_id)');
        $this->addSql('ALTER TABLE gain ADD company_id INT DEFAULT NULL, ADD acount_bank_id INT DEFAULT NULL, DROP deposit_bank');
        $this->addSql('ALTER TABLE gain ADD CONSTRAINT FK_70A7823E979B1AD6 FOREIGN KEY (company_id) REFERENCES Company (id)');
        $this->addSql('ALTER TABLE gain ADD CONSTRAINT FK_70A7823EC420CF8F FOREIGN KEY (acount_bank_id) REFERENCES AcountBank (id)');
        $this->addSql('CREATE INDEX IDX_70A7823E979B1AD6 ON gain (company_id)');
        $this->addSql('CREATE INDEX IDX_70A7823EC420CF8F ON gain (acount_bank_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE company_expenses (company_id INT NOT NULL, expenses_id INT NOT NULL, INDEX IDX_3C01E636979B1AD6 (company_id), INDEX IDX_3C01E6362055804A (expenses_id), PRIMARY KEY(company_id, expenses_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE company_gain (company_id INT NOT NULL, gain_id INT NOT NULL, INDEX IDX_93F837EE979B1AD6 (company_id), INDEX IDX_93F837EEC60EF8C4 (gain_id), PRIMARY KEY(company_id, gain_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE expenses_company (expenses_id INT NOT NULL, company_id INT NOT NULL, INDEX IDX_99535B7C2055804A (expenses_id), INDEX IDX_99535B7C979B1AD6 (company_id), PRIMARY KEY(expenses_id, company_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE gain_company (gain_id INT NOT NULL, company_id INT NOT NULL, INDEX IDX_51C348C7C60EF8C4 (gain_id), INDEX IDX_51C348C7979B1AD6 (company_id), PRIMARY KEY(gain_id, company_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE company_expenses ADD CONSTRAINT FK_3C01E6362055804A FOREIGN KEY (expenses_id) REFERENCES expenses (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE company_expenses ADD CONSTRAINT FK_3C01E636979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE company_gain ADD CONSTRAINT FK_93F837EE979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE company_gain ADD CONSTRAINT FK_93F837EEC60EF8C4 FOREIGN KEY (gain_id) REFERENCES gain (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE expenses_company ADD CONSTRAINT FK_99535B7C2055804A FOREIGN KEY (expenses_id) REFERENCES expenses (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE expenses_company ADD CONSTRAINT FK_99535B7C979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE gain_company ADD CONSTRAINT FK_51C348C7979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE gain_company ADD CONSTRAINT FK_51C348C7C60EF8C4 FOREIGN KEY (gain_id) REFERENCES gain (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE AcountBank CHANGE name name VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, CHANGE balance balance VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, CHANGE logo_bank logo_bank VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`');
        $this->addSql('ALTER TABLE Company CHANGE name name VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, CHANGE cnpj cnpj VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, CHANGE logo_comapany logo_comapany VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`');
        $this->addSql('ALTER TABLE CreditCard CHANGE name name VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, CHANGE `limit` `limit` VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`');
        $this->addSql('ALTER TABLE Expenses DROP FOREIGN KEY FK_DDE0910DB5C5EE32');
        $this->addSql('DROP INDEX UNIQ_DDE0910DB5C5EE32 ON Expenses');
        $this->addSql('ALTER TABLE Expenses DROP comapany_id, CHANGE name name VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, CHANGE value_expenses value_expenses VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, CHANGE month month VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, CHANGE type_expenses type_expenses VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, CHANGE taxCoupon taxCoupon VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, CHANGE payment_debit payment_debit VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, CHANGE payment_credit payment_credit VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`');
        $this->addSql('ALTER TABLE Gain DROP FOREIGN KEY FK_70A7823E979B1AD6');
        $this->addSql('ALTER TABLE Gain DROP FOREIGN KEY FK_70A7823EC420CF8F');
        $this->addSql('DROP INDEX IDX_70A7823E979B1AD6 ON Gain');
        $this->addSql('DROP INDEX IDX_70A7823EC420CF8F ON Gain');
        $this->addSql('ALTER TABLE Gain ADD deposit_bank VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, DROP company_id, DROP acount_bank_id, CHANGE value_gain value_gain VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, CHANGE type_gain type_gain VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, CHANGE receipt_gain receipt_gain VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`');
        $this->addSql('ALTER TABLE User CHANGE name name VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, CHANGE email email VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, CHANGE pass pass VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`');
    }
}
