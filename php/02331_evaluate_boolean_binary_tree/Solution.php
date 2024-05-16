<?php

/**
 * You are given the root of a full binary tree with the following properties:
 * - Leaf nodes have either the value 0 or 1, where 0 represents False and 1 represents True.
 * - Non-leaf nodes have either the value 2 or 3, where 2 represents the boolean OR and 3 represents the boolean AND.
 *
 * The evaluation of a node is as follows:
 * - If the node is a leaf node, the evaluation is the value of the node, i.e. True or False.
 * - Otherwise, evaluate the node's two children and apply the boolean operation of its value with the children's evaluations.
 *
 * Return the boolean result of evaluating the root node.
 *
 * A full binary tree is a binary tree where each node has either 0 or 2 children.
 *
 * A leaf node is a node that has zero children.
 */
class Solution {

    /**
     * Evaluates a binary tree and returns a boolean value based on its structure.
     *
     * @param TreeNode $root The root node of the binary tree to evaluate.
     * @return bool The boolean value based on the evaluation of the binary tree.
     */
    public function evaluateTree(TreeNode $root): bool {
        $output = false;

        try {
            /** If the root node is a leaf node, which is determined by checking if both its left and right child nodes
             * are null, then we return the root node's value, after checking if it is equal to 1
             */
            if ($root->left === null && $root->right === null) {
                $output = $root->val == 1;
            }

            /** Recursive calls are made to evaluate the left and right subtrees, and their return values are stored
             * in leftValue and rightValue respectively
             */
            $leftValue  = $this->evaluateTree($root->left);
            $rightValue = $this->evaluateTree($root->right);

            /** The root node's value is checked for being 2
             * - If it is equal to 2, the boolean OR operation is performed on leftValue and rightValue, and the result
             * is stored in output
             * - Else, the boolean AND operation is performed on leftValue and rightValue, and the result is stored in
             * output
             */
            if ($root->val == 2) {
                $output = $leftValue || $rightValue;
            } else {
                $output = $leftValue && $rightValue;
            }
        } catch (Throwable $exception) {
            print_r("Caught exception:  {$exception->getMessage()} \n");
        }

        return $output;
    }
}