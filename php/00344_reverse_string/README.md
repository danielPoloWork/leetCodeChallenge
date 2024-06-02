## Intuition
To reverse an array of characters efficiently, a two-pointer approach immediately comes to mind. This approach involves 
using two pointers, one starting at the beginning and the other at the end of the array. By swapping the characters at 
these two pointers and moving them towards each other, we can reverse the array in place without needing extra space.

## Approach
1. Initialize Pointers: Start with two pointers, left at the beginning (index 0) and right at the end 
   (index count($s) - 1).
2. Swap Elements: While left is less than right, swap the elements at these pointers.
    - Use a temporary variable to hold the value at left while swapping.
3. Move Pointers: Increment the left pointer and decrement the right pointer to move towards the center.
4. Terminate: The loop stops when left is no longer less than right, indicating the entire array has been reversed.

> This method ensures the array is reversed efficiently with minimal memory usage. This operation could also be 
> performed by using the built-in PHP method `array_reverse`. The `array_reverse` function in PHP returns a new array
> with elements in reverse order. It does not modify the original array unlike this function. However, this function has 
> been created for demonstration purposes, to understand the logic behind array reversing.

## Complexity
- Time complexity:

The time complexity is 𝑂(𝑛), where 𝑛 is the length of the array. This is because we are iterating through the array and 
performing a constant-time swap operation for each pair of elements.

- Space complexity:

The space complexity is 𝑂(1). This is because we are only using a few extra variables (left, right, and temp) and not 
any additional space proportional to the input size.

## Code
```php
class Solution {

    /**
     * @param String[] $s
     * @return void
     */
    function reverseString(&$s): void {
        $left  = 0;
        $right = count($s) - 1;

        while ($left < $right) {
            $temp      = $s[$left];
            $s[$left]  = $s[$right];
            $s[$right] = $temp;

            $left++;
            $right--;
        }
    }
}
```