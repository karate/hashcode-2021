# GenericSolution.py

# Generic solution class. Actual solutions will
# inherit this class and override the `solve` method
class GenericSolution:

    def __init__(self, parameters, pizzas):
        self.parameters = parameters
        self.pizzas = pizzas

    def solve(self):
        pass
