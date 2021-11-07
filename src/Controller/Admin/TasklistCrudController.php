<?php

namespace App\Controller\Admin;

use App\Entity\Tasklist;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TasklistCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Tasklist::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
