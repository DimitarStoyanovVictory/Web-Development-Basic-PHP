<?php
session_start();
if(!isset($_SESSION['name'])) {
    if (!isset($_POST['indexName'])) {
        header('Location: index.php');
        exit;
    }

    $randomNumber = rand(1, 100);
    $_SESSION['name'] = $_POST['indexName'];
    $_SESSION['number'] = $randomNumber;
}
?>

<?php
if(isset($_POST['indexName']))
{
    $isValidName = strcspn((trim($_POST['indexName'])), '0123456789');
    if (strlen($_SESSION['name']) != $isValidName){
        header('Location: index.php');
        exit;
    }
}
?>

<form action="" method="POST">
    <h1>Hello <?= $_SESSION['name']?> pleace enter number in range [1...100]</h1>
    <input type="text" name="number">
    <input type="submit" name="submitNumber" value="Submit number">
</form>

<?php if (isset($_POST['submitNumber'])): ?>
    <?php $playerNum = (int)$_POST['number']; ?>

    <?php if(!is_int($playerNum) || empty($playerNum)): ?>
        <p>Input can't be string pleace enter number!</p>
    <?php else: ?>
        <?php if($playerNum < 1 || $playerNum > 100): ?>
            <p>Invalid number! Pleace enter number in the given limits!</p>
        <?php endif; ?>

        <?php if($playerNum === $_SESSION['number']): ?>
            <p>CONGRATULATIONS, <?=htmlspecialchars($_SESSION['name']); ?>!</p>
            <a href="index.php">[Play again?]</a>
            <?php session_destroy(); ?>
        <?php endif; ?>

        <?php if($playerNum < 1 || $playerNum > 100): ?>
            <p>Input can't be string pleace enter number</p>
        <?php endif; ?>

        <?php if($playerNum > $_SESSION['number']): ?>
            <p><b>DOWN! Enter new number.</b></p>
        <?php endif; ?>

        <?php if($playerNum < $_SESSION['number']): ?>
            <p><b>UP! Enter new number.</b></p>
        <?php endif;?>
    <?php endif;?>
<?php endif; ?>
