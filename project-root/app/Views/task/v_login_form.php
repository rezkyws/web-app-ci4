<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/style.css">

    <title><?= $title; ?></title>
</head>
<body>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-6 mt-5">
            <h1>Please, Sign in!</h1>
            <?php if (session()->getFlashdata('msg')): ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
            <?php endif; ?>
            <form action="/login/auth" method="post">
                <div class="mb-3">
                    <label for="InputForUsername" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="InputForUsername"
                           value="<?= set_value('username') ?>">
                </div>
                <div class="mb-3">
                    <label for="InputForPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="InputForPassword">
                </div>
                <button type="submit" class="btn btn-primary mb-5">Login</button>
            </form>
        </div>
    </div>
</div>

<?= $this->include('layout/footer'); ?>
