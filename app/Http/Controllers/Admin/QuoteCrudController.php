<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\QuoteCrudRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class QuoteCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    public function setup()
    {
        //$this->crud->allowAccess(['list', 'create', 'update', 'delete']);
        $this->crud->setModel("App\Models\Quote");
        $this->crud->setRoute("admin/quote");
        $this->crud->setEntityNameStrings('цитата', 'Цитаты');
    }

    public function setupListOperation()
    {
        $this->crud->setColumns([
            [
                'name' => 'character',
                'entity' => 'character',
                'attribute' => 'name',
                'label' => 'Актер',
            ],
            [
                'name' => 'quote',
                'label' => 'Цитата',
            ],
        ]);
    }

    public function setupCreateOperation()
    {
        $this->crud->setValidation(QuoteCrudRequest::class);

        $this->crud->addField([
                    'type' => 'select2',
                    'name' => 'character', // the relationship name in your Model
                    'entity' => 'character', // the relationship name in your Model
                    'attribute' => 'name', // attribute on Article that is shown to admin
                    'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
                    'label' => 'Актер',
                ]);
        $this->crud->addField([
            'name' => 'quote',
            'type' => 'textarea',
            'label' => 'Цитата'
        ]);
    }

    public function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
