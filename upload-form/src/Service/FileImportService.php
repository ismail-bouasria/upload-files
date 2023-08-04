<?php


namespace App\Service;

use App\Entity\FileUp;
use App\Repository\FileUpRepository;
use Doctrine\ORM\EntityManagerInterface;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use DateTime;

class FileImportService
{
    /**
     * @var FileUpRepository
     */
    private $fileUpRepository;
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(FileUpRepository $fileUpRepository, EntityManagerInterface $entityManager)
    {
        $this->fileUpRepository = $fileUpRepository;
        $this->entityManager = $entityManager;
    }


    public function importData($data)

    {
        $length = count($data);

        for ($i = 1; $i < $length; $i++) {

            $dataFile = new FileUp();

            // Convertir le nombre de série Excel en objet DateTime
             $dateCirculation = Date::excelToDateTimeObject($data[$i][16]);
             $dateAchat = Date::excelToDateTimeObject($data[$i][17]);
             $dateDernierEvent = Date::excelToDateTimeObject($data[$i][18]);
             $dateVeh = Date::excelToDateTimeObject($data[$i][33]);

            // Formater les dates selon le format "Y-m-d"
            $formattedDateCirculation = $dateCirculation->format('Y-m-d');
            $formattedDateAchat = $dateAchat->format('Y-m-d');
            $formattedDateDernierEvent = $dateDernierEvent->format('Y-m-d');
            $formattedDateVeh = $dateVeh->format('Y-m-d');

            $dataFile->setCompteAffaire($data[$i][0])
                ->setCompteEvenement($data[$i][1])
                ->setCompteDernierEvenement($data[$i][2])
                ->setNumeroFiche($data[$i][3])
                ->setLibelleCivilite($data[$i][4])
                ->setProprietaireActuelVehicule($data[$i][5])
                ->setNom($data[$i][6])
                ->setPrenom($data[$i][7])
                ->setNnumeroNomVoie($data[$i][8])
                ->setComplementAdresse($data[$i][9])
                ->setCodePostal($data[$i][10])
                ->setVille($data[$i][11])
                ->setTelephoneDomicile($data[$i][12])
                ->setTelephonePortable($data[$i][13])
                ->setTelephoneJob($data[$i][14])
                ->setEmail($data[$i][15])
                ->setDateCirculation(new DateTime($formattedDateCirculation))
                ->setDateAchat(new DateTime($formattedDateAchat))
                ->setDateDernierEvenement(new DateTime($formattedDateDernierEvent))
                ->setLibelleMarque($data[$i][19])
                ->setLibelleModele($data[$i][20])
                ->setVersion($data[$i][21])
                ->setVin($data[$i][22])
                ->setImmatriculation($data[$i][23])
                ->setTypeProspect($data[$i][24])
                ->setKilometrage($data[$i][25])
                ->setLibelleEnergie($data[$i][26])
                ->setVendeurVn($data[$i][27])
                ->setVendeurVo($data[$i][28])
                ->setFacturation($data[$i][29])
                ->setTypeVnVo($data[$i][30])
                ->setNumeroDossier($data[$i][31])
                ->setIntermediaireVente($data[$i][32])
                ->setDateVeh(new DateTime($formattedDateVeh))
                ->setOrigineEvenement($data[$i][34]);

            // Persist and flush the entity to save it in the database
            $this->entityManager->persist($dataFile);
            $this->entityManager->flush();

        }
    }
}

