<?php

extract($_POST);

function upload_img($target_dir, $fileToUpload){
  $target_file = $target_dir . basename($_FILES[$fileToUpload]["name"]);//specifies the path of the file to be uploaded
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);//holds the file extension of the file
  // Check if image file is a actual image or fake image
  if(isset($do)) {
    $check = getimagesize($_FILES[$fileToUpload]["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }
  }
  // Check if file already exists
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }
  // Check file size
  if ($_FILES[$fileToUpload]["size"] > 1000000000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }
  // Allow certain file format
  $imageFileType=strtolower($imageFileType);
  if($imageFileType != "pdf") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    $catnam="catalogue";
    if (move_uploaded_file($_FILES[$fileToUpload]["tmp_name"],$target_dir.$catnam.".pdf")) {
     
      echo "The file ". basename( $_FILES[$fileToUpload]["name"]). " has been uploaded.";
      $img=$_FILES[$fileToUpload]["name"];
       return ($img);
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
  
}


?>