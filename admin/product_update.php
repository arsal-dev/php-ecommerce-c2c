<?php include './includes/header.php'; ?>
<?php include './database/update_product.php' ?>
<?php 
    $result = $conn->query('SELECT * FROM categories');

    $id = $_GET['id'];


    $product = $conn->query("SELECT * FROM products WHERE id = $id");

    $product = $product->fetch_assoc();

?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Products</h1>
    </div>

    <p class="text-danger"><?php echo $error ?? ""; ?></p>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="col-8 m-auto">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" value="<?php echo $product['name'] ?? "" ?>" class="form-control" name="name" placeholder="Enter Name">
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select name="category" class="form-control" id="category">
                <?php while($row = $result->fetch_assoc()){ ?>
                    <?php if($product['category_id'] == $row['id']): 
                        $selected = "selected";?>
                    <?php else: ?>
                        <?php $selected = ''; ?>
                    <?php endif; ?>
                        <option <?php echo $selected; ?> value="<?php echo $row['id'] ?>"><?php echo $row['category_name'] ?></option> 
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" id="price" value="<?php echo $product['price'] ?? "" ?>" class="form-control" name="price" placeholder="Enter Price">
        </div>
        <div class="form-group">
            <label for="product_desc">Product Description (Enter Comma Seperated List)</label>
            <textarea name="product_desc" placeholder="Enter Product Description" class="form-control" id="product_desc" cols="30" rows="3"><?php echo $product['product_desc'] ?? "" ?></textarea>
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" id="stock" value="<?php echo $product['stock'] ?? "" ?>" class="form-control" name="stock" placeholder="Enter Stock">
        </div>
        <input type="hidden" name='product_id' value="<?php echo $product['id'] ?? "" ?>">
        <input type="submit" class="btn btn-primary" value="submit" name="submit">
    </form>

<?php include './includes/footer.php'; ?>