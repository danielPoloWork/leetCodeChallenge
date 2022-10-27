import _1662CheckIfTwoStringArraysAreEquivalent._1662CheckIfTwoStringArraysAreEquivalent;
import _1TwoSum._1TwoSum;
import _2AddTwoNumbers._2AddTwoNumbers;
import _835ImageOverlap._835ImageOverlap;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;
import java.util.Optional;

public class Main {

    private static final _1TwoSum twoSum = new _1TwoSum();
    private static final _2AddTwoNumbers addTwoNumbers = new _2AddTwoNumbers();
    private static final _835ImageOverlap imageOverlap = new _835ImageOverlap();
    private static final _1662CheckIfTwoStringArraysAreEquivalent arrayStringsAreEqual = new _1662CheckIfTwoStringArraysAreEquivalent();


    public static void main(String[] args) {

        long startTime = System.nanoTime();
        printImageOverlap();
        long endTime   = System.nanoTime();
        long totalTime = endTime - startTime;
        System.out.println("Execution time in nanoseconds  : " + totalTime);
        System.out.println("Execution time in milliseconds : " + totalTime / 1000000);

        //printTwoSum(); //1
        //printAddTwoNumbers(); //2
        //printImageOverlap(); //835
        //printArrayStringsAreEqual(); //1662
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
    private static void printImageOverlap() {
        Integer[][] a = new Integer[3][3];
        a[0][0] = 1;
        a[0][1] = 1;
        a[0][2] = 0;

        a[1][0] = 0;
        a[1][1] = 1;
        a[1][2] = 0;

        a[2][0] = 0;
        a[2][1] = 1;
        a[2][2] = 0;

        Integer[][] b = new Integer[3][3];
        b[0][0] = 0;
        b[0][1] = 0;
        b[0][2] = 0;

        b[1][0] = 0;
        b[1][1] = 1;
        b[1][2] = 1;

        b[2][0] = 0;
        b[2][1] = 0;
        b[2][2] = 1;

        System.out.println(imageOverlap.solution(a, b));
    }
}
