# Solution1.py

from GenericSolution import GenericSolution

class Solution(GenericSolution):

    def solve(self):
        # sort pizzas by number of ingredients
        self.PIZZAS.sort(key=lambda x: x['count'], reverse=True)

        # deal pizzas to teams, trying to fill the larger teams first
        team_sizes = {
            2: self.parameters['T2'],
            3: self.parameters['T3'],
            4: self.parameters['T4'],
        }

        output = ''
        total_number_of_teams = 0
        # For each team size
        for t in range(4, 1, -1):
            if len(self.PIZZAS) >= t and len(self.PIZZAS) - t != 1:
                print(str(t) + '-sized teams:')
                # For each team
                for i in range(team_sizes[t]):
                    if len(self.PIZZAS) >= t:
                        output += str(t) + ' '
                        p = []
                        for k in range(t):
                            p.append(self.PIZZAS.pop(0)['id'])

                        output += ' '.join(p) + '\n'
                        total_number_of_teams = total_number_of_teams + 1

        # Return actual solution
        output = str(total_number_of_teams) + '\n' + output
        return str(output)
