<?php include './includes/header.php'; ?>
<?php include './database/signin.php'; ?>
    <!-- Form Start  -->

    
<div class="container">
  <h1 class="h">Sign In</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <p class="text-danger mt-5"><?php echo $error ?? ""; ?></p>
        <div class="mb-2">
          <label for="email" class="form-label"></label>
          <input type="email" value="<?php echo $email ?? ""; ?>" class="form-control" name="email" id="email" placeholder="Enter Your Email">
        </div>

        <div class="mb-2">
          <label for="pass" class="form-label"></label>
          <input type="password" name="pass" class="form-control" id="pass" placeholder="Enter Your Password">
        </div>

        <input type="submit" name="submit" class="btn btn-primary" value="submit">
      </form>

    </div>

     <!-- Form end  -->


    <?php include './includes/footer.php'; ?>