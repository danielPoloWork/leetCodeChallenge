import sys
"""
You are given a string s. The score of a string is defined as the sum of the absolute difference between
the ASCII values of adjacent characters. Return the score of s.

Constraints:
- 2 <= s.length <= 100
- s consists only of lowercase English letters.

> Hint 1: Sum the difference between all the adjacent characters by just taking the absolute difference of
> their ASCII values.
"""

class Solution:

    """
    This function is used to calculate the score of a string.

    The score is computed by adding up the absolute difference between the ASCII values of
    consecutive characters in the string.

    :param s: The input string.
    :return: The score of the string.
    :raises Exception: If any error occurs during the execution, an Exception will be raised.
    """
    def score_of_string(self, s):
        output = 0  # Initialize the output variable to hold the final score.

        try:
            s_length = len(s)  # Calculate the length of the string.

            """ Iterate over the string up to the penultimate character. """
            for i in range(s_length - 1):
                ascii_value_first = ord(s[i])     # Get ASCII value of the current character.
                ascii_value_next  = ord(s[i + 1]) # Get ASCII value of the next character in the string.

                """ Calculate the absolute difference between the ASCII values of consecutive characters and add to the output. """
                output += abs(ascii_value_first - ascii_value_next)
        except Exception as e:
            """ If any exception is thrown during the calculation, print the exception message. """
            print(f"Caught exception: {str(e)}", file=sys.stderr)

        return output  # Return the final score.