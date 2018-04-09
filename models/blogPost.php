<?php
  class BlogPost {

    // we define our attributes
    // A blog post has 9 attributes
    public $id;
    public $title;
    public $summary;
    public $mainContent;
    public $image;
    public $author;
    public $dateCreated;
    public $category;
    public $noOfViews;

    public function __construct($id, $title, $summary, $mainContent, $image, $author, $dateCreated, $category, $noOfViews) {
      $this->id    = $id;
      $this->title  = $title;
      $this->summary = $summary;
      $this->mainContent = $mainContent;
      $this->image = $image;
      $this->author = $author;
      $this->dateCreated = $dateCreated;
      $this->category = $category;
      $this->noOfViews = $noOfViews;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $sql = "SELECT blogPostID, title, summary, mainContent, image, CONCAT(firstName, ' ', lastName) AS author, dateCreated, category, noOfViews "
          . "FROM blogPost INNER JOIN blogUser ON blogPost.author = blogUser.blogUserID";
      $req = $db->query($sql);
      // we create a list of Product objects from the database results
      foreach($req->fetchAll() as $blogPost) {
        $list[] = new BlogPost($blogPost['blogPostID'], $blogPost['title'], $blogPost['summary'], $blogPost['mainContent'], $blogPost['image'], $blogPost['author'], $blogPost['dateCreated'], $blogPost['category'], $blogPost['noOfViews']);
      }
      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();
      //use intval to make sure $id is an integer
      $id = intval($id);
      $sql = $sql = "SELECT blogPostID, title, summary, mainContent, image, CONCAT(firstName, ' ', lastName) AS author, dateCreated, category, noOfViews "
          . "FROM blogPost INNER JOIN blogUser ON blogPost.author = blogUser.blogUserID "
          . "WHERE blogPostID = :blogPostID";
      $req = $db->prepare($sql);
      //the query was prepared, now replace :id with the actual $id value
      $req->execute(array('blogPostID' => $id));
      $blogPost = $req->fetch();
if($blogPost){
      return new BlogPost($blogPost['blogPostID'], $blogPost['title'], $blogPost['summary'], $blogPost['mainContent'], $blogPost['image'], $blogPost['author'], $blogPost['dateCreated'], $blogPost['category'], $blogPost['noOfViews']);
    }
    else
    {
        //replace with a more meaningful exception
        throw new Exception('A real exception should go here');
    }
}

public static function update($id) {
    $db = Db::getInstance();
    $req = $db->prepare("Update product set name=:name, price=:price where id=:id");
    $req->bindParam(':id', $id);
    $req->bindParam(':name', $name);
    $req->bindParam(':price', $price);

// set name and price parameters and execute
    if(isset($_POST['name'])&& $_POST['name']!=""){
        $filteredName = filter_input(INPUT_POST,'name', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if(isset($_POST['price'])&& $_POST['price']!=""){
        $filteredPrice = filter_input(INPUT_POST,'price', FILTER_SANITIZE_SPECIAL_CHARS);
    }
$name = $filteredName;
$price = $filteredPrice;
$req->execute();

//upload product image if it exists
        if (!empty($_FILES[self::InputKey]['name'])) {
		Product::uploadFile($name);
	}

    }
    
    public static function add() {
    $db = Db::getInstance();
    $req = $db->prepare("Insert into product(name, price) values (:name, :price)");
    $req->bindParam(':name', $name);
    $req->bindParam(':price', $price);

// set parameters and execute
    if(isset($_POST['name'])&& $_POST['name']!=""){
        $filteredName = filter_input(INPUT_POST,'name', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if(isset($_POST['price'])&& $_POST['price']!=""){
        $filteredPrice = filter_input(INPUT_POST,'price', FILTER_SANITIZE_SPECIAL_CHARS);
    }
$name = $filteredName;
$price = $filteredPrice;
$req->execute();

//upload product image
Product::uploadFile($name);
    }

const AllowedTypes = ['image/jpeg', 'image/jpg'];
const InputKey = 'myUploader';

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
        $path = "C:/xampp/htdocs/MVC_Skeleton/views/images/";
	$destinationFile = $path . $name . '.jpeg';

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
      $req = $db->prepare('delete FROM product WHERE id = :id');
      // the query was prepared, now replace :id with the actual $id value
      $req->execute(array('id' => $id));
  }
  
}
?>