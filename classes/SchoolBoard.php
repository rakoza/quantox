<?php

class SchoolBoard
{
    public static function printGrades(Student $student)
    {
        $board = $student->getStudentSchoolBoard();

        switch ($board) {
            case 'CSM':
                self::printCSM($student);
                break;

            case 'CSMB':
                self::printCSMB($student);
                break;

            default:
                throw new Exception('Unknown schoolboard ' . $student->school_board);
                break;
        }
    }

    protected static function printCSM($student)
    {
        $grades = $student->getGrades();

        $average = self::csmAverageGrade($grades);
        $ifPass  = self::csmIfPass($grades);

        $result = new Result($student->getStudentId(), $student->getStudentName(), $grades, $average, $ifPass);

        (new PrintJson)($result);
    }

    protected static function printCSMB($student)
    {
        $grades = $student->getGrades();

        $average = self::csmbAverageGrade($grades);
        $ifPass  = self::csmbIfPass($grades);

        $result = new Result($student->getStudentId(), $student->getStudentName(), $grades, $average, $ifPass);

        (new PrintXML)($result);
    }


    /**
     * CSM rules
     */
    protected static function csmAverageGrade(array $grades)
    {
        return array_sum($grades) / count($grades);
    }

    protected static function csmIfPass(array $grades)
    {
        return self::csmAverageGrade($grades) >= 7;
    }

    /**
     * CSMB rules
     */
    protected static function csmbAverageGrade(array $grades)
    {
        if(count($grades) > 2) {
            $min = min($grades);
            $grades = array_diff($grades, [$min]); // removing $min from $grades
        }

        return array_sum($grades) / count($grades);
    }

    protected static function csmbIfPass(array $grades)
    {
        return max($grades) > 8;
    }

}
