package allTopics.algorithms._0006ZigzagConversion;

import java.util.regex.Matcher;
import java.util.regex.Pattern;

/** @author Daniel Polo 2022 **/
public class _0006ZigzagConversion {

    private final String REGEX_LENGTH = "(\\S){1,1000}";

    public String solution(String string, Integer numRows) {
        StringBuilder output = new StringBuilder();
        if (areConstraintsChecked(string, numRows)) {
            int newIndex = 2 * numRows - 2;
            for (int a = 0; a < numRows; a++) {
                for (int b = 0; (b + a) < string.length(); b += newIndex) {
                    output.append(string.charAt(b + a));

                    if (((b - a + newIndex) < string.length())
                            && (a != 0)
                            && (a != (numRows - 1))) {
                        output.append(string.charAt(b -a + newIndex));
                    }
                }
            }
        }
        return output.toString();
    }

    private boolean areConstraintsChecked(String string, Integer numRows) {
        return checkStringLength(string)
                && checkRowLength(numRows)
                && checkStringFormat(string);
    }

    private Boolean checkStringLength(String string) {
        Pattern pattern = Pattern.compile(REGEX_LENGTH);
        Matcher matcher = pattern.matcher(string);
        return matcher.find();
    }

    private Boolean checkRowLength(Integer numRows) {
        Pattern pattern = Pattern.compile(REGEX_LENGTH);
        Matcher matcher = pattern.matcher("" + numRows);
        return matcher.find();
    }

    private Boolean checkStringFormat(String string) {
        Pattern pattern = Pattern.compile("([A-Z]*)([a-z]*)([.,]*)");
        Matcher matcher = pattern.matcher(string);
        return matcher.find();
    }
}
