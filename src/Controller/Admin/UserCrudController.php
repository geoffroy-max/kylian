<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
          TextField::new('nom'),
            TextField::new('prenom'),
            TextField::new('telephone'),
            TextField::new('apropos')
        ];
    }

    /**
     * cette fonction permet de configurer  les actions du crud pour autoriser certaines taches
     * @param Actions $actions
     * @return Actions
     */
public function configureActions(Actions $actions): Actions
{
    return $actions
        ->add(crud::PAGE_INDEX, action::DETAIL)
        ->disable(action::DELETE, action::NEW);


}

    /** cette fonction permet de personnaliser notre crud
     * (le titre d la page qnd on est sur la pge index on doit l apl parmtr)
     * @param Crud $crud
     * @return Crud
     */
public function configureCrud(Crud $crud): Crud
{
  return $crud
      ->setPageTitle('index','paramètres')
      ->setPageTitle('edit','editer les paramètres');

}
}
