<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FileImportType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('file', FileType::class, [
                'label' => 'Sélectionner le fichier  à importer',
                'attr' => [
                    'accept' => '.xlsx', // Accept only .xlsx files
                ],
            ])
            ->add('submit', SubmitType::class, [
                    'label' => 'Envoyer',
                ]);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'csrf_protection' => false, // Disable CSRF protection since there's no entity associated with the form
        ]);
    }


}
