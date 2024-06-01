/// ScoreOfString struct exists to encapsulate the function(s) related to score calculation.
pub struct ScoreOfString;
/// We are given a string s. The score of a string is defined as the sum of the absolute difference between the ASCII
/// values of adjacent characters. Return the score of s.
///
/// Constraints:
/// - 2 <= s.length <= 100
/// - s consists only of lowercase English letters.
///
/// Hint 1: Sum the difference between all the adjacent characters by just taking the
/// absolute difference of their ASCII values.
impl ScoreOfString {
    /// This function is used to calculate the score of a string.
    ///
    /// The score is computed by adding up the absolute difference between the ASCII values
    /// of consecutive characters in the string.
    ///
    /// # Arguments
    ///
    /// * `s` - The input string.
    ///
    /// # Return
    ///
    /// The score of the string.
    ///
    /// # Panics
    ///
    /// This function will panic if the string length is less than 2.
    pub fn score_of_string(s: &str) -> i32 {
        /// Constraints mention the string length must be at least 2
        assert!(s.len() >= 2);

        let mut output       = 0;                   // Initialize the output variable to hold the final score.
        let s_chars: Vec<u8> = s.bytes().collect(); // Convert string to bytes to get ASCII values
        let s_length         = s_chars.len();       // Calculate the length of the string

        /// Iterate over the string up to the penultimate character.
        for i in 0..(s_length - 1) {
            let ascii_value_first = s_chars[i] as i32;     // Get ASCII value of the current character.
            let ascii_value_next  = s_chars[i + 1] as i32; // Get ASCII value of the next character.

            /// Calculate the absolute difference between the ASCII values of consecutive characters and add to the output.
            output += (ascii_value_first - ascii_value_next).abs();
        }

        output // Return the final score.
    }
}