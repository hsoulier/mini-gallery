<?php

use MongoDB\BSON\ObjectId;

require_once("controllers/Controller.php");

class Gallery extends Controller
{
    private string $id;
    public function __construct($data)
    {
        parent::__construct("galleries");
        $this->id = new ObjectId($data["id"]);
        parent::render($this->getUserByGallery());
    }

    public function getUserByGallery(): ?\MongoDB\Driver\Cursor
    {
        $req = ['aggregate' => 'galleries', 'pipeline' => [
            [
                '$match' => [
                    "_id" => new \MongoDB\BSON\ObjectId($this->id)
                ]
            ],
            [
                '$lookup' => [
                    'from' => 'users',
                    'localField' => '_id',
                    'foreignField' => 'galleries',
                    'as' => 'user'
                ]
            ]
        ], 'cursor' => new stdClass];
        return parent::aggregate($req);
    }
}