<?php
require_once "Database.php";
class QuestionModel extends Database
{
    public function getQuestions($limit)
    {
        return $this->select("SELECT * FROM questions ORDER BY id ASC LIMIT ?", ["i", $limit]);
    }
    public function getQuestionsById($id)
    {
        return $this->select("SELECT * FROM questions WHERE id = ?", ["i", $id]);
    }
    
}
