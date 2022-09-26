<?php include './includes/header.php'; ?>

    <?php  
        include './database/db_connect.php';
        include './database/edit_category.php';

        if(isset($_GET['id'])){
            $id = $_GET['id'];    
            $result = $conn->query("SELECT * FROM categories WHERE id = $id");
            $result = $result->fetch_assoc();
        }
    
    ?>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit category</h1>
    </div>


    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="col-8 m-auto">
        <p class="text-danger"><?php echo $error ?? ''; ?></p>
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" name="name" id="name" value="<?php echo $result['category_name']; ?>" placeholder="category name" class="form-control">
        </div>
        <div class="form-group">
            <label for="slug">Category slug</label>
            <input type="text" name="slug" id="slug" value="<?php echo $result['category_slug']; ?>" placeholder="slug" class="form-control">
        </div>
        <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
        <input type="submit" name="submit" class="btn btn-primary">
    </form>

<?php include './includes/footer.php'; ?>