package _0433MinimumGeneticMutation;

import java.util.Objects;

/**
 * @author Daniel Polo 2022
 **/
public class _0433MinimumGeneticMutation {
    public int solution(String start, String end, String[] bank) {
        int geneStringLength = 8;
        int checker = 0;
        int output = 0;

        return forEachGeneCheckMutationThenReturnOutput(start, end, bank, geneStringLength, checker, output);
    }

    private Integer forEachGeneCheckMutationThenReturnOutput(String start, String end, String[] bank, Integer geneStringLength, Integer checker, Integer output) {
        for (String gene : bank) {
            checker = forEachMutationCheckIfValidThenReturnChecker(start, end, checker, gene);
            output = ifGeneStringMutatedThenAddOutput(geneStringLength, checker, output);
            checker = resetChecker();
        }
        return output;
    }

        private Integer forEachMutationCheckIfValidThenReturnChecker(String start, String end, Integer checker, String gene) {
        for (int a = 0; a < 8; a++) {
            checker = ifGeneMutatedThenAddChecker(start, end, checker, gene, a);

        }
        return checker;
    }

            private Integer ifGeneMutatedThenAddChecker(String start, String end, Integer checker, String gene, Integer a) {
        if (gene.charAt(a) == start.charAt(a) || gene.charAt(a) == end.charAt(a)) {
            checker++;
        }
        return checker;
    }

        private Integer ifGeneStringMutatedThenAddOutput(Integer geneStringLength, Integer checker, Integer output) {
        if (Objects.equals(checker, geneStringLength)) {
            output++;
        }
        return output;
    }

        private Integer resetChecker() {
        return 0;
    }
}