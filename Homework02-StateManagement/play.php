<!--<script type='text/javascript'>-->
<!--    function showButton(){-->
<!--        document.getElementById("hiddenPlayButton").style.display = 'block';-->
<!--    }-->
<!--</script>-->

<?php
session_start();
if (!isset($_POST['indexName'])) {
    header('Location: index.php');
    exit;
}
?>

<form action="" method="POST">
    <h1>Hello pleace enter number in range [1...100]</h1>
    <input type="text" name="number">
    <input type="hidden" name="name" value="<?= $_POST['indexName'];?>"/>
    <input type="submit" name="submitNumber" value="Submit number">
    <input id="hiddenPlayButton" type="hidden" name="playAgain" value="Play again" onlick="ShowButton()">
</form>

<?php

if (isset($_POST['submitNumber'])){
    $count = 0;
    $count++;

    if ($count == 1) {
    $specialNumber = rand(1, 100);
    var_dump($specialNumber);
    var_dump($count);
    }

    if ($specialNumber == $_SESSION['submitNumber']) {
    echo 'Congratulations, ' . $_POST['name'];
    } else if ($specialNumber < 1 || $specialNumber > 100) {
    echo 'InvalidNumber';
    } else if ($specialNumber < $_SESSION['number']) {
    echo 'Up';
    } else if ($specialNumber > $_SESSION['number']) {
    echo 'Down';
    } else {
    echo 'Invalid format pleace enter a integer nubmer';
    }
};
?>


