<?php
class Post
{
  // DB stuff
    private $conn;

    // Constructor with DB
    public function __construct($db) {
        // echo "esrdtfyguhj";
        $this->$conn = $db;
    }

    public function getStudents() {
        $query = "SELECT * FROM courseReg";
        $stmt = $this->$conn->query($query);
        return $stmt;
    }
    public function getWebStudents() {
        $query = "SELECT * FROM courseReg WHERE course='Web Development'";
        $stmt = $this->$conn->query($query);
        return $stmt;
    }
    public function getAppStudents() {
        $query = "SELECT * FROM courseReg WHERE course='App Development'";
        $stmt = $this->$conn->query($query);
        return $stmt;
    }
    public function getDesignStudents() {
        $query = "SELECT * FROM courseReg WHERE course='Graphic Designing'";
        $stmt = $this->$conn->query($query);
        return $stmt;
    }
}

?>
