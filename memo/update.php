<?php require('dbconnect.php'); ?>
<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initia-scale=1, shrink-to-fit=no">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/style.css">

    <title>memo</title>
</head>

<body>
    <header>
        <h1 class="font-weight-normal">memo</h1>
    </header>
    <main>
        <?php 
        if(isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])){
            $id = $_REQUEST['id'];
            $memos = $db->prepare('SELECT * FROM memos WHERE id=?');
            $memos->execute(array($id));
            $memo = $memos->fetch();
        }
        ?>
        <form action="update_do.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <textarea name="memo" cols="50" rows="10"><?php echo $memo['memo']; ?></textarea><br>
            <button type="submit">登録する</button>
        </form>
    </main>
</body>

</html>