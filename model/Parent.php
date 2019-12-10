<?php

class Parents
{
    private $conn = null;
    public function __construct($db)
    {
        $this->conn = $db;
    }
    /*
     * Method for returning data for student.
     */
    public function getStudent($id_parent)
    {
        $query = 'select students.first_name, students.last_name, grade.class_grade';
        $query .= ' from dnevnik.students ';
        $query .= ' join class';
        $query .= ' on students.id_class = class.id_class';
        $query .= ' join grade';
        $query .= ' on students.id_grade = grade.id_grade';
        $query .= ' where id_parent = :id_parent';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_parent', $id_parent);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return $result;
        }
        return false;
    }
}
