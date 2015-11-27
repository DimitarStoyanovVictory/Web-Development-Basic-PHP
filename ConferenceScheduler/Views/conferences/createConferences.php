<?php if (isset($_SESSION['username'])) : ?>
<body>
<head>
    <title>Conferenses</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/conferences.css">
</head>
<main>
    <section>
        <h2 class="headerTitle">Create conference</h2>
        <form action="" method="POST" id="formAddAdministrators">
            <table>
                <tr>
                    <td class="tabledata">Add administrators:</td>
                    <td>
                        <label>
                            <select name="addAdministrators">
                                <?php
                                $list = \ConferenceScheduler\Request::getAllConfAdmins();
                                foreach($list as $admin => $value)
                                {
                                   echo "<option value=\" ". $value->getUsername()." \">".$value->getUsername() ."</option>";
                                }
                                ?>
                            </select>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td class="tabledata">Action:</td>
                    <td><input type="submit" name="addAdmins" value="Add admin!" class="inputTags"/></td>
                </tr>
                <?php if($this->error): ?>
                <tr>
                    <td class="tabledata">Error:</td>
                    <td id="invalidDetails">
                        <font color="red">
                            <?= $this->error; ?>
                        </font>
                    </td>
                </tr>
            </table>
            <?php endif; ?>
        </form>
        <form action="" method="POST" id="formAddVenueHalls">
            <table>
                <tr>
                    <td class="tabledata">Add VenueHalls:</td>
                </tr>
                <tr>
                    <td>Add the floor number of hall:</td>
                    <td><input type="text" name="hallFloors"></td>
                </tr>
                <tr>
                    <td>Add the number of the room:</td>
                    <td><input type="text" name="roomNumber"></td>
                </tr>
                <tr>
                    <td>Add user limit:</td>
                    <td><input type="text" name="userLimits"></td>
                </tr>
                <tr>
                    <td class="tabledata">Action:</td>
                    <td><input type="submit" name="addVenueHalls" value="Login!" class="inputTags"/></td>
                </tr>
            </table>
            <?php else: ?>
                <h1>You are not logged in</h1>
            <?php endif; ?>
        </form>
    </section>
</main>
</body>