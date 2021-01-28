<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AuthRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Illuminate\Http\Request;

class UserController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    public function setup()
    {
        $this->crud->setModel("App\Models\User");
        $this->crud->setRoute("admin/user");
        $this->crud->setEntityNameStrings('пользователя', 'Пользователи');
    }

    public function setupListOperation()
    {
        $this->crud->setColumns([
            [
                'name' => 'name',
                'label' => 'Логин пользователя'
            ],
            [
                'name' => 'email',
                'label' => 'Email'
            ]
        ]);
    }

    public function setupCreateOperation()
    {
        $this->crud->setValidation(AuthRequest::class);

        $this->crud->addField([
            'name' => 'name',
            'type' => 'text',
            'label' => "Логин"
        ]);
        $this->crud->addField([
            'name' => 'email',
            'type' => 'email',
            'label' => "Email"
        ]);
        $this->crud->addField([
            'name' => 'password',
            'type' => 'password',
            'label' => "Пароль"
        ]);
    }

    public function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
