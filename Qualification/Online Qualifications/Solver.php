<?php

class Solver {

  public function __construct($data) {
    $this->parameters = $data['parameters'];
    $this->streets    = $data['streets'];
    $this->cars       = $data['cars'];
    $this->traffic    = [];

    // Empty array to store number of streets of each intersection
    $this->intersections = [];
  }

  public function solve() {
    $this->get_traffic_of_streets();
    $this->calculate_intersections_weight();
    $solution = count($this->intersections) . "\n";
    foreach ($this->intersections as $intersection_id => $end_streets) {
      $solution .= "$intersection_id\n";
      $solution .= count($end_streets) . "\n";
      arsort($end_streets);
      foreach ($end_streets as $street_name => $traffic){
        // Set the duration of the green light equal to the total
        // number of cars that will pass from that street.
        // I divided that number by 2. I also tried various values from
        // 3 up to 8 and got better scores in some datasets
        $weight = ceil($traffic / 2);
        $solution .= "$street_name $weight\n";
      }
    }
    return $solution;
  }

  protected function calculate_intersections_weight() {
    $intersections = [];
    foreach ($this->streets as $idx => $street) {
      $weight = isset($this->traffic_by_street[$street['name']])? $this->traffic_by_street[$street['name']]:1;
      $intersections[$street['end']][$street['name']] = $weight;;
    }

    uasort($intersections, function($a, $b){
      return count($a) < count($b);
    });

    $this->intersections = $intersections;
  }

  protected function get_traffic_of_streets() {
    $all_traffic = [];
    foreach ($this->cars as $car) {
      $all_traffic = array_merge($all_traffic, $car['streets']);
    }
    $this->traffic_by_street = array_count_values($all_traffic);
  }
}
