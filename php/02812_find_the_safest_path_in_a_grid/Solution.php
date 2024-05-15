<?php

/**
 * You are given a 0-indexed 2D matrix grid of size n x n, where (r, c) represents:
 * - A cell containing a thief if grid[r][c] = 1
 * - An empty cell if grid[r][c] = 0
 *
 * You are initially positioned at cell (0, 0). In one move, you can move to any adjacent cell in the grid, including
 * cells containing thieves.
 *
 * The safeness factor of a path on the grid is defined as the minimum manhattan distance from any cell in the path to
 * any thief in the grid.
 *
 * Return the maximum safeness factor of all paths leading to cell (n - 1, n - 1).
 *
 * An adjacent cell of cell (r, c), is one of the cells (r, c + 1), (r, c - 1), (r + 1, c) and (r - 1, c) if it exists.
 *
 * The Manhattan distance between two cells (a, b) and (x, y) is equal to |a - x| + |b - y|, where |val| denotes the
 * absolute value of val.
 */
class Solution {
    /**
     * @param Integer[][] $grids
     * @return Integer
     */
    function maximumSafenessFactor(array $grids): int {
        $output = 0;
        try {
            // Total number of grids.
            $totalGrids = count($grids);

            // Represents all four directional up, down, left and right.
            $directions = [[0, 1], [0, -1], [1, 0], [-1, 0]];

            $distanceArray = [];
            for ($gridRow = 0; $gridRow < $totalGrids; ++$gridRow) {
                for ($gridColumn = 0; $gridColumn < $totalGrids; ++$gridColumn) {
                    $distanceArray[$gridRow][$gridColumn] = $grids[$gridRow][$gridColumn] ? 0 : PHP_INT_MAX;
                }
            }

            // Queue to hold the grids.
            $queue = new SplQueue();
            for ($gridRow = 0; $gridRow < $totalGrids; ++$gridRow) {
                for ($gridColumn = 0; $gridColumn < $totalGrids; ++$gridColumn) {
                    if ($grids[$gridRow][$gridColumn]) {
                        $queue->push([$gridRow, $gridColumn]);
                    }
                }
            }

            // Calculate the shortest distance from land to water.
            while (!$queue->isEmpty()) {
                list($row, $column) = $queue->dequeue();
                foreach ($directions as $direction) {
                    $neighbourRow = $row + $direction[0];
                    $neighbourColumn = $column + $direction[1];
                    if ($neighbourRow >= 0 && $neighbourRow < $totalGrids && $neighbourColumn >= 0 && $neighbourColumn < $totalGrids) {
                        if ($distanceArray[$neighbourRow][$neighbourColumn] > $distanceArray[$row][$column] + 1) {
                            $distanceArray[$neighbourRow][$neighbourColumn] = $distanceArray[$row][$column] + 1;
                            $queue->push([$neighbourRow, $neighbourColumn]);
                        }
                    }
                }
            }

            // Binary search to find maximum distance.
            $low = 0;
            $high = 2 * $totalGrids;
            while ($low <= $high) {
                $mid = $low + intdiv($high - $low, 2);
                if ($distanceArray[0][0] < $mid) {
                    $high = $mid - 1;
                    continue;
                }

                // Two dimensional array for tracking visited nodes.
                $visitTrack = [];
                for ($gridRow = 0; $gridRow < $totalGrids; ++$gridRow) {
                    for ($gridColumn = 0; $gridColumn < $totalGrids; ++$gridColumn) {
                        $visitTrack[$gridRow][$gridColumn] = false;
                    }
                }

                // Adding reachable nodes into the queue and checking end condition.
                $queue = new SplQueue();
                $queue->push([$distanceArray[0][0], 0, 0]);
                $visitTrack[0][0] = true;
                while (!$queue->isEmpty()) {
                    list($distance, $row, $column) = $queue->dequeue();
                    if ($row == $totalGrids - 1 && $column == $totalGrids - 1) {
                        $low = $mid + 1;
                        continue 2;
                    }
                    foreach ($directions as $direction) {
                        $neighbourRow = $row + $direction[0];
                        $neighbourColumn = $column + $direction[1];
                        if ($neighbourRow >= 0 && $neighbourRow < $totalGrids && $neighbourColumn >= 0 && $neighbourColumn < $totalGrids && !$visitTrack[$neighbourRow][$neighbourColumn] && $distanceArray[$neighbourRow][$neighbourColumn] >= $mid) {
                            $visitTrack[$neighbourRow][$neighbourColumn] = true;
                            $queue->push([$distanceArray[$neighbourRow][$neighbourColumn], $neighbourRow, $neighbourColumn]);
                        }
                    }
                }
                $high = $mid - 1;
            }

            // Resultant maximum safeness factor for the grids.
            $output = $high;
        } catch (Throwable $exception) {
            print_r("Caught exception:  {$exception->getMessage()} \n");
        }
        return $output;
    }
}