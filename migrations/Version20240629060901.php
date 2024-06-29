<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240629060901 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE santes ADD CONSTRAINT FK_C1A17FE9A6CC7B2 FOREIGN KEY (eleve_id) REFERENCES eleves (id)');
        $this->addSql('ALTER TABLE santes ADD CONSTRAINT FK_C1A17FE9B03A8386 FOREIGN KEY (created_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE santes ADD CONSTRAINT FK_C1A17FE9896DBBDE FOREIGN KEY (updated_by_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_C1A17FE9A6CC7B2 ON santes (eleve_id)');
        $this->addSql('CREATE INDEX IDX_C1A17FE9B03A8386 ON santes (created_by_id)');
        $this->addSql('CREATE INDEX IDX_C1A17FE9896DBBDE ON santes (updated_by_id)');
        $this->addSql('ALTER TABLE scolarites1 ADD niveau_id INT NOT NULL, ADD scolarite INT NOT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE scolarites1 ADD CONSTRAINT FK_328D2B44B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveaux (id)');
        $this->addSql('CREATE INDEX IDX_328D2B44B3E9C81 ON scolarites1 (niveau_id)');
        $this->addSql('ALTER TABLE scolarites2 ADD scolarite1_id INT NOT NULL, ADD niveau_id INT NOT NULL, ADD scolarite INT NOT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE scolarites2 ADD CONSTRAINT FK_AB847AFEF4C45000 FOREIGN KEY (scolarite1_id) REFERENCES scolarites1 (id)');
        $this->addSql('ALTER TABLE scolarites2 ADD CONSTRAINT FK_AB847AFEB3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveaux (id)');
        $this->addSql('CREATE INDEX IDX_AB847AFEF4C45000 ON scolarites2 (scolarite1_id)');
        $this->addSql('CREATE INDEX IDX_AB847AFEB3E9C81 ON scolarites2 (niveau_id)');
        $this->addSql('ALTER TABLE scolarites3 ADD niveau_id INT NOT NULL, ADD scolarite INT NOT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE scolarites3 ADD CONSTRAINT FK_DC834A68B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveaux (id)');
        $this->addSql('CREATE INDEX IDX_DC834A68B3E9C81 ON scolarites3 (niveau_id)');
        $this->addSql('ALTER TABLE statuts ADD niveau_id INT NOT NULL, ADD created_by_id INT DEFAULT NULL, ADD updated_by_id INT DEFAULT NULL, ADD designation VARCHAR(150) NOT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD slug VARCHAR(128) NOT NULL');
        $this->addSql('ALTER TABLE statuts ADD CONSTRAINT FK_403505E6B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveaux (id)');
        $this->addSql('ALTER TABLE statuts ADD CONSTRAINT FK_403505E6B03A8386 FOREIGN KEY (created_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE statuts ADD CONSTRAINT FK_403505E6896DBBDE FOREIGN KEY (updated_by_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_403505E6B3E9C81 ON statuts (niveau_id)');
        $this->addSql('CREATE INDEX IDX_403505E6B03A8386 ON statuts (created_by_id)');
        $this->addSql('CREATE INDEX IDX_403505E6896DBBDE ON statuts (updated_by_id)');
        $this->addSql('ALTER TABLE telephones ADD created_by_id INT DEFAULT NULL, ADD updated_by_id INT DEFAULT NULL, ADD numero VARCHAR(25) NOT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD slug VARCHAR(128) NOT NULL');
        $this->addSql('ALTER TABLE telephones ADD CONSTRAINT FK_6FCD09FB03A8386 FOREIGN KEY (created_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE telephones ADD CONSTRAINT FK_6FCD09F896DBBDE FOREIGN KEY (updated_by_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_6FCD09FB03A8386 ON telephones (created_by_id)');
        $this->addSql('CREATE INDEX IDX_6FCD09F896DBBDE ON telephones (updated_by_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE santes DROP FOREIGN KEY FK_C1A17FE9A6CC7B2');
        $this->addSql('ALTER TABLE santes DROP FOREIGN KEY FK_C1A17FE9B03A8386');
        $this->addSql('ALTER TABLE santes DROP FOREIGN KEY FK_C1A17FE9896DBBDE');
        $this->addSql('DROP INDEX IDX_C1A17FE9A6CC7B2 ON santes');
        $this->addSql('DROP INDEX IDX_C1A17FE9B03A8386 ON santes');
        $this->addSql('DROP INDEX IDX_C1A17FE9896DBBDE ON santes');
        $this->addSql('ALTER TABLE scolarites1 DROP FOREIGN KEY FK_328D2B44B3E9C81');
        $this->addSql('DROP INDEX IDX_328D2B44B3E9C81 ON scolarites1');
        $this->addSql('ALTER TABLE scolarites1 DROP niveau_id, DROP scolarite, DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE scolarites2 DROP FOREIGN KEY FK_AB847AFEF4C45000');
        $this->addSql('ALTER TABLE scolarites2 DROP FOREIGN KEY FK_AB847AFEB3E9C81');
        $this->addSql('DROP INDEX IDX_AB847AFEF4C45000 ON scolarites2');
        $this->addSql('DROP INDEX IDX_AB847AFEB3E9C81 ON scolarites2');
        $this->addSql('ALTER TABLE scolarites2 DROP scolarite1_id, DROP niveau_id, DROP scolarite, DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE scolarites3 DROP FOREIGN KEY FK_DC834A68B3E9C81');
        $this->addSql('DROP INDEX IDX_DC834A68B3E9C81 ON scolarites3');
        $this->addSql('ALTER TABLE scolarites3 DROP niveau_id, DROP scolarite, DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE statuts DROP FOREIGN KEY FK_403505E6B3E9C81');
        $this->addSql('ALTER TABLE statuts DROP FOREIGN KEY FK_403505E6B03A8386');
        $this->addSql('ALTER TABLE statuts DROP FOREIGN KEY FK_403505E6896DBBDE');
        $this->addSql('DROP INDEX IDX_403505E6B3E9C81 ON statuts');
        $this->addSql('DROP INDEX IDX_403505E6B03A8386 ON statuts');
        $this->addSql('DROP INDEX IDX_403505E6896DBBDE ON statuts');
        $this->addSql('ALTER TABLE statuts DROP niveau_id, DROP created_by_id, DROP updated_by_id, DROP designation, DROP created_at, DROP updated_at, DROP slug');
        $this->addSql('ALTER TABLE telephones DROP FOREIGN KEY FK_6FCD09FB03A8386');
        $this->addSql('ALTER TABLE telephones DROP FOREIGN KEY FK_6FCD09F896DBBDE');
        $this->addSql('DROP INDEX IDX_6FCD09FB03A8386 ON telephones');
        $this->addSql('DROP INDEX IDX_6FCD09F896DBBDE ON telephones');
        $this->addSql('ALTER TABLE telephones DROP created_by_id, DROP updated_by_id, DROP numero, DROP created_at, DROP updated_at, DROP slug');
    }
}
