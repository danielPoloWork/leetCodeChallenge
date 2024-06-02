import java.util.Arrays;

/**
 * Write a function that reverses a string. The input string is given as an array of characters s. You must do this by
 * modifying the input array in-place with O(1) extra memory.
 *
 * Constraints:
 * - 1 <= s.length <= 105
 * - s[i] is a printable ascii character.
 *
 * > Hint 1: The entire logic for reversing a string is based on using the opposite directional two-pointer approach!
 */
public class Solution {
    /**
     * The function reverseString is used to reverse the order of elements in an array of strings.
     * The function takes an array by reference, meaning changes made in the function will be reflected in the original
     * array.
     *
     * This operation could also be performed by using the built-in Java method `Collections.reverse()` and
     * `Arrays.asList()`. First, `Arrays.asList()` function in Java returns a new List with elements in the same order,
     * then `Collections.reverse()` is used to reverse the order of elements in this List. After the reverse operation,
     * the List is converted back into the array by using `List.toArray()`. It doesn't actually modify the original
     * array unlike this function since it involves creating an intermediate List. However, this function has been
     * created for demonstration purposes, to explain the logic behind array reversing.
     *
     * <pre>
     * List<Character> list = Arrays.asList(s);
     * Collections.reverse(list);
     * s = list.toArray(new Character[0]);
     * </pre>
     *
     * @param s The array of strings that needs to be reversed.
     */
    public static void reverseString(char[] s) {
        try {
            int left  = 0;            // Initialize a pointer at the start of the array
            int right = s.length - 1; // Initialize another pointer at the end of the array

            /** Iterate until the two pointers meet in the middle. */
            while (left < right) {
                char temp = s[left];  // Swap the elements at the left and right pointers. Store the value at the left pointer in a temporary variable
                s[left]   = s[right]; // Set the value at the left pointer as the value from the right pointer
                s[right]  = temp;     // Set the value at the right pointer as the temporary variable (original left value)

                left++;  // Move the left pointer towards the middle of the array by incrementing it
                right--; // Move the right pointer towards the middle of the array by decrementing it
            }
        } catch (Exception e) {
            /** If any exception is thrown during the calculation, print the exception message.*/
            System.out.println("Caught exception: " + e.getMessage());
        }
    }
}