# Read from the file words.txt and output the word frequency list to stdout.
# counting the occurrences of each distinct word in a file, and then printing out the words along with their counts
# sorted in decreasing order of the counts.
tr -s ' ' '\n' < words.txt | sort | uniq -c | sort -nr | awk '{print $2, $1}'