<?php

include 'Solver.php';
include 'Reader.php';
include 'Writer.php';

$files = [
  'a.txt',
  'b.txt',
  'c.txt',
  'd.txt',
  'e.txt',
  'f.txt',
];

foreach ($files as $filename) {
  d($filename);
  $reader = new Reader($filename);
  $data = $reader->read();

  $solver = new Solver($data);
  $solution = $solver->solve();

  $writer = new Writer($filename, $solution);
  $writer->write();
}

function n($number) {
  return number_format($number, 0, '', ',');
}

function d($output) {
  if (is_string($output)) {
    echo ">> $output\n";
  } else {
    print_r($output);
  }
}
