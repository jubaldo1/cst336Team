

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title>Phancy Phoods</title>
        
    </head>
    <body>
          <div class="container"> 
         <div class="jumbotron vertical-center">
            
              <h1>Phancy Phoods</h1>
         
         </div>
          </div>
      
  <div class="container">
      <form method="POST" role="form" class="form-horizontal">
  <div class="form-group">
    <label for="type" class="col-sm-2 control-label">Filter By Type</label>
     <div class="col-sm-10">
    <select name="type" class="form-control">
       <option value="name" selected="selected">Name</option>
       <option value="type_name">Cuisine</option>
       <option value="author">Author</option>
    </select>
    </div>
  </div>
  <div class="form-group">
    <label for="texty" class="col-sm-2 control-label">Choose Search Term</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="texty">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Search</button>
    </div>
  </div>
</form>
         
       <?php
        include 'DBConnection.php';
        $conn = getDataBaseconnection('Recipes');
        
        if (isset($_POST["type"])) 
        {
           $type = $_POST["type"];   
        }
        
         if (isset($_POST["texty"])) 
        {
           $text = $_POST["texty"]; 
        }
        if (isset($_POST["texty"]) and $type == "author") 
        {
           $sql = "SELECT * FROM  Recipe
		            LEFT JOIN Author ON Recipe.author_id=Author.author_id
		            WHERE Author.auth_name LIKE '$text'
		            ";
        }
      /*  else if (isset($_POST["texty"]) and $type == "type_name") 
        {
           $sql = "SELECT * FROM  Recipe
		            LEFT JOIN Author ON Recipe.author_id=Author.author_id
		            LEFT JOIN Type ON Recipe.type_id=Type.type_id
		            WHERE Type.type_name LIKE '$text'
		            ";
        }*/
         else if(isset($_POST["texty"]) and (isset($_POST["type"]))) 
        {
           $sql = "SELECT * FROM  Recipe
		            LEFT JOIN Author ON Recipe.author_id=Author.author_id
		            WHERE $type LIKE '$text'
		            "; 
        }
        else 
        {
           $sql = " SELECT * FROM Recipe
                    LEFT JOIN Author ON Recipe.author_id=Author.author_id"; 
        }
       
       
        $stmt = $conn -> prepare ($sql);
        
        $stmt -> execute ();
        $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
        echo "<table class='table'>";
         echo " <thead><tr><td><h2>Recipe Name</h2></td><td><h2>Description</h2></td><td><h2>Cost</h2></td><td><h2>Author</h2></td></tr></thead>";
        foreach($records as $record){
        echo "<tr><td>" . "<a href='recipes/" . $record['name'] . ".php'>". $record['name']. "</a>". "</td><td>" . $record['description'] . "</td><td>" . $record['price'] . "</td><td>" . $record['auth_name'] . "</td></tr>";
        
        
    
}
   echo "</table>";     
?>
</div>
    </body>
</html>