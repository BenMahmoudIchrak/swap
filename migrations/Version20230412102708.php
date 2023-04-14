<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230412102708 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE affectation DROP FOREIGN KEY fk_id_commande');
        $this->addSql('ALTER TABLE affectation DROP FOREIGN KEY fk_id_produit');
        $this->addSql('DROP INDEX fk_id_commande ON affectation');
        $this->addSql('DROP INDEX fk_id_produit ON affectation');
        $this->addSql('ALTER TABLE affectation DROP fk_id_produit, DROP fk_id_commande');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY commande_ibfk_1');
        $this->addSql('DROP INDEX fk_id_livraison ON commande');
        $this->addSql('ALTER TABLE commande DROP fk_id_livraison, DROP nbr_produit');
        $this->addSql('ALTER TABLE feedback DROP FOREIGN KEY feedback_ibfk_1');
        $this->addSql('ALTER TABLE feedback DROP FOREIGN KEY fk_id_userP');
        $this->addSql('DROP INDEX fk_id_produit ON feedback');
        $this->addSql('DROP INDEX fk_id_userP ON feedback');
        $this->addSql('ALTER TABLE feedback DROP fk_id_produit, DROP favorisP, DROP fk_id_userP');
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY fk_id_livreur');
        $this->addSql('DROP INDEX fk_id_livreur ON livraison');
        $this->addSql('ALTER TABLE livraison DROP fk_id_livreur, DROP date_livraison');
        $this->addSql('ALTER TABLE pointderelais DROP FOREIGN KEY pointderelais_ibfk_1');
        $this->addSql('DROP INDEX fk_id_livraisonp ON pointderelais');
        $this->addSql('ALTER TABLE pointderelais DROP fk_id_livraisonp, DROP region, DROP horaire');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE6064048D9D2B1');
        $this->addSql('DROP INDEX IDX_CE6064048D9D2B1 ON reclamation');
        $this->addSql('ALTER TABLE reclamation CHANGE fk_id_utilisateur fk_id_utilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE6064048D9D2B1 FOREIGN KEY (fk_id_utilisateur_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_CE6064048D9D2B1 ON reclamation (fk_id_utilisateur_id)');
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY FK_5FB6DEC75D06C2B1');
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY FK_5FB6DEC7A37C401A');
        $this->addSql('DROP INDEX IDX_5FB6DEC75D06C2B1 ON reponse');
        $this->addSql('DROP INDEX IDX_5FB6DEC7A37C401A ON reponse');
        $this->addSql('ALTER TABLE reponse DROP fk_id_admin, DROP fk_id_reclamation');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE affectation ADD fk_id_produit INT NOT NULL, ADD fk_id_commande INT NOT NULL');
        $this->addSql('ALTER TABLE affectation ADD CONSTRAINT fk_id_commande FOREIGN KEY (fk_id_commande) REFERENCES commande (id_commande)');
        $this->addSql('ALTER TABLE affectation ADD CONSTRAINT fk_id_produit FOREIGN KEY (fk_id_produit) REFERENCES produit (id_produit)');
        $this->addSql('CREATE INDEX fk_id_commande ON affectation (fk_id_commande)');
        $this->addSql('CREATE INDEX fk_id_produit ON affectation (fk_id_produit)');
        $this->addSql('ALTER TABLE commande ADD fk_id_livraison INT NOT NULL, ADD nbr_produit INT NOT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT commande_ibfk_1 FOREIGN KEY (fk_id_livraison) REFERENCES livraison (id_livraison)');
        $this->addSql('CREATE INDEX fk_id_livraison ON commande (fk_id_livraison)');
        $this->addSql('ALTER TABLE feedback ADD fk_id_produit INT NOT NULL, ADD favorisP TINYINT(1) NOT NULL, ADD fk_id_userP INT NOT NULL');
        $this->addSql('ALTER TABLE feedback ADD CONSTRAINT feedback_ibfk_1 FOREIGN KEY (fk_id_produit) REFERENCES produit (id_produit)');
        $this->addSql('ALTER TABLE feedback ADD CONSTRAINT fk_id_userP FOREIGN KEY (fk_id_userP) REFERENCES user (id)');
        $this->addSql('CREATE INDEX fk_id_produit ON feedback (fk_id_produit)');
        $this->addSql('CREATE INDEX fk_id_userP ON feedback (fk_id_userP)');
        $this->addSql('ALTER TABLE livraison ADD fk_id_livreur INT NOT NULL, ADD date_livraison DATE NOT NULL');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT fk_id_livreur FOREIGN KEY (fk_id_livreur) REFERENCES user (id)');
        $this->addSql('CREATE INDEX fk_id_livreur ON livraison (fk_id_livreur)');
        $this->addSql('ALTER TABLE pointderelais ADD fk_id_livraisonp INT NOT NULL, ADD region VARCHAR(255) NOT NULL, ADD horaire INT NOT NULL');
        $this->addSql('ALTER TABLE pointderelais ADD CONSTRAINT pointderelais_ibfk_1 FOREIGN KEY (fk_id_livraisonp) REFERENCES livraison (id_livraison)');
        $this->addSql('CREATE INDEX fk_id_livraisonp ON pointderelais (fk_id_livraisonp)');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE6064048D9D2B1');
        $this->addSql('DROP INDEX IDX_CE6064048D9D2B1 ON reclamation');
        $this->addSql('ALTER TABLE reclamation CHANGE fk_id_utilisateur_id fk_id_utilisateur INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE6064048D9D2B1 FOREIGN KEY (fk_id_utilisateur) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_CE6064048D9D2B1 ON reclamation (fk_id_utilisateur)');
        $this->addSql('ALTER TABLE reponse ADD fk_id_admin INT DEFAULT NULL, ADD fk_id_reclamation INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_5FB6DEC75D06C2B1 FOREIGN KEY (fk_id_admin) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_5FB6DEC7A37C401A FOREIGN KEY (fk_id_reclamation) REFERENCES reclamation (id_rec)');
        $this->addSql('CREATE INDEX IDX_5FB6DEC75D06C2B1 ON reponse (fk_id_admin)');
        $this->addSql('CREATE INDEX IDX_5FB6DEC7A37C401A ON reponse (fk_id_reclamation)');
    }
}
