# 979. Distribute coins in binary tree
#Description at [leetcode.com](https://leetcode.com/problems/evaluate-boolean-binary-tree/description/)


## Intuition
My first thought when tackling this problem is to recognize that the task involves balancing a binary tree where each 
node either has too many or too few coins. The goal is to move coins between nodes in the fewest steps possible so that 
every node ends up with exactly one coin. Given that we need to distribute coins efficiently and understand the state of 
the entire tree as we make changes, a depth-first search (DFS) approach naturally comes to mind. By processing the tree 
from the bottom up (post-order traversal), we can make sure that each subtree is balanced before addressing the parent 
node, simplifying the redistribution process.

## Approach
The approach involves performing a DFS traversal on the tree and calculating the balance of each node:

1. Node Balance Calculation:

Each node's balance is calculated as node.val - 1. This represents the number of excess coins (positive balance) or the 
number of coins needed (negative balance).
2. Post-order Traversal:

By traversing the tree in post-order (left, right, root), we ensure that we process all children before their parent. 
This helps in managing the coin distribution at each subtree level first before addressing the parent node.
3. Balance Propagation:

For each node, compute the total balance by summing the balances of its left and right children. The number of moves
required for each node is the sum of the absolute values of the left and right child balances. This is because every 
imbalance must be corrected by moving coins.
4. Return Balance:

The balance of the current node (after processing its children) is returned to be used by its parent in the recursion.

## Complexity
- Time complexity:

The time complexity is 𝑂(𝑛), where 𝑛 is the number of nodes in the tree. This is because we visit each node exactly once 
during the DFS traversal.

- Space complexity:

The space complexity is 𝑂(ℎ), where ℎ is the height of the tree. This space is used by the system stack for recursion. 
In the worst case, for an unbalanced tree, this can be 𝑂(𝑛).

## Code
```php
class Solution {
    private int $moves = 0;

    function distributeCoins(?TreeNode $root): int {
        $output = 0;
        try {
            $this->depthFirstSearch($root);
            $output = $this->moves;
        } catch (Throwable $t) {
            print_r("Caught exception:  {$t->getMessage()} \n");
        }
        
        return $output;
    }

    private function depthFirstSearch(?TreeNode $node): int {
        $resolve = 0;
        
        try {
            if ($node !== null) {
                $leftBalance = $this->depthFirstSearch($node->left);
                $rightBalance = $this->depthFirstSearch($node->right);
                $currentBalance = $node->val - 1 + $leftBalance + $rightBalance;
                $this->moves += abs($leftBalance) + abs($rightBalance);

                $resolve = $currentBalance;
            }
        } catch (Throwable $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
        
        return $resolve;
    }
}
```