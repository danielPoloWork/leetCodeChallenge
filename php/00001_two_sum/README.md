# 1. Two Sum
#Description at [leetcode.com](https://leetcode.com/problems/two-sum/description/)

## Intuition
Upon observing the problem, it appears to be a two-pointer or hash map problem with a target sum to find. From the 
nature of the problem, it's clear that we need to search over the array elements for two numbers such that their sum 
equals the target value, and it's important to note the indices of these numbers. However, Robust searching over the 
array with every two-number combination would be time-consuming, so one approach is to think about a more efficient way 
to access the data, like using a hash map.

## Approach
The approach is to utilize a hash map (in PHP, an associative array) to navigate through the array. The hash map stores 
each number in the array as a key and its index as a value. This way, we can find the 'complement' (the number that when 
added to a given number equals the target) quickly without the need to search the whole array.

The function works in the following sequence:
1. Initialize an empty hash map ($temp).
2. Iterate over the array, for each number, calculate its complement by subtracting it from the target sum.
3. Check if the complement is available in the hash map. If it is, we have found a pair whose sum equals our target, and 
   we stop the searching process.
4. If the complement is not found, store the current number as a key into the map with its index as a value, so we can 
   find it later quickly when the complement is encountered.

## Complexity
- Time Complexity: O(n)

We're taking advantage of the fact that hash operations (adding, checking) are fast (O(1)). The time complexity is O(n) 
due to a single pass through the given numbers array. Here, n represents the length of the input array.

- Space Complexity: O(n)

As for space complexity, in the worst case scenario, every element from the array ends up in the hash map (when there 
are no two numbers adding up to the target sum in the array). Also, we are using fixed size variables which do not add 
up to space complexity. Here, n represents the number of items stored in the hash map which can at most be the number of 
elements in the input.

## Code
```php
class Solution {

    function twoSum(array $nums, int $target): array {
        $output = [];

        try {
            $temp = [];
            foreach ($nums as $indexOf => $num) {
                $complement = $target - $num;

                if (array_key_exists($complement, $temp)) {
                    $output = [$temp[$complement], $indexOf];
                    break;
                }

                $temp[$num] = $indexOf;
            }
        } catch (Throwable $t) {
            print_r("Caught exception:  {$t->getMessage()} \n");
        }
        
        return $output;
    }
}
```