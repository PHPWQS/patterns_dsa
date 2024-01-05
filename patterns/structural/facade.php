<?php

class UploadFile
{
  public function get_file(string $path)
  {
    return file_get_contents($path);
  }
}

class VideoRender
{
  public function cut(float $start, float $end, string $file)
  {
    return "We cat it from $start to $end";
  }
}

class Video
{
  private readonly VideoRender $render;
  private readonly UploadFile $file;

  public function __construct()
  {
    $this->render = new VideoRender();
    $this->file = new UploadFile();
  }

  public function manipulate(string $path, float $start, float $end)
  {
    $file = $this->file->get_file($path);
    return $this->render->cut(2.3, 4.5, $file);
  }
}

$data = new Video();
echo $data->manipulate('videos/node.mp4', 2.3, 4.5);