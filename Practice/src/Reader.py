# Reader.py

class Reader:


    def __init__(self, filename):
        self.filename = filename
        self.pizzas = []

    def read_file(self, calculate_unique_ingredients = False):
        total_ingredients = {}
        file = open(self.filename, 'r')
        # Store first line in an list
        first_line = file.readline().split()

        # Store parameters
        M, T2, T3, T4 = [int(i) for i in first_line]
        self.parameters = {
            'M':  M,
            'T2': T2,
            'T3': T3,
            'T4': T4,
        }

        # For each pizza
        for i in range(self.parameters['M']):
            # Read pizza parameters
            p = file.readline().split()
            # Get ingredients count
            c = p.pop(0)
            if calculate_unique_ingredients:
                for j in p:
                    total_ingredients[j] = True
            # Store pizza in global list
            self.pizzas.append({
                'id': str(i),
                'count': int(c),
                'ingredients': p
            })
        # Close file
        file.close()
        if calculate_unique_ingredients:
            self.parameters['TI'] = len(total_ingredients)

    def get_parameters(self):
        return self.parameters

    def get_pizzas(self):
        return self.pizzas

