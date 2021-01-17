<?php

use MongoDB\Driver\Cursor;

abstract class MongoModel
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
     * @return Cursor|null
     */
    public function getOne($id): ?Cursor
    {
        try {
            return $this->manager->executeQuery(
                "{$this->db}.{$this->coll}",
                new MongoDB\Driver\Query(["_id" => $id], [])
            );
        } catch (\MongoDB\Driver\Exception\Exception $e) {
            echo $e->getMessage();
        }
        return null;
    }

    /**
     * Get All Documents from the collection
     * @return Cursor|null
     */
    public function getAll(): ?Cursor
    {
        try {
            return $this->manager->executeQuery(
                "{$this->db}.{$this->coll}",
                new MongoDB\Driver\Query([], [])
            );
        } catch (\MongoDB\Driver\Exception\Exception $e) {
            echo $e->getMessage();
        }
        return null;
    }


}

// /**
//  * Read the database
//  * @param $filter
//  * @param $option
//  * @return Cursor|null
//  */
// public function requestData(array $filter, array $option): ?Cursor
// {
//   $read = new MongoDB\Driver\Query($filter, $option);
//   try {
//     return $this->manager->executeQuery("{$this->db}.{$this->coll}", $read);
//   } catch (\MongoDB\Driver\Exception\Exception $e) {
//     echo $e->getMessage();
//   }
//   return null;
// }