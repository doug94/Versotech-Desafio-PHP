<?php

class Connection {

    private $databaseFile;
    private $connection;
    private $endUserErrorMessage = "Não foi possível concluir a operação. ";

    public function __construct()
    {
        $this->databaseFile = realpath(__DIR__ . "/database/db.sqlite");
        $this->connect();
    }

    private function connect()
    {
        return $this->connection = new PDO("sqlite:{$this->databaseFile}", null, null, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }

    public function getConnection()
    {
        return $this->connection ?: $this->connection = $this->connect();
    }

    public function query($query)
    {
        $result      = $this->getConnection()->query($query);

        $result->setFetchMode(PDO::FETCH_INTO, new stdClass);

        return $result;
    }

    public function insert($query, $user, $email, $colorId)
    {
        try
        {
            $statement = $this->getConnection()->prepare($query);
            $statement->execute([
                ':name' => $user,
                ':email' => $email,
                ':colorId' => $colorId
            ]);
        } 
        catch (PDOException $exception) 
        {
            echo $this->endUserErrorMessage . $exception->getMessage();
        }
    }

    public function update($query, $user, $email, $colorId)
    {
        try 
        {
            $statement = $this->getConnection()->prepare($query);
            $statement->bindParam(':name', $user);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':colorId', $colorId);
            $statement->execute();
        } 
        catch (PDOException $exception) 
        {
            echo $this->endUserErrorMessage . $exception->getMessage();
        }
    }

    public function delete($query, $userId)
    {
        $statement = $this->getConnection()->prepare($query);
        $statement->bindParam(':userId', $userId, PDO::PARAM_INT);
        $statement->execute();
    }
}