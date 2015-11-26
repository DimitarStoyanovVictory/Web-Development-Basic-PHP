<?php if (isset($_SESSION['username'])) : ?>
<body>
<head>
    <title>Profile</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/loginAndRegister.css">
</head>
<main>
    echo <?php $_SESSION['username']?>
    <section>Welcome <?php $_SESSION['username']?> </section>
</main>
</body>

<?php else: ?>
<h1>You are not logged in</h1>
<?php endif; ?>
