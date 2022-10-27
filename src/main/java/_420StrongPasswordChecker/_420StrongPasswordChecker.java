package _420StrongPasswordChecker;

import java.util.regex.Matcher;
import java.util.regex.Pattern;

public class _420StrongPasswordChecker {

    private final String REGEX_LENGTH   = "(\\S){6,20}";
    private final String REGEX_UPPER    = "([A-Z]+)";
    private final String REGEX_LOWER    = "([a-z]+)";
    private final String REGEX_DIGIT    = "([0-9]+)";
    private final String REGEX_SPECIAL  = "([!.]+)";
    private final String REGEX_REPEATED = "(?=(.)\\1{2})(\\1+)";

    public Integer solution(String password) {
        int step = 0;

        if (checkLength(password) == 1) {
            printLengthWeakness(password);
            step++;
        }

        if (checkUpper(password) == 1) {
           System.out.println("Password must contains at least one uppercase letter.");
            step++;
        }

        if (checkLower(password) == 1) {
            System.out.println("Password must contains at least one lowercase letter.");
            step++;
        }

        if (checkDigit(password) == 1) {
            System.out.println("Password must contains at least one number.");
            step++;
        }

        if (checkSpecial(password) == 1) {
            System.out.println("Password must contains at least one special character [. or !].");
            step++;
        }

        if (checkRepeated(password) == 1) {
            System.out.println("Password should not contain three repeating characters in a row.");
            step++;
        }

        return step;
    }

    private Integer checkLength(String password) {
        Pattern pattern = Pattern.compile(REGEX_LENGTH);
        Matcher matcher = pattern.matcher(password);

        boolean matchFound = matcher.find();
        if(matchFound) {
            return 0;
        } else {
            return 1;
        }
    }

    private void printLengthWeakness(String password) {
        if (password.length() < 6) {
            System.out.println("Password is " + (6 - password.length()) + " short.");
        }
        if (password.length() > 20) {
            System.out.println("Password is longer than " + (20 - password.length()));
        }
    }

    private Integer checkUpper(String password) {
        Pattern pattern = Pattern.compile(REGEX_UPPER);
        Matcher matcher = pattern.matcher(password);

        boolean matchFound = matcher.find();
        if(matchFound) {
            return 0;
        } else {
            return 1;
        }
    }

    private Integer checkLower(String password) {
        Pattern pattern = Pattern.compile(REGEX_LOWER);
        Matcher matcher = pattern.matcher(password);

        boolean matchFound = matcher.find();
        if(matchFound) {
            return 0;
        } else {
            return 1;
        }
    }

    private Integer checkDigit(String password) {
        Pattern pattern = Pattern.compile(REGEX_DIGIT);
        Matcher matcher = pattern.matcher(password);

        boolean matchFound = matcher.find();
        if(matchFound) {
            return 0;
        } else {
            return 1;
        }
    }

    private Integer checkSpecial(String password) {
        Pattern pattern = Pattern.compile(REGEX_SPECIAL);
        Matcher matcher = pattern.matcher(password);

        boolean matchFound = matcher.find();
        if(matchFound) {
            return 0;
        } else {
            return 1;
        }
    }

    private Integer checkRepeated(String password) {
        Pattern pattern = Pattern.compile(REGEX_REPEATED);
        Matcher matcher = pattern.matcher(password);

        boolean matchFound = matcher.find();
        if(matchFound) {
            return 1;
        } else {
            return 0;
        }
    }

}