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
        CRUD::addButtonFromView("line", "test1", "room_clean", "beginning");
        CRUD::column("room_number");
        CRUD::addColumn([
            "name" => "is_clean",
            "type" => "boolean",
            "options" => [
                0 => '<span style="color: Red"><i class="fas fa-times"></i></span>',
                1 => '<span style="color: Green"><i class="fas fa-check"></i></span>',
            ],
        ]);
        CRUD::addColumn([
            "name" => "available",
            "type" => "boolean",
            "options" => [
                0 => '<span style="color: Red"><i class="fas fa-times"></i></span>',
                1 => '<span style="color: Green"><i class="fas fa-check"></i></span>',
            ],
        ]);
        CRUD::column("maximum_guests");
        CRUD::column("roomtype_id");
        CRUD::column("notes");
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
        CRUD::field("maximum_guests");
        CRUD::field("roomtype_id");
        CRUD::field("notes");
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
