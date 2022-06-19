<?php

namespace App\Controllers;

class Contact extends BaseController
{
    public function index()
    {
        $title = "Contact page";

        return view('contact', [
            'title' => $title,
        ]);
    }
}
