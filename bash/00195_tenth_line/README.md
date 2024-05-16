# 195. Tenth line
#Description at [https://leetcode.com/problems/tenth-line/description/)

## Intuition
Upon encountering this problem, my initial inclination was to rely on the robust text processing capabilities of 
Unix-like environments, which offer a plethora of efficient command-line utilities for manipulating text files. Given 
the specific requirement to extract only the 10th line from the file, I reasoned that utilizing a concise and optimized 
command-line solution would be the most efficient approach.

## Approach
To accomplish the task of extracting the 10th line from the file, I explored three different strategies leveraging 
commonly used command-line utilities: awk, sed, and a combination of head and tail. Each approach aims to directly 
target and output the 10th line of the file while minimizing unnecessary processing overhead.

- Solution 1: Using awk

The awk solution utilizes the powerful text processing capabilities of awk to directly select and print the 10th line of 
the file. By specifying the condition NR == 10, we instruct awk to only process the line when the line number (NR) 
equals 10, effectively isolating and outputting the desired line.

- Solution 2: Using sed

In the sed solution, we employ the streamlined functionality of sed, a versatile stream editor, to specifically target 
and print the 10th line of the file. By employing the -n option to suppress automatic printing and using the command 10p
, we instruct sed to only print the 10th line, effectively isolating and outputting the desired line.

## Complexity
- Time complexity:

Each solution iterates through the lines of the file until the 10th line is reached. Consequently, the time complexity 
is linear with respect to the size of the file, denoted as O(n), where n represents the number of lines in the file.

- Space complexity:

Since each solution processes a single line of the file at a time without storing the entire file in memory, the space 
complexity remains constant regardless of the file size. Therefore, the space complexity is O(1), indicating constant 
space usage.

## Code
- Solution 1: Using awk
```bash
awk 'NR == 10' file.txt
```
- Solution 2: Using sed
```bash
sed -n '10p' file.txt
```