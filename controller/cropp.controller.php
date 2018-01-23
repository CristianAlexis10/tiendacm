<?php
class CroppController{
        function image(){
            $data = $_POST['image'];
            $folder = $_GET['folder'];
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);
            $imageName = md5(time()).'.png';
            $_SESSION['new_cropp_image']=$imageName ;
            file_put_contents('views/assets/img/'.$folder.'/'.$imageName, $data);
            echo $imageName;
        }
}




?>
