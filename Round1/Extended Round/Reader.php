<?php

class Reader {

  protected $filename;

  public function __construct($filename) {
    $this->filename = $filename;
  }

  public function read() {
    // Open file
    $f = fopen($this->filename, "r");
    // Read first line (parameters)
    list($D, $I, $S, $V, $F) = explode(' ', trim(fgets($f)));

    // Read all Streets
    $this->streets = [];
    for ($i = 0; $i < $S; $i++) {
      list($start_int, $end_int, $street_name, $travel_time) = explode(' ', trim(fgets($f)));
      $this->streets[$street_name] = [
          'start' => $start_int,
          'end'   => $end_int,
          'name'  => $street_name,
          'time'  => $travel_time,
      ];
    }
    // Read all cars
    $this->cars = [];
    for ($i = 0; $i < $V; $i++) {
      $car_desc = explode(' ', trim(fgets($f)));
      $car_count = array_shift($car_desc);
      $car_streets = $car_desc;
      $car = [
        'count'  => $car_count,
        'streets'=> $car_streets,
      ];

      $total_travel_time = $this->get_travel_time($car);
      #if ($total_travel_time > $D) {
      #  echo "Ignoring car with time $total_travel_time at $D\n";
      #  continue;
      #}

      $this->cars[] = [
        'count'  => $car_count,
        'streets'=> $car_streets,
        'total_time' => $total_travel_time,
      ];
    }
    fclose($f);

    $data = [
      'parameters' => [
        'duration'      => $D,
        'intersections' => $I,
        'streets'       => $S,
        'cars'          => $V,
        'bonus'         => $F,
      ],
      'streets' => $this->streets,
      'cars' => $this->cars,
    ];
    return $data;
  }

  protected function get_travel_time($car) {
    $time = 0;
    foreach($car['streets'] as $street_name) {
      $time += $this->streets[$street_name]['time'];
    }
    return $time;
  }
}
