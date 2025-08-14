<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="<?= base_url('#') ?>">

</head>
<body>
     <div class="right-side d-flex align-items-center justify-content-center"
      style="flex: 2.55; background-color: #ffffff;">
      <div class="form-box bg-white p-5 rounded shadow" style="max-width: 600px; width: 100%;">
        <h2 class="text-center fw-bold mb-4" style="color:rgb(36, 25, 158);">Login</h2>

        <!-- flash data untuk pesan error -->
        <?php if (session()->getFlashdata('error')): ?>
          <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
          </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')): ?>
          <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
          </div>
        <?php endif; ?>

        <form action="<?= base_url('login/process') ?>" method="post">
          <div class="input-wrapper d-flex align-items-center bg-light p-2 rounded mb-4">
            <i class='bx bx-envelope me-2' style="color: #3f2d7c;"></i>
            <input type="text" name="email" class="form-control border-0 bg-transparent" placeholder="E-mail"
              required />
          </div>

          <div class="input-wrapper d-flex align-items-center bg-light p-2 rounded mb-4 position-relative">
            <i class='bx bx-lock-alt me-2' style="color: #3f2d7c;"></i>
            <input type="password" name="password" id="password" class="form-control border-0 bg-transparent"
              placeholder="Password" required />

            <!-- Ikon mata -->
            <i class='bx bx-show eye-icon position-absolute' style="right: 15px; cursor: pointer; color: #3f2d7c;"
              onclick="togglePassword()"></i>
          </div>

          <script>
            function togglePassword() {
              const passwordInput = document.getElementById("password");
              const eyeIcon = document.querySelector(".eye-icon");

              if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.remove("bx-show");
                eyeIcon.classList.add("bx-hide");
              } else {
                passwordInput.type = "password";
                eyeIcon.classList.remove("bx-hide");
                eyeIcon.classList.add("bx-show");
              }
            }
          </script>

          <button type="submit" class="btn-filled-custom">Login</button>
        </form>
      </div>
    </div>
</body>
</html>