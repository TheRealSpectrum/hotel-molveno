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
        // PROFILE
        $this->crud->addField([
            // CustomHTML
            "name" => "content_separator_profile",
            "type" => "custom_html",
            "value" => "<h3>Hotel profile</h3><hr>",
        ]);
        $this->crud->addField([
            "name" => "hotel_name",
            "label" => "Hotel name",
            "fake" => true,
            "type" => "text",
            "placeholder" => trans("backpack::pagemanager.content_placeholder"),
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            "name" => "hotel_address",
            "label" => "Hotel address",
            "fake" => true,
            "type" => "text",
            "placeholder" => trans("backpack::pagemanager.content_placeholder"),
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            "name" => "hotel_phonenumber",
            "label" => "Hotel phonenumber",
            "fake" => true,
            "type" => "text",
            "placeholder" => trans("backpack::pagemanager.content_placeholder"),
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            "name" => "hotel_email",
            "label" => "Hotel email",
            "fake" => true,
            "type" => "text",
            "placeholder" => trans("backpack::pagemanager.content_placeholder"),
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            "name" => "hotel_logo",
            "label" => "Hotel logo",
            "fake" => true,
            "type" => "image",
            "crop" => true,
            "placeholder" => trans("backpack::pagemanager.content_placeholder"),
            "store_in" => "extras",
        ]);
        // FRONT PAGE
        $this->crud->addField([
            // CustomHTML
            "name" => "content_separator_frontpage",
            "type" => "custom_html",
            "value" => "<h3>Frontpage</h3><hr>",
        ]);
        $this->crud->addField([
            "name" => "frontpage_image",
            "label" => "Banner image",
            "fake" => true,
            "type" => "image",
            "crop" => true,
            "placeholder" => trans("backpack::pagemanager.content_placeholder"),
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            "name" => "box_1_title",
            "label" => "Title box 1",
            "fake" => true,
            "type" => "text",
            "placeholder" => trans("backpack::pagemanager.content_placeholder"),
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            "name" => "box_1",
            "label" => "Content box 1",
            "fake" => true,
            "type" => "wysiwyg",
            "placeholder" => trans("backpack::pagemanager.content_placeholder"),
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            "name" => "box_2_title",
            "label" => "Title box 2",
            "fake" => true,
            "type" => "text",
            "placeholder" => trans("backpack::pagemanager.content_placeholder"),
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            "name" => "box_2",
            "label" => "Content box 2",
            "fake" => true,
            "type" => "wysiwyg",
            "placeholder" => trans("backpack::pagemanager.content_placeholder"),
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            "name" => "box_3_title",
            "label" => "Title box 3",
            "fake" => true,
            "type" => "text",
            "placeholder" => trans("backpack::pagemanager.content_placeholder"),
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            "name" => "box_3",
            "label" => "Content box 3",
            "fake" => true,
            "type" => "wysiwyg",
            "placeholder" => trans("backpack::pagemanager.content_placeholder"),
            "store_in" => "extras",
        ]);
        // OUR ROOMS
        $this->crud->addField([
            // CustomHTML
            "name" => "content_separator_rooms",
            "type" => "custom_html",
            "value" => "<h3>Rooms</h3><hr>",
        ]);
        $this->crud->addField([
            "name" => "rooms_title",
            "label" => "Rooms title",
            "fake" => true,
            "type" => "text",
            "placeholder" => trans("backpack::pagemanager.content_placeholder"),
            "store_in" => "extras",
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
        // FACILITIES
        $this->crud->addField([
            // CustomHTML
            "name" => "content_separator_facilities",
            "type" => "custom_html",
            "value" => "<h3>Facilities</h3><hr>",
        ]);
        $this->crud->addField([
            "name" => "facilities_title",
            "label" => "Facilities title",
            "fake" => true,
            "type" => "text",
            "placeholder" => trans("backpack::pagemanager.content_placeholder"),
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            "name" => "facilities_image",
            "label" => "Background image",
            "fake" => true,
            "type" => "image",
            "crop" => true,
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            "name" => "facilities",
            "type" => "repeatable",
            "store_in" => "extras",
            "fake" => true,
            "fields" => [
                [
                    "name" => "facilities_add",
                    "type" => "text",
                    "label" => "Facility",
                    "wrapper" => ["class" => "form-group col-md-4"],
                ],
            ],
            "new_item_label" => "Add Facility",
            "max_rows" => 12, // maximum rows allowed, when reached the "new item" button will be hidden
        ]);
        // ENVIRONMENT
        $this->crud->addField([
            // CustomHTML
            "name" => "content_separator_environment",
            "type" => "custom_html",
            "value" => "<h3>The Environment</h3><hr>",
        ]);
        $this->crud->addField([
            "name" => "environmentbox_head",
            "label" => "Head title",
            "fake" => true,
            "type" => "text",
            "placeholder" => trans("backpack::pagemanager.content_placeholder"),
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            "name" => "environment_text_box",
            "label" => "Head content",
            "fake" => true,
            "type" => "wysiwyg",
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            "name" => "environment_image_1",
            "label" => "Image 1",
            "fake" => true,
            "type" => "image",
            "crop" => true,
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            "name" => "environmentbox_title_1",
            "label" => "Title box 1",
            "fake" => true,
            "type" => "text",
            "placeholder" => trans("backpack::pagemanager.content_placeholder"),
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            "name" => "environmentbox_content_1",
            "label" => "Content box 1",
            "fake" => true,
            "type" => "wysiwyg",
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            "name" => "environment_image_2",
            "label" => "Image 2",
            "fake" => true,
            "type" => "image",
            "crop" => true,
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            "name" => "environmentbox_title_2",
            "label" => "Title box 2",
            "fake" => true,
            "type" => "text",
            "placeholder" => trans("backpack::pagemanager.content_placeholder"),
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            "name" => "environmentbox_content_2",
            "label" => "Content box 2",
            "fake" => true,
            "type" => "wysiwyg",
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            "name" => "environment_image_3",
            "label" => "Image 3",
            "fake" => true,
            "type" => "image",
            "crop" => true,
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            "name" => "environmentbox_title_3",
            "label" => "Title box 3",
            "fake" => true,
            "type" => "text",
            "placeholder" => trans("backpack::pagemanager.content_placeholder"),
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            "name" => "environmentbox_content_3",
            "label" => "Content box 3",
            "fake" => true,
            "type" => "wysiwyg",
            "store_in" => "extras",
        ]);
        // RESTAURANT
        $this->crud->addField([
            // CustomHTML
            "name" => "content_separator_restaurant",
            "type" => "custom_html",
            "value" => "<h3>The Restaurant</h3><hr>",
        ]);
        $this->crud->addField([
            "name" => "restaurant_title",
            "label" => "Restaurant title",
            "fake" => true,
            "type" => "text",
            "placeholder" => trans("backpack::pagemanager.content_placeholder"),
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            "name" => "restaurant_text_box",
            "label" => "Content",
            "fake" => true,
            "type" => "wysiwyg",
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            "name" => "restaurant_image",
            "label" => "Restaurant menu",
            "fake" => true,
            "type" => "image",
            "crop" => true,
            "store_in" => "extras",
        ]);
        // GALLERY
        $this->crud->addField([
            // CustomHTML
            "name" => "content_separator_gallery",
            "type" => "custom_html",
            "value" => "<h3>Gallery</h3><hr>",
        ]);
        $this->crud->addField([
            "name" => "gallery_image_1",
            "label" => "Image 1",
            "fake" => true,
            "type" => "image",
            "crop" => true,
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            "name" => "gallery_image_2",
            "label" => "Image 2",
            "fake" => true,
            "type" => "image",
            "crop" => true,
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            "name" => "gallery_image_3",
            "label" => "Image 3",
            "fake" => true,
            "type" => "image",
            "crop" => true,
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            "name" => "gallery_image_4",
            "label" => "Image 4",
            "fake" => true,
            "type" => "image",
            "crop" => true,
            "store_in" => "extras",
        ]);
    }
}
