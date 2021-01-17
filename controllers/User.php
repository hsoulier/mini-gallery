<?php

require_once("controllers/Controller.php");


class User extends Controller
{
    private string $id;

    public function __construct($data)
    {
        parent::__construct("users");
        $this->id = $data["id"];
//        $this->content = parent::getOne(new MongoDB\BSON\ObjectId("$this->id"));
    }

    public function render()
    {
        $content = $this->getInfosUser();
        parent::render();
    }

    public function getInfosUser(): ?\MongoDB\Driver\Cursor
    {
        $db = parent::getManager();

        $command = new \MongoDB\Driver\Command(
            ['aggregate' => 'users', 'pipeline' => [
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
            ], 'cursor' => new stdClass]
        );
        try {
            return $db->executeCommand('gallery', $command);
        } catch (\MongoDB\Driver\Exception\Exception $e) {
            $e->getMessage();
        }
        return null;
//        $cursor = "";
//        try {
//        } catch (\MongoDB\Driver\Exception\Exception $e) {
//            echo $e->getMessage();
//        }
//        var_dump($cursor);

//        $command = new MongoDB\Driver\Command([
//                "aggregate" => "galleries",
//                "pipeline" => [
//                    '$match' => [
//                        "_id" => new \MongoDB\BSON\ObjectId("5ff08f90186c323f34900380")
//                    ],
//                    '$lookup' => [
//                        "from" => "galleries",
//                        "localField" => "galleries",
//                        "foreignField" => "_id",
//                        "as" => "userGalleries"
//                    ]
//                ],
//                "cursor" => new stdClass()
//            ]
//        );
//        try {
//            $cursor = $db->executeCommand("gallery", $command);
//        } catch (\MongoDB\Driver\Exception\Exception $e) {
//            $e->getMessage();
//        }

//      $this->content = $db->aggregateCursor(
//          [
//              [ '$group' => [ '_id' => '$name', 'points' => [ '$sum' => '$points' ] ] ],
//              [ '$sort' => [ 'points' => -1 ] ],
//          ],
//          [ "cursor" => [ "batchSize" => 4 ] ]
//      );
//
//      $read = new MongoDB\Driver\Query($filter, $option);
//      try {
//          return $this->manager->executeQuery("{$this->db}.{$this->coll}", $read);
//      } catch (\MongoDB\Driver\Exception\Exception $e) {
//          echo $e->getMessage();
//      }
//      return null;
    }
}

/*
* Aggregate request to find all galleries by user ID
*** ! Bonne requete ***
db.users.aggregate([
  {$match:
    {"_id": ObjectId('5ff08f90186c323f34900380')}
  },
  {$lookup:
    {
  from: 'galleries',
  localField: 'galleries',
  foreignField: '_id',
  as: 'userGalleries'
}
  }
])
*/


