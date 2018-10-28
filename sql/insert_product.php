 <?php
        include 'connect.php';
        if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_FILES["images"]["type"])){
                $msg = '';
                $uploaded = FALSE;
                $extensions = array("jpeg", "jpg", "png" , "gif"); // file extensions to be checked
                $fileTypes = array("image/png","image/jpg","image/jpeg","image/gif"); // file types to be checked
                $file = $_FILES["images"];
                $file_extension = strtolower(end(explode(".", $file["name"])));
                //file size condition can be included here   -- && ($file["size"] < 100000)
                if (in_array($file["type"],$fileTypes) && in_array($file_extension, $extensions)) {
                        if ($file["error"] > 0)
                        {
                                $msg = 'Error Code: ' . $file["error"];
                        }
                        else
                        {
                                if (file_exists("images/" . $file["name"])) {
                                        $msg = '<h2>แจ้งเตือน!! <br>รูปภาพหรือชื่อรูปภาพ ซ้ำกับสินค้าในระบบ!!</h2>';                
                                }
                                else
                                {
                                        $sourcePath = $file['tmp_name']; //  source path of the file
                                        $targetPath = '../pic/'.$file['name']; // Target path where file is to be stored
                                        move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
                                        $uploaded = TRUE;
                                        $fname = "pic/".$file['name'];
                                        $p_name = $_POST['p_name'];
                                        $p_detail = $_POST['p_detail'];
                                        $p_material = $_POST['p_material'];
                                        $p_amount = $_POST['p_amount'];
                                        $p_price = $_POST['p_price'];

                                        $sql = "INSERT INTO `product` (`p_name`, `p_detail`, `p_material`, `p_pic`, `p_price`, `p_status`) VALUES ('$p_name', '$p_detail', '$p_material', '$fname', '$p_price', '1');";
                                        $data = mysqli_query($conn,$sql);

                    
                                       // mysql_query($sql);
                             
                                }
                        }
                }
                else
                {
                        $msg = '<h2>*** <u>Alert</u>!! Invalid file Size or Type ***</h2> ';
                }
        }

        die();
        ?>
