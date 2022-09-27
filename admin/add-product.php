<?php include './includes/header.php'; ?>
<?php include './database/insert_product.php' ?>
<?php 
    $result = $conn->query('SELECT * FROM categories');
?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Products</h1>
    </div>

    <p class="text-danger"><?php echo $error ?? ""; ?></p>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" class="col-8 m-auto">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" value="<?php echo $name ?? "" ?>" class="form-control" name="name" placeholder="Enter Name">
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select name="category" class="form-control" id="category">
                <?php while($row = $result->fetch_assoc()){ ?>
                    <option value="<?php echo $row['id'] ?>"><?php echo $row['category_name'] ?></option>    
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" id="price" value="<?php echo $price ?? "" ?>" class="form-control" name="price" placeholder="Enter Price">
        </div>
        <div class="form-group">
            <label for="product_desc">Product Description (Enter Comma Seperated List)</label>
            <textarea name="product_desc" placeholder="Enter Product Description" class="form-control" id="product_desc" cols="30" rows="3"><?php echo $product_desc ?? "" ?></textarea>
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" id="stock" value="<?php echo $stock ?? "" ?>" class="form-control" name="stock" placeholder="Enter Stock">
        </div>
        <div class="form-group">
            <label for="thumb">Thumbnail</label>
            <input type="file" name="thumb" accept="image/jpg, image/png, image/jpeg" id="thumb" class="form-control">
        </div>
        <div class="form-group">
            <label for="pictures">Pictues</label>
            <input type="file" multiple name="file[]" accept="image/jpg, image/png, image/jpeg" id="pictures" class="form-control">
        </div>

        <input type="submit" class="btn btn-primary" value="submit" name="submit">
    </form>

<?php include './includes/footer.php'; ?>