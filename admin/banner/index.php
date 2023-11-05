<?php
include "..\includes\layout.php"
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Photo Upload</title>
    <link rel="stylesheet" type="text/css" href="upload.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        @media (min-width: 990px) {
.tablemargin{
  margin-left:250px;
}

}
</style> 
  </head>
  <body>
    <h1>Upload Banner</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
      <label for="photo">Photo:</label>
      <input type="file" name="file"><br><br>
      <label for="mobilefile">Photo (mobile):</label>
      <input type="file" name="mobilefile"><br>

      <label for="title">Title:</label>
      <input type="text" id="title" name="title"><br>

      <label for="description">Link:</label>
      <textarea id="description" name="link"></textarea><br>

      <button type="submit" name="submit"value="upload">Upload</button>
    </form>

  </body>
</html>

<?php
// Include the database configuration file
include '..\includes\db.php';

// Get images from the database
$query = $conn->query("SELECT * FROM banner ORDER BY bid DESC");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = '/affilpro/assets/image/uploads/'.$row["file_name"];
?>
 <div >
<table class="tablemargin">
<tr>
    <td>banner</td>
    <td>link</td>
    <td>name</td>
    <td>delete</td>
</tr>
    <tr>
    <td><img style="max-width: 100%;
  max-height: 100%;" src="<?php echo $imageURL; ?>" alt="" /></td>
    <td> <?php echo $row["link"]; ?></td>
    <td><?php echo $row["title"]; ?></td>
    <td><a href="deletebanner.php?id=<?php echo $row["bid"]; ?>"><button > delete</button></a></td>
    </tr>
    </table>
    <div >
<?php }
}else{ ?>
    <p>No image(s) found...</p>
<?php } ?>
