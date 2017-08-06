<?php
if( !isset($paprika) ){
	echo '{$main_contents}'."\n";
	return;
}

ob_start();
$form = $paprika->conf()->exdb->get_form($paprika->conf()->exdb_form_options);
$form->automatic_form();
?>
<?php
// -----------------------------------
// 出力して終了する
echo $paprika->bind_template(
	array(
		'{$main_contents}'=>ob_get_clean()
	)
);
exit();
