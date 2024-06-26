# 192. Word frequency
#Description at [leetcode.com](https://leetcode.com/problems/word-frequency/description/)

## Intuition
Initially, when tackling the task of calculating word frequencies in a text file, I considered the necessity of breaking 
down the text into individual words and then determining the occurrence of each word. This fundamental intuition led to 
the exploration of methods to efficiently extract and analyze the words in the file.

## Approach
To address the problem effectively, I devised a systematic approach:
1. **Word Extraction**: The first step involved segmenting the text into separate words. Utilizing the `tr` command, 
spaces were replaced with newline characters, effectively splitting the text into individual words.
2. **Word Sorting**: Once the words were isolated, sorting them alphabetically facilitated the grouping of identical 
words together. This sorting operation laid the groundwork for the subsequent counting phase.
3. **Word Counting**: Leveraging the `uniq -c` command, the occurrences of each unique word were counted. This command 
appended each line of identical adjacent words with the count of occurrences, essentially producing a tally of word 
frequencies.
4. **Frequency Sorting**: Sorting the words based on their frequency count in descending order provided a clear 
representation of the most commonly occurring words. This step ensured that words with higher frequencies were 
prioritized in the output.
5. **Output Formatting**: The final step involved formatting and printing the word frequency list. Employing `awk`, the 
list was structured to display each word alongside its corresponding frequency count, thereby presenting a comprehensive 
summary of word occurrences in the text file.

By systematically executing these steps, the solution efficiently computed and organized the word frequencies in the 
given text file.

## Breakdown
Here is the breakdown of what the complete command does and what each individual command does within it:
- `tr -s ' ' '\n' < words.txt`: This command uses the `tr` (translate) utility to replace spaces with newline characters 
`(\n)`. The `-s` option is for squeezing or reducing multiple consecutive occurrences of the characters listed in SET1, 
in this case `' '`, to a single occurrence. This command essentially converts a consecutive list of words separated by 
spaces on the same line to individual words on separate lines. `< words.txt` denotes that words.txt file is used as 
input.
- `sort`: This command sorts the output of the previous command (the words) in lexicographical order.
- `uniq -c`: This command removes all the repeated lines in the output from the previous command and prepends the count 
of occurrences to each line. The `-c` option stands for count, so this prints the number of occurrences along with the 
word.
- `sort -nr`: This command sorts the output of the previous command in the numerical and reverse directions. `-n` is for 
numeric sort and `-r` for reverse sort. This will give the most frequently occurring words at the top.
- `awk '{print $2, $1}'`: `awk` is a powerful text processing command. It processes the output line by line. In this 
context, it swaps the order of the two fields in each line (number of occurrences and word) and prints them. So, it 
prints first the word then the number of occurrences.

> So, the whole command can be understood as counting the occurrences of each distinct word in a file, and then printing 
> out the words along with their counts sorted in decreasing order of the counts.

## Complexity
- Time complexity:

The time complexity of the solution hinges on several factors, including the size of the input text file and the 
efficiency of the Unix commands employed. While operations such as reading, splitting, sorting, and counting words may 
vary in their time complexity, they typically exhibit linear or logarithmic behavior. As a result, the overall time 
complexity is influenced by the combined performance of these operations.

- Space complexity:

In terms of space complexity, the primary consideration is the number of unique words present in the text file. The Unix 
commands utilized in the solution generally operate in either constant or linear space, depending on the number of 
distinct words encountered. Consequently, the space complexity scales proportionally with the volume of unique words in 
the input text file.

## Code
```bash
# Read from the file words.txt and output the word frequency list to stdout.
# counting the occurrences of each distinct word in a file, and then printing out the words along with their counts 
# sorted in decreasing order of the counts.
tr -s ' ' '\n' < words.txt | sort | uniq -c | sort -nr | awk '{print $2, $1}'
```