<?php if (isset($_SESSION['username'])) : ?>
    <body>
    <head>
        <title>Conferense</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/mainPage.css">
    </head>
    <main>
        <section>
            <article>
                <h2>Conferences</h2>
                <php foreach($confernences as $conference):
                <p>$conference</p>
                endforeach;?>
            </article>
        </section>
    </main>
    </body>
<?php else: ?>
    <h1>You are not logged in</h1>
<?php endif; ?>
