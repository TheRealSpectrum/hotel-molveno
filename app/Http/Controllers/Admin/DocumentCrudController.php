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

        $this->crud->enableExportButtons();

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
        CRUD::setValidation(DocumentRequest::class);

        CRUD::field("full_name");
        CRUD::field("date_of_birth");
        CRUD::field("document_type")->type("enum");
        CRUD::field("document_number");
        CRUD::field("document_expiration_date");

        if (
            request()->headers->get("referer") ===
            "http://localhost/admin/document"
        ) {
            CRUD::field("reservation_id")
                ->attribute("id")
                ->label("Reservation id");
        } else {
            $id = preg_match_all(
                "/\d+/",
                request()->headers->get("referer"),
                $matches
            );
            CRUD::field("reservation_id")
                ->label("Reservation id")
                ->type("number")
                ->default($matches[0][0] ?? 1)
                ->attributes(["readonly" => "readonly"]);
        }
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
