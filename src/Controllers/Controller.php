<?php

namespace App\Controllers;

abstract class Controller
{
    protected $twig;

    public function __construct($twig)
    {
        $this->twig = $twig;
    }
}
