import _0006ZigzagConversion._0006ZigzagConversion;
import _0007ReverseInteger._0007ReverseInteger;
import _0433MinimumGeneticMutation._0433MinimumGeneticMutation;
import _1662CheckIfTwoStringArraysAreEquivalent._1662CheckIfTwoStringArraysAreEquivalent;
import _0001TwoSum._0001TwoSum;
import _0002AddTwoNumbers._0002AddTwoNumbers;
import _0420StrongPasswordChecker._0420StrongPasswordChecker;
import _0004MedianOfTwoSortedArrays._0004MedianOfTwoSortedArrays;
import _0835ImageOverlap._0835ImageOverlap;
import exceptions.ConstraintsException;
import utils.RandomUtil;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;
import java.util.Optional;

/** @author Daniel Polo 2022 **/
public class Main {

    private static final _0001TwoSum twoSum = new _0001TwoSum();
    private static final _0002AddTwoNumbers addTwoNumbers = new _0002AddTwoNumbers();
    private static final _0004MedianOfTwoSortedArrays medianOfTwoSortedArrays = new _0004MedianOfTwoSortedArrays();
    private static final _0006ZigzagConversion zigzagConversion = new _0006ZigzagConversion();
    private static final _0007ReverseInteger reverseInteger = new _0007ReverseInteger();
    private static final _0420StrongPasswordChecker strongPasswordChecker = new _0420StrongPasswordChecker();
    private static final _0433MinimumGeneticMutation minimumGeneticMutation = new _0433MinimumGeneticMutation();
    private static final _0835ImageOverlap imageOverlap = new _0835ImageOverlap();
    private static final _1662CheckIfTwoStringArraysAreEquivalent arrayStringsAreEqual = new _1662CheckIfTwoStringArraysAreEquivalent();

    public static void main(String[] args) throws ConstraintsException {

        long startTime = System.nanoTime();
        //printTwoSum();                                                                                                //0001
        //printAddTwoNumbers();                                                                                         //0002
        //printMedianOfTwoSortedArrays();                                                                               //0004
        //printZigzagConversion();                                                                                      //0006
        //printReverseInteger();                                                                                        //0007
        //printStrongPasswordChecker();                                                                                 //0420
        //printMinimumGeneticMutation();                                                                                //0433
        //printImageOverlap();                                                                                          //0835
        //printArrayStringsAreEqual();                                                                                  //1662
        long endTime   = System.nanoTime();
        long totalTime = endTime - startTime;
        System.out.println("Execution time in nanoseconds  : " + totalTime);
        System.out.println("Execution time in milliseconds : " + totalTime / 1000000);
    }

    private static void printTwoSum() {
        Integer[] numbers = {2,7,11,15,3,5,14,36,27};
        Integer target = 29;
        Optional<Integer[]> result = twoSum.solution(numbers, target);
        System.out.println(result.isEmpty() ? "no match" : Arrays.toString(result.get()));
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
    private static void printMedianOfTwoSortedArrays() {
        Integer[] a = new Integer[1000];
        Integer[] b = new Integer[1000];

        for (int c = 0; c < a.length; c++) {
            a[c] = RandomUtil.generatePositiveNegativeValue((int)Math.pow(10,6), (int)Math.pow(-10, 6));
            b[c] = RandomUtil.generatePositiveNegativeValue((int)Math.pow(10,6), (int)Math.pow(-10, 6));
        }

        System.out.println(medianOfTwoSortedArrays.solution(a, b));
    }
    private static void printZigzagConversion() {
        String string = "PAYPALISHIRING";
        Integer row = 4;
        System.out.println(zigzagConversion.solution(string, row));
    }
    private static void printReverseInteger() {
        int x = 123456789;
        //int x = 2147483647;
        //int x = -2147483648;
        System.out.println(reverseInteger.solution(x));
    }
    private static void printStrongPasswordChecker() {
        String password = "1234!ABcd";

        if (strongPasswordChecker.solution(password) == 0) {
            System.out.println("Password is strong.");
        } else {
            System.out.println("Password is weak.");
        }
    }
    private static void printMinimumGeneticMutation() {
        String start  = "AACCGGTT";
        String end    = "AAACGGTA";
        String[] bank = {"AACCGGTA","AACCGCTA","AAACGGTA"};

        System.out.println(minimumGeneticMutation.solution(start, end, bank));
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
    private static void printArrayStringsAreEqual() {
        String[] a = {"abc", "d", "defg"};
        String[] b = {"abcddefg"};
        System.out.println(arrayStringsAreEqual.solution(a, b));
    }
}
