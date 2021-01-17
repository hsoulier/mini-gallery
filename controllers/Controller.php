<?php
require_once("models/DbModel.php");

class Controller extends DbModel
{
    public function render($content)
    {
        require_once("views/" . strtolower(get_called_class()) . ".php");
    }

    public function aggregate(array $req): ?\MongoDB\Driver\Cursor
    {
        $db = parent::getManager();

        $command = new \MongoDB\Driver\Command($req);
        try {
            return $db->executeCommand($this->db, $command);
        } catch (\MongoDB\Driver\Exception\Exception $e) {
            $e->getMessage();
        }
        return null;
    }

    public function insert(array $data)
    {
        $bulk = new \MongoDB\Driver\BulkWrite();
        $data["createdAt"] = new \MongoDB\BSON\UTCDateTime();
        $id = $bulk->insert($data);
        $result = parent::getManager()->executeBulkWrite("{$this->db}.{$this->coll}", $bulk);
        return $id;
    }
}