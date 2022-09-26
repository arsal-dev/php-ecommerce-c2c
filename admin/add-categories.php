<?php include './includes/header.php'; ?>
<?php include './database/insert_category.php'; ?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add category</h1>
    </div>


    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="col-8 m-auto">
        <p class="text-danger"><?php echo $error ?? ''; ?></p>
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" name="name" id="name" value="<?php echo $name ?? ""; ?>" placeholder="category name" class="form-control">
        </div>
        <div class="form-group">
            <label for="slug">Category slug</label>
            <input type="text" name="slug" id="slug" value="<?php echo $slug ?? ""; ?>" placeholder="slug" class="form-control">
        </div>
        <input type="submit" name="submit" class="btn btn-primary">
    </form>

<?php include './includes/footer.php'; ?>