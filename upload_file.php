<?php

    //unlink('uploads/1678618867.xlsx');

    $myfile = fopen("uploads/info.txt", "a+") or die("Unable to open file!");
    fwrite($myfile, 'New text after write');
    fclose($myfile);

    $myfile = fopen("uploads/info.txt", "r") or die("Unable to open file!");
    echo fread($myfile,filesize("uploads/info.txt"));
    fclose($myfile);

    if($_POST){

        echo '<pre>';

        $uploaddir = 'uploads/';
        $extension = pathinfo($_FILES['user_file']['name'], PATHINFO_EXTENSION);
        $file_name = time().'.'.$extension;
        $uploadfile = $uploaddir.$file_name;

        $allowed_extensions = ['png','jpg','jpeg','gif','xlsx','pdf'];

        if(in_array($extension,$allowed_extensions)){

            if (move_uploaded_file($_FILES['user_file']['tmp_name'], $uploadfile)) {
                echo "File is valid, and was successfully uploaded.";
            }else{
                echo 'Some upload error';
            }
        }else{
            echo $extension. ' extension not allowed';
        }
        print_r($_FILES);

        
        

        
       

        print "</pre>";

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uppload File</title>
</head>
<body>
    
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" id="user_file" name="user_file" value="">
        <button type="submit" id="btn_upload" name="btn_upload" value="upload_file">Upload</button>
    </form>

</body>
</html>