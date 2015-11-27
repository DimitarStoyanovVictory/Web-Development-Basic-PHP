<?php if (isset($_SESSION['username'])) : ?>
<body>
<head>
    <title>Profile</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/profile.css">
</head>
<main>
    <section>
        <article>
            <h2 id="profileName"><?php echo $_SESSION['username']?> profile</h2>
        </article>
    </section>
</main>
</body>

<?php else: ?>
<h1>You are not logged in</h1>
<?php endif; ?>
