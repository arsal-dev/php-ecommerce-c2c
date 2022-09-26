<?php include './includes/header.php'; ?>
<?php include './database/get_categories.php'; ?>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Categories</h1>
        <a href="./add-categories.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-shopping-cart fa-sm text-white-50"></i> &nbsp; Add Category</a>
    </div>

    <!-- Products -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php while($row = $result->fetch_assoc()){ ?>
                        <tr>
                            <td><?php echo $row['category_name']; ?></td>
                            <td><?php echo $row['category_slug']; ?></td>
                            <td><?php echo $row['created_at']; ?></td>
                            <td>
                                <a href="./edit_category.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>
                                <button data-toggle="modal" data-target="#delete_category" id="<?php echo $row['id']; ?>" class="btn btn-danger dlt_cat">Delete</button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="delete_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Are You Sure You Want To Delete?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <a href="./database/delete_category.php?id=1" id="dlt_btn" type="button" class="btn btn-danger">Delete</a>
        </div>
        </div>
    </div>
    </div>


    <script>
        let dlt_cat = document.querySelectorAll('.dlt_cat');
        let dlt_btn = document.getElementById('dlt_btn');

        for(let i = 0; i < dlt_cat.length; i++){
            dlt_cat[i].addEventListener('click', function(){
                let id = this.getAttribute('id');
                dlt_btn.setAttribute('href', `./database/delete_category.php?id=${id}`);
            });
        }

    </script>
<?php include './includes/footer.php'; ?>