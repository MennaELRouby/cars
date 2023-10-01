<?php
include_once("includes/logged.php");
if($_SERVER["REQUEST_METHOD"] === "POST")
{
  try{
    include_once("includes/con_db.php");
    
    $sql = "SELECT * FROM `cars`";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

  } catch(PDOException $e){
    echo "Connection Failed:" .$e->getMessage();
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Table V01</title>
    <link rel="stylesheet" href="cars.css">
</head>
<body>
    <body>
        <div id="wrapper">
         <h1>Cars List</h1>
         
         <table id="keywords" cellspacing="0" cellpadding="0">
           <thead>
             <tr>
               <th><span>Car Title</span></th>
               <th><span>Price</span></th>
               <th><span>Model</span></th>
               <th><span>Delete</span></th>
               <th><span>Update</span></th>
             </tr>
           </thead>
           <tbody>
            <?php
            foreach($stmt->fetchAll() as $row){
              $title = $row["title"];
              $price = $row["price"];
              $model = $row["model"];
              

            ?>
             <tr>
               <td class="lalign"><?php echo $title ?></td>
               <td><?php echo $price ?></td>
               <td><?php echo $model ?></td>
               <td>1.8</td>
               <td>22.2</td>
             </tr>
            <?php
            } ?> 
           </tbody>
         </table>
        </div> 
       </body>
</body>
</html>
