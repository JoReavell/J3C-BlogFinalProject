<?php
  class BlogPost {

    // we define our attributes
    // A blog post has 9 attributes
    public $id;
    public $title;
    public $summary;
    public $mainContent;
    public $image;
    public $author; //is this now username?
    public $dateCreated;
    public $category;
    public $noOfViews;
    public $profilePic;

    public function __construct($id, $title, $summary, $mainContent, $image, $author, $dateCreated, $category, $noOfViews, $profilePic) {
      $this->id    = $id;
      $this->title  = $title;
      $this->summary = $summary;
      $this->mainContent = $mainContent;
      $this->image = $image;
      $this->author = $author;
      $this->dateCreated = $dateCreated;
      $this->category = $category;
      $this->noOfViews = $noOfViews;
      $this->profilePic = $profilePic;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $sql = "SELECT blogPostID, title, summary, mainContent, image, CONCAT(firstName, ' ', lastName) AS author, dateCreated, category, noOfViews, profilePic "
          . "FROM blogPost INNER JOIN blogUser ON blogPost.author = blogUser.blogUserID "
              . "ORDER BY dateCreated DESC LIMIT 10;";
      $req = $db->query($sql);
      // we create a list of Product objects from the database results
      foreach($req->fetchAll() as $blogPost) {
        $list[] = new BlogPost($blogPost['blogPostID'], $blogPost['title'], $blogPost['summary'], $blogPost['mainContent'], $blogPost['image'], $blogPost['author'], $blogPost['dateCreated'], $blogPost['category'], $blogPost['noOfViews'], $blogPost['profilePic']);
      }
      return $list;
    }
    
     
    public static function allMyPosts($username) {
            
      $list = [];
      $db = Db::getInstance();
      $sql = "SELECT blogPostID, title, summary, mainContent, image, CONCAT(firstName, ' ', lastName) AS author" 
              . ", dateCreated, category, noOfViews, profilePic, blogUserID" 
              . " FROM blogPost INNER JOIN blogUser ON blogPost.author = blogUser.blogUserID"
              . " WHERE username = :username" //will this be available following login?
              . " ORDER BY dateCreated DESC LIMIT 10";
      $req = $db->prepare($sql);
      $req->execute(['username' => $username]);
      foreach($req->fetchAll() as $blogPost) {
        $list[] = new BlogPost($blogPost['blogPostID'], $blogPost['title'], $blogPost['summary'], $blogPost['mainContent'], $blogPost['image'], $blogPost['author'], $blogPost['dateCreated'], $blogPost['category'], $blogPost['noOfViews'], $blogPost['profilePic']);
      }
      return $list;
    } 
    
    public static function searchByCategory($category) {
        
      $list = [];
      $db = Db::getInstance();
      $sql = "SELECT blogPostID, title, summary, mainContent, image, CONCAT(firstName, ' ', lastName) AS author" 
              . ", dateCreated, category, noOfViews, profilePic, blogUserID" 
              . " FROM blogPost INNER JOIN blogUser ON blogPost.author = blogUser.blogUserID"
              . " WHERE category = :category"
              . " ORDER BY dateCreated DESC LIMIT 10";
      $req = $db->prepare($sql);
      $req->execute(['category' => $category]);
      foreach($req->fetchAll() as $blogPost) {
        $list[] = new BlogPost($blogPost['blogPostID'], $blogPost['title'], $blogPost['summary'], $blogPost['mainContent'], $blogPost['image'], $blogPost['author'], $blogPost['dateCreated'], $blogPost['category'], $blogPost['noOfViews'], $blogPost['profilePic']);
      }
      return $list;
    } 
    
    public static function searchByKeyword($keyword) {
        
      $list = [];
      $db = Db::getInstance();
      $sql = "SELECT blogPostID, title, summary, mainContent, image, CONCAT(firstName, ' ', lastName) AS author" 
              . ", dateCreated, category, noOfViews, profilePic, blogUserID" 
              . " FROM blogPost INNER JOIN blogUser ON blogPost.author = blogUser.blogUserID"
              . " WHERE title LIKE $keyword"
              . " OR summary LIKE $keyword"
              . " OR mainContent LIKE $keyword"
              . " ORDER BY dateCreated DESC LIMIT 10";

      $req = $db->prepare($sql);
      //$req->execute(['keyword' => $keyword]); //for some reason it isn't working this way so put $keyword straight into search sql????
      $req->execute();
      foreach($req->fetchAll() as $blogPost) {
        $list[] = new BlogPost($blogPost['blogPostID'], $blogPost['title'], $blogPost['summary'], $blogPost['mainContent'], $blogPost['image'], $blogPost['author'], $blogPost['dateCreated'], $blogPost['category'], $blogPost['noOfViews'], $blogPost['profilePic']);
      }
      return $list;
    } 

public static function find($id) {
      $db = Db::getInstance();
      //use intval to make sure $id is an integer
      $id = intval($id);
      $sql = $sql = "SELECT blogPostID, title, summary, mainContent, image, CONCAT(firstName, ' ', lastName) AS author, dateCreated, category, noOfViews, profilePic "
          . "FROM blogPost INNER JOIN blogUser ON blogPost.author = blogUser.blogUserID "
          . "WHERE blogPostID = :blogPostID";
      $req = $db->prepare($sql);
      //the query was prepared, now replace :id with the actual $id value
      $req->execute(array('blogPostID' => $id));
      $blogPost = $req->fetch();
    if($blogPost){
      return new BlogPost($blogPost['blogPostID'], $blogPost['title'], $blogPost['summary'], $blogPost['mainContent'], $blogPost['image'], $blogPost['author'], $blogPost['dateCreated'], $blogPost['category'], $blogPost['noOfViews'], $blogPost['profilePic']);
    }
    else
    {
        //replace with a more meaningful exception
        throw new Exception("Cannot find blog post details.");
    }
}

public static function update($id) {
    $db = Db::getInstance();
    $req = $db->prepare("Update blogPost set title=:title, summary=:summary, mainContent=:mainContent, image=:image, category=:category where blogPostID=:id");
    
// set name and price parameters and execute
    if(isset($_POST['title'])&& $_POST['title']!=""){
        $filteredTitle = filter_input(INPUT_POST,'title', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if(isset($_POST['summary'])&& $_POST['summary']!=""){
        $filteredSummary = filter_input(INPUT_POST,'summary', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if(isset($_POST['mainContent'])&& $_POST['mainContent']!=""){
        $filteredMainContent = filter_input(INPUT_POST,'mainContent', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    $title = $filteredTitle;
    $summary = $filteredSummary;
    $mainContent = $filteredMainContent;
    $image = $_FILES['image']['name'];
    $category = $_POST['category'];
    
    
    $req->bindParam(':title', $title);
    $req->bindParam(':summary', $summary);
    $req->bindParam(':mainContent', $mainContent);
    $req->bindParam(':image', $image);
    $req->bindParam(':category', $category);
    $req->bindParam(':id', $id);
$req->execute();

//upload product image
BlogPost::uploadFile($_FILES['image']['name']);
}

public static function updateNumberOfViews($id, $numberOfViews)    {
    //add 1 to the currrent number of views
    $numberOfViews++;
    $db = Db::getInstance();
    $req = $db->prepare("Update blogPost set noOfViews = $numberOfViews WHERE blogPostID=:id");
    $req->bindParam(':id', $id);
    $req->execute();
}
public static function addComment($blogPostID, $userID, $comment) {
    $db = Db::getInstance();
    $req = $db->prepare("Insert into blogComments(blogPostID, blogUserID, blogComment) "
                         . "VALUES (:blogPostID, :blogUserID, :blogComment);");
    $req->bindParam(':blogPostID', $blogPostID);
    $req->bindParam(':blogUserID', $userID);
    $req->bindParam(':blogComment', $comment);
    
    $req->execute();
    
    return $comment;
    
}
    
public static function add() {
    $db = Db::getInstance();
    $req = $db->prepare("Insert into blogPost(title, summary, mainContent, image, author, dateCreated, category) "
                        . "values (:title, :summary, :mainContent, :image, :author, :dateCreated, :category)");
    // set parameters and execute
    //Filter the text part of the input.
    if(isset($_POST['title'])&& $_POST['title']!=""){
        $filteredTitle = filter_input(INPUT_POST,'title', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if(isset($_POST['summary'])&& $_POST['summary']!=""){
        $filteredSummary = filter_input(INPUT_POST,'summary', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if(isset($_POST['mainContent'])&& $_POST['mainContent']!=""){
        $filteredMainContent = filter_input(INPUT_POST,'mainContent', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    $title = $filteredTitle;
    $summary = $filteredSummary;
    $mainContent = $filteredMainContent;
    $image = $_FILES['image']['name'];
    $date = date('Y-m-d H:i');
    $category = $_POST['category'];
    $author = $_SESSION['userID'];


    $req->bindParam(':title', $title);
    $req->bindParam(':summary', $summary);
    $req->bindParam(':mainContent', $mainContent);
    $req->bindParam(':image', $image);
    $req->bindParam(':author', $author);
    $req->bindParam(':dateCreated', $date);
    $req->bindParam(':category', $category);
    
$req->execute();

//upload product image
BlogPost::uploadFile($_FILES['image']['name']);
}

const AllowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];
const InputKey = 'image';

//die() function calls replaced with trigger_error() calls
//replace with structured exception handling
public static function uploadFile(string $name) {

	if (empty($_FILES[self::InputKey])) {
		//die("File Missing!");
                trigger_error("File Missing!");
	}
	if ($_FILES[self::InputKey]['error'] > 0) {
		trigger_error("Handle the error! " . $_FILES[InputKey]['error']);
	}
	if (!in_array($_FILES[self::InputKey]['type'], self::AllowedTypes)) {
		trigger_error("Handle File Type Not Allowed: " . $_FILES[self::InputKey]['type']);
	}

	$tempFile = $_FILES[self::InputKey]['tmp_name'];
        //$path = "C:/xampp/htdocs/blogFinalProject/views/images/";
        $path = dirname(__DIR__) . "/views/images/";
	$destinationFile = $path . $_FILES[self::InputKey]['name'];
        
	if (!move_uploaded_file($tempFile, $destinationFile)) {
		trigger_error("Handle Error");
	}
		
	//Clean up the temp file
	if (file_exists($tempFile)) {
		unlink($tempFile); 
	}
}

public static function remove($id) {
      $db = Db::getInstance();
      //make sure $id is an integer
      $id = intval($id);
      $sql = "delete FROM blogpost WHERE blogPostID = :id";
      $req = $db->prepare($sql);
      // the query was prepared, now replace :id with the actual $id value
      $req->bindParam(':id', $id);
      $req->execute();
  }
  
}
?>
