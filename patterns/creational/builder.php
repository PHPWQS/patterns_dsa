<?php

class SelectQueryBuilder
{
  private static array $queries = [];

  public static function query()
  {
    $instance = new self();
    return $instance;
  }

  public function select(string $table, array $colums = ['*']): self
  {
    self::$queries[] = "SELECT " . join(",", $colums) . " FROM $table";
    return $this;
  }

  public function where(string $column, string $operator, mixed $value)
  {
    self::$queries[] = "WHERE $column $operator $value";
    return $this;
  }

  public function Andwhere(string $column, string $operator, mixed $value)
  {
    self::$queries[] = "AND $column $operator $value";
    return $this;
  }

  public function Orwhere(string $column, string $operator, mixed $value)
  {
    self::$queries[] = "OR $column $operator $value";
    return $this;
  }

  public function request(): string
  {
    return join(" ", self::$queries) . ";";
  }
}

$select_users_query = SelectQueryBuilder::query()->select('users')
->where('age', '>', 18)->Andwhere('male', '=', 'female')->request();

echo $select_users_query;