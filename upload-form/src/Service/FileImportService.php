<?php


namespace App\Service;

use App\Entity\FileUp;
use App\Repository\FileUpRepository;
use Doctrine\ORM\EntityManagerInterface;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Symfony\Component\HttpFoundation\File\UploadedFile;
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

    public function __construct(FileUpRepository $fileUpRepository,EntityManagerInterface $entityManager){
        $this->fileUpRepository = $fileUpRepository;
        $this->entityManager = $entityManager;
    }


    public function importFile(UploadedFile $file)

    {
        // Load the Excel file
        $spreadsheet = IOFactory::load($file);

        $sheet = $spreadsheet->getActiveSheet();
        $data = [];

        foreach ($sheet->getRowIterator() as $row) {

            $rowData = [];
            foreach ($row->getCellIterator() as $cell) {
                $rowData[] = $cell->getValue();
            }

            $data[] = $rowData;

        }

       $length = count($data);

        for ($i = 1; $i < $length; $i++) {

            $dataFile = new FileUp();
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
                     ->setDateCirculation( null)
                     ->setDateAchat(null)
                     ->setDateDernierEvenement(null)
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
                     ->setDateVeh(null)
                     ->setOrigineEvenement($data[$i][34]);

            // Persist and flush the entity to save it in the database
            $this->entityManager->persist($dataFile);
            $this->entityManager->flush();
        }


    }

}

