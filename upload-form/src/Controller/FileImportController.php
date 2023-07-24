<?php

// src/Controller/FileImportController.php
namespace App\Controller;

use App\Form\FileImportType;
use App\Service\FileImportService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FileImportController extends AbstractController
{
    /**
     * @Route("/", name="file_import")
     */
    public function import(Request $request, FileImportService $fileImporterService): Response
    {
        $form = $this->createForm(FileImportType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $form->get('data')->getData();
            // Pass the file to the FileImportService service for processing
            $success = $fileImporterService->importFile($file);
dd($success);
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
