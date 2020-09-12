<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initia-scale=1, shrink-to-fit=no">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/style.css">

    <title>よくわかるPHPの教科書</title>
</head>

<body>
    <header>
        <h1 class="font-weight-normal">よくわかるPHPの教科書</h1>
    </header>

    <main>
        <h2>Practice<h2>
                <pre>
<?php
echo "I'm studying the programming";
echo "\n";
echo "I'm hungry now";
echo "\n";
echo 24*60*60;
echo "\n";
echo "現在の時刻は";
echo date('G');
echo "時";
echo date('i');
echo "分";
echo date('s');
echo "秒です。";
echo "\n";
echo '現在は'. date('G時 i分 s秒').'です';
echo "\n";
echo "今日は".date('Y年 n月 j日')."です";
echo "\n";
$today = new DateTime();
echo $today->format('G;i;s');
echo "\n";
?>
<?php 
$sum = 100*4;
$tax = 1.1;
?>
合計金額は： <?php echo $sum; ?>円です
税込金額は： <?php echo $sum*$tax; ?>円です
<br>
<?php
#for文
// for($i=1;$i<=365;$i++){
//     echo $i."日"."\n";
// }

#while文
// $i = 1;
// while($i<=365){
//     echo $i."日"."\n";
//     if($i == date('n') * date('j')){
//         echo $i."日"."⭐️"."\n";
//     }
//     $i++;
// }
?>
<?php 
#連想配列
$fruits = [
    'apple' => 'りんご',
    'grape' => 'ぶどう',
    'lemon' => 'レモン',
    'tomato' => 'トマト',
    'peach' => 'もも'
];
foreach($fruits as $english => $japanese){
    echo $english . ":" . $japanese."  ";
}
?>
<br>
<?php
#if構文
if(date('G')<9){
    echo  "※営業時間外です";
}else{
    echo "ようこそ";
}
?>
<?php
#ファイルへの書き込み
$success = file_put_contents('../fuge/news.txt','ホームページをリニューアルしました');
if($success) {
    echo "ファイルの書き込みが完了しました";
}else{
    echo "ファイルの書き込みが失敗しました";
}
?>
<br>
<?php 
#読み込んで表示する
readfile('../fuge/news.txt');
?>
<br>
<?php 
#ファイルを追記する
$doc = file_get_contents('../fuge/news.txt');
$doc .= "<br /> 2020 09 08 ニュースを追加しました";
file_put_contents('../fuge/news.txt',$doc);

readfile('../fuge/news.txt');
?>
<br>
<!-- フォーム -->
お名前:<?php echo htmlspecialchars($_REQUEST['my_name'], ENT_QUOTES); ?> 
性別:<?php echo htmlspecialchars($_POST['gender'], ENT_QUOTES) ?>
ご予約日：
<?php
foreach($_POST['reserve'] as $reserve) {
    echo htmlspecialchars($reserve, ENT_QUOTES)." ";
}
?>
<br>
<?php
$age = "あいうえお";
// 全角数字を半角数字に変換する
$age = mb_convert_kana($age,"n","UTF-8");
// 数字かどうか確認
if(is_numeric($age)){
    echo $age."歳";
}else{
    echo "※年齢が数字ではありません。";
}
?>
<br>
<table>
    <?php
    for($i=1;$i<=10;$i++){
        if($i % 2){
            echo '<tr style="background-color:#ccc">';
        }else {
            echo '<tr>';
        }
        echo '<td>'. $i.'行目</td>';
        echo '</tr>';
    }
    ?>
</table>
<br>
<?php
$value = '変数に保存した値です';
setcookie('save_message', 'Cookieに保存した値です', time() + 60 * 60 * 24 * 14);
?>


</pre>
    </main>
</body>

</html>