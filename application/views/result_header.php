<!DOCTYPE html>
<html lang="en-US" class="no-js">

<head>
    <title>Vilary Salon & Spa</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='<?= base_url(); ?>assets/css/bootstrap.min.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?= base_url(); ?>assets/css/animate.min.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?= base_url(); ?>style.css' type='text/css' media='all' />
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans%3A300italic%2C400italic%2C700italic%2C300%2C400%2C700%2C800%7CMontserrat%3A300italic%2C400italic%2C700italic%2C300%2C400%2C700%7CDosis%3A400%2C700&#038;ver=4.5' type='text/css' media='all' /><!-- font -->
    <link rel='stylesheet' href='<?= base_url(); ?>icons/elegantline/style.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?= base_url(); ?>assets/css/font-awesome.min.css' type='text/css' media='all' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel='stylesheet' href='<?= base_url(); ?>assets/css/flexslider.css' type='text/css' media='all' />
    <link rel='stylesheet' href="https://fonts.googleapis.com/css?family=Tangerine">

    <style>
        .f1-steps {
            overflow: hidden;
            position: relative;
            margin-top: 20px;
        }

        .f1-progress {
            position: absolute;
            top: 24px;
            left: 0;
            width: 100%;
            height: 1px;
            background: #ddd;
        }

        .f1-progress-line {
            position: absolute;
            top: 0;
            left: 0;
            height: 1px;
            background: #5cdecd;
        }

        .f1-step {
            position: relative;
            float: left;
            width: 33.3%;
            padding: 0 5px;
        }

        .f1-step-icon {
            display: inline-block;
            width: 40px;
            height: 40px;
            margin-top: 4px;
            background: #ddd;
            font-size: 16px;
            color: #fff;
            line-height: 40px;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            border-radius: 50%;
        }

        .f1-step.activated .f1-step-icon {
            background: #fff;
            border: 1px solid #f67219;
            color: #f67219;
            line-height: 38px;
        }

        .f1-step.active .f1-step-icon {
            width: 48px;
            height: 48px;
            margin-top: 0;
            background: #f67219;
            font-size: 22px;
            line-height: 48px;
        }

        .f1-step p {
            color: #ccc;
        }

        .f1-step.activated p {
            color: #f67219;
        }

        .f1-step.active p {
            color: #f67219;
        }

        .f1 fieldset {
            display: none;
            text-align: left;
        }

        .f1-buttons {
            text-align: right;
        }

        .f1 .input-error {
            border-color: #f35b3f;
        }

        #iya,
        #tidak {
            border: 1px solid;
            border-color: #f67219;
        }

        #btn-reservasi {
            background-color: #f67219;
            color: white;
            width: 200px;
        }

        #btn-reservasi:hover {
            background-color: #522607;
        }

        #blog {
            background-color: #5cdecd;
        }

        #reservasi {
            padding: 150px 0;
            background-image: url(/assets/img/spa/bg.jpg);
            background-color: #5cdecd;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }

        #submit {
            background-color: lightgray;
            color: black;
        }

        #submit:hover {
            background-color: #f67219;
            color: white;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
        $(document).on('click', '.preview-brosur', function(e) {
            e.preventDefault()
            $('#exampleModal').modal('show')
            let path = '<?= base_url('assets/images/') ?>';
            $('#image').attr('src', path + $(this).data('img'))
        })

        function scroll_to_class(element_class, removed_height) {
            var scroll_to = $(element_class).offset().top - removed_height;
            if ($(window).scrollTop() != scroll_to) {
                $('html, body').stop().animate({
                    scrollTop: scroll_to
                }, 0);
            }
        }

        function bar_progress(progress_line_object, direction) {
            var number_of_steps = progress_line_object.data('number-of-steps');
            var now_value = progress_line_object.data('now-value');
            var new_value = 0;
            if (direction == 'right') {
                new_value = now_value + (100 / number_of_steps);
            } else if (direction == 'left') {
                new_value = now_value - (100 / number_of_steps);
            }
            progress_line_object.attr('style', 'width: ' + new_value + '%;').data('now-value', new_value);
        }

        $(document).ready(function() {
            // Form
            $('.f1 fieldset:first').fadeIn('slow');

            $('.f1 input[type="text"], .f1 input[type="password"], .f1 input[type="checkbox"], .f1 textarea').on('focus', function() {
                $(this).removeClass('input-error');
            });

            // step selanjutnya (ketika klik tombol selanjutnya)
            $('.f1 .btn-next').on('click', function() {
                var parent_fieldset = $(this).parents('fieldset');
                var next_step = true;
                // navigation steps / progress steps
                var current_active_step = $(this).parents('.f1').find('.f1-step.active');
                var progress_line = $(this).parents('.f1').find('.f1-progress-line');

                // validasi form
                parent_fieldset.find('input[type="text"], input[type="password"], input[type="checkbox"], textarea').each(function() {
                    if ($(this).val() == "") {
                        $(this).addClass('input-error');
                        next_step = false;
                    } else {
                        $(this).removeClass('input-error');
                    }
                });

                if (next_step) {
                    parent_fieldset.fadeOut(400, function() {
                        // change icons
                        current_active_step.removeClass('active').addClass('activated').next().addClass('active');
                        // progress bar
                        bar_progress(progress_line, 'right');
                        // show next step
                        $(this).next().fadeIn();
                        // scroll window to beginning of the form
                        scroll_to_class($('.f1'), 20);
                    });
                }
            });

            // step sbelumnya (ketika klik tombol sebelumnya)
            $('.f1 .btn-previous').on('click', function() {
                // navigation steps / progress steps
                var current_active_step = $(this).parents('.f1').find('.f1-step.active');
                var progress_line = $(this).parents('.f1').find('.f1-progress-line');

                $(this).parents('fieldset').fadeOut(400, function() {
                    // change icons
                    current_active_step.removeClass('active').prev().removeClass('activated').addClass('active');
                    // progress bar
                    bar_progress(progress_line, 'left');
                    // show previous step
                    $(this).prev().fadeIn();
                    // scroll window to beginning of the form
                    scroll_to_class($('.f1'), 20);
                });
            });

            // submit (ketika klik tombol submit diakhir wizard)
            $('.f1').on('submit', function(e) {
                // validasi form
                $(this).find('input[type="text"], input[type="password"], input[type="checkbox"], textarea').each(function() {
                    if ($(this).val() == "") {
                        e.preventDefault();
                        $(this).addClass('input-error');
                    } else {
                        $(this).removeClass('input-error');
                    }
                });
            });
        });
    </script>
