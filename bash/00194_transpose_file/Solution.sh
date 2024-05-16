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
