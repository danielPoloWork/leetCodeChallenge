# 78. Subsets
#Description at [leetcode.com](https://leetcode.com/problems/subsets/description/)

## Intuition
Generating all possible subsets of a given set involves iterating through all possible combinations of elements. Since 
each element can either be included or excluded from a subset, we can represent each subset as a binary string, where 
each bit represents the inclusion or exclusion of the corresponding element.

## Approach
To generate all subsets efficiently, we can use a bitmasking approach. We iterate through all possible integers from 0 
to 2^N - 1, where N is the number of elements in the set. For each integer i, we interpret its binary representation as 
a subset: if the j-th bit of i is set, we include the j-th element in the subset; otherwise, we exclude it.

## Complexity
- Time complexity:

The time complexity of this approach is O(2^n * n), where n is the number of elements in the input vector nums. This 
complexity arises from iterating through all possible subsets and copying elements into each subset.

- Space complexity:

The space complexity is also O(2^n * n), where n is the number of elements in the input vector nums. This complexity 
accounts for the space required to store all generated subsets.

## Code
```rs
impl Solution {
    pub fn subsets(nums: Vec<i32>) -> Vec<Vec<i32>> {
        let mut output: Vec<Vec<i32>> = Vec::new();
        let num_size = nums.len();
        let num_subset = 1 << num_size;

        for i in 0..num_subset {
            let mut temp: Vec<i32> = Vec::new();
            for j in 0..num_size {
                if (i >> j) & 1 == 1 {
                    temp.push(nums[j]);
                }
            }
            output.push(temp);
        }
        output
    }
}
```