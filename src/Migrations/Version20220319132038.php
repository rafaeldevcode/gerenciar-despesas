<?php

declare(strict_types=1);

namespace Manage\Expenses\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220319132038 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE AcountBank (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, balance VARCHAR(255) NOT NULL, INDEX IDX_273D136FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE CreditCard (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, `limit` VARCHAR(255) NOT NULL, INDEX IDX_1B6B09C3A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE AcountBank ADD CONSTRAINT FK_273D136FA76ED395 FOREIGN KEY (user_id) REFERENCES User (id)');
        $this->addSql('ALTER TABLE CreditCard ADD CONSTRAINT FK_1B6B09C3A76ED395 FOREIGN KEY (user_id) REFERENCES User (id)');
        $this->addSql('ALTER TABLE expenses ADD credit_card_id INT DEFAULT NULL, ADD acount_bank_id INT DEFAULT NULL, ADD payment_debit VARCHAR(255) NOT NULL, ADD payment_credit VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE expenses ADD CONSTRAINT FK_DDE0910D7048FD0F FOREIGN KEY (credit_card_id) REFERENCES CreditCard (id)');
        $this->addSql('ALTER TABLE expenses ADD CONSTRAINT FK_DDE0910DC420CF8F FOREIGN KEY (acount_bank_id) REFERENCES AcountBank (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DDE0910D7048FD0F ON expenses (credit_card_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DDE0910DC420CF8F ON expenses (acount_bank_id)');
        $this->addSql('ALTER TABLE gain ADD deposit_bank VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE Expenses DROP FOREIGN KEY FK_DDE0910DC420CF8F');
        $this->addSql('ALTER TABLE Expenses DROP FOREIGN KEY FK_DDE0910D7048FD0F');
        $this->addSql('DROP TABLE AcountBank');
        $this->addSql('DROP TABLE CreditCard');
        $this->addSql('ALTER TABLE Company CHANGE name name VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, CHANGE cnpj cnpj VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, CHANGE logo_comapany logo_comapany VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`');
        $this->addSql('DROP INDEX UNIQ_DDE0910D7048FD0F ON Expenses');
        $this->addSql('DROP INDEX UNIQ_DDE0910DC420CF8F ON Expenses');
        $this->addSql('ALTER TABLE Expenses DROP credit_card_id, DROP acount_bank_id, DROP payment_debit, DROP payment_credit, CHANGE name name VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, CHANGE value_expenses value_expenses VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, CHANGE month month VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, CHANGE type_expenses type_expenses VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, CHANGE taxCoupon taxCoupon VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`');
        $this->addSql('ALTER TABLE Gain DROP deposit_bank, CHANGE value_gain value_gain VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, CHANGE type_gain type_gain VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, CHANGE receipt_gain receipt_gain VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`');
        $this->addSql('ALTER TABLE User CHANGE name name VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, CHANGE email email VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, CHANGE pass pass VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`');
    }
}
