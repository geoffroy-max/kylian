<?php

namespace App\Controller\Admin;

use App\Entity\Commentaire;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CommentaireCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Commentaire::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('peinture'),
            AssociationField::new('blogpost'),
            TextField::new('auteur'),
            EmailField::new('email')->onlyOnForms(),
            TextareaField::new('contenu'),
            DateTimeField::new('createdAt'),
            BooleanField::new('isPublished'),


        ];
    }

    /**
     * cette fonction permet de configurer le crud du peinture
     * @param Crud $crud
     * @return Crud
     */
 public function configureCrud(Crud $crud): Crud
 {
     return $crud
         ->setDefaultSort(['createdAt'=>'DESC']);

 }

    /**
     * cette fonction permet de configurer  les actions du crud pour autoriser certaines taches
     * @param Actions $actions
     * @return Actions
     */
 public function configureActions(Actions $actions): Actions
 {
     return $actions
         ->add(Crud::PAGE_INDEX, action::DETAIL)
         ->disable(action::DELETE, action::NEW);
 }

}
