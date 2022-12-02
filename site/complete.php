<?php
if ( !$_POST ) {
	header( "Location: index.html" );
}
mb_language("Japanese");
mb_internal_encoding("UTF-8");
$mailto = $_POST[ "email" ];
$subject = "お問い合わせありがとうございました";
$message = $_POST[ "name" ] . "様" . "\n" . "\n" .
"お問い合わせいただき誠にありがとうございます。" . "\n" .
"お客様からのお問い合わせを下記内容にて受け付けました" . "\n" . "\n" .
"お名前：" . $_POST["name"] . "\n" .
"ふりがな：" . $_POST["kana"] . "\n" .
"電話番号：" . $_POST["tel"] . "\n" .
"郵便番号：" . $_POST["zip"] . "\n" .
"都道府県：" . $_POST["pref"] . "\n" .
"住所：" . $_POST["address"] . "\n" .
"E-Mail：" . $_POST["email"] . "\n" .
"パスワード：" . $_POST["pass"] . "\n" .
"性別：" . $_POST["sex"] . "\n" . 
"興味のある対象：" . $_POST["interest"] . "\n" .
"お問い合わせ内容：" . "\n" .  $_POST["comment"] . "\n" . "\n" .
"※なお、本メールは自動応答にてお送りしておりますので、本メールへ返信いただいた場合は連絡はできません。" . "\n" .
"ご連絡いただいた内容について回答させていただく際は、xxx@xxxxxx.jpからご連絡させていただきます。" . "\n" . "\n" .
"※自動的にPCメールや迷惑メールとして処理される場合がございますので、返信が無い場合は、迷惑メールフォルダ等をご確認いただきますよう、お願いいたします。" . "\n" . "\n" .
"ホームページ　http://www.xxxxxxxx.jp";
$header = "MIME-Version: 1.0\n"
. "Content-Transfer-Encoding: BASE64\n"
. "Content-Type: text/plain; charset=UTF-8\n"
. "Message-Id: <" . md5(uniqid(microtime())) . "@design-plex.com>\n"//送信元ドメインを記載
. "From:" .mb_encode_mimeheader("TDP株式会社") ."<kofuji@design-plex.com>\n"//送信元アドレスを記載
. "Bcc: kofuji@design-plex.com";//実際に転送する管理者アドレスを記載

$return = "-f"."kofuji@design-plex.com";//エラーメールの返信先
mb_send_mail( $mailto, $subject, $message, $header, $return );

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>送信完了</title>
<link href="css/reset.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
<main class="inner">
	<h2 class="ttl"><span>送信完了</span></h2>
	<p>お問い合わせありがとうございました。後日担当者よりご連絡いたします。</p>
	<p><a href="index.html">TOP</a>に戻る</p>
</main>
</body>
</html>


