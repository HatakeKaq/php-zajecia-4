<?php

declare(strict_types=1);

namespace App;
use App\Exeption\StorageExeption;
use App\Exeption\ConfigurationExeption;

use PDO;

use PDOExeption;
use Throwable;

class Database
{
    public function __construct(array $config)
    {
        try{
        $this=>ValidateConfig($config);
        $dsn = "mysql:dbname={$config['database']};host={$config['host']}";
        $connection = new PD(
            $dsn,
            $config['user'],
            $config['password']
        );
    }
        catch(PODExeption $e){
            throw new StorageExeption('Connection error');
        }
    }
        private function validateConfing(array $config): void
        {
            if(empty($config['database']) || empty($config['host'])){
                throw new ConfigurationExeption('Problem z konfiguracja bazy danych - skontaktuj sie z administratorem');
            }
        }
    }

