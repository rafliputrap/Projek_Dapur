<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dapur Kreatif</title>
    <link rel="stylesheet" type="text/css" href="views/css/header.css">
</head>
<body>
<header style="position:relative;">
    <h1>Dapur Kreatif</h1>
    <nav>
        <?php
        // Sembunyikan dashboard jika visitor register karena redirect
        $hide_dashboard = (isset($_GET['action']) && $_GET['action'] === 'register' && isset($_GET['info']) && $_GET['info'] === 'akses_terbatas');
        
        // Sembunyikan menu Home jika di halaman register atau login
        $hide_home = (isset($_GET['action']) && ($_GET['action'] === 'register' || $_GET['action'] === 'login'));
        
        if (isset($_SESSION['user_id']) && !$hide_dashboard): ?>
            <!-- Admin atau User terautentikasi -->
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                <a href="index.php?action=dashboard_admin">Dashboard Admin</a> |
            <?php else: ?>
                <a href="index.php?action=dashboard">Home</a> |
                <a href="index.php?action=search">Cari Resep</a> |
            <?php endif; ?>
            <a href="index.php?action=logout" style="position:absolute; right:20px; top:30px; font-weight:bold;">Logout</a>
        <?php else: ?>
            <!-- Pengunjung atau belum login -->
            <?php if (!$hide_home): ?>
                <a href="index.php">Home</a> |
            <?php endif; ?>

            <!-- Redirect ke login jika mengakses search tanpa login -->
            <?php if (isset($_GET['action']) && $_GET['action'] === 'search'): ?>
                <script>location.href='index.php?action=login';</script>
            <?php endif; ?>

            <a href="index.php?action=login">Login</a> |
            <a href="index.php?action=register">Register</a>
        <?php endif; ?>
    </nav>
</header>
<hr>
