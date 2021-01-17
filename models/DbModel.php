<?php

use MongoDB\Driver\Cursor;

abstract class DbModel
{
    protected string $db = "gallery";
    protected \MongoDB\Driver\Manager $manager;
    public string $coll;

    public function __construct($coll)
    {
        $this->coll = $coll;
        try {
            $this->manager = new MongoDB\Driver\Manager(
                "mongodb+srv://" . DB_USER . ":" .
                DB_PASSWORD . "@" . DB_URI .
                "/test?retryWrites=true&w=majority"
            );
        } catch (MongoDB\Driver\Exception\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getManager(): \MongoDB\Driver\Manager
    {
        return $this->manager;
    }

    public function setCollection($collection)
    {
        $this->coll = $collection;
    }


    /**
     * Get a Document by Id from a collection
     * @param $id
     * @param string $selector
     * @return Cursor|null
     */
    public function getOne($id, string $selector = "_id"): ?Cursor
    {
        try {
            return $this->manager->executeQuery(
                "{$this->db}.{$this->coll}",
                new MongoDB\Driver\Query([$selector => $id], [])
            );
        } catch (\MongoDB\Driver\Exception\Exception $e) {
            echo $e->getMessage();
        }
        return null;
    }

    /**
     * Get All Documents from the collection
     * @param array $options
     * @return Cursor|null
     */
    public function getAll(array $options = []): ?Cursor
    {
        try {
            return $this->manager->executeQuery(
                "{$this->db}.{$this->coll}",
                new MongoDB\Driver\Query([], $options)
            );
        } catch (\MongoDB\Driver\Exception\Exception $e) {
            echo $e->getMessage();
        }
        return null;
    }
}