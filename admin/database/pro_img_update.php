<?php 

    include './db_connect.php';

    if(isset($_POST['submit'])){
        $id = $_POST['product_id'];
        
        $bool = false;

        $result = $conn->query("SELECT thumbnail, pictures FROM products WHERE id = $id");
        $row = $result->fetch_assoc();

        $pictures = explode(',', $row['pictures']);

        if(!empty($_FILES['thumb']['name'])){
            $thumb = $_FILES['thumb'];
            $image_name = explode('.', $_FILES['thumb']['name'])[0];

            if($thumb['error'] == 0){
                if($thumb['size'] <= 5000000) { // 5 MB
                    $image_type = strtolower(explode('/', $thumb['type'])[1]);
                    if($image_type == 'jpg' || $image_type == 'png' || $image_type == 'jpeg'){
                        
                        $thumbnail = './uploads/' . $image_name . "." . time() . rand(100, 10000) . "." . $image_type;
                        
                        unlink('../'. $row['thumbnail']);
                        move_uploaded_file($thumb['tmp_name'], '../' . $thumbnail);

                        $conn->query("UPDATE `products` SET `thumbnail` = '$thumbnail' WHERE id = $id");
    
                        if($conn->error){
                            $bool = false;
                            echo "Please Contact Web Master: " . $conn->error;
                        }
                        else {
                            $bool = true;
                        }
                    }
                    else {
                        echo 'File Type Must be JPG, JPEG or PNG';
                    }
                    
                }
                else {
                    echo 'Image Must be less then or euqal to 5 MB';
                }
            }
            else {
                echo 'No Thumbnail Selected';
            }

        }

        if(!empty($_FILES['pictures']['name'][0])) {
            $picture_arr = [];
            $files = $_FILES['pictures'];
            if(count($files['name']) == 3){
                for($i = 0; $i < count($files['name']); $i++){
                    $image_name = explode('.', $files['name'][$i])[0];
                    if($files['error'][$i] == 0){
                        $image_type = strtolower(explode('/', $files['type'][$i])[1]);
                        if($image_type == 'jpg' || $image_type == 'png' || $image_type == 'jpeg'){
                            $random_name = './uploads/' . $image_name . "." . time() . rand(100, 10000) . "." . $image_type;

                            unlink('../'. $pictures[$i]);
                            move_uploaded_file($files['tmp_name'][$i], '../'.$random_name);
    
                            array_push($picture_arr, $random_name);
                        }
                        else {
                            echo 'Please Select Valid Image';
                        }
                    }
                    else {
                        echo 'Please Select Valid Images';
                    }
                }
                $prictures = implode(',' , $picture_arr);
    
                $conn->query("UPDATE `products` SET `pictures` = '$prictures' WHERE id = $id");
    
                if($conn->error){
                    echo "Please Contact Web Master: " . $conn->error;
                    $bool = false;
                }
                else {
                    $bool = true;
                }
            }
            else {
                echo 'Images Must only be 3';
            }
        }

        if($bool){
            echo "<script>window.location.replace('../products.php');</script>";
        }
    }