<?php
require_once("controllers/Controller.php");

class Theme extends Controller {
    public function __construct($coll)
    {
        parent::__construct("theme");

    }
}