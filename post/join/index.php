<?php
session_start();
if(!empty($_POST)) {
    // エラーの確認
    if($_POST['name'] == ''){
        $error['name'] = 'blank';
    }
    if($_POST['email'] == ''){
        $error['email'] = 'blank';
    }
    if(strlen($_POST['password']) < 4){
        $error['password'] = 'length';
    }
    if($_POST['password'] == ''){
        $error['password'] = 'blank';
    }
    $fileName = $_FILES['image']['name'];
    if(!empty($fileName)){
        // 後ろから3文字を取得
        $ext = substr($fileName, -3);
        if($ext != 'jpg' && $ext != 'png' && $ext != 'gif'){
            $error['image'] = 'type';
        }
    }
    if(empty($error)){
        // 画像のアップロード　ファイル名:202009161224me.jpg　日付を入れれば他と被らない
        $image = data('YmdHis') . $_FILES['imgae']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], '../member_picture/'. $image);
        
        // 登録情報確認画面に遷移する
        $_SESSION['join'] = $_POST;
        $_SESSION['join']['image'] = $image;
        header('Location: check.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ひとこと掲示板</title>

    <link rel="stylesheet" href="../style.css" />
</head>

<body>
    <div id="wrap">
        <div id="head">
            <h1>ひとこと掲示板</h1>
        </div>
        <div id="content">
            <p>次のフォームに必須事項をご記入しださい。</p>
            <form action="index.php" method="post" enctype="multipart/form-data">
                <dl>
                    <dt>ニックネーム<span class="required">必須</span></dt>
                    <dd>
                        <!-- エラーがあった時、入力された値を復元する -->
                        <input type="text" name="name" size="35" maxlength="255"
                            value="<?php echo htmlspecialchars($_POST['name'], ENT_QUOTES); ?>" />
                        <?php if($error['name'] == 'blank'): ?> <p class="error">※　ニックネームを入力してください</p>
                        <?php endif; ?>
                    </dd>

                    <dt>メールアドレス<span class="required">必須</span></dt>
                    <dd>
                        <input type="text" name="email" size="35" maxlength="255"
                            value="<?php echo htmlspecialchars($_POST['email'], ENT_QUOTES); ?>" />
                        <?php if($error['email'] == 'blank'): ?> <p class="error">※　メールアドレスを入力してください</p>
                        <?php endif; ?>
                    </dd>
                    <dt>パスワード<span class="required">必須</span></dt>
                    <dd>
                        <input type="password" name="password" size="10" maxlength="20"
                            value="<?php echo htmlspecialchars($_POST['password'], ENT_QUOTES); ?>" />
                        <?php if($error['password'] == 'blank'): ?> <p class="error">※　パスワードを入力してください</p>
                        <?php endif; ?>
                        <?php if($_POST['password'] == 'length'): ?> <p class="error">※ パスワードは4文字以上で入力してください</p>
                        <?php endif; ?>
                    </dd>
                    <dt>写真など</dt>
                    <dd>
                        <input type="file" name="image" size="35" />
                        <?php if($error['image'] == 'type'): ?>
                        <p class="error">※　画像は「jpg」「png」「gif」を指定してください</p>
                        <?php endif; ?>
                        <?php if(!empty($error)): ?>
                        <p class="error">＊　画像を改めて指定してください</p>
                        <?php endif; ?>
                    </dd>
                </dl>
                <div><input type="submit" value="入力内容を確認する" /></div>
            </form>
        </div>

    </div>
</body>

</html>