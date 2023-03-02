<?= doctype() ?>
<?php
$time = time();
$tp = "?" . $time
?>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--<link rel="shortcut icon" type="image/png" href=""/>-->

        <title>{app_title}</title>

        <style type="text/css">
            /* Extra small devices (portrait phones, less than 576px)*/
            /* No media query for `xs` since this is the default in Bootstrap*/
            .app-content {
                margin-top: 70px;
            }
            input[disabled="disabled"] {
                cursor: not-allowed;
            }
            .content-responsive {
                width: 200%;
            }
            .card.h-100.is-new::before {
                content: "";
                display: block;
                position: absolute;
                background: transparent;
                top: 0rem;
                right: 0rem;
                border-right: 70px solid orange;
                border-bottom: 70px solid transparent;
            }
            .card.h-100.is-new::after {
                content: "New";
                display: block;
                width: 100px;
                height: 100px;
                position: absolute;
                background: transparent;
                top: 0rem;
                right: 0rem;
                color: white;
                text-align: center;
                font-weight: bold;
                transform: rotate(45deg);
            }

            .card-gift .card-title {
                font-size: 1rem;
            }
            .card-gift .card-text {
                font-size: 12px;
            }
            .card-gift .text-point {
                font-size: 12px;
            }
            .card-gift .text-reviews {
                font-size: 11px;
            }
            .card-gift .text-wish {
                font-size: 24px;
            }

            .card-gift-detail .card-img-top {
                width: 250px;
                height: auto;
                margin: auto;
            }
            .card-gift-detail .text-wish {
                font-size: 1rem;
            }
            .card-gift-detail .text-wish .fa-heart {
                font-size: 2rem;
            }
            .card-gift-detail .reviews {
                /*border-top: 1px solid gray;*/
                /*border-bottom: 1px solid gray;*/
            }
            .card-gift-detail .text-reviews {
                font-size: 11px;
                display: flex;
                flex-flow: column;
                justify-content: center;
            }
            .card-gift-detail .text-point {
                font-size: 1rem;
                font-weight: bold;
                display: flex;
                flex-flow: column;
                justify-content: center;
            }
            .card-gift-detail .text-wish {
                font-size: 11px;
                display: flex;
                flex-flow: column;
                justify-content: center;
            }

            /* Small devices (landscape phones, 576px and up)*/
            @media (min-width: 576px) {
                .content-responsive {
                    width: 100%;
                }
            }

            /* Medium devices (tablets, 768px and up)*/
            @media (min-width: 768px) {
                .dropdown:hover .dropdown-menu {
                    display: block;
                }

                .card-gift .card-title {
                    font-size: 1.25rem;
                }
                .card-gift .card-text {
                    font-size: 1rem;
                }
                .card-gift .text-point {
                    font-size: 1rem;
                }
                .card-gift .text-reviews {
                    font-size: 1rem;
                }
                .card-gift .text-wish {
                    font-size: 2rem;
                }

                .card-gift-detail .card-img-top {
                    width: 400px;
                }
            }

            /* Large devices (desktops, 992px and up)*/
            @media (min-width: 992px) {
            }

            /* Extra large devices (large desktops, 1200px and up)*/
            @media (min-width: 1200px) {
            }
        </style>
    </head>
    <body>
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="<?= base_url() ?>"><i class="fas fa-fw fa-gift"></i> GiftsApp</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?= base_url() ?>"><i class="fas fa-fw fa-home"></i> Beranda <span class="sr-only">(current)</span></a>
                        </li>
                        <!--
                        <li class="nav-item">
                            <a class="nav-link" href="<!?= site_url('produk') ?>">Produk</a>
                        </li>
                        -->
                        <!--
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Transaksi
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<!?= site_url('transaksi/penjualan') ?>">Penjualan</a>
                            </div>
                        </li>
                        -->
                        <!--
                        <li class="nav-item">
                            <a class="nav-link" href="<!?= site_url('FormCheckIn') ?>">Form Check In</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<!?= site_url('FormCheckOut') ?>">Form Check Out</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<!?= site_url('Report') ?>">Page report</a>
                        </li>
                        -->

                        <li class="nav-item active">
                            <a class="nav-link" href="<?= site_url('Gifts') ?>">Gifts</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="app-content container">
            <h1>{app_heading}</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Library</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ol>
            </nav>

            {app_content}
        </div>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy; <?= date('Y') ?> H-Soft</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="mailto:g9.hofar.ismail@gmail.com"><i class="far fa-fw fa-envelope"></i> Email</a></li>
                <li class="list-inline-item"><a href="https://api.whatsapp.com/send?phone=6281226490344" target="_wa"><i class="fab fa-fw fa-whatsapp"></i> WhatsApp</a></li>
            </ul>
        </footer>

        <!-- Bootstrap CSS -->
        <?= link_tag(base_url('assets/bootstrap/css/bootstrap.min.css') . $tp, 'stylesheet', 'text/css') ?>

        <!--FontAwesome-->
        <?= link_tag(base_url('assets/fontawesome/css/all.min.css') . $tp, 'stylesheet', 'text/css') ?>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script>window.jQuery || document.write('<script src="<?= base_url('assets/jquery/js/jquery.min.js') . $tp ?>"><\/script>');</script>
        <script src="<?= base_url('assets/vendor/js/popper.min.js') . $tp ?>"></script>
        <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') . $tp ?>"></script>

        <script>
            $(document).ready(function () {
                $('.dropdown-toggle').click(function (e) {
                    if ($(document).width() > 768) {
                        e.preventDefault();

                        var url = $(this).attr('href');

                        if (url !== '#') {
                            window.location.href = url;
                        }
                    }
                });
            });
        </script>
    </body>
</html>