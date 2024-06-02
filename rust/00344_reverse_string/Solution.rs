/// Write a function that reverses a string. The input string is given as an array of characters s. You must do this by
/// modifying the input array in-place with O(1) extra memory.
///
/// Constraints:
/// - 1 <= s.length <= 105
/// - s[i] is a printable ascii character.
///
/// > Hint 1: The entire logic for reversing a string is based on using the opposite directional two-pointer approach!
pub struct Solution;

impl Solution {
    /// The function reverse_string is used to reverse the order of elements in an array of strings.
    ///
    /// This operation could also be performed by using the built-in Rust method `to_vec()` and `reverse()`.
    /// First, `to_vec()` function in Rust creates a new vector with the same elements of the array.
    /// Then `reverse()` method is used to reverse the order of elements in this new vector.
    /// After the reverse operation, the vector is not automatically converted back into the array.
    /// It does not actually modify the original array unlike our function since it involves creating a new vector.
    /// However, this function has been created for demonstration purposes, to explain the logic behind array reversing.
    ///
    /// ```rust
    /// s.reverse();
    /// ```
    ///
    /// # Arguments
    /// * `s` - The mutable reference to the array of characters that needs to be reversed.
    pub fn reverse_string(s: &mut Vec<char>) {
        let mut left  = 0;                                         // Initialize a pointer at the start of the array
        let mut right = if s.len() > 0 { s.len() - 1 } else { 0 }; // Initialize another pointer at the end of the array

        /// Iterate until the two pointers meet in the middle.
        while left < right {
            let temp = s[left];  // Store the value at the left pointer in a temporary variable
            s[left] = s[right];  // Set the value at the left pointer as the value from the right pointer
            s[right] = temp;     // Set the value at the right pointer as the temporary variable (original left value)

            left += 1;           // Move the left pointer towards the middle of the array by incrementing it
            right -= 1;          // Move the right pointer towards the middle of the array by decrementing it
        }
    }
}