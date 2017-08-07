<?php
if( !isset($paprika) ){
	echo '{$main_contents}'."\n";
	return;
}

ob_start();
if( !$paprika->conf()->exdb->user()->is_login('user') ){
	echo '<p>Please Login.</p>';
}else{
	$options = $paprika->conf()->exdb_form_options;
	$options['table'] = 'project';
	$form = $paprika->conf()->exdb->get_form($options);
	$form->automatic_form();
}
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
