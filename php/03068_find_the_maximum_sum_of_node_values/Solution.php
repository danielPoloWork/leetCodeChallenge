<?php

/**
 * There exists an undirected tree with n nodes numbered 0 to n - 1. You are given a 0-indexed 2D integer array edges of
 * length n - 1, where edges[i] = [ui, vi] indicates that there is an edge between nodes ui and vi in the tree. You are
 * also given a positive integer k, and a 0-indexed array of non-negative integers nums of length n, where nums[i]
 * represents the value of the node numbered i.
 *
 * Alice wants the sum of values of tree nodes to be maximum, for which Alice can perform the following operation any
 * number of times (including zero) on the tree. Choose any edge [u, v] connecting the nodes u and v, and update their
 * values as follows:
 * - nums[u] = nums[u] XOR k
 * - nums[v] = nums[v] XOR k
 *
 * Return the maximum possible sum of the values Alice can achieve by performing the operation any number of times.
 *
 * - Hint 1: Select any node as the root.
 * - Hint 2: Let dp[x][c] be the maximum sum we can get for the subtree rooted at node x, where c is a boolean
 * representing whether the edge between node x and its parent (if any) is selected or not.
 * - Hint 3: dp[x][c] = max(sum(dp[y][cy]) + v(nums[x], sum(cy) + c)) where cy is 0 or 1. When sum(cy) + c is odd,
 * v(nums[x], sum(cy) + c) = nums[x] XOR k. When sum(cy) + c is even, v(nums[x], sum(cy) + c) = nums[x].
 * - Hint 4: There’s also an easier solution - does the parity of the number of elements where nums[i] XOR k > nums[i].
 */
class Solution {
    /**
     * This function evaluates the maximum possible sum of values of all nodes in a binary tree after performing certain operations.
     * We XOR some of the node values with a given positive integer and replace their original values if this yields an increase.
     *
     * @param array $nodes Array of integers representing the values of all the nodes in the binary tree.
     * @param int $positiveNumber The specific positive integer to be XORed with the current nodes.
     * @param array $edges Array of integers potentially representing the structure of the binary tree. Currently not used in function's logic.
     * @return int The maximum sum of the nodes' values after execution of the XOR operations.
     *
     * @throws Throwable If any error or exception occurs in the process, it will be caught and the message printed.
     */
    public function maximumValueSum(array $nodes, int $positiveNumber, array $edges): int {
        $output = 0; // Initialize output variable to 0

        try {
            $nodeSum = 0; // Initialize the sum of nodes to 0

            /** Iterate over all nodes, summing their values */
            foreach ($nodes as $node) {
                $nodeSum += $node;
            }

            /** Initialize two variables: $nodesDifference to track the sum of the differences
             and $smallestIncreaseXOR to keep track of the smallest non-negative difference */
            $nodesDifference = 0;
            $positiveCount = 0;
            $smallestIncreaseXOR = PHP_INT_MAX;

            /** Iterate over all nodes */
            foreach ($nodes as $node) {

                /** Calculate the difference between the XOR of the node and the positiveNumber and the node itself */
                $nodeDifference = ($node ^ $positiveNumber) - $node;

                /** If the difference is greater than 0, increment $nodesDifference and $positiveCount by the difference */
                if ($nodeDifference > 0) {
                    $nodesDifference += $nodeDifference;
                    $positiveCount++;
                }

                /** Update $smallestIncreaseXOR if necessary */
                $smallestIncreaseXOR = min($smallestIncreaseXOR, abs($nodeDifference));
            }

            /** If the count of positive differences is odd, subtract $smallestIncreaseXOR from $nodesDifference */
            if ($positiveCount % 2 == 1) {
                $nodesDifference -= $smallestIncreaseXOR;
            }

            /** Add $nodesDifference to the sum of all the nodes to get the final output */
            $output =  $nodeSum + $nodesDifference;

        } catch (Throwable $t) {
            /** If there's any exception, print it out */
            print_r("Caught exception:  {$t->getMessage()} \n");
        }

        return $output;
    }
}