# Read from the file file.txt and output the tenth line to stdout.

#Solution 1: Using awk
awk 'NR == 10' file.txt

#Solution 2: Using sed
sed -n '10p' file.txt