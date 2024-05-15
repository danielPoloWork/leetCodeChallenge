package allTopics.algorithms._0001TwoSum;

import java.util.Optional;

/** @author Daniel Polo 2022 **/
public class _0001TwoSum {
    
    public Optional<Integer[]> solution(Integer[] numbers, Integer target) {
        for (int a = 0; a < numbers.length; a++) {
            for (int b = a + 1; b < numbers.length; b++) {
                if ((numbers[a] + numbers[b]) == target) {
                    return Optional.of(new Integer[]{a, b});
                }
            }
        }
        return Optional.empty();
    }
}