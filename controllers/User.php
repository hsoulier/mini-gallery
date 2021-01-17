<?php

require_once("controllers/Controller.php");


class User extends Controller
{
    private string $id;

    public function __construct($data)
    {
        parent::__construct("users");
        $this->id = $data["id"];
        parent::render($this->getInfosUser());
    }

    public function getInfosUser(): ?\MongoDB\Driver\Cursor
    {
        $req = ['aggregate' => 'users', 'pipeline' => [
            [
                '$match' => [
                    "_id" => new \MongoDB\BSON\ObjectId($this->id)
                ]
            ],
            [
                '$lookup' => [
                    'from' => 'galleries',
                    'localField' => 'galleries',
                    'foreignField' => '_id',
                    'as' => 'userGalleries'
                ]
            ]
        ], 'cursor' => new stdClass];
        return parent::aggregate($req);
    }
}


