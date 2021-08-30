<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ReservationRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ReservationCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ReservationCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Reservation::class);
        CRUD::setRoute(config("backpack.base.route_prefix") . "/reservation");
        CRUD::setEntityNameStrings("reservation", "reservations");
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column("check_in");
        CRUD::column("check_out");
        CRUD::column("guest_id");
        CRUD::column("room_id");

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
        CRUD::setValidation(ReservationRequest::class);

        CRUD::field("guest_id");

        $this->crud->addField([
            "name" => ["check_in", "check_out"],
            "label" => "Check-in and Check-out",
            "type" => "date_range",
        ]);

        CRUD::field("room_id");
        $this->crud->addField([
            "label" => "Room number", // Table column heading
            "type" => "select2_from_ajax",
            "name" => "rooms", // the column that contains the ID of that connected entity;
            "entity" => "room", // the method that defines the relationship in your Model
            "attribute" => "room_number", // foreign key attribute that is shown to user
            "data_source" => url("/admin/api/room"), // url to controller search function (with /{id} should return model)
            "placeholder" => "Select Room(s)", // placeholder for the select
            "include_all_form_fields" => true, //sends the other form fields along with the request so it can be filtered.
            "minimum_input_length" => 0, // minimum characters to type before querying results
            "dependencies" => ["check_in", "check_out"], // when a dependency changes, this select2 is reset to null
        ]);

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
    }
}
