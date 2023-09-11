<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title><?php echo e(env("app_name")); ?> Home</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="<?php echo e(asset('assets/js/login.js')); ?>"></script>
</head>
<body>
<section>
  <div class="container-sm border p-0">
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo e(url('/')); ?>"><?php echo e(env("app_name")); ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(empty($route_name) ? 'active':''); ?>" aria-current="page" href="<?php echo e(url('/')); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e($route_name == 'kangaroos' ? 'active':''); ?>" aria-current="page" href="<?php echo e(url('/kangaroos')); ?>">Kangaroos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" aria-current="page" href="<?php echo e(url('/logout')); ?>">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="p-3">
        <?php echo $__env->yieldContent("content"); ?>
    </section>
  </div>
</section><?php /**PATH C:\xampp\htdocs\kangaroo-tracker\resources\views/app.blade.php ENDPATH**/ ?>