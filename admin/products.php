<?php include './includes/header.php'; ?>

    <?php 

        include './database/db_connect.php';
    

        $result = $conn->query("SELECT products.*, categories.category_name FROM products INNER JOIN categories WHERE products.category_id = categories.id ORDER BY products.id DESC");

    ?>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Products</h1>
        <a href="./add-product.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-shopping-cart fa-sm text-white-50"></i> &nbsp; Add Product</a>
    </div>

    <!-- Products -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Products</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Product Description</th>
                            <th>Thumbnail</th>
                            <th>Pictures</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Product Description</th>
                            <th>Thumbnail</th>
                            <th>Pictures</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php while($row = $result->fetch_assoc()){ 
                            $pictures = explode(',', $row['pictures']);
                            ?>
                            <tr>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['category_name']; ?></td>
                                <td><?php echo $row['price'] ?></td>
                                <td><?php echo $row['product_desc'] ?></td>
                                <td><img src="<?php echo $row['thumbnail'] ?>" width="100px" alt="thumbnail"></td>
                                <td>
                                <?php for($i = 0; $i < count($pictures); $i++){ ?>
                                    <img src="<?php echo $pictures[$i] ?>" width="50px" alt="pictures">
                                <?php } ?>
                                </td>
                                <td><?php echo $row['stock'] ?></td>
                                <td><button class="btn btn-warning m-2">EDIT</button><button class="btn btn-danger delete_pro" id="<?php echo $row['id'] ?>" data-toggle="modal" data-target="#exampleModal">DELETE</button></td>
                            </tr>    
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="./database/delete_product.php?id=1" type="button" id="dlt_mdl_pro" class="btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>


<script>
    let delete_pro = document.querySelectorAll('.delete_pro');
    let dlt_mdl_pro = document.getElementById('dlt_mdl_pro');
    for(let i = 0; i < delete_pro.length; i++){
        delete_pro[i].addEventListener('click', function(){
            let id = this.getAttribute('id');
            dlt_mdl_pro.setAttribute('href', `./database/delete_product.php?id=${id}`);
        });
    }

</script>

<?php include './includes/footer.php'; ?>