package _0007ReverseInteger;

import java.util.ArrayList;
import java.util.List;

public class _0007ReverseInteger {

    public Integer solution(Integer x) {
        int output = 0;
        if ((x >= Math.pow(-2,31))
                && (x <= (Math.pow(2,31) - 1))) {
            output = convertListToInteger(convertIntegerToList(x));
        }
        return output;
    }

    private List<String> convertIntegerToList(Integer x) {
        List<String> output = new ArrayList<>();
        for (int a = x.toString().length() - 1; a >= 0; a--) {
            if (a == x.toString().length() - 1 && x.toString().charAt(0) == '-') {
                output.add("-" + x.toString().charAt(a));
            } else if (a == 0 && x.toString().charAt(0) == '-') {
                output.add("");
            } else {
                output.add("" + x.toString().charAt(a));
            }
        }
        return output;
    }

    private Integer convertListToInteger(List<String> list) {
        try {
            StringBuilder number = new StringBuilder();
            for (String string : list) {
                number.append(string);
            }
            return Integer.parseInt(number.toString());
        } catch (NumberFormatException e) {
            return 0;
        }

    }
}
