<?php

class Writer {

  protected $filename;
  protected $output;

  public function __construct($filename, $output) {
    $this->filename = $filename;
    $this->output = $output;
  }

  public function write() {
    $f = fopen(pathinfo($this->filename, PATHINFO_FILENAME) . '.out', 'w');
    fwrite($f, $this->output);
    fclose($f);
  }

}
