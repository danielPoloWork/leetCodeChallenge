#include<iostream>
#include<vector>
#include<stdexcept>

using namespace std;

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
class Solution {

    /**
     * The void function reverseString is used to reverse the order of elements in a vector of strings. The function
     * takes a vector by reference, meaning changes made in the function will be reflected in the original vector.
     * Reversing is done in place, meaning no additional space is used except for a temp variable to facilitate swapping.
     *
     * This operation could also be performed by using the built-in C++ function `std::reverse(s.begin(), s.end());`.
     * The `std::reverse` function in C++ modifies the original vector by reversing the order of its elements. However,
     * this function has been created for demonstration purposes to understand the logic behind reversing a vector.
     *
     * Function Variables:
     * vector<char>& s :  The vector of characters that needs to be reversed.
     *
     * Exception:
     * In case any exception is encountered, it is caught and the message is displayed.
     */
    public: void reverseString(vector<char>& s) {
        try {
            int left  = 0;            // Initialize a pointer at the start of the vector
            int right = s.size() - 1; // Initialize another pointer at the end of the vector

            /** Loop to reverse the vector content. This operation is performed in-place. */
            while (left < right) {
                char temp = s[left];  // Temporary variable to help with the swapping of the vector content
                s[left]   = s[right]; // Swapping the vector content
                s[right]  = temp;     // Swapping the vector content

                left++;  // Incrementing the left pointer
                right--; // Decrementing the right pointer
            }
        }
        catch(exception &e) {
            /** If any exception is thrown during the calculation, print the exception message.*/
            cout << "Caught exception: " << e.what() << "\n";
        }
    }
};