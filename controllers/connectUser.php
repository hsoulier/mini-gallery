<?php
require_once("controllers/Controller.php");

class connectUser extends Controller
{

    public function __construct()
    {

        parent::__construct("users");
        parent::render([]);
    }

}