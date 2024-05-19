# 3068. Find the maximum sum of node values
#Description at [leetcode.com](https://leetcode.com/problems/find-the-maximum-sum-of-node-values/description/)


## Intuition
When approaching this problem, our initial thought is to leverage XOR operations to manipulate the node values in the 
binary tree and maximize their sum. We understand that XORing a number with a positive integer can potentially increase 
its value, and we aim to exploit this property to optimize the overall sum of node values.

## Approach
Our approach begins by traversing the binary tree to compute the initial sum of node values. We iterate through each 
node, accumulating their values to obtain the total sum. This step provides us with a baseline for comparison after 
performing XOR operations.

Next, we iterate through the nodes again to assess the impact of XOR operations. For each node, we calculate the 
difference between its XORed value with the given positive integer and its original value. We track both the total 
difference achieved and the count of positive differences encountered during this process. Additionally, we keep a 
record of the smallest non-negative difference observed.

After computing the total difference, we check if the count of positive differences is odd. If it is, we adjust the 
total difference by subtracting the smallest non-negative difference. This adjustment ensures that we maximize the sum 
of node values by considering the parity of positive differences.

Finally, we add the total difference to the initial sum of node values. This combined sum represents the maximum 
possible sum of node values achievable after executing the XOR operations.

## Complexity
- Time complexity:

Our approach has a time complexity of 𝑂(𝑛), where 𝑛 is the number of nodes in the binary tree. We traverse the tree 
twice, once to compute the initial sum of node values and once to calculate the total difference achieved by XOR 
operations. As each node is visited once during each traversal, the time complexity remains linear with respect to the 
number of nodes.

- Space complexity:

The space complexity of our approach is 𝑂(1), indicating constant space usage. We utilize a fixed amount of additional 
space to store variables such as the total sum of node values, the total difference achieved by XOR operations, and 
counters for positive differences. Since the space required does not depend on the size of the input tree, our algorithm 
maintains a constant memory footprint.

## Code
```php
class Solution {
    public function maximumValueSum(array $nodes, int $positiveNumber, array $edges): int {
        $output = 0;

        try {
            $nodeSum = 0;

            foreach ($nodes as $node) {
                $nodeSum += $node;
            }

            $nodesDifference = 0;
            $positiveCount = 0;
            $smallestIncreaseXOR = PHP_INT_MAX;

            foreach ($nodes as $node) {
                $nodeDifference = ($node ^ $positiveNumber) - $node;
                
                if ($nodeDifference > 0) {
                    $nodesDifference += $nodeDifference;
                    $positiveCount++;
                }

                $smallestIncreaseXOR = min($smallestIncreaseXOR, abs($nodeDifference));
            }

            if ($positiveCount % 2 == 1) {
                $nodesDifference -= $smallestIncreaseXOR;
            }

            $output =  $nodeSum + $nodesDifference;

        } catch (Throwable $t) {
            print_r("Caught exception:  {$t->getMessage()} \n");
        }

        return $output;
    }
}
```