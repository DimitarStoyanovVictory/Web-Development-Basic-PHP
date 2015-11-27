<?php if (!$this->user): ?>
<body>
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/loginAndRegister.css">
</head>
<main class="loginWrapper">
    <form action="" method="POST">
        <table>
            <tr>
                <td class="tabledata">Username:</td>
                <td><input type="text" name="username" class="inputTags"/></td>
            </tr>
            <tr>
                <td class="tabledata">Password:</td>
                <td><input type="password" name="password" class="inputTags"/></td>
            </tr>
            <tr>
                <td class="tabledata">Action:</td>
                <td><input type="submit" name="login" value="Login!" class="inputTags"/></td>
            </tr>
            <?php if($this->error): ?>
            <tr>
                 <tr>
                    <td class="tabledata">Error:</td>
                    <td id="invalidDetails">
                        <font color="red">
                            <?= $this->error; ?>
                        </font>
                    </td>
                </tr>
            </tr>
        <?php endif; ?>
        </table>
        <?php else: ?>
            <h1>Welcome <?=$this->user; ?></h1>
            <a href="<?= $this->url('users', 'logout')?>">
                logout
            </a>
        <?php endif; ?>
    </form>
</main>
</body>
