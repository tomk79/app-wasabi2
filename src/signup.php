<?php
$form = $paprika->conf()->exdb->get_form();

ob_start();
$form->automatic_signup_form(
	'user', // テーブル名
	array( // 初期登録するカラム
		'user_account',
		'user_name',
		'email',
		'password',
	),
	array( // Options
		'href_backto'=>'/' // 戻り先のURL
	)
);
$src = ob_get_clean();

$tpl = $paprika->bind_template(
	array(
		'{$main_contents}'=>$src
	),
	'/signup_files/templates/index.html'
);

// -----------------------------------
// 出力して終了する
echo $tpl;
exit();
