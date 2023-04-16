<?php

declare(strict_types=1);

namespace App;
require_once("Exception/NotFoundException.php");
use App\Exeption\StorageException;
use App\Exeption\ConfigurationException;
use App\Exeption\NotFoundException;


use PDO;

use PDOExeption;
use Throwable;

class Database
{
    private PDO $conn;
    public function __construct(array $config)
    {
        try{
        $this->validateConfig($config);
        $this->createConnection($config);
       
    }
        catch(PODExeption $e){
            throw new StorageExeption('Connection error');
        }
    }
    public function createNote(array $data): void
    {
        try{
            $title=$this->conn->quote($data['title']);
            $description=$this->conn->quote($data['description']);
            $created=date('Y-m-d H:i:s');
            $query="INSERT INTO notes(title,description,created) VALUES($title,$description,'$created')";
            $result=$this->conn->exec($query);
        }
        catch(throwable $e){
            throw new StorageExeption ('Nie udalo sie utworzyc notatki',400, $e);
        }
    }
    public function getNote(int $id): array
    {
        try{
            $query = "SELECT * FROM notes WHERE id=$id";
            $result=$this->conn->query($query);
            $note=$result->fetch(PDO::FETCH_ASSOC);
        }catch(Throwable $e){
            throw new StorageExeption('Nie udalo sie pobrac notatki',400,$e);
        }
        if(!$note){
            throw new NotFoundException("Notatka o id=$id nie istnieje");
        }
        return $note;
    }

    public function getNotes(): array
    {
        try{
            $notes=[];
            $query="SELECT id, title,created FROM notes";
            $result=$this->conn->query($query,PDO::FETCH_ASSOC);
            foreach($result as $row){
                $notes[] =$row;
            }
            
            return $notes;
        }catch(Throwable $e){
            throw new StorageExeption('Nie udalo sie pobrac danych o notatkach', 400,$e);
        }
    }

        private function validateConfig(array $config): void
        {
            if(empty($config['database']) || empty($config['host'])){
                throw new ConfigurationExeption('Problem z konfiguracja bazy danych - skontaktuj sie z administratorem');
            }
        }
        private function createConnection(array $config): void
        {
            $dsn="mysql:dbname={$config['database']};host={$config['host']}";
            $this->conn=new PDO(
                $dsn,
                $config['user'],
                $config['password'],
                [
                    PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
                ]
                );
        }

    }

