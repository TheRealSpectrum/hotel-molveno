<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DocumentRequest;
use Attribute;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Http\Request;

/**
 * Class GuestCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class DocumentCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Document::class);
        CRUD::setRoute(config("backpack.base.route_prefix") . "/document");
        CRUD::setEntityNameStrings("document", "documents");
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        // CRUD::setfromDB();
        CRUD::column("full_name");
        CRUD::column("date_of_birth");
        CRUD::column("document_type");
        CRUD::column("document_number");
        CRUD::column("document_expiration_date");
        CRUD::column("reservation_id")
            ->type("relationship")
            ->attribute("id");

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
        CRUD::field("full_name");
        CRUD::field("date_of_birth");
        CRUD::field("document_type");
        CRUD::field("document_number");
        CRUD::field("document_expiration_date");
        CRUD::field("reservation_id")
            ->type("relationship")
            ->attribute("id");

        // CRUD::field("reservation_id")
        //     ->type("select2")
        //     ->model("App\Models\Reservation")
        //     ->attribute("reservation_id")
        //     ->wrapper(["id" => "reservation_select2"]);

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }
    protected function setupInlineCreateOperation()
    {
        // CRUD::removeField("reservation_id");
        CRUD::field("reservation_id")->attributes([
            //   "type" => "select2",
            "attribute" => "id",
            "type" => "hidden",
        ]);
        //tijdelijk uitgeschakeld ivm verkeerde reserverings-id
        // ->wrapper([
        //     "style" => "display:none",
        // ]);
        //tot hier tijdelijk uitgeschakeld.

        // CRUD::field("reservation_id")
        //     ->type("select2")
        //     ->model("App\Models\Reservation")
        //     ->attribute("reservation_id")
        //     ->wrapper(["id" => "reservation_select2"]);

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
