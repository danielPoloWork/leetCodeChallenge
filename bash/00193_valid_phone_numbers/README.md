# 193. Valid Phone Numbers
#Description at [leetcode.com](https://leetcode.com/problems/valid-phone-numbers/description/)

## Intuition
The initial approach revolves around utilizing regular expressions to extract valid phone numbers from a given text file
. Regular expressions provide a powerful tool for pattern matching, enabling us to define the format of a phone number 
and filter out the relevant data efficiently.

## Approach
The approach involves using the grep command with the -E option to enable extended regular expressions. We define a 
pattern that matches valid phone number formats, including both the format with parentheses for the area code and 
without parentheses. The pattern includes capturing groups to extract the area code, prefix, and line number.

## Complexity
- Time complexity:

The time complexity of the grep command depends on the size of the input text file and the complexity of the regular 
expression pattern. In this case, the time complexity is typically linear or close to linear with respect to the size of
the input file.

- Space complexity:

The space complexity of the grep command depends on the size of the input text file and the memory requirements of the 
operating system and other running processes. Since grep operates on the text file directly and processes it line by 
line, the space complexity is minimal.

## Breakdown
Here is the breakdown of what the complete command does and what each individual command does within it:

- `grep`: The `grep` command is a filter that is used to perform pattern searches in input text files. In this context, 
`grep` is essentially scanning `file.txt` and outputting only the lines that match a specified pattern.
- `-E`: This option enables the interpretation of the pattern as an extended regular expression (ERE). This gives you 
access to more features and flexibility when writing regular expressions.
- `' ^(\([0-9]{3}\) [0-9]{3}-[0-9]{4}|[0-9]{3}-[0-9]{3}-[0-9]{4})$'`: This is the regular expression pattern that grep 
is searching for in `file.txt`.
  - `^`: This specifies start of a line.
  - `(\([0-9]{3}\) [0-9]{3}-[0-9]{4}|[0-9]{3}-[0-9]{3}-[0-9]{4})`: This pattern matches two different formats of phone 
  numbers:
  - `\([0-9]{3}\) [0-9]{3}-[0-9]{4}`: This matches numbers in the format `"(XXX) XXX-XXXX"`. The parentheses are the 
  literal characters that we are matching, and they need to be escaped with backslashes. The `[0-9]{3}` part matches any 
  three digits, and `[0-9]{4}` matches any four digits.
  - `[0-9]{3}-[0-9]{3}-[0-9]{4}`: This matches numbers in the format `"XXX-XXX-XXXX"`.
  - `|`: This character in the middle is a logical OR operator. This means that a line can match either of the two 
  number formats to be considered a match.
  - `$` This specifies the end of a line.
- `file.txt` : This is the input file that is being read by `grep`.

> So, the whole shell script command can be understood as scanning every line in the file.txt and outputting only the 
> lines that contain a valid phone number as per the two formats compiled in the regular expression.

## Code
```bash
# Read from the file file.txt and output all valid phone numbers to stdout.
grep -E '^(\([0-9]{3}\) [0-9]{3}-[0-9]{4}|[0-9]{3}-[0-9]{3}-[0-9]{4})
 file.txt
```