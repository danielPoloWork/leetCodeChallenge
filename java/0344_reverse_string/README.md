# 344. Reverse string
#Description at [leetcode.com](https://leetcode.com/problems/reverse-string/description/)

## Intuition
The most straightforward and efficient way to reverse an array of characters is by using the two-pointer approach. This 
method involves placing one pointer at the beginning of the array and the other at the end. By swapping the characters 
at these pointers and moving the pointers towards each other, we can reverse the array in place without using additional 
memory.

## Approach
1. Initialize Pointers: Start with two pointers, left at the beginning (index 0) and right at the end 
   (index s.length - 1).
2. Swap Elements: While the left pointer is less than the right pointer, swap the characters at these pointers.
    - Use a temporary variable to hold the value at the left pointer while swapping.
3. Move Pointers: Increment the left pointer and decrement the right pointer to move towards the center of the array.
4. Terminate: The loop terminates when the left pointer is no longer less than the right pointer, indicating that the 
   entire array has been reversed.

> This method ensures that the array is reversed efficiently and in place. This operation could also be performed by 
> using the built-in Java method `Collections.reverse()` and `Arrays.asList()`. First, `Arrays.asList()` function in 
> Java returns a new List with elements in the same order, then `Collections.reverse()` is used to reverse the order of 
> elements in this List. After the reverse operation, the List is converted back into the array by using `List.toArray()
> `. It doesn't actually modify the original array unlike this function since it involves creating an intermediate List. 
> However, this function has been created for demonstration purposes, to explain the logic behind array reversing.

## Complexity
- Time complexity:

The time complexity is 𝑂(𝑛), where 𝑛 is the length of the array. Each element is accessed and swapped exactly once, 
resulting in linear time complexity.

- Space complexity:

The space complexity is 𝑂(1). This approach uses a constant amount of extra memory (for the pointers and the temporary 
variable), regardless of the input size.

## Code
```java
class Solution {
    public static void reverseString(char[] s) {
        int left  = 0;            
        int right = s.length - 1; 
            
        while (left < right) {
            char temp = s[left];  
            s[left]   = s[right]; 
            s[right]  = temp;    
                
            left++; 
            right--; 
        } 
    }
}
```

## Built-in method
```java
public class Solution {
    public static void reverseString(Character[] s) {
        List<Character> list = Arrays.asList(s);
        Collections.reverse(list);
        s = list.toArray(new Character[0]);
    }
}
```