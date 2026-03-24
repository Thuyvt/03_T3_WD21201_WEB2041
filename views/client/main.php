<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title ?? 'Home' ?></title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <!-- <nav class="navbar navbar-expand-xxl bg-light justify-content-center">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-uppercase" href="<?= BASE_URL ?>"><b>Home</b></a>
            </li>
        </ul>
    </nav> -->
    <nav class="navbar navbar-expand-sm bg-light shadow">
        <div class="container-fluid">
            <div class="d-flex align-items-center">
                <a class="navbar-brand" href="#">
                    <img src="../assets/uploads/logo.png" alt="Logo" width="50" height="50">
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="" class="nav-link">Danh mục 1</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">Danh mục 2</a>
                    </li>
                </ul>
            </div>
         
          <!-- Menu -->
          <ul class="navbar-nav">
            <li class="nav-item">
                <a href="" class="nav-link">Xin chào thuyvt66</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">Đăng xuất</a>
            </li>
          </ul>
        </div>
      </nav>
    <div class="container">
        <h1 class="mt-3 mb-3"><?= $title ?? 'Home' ?></h1>

        <div class="row">
            <?php
            if (isset($view)) {
                require_once PATH_VIEW_CLIENT . $view . '.php';
            }
            ?>
        </div>
    </div>

</body>

</html>