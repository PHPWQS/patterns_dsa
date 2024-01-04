<?php

class CacheManager
{
  private readonly mixed $callback;
  private array $cache_list = [];

  public function __construct(callable $callback)
  {
    $this->callback = $callback;
  }

  public function run(mixed ...$params): mixed
  {
    $key = join(' ', $params);
    if (isset($this->cache_list["$key"])) {
      return $this->cache_list["$key"];
    }

    $value = ($this->callback)(...$params);
    $this->cache_list["$key"] = $value;

    return $value;
  }

  public function show_cache(): array
  {
    return $this->cache_list;
  }
}

$sum_cache = new CacheManager(function(int $num) {
  $value = 1;
  if ($num < 0) {
    return null;
  }

  for ($i=1; $i <= $num; $i++) { 
    $value *= $i;
  }
  return $value;
});

$sum_cache->run(4);$sum_cache->run(5); $sum_cache->run(5);

var_dump($sum_cache->show_cache());

?>