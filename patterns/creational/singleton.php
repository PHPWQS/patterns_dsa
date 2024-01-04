<?php

class DatabaseSingleton
{
  private static self $instance;

  public readonly string $pdo;
  
  public function __construct(string $pdo)
  {
    $this->pdo = $pdo;  
  }

  public static function getInstance(string $pdo): self
  {
    if (isset(self::$instance)) {
      return self::$instance;
    }

    self::$instance = new self($pdo);
    return self::$instance;
  }
}


$db_example_1 = DatabaseSingleton::getInstance('mysql:host=localhost;username=postgres;password=1234');
$db_example_2 = DatabaseSingleton::getInstance('psql:host=localhost;username=postgres;password=1234');

echo $db_example_1->pdo, $db_example_2->pdo;

?>