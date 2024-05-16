# Read from the file file.txt and output all valid phone numbers to stdout.
# Replace all occurrences of spaces with newline characters in 'words.txt', splitting each word onto a new line.
# 'tr -s' compresses sequences of the character in its first argument into a single occurrence of the character in its
# second argument. tr -s ' ' '\n' < words.txt | # Sort the lines of the file in lexicographic order. This makes
# identical lines become adjacent. sort | # 'uniq -c' reads the sorted input and collapses any set of consecutive
# identical lines into a single line, # where the line is prefixed by the number of occurrences. uniq -c | # Sort lines
# of input in reverse lexicographic order (-r) based on numerical sort (-n). # The number of occurrences is the first
# item on each line so this will sort by frequency of the words. sort -nr | # 'awk' prints the words (field 2) followed
# by their count (field 1). awk '{print $2, $1}'
grep -E '^(\([0-9]{3}\) [0-9]{3}-[0-9]{4}|[0-9]{3}-[0-9]{3}-[0-9]{4})$' file.txt