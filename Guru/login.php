<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Modal</title>
  <!-- Link Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome untuk ikon sosial media -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
  
  <!-- Modal Login -->
  <div class="modal fade" id="myModal2" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="loginModalLabel">Masuk</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Form Login -->
          <form action="proses_login.php" method="post">
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Masuk</button>
          </form>
          
          <!-- Tombol Sosial Media -->
          <div class="text-center my-3">
            <p>atau masuk dengan:</p>
            <a href="#" class="btn btn-outline-primary btn-floating mx-1"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="btn btn-outline-primary btn-floating mx-1"><i class="fab fa-twitter"></i></a>
            <a href="#" class="btn btn-outline-primary btn-floating mx-1"><i class="fab fa-rss"></i></a>
          </div>
          
          <!-- Link Registrasi -->
          <div class="text-center">
            <p><a href="#" data-bs-toggle="modal" data-bs-target="#myModal3">Don't have an account? Sign up here</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS dan Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

  <!-- Script to Auto Trigger Modal on Page Load -->
  <script>
    document.addEventListener("DOMContentLoaded", function(){
      var myModal = new bootstrap.Modal(document.getElementById('myModal2'));
      myModal.show();
    });
  </script>
</body>
</html>
