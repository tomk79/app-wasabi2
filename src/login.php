<?php
if( !isset($paprika) ){
	echo '{$main_contents}'."\n";
	return;
}

ob_start();

$form = $paprika->conf()->exdb->get_form($paprika->conf()->exdb_form_options);
$is_login = $form->auth(
	'user', // テーブル名
	array( // 照合するデータ
		'user_account',
		'password',
	)
);
if( $is_login ){ ?>
<p>ログインしました。</p>
<p><a href="/">戻る</a></p>
<?php }

// -----------------------------------
// 出力して終了する
echo $paprika->bind_template(
	array(
		'{$main_contents}'=>ob_get_clean()
	)
);
exit();
