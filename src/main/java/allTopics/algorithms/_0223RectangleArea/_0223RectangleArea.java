package allTopics.algorithms._0223RectangleArea;

import exceptions.ConstraintsException;

public class _0223RectangleArea {
    public int solution(int ax1, int ay1, int ax2, int ay2, int bx1, int by1, int bx2, int by2) throws ConstraintsException {
        if (checkConstraints(ax1, ax2)
                && checkConstraints(ay1, ay2)
                && checkConstraints(bx1, bx2)
                && checkConstraints(by1, by2)) {
            int areaA = calculateArea(ax1, ax2, ay1, ay2);
            int areaB = calculateArea(bx1, bx2, by1, by2);

            int overlapA = calculateOverlap(ax1, ax2, bx1, bx2);
            int overlapB = calculateOverlap(ay1, ay2, by1, by2);

            return (areaA + areaB) - (overlapA * overlapB);
        } else {
            throw new ConstraintsException("Coordinates values too must be between -104 and +104. Axes one must be <= than axes two.");
        }

    }

    private int calculateArea(int x1, int x2, int y1, int y2) {
        return (x2 - x1) * (y2 - y1);
    }

    private int calculateOverlap(int a1, int a2, int b1, int b2) {
        int overlap =  Math.min(a2, b2) - Math.max(a1, b1);
        return Math.max(overlap, 0);
    }

    private boolean checkConstraints(int pos1, int pos2) {
        return (-104 <= pos1) && (pos1 <= pos2) && (pos2 <= 104);
    }
}
