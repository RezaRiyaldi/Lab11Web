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
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">

    <title>CI4 | <?= $title ?></title>
</head>

<body>
    <div class="container shadow p-0">
        <div class="judul p-3">
            <h2 style="color: rgb(206, 206, 206);">Layout Sederhana</h2>
        </div>

        <nav class="navbar navbar-expand-lg navbar-dark p-0" style="background-color: purple;">
            <div class="container p-0">
                <button class="navbar-toggler ms-auto m-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link <?= $request->uri->getSegment(1) == '' ? 'active' : '' ?>" href="<?= base_url() ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $request->uri->getSegment(1) == 'artikel' ? 'active' : '' ?>" href="<?= base_url('artikel') ?>">Artikel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $request->uri->getSegment(1) == 'about' ? 'active' : '' ?>" href="<?= base_url('about') ?>">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $request->uri->getSegment(1) == 'contact' ? 'active' : '' ?>" href="<?= base_url('contact') ?>">Kontak</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="row m-0 my-4">
            <div class="col-md-9">
                <div class="banner py-5">