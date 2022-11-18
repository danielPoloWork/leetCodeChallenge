package allTopics.algorithms._0263UglyNumber;

import exceptions.ConstraintsException;

public class _0263UglyNumber {
    public boolean solution(int number) throws ConstraintsException {
        if (checkConstraints(number)) {
            if (number <= 0) {
                return false;
            } else {
                return forEachDivisorDivideUntilDivisible(number) == 1;
            }
        } else {
            throw new ConstraintsException("Number must be between -2^31 and +(2^31) - 1.");
        }

    }

    private int forEachDivisorDivideUntilDivisible(int number) {
        for (int divisor : new int[]{2, 3, 5}) {
            number = divideUntilDivisibleByDivisor(number, divisor);
        }
        return number;
    }

    private int divideUntilDivisibleByDivisor(int dividend, int divisor) {
        while (dividend % divisor == 0) {
            dividend /= divisor;
        }
        return dividend;
    }

    private boolean checkConstraints(int number) {
        return (-Math.pow(2, 31) <= number)
                && (number <= Math.pow(2, 31) - 1);
    }
}
