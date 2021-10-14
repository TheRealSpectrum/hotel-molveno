<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
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
    use \Backpack\CRUD\app\Http\Controllers\Operations\InlineCreateOperation;

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
            "searchLogic" => function ($query, $column, $searchTerm) {
                $query->orWhereHas("guest", function ($q) use (
                    $column,
                    $searchTerm
                ) {
                    $q->where("last_name", "like", "%" . $searchTerm . "%");
                });
            },
            "wrapper" => [
                "href" => function ($crud, $column, $entry, $related_key) {
                    return backpack_url("guest/" . $related_key . "/show");
                },
            ],
        ]);

        CRUD::addButtonFromView("line", "test", "check_in_out", "beginning");

        CRUD::column("rooms")
            ->type("relationship")
            ->name("rooms");

        CRUD::column("packages")
            ->type("relationship")
            ->name("packages");

        CRUD::column("adults");
        CRUD::column("children");

        CRUD::column("check_in")
            ->type("date")
            ->format("ddd D MMM YYYY HH:mm");
        CRUD::column("check_out")
            ->type("date")
            ->format("ddd D MMM YYYY HH:mm");

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

        $this->crud->addField([
            "type" => "date_range",
            "name" => ["check_in", "check_out"],
            "label" => "Event Date Range",
            "class" => "form-group col-md-6 input",
            "wrapper" => ["id" => "date_check_in, date_check_out"],
            "date_range_options" => [
                "drops" => "down", // can be one of [down/up/auto]
            ],
        ]);

        CRUD::field("adults")
            ->wrapper(["class" => "form-group col-md-6 in"])
            ->default(1);
        CRUD::field("children")
            ->wrapper(["class" => "form-group col-md-6"])
            ->default(0);

        CRUD::field("guest_id")->attribute("fullname");

        CRUD::field("roomtype_id")
            ->type("select2")
            ->model("App\Models\Roomtype")
            ->attribute("name_price")
            ->wrapper(["id" => "roomtype_select2"]);

        CRUD::field("rooms")
            ->type("select2_from_ajax_multiple")
            ->name("rooms")
            ->entity("rooms")
            ->attribute("room_number")
            ->data_source(url("/admin/api/room"))
            ->placeholder("Select Room(s)")
            ->include_all_form_fields(true)
            ->minimum_input_length(0)
            ->dependencies([
                "check_in",
                "check_out",
                "roomtype_id",
                "adults",
                "children",
            ])
            ->pivot(true)
            ->wrapper(["id" => "room_select2"]);

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
        CRUD::setValidation(UpdateReservationRequest::class);

        $this->crud->addField([
            "type" => "date_range",
            "name" => ["check_in", "check_out"],
            "label" => "Event Date Range",
            "class" => "form-group col-md-6 input",
            "wrapper" => ["id" => "date_check_in, date_check_out"],
            "date_range_options" => [
                "drops" => "down", // can be one of [down/up/auto]
            ],
        ]);

        CRUD::field("adults")
            ->wrapper(["class" => "form-group col-md-6 in"])
            ->default(1);
        CRUD::field("children")
            ->wrapper(["class" => "form-group col-md-6"])
            ->default(0);

        CRUD::field("guest_id")->attribute("fullname");

        CRUD::field("roomtype_id")
            ->type("select2")
            ->model("App\Models\Roomtype")
            ->attribute("name_price")
            ->wrapper(["id" => "roomtype_select2"]);

        CRUD::field("check_in_status");
        CRUD::field("check_out_status");

        CRUD::field("rooms")
            ->type("select2_multiple")
            ->name("rooms")
            ->entity("rooms")
            ->attribute("room_number")
            ->wrapper([
                "style" => "display:none",
                "id" => "room_select2",
            ])
            ->dependencies([
                "check_in",
                "check_out",
                "roomtype_id",
                "adults",
                "children",
            ]);

        CRUD::field("total_price")
            ->type("TotalPriceUpdate")
            ->prefix("€")
            ->attributes(["readonly" => "readonly"])
            ->wrapper([
                "class" => "form-group col-md-3",
                "id" => "total_price_field",
            ]);
    }
}
