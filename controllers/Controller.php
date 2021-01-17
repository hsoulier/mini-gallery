<?php
require_once("models/MongoModel.php");

class Controller extends MongoModel
{
    public function render()
    {
        require_once("views/figure/" . strtolower(get_called_class()) . ".php");
    }
}