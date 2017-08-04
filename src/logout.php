<?php
$form = $paprika->conf()->exdb->get_form();
$form->logout('user');
?>
<?php ob_start(); ?>
<p>ログアウトしました。</p>

<?php
$tpl = $paprika->bind_template(
	array(
		'{$main_contents}'=>ob_get_clean()
	),
	'/logout_files/templates/index.html'
);

// -----------------------------------
// 出力して終了する
echo $tpl;
exit();
