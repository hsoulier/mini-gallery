<?php
require_once("controllers/Controller.php");

class ConnectUser extends Controller
{

    private array $form;

    public function __construct($data)
    {
        parent::__construct("users");
        if (
            !empty($data["action"]) &&
            $data["action"] === "create"
        ) {
            $this->form = $data;
            $this->create();
        } elseif (
            !empty($data["action"]) &&
            $data["action"] === "connect"
        ) {
            $this->form = $data;
            $this->login();
        }
        parent::render($data);
    }

    public function create()
    {
        $cursor = parent::getOne($this->form["email"], "email");
        if ($this->isEmptyObject($cursor)) {
            $bulk = new \MongoDB\Driver\BulkWrite();
            $user = [
                "username" => $this->form["user"],
                "name" => $this->form["name"],
                "email" => $this->form["email"],
                "password" => crypt($this->form["pass"], HASH_SALT),
            ];
            $id = $bulk->insert($user);
            $result = parent::getManager()->executeBulkWrite("{$this->db}.{$this->coll}", $bulk);
            unset($_POST);
        }
    }


    public function isEmptyObject($object): bool
    {
        foreach ($object as $value) return false;
        return true;
    }


    public function login()
    {
        if (isset($this->form["email"]) && isset($this->form["pass"])):
            $cursor = parent::getOne($this->form["email"], "email");
            foreach ($cursor as $user) {
                $password = $user->password;
                if ($user->email === $this->form["email"] &&
                    hash_equals($password, crypt($this->form["pass"], $password))
                ) {
                    session_start();
                    $_SESSION["islogged"] = true;
                    $_SESSION["id"] = (string) $user->_id;
                    unset($_POST);
                    header("Location: /?c=user&id={$user->_id}");
                    exit;
                }
            }
        else:
            echo "Rien n'est déclaré";
        endif;
    }

}