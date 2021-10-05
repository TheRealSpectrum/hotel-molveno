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

    private function services()
    {
        $this->crud->addField([
            // CustomHTML
            "name" => "metas_separator",
            "type" => "custom_html",
            "value" =>
                "<br><h2>" . trans("backpack::pagemanager.metas") . "</h2><hr>",
        ]);
        $this->crud->addField([
            "name" => "meta_title",
            "label" => trans("backpack::pagemanager.meta_title"),
            "fake" => true,
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            "name" => "meta_description",
            "label" => trans("backpack::pagemanager.meta_description"),
            "fake" => true,
            "store_in" => "extras",
        ]);
        $this->crud->addField([
            "name" => "meta_keywords",
            "type" => "textarea",
            "label" => trans("backpack::pagemanager.meta_keywords"),
            "fake" => true,
            "store_in" => "extras",
        ]);
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
            "name" => "content",
            "label" => trans("backpack::pagemanager.content"),
            "type" => "wysiwyg",
            "placeholder" => trans("backpack::pagemanager.content_placeholder"),
        ]);
    }

    private function about_us()
    {
        $this->crud->addField([
            "name" => "content",
            "label" => trans("backpack::pagemanager.content"),
            "type" => "wysiwyg",
            "placeholder" => trans("backpack::pagemanager.content_placeholder"),
        ]);
    }

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
            "value" => "<h4>Frontpage</h4><hr>",
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
    }
}
