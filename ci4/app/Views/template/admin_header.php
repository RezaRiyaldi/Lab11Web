<?php

use CodeIgniter\Config\Services;

$request = Services::request();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">

    <!-- My CSS -->
    <!-- <link rel="stylesheet" href="<?= base_url('css/style_admin.css') ?>"> -->

    <title>Admin | <?= $title ?></title>
</head>

<body>
    <?php
    if (!isset($auth) || !$auth) {
    ?>
        <nav class="navbar navbar-expand-lg navbar-dark p-0" style="background-color: purple;">
            <div class="container p-0">
                <a class="navbar-brand" href="<?= base_url('artikel/admin') ?>">Admin</a>
                <button class="navbar-toggler ms-auto m-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link <?= $request->uri->getSegment(3) == '' ? 'active' : '' ?>" href="<?= base_url('artikel/admin') ?>">Artikel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled <?= $request->uri->getSegment(3) == 'admin' ? 'active' : '' ?>" href="<?= base_url('artikel/admin') ?>">Admin</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link disabled <?= $request->uri->getSegment(3) == 'artikel' ? 'active' : '' ?>" href="<?= base_url('artikel/admin/user') ?>">User</a>
                        </li>
                    </ul>
                </div>
                <?php
                if (session()->get('username') != NULL) {
                ?>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Hello, <?= session()->get('username') ?>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item" href="<?= base_url('user/logout') ?>">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                <?php } ?>
            </div>
        </nav>

    <?php
    }
    if (session()->getFlashdata('errors')) {
    ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <div class="container">
                <?= session()->getFlashdata('errors') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    <?php
    } else if (session()->getFlashdata('success')) {
    ?>
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <div class="container">
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    <?php } ?>