package _1662CheckIfTwoStringArraysAreEquivalent;

import java.util.Optional;

public class _1662CheckIfTwoStringArraysAreEquivalent {

    public boolean solution(String[] wordA, String[] wordB) {
        if (Optional.ofNullable(wordA).isEmpty() || Optional.ofNullable(wordB).isEmpty()) {
            return false;
        } else {
            return arrayToString(wordA[0], wordA).equals(arrayToString(wordB[0], wordB));
        }
    }

    private String arrayToString(String s, String[] array) {
        StringBuilder sBuilder = new StringBuilder(s);
        for (int i = 1; i < array.length; i++) {
            sBuilder.append(array[i].toLowerCase().trim());
        }
        return sBuilder.toString();
    }
}