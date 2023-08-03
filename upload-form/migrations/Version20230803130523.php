<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230803130523 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE file_up ADD compte_affaire VARCHAR(255) DEFAULT NULL, ADD compte_evenement VARCHAR(255) DEFAULT NULL, ADD compte_dernier_evenement VARCHAR(255) DEFAULT NULL, ADD numero_fiche VARCHAR(255) DEFAULT NULL, ADD libelle_civilite VARCHAR(255) DEFAULT NULL, ADD proprietaire_actuel_vehicule VARCHAR(255) DEFAULT NULL, ADD nom VARCHAR(255) DEFAULT NULL, ADD prenom VARCHAR(255) DEFAULT NULL, ADD nnumero_nom_voie VARCHAR(255) DEFAULT NULL, ADD complement_adresse VARCHAR(255) DEFAULT NULL, ADD code_postal VARCHAR(255) DEFAULT NULL, ADD ville VARCHAR(255) DEFAULT NULL, ADD telephone_domicile VARCHAR(255) DEFAULT NULL, ADD telephone_portable VARCHAR(255) DEFAULT NULL, ADD telephone_job VARCHAR(255) DEFAULT NULL, ADD email VARCHAR(255) DEFAULT NULL, ADD date_circulation DATE DEFAULT NULL, ADD date_achat DATE DEFAULT NULL, ADD date_dernier_evenement DATE DEFAULT NULL, ADD libelle_marque VARCHAR(255) DEFAULT NULL, ADD libelle_modele VARCHAR(255) DEFAULT NULL, ADD version VARCHAR(255) DEFAULT NULL, ADD vin VARCHAR(255) DEFAULT NULL, ADD immatriculation VARCHAR(255) DEFAULT NULL, ADD type_prospect VARCHAR(255) DEFAULT NULL, ADD kilometrage VARCHAR(255) DEFAULT NULL, ADD libelle_energie VARCHAR(255) DEFAULT NULL, ADD vendeur_vn VARCHAR(255) DEFAULT NULL, ADD vendeur_vo VARCHAR(255) DEFAULT NULL, ADD facturation VARCHAR(255) DEFAULT NULL, ADD type_vn_vo VARCHAR(255) DEFAULT NULL, ADD numero_dossier VARCHAR(255) DEFAULT NULL, ADD intermediaire_vente VARCHAR(255) DEFAULT NULL, ADD date_veh DATE DEFAULT NULL, ADD origine_evenement VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE file_up DROP compte_affaire, DROP compte_evenement, DROP compte_dernier_evenement, DROP numero_fiche, DROP libelle_civilite, DROP proprietaire_actuel_vehicule, DROP nom, DROP prenom, DROP nnumero_nom_voie, DROP complement_adresse, DROP code_postal, DROP ville, DROP telephone_domicile, DROP telephone_portable, DROP telephone_job, DROP email, DROP date_circulation, DROP date_achat, DROP date_dernier_evenement, DROP libelle_marque, DROP libelle_modele, DROP version, DROP vin, DROP immatriculation, DROP type_prospect, DROP kilometrage, DROP libelle_energie, DROP vendeur_vn, DROP vendeur_vo, DROP facturation, DROP type_vn_vo, DROP numero_dossier, DROP intermediaire_vente, DROP date_veh, DROP origine_evenement');
    }
}
