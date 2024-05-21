# 78. Subsets
#Description at [leetcode.com](https://leetcode.com/problems/subsets/description/)

## Intuition
To generate all possible subsets (the power set) of a given array of unique integers, the idea is to recognize that for 
an array of size n, there are 2^n possible subsets. Each subset can be represented by a binary number where each bit 
represents whether an element from the array is included in the subset or not.

## Approach
1. Total subsets calculation:

For an array with n elements, there are 2^n possible subsets. This is because each element has two choices: either it is 
included in the subset or it is not.

2. Binary representation:

Iterate through numbers from 0 to 2^n - 1. Each number can be viewed as a binary representation where the j-th bit 
indicates whether the j-th element of the array is included in the subset.

3. Construct subsets:

For each number, check each bit. If the j-th bit is set, include the j-th element of the array in the current subset.

4. Collect subsets:

Store each generated subset in the output array.

## Complexity
- Time complexity:

O(n ⋅ 2^n) Generating each subset takes linear time proportional to the size of the input array, and there are 2^n 
subsets to generate.

- Space complexity:

O(n ⋅ 2^n) The space required to store all subsets is proportional to the number of subsets times the average size of 
each subset.

## Code
```php
class Solution {

    function subsets(array $nums): array {
        $output = [];
        $numSize = sizeof($nums);
        $numSubset = 2**$numSize;
        
        for($i = 0; $i < $numSubset; $i++){
            $temp = [];
            for($j = 0; $j < $numSize; $j++) {
                if (($i >> $j) & 1) {
                    $temp[] = $nums[$j];
                }
            }
            $output[] = $temp;
        }
        return $output;
    }
}
```