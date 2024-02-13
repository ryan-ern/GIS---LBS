  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Data Invoices</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <style>
          body {
              background: #354b8f;
          }
      </style>
  </head>

  <body>
      <div class="container mt-5">
          <h3 class="text-white">Pengecekan Invoices</h3>
          <form action="" method="POST" class="text-white">
              <div class="form-group">
                  <label for="searchInvoice">Cari Invoice:</label>
                  <input type="text" class="form-control" id="searchInvoice" name="searchInvoice" required>
              </div>
              <button type="submit" class="btn btn-primary" name="search">Cari</button>
              <button type="button" class="btn btn-primary" onClick="window.location.href='../index.html#layanan'">Kembali</button>
          </form>
          <?php
            include("../connection/validate.php");
            include("../connection/koneksi.php");

            ?>
      </div>
  </body>

  </html>