<?php

require_once("controllers/Controller.php");


class User extends Controller
{
    private string $id;
    private array $form;

    public function __construct($data)
    {
        parent::__construct("users");
        if (isset($data["action"])) {
            if ($data["action"] === "logout") {
                session_destroy();
                header('Location: /');
                exit;
            }
            if ($data["action"] === "createGallery") {
                $this->form = $data;
            }
        }
        if (isset($data["id"]) || isset($_SESSION["id"])) {
            $this->id = isset($data["id"]) ? $data["id"] : $_SESSION["id"];
            parent::render($this->getInfosUser());
        } else {
            header('Location: /?c=connectUser');
            exit;
        }
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


    public function creatGallery() {


    }
}


