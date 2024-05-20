# 1863. Sum of all subset XOR totals
#Description at [leetcode.com](https://leetcode.com/problems/sum-of-all-subset-xor-totals/description/)

## Intuition
The problem asks us to find the sum of all XOR totals for every subset of a given array. Initially, we can think about 
generating all possible subsets of the array and then calculating the XOR for each subset. However, doing this 
explicitly might be computationally expensive given the constraints. Instead, a recursive approach can simplify the 
problem by considering each element and deciding whether to include it in the current subset XOR calculation or not.

## Approach
To solve this problem, we can use a recursive approach to generate all possible subsets of the given array. The 
recursive function will handle the XOR calculation dynamically as it generates each subset. This approach ensures that 
all subsets are considered, and their XOR totals are calculated efficiently using recursion.

- Recursive function definition:

We define a helper function that takes the current index in the array and the current XOR value as parameters.

- Base case:

When the index reaches the length of the array, it means we have considered all elements. The current XOR value at this 
point is the XOR total of the current subset.

- Recursive case:

At each step, we have two choices:
Include the current element in the subset, updating the XOR value.
Exclude the current element from the subset, keeping the XOR value unchanged.

- Summing XOR totals:

The result for each recursive call is the sum of XOR totals from both scenarios (including and excluding the current 
element).


## Complexity
- Time complexity:

Time complexity: The time complexity of this approach is 𝑂(2𝑛), where 𝑛 is the number of elements in the input array. 
This is because each element can either be included or excluded, leading to 2𝑛 possible subsets.

- Space complexity:

Space complexity: The space complexity is 𝑂(𝑛) due to the recursion stack. In the worst case, the depth of the recursion 
tree will be equal to the number of elements in the array.

## Code
```php
class Solution {
    function subsetXORSum(array $nums): int {
        return $this->helper($nums, 0, 0);
    }

    private function helper(array $nums, int $index, int $currentXOR): int {
        $sum = 0;
        try {
            if ($index == count($nums)) {
                $sum = $currentXOR;
            } else {
                $include = $this->helper($nums, $index + 1, $currentXOR ^ $nums[$index]);
                $exclude = $this->helper($nums, $index + 1, $currentXOR);
                $sum = $include + $exclude;
            }
        } catch (Throwable $t) {
            print_r("Caught exception:  {$t->getMessage()} \n");
        }
        return $sum;
    }
}
```