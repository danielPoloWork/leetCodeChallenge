package allTopics.algorithms._0835ImageOverlap;

/** @author Daniel Polo 2022 **/
public class _0835ImageOverlap {

    public Integer solution(Integer[][] imageA, Integer[][] imageB) {
        imageA = shiftRight(imageA);
        imageA = shiftDown(imageA);
        return compare(imageA, imageB);
    }

    private Integer[][] shiftRight(Integer[][] imageA) {
        Integer[][] temp = new Integer[imageA.length][imageA[0].length];
        for(int a = 0; a < imageA.length; a++) {
            temp[a][0] = 0;
            for (int b = 1; b < imageA[0].length; b++) {
                temp[a][b] = imageA[a][b-1];
            }
        }
        return temp;
    }

    private Integer[][] shiftDown(Integer[][] imageA) {
        Integer[][] temp = new Integer[imageA.length][imageA[0].length];
        for(int a = 0; a < imageA.length; a++) {
            for (int b = 0; b < imageA[0].length; b++) {
                if (a == 0) {
                    temp[0][b] = 0;
                } else {
                    temp[a][b] = imageA[a-1][b];
                }
            }
        }
        return temp;
    }

    private Integer compare(Integer[][] imageA, Integer[][] imageB) {
        Integer counter = 0;
        for(int a = 0; a < imageA.length; a++) {
            for (int b = 0; b < imageA[0].length; b++) {
                if ((imageA[a][b] == 1) && (imageB[a][b] == 1)) {
                    counter++;
                }
            }
        }
        return counter;
    }
}
