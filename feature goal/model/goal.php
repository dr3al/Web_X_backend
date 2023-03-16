<?php

use JetBrains\PhpStorm\NoReturn;

class Goal
{
    private ?PDO $conn;
    private string $table_name = "feature goal";
    public int $id;
    public string $name;
    public string $description;
    public int $user_id;
    public int $data_create;
    public int $data_modify;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function get(): bool|PDOStatement
    {

        $query = "SELECT feature goal.id as id, name, description, data_create, data_modify  FROM " . $this->table_name . " INNER JOIN user ON ". $this->table_name . ".user_id = user.id;";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }
    function create(): bool
    {

        $query = "INSERT INTO " . $this->table_name . " SET name=:name, description=:description";

        $stmt = $this->conn->prepare($query);


        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->description = htmlspecialchars(strip_tags($this->description));



        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":description", $this->description);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

}