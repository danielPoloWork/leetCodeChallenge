"""
Write a function that reverses a string. The input string is given as an array of characters s. You must do this by
modifying the input array in-place with O(1) extra memory.

Constraints:
- 1 <= s.length <= 105
- s[i] is a printable ascii character.

> Hint 1: The entire logic for reversing a string is based on using the opposite directional two-pointer approach!
"""
class Solution(object):
    """
    This function reverseString is used to reverse the order of elements in a list of strings.

    This operation could also be performed by using the built-in Python method `list.reverse()`. The `list.reverse()`
    method in Python  reverses a list in-place, meaning it directly modifies the original list and doesn't create any
    intermediate lists. It directly iterates over the first half of the sequence and swaps the element with the
    corresponding element from the end of the sequence, for all elements in the first half.

    <pre>
    s.reverse()
    </pre>

    > Note: the `list.reverse()` method manipulates the list on which it's used and doesn't return a new list.

    :param s: The list of strings that needs to be reversed.
    """
    def reverseString(self, s):
        try:
            left  = 0          # Initialize a pointer at the start of the list
            right = len(s) - 1 # Initialize another pointer at the end of the list

            """ Iterate until the two pointers meet in the middle. """
            while left < right:
                temp     = s[left]  # Swap the elements at the left and right pointers. Store the value at the left pointer in a temporary variable.
                s[left]  = s[right] # Set the value at the left pointer as the value from the right pointer
                s[right] = temp     # Set the value at the right pointer as the temporary variable (original left value)

                left += 1  # Move the left pointer towards the middle of the list by incrementing it
                right -= 1 # Move the right pointer towards the middle of the list by decrementing it
        except Exception as e:
            """ If any exception is thrown during the calculation, print the exception message. """
            print(f"Caught exception: {str(e)}", file=sys.stderr)