<div>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select Image File to Upload:
    <input type="file" name="file">
    <input type="submit" name="submit" value="Upload">
</form>
</body>
</html>

<?php

// Include the database configuration file

include 'dbConfig.php';

$statusMsg = '';

 
 

if(isset($_POST["submit"]) && isset($_FILES["file"])){

// File upload path

$targetDir = "uploads/";

$fileName = basename($_FILES["file"]["name"]);

$targetFilePath = $targetDir . $fileName;

$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

// Allow certain file formats

$allowTypes = array('jpg','png','jpeg','gif','pdf');

if(in_array($fileType, $allowTypes)){

// Upload file to server

if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){

// Insert image file name into database

$insert = $db->query("INSERT into images (file_name, uploaded_on) VALUES ('".$fileName."', NOW())");

if($insert){

$statusMsg = "The file ".$fileName. " has been uploaded successfully.";

}else{

$statusMsg = "File upload failed, please try again.";

} 

}else{

$statusMsg = "Sorry, there was an error uploading your file.";

}

}else{

$statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';

}

}else{

$statusMsg = 'Please select a file to upload.';

}

 

// Display status message

echo $statusMsg;

?>

</div>