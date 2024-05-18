<?php

/**
 * You are given the root of a binary tree with n nodes where each node in the tree has node.val coins. There are n
 * coins in total throughout the whole tree.
 *
 * In one move, we may choose two adjacent nodes and move one coin from one node to another. A move may be from parent
 * to child, or from child to parent.
 *
 * Return the minimum number of moves required to make every node have exactly one coin.
 */
class Solution {
    /**
     * @var int $moves Represents the total moves made to distribute the coins.
     */
    private int $moves = 0;

    /**
     * A method that initiates the distribution of coins in the Binary Tree.
     *
     * It traverses the tree using Depth-First Search (DFS) and returns the total moves made.
     *
     * @param ?TreeNode $root The root node of the Binary Tree.
     *
     * @return int The total moves made to distribute the coins.
     */
    function distributeCoins(?TreeNode $root): int {
        $output = 0;
        try {
            /** Perform Depth-First Search on the tree to distribute the coins */
            $this->depthFirstSearch($root);
            $output = $this->moves;
        } catch (Throwable $t) {
            /** Handle any exceptions that occur during execution */
            print_r("Caught exception:  {$t->getMessage()} \n");
        }

        return $output;
    }

    /**
     * A method that traverses the Binary Tree using Depth-First Search (DFS).
     *
     * It calculates the balance of each node (how many coins need to be moved
     * in or out) and increases the total amount of moves made.
     *
     * @param ?TreeNode $node The current node being visited in the DFS.
     *
     * @return int The balance of the current node.
     */
    private function depthFirstSearch(?TreeNode $node): int {
        $resolve = 0;

        try {
            /** Check if target node exists */
            if ($node !== null) {
                /** Perform DFS on the left subtree and right subtree */
                $leftBalance = $this->depthFirstSearch($node->left);
                $rightBalance = $this->depthFirstSearch($node->right);

                /** Calculate the current node's balance */
                $currentBalance = $node->val - 1 + $leftBalance + $rightBalance;

                /** Increment the moves by the total coins moved in/out of this node */
                $this->moves += abs($leftBalance) + abs($rightBalance);

                $resolve = $currentBalance;
            }
        } catch (Throwable $t) {
            /** Handle any exceptions that occur during execution */
            echo 'Caught exception: ', $t->getMessage(), "\n";
        }

        return $resolve;
    }
}
