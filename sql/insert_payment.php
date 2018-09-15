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
                                        $pay_c_id = $_POST['pay_c_id'];
                                        $pay_type = $_POST['pay_type'];
                                        $pay_book_id = $_POST['pay_book_id'];


                                        $sql = "INSERT INTO `payment` (`pay_booking_id`, `pay_pic`, `pay_type`, `pay_cus_id`, `pay_status`, `pay_delete`) VALUES ('$pay_book_id', '$fname', '$pay_type', '$pay_c_id', '0', '1');";
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
