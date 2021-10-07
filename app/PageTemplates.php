<?php

namespace App;

trait PageTemplates
{
    /*
    |--------------------------------------------------------------------------
    | Page Templates for Backpack\PageManager
    |--------------------------------------------------------------------------
    |
    | Each page template has its own method, that define what fields should show up using the Backpack\CRUD API.
    | Use snake_case for naming and PageManager will make sure it looks pretty in the create/update form
    | template dropdown.
    |
    | Any fields defined here will show up after the standard page fields:
    | - select template
    | - page name (only seen by admins)
    | - page title
    | - page slug
    */

    private function homepage()
    {
        $this->crud->addField([
            // CustomHTML
            "name" => "content_separator",
            "type" => "custom_html",
            "value" =>
                "<br><h2>" .
                trans("backpack::pagemanager.content") .
                "</h2><hr>",
        ]);
        $this->crud->addField([
            // CustomHTML
            "name" => "content_separator_frontpage",
            "type" => "custom_html",
            "value" => "<h3>Frontpage</h3><hr>",
        ]);
        $this->crud->addField([
            "name" => "frontpage_image",
            "label" => "Image",
            "fake" => true,
            "type" => "image",
            "crop" => true,
            "placeholder" => trans("backpack::pagemanager.content_placeholder"),
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            "name" => "box_1_title",
            "label" => "box 1 title",
            "fake" => true,
            "type" => "text",
            "placeholder" => trans("backpack::pagemanager.content_placeholder"),
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            "name" => "box_1",
            "label" => "box 1 content",
            "fake" => true,
            "type" => "wysiwyg",
            "placeholder" => trans("backpack::pagemanager.content_placeholder"),
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            "name" => "box_2_title",
            "label" => "box 2 title",
            "fake" => true,
            "type" => "text",
            "placeholder" => trans("backpack::pagemanager.content_placeholder"),
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            "name" => "box_2",
            "label" => "Box 2 content",
            "fake" => true,
            "type" => "wysiwyg",
            "placeholder" => trans("backpack::pagemanager.content_placeholder"),
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            "name" => "box_3_title",
            "label" => "box 3 title",
            "fake" => true,
            "type" => "text",
            "placeholder" => trans("backpack::pagemanager.content_placeholder"),
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            "name" => "box_3",
            "label" => "box 3 content",
            "fake" => true,
            "type" => "wysiwyg",
            "placeholder" => trans("backpack::pagemanager.content_placeholder"),
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            // CustomHTML
            "name" => "content_separator_rooms",
            "type" => "custom_html",
            "value" => "<h3>Our Rooms</h3><hr>",
        ]);
        $this->crud->addField([
            "name" => "room_image_1",
            "label" => "Image 1",
            "fake" => true,
            "type" => "image",
            "crop" => true,
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            "name" => "room_image_2",
            "label" => "Image 2",
            "fake" => true,
            "type" => "image",
            "crop" => true,
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            "name" => "room_image_3",
            "label" => "Image 3",
            "fake" => true,
            "type" => "image",
            "crop" => true,
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            "name" => "room_image_4",
            "label" => "Image 4",
            "fake" => true,
            "type" => "image",
            "crop" => true,
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            // CustomHTML
            "name" => "content_separator_facilities",
            "type" => "custom_html",
            "value" => "<h3>Facilities</h3><hr>",
        ]);
        //
        //
        //
        $this->crud->addField([
            // CustomHTML
            "name" => "content_separator_environment",
            "type" => "custom_html",
            "value" => "<h3>The Environment</h3><hr>",
        ]);
        $this->crud->addField([
            "name" => "environment_text_box",
            "label" => "Text content",
            "fake" => true,
            "type" => "wysiwyg",
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            "name" => "environment_image_1",
            "label" => "Environment image 1",
            "fake" => true,
            "type" => "image",
            "crop" => true,
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            "name" => "environment_text_1",
            "label" => "Environment text 1",
            "fake" => true,
            "type" => "wysiwyg",
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            "name" => "environment_image_2",
            "label" => "Environment image 2",
            "fake" => true,
            "type" => "image",
            "crop" => true,
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            "name" => "environment_text_2",
            "label" => "Environment text 2",
            "fake" => true,
            "type" => "wysiwyg",
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            "name" => "environment_image_3",
            "label" => "Environment image 3",
            "fake" => true,
            "type" => "image",
            "crop" => true,
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            "name" => "environment_text_3",
            "label" => "Environment text 3",
            "fake" => true,
            "type" => "wysiwyg",
            "store_in" => "extras",
        ]);
    }
}
