<?php

extract($_POST);

function upload_img($target_dir, $fileToUpload){

   if(!empty($_FILES[$fileToUpload]["name"]))
   {    //echo '<script> alert("hani"); </script>';
        $target_file =$target_dir.basename($_FILES[$fileToUpload]["name"]);//specifies the path of the file to be uploaded
           
          $uploadOk = 1;
          $imageFileType =pathinfo($target_file,PATHINFO_EXTENSION);//holds the file extension of the file
          // Check if image file is a actual image or fake image
          
            $check = getimagesize($_FILES[$fileToUpload]["tmp_name"]);
            if($check !== false) {
              //echo "File is an image - " . $check["mime"] . ".";
              $uploadOk = 1;
            } else {
              //echo "File is not an image.";
              $uploadOk = 0;
            }
          if ($_FILES[$fileToUpload]["size"] > 83886080) {
            //echo "Sorry, your file is too large.";
            $uploadOk = 0;
          }
          // Allow certain file format
          $imageFileType=strtolower($imageFileType);
          if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "pdf" && $imageFileType != "" ) {
            //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
          }
          // Check if $uploadOk is set to 0 by an error
          if ($uploadOk == 0) {
            //echo "Sorry, your file was not uploaded.";
          // if everything is ok, try to upload file
          } else {
            $fileName=$_FILES[$fileToUpload]["name"];
              if(strlen($fileName)>60)
              {
                  $fileName=substr($fileName,strlen($fileName)-60,strlen($fileName)-1);
                  $_FILES[$fileToUpload]["name"]=$fileName;
              }
            
            if (move_uploaded_file($_FILES[$fileToUpload]["tmp_name"],$target_dir.$_FILES[$fileToUpload]["name"])) {
                //echo '<script> alert("'.$_FILES[$fileToUpload]["name"].'login ou mot de passe est incorrect !")</script>';

              //echo "The file ". basename($_FILES[$fileToUpload]["name"]). " has been uploaded.";
              $img=$_FILES[$fileToUpload]["name"];
               return ($img);
            } else {
              //echo "Sorry, there was an error uploading your file.";
            }
          }
  }

  
}


?>