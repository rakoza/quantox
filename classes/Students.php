<?php

class Students
{
    public function __invoke()
    {
        // get database connector
        $instance = Db::getInstance();
        $conn = $instance->getConnection();

        // fetch all students
        $result = $conn->query("SELECT * FROM students");
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        foreach ($rows as $row) {
            printf("%s (%s) <a href=\"?student=%d\">click for grades</a><br>", $row["name"], $row["school_board"], $row["id"]);
        }
    }
}

