<?php

namespace App\Controllers;

class About extends BaseController
{
    public function index()
    {
        $title = "About page";

        return view('about', [
            'title' => $title,
        ]);
    }
}
