<?php

/**
 * Given a binary tree root and an integer target, delete all the leaf nodes with value target.
 *
 * Note that once you delete a leaf node with value target, if its parent node becomes a leaf node and has the value target, it should also be deleted (you need to continue doing that until you cannot).
 */
class Solution {
    /**
     * Function to remove leaf nodes from a TreeNode structure,
     * if their value matches the given target.
     *
     * @param TreeNode $root The root node of the subtree to be processed.
     * @param int $target The target value to be removed.
     *
     * @return ?TreeNode The modified tree root node or null if exception happens.
     */
    function removeLeafNodes(TreeNode $root, int $target): ?TreeNode {
        $output = null; // Initialize output

        try {
            /** Call the recursive function to process the tree and collect the modified tree node */
            $output = $this->removeTargetLeaves($root, $target);
        } catch (Exception $exception) {
            /** Log any exception that happens during the execution */
            error_log("Caught exception: {$exception->getMessage()} \n");
        }
        /** Return the modified tree node, or null if exception happened */
        return $output;
    }

    /**
     * A recursive private function to go through each node of the tree/subtree
     * and remove the leaves whose values match the target.
     *
     * @param TreeNode $node The root node of the subtree to be processed.
     * @param int $target The value to be matched.
     *
     * @return ?TreeNode The modified tree node.
     */
    private function removeTargetLeaves(TreeNode $node, int $target): ?TreeNode {
        /** Assume the tree node should not be removed by default */
        $output = $node;

        /** Check if the node is not null before further processing
            (a null node means we've reached the end of a tree branch during recursion) */
        if ($node !== null) {
            /** Recursively process both left and right children of the current node */
            $node->left = $this->removeTargetLeaves($node->left, $target); // Process left subtree
            $node->right = $this->removeTargetLeaves($node->right, $target); // Process right subtree

            /** If after processing the child-nodes, both of them are null (implying they were leaf nodes)
                And node's value is equal to the target value
                Then we need to remove this node (as this node is now a leaf node) */
            if ($node->left === null && $node->right === null && $node->val == $target) {
                /** 'Removing' the node by setting output as null,
                    As this function is recursive, it will effectively stop this branch from being included in final output*/
                $output = null;
            }
        } else {
            /** If node is null (end of a branch), then output is also null */
            $output = null;
        }

        /** Return the modified tree node (which may be null if a match was found) */
        return $output;
    }
}