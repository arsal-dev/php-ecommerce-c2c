<?php

    include './database/db_connect.php';

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $price = $_POST['price'];
        $product_desc = $_POST['product_desc'];
        $stock = $_POST['stock'];
        $category_id = $_POST['category'];

        if(empty($name)){
            $error = 'Please Enter Product Name';
        }
        elseif(empty($price)){
            $error = 'Please Enter Product Price';
        }
        elseif(empty($product_desc)){
            $error = 'Please Enter Product Description';
        }
        elseif(empty($stock)){
            $error = 'Please Enter Product Stock';
        }
        else {
            if(isset($_FILES['thumb']['name'])){
                // print_r($_FILES['thumb']);
                $thumb = $_FILES['thumb'];

                $image_name = explode('.', $_FILES['thumb']['name'])[0];

                if($thumb['error'] == 0){
                    if($thumb['size'] <= 5000000) { // 5 MB
                        $image_type = strtolower(explode('/', $thumb['type'])[1]);
                        if($image_type == 'jpg' || $image_type == 'png' || $image_type == 'jpeg'){
                            
                            $thumbnail = './uploads/' . $image_name . "." . time() . rand(100, 10000) . "." . $image_type;
                            if(!is_dir('uploads')){
                                mkdir('./uploads');
                                move_uploaded_file($thumb['tmp_name'], $thumbnail);
                                uploadFiles($thumbnail, $conn);
                            }
                            else {
                                move_uploaded_file($thumb['tmp_name'], $thumbnail);
                                uploadFiles($thumbnail, $conn);
                            }
                        }
                        else {
                            $error = 'File Type Must be JPG, JPEG or PNG';
                        }
                        
                    }
                    else {
                        $error = 'Image Must be less then or euqal to 5 MB';
                    }
                }
                else {
                    $error = 'No Thumbnail Selected';
                }
            }
        }
    }

    function uploadFiles($thumbnail, $conn){
        $name = $GLOBALS['name'];
        $price = $GLOBALS['price'];
        $stock = $GLOBALS['stock'];
        $product_desc = $GLOBALS['product_desc'];
        $category_id = $GLOBALS['category_id'];
        $files = $_FILES['file'];

        $picture_arr = [];

        if(count($files['name']) == 3){
            for($i = 0; $i < count($files['name']); $i++){
                $image_name = explode('.', $files['name'][$i])[0];
                if($files['error'][$i] == 0){
                    $image_type = strtolower(explode('/', $files['type'][$i])[1]);
                    if($image_type == 'jpg' || $image_type == 'png' || $image_type == 'jpeg'){
                        $random_name = './uploads/' . $image_name . "." . time() . rand(100, 10000) . "." . $image_type;
                        move_uploaded_file($files['tmp_name'][$i], $random_name);

                        array_push($picture_arr, $random_name);
                    }
                    else {
                        unlink($thumbnail);
                        $GLOBALS['error'] = 'Please Select Valid Image';
                    }
                }
                else {
                    unlink($thumbnail);
                    $GLOBALS['error'] = 'Please Select Valid Images';
                }
            }
            $prictures = implode(',' , $picture_arr);

            $conn->query("INSERT INTO `products`(`category_id`, `name`, `price`, `product_desc`, `thumbnail`, `pictures`, `stock`) VALUES ('$category_id','$name','$price','$product_desc','$thumbnail','$prictures','$stock')");

            if($conn->error){
                $GLOBALS['error'] = "Please Contact Web Master: " . $conn->error;
            }
            else {
                echo "<script>window.location.replace('./products.php');</script>";
            }
        }
        else {
            unlink($thumbnail);
            $GLOBALS['error'] = 'Images Must only be 3';
        }


    }