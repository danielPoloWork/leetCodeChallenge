import _1662CheckIfTwoStringArraysAreEquivalent._1662CheckIfTwoStringArraysAreEquivalent;
import _1TwoSum._1TwoSum;
import _2AddTwoNumbers._2AddTwoNumbers;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;
import java.util.Optional;

public class Main {

    private static final _1662CheckIfTwoStringArraysAreEquivalent arrayStringsAreEqual = new _1662CheckIfTwoStringArraysAreEquivalent();
    private static final _1TwoSum twoSum = new _1TwoSum();
    private static final _2AddTwoNumbers addTwoNumbers = new _2AddTwoNumbers();


    public static void main(String[] args) {

        long startTime = System.nanoTime();
        printAddTwoNumbers();
        long endTime   = System.nanoTime();
        long totalTime = endTime - startTime;
        System.out.println("Execution time in nanoseconds  : " + totalTime);
        System.out.println("Execution time in milliseconds : " + totalTime / 1000000);

        //printArrayStringsAreEqual();
        //printTwoSum();
        //printAddTwoNumbers();
    }

    private static void printTwoSum() {
        Integer[] numbers = {2,7,11,15,3,5,14,36,27};
        Integer target = 29;
        Optional<Integer[]> result = twoSum.solution(numbers, target);
        System.out.println(result.isEmpty() ? "no match" : Arrays.toString(result.get()));
    }

    private static void printArrayStringsAreEqual() {
        String[] a = {"abc", "d", "defg"};
        String[] b = {"abcddefg"};
        System.out.println(arrayStringsAreEqual.solution(a, b));
    }

    private static void printAddTwoNumbers() {
        List<Integer> a = new ArrayList<>();
        List<Integer> b = new ArrayList<>();
        a.add(9);
        a.add(9);
        a.add(9);
        a.add(9);
        a.add(9);
        a.add(9);
        a.add(9);

        b.add(9);
        b.add(9);
        b.add(9);
        b.add(9);

        System.out.println(addTwoNumbers.solution(a, b));
    }
}
