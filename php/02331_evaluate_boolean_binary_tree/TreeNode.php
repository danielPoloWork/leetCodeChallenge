<?php

/**
 * Class TreeNode represents a node in a binary tree.
 *
 */
class TreeNode {
    public int $val;
    public ?TreeNode $left;
    public ?TreeNode $right;

    /**
     * __construct method
     *
     * @param int $val The value of the TreeNode (default: 0)
     * @param ?TreeNode $left The left child of the TreeNode (default: null)
     * @param ?TreeNode $right The right child of the TreeNode (default: null)
     *
     * @return void
     */
    public function __construct(int $val = 0, ?TreeNode $left = null, ?TreeNode $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}