<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EpisodeCrudRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class EpisodeCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    public function setup()
    {
        // $this->crud->allowAccess(['list', 'create', 'update', 'delete']);
        $this->crud->setModel("App\Models\Episode");
        $this->crud->setRoute("admin/episode");
        $this->crud->setEntityNameStrings('эпизод', 'Эпизоды');
    }

    public function setupListOperation()
    {
        $this->crud->setColumns([
            [
                'name' => 'title',
                'label' => 'Название'
            ],
            [
                'name' => 'air_date',
                'label' => 'Дата выхода'
            ]
        ]);
    }

    public function setupCreateOperation()
    {
        $this->crud->setValidation(EpisodeCrudRequest::class);

        $this->crud->addField([
            'name' => 'title',
            'type' => 'text',
            'label' => "Название"
        ]);
        $this->crud->addField([
            'name' => 'air_date',
            'label' => 'Дата выхода',
            'type' => 'date',
        ]);
        $this->crud->addField([
            'type' => 'select2_multiple',
            'name' => 'characters', // the relationship name in your Model
            'entity' => 'characters', // the relationship name in your Model
            'attribute' => 'name', // attribute on Article that is shown to admin
            'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
            'label' => 'Актеры',
        ]);
    }

    public function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
