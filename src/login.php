<?php ob_start(); ?>
<p>テンプレート中の文字列 <code>{$main_contents}</code> を、HTMLコードに置き換えます。</p>
<p>アプリケーションの動的な処理を実装することもできます。</p>

<?php
$tpl = $paprika->bind_template(
	array(
		'{$main_contents}'=>ob_get_clean()
	),
	'/login_files/templates/index.html'
);

// -----------------------------------
// 出力して終了する
echo $tpl;
exit();
