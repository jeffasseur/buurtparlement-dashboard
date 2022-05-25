<?php 
include_once(__DIR__ . "/DB.php");

class Forum
{
    private $title;
    private $body;
    private $time;
    private $tag;
    private $user_id;

    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setBody($body) {
        $this->body = $body;
        return $this;
    }

    public function getBody() {
        return $this->body;
    }

    public function setTime($time) {
        $this->time = $time;
        return $this;
    }

    public function getTime() {
        return $this->time;
    }

    public function setTag($tag) {
        $this->tag = $tag;
        return $this;
    }

    public function getTag() {
        return $this->tag;
    }

    public function setUserId($user_id) {
        $this->user_id = $user_id;
        return $this;
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function save() {
        $db = DB::getConnection();
        $stmt = $db->prepare("INSERT INTO forum (title, body, time, tag, user_id) VALUES (:title, :body, :time, :tag, :user_id)");
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":body", $this->body);
        $stmt->bindParam(":time", $this->time);
        $stmt->bindParam(":tag", $this->tag);
        $stmt->bindParam(":user_id", $this->user_id);
        $stmt->execute();
    }

    public static function getAll() {
        $db = DB::getConnection();
        $stmt = $db->prepare("select * from forum order by time desc");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public static function getById($id) {
        $db = DB::getConnection();
        $stmt = $db->prepare("select * from forum where id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}