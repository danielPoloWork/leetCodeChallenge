# 194. Transpose file
#Description at [https://leetcode.com/problems/transpose-file/description/)

## Intuition
My initial thoughts on tackling this problem involve leveraging the power of text processing utilities available in bash 
scripting. Since we need to transpose the content of a text file, the approach should focus on efficiently rearranging 
the data from rows to columns and vice versa.

## Approach
To transpose the content of the text file, we can employ the awk command, a versatile tool for text processing. The 
script utilizes awk to iterate through each line of the file. For each line, it splits the fields based on the default 
field separator (whitespace). It then constructs a matrix, where each element corresponds to a column in the transposed 
content. While processing each line, the script appends the field values to the respective column in the matrix. 
Finally, it prints each element of the matrix, resulting in the transposed content being outputted to stdout.

## Complexity
- Time complexity:

The time complexity of the awk script is primarily determined by the number of lines and the number of fields (columns) 
in the input file. Since the script iterates through each line and processes each field individually, the time 
complexity can be considered linear with respect to the size of the input file.

- Space complexity:

The space complexity of the awk script depends on the size of the input file and the number of fields (columns) it 
contains. The script maintains an array (matrix) to store the transposed content temporarily. Therefore, the space 
complexity can be considered linear with respect to the number of fields in the input file.

## Breakdown
Here is the breakdown of what the complete command does and what each individual command does within it:

- `awk`: This is a scripting language that is often used for data manipulation or for generating reports. In this 
context, awk is being used to process `file.txt`.
- `'{}'`: The portion between `{}` contains what will be done for every line of the input `file.txt`.
  - `for`: This is a loop that runs for every field (separated by spaces or any other delimiter) within a line (denoted 
  as NF).
  - `if (NR == 1)`: This if condition checks whether the current record number (line number) is the first line or not.
  In case of `NR == 1` i.e., it is the first line of input, each field is stored into an associative array matrix, using 
  the field number as the key. For all lines other than the first one, each column's fields are appended with a space 
  separator to the existing value of `matrix[i].`
  - `END`: This block of code is executed after the last line of the last file has been processed.
    - `for`: This is another loop running for each field and It prints the array matrix which is a concatenation of each 
    column's fields separated by a space.
  - `file.txt`: This is the input file that awk is reading.
  
> Therefore, the whole shell script can be understood as processing every line in file.txt and outputting the fields of 
> file.txt arranged in a different format. Each column from the input is transformed into a row in the output. This 
> script essentially transposes the data from file.txt.

## Code
```bash
# Read from the file file.txt and print its transposed content to stdout.
awk '
{
    for (i=1; i<=NF; i++) {
        if (NR == 1) {
            matrix[i] = $i;
        } else {
            matrix[i] = matrix[i] " " $i;
        }
    }
}
END {
    for (i=1; i<=NF; i++) {
        print matrix[i];
    }
}' file.txt
```