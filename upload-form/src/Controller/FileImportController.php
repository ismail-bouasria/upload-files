<?php

// src/Controller/FileImportController.php
namespace App\Controller;

use App\Form\FileImportType;
use App\Service\FileImporter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FileImportController extends AbstractController
{
    /**
     * @Route("/import", name="file_import")
     */
    public function import(Request $request, FileImporter $fileImporter): Response
    {
        $form = $this->createForm(FileImportType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $form->get('file')->getData();
            // Pass the file to the FileImporter service for processing
            $success = $fileImporter->importFile($file);

            if ($success) {
                $this->addFlash('success', 'Le fichier a été importé avec succès !');
            } else {
                $this->addFlash('error', 'Une erreur s\'est produite lors de l\'import du fichier.');
            }
        }

        return $this->render('file_import/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
