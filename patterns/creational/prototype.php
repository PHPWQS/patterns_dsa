<?php

class SomeClass
{
  public string $name;
  public string $lastname;

  public function __construct(string $name, string $lastname)
  {
    $this->name = $name;
    $this->lastname = $lastname;
  }

  public function get_fullname() : string {
    return $this->name . " " . $this->lastname . "\n";
  }
  
  public function __clone()
  {
    return new self($this->name, $this->lastname);
  }
}

$some_class = new SomeClass("Mesrop", "Arakelyan");
$some_class_2 = clone $some_class;

echo $some_class_2->get_fullname();

?>