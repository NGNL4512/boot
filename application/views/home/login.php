<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>
    <?php $this->load->helper('url');?>
    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('/comprehensive/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('/comprehensive/css/sb-admin-2.min.css'); ?>" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <main class="form-signin">
                                    <?php $this->load->library('form_validation');?>
                                    <?php echo validation_errors(); ?>
                                        <?php echo form_open('test/login') ?>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                name="account" value="<?php echo set_value('account'); ?>"
                                                placeholder="??????">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                name="password" placeholder="??????">
                                        </div>
                                        <div class="form-group">
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" type="submit">??????</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('/comprehensive/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('/comprehensive/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('/comprehensive/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('/comprehensive/js/sb-admin-2.min.js'); ?>"></script>

</body>

</html>