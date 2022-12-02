<?php
if ( !$_POST ) {
	header( "Location: index.html" );
}
function convert_char( $target ) {
	$target = stripslashes( $target );
	$target = htmlspecialchars( $target, ENT_QUOTES );
	return $target;
}
$name = convert_char( $_POST[ "name" ] );
$kana = convert_char( $_POST[ "kana" ] );
$tel = convert_char( $_POST[ "tel" ] );
$tel = mb_convert_kana( $tel, "n", "utf-8" );
$zip = convert_char( $_POST[ "postal-code" ] );
$zip = mb_convert_kana( $zip, "n", "utf-8" );
$pref = convert_char( $_POST[ "pref" ] );
$address = convert_char( $_POST[ "address" ] );
$address = mb_convert_kana( $address, "a", "utf-8" );
$email = convert_char( $_POST[ "email" ] );
$email = mb_convert_kana( $email, "a", "utf-8" );
$pass = convert_char( $_POST[ "password" ] );
$sex = convert_char( $_POST[ "sex" ] );
$comment = convert_char( $_POST[ "comment" ] );

if ( is_array( $_POST[ "interest" ] ) ) {
	$interest = implode( ",", $_POST[ "interest" ] );
}
//改行を\nに統一して<br>に置き換え
$comment = str_replace( "\r\n", "\n", $comment );
$comment = str_replace( "\r", "\n", $comment );
$comment_conv = str_replace( "\n", "<br>", $comment );
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>送信内容確認</title>
<link href="css/reset.css" rel="stylesheet" type="text/css">
<link href="css/contact.style.css" rel="stylesheet" type="text/css">
</head>

<body>
<main class="inner">
	<h2 class="ttl"><span>お問い合わせフォーム</span></h2>
	<form class="form h-adr" method="post" action="complete.php">
		<dl class="form_contact">
			<label id="name">
				<dt>お名前</dt>
				<dd><?php print $name; ?></dd>
			</label>
			<label id="kana">
				<dt>ふりがな</dt>
				<dd><?php print $kana; ?></dd>
			</label>
			<label id="tel">
				<dt>電話番号</dt>
				<dd><?php print $tel; ?></dd>
			</label>
			<label id="postal-code">
				<dt>郵便番号</dt>
				<dd><?php print $zip; ?></dd>
			</label>
			<label id="address" for="address-level2">
				<dt>住所</dt>
				<dd><?php print $pref; ?><?php print $address; ?></dd>
			</label>
			<label id="email">
				<dt>メールアドレス</dt>
				<dd><?php print $email; ?></dd>
			</label>
			<label id="password">
				<dt>パスワード</dt>
				<dd><?php print $pass; ?></dd>
			</label>
			<div id="sex">
				<dt>性別</dt>
				<dd><?php print $sex; ?></dd>
			</div>
			<div id="interest">
				<dt>興味のある対象</dt>
				<dd><?php print $interest; ?></dd>
			</div>
			<label id="comment">
				<dt>お問い合わせ内容</dt>
				<dd><?php print $comment_conv; ?></dd>
			</label>
			
		</dl>
		
		<div class="btn_wrap">
			<button type="button" class="btn btn_return" onclick="history.back();"><span>戻る</span></button>
			<button type="submit" class="btn btn_submit"><span>送信</span></button>
		</div>
		<input type="hidden" name="name" value="<?php echo $name; ?>">
		<input type="hidden" name="kana" value="<?php echo $kana; ?>">
		<input type="hidden" name="tel" value="<?php echo $tel; ?>">
		<input type="hidden" name="zip" value="<?php echo $zip; ?>">
		<input type="hidden" name="pref" value="<?php echo $pref; ?>">
		<input type="hidden" name="address" value="<?php echo $address; ?>">
		<input type="hidden" name="email" value="<?php echo $email; ?>">
		<input type="hidden" name="pass" value="<?php echo $pass; ?>">
		<input type="hidden" name="sex" value="<?php echo $sex; ?>">
		<input type="hidden" name="interest" value="<?php echo $interest; ?>">
		<input type="hidden" name="comment" value="<?php echo $comment; ?>">
	</form>
</main>
</body>
</html>


