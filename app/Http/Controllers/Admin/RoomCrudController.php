<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class RoomCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class RoomCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Room::class);
        CRUD::setRoute(config("backpack.base.route_prefix") . "/room");
        CRUD::setEntityNameStrings("room", "rooms");
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column("room_number");
        CRUD::addColumn([
            "name" => "is_clean",
            "type" => "boolean",
            "options" => [
                0 => '<span style="color: Green"><i class="fas fa-check"></i></span>',
                1 => '<span style="color: Red"><i class="fas fa-times"></i></span>',
            ],
        ]);
        CRUD::column("maximum_adults");
        CRUD::column("maximum_children");
        CRUD::column("roomtype_id");

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(CreateRoomRequest::class);

        CRUD::field("room_number");
        CRUD::field("available");
        CRUD::field("is_clean");
        CRUD::field("maximum_adults");
        CRUD::field("maximum_children");
        CRUD::field("roomtype_id");

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
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
        CRUD::setValidation(UpdateRoomRequest::class);
    }
}
