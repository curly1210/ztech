<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <!-- CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body class="w-100 min-vh-100 row justify-content-center align-items-center">
  <form action="?act=lien-he" method="post" style="width: 500px;">

    <div class="mb-3">
      <label class="form-label">Họ tên</label>
      <input type="text" name="ho_ten" class="form-control" id="exampleInputPassword1">
      <p style="color:red"><?= !empty($_SESSION['errors']['ho_ten']) ? $_SESSION['errors']['ho_ten'] : '' ?></p>
    </div>
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="text" name="email" class="form-control" id="exampleInputPassword1">
      <p style="color:red"><?= !empty($_SESSION['errors']['email']) ? $_SESSION['errors']['email'] : '' ?></p>
    </div>
    <div class="mb-3">
      <label class="form-label">Số điện thoại</label>
      <input type="text" name="so_dien_thoai" class="form-control" id="exampleInputPassword1">
      <p style="color:red"><?= !empty($_SESSION['errors']['dien_thoai']) ? $_SESSION['errors']['dien_thoai'] : '' ?></p>
    </div>
    <div class="mb-3">
      <label class="form-label">Nội dung</label>
      <textarea class="form-control" name="noi_dung" id="exampleFormControlTextarea1" rows="3"></textarea>
      <p style="color:red"><?= !empty($_SESSION['errors']['noi_dung']) ? $_SESSION['errors']['noi_dung'] : '' ?></p>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  <!-- JAVASCRIPT -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>