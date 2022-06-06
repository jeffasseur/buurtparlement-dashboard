<?php
include_once(__DIR__ . "/DB.php");

class Document {
    private $title;
    private $path;
    private $time;
    private $user_id;
    private $name;
    private $type;
    private $tmp_name;
    
    public function setTitle($title) 
    {
        if(empty($title)) {
            throw new Exception("Title is required");
        }
        $this->title = $title;
        return $this;
    }

    public function getTitle() 
    {
        return $this->title;
    }

    public function setPath($path) 
    {
        if(empty($path)) {
            throw new Exception("Path is required");
        }
        $this->path = $path;
        return $this;
    }

    public function getPath() 
    {
        return $this->path;
    }

    public function setTime($time) 
    {
        if(empty($time)) {
            throw new Exception("Time is required");
        }
        $this->time = $time;
        return $this;
    }

    public function getTime() 
    {
        return $this->time;
    }

    public function setUserId($user_id) 
    {
        if(empty($user_id)) {
            throw new Exception("User ID is required");
        }
        $this->user_id = $user_id;
        return $this;
    }

    public function getUserId() 
    {
        return $this->user_id;
    }

    public function setName($name) 
    {
        if(empty($name)) {
            throw new Exception("Name is required");
        }
        $this->name = $name;
        return $this;
    }

    public function getName() 
    {
        return $this->name;
    }

    public function setType($filename) 
    {
        if(empty($filename)) {
            throw new Exception("Type is required");
        }

        if(str_contains($filename, ".")) {
            $newfilename = explode(".", $filename);
        } else if (str_contains($filename, "/")) {
            $newfilename = explode("/", $filename);
        }

        var_dump($newfilename);

        switch ($newfilename[1]) {
            case 'doc || docx || pages':
                $this->type = "bxs-file-doc";
                break;

            case 'pdf':
                $this->type = "bxs-file-pdf";
                break;

            case 'xls || xlsx':
                $this->type = "bx-table";
                break;

            case 'ppt || pptx':
                $this->type = "bxs-slideshow";
                break;

            case 'txt':
                $this->type = "bxs-file-text";
                break;

            default:
                $this->type = "bxs-file-blank";
                break;
        }

        return $this;
    }

    public function getType() 
    {
        return $this->type;
    }

    public function setTmpName($tmp_name) 
    {
        if(empty($tmp_name)) {
            throw new Exception("Tmp name is required");
        }
        $this->tmp_name = $tmp_name;
        return $this;
    }

    public function getTmpName() 
    {
        return $this->tmp_name;
    }

    public function save()
    {
        $conn = DB::getConnection();
        $statement = $conn->prepare("insert into documents (title, path, time, user_id, name, type, tmp_name) values (:title, :path, :time, :user_id, :name, :type, :tmp_name)");
        $statement->bindValue(":title", $this->title);
        $statement->bindValue(":path", $this->path);
        $statement->bindValue(":time", $this->time);
        $statement->bindValue(":user_id", $this->user_id);
        $statement->bindValue(":name", $this->name);
        $statement->bindValue(":type", $this->type);
        $statement->bindValue(":tmp_name", $this->tmp_name);
        return $statement->execute();
    }

    public static function getAll() 
    {
        $conn = DB::getConnection();
        $statement = $conn->prepare("select * from documents");
        $statement->execute();
        $documents = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $documents;
    }

    public static function getById($id) 
    {
        $conn = DB::getConnection();
        $statement = $conn->prepare("select * from documents where id = :id");
        $statement->bindValue(":id", $id);
        $statement->execute();
        $document = $statement->fetch(PDO::FETCH_ASSOC);

        return $document;
    }
}


