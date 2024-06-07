2011C3
DISM
Stream
Classwork
People
2011C3
DISM
Upcoming
Woohoo, no work due soon!

Announce something to your class

Announcement: "PHP Mailing using PEAR Mail Library"
Tehreem Mushtaq
Created Jun 11Jun 11
PHP Mailing using PEAR Mail Library

paste the files in this folder in pear folder of your xampp slash php.zip
Compressed Archive


Announcement: "Cookies in PHP"
Tehreem Mushtaq
Created Jun 4Jun 4
Cookies in PHP

cookies.php
PHP


Announcement: "DB Handling with Admin Panel and…"
Tehreem Mushtaq
Created Jun 4Jun 4 (Edited Jun 11)
DB Handling with Admin Panel and Session Management

deluxe-master-two.zip
Compressed Archive

deluxe_db.sql
SQL

deluxe-master-two [final].zip
Compressed Archive


Announcement: "DB Handling and Working with templates…"
Tehreem Mushtaq
Created May 24May 24 (Edited May 24)
DB Handling and Working with templates in PHP

workingWithTemplates.zip
Compressed Archive

deluxe_db.sql
SQL


Announcement: "File Uploading in PHP Note: Create a…"
Tehreem Mushtaq
Created May 24May 24
File Uploading in PHP

Note: Create a folder named uploads in your htdocs and then execute the code

fileUploading.php
PHP

multipleFileUploading.php
PHP


Announcement: "Multi Dimensional Arrays in PHP"
Tehreem Mushtaq
Created May 17May 17
Multi Dimensional Arrays in PHP

array_multidim.php
PHP

Assignment: "Array Tasks"
Tehreem Mushtaq posted a new assignment: Array Tasks
Created May 17May 17

Announcement: "Functions in PHP"
Tehreem Mushtaq
Created May 14May 14
Functions in PHP

builtInFunctions.php
PHP


Announcement: "Arrays in PHP"
Tehreem Mushtaq
Created May 14May 14
Arrays in PHP

array_productDetail.php
PHP

array_productListing.php
PHP

arrayData.php
PHP

arrays.php
PHP

images.zip
Compressed Archive


Announcement: "Loops and Jump Statements"
Tehreem Mushtaq
Created Apr 30Apr 30
Loops and Jump Statements

loops.php
PHP

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
            <input type="file" required name="fileUpl" class="form-control" /> </p>
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
    $fileName=$_FILES['fileUpl']['name'];
    $fileType=$_FILES['fileUpl']['type'];
    $fileSize=$_FILES['fileUpl']['size']/(1024*1024);   //size in MBs
    $fileError=$_FILES['fileUpl']['error'];
    $fileTmpName=$_FILES['fileUpl']['tmp_name'];

    $allowedExt = array("jpg","png","gif","bmp","mp3","mp4","docx","pdf","rar","zip");
    // $ext = explode(".",$fileName);
    // $ext= end($ext);
    // $ext = strtolower($ext);

    $ext= @ strtolower(end(explode(".",$fileName)));

    // echo "<h2>File Information</h2>";
    // echo "<p><b>File Name:</b> $fileName</p>";
    // echo "<p><b>File Type:</b> $fileType</p>";
    // echo "<p><b>File Size:</b> $fileSize</p>";
    // echo "<p><b>File Error:</b> $fileError</p>";
    // echo "<p><b>File Tmp Name:</b> $fileTmpName</p>";

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
                    echo "<p class='text-success'> File uploaded successfully </p>"; 


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
                        echo "<video controls> <source src='$path' /> </video>";
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


?>
fileUploading.php
Displaying fileUploading.php.