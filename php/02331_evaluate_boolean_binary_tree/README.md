# 2331. Evaluate boolean binary tree
#Description at [leetcode.com](https://leetcode.com/problems/evaluate-boolean-binary-tree/description/)

## Intuition
Initially, when considering the problem of evaluating a binary tree based on its structure, my thoughts revolved around 
recursively traversing the tree while keeping track of certain conditions to determine the outcome based on the 
properties of the tree nodes.

## Approach
Here's the approach I took to evaluate the binary tree:
1. **Recursive Traversal**: Traverse the binary tree recursively to evaluate each node.
2. **Check Leaf Nodes**: If a node is a leaf node (i.e., it has no left or right child), check its value to determine the evaluation.
3. **Evaluate Internal Nodes**: For internal nodes, perform a logical operation based on the node's value and the evaluations of its left and right subtrees.
4. **Handle Exceptions**: Use exception handling to catch any errors that might occur during traversal or evaluation.

Overall, this approach ensures that the tree is traversed effectively, and each node is evaluated based on its structure and values.

## Complexity
- Time complexity:

The time complexity of this approach depends on the number of nodes in the binary tree. In the worst case, where the 
tree is completely unbalanced, the time complexity would be O(n), where n is the number of nodes in the tree.

- Space complexity:

The space complexity also depends on the number of nodes in the binary tree. In the recursive approach, the space 
complexity is determined by the depth of the tree, which can be O(n) in the worst case if the tree is completely 
unbalanced. Therefore, the space complexity is also O(n).

## Code
```php

class Solution {

    public function evaluateTree(TreeNode $root): bool {
        $output = false;

        try {
            if ($root->left === null && $root->right === null) {
                $output = $root->val == 1;
            }

            $leftValue  = $this->evaluateTree($root->left);
            $rightValue = $this->evaluateTree($root->right);

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
```