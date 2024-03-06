<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PostRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PostCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PostCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Post::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/post');
        CRUD::setEntityNameStrings('post', 'posts');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        // CRUD::setFromDb(); // set columns from db columns.

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */

        $this->crud->addColumns($this->getFieldsData(TRUE));
    }

    protected function setupShowOperation()
    {
        $this->crud->addColumns($this->getFieldsData(TRUE));
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(PostRequest::class);
        CRUD::field('title')->type('text');
        CRUD::field('description')->type('text');
        CRUD::field('image')->type('upload')->withFiles();
        CRUD::field('status')->type('select_from_array')->options(['1' => 'Enable', '2' => 'Disable']);
      
        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function getFieldsData($show = FALSE){
        return [
            [
                'label' => "Title",
                'name' => "title",
                'type' => 'text',
            ],

            [
                'label' => "Description",
                'name' => "description",
                'type' => 'text',
            ],

            [
                'label' => "Status",
                'name' => "status",
                'type' => 'select_from_array',
                'options' => ['1' => 'Enable', '2' => 'Disable'],
            ],

            [
                'label' => "Post Image",
                'name' => "image",
                'type' => ($show ? 'view' : 'upload'),
                'view' => 'posts/image',
                'upload' => true,
            ],
        ];
    }
}
