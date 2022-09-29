<?php include './includes/header.php'; ?>

<?php
    include './database/db_connect.php';

    $id = $_GET['id'];
    

    $result = $conn->query("SELECT * FROM products WHERE id = $id");
    $row = $result->fetch_assoc();


    $pictures = explode(',',$row['pictures']);
?>

    <div class="card p-5">
        <form action="./database/pro_img_update.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="thumbnail">Thumbnail</label>
                <input type="file" name="thumb" accept="image/jpg, image/jpeg, image/png" class="form-control">
            </div>
            <div class="form-group">
                <label for="pictures">Pictures</label>
                <input type="file" name="pictures[]" multiple accept="image/jpg, image/jpeg, image/png" class="form-control">
            </div>
            <input type="hidden" name="product_id" value="<?php echo $row['id'] ?>">
            <input type="submit" name="submit" class="btn btn-primary">
        </form>
    </div>


    <div class="card mt-5 p-5">
        <div>
            <img src="<?php echo $row['thumbnail'] ?>" width="200px" alt="thumbnail">
        </div>
        <div>
            <?php for($i = 0; $i < count($pictures); $i++): ?>
                <img src="<?php echo $pictures[$i]; ?>" width="200" alt="pictures">
            <?php endfor; ?>
        </div>
    </div>
<?php include './includes/footer.php'; ?>