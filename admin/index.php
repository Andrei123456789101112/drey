<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Succession Planning</title>
    <link rel="stylesheet" href="./fontawesome-free-6.2.1-web/css/all.css">   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .navbar-custom {
            background-color: white;
        }
        #sidebar {
            height: 100vh;
            background-color: #fff;
            box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
        }

        i {
            margin-right: 12px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">

                    <li class="nav-item">
                        <a class="navbar-brand" href="index.php" style="display: grid; align-items: center"><img src="bomba.png" alt="ATS Logo" height="100" width="100" style="justify-self: center"></a>
                    </li>

                    <hr class="hr hr-blurry" />

                    <li class="nav-item">
                        <a class="nav-link" href="add_planning.php"><i class="fa fa-plus-circle" aria-hidden="true"></i>Add New </a>
                    </li>
                    <li class="nav-item">
                    <a href="../index.php" class="nav-link" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>   
                    </li>
                        <!-- Add more sidebar items here -->
                    </ul>
                </div>
            </nav>
            <!-- Main content area -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-5">
                <div class="container mt-5">
                    <h1 class="mb-5">List of Successor</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Achievement</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php include 'list_planning.php'; ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
