package _0004MedianOfTwoSortedArrays;

import java.util.Arrays;

public class _0004MedianOfTwoSortedArrays {

    public Double solution(Integer[] numbersA, Integer[] numbersB) {
        if (isConstraintsChecked(numbersA, numbersB)) {
            return getMedian(numbersA, numbersB);
        } else {
            return 0.0;
        }
    }

    private boolean isConstraintsChecked(Integer[] numbersA, Integer[] numbersB) {
        return numbersA.length > 0
                && numbersA.length <= 1000
                && numbersB.length > 0
                && numbersB.length <= 1000;
    }
    private double getMedian(Integer[] numbersA, Integer[] numbersB) {
        Integer[] temp = setTempArray(numbersA, numbersB);
        if (temp.length % 2 == 0) {
            double val = temp[(temp.length / 2) - 1] + temp[temp.length / 2];
            return val / 2;
        } else {
            int val = temp.length/2;
            return (temp[Math.round(val)]);
        }
    }
    private Integer[] setTempArray(Integer[] numbersA, Integer[] numbersB) {
        Integer[] temp = new Integer[numbersA.length + numbersB.length];
        int index = 0;
        for (Integer integerA : numbersA) {
            temp[index] = integerA;
            index++;
        }

        for (Integer integerB : numbersB) {
            temp[index] = integerB;
            index++;
        }

        Arrays.sort(temp);
        return temp;
    }
}
