<?php if (!isset($_SESSION['username'])) : ?>
<body>
<head>
    <title>KojtoSoft</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/homepage.css">
</head>
<main>
    <section>
        <h1 id="confScheduler">Welcome to KojtoSoft</h1>
        <a href="users/login" id="login">Login</a>
        <a href="users/register" id="register">Register</a>
    </section>
    <?php else: ?>
       <?php header('Location: http://localhost:2020/ConferenceScheduler/users/mainPage')?>
    <?php endif; ?>
</main>
</body>