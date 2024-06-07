
<html>
<head>
    <title>File Uploading</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <div class= "row">
        <div class="col-lg-12">
            <br/>
            <br/>
            <h2>File Uploading</h2>
            <br/>
        </div>
    </div>

<form name="form" method="post" enctype="multipart/form-data">

    <div class= "row">
        <div class="col-lg-4">
            <p><label class="label-primary">Choose File: </label>
            <input type="file" required name="fileUpl[]" class="form-control" multiple /> </p>
        </div>
    </div>
    <div class= "row">
        <div class="col-lg-4">
            <input type="submit" name="sbt" value="Upload" class="btn btn-primary"/>
        </div>
    </div>
</form>
<br/>


<?php

if(isset($_POST['sbt']))
{
    
    $files = $_FILES['fileUpl']['name'];

    foreach($files as $k=>$v)
    {
        $fileName=$_FILES['fileUpl']['name'][$k];
        $fileType=$_FILES['fileUpl']['type'][$k];
        $fileSize=$_FILES['fileUpl']['size'][$k]/(1024*1024);   //size in MBs
        $fileError=$_FILES['fileUpl']['error'][$k];
        $fileTmpName=$_FILES['fileUpl']['tmp_name'][$k];

    $allowedExt = array("jpg","png","gif","bmp","mp3","mp4","docx","pdf","rar","zip");
    // $ext = explode(".",$fileName);
    // $ext= end($ext);
    // $ext = strtolower($ext);

    $ext= @ strtolower(end(explode(".",$fileName)));

    if($fileError == 0)
    {
        if(in_array($ext,$allowedExt))
        {
            if($fileSize <= 10)
            {
                $fileNewName = "IMG_".time().rand(1111111,9999999).".".$ext;
                $path = "uploads/".$fileNewName;

                $check = move_uploaded_file($fileTmpName,$path);

                if($check)
                {
                    //echo "<p class='text-success'> File uploaded successfully </p>"; 


                    if(in_array($ext,array("jpg","png","gif","bmp")))
                    {
                        echo "<img src='$path' width='50%' height='50%' />";
                    }
                    else if(in_array($ext,array("docx","pdf","rar","zip")))
                    {
                        echo "<a href='$path'> Download Here </a>";
                    }
                    elseif(in_array($ext,array("mp3")))
                    {
                        echo "<audio controls> <source src='$path' /> </audio>";
                    }
                    elseif(in_array($ext,array("mp4")))
                    {
                        echo "<video controls width='50%' height='50%'> <source src='$path'  /> </video>";
                    }
                }
                else
                {
                    echo "<p class='text-danger'> Error while uploading file</p>"; 
                }

            }
            else
            {
               echo "<p class='text-danger'> File Size exceeds the limit of 10 MB</p>";     
            }

        }
        else
        {
            echo "<p class='text-danger'> File Type does not meet the required criteria</p>"; 
        }
    }
    else
    {
        echo "<p class='text-danger'> Error in file. Cannot upload file.</p>"; 
    }
    }

}


?>