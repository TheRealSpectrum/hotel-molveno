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
        $this->crud->addColumn([
            // Select
            "label" => "Guest",
            "type" => "select",
            "name" => "guest_id", // the db column for the foreign key
            "entity" => "guest", // the method that defines the relationship in your Model
            "attribute" => "fullname", // foreign key attribute that is shown to user
            "model" => "App\Models\Guest",
            "orderable" => true,
            "orderLogic" => function ($query, $column, $columnDirection) {
                return $query
                    ->leftJoin(
                        "guests",
                        "guests.id",
                        "=",
                        "reservations.guest_id"
                    )
                    ->orderBy("guests.first_name", $columnDirection)
                    ->select("reservations.*");
            },
        ]);
        CRUD::column("rooms")
            ->type("relationship")
            ->name("rooms");
        CRUD::column("adults");
        CRUD::column("children");
        CRUD::column("check_in")
            ->type("date")
            ->format("ddd D MMM YYYY");
        CRUD::column("check_out")
            ->type("date")
            ->format("ddd D MMM YYYY");
        CRUD::column("total_price")->prefix("€");
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

        CRUD::field("guest_id")->attribute("fullname");

        CRUD::field("adults")
            ->wrapper(["class" => "form-group col-md-6"])
            ->default(1);
        CRUD::field("children")
            ->wrapper(["class" => "form-group col-md-6"])
            ->default(0);

        CRUD::field("check_in")
            ->type("date_picker")
            ->date_picker_options(["todayBtn" => "linked"])
            ->wrapper(["class" => "form-group col-md-6"]);
        CRUD::field("check_out")
            ->type("date_picker")
            ->date_picker_options(["todayBtn" => "linked"])
            ->wrapper(["class" => "form-group col-md-6"]);

        CRUD::field("roomtype_id")
            ->type("select2")
            ->model("App\Models\Roomtype")
            ->attribute("name_price")
            ->wrapper(["id" => "roomtype_select2"]);

        $this->crud->addField([
            "type" => "select2_from_ajax_multiple",
            "name" => "rooms", // the relationship name in your Model
            "entity" => "rooms", // the relationship name in your Model
            "attribute" => "room_number", // attribute on Article that is shown to admin
            "data_source" => url("/admin/api/room"), // url to controller search function (with /{id} should return model)
            "placeholder" => "Select Room(s)", // placeholder for the select
            "include_all_form_fields" => true, //sends the other form fields along with the request so it can be filtered.
            "minimum_input_length" => 0, // minimum characters to type before querying results
            "dependencies" => [
                "check_in",
                "check_out",
                "roomtype_id",
                "adults",
                "children",
            ], // when a dependency changes, this select2 is reset to null
            "pivot" => true, // on create&update, do you need to add/delete pivot table entries?
            "wrapper" => ["id" => "room_select2"],
        ]);

        CRUD::field("total_price")
            ->type("TotalPrice")
            ->prefix("€")
            ->attributes(["readonly" => "readonly"])
            ->wrapper([
                "class" => "form-group col-md-3",
                "id" => "total_price_field",
            ]);
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
