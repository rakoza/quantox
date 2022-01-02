<?php

class Student
{
    // property declaration
    protected $id;
    protected $name;
    protected $schoolBoard;
    protected $conn;

    /**
     * Initialize student instance
     *
     * @param int $studentId
     */
    public function __construct($studentId)
    {
        // get database connector
        $instance = Db::getInstance();
        $this->conn = $instance->getConnection();

        list($id, $name, $school) = $this->getFromDatabase($studentId)[0];

        $this->id          = $id;
        $this->name        = $name;
        $this->schoolBoard = $school;
    }

    /**
     * id getter
     */
    public function getStudentId()
    {
        return $this->id;
    }

    /**
     * name getter
     */
    public function getStudentName()
    {
        return $this->name;
    }

    /**
     * schoolBoard getter
     */
    public function getStudentSchoolBoard()
    {
        return $this->schoolBoard;
    }

    /**
     * Fetch student details from the database
     * @param  int $studentId
     *
     * @return array
     */
    protected function getFromDatabase($studentId)
    {
        $result = $this->conn->query("SELECT id, name, school_board FROM students WHERE id = $studentId");
        return $result->fetch_all(MYSQLI_NUM);
    }

    /**
     * Get the student's grades
     *
     * @return array
     */
    public function getGrades()
    {
        $result = $this->conn->query("SELECT grade FROM student_grades WHERE student_id = {$this->id}");

        $grades = [];
        foreach ($result->fetch_all(MYSQLI_ASSOC) as $value) {
            $grades[] = $value['grade'];
        }

        return $grades;
    }

    /**
     * Print the student's grades
     *
     * @return json|xml
     */
    public function printGrades()
    {
        SchoolBoard::printGrades($this);
    }

}
