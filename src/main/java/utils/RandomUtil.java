package utils;

public class RandomUtil {

    public static Integer generatePositiveNegativeValue(Integer max , Integer min) {
        return -min + (int) (Math.random() * ((max - (-min)) + 1));
    }
}