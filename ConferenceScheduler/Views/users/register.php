<body>
<head>
    <title>Register</title>
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
                <td class="tabledata">Role:</td>
                <td><input type="text" name="role" class="inputTags"/></td>
            </tr>
            <tr>
                <td class="tabledata">Password:</td>
                <td><input type="password" name="password" class="inputTags"/></td>
            </tr>
            <tr>
                <td class="tabledata">Action:</td>
                <td><input type="submit" name="register" value="Register!" class="inputTags"/></td>
            </tr>
            <?php if($this->error): ?>
                <tr>
                    <td class="tabledata">Error:</td>
                    <td><font color="red"><?= $this->error; ?></font></td>
                </tr>
            <?php endif; ?>
        </table>
    </form>
</main>
</body>

