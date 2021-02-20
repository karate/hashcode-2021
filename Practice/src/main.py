# main.py

from Reader import Reader
from Solution1 import Solution

# Input data sets
files =  [
    'a_example',                        # 5 pizzas,    7 unique ingredients
    'b_little_bit_of_everything.in',    # 500 pizzas,  10 unique ingredients
    'c_many_ingredients.in',            # 10K pizzas,  10K unique ingredients
    'd_many_pizzas.in',                 # 100K pizzas, 100 unique ingredients
    'e_many_teams.in'                   # 100K pizzas, 100 unique ingredients
]

# For each dataset
for filename in files:
    reader = Reader(filename)
    reader.read_file(calculate_unique_ingredients = True);

    # SOLVE PROBLEM
    s = Solution(
        reader.get_parameters(),
        reader.get_pizzas()
    )

    # Open output file
    f = open(filename.split('.')[0] + '.out', 'w')
    # Write solution
    f.write(s.solve())
    f.close()
