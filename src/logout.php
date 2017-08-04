<?php
if( !isset($paprika) ){
	echo '{$main_contents}'."\n";
	return;
}

$form = $paprika->conf()->exdb->get_form();
$form->logout('user');
?>
<?php ob_start(); ?>
<p>ログアウトしました。</p>

<?php
// -----------------------------------
// 出力して終了する
echo $paprika->bind_template(
	array(
		'{$main_contents}'=>ob_get_clean()
	)
);
exit();
