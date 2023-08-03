<?php

namespace App\Entity;

use App\Repository\FileUpRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FileUpRepository::class)]
class FileUp
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $compte_affaire = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $compte_evenement = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $compte_dernier_evenement = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $numero_fiche = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $libelle_civilite = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $proprietaire_actuel_vehicule = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Nnumero_nom_voie = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $complement_adresse = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $code_postal = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ville = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $telephone_domicile = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $telephone_portable = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $telephone_job = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_circulation = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_achat = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_dernier_evenement = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $libelle_marque = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $libelle_modele = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $version = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $vin = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $immatriculation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $type_prospect = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $kilometrage = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $libelle_energie = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $vendeur_vn = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $vendeur_vo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $facturation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $type_vn_vo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $numero_dossier = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $intermediaire_vente = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_veh = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $origine_evenement = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompteAffaire(): ?string
    {
        return $this->compte_affaire;
    }

    public function setCompteAffaire(?string $compte_affaire): static
    {
        $this->compte_affaire = $compte_affaire;

        return $this;
    }

    public function getCompteEvenement(): ?string
    {
        return $this->compte_evenement;
    }

    public function setCompteEvenement(?string $compte_evenement): static
    {
        $this->compte_evenement = $compte_evenement;

        return $this;
    }

    public function getCompteDernierEvenement(): ?string
    {
        return $this->compte_dernier_evenement;
    }

    public function setCompteDernierEvenement(?string $compte_dernier_evenement): static
    {
        $this->compte_dernier_evenement = $compte_dernier_evenement;

        return $this;
    }

    public function getNumeroFiche(): ?string
    {
        return $this->numero_fiche;
    }

    public function setNumeroFiche(?string $numero_fiche): static
    {
        $this->numero_fiche = $numero_fiche;

        return $this;
    }

    public function getLibelleCivilite(): ?string
    {
        return $this->libelle_civilite;
    }

    public function setLibelleCivilite(?string $libelle_civilite): static
    {
        $this->libelle_civilite = $libelle_civilite;

        return $this;
    }

    public function getProprietaireActuelVehicule(): ?string
    {
        return $this->proprietaire_actuel_vehicule;
    }

    public function setProprietaireActuelVehicule(?string $proprietaire_actuel_vehicule): static
    {
        $this->proprietaire_actuel_vehicule = $proprietaire_actuel_vehicule;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNnumeroNomVoie(): ?string
    {
        return $this->Nnumero_nom_voie;
    }

    public function setNnumeroNomVoie(?string $Nnumero_nom_voie): static
    {
        $this->Nnumero_nom_voie = $Nnumero_nom_voie;

        return $this;
    }

    public function getComplementAdresse(): ?string
    {
        return $this->complement_adresse;
    }

    public function setComplementAdresse(?string $complement_adresse): static
    {
        $this->complement_adresse = $complement_adresse;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->code_postal;
    }

    public function setCodePostal(?string $code_postal): static
    {
        $this->code_postal = $code_postal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getTelephoneDomicile(): ?string
    {
        return $this->telephone_domicile;
    }

    public function setTelephoneDomicile(?string $telephone_domicile): static
    {
        $this->telephone_domicile = $telephone_domicile;

        return $this;
    }

    public function getTelephonePortable(): ?string
    {
        return $this->telephone_portable;
    }

    public function setTelephonePortable(?string $telephone_portable): static
    {
        $this->telephone_portable = $telephone_portable;

        return $this;
    }

    public function getTelephoneJob(): ?string
    {
        return $this->telephone_job;
    }

    public function setTelephoneJob(?string $telephone_job): static
    {
        $this->telephone_job = $telephone_job;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getDateCirculation(): ?\DateTimeInterface
    {
        return $this->date_circulation;
    }

    public function setDateCirculation(?\DateTimeInterface $date_circulation): static
    {
        $this->date_circulation = $date_circulation;

        return $this;
    }

    public function getDateAchat(): ?\DateTimeInterface
    {
        return $this->date_achat;
    }

    public function setDateAchat(?\DateTimeInterface $date_achat): static
    {
        $this->date_achat = $date_achat;

        return $this;
    }

    public function getDateDernierEvenement(): ?\DateTimeInterface
    {
        return $this->date_dernier_evenement;
    }

    public function setDateDernierEvenement(?\DateTimeInterface $date_dernier_evenement): static
    {
        $this->date_dernier_evenement = $date_dernier_evenement;

        return $this;
    }

    public function getLibelleMarque(): ?string
    {
        return $this->libelle_marque;
    }

    public function setLibelleMarque(?string $libelle_marque): static
    {
        $this->libelle_marque = $libelle_marque;

        return $this;
    }

    public function getLibelleModele(): ?string
    {
        return $this->libelle_modele;
    }

    public function setLibelleModele(?string $libelle_modele): static
    {
        $this->libelle_modele = $libelle_modele;

        return $this;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(?string $version): static
    {
        $this->version = $version;

        return $this;
    }

    public function getVin(): ?string
    {
        return $this->vin;
    }

    public function setVin(?string $vin): static
    {
        $this->vin = $vin;

        return $this;
    }

    public function getImmatriculation(): ?string
    {
        return $this->immatriculation;
    }

    public function setImmatriculation(?string $immatriculation): static
    {
        $this->immatriculation = $immatriculation;

        return $this;
    }

    public function getTypeProspect(): ?string
    {
        return $this->type_prospect;
    }

    public function setTypeProspect(?string $type_prospect): static
    {
        $this->type_prospect = $type_prospect;

        return $this;
    }

    public function getKilometrage(): ?string
    {
        return $this->kilometrage;
    }

    public function setKilometrage(?string $kilometrage): static
    {
        $this->kilometrage = $kilometrage;

        return $this;
    }

    public function getLibelleEnergie(): ?string
    {
        return $this->libelle_energie;
    }

    public function setLibelleEnergie(?string $libelle_energie): static
    {
        $this->libelle_energie = $libelle_energie;

        return $this;
    }

    public function getVendeurVn(): ?string
    {
        return $this->vendeur_vn;
    }

    public function setVendeurVn(?string $vendeur_vn): static
    {
        $this->vendeur_vn = $vendeur_vn;

        return $this;
    }

    public function getVendeurVo(): ?string
    {
        return $this->vendeur_vo;
    }

    public function setVendeurVo(?string $vendeur_vo): static
    {
        $this->vendeur_vo = $vendeur_vo;

        return $this;
    }

    public function getFacturation(): ?string
    {
        return $this->facturation;
    }

    public function setFacturation(?string $facturation): static
    {
        $this->facturation = $facturation;

        return $this;
    }

    public function getTypeVnVo(): ?string
    {
        return $this->type_vn_vo;
    }

    public function setTypeVnVo(?string $type_vn_vo): static
    {
        $this->type_vn_vo = $type_vn_vo;

        return $this;
    }

    public function getNumeroDossier(): ?string
    {
        return $this->numero_dossier;
    }

    public function setNumeroDossier(?string $numero_dossier): static
    {
        $this->numero_dossier = $numero_dossier;

        return $this;
    }

    public function getIntermediaireVente(): ?string
    {
        return $this->intermediaire_vente;
    }

    public function setIntermediaireVente(?string $intermediaire_vente): static
    {
        $this->intermediaire_vente = $intermediaire_vente;

        return $this;
    }

    public function getDateVeh(): ?\DateTimeInterface
    {
        return $this->date_veh;
    }

    public function setDateVeh(?\DateTimeInterface $date_veh): static
    {
        $this->date_veh = $date_veh;

        return $this;
    }

    public function getOrigineEvenement(): ?string
    {
        return $this->origine_evenement;
    }

    public function setOrigineEvenement(?string $origine_evenement): static
    {
        $this->origine_evenement = $origine_evenement;

        return $this;
    }
}
