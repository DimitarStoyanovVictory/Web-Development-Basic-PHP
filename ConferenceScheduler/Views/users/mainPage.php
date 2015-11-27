<?php if (isset($_SESSION['username'])) : ?>
    <body>
    <head>
        <title>Conferense Shedulers</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/mainPage.css">
    </head>
    <main>
        <section>
            <article>
                <h2 id="userLogged">Welcome <?php echo $_SESSION['username']?></h2>
                <a href="profile" id="profile">Profile</a>
                <a href="logout" id="logout">Logout</a>
                <a href="conferences" id="conferences">Conferences</a>
            </article>
        </section>
    </main>
    </body>
<?php else: ?>
    <h1>You are not logged in</h1>
<?php endif; ?>
