<?php


namespace App\Service;

use App\Entity\FileUp;
use App\Repository\FileUpRepository;
use Doctrine\ORM\EntityManagerInterface;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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
    

    public function importFile(UploadedFile $file): bool
    {
        try {

            // Load the Excel file
            $spreadsheet = IOFactory::load($file);

            $data = [];
            foreach ($spreadsheet->getWorksheetIterator() as $worksheet) {
                $worksheetTitle = $worksheet->getTitle();
                $data[$worksheetTitle] = [
                    'columnNames' => [],
                    'columnValues' => [],
                ];
                foreach ($worksheet->getRowIterator() as $row) {
                    $rowIndex = $row->getRowIndex();
                    if ($rowIndex) {
                        $data[$worksheetTitle]['columnValues'][$rowIndex] = [];
                    }
                    $cellIterator = $row->getCellIterator();
                    $cellIterator->setIterateOnlyExistingCells(true); // Loop over all cells, even if it is not set
                    foreach ($cellIterator as $cell) {
                        if ($rowIndex === 1) {
                            $data[$worksheetTitle]['columnNames'][] = $cell->getCalculatedValue();
                        }
                        if ($rowIndex > 2) {
                            $data[$worksheetTitle]['columnValues'][$rowIndex][] = $cell->getCalculatedValue();
                        }
                    }
                }
            }
            // instance of entity
            $dataFile = new FileUp();
            $dataFile->setData($data);
            // Persist the entity
            $this->entityManager->persist($dataFile);

            // Flush all the changes to the database
            $this->entityManager->flush();

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

}

