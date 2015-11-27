<?php if (isset($_SESSION['username'])) : ?>
    <body>
    <head>
        <title>Conferenses</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/conferences.css">
    </head>
    <main>
        <section>
            <article>
                <h2 class="headerTitle">List of conferences</h2>
<!--                <php foreach($confernences as $conference):-->
<!--                    <p>$conference</p>-->
<!--                endforeach;?>-->
            </article>
        </section>
    </main>
    </body>
<?php else: ?>
    <h1>You are not logged in</h1>
<?php endif; ?>
