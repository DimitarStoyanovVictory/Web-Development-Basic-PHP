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
        <form action="" method="POST" class="formForAdding">
            <table>
                <tr>
                    <td class="tabledata">Enter venue name:</td>
                    <td><input type="text" name="enterVenueName"></td>
                </tr>
                <tr>
                    <td class="tabledata">Action:</td>
                    <td><input type="submit" name="submitVenueName" value="Submit name!"></td>
                </tr>
            </table>
        </form>
        <form action="" method="POST" class="formForAdding">
            <table>
                <tr>
                    <td class="tabledata">Enter date of conference:</td>
                    <td><input type="date" name="enterDateConference"></td>
                </tr>
                <tr>
                    <td class="tabledata">Action:</td>
                    <td><input type="submit" name="submitVenueName" value="Submit date!"></td>
                </tr>
            </table>
        </form>
        <form action="" method="POST" class="formForAdding">
            <table>
                <tr>
                    <td class="tabledata">Enter venue days:</td>
                    <td><input type="text" name="enterVenueDays"></td>
                </tr>
                <tr>
                    <td class="tabledata">Action:</td>
                    <td><input type="submit" name="submitVenueDays" value="Submit name!"></td>
                </tr>
            </table>
        </form>
        <form action="" method="POST" class="formForAdding">
            <table>
                <tr>
                    <td class="tabledata">Add administrators:</td>
                    <td>
                        <label>
                            <select name="addAdministrators">
                                <?php
                                $admins = \ConferenceScheduler\Request::getAllConfAdmins();
                                foreach($admins as $admin => $value)
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
            </table>
        </form>
        <form action="" method="POST" class="formForAdding">
            <table>
                <tr>
                    <td class="tabledata">Add VenueHalls:</td>
                </tr>
                <tr>
                    <td class="tabledata">Add the floor number of hall:</td>
                    <td><input type="text" name="hallFloors"></td>
                </tr>
                <tr>
                    <td class="tabledata">Add the number of the room:</td>
                    <td><input type="text" name="roomNumber"></td>
                </tr>
                <tr>
                    <td class="tabledata">Add user limit:</td>
                    <td><input type="text" name="userLimits"></td>
                </tr>
                <tr>
                    <td class="tabledata">Action:</td>
                    <td><input type="submit" name="addVenueHalls" value="Login!" class="inputTags"/></td>
                </tr>
            </table>
        </form>
        <form action="" method="POST" class="formForAdding">
            <table>
                <tr>
                    <td class="tabledata">Create program:</td>
                </tr>
                <tr>
                    <td class="tabledata">Enter the day for the program:</td>
                    <td><input type="text" name="programDay"></td>
                </tr>
                <tr>
                    <td class="tabledata">Enter lecture time:</td>
                    <td><input type="time" name="roomNumber"></td>
                </tr>
                <tr>
                    <td class="tabledata">Enter berak after lecture:</td>
                    <td><input type="time" name="userLimits"></td>
                </tr>
                <tr>
                    <td class="tabledata">Action:</td>
                    <td><input type="submit" name="addVenueHalls" value="Login!" class="inputTags"/></td>
                </tr>
            </table>
        </form>
        <form action="" method="POST" class="formForAdding">
            <table>
                <tr>
                    <td class="tabledata">Add speakers:</td>
                    <td>
                        <label>
                            <select name="addAdministrators">
                                <?php
                                $users= \ConferenceScheduler\Request::getAllUsers();
                                foreach($users as $user => $value)
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
                    <td><input type="submit" name="addAdmins" value="Add speaker!" class="inputTags"/></td>
                </tr>
            </table>
        </form>
    </section>
    <?php else: ?>
        <h2>You are not logged in!</h2>
    <?php endif; ?>
</main>
</body>