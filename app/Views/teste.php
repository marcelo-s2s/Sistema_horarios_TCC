<?php

// Classe que representa uma solução para a grade de horários
class TimetableSolution {
    public $schedule; // Array associativo: chave "dia_periodo" e valor com dados da alocação
    public $cost; // Custo da solução (quanto menor, melhor)

    public function __construct($schedule = []) {
        $this->schedule = $schedule;
        $this->cost = $this->calculateCost();
    }

    // Função que calcula o custo da solução com base em restrições violadas
    public function calculateCost() {
        $cost = 0;
        
        foreach ($this->schedule as $key => $assignment) {
            // Penaliza slots incompletos
            if (!isset($assignment['teacher']) || !isset($assignment['room']) || !isset($assignment['course'])) {
                $cost += 10;
            }
        }
        
        return $cost;
    }

    // Cria uma cópia da solução atual
    public function cloneSolution() {
        $clonedSchedule = unserialize(serialize($this->schedule));
        return new TimetableSolution($clonedSchedule);
    }
}

// Gera uma solução inicial, podendo ser aleatória ou baseada em heurísticas
function generateInitialSolution() {
    $schedule = [];
    $days = 5;
    $periodsPerDay = 4;
    
    for ($d = 0; $d < $days; $d++) {
        for ($p = 0; $p < $periodsPerDay; $p++) {
            $key = "{$d}_{$p}";
            $schedule[$key] = [
                'teacher' => rand(1, 5), 
                'room'    => rand(1, 3), 
                'course'  => rand(1, 10) 
            ];
        }
    }
    
    return new TimetableSolution($schedule);
}

// Gera uma solução vizinha, modificando aleatoriamente um slot da solução atual
function generateNeighbor($currentSolution) {
    $newSolution = $currentSolution->cloneSolution();
    $keys = array_keys($newSolution->schedule);
    $randomKey = $keys[array_rand($keys)];
    
    $newSolution->schedule[$randomKey] = [
        'teacher' => rand(1, 5),
        'room'    => rand(1, 3),
        'course'  => rand(1, 10)
    ];
    
    $newSolution->cost = $newSolution->calculateCost();
    return $newSolution;
}

// Implementação do algoritmo Simulated Annealing
function simulatedAnnealing($initialSolution, $initialTemperature, $coolingRate, $minTemperature, $maxIterations) {
    $currentSolution = $initialSolution;
    $bestSolution = $initialSolution;
    $temperature = $initialTemperature;

    while ($temperature > $minTemperature) {
        for ($i = 0; $i < $maxIterations; $i++) {
            $newSolution = generateNeighbor($currentSolution);
            $deltaCost = $newSolution->cost - $currentSolution->cost;

            if ($deltaCost < 0) {
                $currentSolution = $newSolution;
            } else {
                $acceptanceProbability = exp(-$deltaCost / $temperature);
                if (mt_rand() / mt_getrandmax() < $acceptanceProbability) {
                    $currentSolution = $newSolution;
                }
            }
            
            if ($currentSolution->cost < $bestSolution->cost) {
                $bestSolution = $currentSolution;
            }
        }
        
        $temperature *= $coolingRate;
    }
    
    return $bestSolution;
}

// Configuração do algoritmo
$initialSolution = generateInitialSolution();
$initialTemperature = 1000;
$coolingRate = 0.95;
$minTemperature = 0.1;
$maxIterations = 100;

// Executa o Simulated Annealing
$finalSolution = simulatedAnnealing($initialSolution, $initialTemperature, $coolingRate, $minTemperature, $maxIterations);

// Exibe os resultados
echo "Custo da melhor solução encontrada: " . $finalSolution->cost . "\n";
echo "Grade de horários:\n";
print_r($finalSolution->schedule);

?>
