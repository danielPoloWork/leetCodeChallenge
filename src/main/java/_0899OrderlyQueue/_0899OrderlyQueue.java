package _0899OrderlyQueue;

import exceptions.ConstraintsException;

import java.util.Objects;
import java.util.Random;

public class _0899OrderlyQueue {
    public String solution(String string, Integer key) throws ConstraintsException {
        string = checkStringLength(string);
        key = checkKeyLength(string, key);

        int random = getRandomInteger(1, key);

        StringBuilder output = new StringBuilder();

        return setOutput(string, random, output);
    }

    private String checkStringLength(String string) throws ConstraintsException {
        if (string.length() >= 1 && string.length() <= 1000) {
            return string;
        } else {
            throw new ConstraintsException("String length is too short or too long.");
        }
    }

    private Integer checkKeyLength(String string, Integer key) throws ConstraintsException {
        if (key >= 1 && key <= string.length()) {
            return key;
        } else {
            throw new ConstraintsException("Key length is too short or too long.");
        }
    }

    public Integer getRandomInteger(Integer min, Integer max) {
        Random random = new Random();
        return Objects.equals(max, min) ? max : random.nextInt(max - min) + min;
    }

    private String setOutput(String string, int random, StringBuilder output) {
        for (int a = 1; a < string.length(); a++) {
            if (a != random) output.append(string.charAt(a));
        }
        output.append(string.charAt(0));
        output.append(string.charAt(random));
        return output.toString();
    }
}