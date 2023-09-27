<?php 

include "./php/connect2.php";
 
$targetDir = "./img/"; 
$statusMsg = ''; 
if(isset($_POST["submit"])){ 
    $txtName = $_POST["namess"];
    $txtEmail = $_POST["email"];
    $txtAddress = $_POST["address"];
    $txtPhone = $_POST["moblie"];
    $txtUsername = $_POST["username"];
    $txtpassword = $_POST["password"];
    // $insert = "INSERT INTO `member` (`username`, `password`, `name`, `address`, `mobile`,`email`) VALUES ('$txtUsername', '$txtpassword', '$txtName', '$txtAddress', '$txtPhone', '$txtEmail')";
    // $rs = mysqli_query($con,$insert);
    
    if(!empty($_FILES["file"]["name"])){ 
        //get file name
        $fileName = basename($_FILES["file"]["name"]); 
        $targetFilePath = $targetDir . $fileName; 
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION); 
        
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            // Upload file to server 
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                //$insert = $con->query("INSERT INTO member (username, password, name, address, mobile, email) VALUES ('$txtUsername', '$txtpassword', '$txtName', '$txtAddress', '$txtPhone', '$txtEmail')");
                $insert = "INSERT INTO `member` (`username`, `password`, `name`, `address`, `mobile`,`email`) VALUES ('$txtUsername', '$txtpassword', '$txtName', '$txtAddress', '$txtPhone', '$txtEmail')";
                $rs = mysqli_query($con,$insert);
                if($rs){ 
                    $statusMsg = "The file ".$fileName. " has been uploaded successfully."; 
                }else{ 
                    $statusMsg = "File upload failed, please try again."; 
                }  
            }else{ 
                $statusMsg = "Sorry, there was an error uploading your file."; 
            } 
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select a file to upload.'; 
    } 




}

echo "<script type='text/javascript'>alert('{$statusMsg}'); 
    window.location = './lab8_5_2.php'
</script>";
 

?>  