</head>

<body class="frontpage">
    <div class="page-loader">
        <img src="<?= base_url(); ?>assets/img/loader.gif" alt="loader">
    </div>
    <!-- Header ================================================== -->
    <header id="header">
        <div id="mega-menu" class="header header2 header-sticky primary-menu icons-no default-skin zoomIn align-right">
            <nav class="navbar navbar-default redq">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?= base_url() ?>">
                            <!-- <img src="assets/img/image482.png" style="width: 45%; padding-top: 10px;" alt="logo"> -->
                            <img src="<?= base_url(); ?>/assets/img/image48.png" style="width: 50%; padding-top: 10px;" alt="logo">
                        </a>
                    </div>
                    <div class="collapse navbar-collapse" id="navbar">
                        <a class="mobile-menu-close"><i class="fa fa-close"></i></a>
                        <div class="menu-top-menu-container">
                            <ul id="menu-top-menu" class="nav navbar-nav nav-list">
                                <li><a href="<?= base_url() ?>">Home</a></li>
                                <li><a href=" #contact">Kontak</a></li>
                                <?php if ($this->session->userdata('id')) : ?>
                                    <li><a href="<?= base_url('auth_pelanggan/logout/') ?>" style="color:#7D7F7F; display: inline;"><?= $this->session->userdata('username') ?></a> | <a href="<?= base_url('auth_pelanggan/logout/') ?>" style="display: inline;" value="<?= $this->session->userdata('email'); ?>" style="color:#7D7F7F;">LOGOUT</a></li>
                                <?php else : ?>
                                    <li><a href="#" data-toggle="modal" data-target="#login">Sign In</a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#registerModal">Sign Up</a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- Modal -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sign In</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('auth_pelanggan/login/') ?>" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </div>
        </div>
    </div>
    </form>

    <!-- Register -->

    <!-- Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sign Up</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">



                    <form action="<?= base_url('auth_pelanggan/registration'); ?>" method="post">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username (must be unique)">
                        </div>

                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                        </div>

                        <div class="form-group">
                            <label for="password1">Password</label>
                            <input type="password" class="form-control" id="password1" name="password1" placeholder="Enter a Password">
                        </div>

                        <div class="form-group">
                            <label for="password2">Repeat Password</label>
                            <input type="password" class="form-control" id="password2" name="password2" placeholder="Repeat Password">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Register Account !</button>
                </div>
            </div>
        </div>
    </div>
    </form>