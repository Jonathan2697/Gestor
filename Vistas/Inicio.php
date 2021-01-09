<?php
    session_start();

    if (isset($SESSION['usuario'])) {
      include "Header.php";
      ?>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">

          </div>

        </div>

      </div>
      <?php
      include "Footer.php";
    }else {
      header("location:../Index.php");
    }
       ?>
