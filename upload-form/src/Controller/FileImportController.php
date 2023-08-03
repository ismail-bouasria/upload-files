<?php

namespace App\Controller;

use App\Form\FileImportType;
use App\Repository\FileUpRepository;
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
        $message = 'Le fichier a été importé avec succès !';

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $form->get('file')->getData();

            // Pass the file to the FileImportService service for processing
           $fileImporterService->importFile($file);

            if (!$file) {
                $message = 'Une erreur s\'est produite lors de l\'import du fichier.';
                return $this->redirectToRoute('file_import/index.html.twig', [
                    'message' => $message,
                ]);
            }
        }
        return $this->render('file_import/index.html.twig', [
            'form' => $form->createView(),
            'message' => $message
        ]);
    }

    /**
     * @Route("/files", name="files", methods={"GET"})
     */
    public function filesListe(FileUpRepository $fileUpRepository)
    {
        $files = $fileUpRepository->findAll();

        return $this->render('file_import/files.html.twig', [
            'files' => $files,
        ]);
    }

    /**
     * @Route("/file-infos/{id}", name="files_infos", methods={"GET"})
     */
    public function filesInfos(FileUpRepository $fileUpRepository, $id)
    {
        $readFile = $fileUpRepository->find($id);





        return $this->render('file_import/infos.html.twig', [
        ]);

    }

}
