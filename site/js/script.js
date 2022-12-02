
//バリデーション
$(function(){
	$('.form').validate({
		errorPlacement: function(error, element) {//エラーの表示場所の指定
			if(element.is(':radio, :checkbox')) {//radioおよびcheckboxの場合
				error.appendTo(element.parent().parent());//親の親の末尾にエラーを追加
			} else {//そうでない場合
				error.insertAfter(element);//入力箇所の後ろにエラーを追加
			}
		},
		rules: {//独自ルールの設定
			email2: {//name属性で対象を指定
				equalTo: ".email"//classもしくはidで比較対象を指定
			},
			password: {
				minlength: 8,
				maxlength: 20
			}
		},
		messages: {
			name: {
				required: "お名前を入力してください。"
			},
			kana: {
				required: "ふりがなを入力してください。"
			}
		}
		
	});
});