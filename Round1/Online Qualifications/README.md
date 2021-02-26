Sumbitted solution for the Online Qualification Round.

Run it with:
```php
$ php main.php
```
# Solution
- Get total number of cars that will drive through any street, throughout the 
duration of the simulation.
- Sort all intersections by number of end streets.  That is, number of streets 
that end in that intersection, which are the intersection's entry points.
- Set the 'green time' for each traffic light equal to the total number of cars
that will pass through there.
- The time above might get quite big. Try to divide it by 2, 3, 4 etc to set
smaller intervals.

# Score:
Somewhere close to 7,700,000 depending on the division (see last step of the solution above)
