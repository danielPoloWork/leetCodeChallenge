package _0002AddTwoNumbers;

import java.util.ArrayList;
import java.util.List;

/** @author Daniel Polo 2022 **/
public class _0002AddTwoNumbers {
    public  List<Integer> solution(List<Integer> listA, List<Integer> listB) {
        if (listA.size() > 99 || listB.size() > 99) {
            throw new RuntimeException("The list size must be in the range [1, 100].");
        }
        return convertIntegerToList(Integer.parseInt(convertListToString(listA)) + Integer.parseInt(convertListToString(listB)));
    }

    private String convertListToString(List<Integer> list) {
        StringBuilder number = new StringBuilder();
        for (int a = list.size() - 1; a >= 0; a--) {
            number.append(list.get(a));
        }
        return number.toString();
    }

    private List<Integer> convertIntegerToList(Integer number) {
        List<Integer> output = new ArrayList<>();
        for (int a = number.toString().length() - 1; a >= 0; a--) {
            output.add(Integer.parseInt("" + number.toString().charAt(a)));
        }
        return output;
    }
}
