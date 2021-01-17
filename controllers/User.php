<?php

require_once("controllers/Controller.php");


class User extends Controller
{
    private string $id;
    private array $form;

    public function __construct($data)
    {
        parent::__construct("users");
        if (isset($data["action"]) && $data["action"] === "logout") {
            session_destroy();
            header('Location: /');
            exit;
        }
        if (isset($data[0]["action"]) && $data[0]["action"] === "createGallery") {
            $this->form = $data;
            $this->creatGallery();
        }
        if (isset($data["id"]) || isset($_SESSION["id"])) {
            $this->id = isset($data["id"]) ? $data["id"] : $_SESSION["id"];
            parent::setCollection("themes");
            $themes = parent::getAll();
            parent::setCollection("users");
            parent::render(["user" => $this->getInfosUser(), "themes" => $themes]);
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


    public function creatGallery()
    {
        $names = [];
        $files = $this->form[1]["files"];
        $info = $this->form[0];
        for ($i = 0; $i < count($_FILES['files']['name']); $i++) {
            $filename = uniqid() . $_FILES['files']['name'][$i];
            array_push($names, $filename);
            move_uploaded_file(
                $_FILES['files']['tmp_name'][$i],
                "public/img/{$filename}"
            );
        }
        $gallery = [
            "name" => $info["name"],
            "description" => $info["desc"],
            "images" => $names,
            "themeId" => new \MongoDB\BSON\ObjectId($info["theme"])
        ];
        parent::setCollection("galleries");
        $galleryId = parent::insert($gallery);
        $bulk = new \MongoDB\Driver\BulkWrite();
        $bulk->update(
            ["_id" => new \MongoDB\BSON\ObjectId($_SESSION["id"])],
            ['$push' => ['galleries' => $galleryId]]
        );
        $result = parent::getManager()->executeBulkWrite("{$this->db}.users", $bulk);
        header("Refresh:0");
    }
}


