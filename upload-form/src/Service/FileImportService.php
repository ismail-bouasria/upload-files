<?php


namespace App\Service;

use PhpOffice\PhpSpreadsheet\IOFactory;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileImportService
{

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
             dd($data);

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}

