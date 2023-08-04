<?php

namespace App\Controller;

use App\Form\FileImportType;
use App\Repository\FileUpRepository;
use App\Service\FileImportService;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
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
            $file = $form->get('file')->getData();

            // télécharger le fichier xlsx
            $spreadsheet = IOFactory::load($file);
            $cellValue = $spreadsheet->getActiveSheet()->getCell('A1')->getValue();

            if ($cellValue != "Compte Affaire") {
                $message = "Erreur lors de l'importation du fichier";
                $this->addFlash('error', $message);

                return $this->render('file_import/index.html.twig', [
                    'form' => $form->createView(),
                ]);
            }

            $sheet = $spreadsheet->getActiveSheet();
            $data = [];

            foreach ($sheet->getRowIterator() as $row) {

                $rowData = [];
                foreach ($row->getCellIterator() as $cell) {
                    $rowData[] = $cell->getValue();
                }
                $data[] = $rowData;
            }

            // Save the data in Database
            $fileImporterService->importData($data);
                $this->addFlash('success', 'Fichier importé!');

        }
        return $this->render('file_import/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/files", name="files", methods={"GET"})
     */
    public function files()
    {


        return $this->render('file_import/files.html.twig', [

        ]);
    }

    /**
     * @Route("/files-infos.json", name="files_infos", methods={"GET"})
     */
    public function filesDataAjax(FileUpRepository $fileUpRepository)
    {
        $users = $fileUpRepository->findAll();
        $data = [];

        foreach ($users as $user) {

            $data[] = [
                'compteAffaire' => $user->getCompteAffaire(),
                'compteEvent' => $user->getCompteEvenement(),
                'dernierEvent' => $user->getCompteDernierEvenement(),
                'numéroFiche' => $user->getNumeroFiche(),
                'civilite' => $user->getLibelleCivilite(),
                'proprietaire' => $user->getProprietaireActuelVehicule(),
                'nom' => $user->getNom(),
                'prenom' => $user->getPrenom(),
                'numNomVoie' => $user->getNnumeroNomVoie(),
                'adresse' => $user->getComplementAdresse(),
                'codePostal' => $user->getCodePostal(),
                'ville' => $user->getVille(),
                'telDomicile' => $user->getTelephoneDomicile(),
                'telPortable' => $user->getTelephonePortable(),
                'telJob' => $user->getTelephoneJob(),
                'email' => $user->getEmail(),
                'dateCirculation' => $user->getDateCirculation()->format('d/m/y'),
                'dateAchat' => $user->getDateAchat()->format('d/m/y'),
                'dateDernierEvent' => $user->getDateDernierEvenement()->format('d/m/y'),
                'Marque' => $user->getLibelleMarque(),
                'Model' => $user->getLibelleModele(),
                'version' => $user->getVersion(),
                'VIN' => $user->getVin(),
                'immatriculation' => $user->getImmatriculation(),
                'prospect' => $user->getTypeProspect(),
                'kilomettrage' => $user->getKilometrage(),
                'energie' => $user->getLibelleEnergie(),
                'vendeurVN' => $user->getVendeurVn(),
                'vendeurVO' => $user->getVendeurVo(),
                'commentaire' => $user->getFacturation(),
                'dossier' => $user->getNumeroDossier(),
                'intermediaireVente' => $user->getIntermediaireVente(),
                'DateEvent' => $user->getDateVeh()->format('d/m/y'),
                'origine' => $user->getOrigineEvenement(),
            ];

        }
        return new JsonResponse($data);
    }

}
