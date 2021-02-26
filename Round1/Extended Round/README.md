Sumbitted solution for the Extended Round

Run it with:
```php
$ php main.php
```
# Solution
- Get total number of cars that will drive through any street, throughout the 
duration of the simulation.
- Sort all intersections by number of end streets.  That is, number of streets 
that end in that intersection, which are the intersection's entry points.
- For each traffic light, set the 'green time' to the number of cars that will pass through that street, 
normalized in a range [1, X], where X is an arbitrary upper limit (initially set to 3 seconds)

# Score:
Somewhere around 7,400,000 depending on the max traffic light time (see last step of the solution above)
