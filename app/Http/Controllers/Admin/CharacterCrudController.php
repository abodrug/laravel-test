<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CharacterCrudRequest;
use App\Models\Character;
use App\Traits\PaginateCollection;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class CharacterCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    public function setup()
    {
        $this->crud->setModel("App\Models\Character");
        $this->crud->setRoute("admin/character");
        $this->crud->setEntityNameStrings('актер', 'Актеры');
    }

    public function setupListOperation()
    {
        $this->crud->setColumns([
            [
                'name' => 'name',
                'label' => 'Имя'
            ],
            [
                'name' => 'birthday',
                'label' => 'День рождения'
            ],
            [
                'name' => 'nickname',
                'label' => 'Кличка'
            ],
            [
                'name' => 'portrayed',
                'label' => 'Персонаж'
            ],
        ]);
    }

    public function setupCreateOperation()
    {
        $this->crud->setValidation(CharacterCrudRequest::class);

        $this->crud->addField([
            'name' => 'name',
            'label' => "Имя",
            'type' => 'text',
        ]);
        $this->crud->addField([
            'name' => 'birthday',
            'label' => 'День рождения',
            'type' => 'date_picker',
            'date_picker_options' => [
                'todayBtn' => 'linked',
                'format' => 'yyyy-mm-dd',
                'language' => 'ru'
            ],        ]);
        $this->crud->addField([
            'name' => 'occupations',
            'label' => 'Профессии',
            'type' => 'select_from_array',
            //'store_as_json' => true,
            'allows_multiple' => true,
            'options' => $this->getOccupations(\Route::current()->parameter('id')),
            //'attribute' => 'occupations',
        ]);
/*        $this->crud->addField([
            'type' => 'select2_multiple',
            'name' => 'quotes', // the relationship name in your Model
            'entity' => 'quotes', // the relationship name in your Model
            'attribute' => 'quote', // attribute on Article that is shown to admin
            'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
            'label' => 'Цитаты актеров',
        ]);*/
        $this->crud->addField([
            'name' => 'img',
            'label' => 'Фотография',
            'type' => 'url',
        ]);
        $this->crud->addField([
            'name' => 'nickname',
            'label' => 'Кличка',
            'type' => 'text',
        ]);
        $this->crud->addField([
            'name' => 'portrayed',
            'label' => 'Персонаж',
            'type' => 'text',
        ]);

    }

    public function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    public function getOccupations(int $id): array
    {
        $result = Character::whereId($id)->get()->pluck('occupations')->toArray();
        return $result[0];
    }
}
