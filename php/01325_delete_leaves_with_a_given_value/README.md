# 1325. Delete Leaves With a Given Value
#Description at [leetcode.com](https://leetcode.com/problems/delete-leaves-with-a-given-value/description/)


## Intuition
When given a binary tree and a target value, the task is to remove all the leaf nodes that have this target value. Additionally, if removing these leaf nodes results in their parent nodes becoming leaf nodes with the same target value, these parent nodes should also be removed. This process continues until no more leaf nodes with the target value exist.

The best way to approach this problem is through a post-order traversal (left, right, root). This method ensures that we handle the leaf nodes first before dealing with their parent nodes. Using recursion helps simplify the traversal and modification process.

## Approach
1. **Recursive Traversal**: Use a recursive function to perform a post-order traversal on the binary tree. This ensures that we process each node's children before the node itself.
2. **Node Processing**: During the traversal, check if a node is a leaf node and if its value matches the target. If both conditions are met, set the node to null, effectively removing it.
3. **Error Handling**: Include error handling to catch any exceptions during execution, ensuring robustness.
4. **Edge Cases**: Consider edge cases such as an empty tree or a tree where no nodes match the target value.

This approach ensures that all target leaf nodes are removed while maintaining the integrity of the binary tree. By using post-order traversal, we handle the nodes in the correct order, allowing for efficient and effective node removal.

## Complexity
- Time complexity:

The time complexity of the solution is 𝑂(𝑛), where 𝑛 is the number of nodes in the tree. This is because each node is visited exactly once during the traversal.

- Space complexity:

The space complexity is 𝑂(ℎ), where ℎ is the height of the tree. This is due to the recursion stack. In the worst case, the height of the tree could be equal to the number of nodes (for a skewed tree), making the space complexity 𝑂(𝑛). For a balanced tree, the height is 𝑂(log𝑛).

## Code
```php

class Solution {
    
    function removeLeafNodes(TreeNode $root, int $target): ?TreeNode {
        $output = null; 

        try {
            $output = $this->removeTargetLeaves($root, $target);
        } catch (Exception $exception) {
            error_log("Caught exception: {$exception->getMessage()} \n");
        }
        
        return $output;
    }

    private function removeTargetLeaves(TreeNode $node, int $target): ?TreeNode {
        $output = $node;

        if ($node !== null) {
            $node->left = $this->removeTargetLeaves($node->left, $target); // Process left subtree
            $node->right = $this->removeTargetLeaves($node->right, $target); // Process right subtree

            if ($node->left === null && $node->right === null && $node->val == $target) {
                $output = null;
            }
        } else {
            $output = null;
        }

        return $output;
    }
}
```