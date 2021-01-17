<?php
require_once("controllers/Controller.php");

class Theme extends Controller
{
    public function __construct()
    {
        parent::__construct("themes");
        parent::render($this->getLastThemes());
    }

    public function getLastThemes(): ?\MongoDB\Driver\Cursor
    {
        $req = ['aggregate' => 'themes', 'pipeline' => [
            [
                '$lookup' => [
                    'from' => 'galleries',
                    'localField' => '_id',
                    'foreignField' => 'themeId',
                    'as' => 'themeGallery'
                ]
            ],
            [
                '$limit' => 5
            ]
        ], 'cursor' => new stdClass];
        return parent::aggregate($req);
    }
}