<?php
/**
 * Given an array of integers nums and an integer target, return indices of the two numbers such that they add up to
 * target. You may assume that each input would have exactly one solution, and you may not use the same element twice.
 * You can return the answer in any order.
 */
class Solution {

    /**
     * Finds two numbers in an array that add up to a target value.
     *
     * @param Integer[] $nums An array of integers.
     * @param Integer $target The target value the two numbers should add up to.
     *
     * @return Integer[] The indices of the two numbers that add up to the target value.
     */
    function twoSum(array $nums, int $target): array {
        $output = [];

        try {
            $temp = [];
            foreach ($nums as $indexOf => $num) {
                $complement = $target - $num;

                if (array_key_exists($complement, $temp)) {
                    $output = [$temp[$complement], $indexOf];
                    break;
                }

                $temp[$num] = $indexOf;
            }
        } catch (Throwable $t) {
            print_r("Caught exception:  {$t->getMessage()} \n");
        }

        return $output;
    }
}
