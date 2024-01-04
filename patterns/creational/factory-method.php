<?php

class ShipLogistic
{
  public string $product_type;
  public float $product_weight;

  private static float $price = 22.3;

  public function __construct(string $product_type, string $product_weight)
  {
    $this->product_type = $product_type;
    $this->product_weight = $product_weight;
  }

  public function calculate(): string
  {
    $price = $this->product_weight * self::$price;

    return "$price $";
  }
}

class PlaneLogistic
{
  public string $product_type;
  public float $product_weight;

  private static float $price = 44;

  public function __construct(string $product_type, string $product_weight)
  {
    $this->product_type = $product_type;
    $this->product_weight = $product_weight;
  }

  public function calculate(): string
  {
    $price = $this->product_weight * self::$price;

    return "$price $";
  }
}

class LogisticFactory
{
  public string $type;
  public mixed $instance;
  
  public function __construct(string $type, string $product, float $weight)
  {
    $this->type = $type;
    
    if ($type == 'plane') {
      $this->instance = new PlaneLogistic($product, $weight);
    }elseif ($type === 'ship') {
      $this->instance = new ShipLogistic($product, $weight);
    }else {
      throw new Error("Sorry but $type not supports.");
    }
  }

  public function getInstance()
  {
    return $this->instance;
  }
}

$ship_logistic = (new LogisticFactory('ship', 'Nike boots', 224))->getInstance();
$plane_logistic = (new LogisticFactory('plane', 'Iphone 15', 333))->getInstance();

var_dump($ship_logistic->calculate());
var_dump($plane_logistic->calculate());

?>