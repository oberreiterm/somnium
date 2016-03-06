<?php

function NullEmpty($question){
    return (!isset($question) || trim($question)==='');
}

function callDefault(&$string, $value){
	$string = (NullEmpty($string)) ? $value : $string;
}

require_once get_template_directory().'/widgets/widgets_part_1.php';
require_once get_template_directory().'/widgets/widgets_part_2.php';
require_once get_template_directory().'/widgets/widgets_part_3.php';
require_once get_template_directory().'/widgets/widgets_part_4.php';
require_once get_template_directory().'/widgets/widgets_part_5.php';
require_once get_template_directory() .'/inc/mobile_detection.php';

function fieldProtoTextArea($name, $this, $that, $var){

	echo'<p>
	<h3 for="'.$this.'">'.esc_attr__( $name, 'somnium' ).'</h3>
	<textarea class="textarea_widget" rows="8" colls="50" id="'.$this.'" name="'.$that.'" type="text" value="">'.esc_attr( $var ).'</textarea>
	</p>';

}

function fieldProtoTextAreaDes($name, $this, $that, $var, $des=''){

	echo'<p>
	<h3 for="'.$this.'">'.esc_attr__( $name, 'somnium' ).'</h3>
	<p>'._n( $name, $des, 2, 'somnium' ).'</p>
	<textarea class="textarea_widget" rows="3" colls="50" id="'.$this.'" name="'.$that.'" type="text" value="">'.esc_attr( $var ).'</textarea>
	</p>';

}

function fieldProtoScrollRevealDes($name, $this, $that, $var, $des=''){

	echo'<p>
	<h3 for="'.$this.'">'.esc_attr__( $name, 'somnium' ).'</h3>
	<p>'._n( $name, $des, 2, 'somnium' ).'</p>
	<textarea class="textarea_widget" rows="3" colls="50" id="'.$this.'" name="'.$that.'" type="text" value="">'.esc_attr( $var ).'</textarea>
	</p>';

}

function fieldProtoScrollReveal($name, $this, $that, $var){

	echo'<p>
	<h3 for="'.$this.'">'.esc_attr__( $name, 'somnium' ).'</h3>
	<textarea class="textarea_widget" rows="8" colls="50" id="'.$this.'" name="'.$that.'" type="text" value="">'.esc_attr( $var ).'</textarea>
	</p>';

}

function fieldProtoDes($name, $this, $that, $var, $des=''){

	echo'<p>
	<h3 for="'.$this.'">'.esc_attr__( $name, 'somnium' ).'</h3>
	<p>'._n( $name, $des, 2, 'somnium' ).'</p>
	<input class="widefat" id="'.$this.'" name="'.$that.'" type="text" value="'.esc_attr( $var ).'" />
	</p>';

}

function fieldProto($name, $this, $that, $var){

	echo'<p>
	<h3 for="'.$this.'">'.esc_attr__( $name, 'somnium' ).'</h3>
	<input class="widefat" id="'.$this.'" name="'.$that.'" type="text" value="'.esc_attr( $var ).'" />
	</p>';

}

function fieldProtoNumber($name, $this, $that, $var, $step=1, $min=0, $max=99999999){

	echo'<p>
	<h3 for="'.$this.'">'.esc_attr__( $name, 'somnium' ).'</h3>
	<input class="input-number" id="'.$this.'" name="'.$that.'" type="number" step="'.$step.'" min="'.$min.'" max="'.$max.'" value="'.esc_attr( $var ).'" />
	</p>';

}

function fieldProtoNumberDes($name, $this, $that, $var, $des='', $step=1, $min=0, $max=99999999){

	echo'<p>
	<h3 for="'.$this.'">'.esc_attr__( $name, 'somnium' ).'</h3>
	<p>'._n( $name, $des, 2, 'somnium' ).'</p>
	<input class="input-number" id="'.$this.'" name="'.$that.'" type="number" step="'.$step.'" min="'.$min.'" max="'.$max.'" value="'.esc_attr( $var ).'" />
	</p>';

}

function fieldProtoSelectUnitsDes($name, $this, $that, $var, $this2, $that2, $var2, $des='', $step=1, $min=0){

	echo'
	<h3 for="'.$this.'">'.esc_attr__( $name, 'somnium' ).'</h3>
	<p>'._n( $name, $des, 2, 'somnium' ).'</p>
	<input class="input-number" id="'.$this.'" name="'.$that.'" type="number" step="'.$step.'" min="'.$min.'"  value="'.esc_attr( $var ).'" />
	<select class="units-select" id="'.$this2.'" name="'.$that2.'" type="text">
		<option value="px"';  if('px' == $var2){ echo' selected';}else{echo'';} echo'>px</option>
		<option value="pt"';  if('pt' == $var2){ echo' selected';}else{echo'';} echo'>pt</option>
		<option value="pc"';  if('pc' == $var2){ echo' selected';}else{echo'';} echo'>pc</option>
		<option value="in"';  if('in' == $var2){ echo' selected';}else{echo'';} echo'>in</option>
		<option value="mm"';  if('mm' == $var2){ echo' selected';}else{echo'';} echo'>mm</option>
		<option value="cm"';  if('cm' == $var2){ echo' selected';}else{echo'';} echo'>cm</option>
		<option value="%"';  if('%' == $var2){ echo' selected';}else{echo'';} echo'>%</option>
		<option value="ex"';  if('ex' == $var2){ echo' selected';}else{echo'';} echo'>ex</option>
		<option value="em"';  if('em' == $var2){ echo' selected';}else{echo'';} echo'>em</option>
		<option value="vw"';  if('vw' == $var2){ echo' selected';}else{echo'';} echo'>vw</option>
		<option value="vh"';  if('vh' == $var2){ echo' selected';}else{echo'';} echo'>vh</option>
		<option value="vmin"';  if('vmin' == $var2){ echo' selected';}else{echo'';} echo'>vmin</option>
		<option value="vmax"';  if('vmax' == $var2){ echo' selected';}else{echo'';} echo'>vmax</option>';
	echo'</select>';
}

function fieldProtoSelectUnits($name, $this, $that, $var, $this2, $that2, $var2, $step=1, $min=0){

	echo'
	<h3 for="'.$this.'">'.esc_attr__( $name, 'somnium' ).'</h3>
	<input class="input-number" id="'.$this.'" name="'.$that.'" type="number" step="'.$step.'" min="'.$min.'"  value="'.esc_attr( $var ).'" />
	<select class="units-select" id="'.$this2.'" name="'.$that2.'" type="text">
		<option value="px"';  if('px' == $var2){ echo' selected';}else{echo'';} echo'>px</option>
		<option value="pt"';  if('pt' == $var2){ echo' selected';}else{echo'';} echo'>pt</option>
		<option value="pc"';  if('pc' == $var2){ echo' selected';}else{echo'';} echo'>pc</option>
		<option value="in"';  if('in' == $var2){ echo' selected';}else{echo'';} echo'>in</option>
		<option value="mm"';  if('mm' == $var2){ echo' selected';}else{echo'';} echo'>mm</option>
		<option value="cm"';  if('cm' == $var2){ echo' selected';}else{echo'';} echo'>cm</option>
		<option value="%"';  if('%' == $var2){ echo' selected';}else{echo'';} echo'>%</option>
		<option value="ex"';  if('ex' == $var2){ echo' selected';}else{echo'';} echo'>ex</option>
		<option value="em"';  if('em' == $var2){ echo' selected';}else{echo'';} echo'>em</option>
		<option value="vw"';  if('vw' == $var2){ echo' selected';}else{echo'';} echo'>vw</option>
		<option value="vh"';  if('vh' == $var2){ echo' selected';}else{echo'';} echo'>vh</option>
		<option value="vmin"';  if('vmin' == $var2){ echo' selected';}else{echo'';} echo'>vmin</option>
		<option value="vmax"';  if('vmax' == $var2){ echo' selected';}else{echo'';} echo'>vmax</option>';
	echo'</select>';
}









function fieldProtoIconSelection($name, $this, $that, $var ,$array){
	echo'<p>
    <h3 for="'.$this.'">'.esc_attr__( $name, 'somnium' ).'</h3>
    <select id="'.$this.'" class="icon-select-'.$this.'" name="'.$that.'" type="text">';
	for($i=0;$i<sizeof($array);$i++){
		echo'<option class="icon-select-option" value="'.$array[$i].'"';  if($array[$i] == $var){ echo' selected';}else{echo'';} echo'>'.$array[$i].'</option>';
	}
	echo'</select>
	</p>';

}


	
function fieldProtoSelection($name, $this, $that, $var ,$array){
	echo'<p>
    <h3 for="'.$this.'">'.esc_attr__( $name, 'somnium' ).'</h3>
    <select id="'.$this.'" name="'.$that.'" type="text">';
	for($i=0;$i<sizeof($array);$i++){
		echo'<option value="'.$array[$i].'"';  if($array[$i] == $var){ echo' selected';}else{echo'';} echo'>'.$array[$i].'</option>';
	}
	echo'</select>
	</p>';

}



function fieldProtoSelectionDes($name, $this, $that, $var ,$array, $des=''){
	echo'<p>
    <h3 for="'.$this.'">'.esc_attr__( $name, 'somnium' ).'</h3>
	<p>'._n( $name, $des, 2, 'somnium' ).'</p>
    <select id="'.$this.'" name="'.$that.'" type="text">';
	for($i=0;$i<sizeof($array);$i++){
		echo'<option value="'.$array[$i].'"';  if($array[$i] == $var){ echo' selected';}else{echo'';} echo'>'.$array[$i].'</option>';
	}
	echo'</select>
	</p>';

}


function fieldProtoCheckbox($name, $this, $that, $var){
	echo'<p>
	<h3 for="'.$this.'">'.esc_attr__( $name, 'somnium' ).'</h3>
	<p>'.esc_attr__( $des, 'somnium' ).'</p>
	<input class="checkbox" type="checkbox"'; checked($var, 'on'); echo' id="'.$this.'" name="'.$that.'" /> 
	</p>';

}

function fieldProtoCheckboxDes($name, $this, $that, $var, $des=''){
	echo'<p>
	<h3 for="'.$this.'">'.esc_attr__( $name, 'somnium' ).'</h3>
	<p>'._n( $name, $des, 2, 'somnium' ).'</p>
	<input class="checkbox" type="checkbox"'; checked($var, 'on'); echo' id="'.$this.'" name="'.$that.'" /> 
	</p>';

}

function fieldProtoIconPicker($name, $this, $that, $var){
	echo'
	<script>
		jQuery(document).ready(function(){
			jQuery(".icon-picker").iconpicker();
		});
	</script>
	<p>
	<h3 for="'.$this.'">'.esc_attr__( $name, 'somnium' ).'</h3>
	<input class="icon-picker" id="'.$this.'" name="'.$that.'"  type="text" value="'.esc_attr( $var ).'" />
	</p>';
}

function fieldProtoIconPickerDes($name, $this, $that, $var, $des=''){
	echo'
	<script>
		jQuery(document).ready(function(){
			jQuery(".icon-picker").iconpicker();
		});
	</script>
	<p>
	<h3 for="'.$this.'">'.esc_attr__( $name, 'somnium' ).'</h3>
	<p>'._n( $name, $des, 2, 'somnium' ).'</p>
	<input class="icon-picker" id="'.$this.'" name="'.$that.'"  type="text" value="'.esc_attr( $var ).'" />
	</p>';
}

function fieldProtoColorPicker($name, $this, $that, $var){
	echo'
	<script>
		jQuery(document).ready(function(){
			jQuery(".cs-wp-color-picker").cs_wpColorPicker();
		});
	</script>
	<p>
	<h3 for="'.$this.'">'.esc_attr__( $name, 'somnium' ).'</h3>
	<div id="'.$this.'"><input class="cs-wp-color-picker" id="'.$this.'" name="'.$that.'" data-default-color="#fff" type="text" value="'.esc_attr( $var ).'" /></div>
	</p>';

}

function fieldProtoColorPickerDes($name, $this, $that, $var, $des=''){
	echo'
	<script>
		jQuery(document).ready(function(){
			jQuery(".cs-wp-color-picker").cs_wpColorPicker();
		});
	</script>
	<p>
	<h3 for="'.$this.'">'.esc_attr__( $name, 'somnium' ).'</h3>
	<p>'._n( $name, $des, 2, 'somnium' ).'</p>
	<div id="'.$this.'"><input class="cs-wp-color-picker" id="'.$this.'" name="'.$that.'" data-default-color="#fff" type="text" value="'.esc_attr( $var ).'" /></div>
	</p>';

}


function fieldProtoImageUpload($name, $this, $that, $var){
	echo'<p>
	<h3 for="'.$this.'">'.esc_attr__( $name, 'somnium' ).'</h3>
	<input class="widefat" id="'.$this.'" name="'.$that.'"  type="text" value="'.esc_attr( $var ).'"/>
	<input class="upload_image_button button-primary" type="button" value="'.__('Upload Image','somnium').'" />
	</p>';
}
function fieldProtoImageUploadDes($name, $this, $that, $var, $des=''){
	echo'<p>
	<h3 for="'.$this.'">'.esc_attr__( $name, 'somnium' ).'</h3>
	<p>'._n( $name, $des, 2, 'somnium' ).'</p>
	<input class="widefat" id="'.$this.'" name="'.$that.'"  type="text" value="'.esc_attr( $var ).'"/>
	<input class="upload_image_button button-primary" type="button" value="'.__('Upload Image','somnium').'" />
	</p>';
}


function fieldProtoCategoryDropdownDes($name, $this, $var, $order, $des=''){
	echo'<h3>'.__($name,'somnium').'</h3>
	<p>'._n( $name, $des, 2, 'somnium' ).'</p>';
		$args = array(
			'name'             => $this,
			'show_option_all' => __( 'All categories','somnium' ),
			'show_count'       => 1,
			'orderby'          => $order,
			'echo'             => 0,
			'selected'         => $var,
			'class'           => 'widefat',
			'multiple'		  => true
		);
		echo wp_dropdown_categories($args);
		echo '<br><br>';
} 

function fieldProtoCategoryDropdown($name, $this, $var, $order){
	echo'<h3>'.__($name,'somnium').'</h3>';
		$args = array(
			'name'             => $this,
			'show_option_all' => __( 'All categories','somnium' ),
			'show_count'       => 1,
			'orderby'          => $order,
			'echo'             => 0,
			'selected'         => $var,
			'class'           => 'widefat',
			'multiple'		  => true
		);
		echo wp_dropdown_categories($args);
		echo '<br><br>';
}


function upload_scriptss(){	
		wp_enqueue_style( 'font-picker1',   get_template_directory_uri(). '/fonts/GWP-picker/fontselect.css' );
		wp_enqueue_script( 'font-picker',  get_template_directory_uri(). '/fonts/GWP-picker/jquery.fontselect.min.js', array( 'jquery' ));
}
add_action('admin_enqueue_scripts', 'upload_scriptss');



function hook_pickers(){
	function upload_scripts(){	
			wp_enqueue_script('thickbox');
			wp_enqueue_style('thickbox');
			wp_enqueue_script('upload_media_widget', get_template_directory_uri(). '/js/upload-media.js', array('jquery', 'media-upload', 'thickbox'));
			wp_enqueue_script('media-upload');
			wp_enqueue_style( 'font-awesome',   get_template_directory_uri(). '/fonts/font-awesome.css' );
			wp_enqueue_style( 'font-awesome2',   get_template_directory_uri(). '/fonts/fontawesome-iconpicker.min.css' );
			wp_enqueue_script( 'icon-picker',  get_template_directory_uri(). '/fonts/fontawesome-iconpicker.min.js', array( 'jquery' ));
			wp_enqueue_style( 'font-picker1',   get_template_directory_uri(). '/fonts/GWP-picker/fontselect.css' );
			wp_enqueue_script( 'font-picker',  get_template_directory_uri(). '/fonts/GWP-picker/jquery.fontselect.min.js', array( 'jquery' ));
	}
	add_action('admin_enqueue_scripts', 'upload_scripts');
	add_action( 'admin_enqueue_scripts',  'enqueue_color_scripts' );
	add_action( 'admin_footer-widgets.php',  'print_color_scripts' , 9999 );
	function enqueue_color_scripts( $hook_suffix ) {
			if ( 'widgets.php' !== $hook_suffix ) {
				return;
			}
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'wp-color-picker' );
			wp_enqueue_script( 'underscore' );
	}

	function print_color_scripts() {
				 
					  echo"  <script>
								( function( $ ){
										function initColorPicker( widget ) {
												widget.find( '.color-picker' ).wpColorPicker( {
														change: _.throttle( function() { // For Customizer
																$(this).trigger( 'change' );
														}, 3000 )
												});
										}
		
										function onFormUpdate( event, widget ) {
												initColorPicker( widget );
										}
		
										$( document ).on( 'widget-added widget-updated', onFormUpdate );
		
										$( document ).ready( function() {
												$( '#widgets-right .widget:has(.color-picker)' ).each( function () {
														initColorPicker( $( this ) );
												} );
										} );
								}( jQuery ) );
						</script>";
					   
	}
}

// Copy the custom flags
if (!class_exists('once')){
    class once{
        function run($key){
            $case = get_option('once');
            if (isset($case[$key]) && $case[$key]){
                return false;
            }else{
                $case[$key] = true;
                update_option('once',$case);
                return true;
            }
        }
		function clear($key){
            $case = get_option('once');
            if (isset($case[$key])){
                unset($case[$key]);
            }
            update_option('once',$case);
        }
    }
}

function do_the_magic() {
	// Getting directories
	$src = get_template_directory().'/images/flags/';
	if (!file_exists(WP_CONTENT_DIR.'/polylang/')) {
		mkdir(WP_CONTENT_DIR.'/polylang/', 0755, true);
	}
	$dst = WP_CONTENT_DIR.'/polylang/';
	$files = glob(get_template_directory().'/images/flags/*.*');
	// Copying all files to the second folder
	foreach($files as $file){
		$file_to_go = str_replace($src,$dst,$file);
		copy($file, $file_to_go);
	}
}
	// Cheking if plugin is activated
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	if(is_plugin_active('polylang/polylang.php')){
		// This will run only once
		$run_once = new once;
		if ($run_once->run('do_the_magic')){
			do_the_magic(); 
		}
	}
	
function filePerm2() {
	chmod(get_template_directory().'/sass', 0700);
	chmod(get_template_directory().'/sass/_variables_FAILSAFE.scss', 0500);
}

$run = new once;
		if ($run->run('filePerm2')){
			filePerm2(); 
}
function sanitize_to_HTML( $input ) {
		return wp_kses_post( force_balance_tags( $input ) );
	}
	
function somnium_theme_menu() {
 
    add_theme_page(
        'Somnium',          
        'Somnium',            
        'administrator',           
        'somnium_theme_options',    
        'somnium_theme_display'    
    );
 
}
add_action('admin_menu', 'somnium_theme_menu');
 
 
function somnium_theme_display() {
	
	echo '<div class="wrap">';
	echo '<h2>'.__('Additional advanced settings for Somnium','somnium').'</h2>';

	// Check whether the button has been pressed AND also check the nonce
	if (isset($_POST['recompile']) && check_admin_referer('recompile_clicked')) {
		// the button has been pressed AND we've passed the security check
		recompile_action();
	}
	  
	if (isset($_POST['refreshSASS']) && check_admin_referer('refreshSASS_clicked')) {
		refreshSASS_action();
	}
	
	if (isset($_POST['minifyJS']) && check_admin_referer('minifyJS_clicked')) {
		minifyJS_action();
	}
	
	if (isset($_POST['recompileCompressed']) && check_admin_referer('recompileCompressed_clicked')) {
		recompileCompressed_action();
	}
	// If ajax was sent
	if ($_GET['ajax']) {
		// Get properties to variable
		$write = $_GET['variables'];
		// Remove slashes before every quote
		$write = stripslashes($write);
		// Write to file
		write_file(get_template_directory() ."/sass/_variables.scss", $write);
	}
	// Styling
	echo'<style>.myForm p.submit{margin-top: 0px;padding-top: 0px;}</style>';

	// Form
	echo '<form action="themes.php?page=somnium_theme_options" method="post" class="myForm">';
		wp_nonce_field('recompile_clicked');
		echo '<input type="hidden" value="true" name="recompile" />';
		echo'<h1>'; _e('CSS Recompilation','somnium'); echo'</h1>';
		echo'<h4>'; _e('WARNING: By using this, all modifications made to style.css will be lost.', 'somnium'); echo'</h4>';
		echo'<p>'; _e('This theme uses SASS to create single CSS stylesheet. In order to refresh all styles, recompile. Use this primarily in cases, when style.css was corrupted or when you want to render changes made to .scss files. By recompilation you will loose all changes that you have made to style.css.','somnium'); echo'</p>';
		// See below for function reference
		twoStageConfirm('Recompile', 'lelkk', 'Confirm recompilation', 'toHide2');
	echo '</form>';
	
	echo '<form action="themes.php?page=somnium_theme_options" method="post" class="myForm">';
		wp_nonce_field('recompileCompressed_clicked');
		echo '<input type="hidden" value="true" name="recompileCompressed" />';
		echo'<p>'; _e('For more info on compressed version see this website: ','somnium'); echo'<a href="http://sass-lang.com/documentation/file.SASS_REFERENCE.html#_16">http://sass-lang.com/documentation/file.SASS_REFERENCE.html#_16</a></p>';
		twoStageConfirm('Compressed recompilation', 'comp', 'Confrim compressed recompilation', 'comCONF');
	echo'</form>';
	
	echo '<form action="themes.php?page=somnium_theme_options" method="post" class="myForm">';
		wp_nonce_field('minifyJS_clicked');
		echo '<input type="hidden" value="true" name="minifyJS" />';
		echo'<h1>'; _e('JavaScript Minification','somnium'); echo'</h1>';
		echo'<h4>'; _e('Every .js file in this theme is from default minified. If you have made changes to non-minified versions, use button below to reminify.', 'somnium'); echo'</h4>';
		echo'<p>'; _e('This will minify script.js to script.min.js as it is file with all custom scripts. Minification of libs.js (libraries, APIs) is not supported because changing their source code is strongly discouraged. If you know what you are doing, please, use the function tied to button below as a template.','somnium'); echo'</p>';
		twoStageConfirm('Minify JavaScript', 'mini', 'Confirm minification', 'miniCONF');
	echo'</form>';
  
 
	// Loads file to variable
	$content =  read_file(get_template_directory() ."/sass/_variables.scss");
	echo'<h1>'; _e('Restyle your theme','somnium'); echo'</h1>';
	echo'<h4>'; _e('NOTE n.1: In order to see the changes, you have to use "Recompile" button above.', 'somnium'); echo'</h4>';
	echo'<h4>'; _e('NOTE n.2: Some of these settings may be overridden by settings in Theme Customizer.', 'somnium'); echo'</h4>';
	echo'<p>'; _e('This editor enables you to change some site-wide CSS styling by editing SASS file. ','somnium'); echo'</p>';
	// Text editor loaded with content from the file
	$settings = array('media_buttons' => false, 'tinymce' => false);
	wp_editor( $content, 'editVar', $settings);
	echo'<br><button class="button-primary" id="saveEditor">'.__('Save changes','somnium').'</button>';
	// Javascript, jQuery, AJAX processing button click, text extraction from editor, sending to the server and reloading the page
	echo"<script>
		jQuery(window).load(function(){
			jQuery('#saveEditor').click(function(){
				var content;
				if(!(typeof tinyMCE === 'undefined')){var editor = tinyMCE.get('editVar');}
				if (editor) {
					content = editor.getContent(); //editor is visual
				} else {	
					content = jQuery('#editVar').val(); //just a text editor
				}
				jQuery.ajax({
					method: 'get',
					url: 'themes.php?page=somnium_theme_options',
					data: {
						'variables': content,
						'ajax': true
					},
					success: function(){location.reload();}
				});
			});
	});
	</script>";

	
	
	echo '<form action="themes.php?page=somnium_theme_options" method="post" class="myForm">';
		wp_nonce_field('refreshSASS_clicked');
		echo '<input type="hidden" value="true" name="refreshSASS" />';
		echo '<br><h1>'.__('Revert file to default state','somnium').'</h1>';
		echo'<p>'; _e('Use this in cases when something went wrong or simply when you want to go back to default values of variables. ','somnium'); echo'</p><br>';
		twoStageConfirm('Reset', 'lelk', 'Confirm reset', 'toHide');
	echo'</form>';
	echo '</div>';
}


// Two stage conformation button
// twoStageConfirm('Text to display on the first button', 'ID of the first', 'Text to display on the second button',  'ID of the second'){
function twoStageConfirm($clickedName, $clicked, $toHideName, $toHide){
	// Styles
	echo '<style>#'.$toHide.'{display:none;}</style>';
	// Buttons with i18n
	echo'<div class="button-primary" id="'.$clicked.'">'; _e($clickedName,'somnium'); echo'</div>';
	submit_button(__($toHideName,'somnium'),'delete',$toHide);
	// Javasript with jQuery to hide/show buttons
	echo"<script>
		jQuery('#".$clicked."').click(function(){
			jQuery('#".$toHide."').css({'display':'block'});
			jQuery('#".$clicked."').css({'display':'none'});
		});
	</script>";
}

// Minify JavaScript
function minifyJS_action(){
	// Load library
	include_once(get_template_directory() . '/inc/JSShrink.php' );
	// Get the file
	$js2 = read_file(get_template_directory() . '/js/script.js');
	// Minify
	$minifiedCode2 = \JShrink\Minifier::minify($js2);
	// Output it 
	write_file( get_template_directory() . '/js/script.min.js', $minifiedCode2);
	// Message to admin panel
	echo '<div id="message" class="updated fade"><p>'.'Minification successful' . '</p></div>';
}



function connect_fs($url, $method, $context, $fields = null){
	global $wp_filesystem;
	if(false === ($credentials = request_filesystem_credentials($url, $method, false, $context, $fields))) {
		return false;
	}
	//check if credentials are correct or not.
	if(!WP_Filesystem($credentials)){
		request_filesystem_credentials($url, $method, true, $context);
		return false;
	}
	return true;
}

function write_file($file,$text){
	global $wp_filesystem;
	$url = wp_nonce_url("themes.php?page=somnium_theme_options", "filesystem-nonce");
	$form_fields = array("file-data");
	if(connect_fs($url, "", get_template_directory(), $form_fields)){
		$wp_filesystem->put_contents($file, $text, FS_CHMOD_FILE);
		return $text;
	}else{
		return new WP_Error("filesystem_error", "Cannot initialize filesystem");
	}
}
function read_file($file){
	global $wp_filesystem;
	$url = wp_nonce_url("themes.php?page=somnium_theme_options", "filesystem-nonce");
	if(connect_fs($url, "", get_template_directory())){
		
		if($wp_filesystem->exists($file)){
			$text = $wp_filesystem->get_contents($file);
			if(!$text){
				return "";
			}else{
				return $text;
			}
		}else{
			return new WP_Error("filesystem_error", "File doesn't exist");      
		} 
	}else{
		return new WP_Error("filesystem_error", "Cannot initialize filesystem");
	}
}



// Reset SASS file
function refreshSASS_action(){
	// Getting files
	$failSafe = get_template_directory() ."/sass/_variables_FAILSAFE.scss";
	$toOverwrite = get_template_directory() ."/sass/_variables.scss";
	// Copying from first to second file (overwriting)
	$buffer = read_file($failSafe);
	write_file($toOverwrite,$buffer);
	//copy ( $failSafe , $toOverwrite);
	// Fail/Success message
	if (!copy($failSafe,$toOverwrite)) {
		echo '<div id="message" class="error"><p>'.'Refresh of _variables.scss failed.</p></div>';
	}else{
		echo '<div id="message" class="updated fade"><p>'.'Reset successful' . '</p></div>';
	}
}

// Recompile
function recompile_action(){
	// Loads the library
	require_once get_template_directory() . "/inc/scss.inc.php";
	$scss = new scssc();
	// Setting default @import paths
	$scss->setImportPaths(get_template_directory()."/sass");
	// Loading the file to the string
	$scssIn =  read_file(get_template_directory() ."/sass/style.scss"); 
	// Compilation
	$cssOut = $scss->compile($scssIn);
	// Outputs to style.css
	write_file(get_template_directory() ."/style.css", $cssOut);
	// Message to admin panel
	echo '<div id="message" class="updated fade"><p>'.'Recompilation successful' . '</p></div>';
}

// Recompile with compression
function recompileCompressed_action(){
	require_once __DIR__ . "/inc/scss.inc.php";
	$scss = new scssc();
	$scss->setImportPaths(get_template_directory()."/sass");
	// Setting formatter to compression
	$scss->setFormatter('scss_formatter_compressed');
	$scssIn =  read_file(get_template_directory() ."/sass/style.scss");
	$cssOut = $scss->compile($scssIn);
	write_file(get_template_directory() ."/style.css", $cssOut);
	echo '<div id="message" class="updated fade"><p>'.'Compressed recompilation successful' . '</p></div>';
	
}



	function comment_field_to_bottom( $fields ) {
		$comment_field = $fields['comment'];
		unset( $fields['comment'] );
		$fields['comment'] = $comment_field;
		return $fields;
	}
	add_filter( 'comment_form_fields', 'comment_field_to_bottom' );

	function remove_comment_url($arg) {
		$arg['url'] = '';
		return $arg;
	}
	add_filter('comment_form_default_fields', 'remove_comment_url');
	
function custom_post_editor() {
    add_meta_box( 
        'my-meta-box',
        __( 'Post Editor' , 'somnium'),
        'post_editor_render',
        'post',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'custom_post_editor' );




function post_editor_render($post){
	wp_nonce_field(basename(__FILE__), 'custom-nonce');
	$meta_stored_data = get_post_meta($post -> ID);
	
	?>

	<div>
		<div class="meta-row">
			<div class="meta-th">
				<label for="bck_image" class="row-title"><?php _e('Background Image','somnium');?></label>
			</div>
			<div class="meta-td">
				<input type="text" name="bck_image" id="bck_image" value="<?php if( !empty($meta_stored_data['bck_image'])) echo esc_attr($meta_stored_data['bck_image'][0]);?>"/>
			</div>
		</div>
		
		<div class="meta-row">
			<div class="meta-th">
				<label for="img_credit" class="row-title"><?php _e('Background Image Credit Link','somnium');?></label>
			</div>
			<div class="meta-td">
				<input type="text" name="img_credit" id="img_credit" value="<?php if( !empty($meta_stored_data['img_credit'])) echo esc_attr($meta_stored_data['img_credit'][0]);?>"/>
			</div>
		</div>
		  <div class="meta-row">
	        <div class="meta-th">
	          <label for="author_sel" class="row-title"><?php _e( 'Display Author Box', 'somnium' )?></label>
	        </div>
	        <div class="meta-td">
	          <select name="author_sel" id="author_sel">
				<?php $yes = __( 'Yes', 'somnium' );$no = __( 'No', 'somnium' ); $dfl=__( 'Default', 'somnium' );
	             echo'<option value="select-default"'; if( $meta_stored_data['author_sel'][0]=='select-default'){ echo 'selected="selected"';} echo'>'.$dfl.'</option>
				 <option value="select-yes"'; if( $meta_stored_data['author_sel'][0]=='select-yes'){ echo 'selected="selected"';} echo'>'.$yes.'</option>
	              <option value="select-no"';  if( $meta_stored_data['author_sel'][0]=='select-no'){ echo 'selected="selected"';} echo'>'.$no.'</option>';?>
	          </select>
	    </div>
		</div>
		<div class="meta-row">
	        <div class="meta-th">
	          <label for="content_type" class="row-title"><?php _e( 'Choose the the style of content', 'somnium' )?></label>
	        </div>
	        <div class="meta-td">
	          <select name="content_type" id="content_type">
				<?php $mdr = __( 'Modern', 'somnium' ); $cls = __( 'Standard', 'somnium' );$dfl=__( 'Default', 'somnium' );
				
	             echo' <option value="select-default"'; if( $meta_stored_data['content_type'][0]=='select-default'){ echo 'selected="selected"';} echo'>'.$dfl.'</option>
				 <option value="select-modern"';  if( $meta_stored_data['content_type'][0]=='select-modern'){ echo 'selected="selected"';} echo'>'.$mdr.'</option>
				  <option value="select-classic"';  if( $meta_stored_data['content_type'][0]=='select-classic'){ echo 'selected="selected"';} echo'>'.$cls.'</option>';?>
	          </select>
	    </div>
		</div>
		<div class="meta-row">
	        <div class="meta-th">
	          <label for="content_width" class="row-title"><?php _e( 'Choose the the width of content', 'somnium' )?></label>
	        </div>
	        <div class="meta-td">
	          <select name="content_width" id="content_width">
				<?php $fll = __( 'Force Full Width', 'somnium' );  $sdf = __( 'Default', 'somnium' );
				$sdl = __( 'Force Left Sidebar', 'somnium' ); $sdr = __( 'Force Right Sidebar', 'somnium' );$dfl=__( 'Default', 'somnium' );
				
	             echo'
				 <option value="select-sidebar"'; if( $meta_stored_data['content_width'][0]=='select-sidebar'){ echo 'selected="selected"';} echo'>'.$sdf.'</option>
	              <option value="select-full-width"';  if( $meta_stored_data['content_width'][0]=='select-full-width'){ echo 'selected="selected"';} echo'>'.$fll.'</option>
				   <option value="select-sidebar-r"'; if( $meta_stored_data['content_width'][0]=='select-sidebar-r'){ echo 'selected="selected"';} echo'>'.$sdr.'</option>
				    <option value="select-sidebar-l"'; if( $meta_stored_data['content_width'][0]=='select-sidebar-l'){ echo 'selected="selected"';} echo'>'.$sdl.'</option>';?>
	          </select>
	    </div>
		</div>
		<div class="meta-row">
	        <div class="meta-th">
	          <label for="date_show" class="row-title"><?php _e( 'Display date of publication', 'somnium' )?></label>
	        </div>
	        <div class="meta-td">
	           <select name="date_show" id="date_show">
				<?php $yes = __( 'Yes', 'somnium' );$no = __( 'No', 'somnium' );$dfl=__( 'Default', 'somnium' );
	             echo'<option value="select-default"'; if( $meta_stored_data['date_show'][0]=='select-default'){ echo 'selected="selected"';} echo'>'.$dfl.'</option>
				 <option value="select-yes"'; if( $meta_stored_data['date_show'][0]=='select-yes'){ echo 'selected="selected"';} echo'>'.$yes.'</option>
	              <option value="select-no"';  if( $meta_stored_data['date_show'][0]=='select-no'){ echo 'selected="selected"';} echo'>'.$no.'</option>';?>
	          </select>
	    </div> 
		</div>
		<div class="meta-row">
	        <div class="meta-th">
	          <label for="meta_info" class="row-title"><?php _e( 'Display meta info', 'somnium' )?></label>
	        </div>
	        <div class="meta-td">
	           <select name="meta_info" id="meta_info">
				<?php $yes = __( 'Yes', 'somnium' );$no = __( 'No', 'somnium' );$dfl=__( 'Default', 'somnium' );
	             echo'<option value="select-default"'; if( $meta_stored_data['meta_info'][0]=='select-default'){ echo 'selected="selected"';} echo'>'.$dfl.'</option>
				 <option value="select-yes"'; if( $meta_stored_data['meta_info'][0]=='select-yes'){ echo 'selected="selected"';} echo'>'.$yes.'</option>
	              <option value="select-no"';  if( $meta_stored_data['meta_info'][0]=='select-no'){ echo 'selected="selected"';} echo'>'.$no.'</option>';?>
	          </select>
	    </div> 
		</div>
		<div class="meta-row">
	        <div class="meta-th">
	          <label for="posts_unav" class="row-title"><?php _e( 'Display posts navigation', 'somnium' )?></label>
	        </div>
	        <div class="meta-td">
	           <select name="posts_unav" id="posts_unav">
				<?php $yes = __( 'Yes', 'somnium' );$no = __( 'No', 'somnium' );$dfl=__( 'Default', 'somnium' );
	             echo'<option value="select-default"'; if( $meta_stored_data['posts_unav'][0]=='select-default'){ echo 'selected="selected"';} echo'>'.$dfl.'</option>
				 <option value="select-yes"'; if( $meta_stored_data['posts_unav'][0]=='select-yes'){ echo 'selected="selected"';} echo'>'.$yes.'</option>
	              <option value="select-no"';  if( $meta_stored_data['posts_unav'][0]=='select-no'){ echo 'selected="selected"';} echo'>'.$no.'</option>';?>
	          </select>
	    </div> 
		</div>
		
		<div class="meta-row">
	        <div class="meta-th">
	          <label for="p_style" class="row-title"><?php _e( 'Choose between styles', 'somnium' )?></label>
	        </div>
	        <div class="meta-td">
	           <select name="p_style" id="p_style">
				<?php $yes = __( 'Page-like', 'somnium' );$no = __( 'Post-like', 'somnium' );$dfl=__( 'Default', 'somnium' );
	             echo'<option value="select-default"'; if( $meta_stored_data['p_style'][0]=='select-default'){ echo 'selected="selected"';} echo'>'.$dfl.'</option>
				 <option value="select-post"';  if( $meta_stored_data['p_style'][0]=='select-post'){ echo 'selected="selected"';} echo'>'.$no.'</option>
				 <option value="select-page"'; if( $meta_stored_data['p_style'][0]=='select-page'){ echo 'selected="selected"';} echo'>'.$yes.'</option>';?>
	          </select>
	    </div> 
		</div>
		<div class="meta-row">
	        <div class="meta-th">
	          <label for="overlay" class="row-title"><?php _e( 'Display Contrasting Overlay over Background Image (only for modern style)', 'somnium' )?></label>
	        </div>
	        <div class="meta-td">
	          <select name="overlay" id="overlay">
				<?php $yes = __( 'Yes', 'somnium' );$no = __( 'No', 'somnium' );$dfl=__( 'Default', 'somnium' );
	             echo'<option value="select-default"'; if( $meta_stored_data['overlay'][0]=='select-default'){ echo 'selected="selected"';} echo'>'.$dfl.'</option>
				 <option value="select-yes"'; if( $meta_stored_data['overlay'][0]=='select-yes'){ echo 'selected="selected"';} echo'>'.$yes.'</option>
	              <option value="select-no"';  if( $meta_stored_data['overlay'][0]=='select-no'){ echo 'selected="selected"';} echo'>'.$no.'</option>';?>
	          </select>
	    </div>
		</div>
		<div class="meta-row">
	        <div class="meta-th">
	          <label for="initial" class="row-title"><?php _e( 'Display Initial', 'somnium' )?></label>
	        </div>
	        <div class="meta-td">
	          <select name="initial" id="initial">
				<?php $yes = __( 'Yes', 'somnium' );$no = __( 'No', 'somnium' );$dfl=__( 'Default', 'somnium' );
	             echo'<option value="select-default"'; if( $meta_stored_data['initial'][0]=='select-default'){ echo 'selected="selected"';} echo'>'.$dfl.'</option>
				 <option value="select-yes"'; if( $meta_stored_data['initial'][0]=='select-yes'){ echo 'selected="selected"';} echo'>'.$yes.'</option>
	              <option value="select-no"';  if( $meta_stored_data['initial'][0]=='select-no'){ echo 'selected="selected"';} echo'>'.$no.'</option>';?>
	          </select>
	    </div>
		</div>
		<?php
		/*<div class="meta">
			<div class="meta-th">
				<h1> _e('Content','somnium');?></h1>
			</div>
		</div>
		<div class="meta-editor"></div>
		<?php
		$content = get_post_meta( $post->ID, 'img_post_content', true );
		$editor = 'img_post_content';
		$settings = array(
			'textarea_rows' => 30,
			'media_buttons' => true,
		);
		wp_editor( $content, $editor, $settings);
	
		</div>*/
	  ?>
	
	<?php
}
	
function meta_save_data($post_id){
	$is_autosave = wp_is_post_autosave($post_id);
	$is_revision = wp_is_post_revision($post_id);
	$is_valid_nonce = (isset($_POST['custom-nonce'])&& wp_verify_nonce($_POST['custom-nonce'], basename(__FILE__))) ? 'true' : 'false';
	if($is_autosave || $is_revision || !$is_valid_nonce){
		return;
	}
	if(isset($_POST['bck_image'])){
		update_post_meta($post_id, 'bck_image', sanitize_text_field($_POST['bck_image']));
	}
	if(isset($_POST['img_post_content'])){
		update_post_meta($post_id, 'img_post_content', sanitize_to_HTML($_POST['img_post_content']));
	}
	if(isset($_POST['img_credit'])){
		update_post_meta($post_id, 'img_credit', sanitize_text_field($_POST['img_credit']));
	}
	
	if(isset($_POST['author_sel'])){
		update_post_meta($post_id, 'author_sel', sanitize_text_field($_POST['author_sel']));
	}
	if(isset($_POST['content_width'])){
		update_post_meta($post_id, 'content_width', sanitize_text_field($_POST['content_width']));
	}
	if(isset($_POST['content_type'])){
		update_post_meta($post_id, 'content_type', sanitize_text_field($_POST['content_type']));
	}
	if(isset($_POST['date_show'])){
		update_post_meta($post_id, 'date_show', sanitize_text_field($_POST['date_show']));
	}
	if(isset($_POST['posts_unav'])){
		update_post_meta($post_id, 'posts_unav', sanitize_text_field($_POST['posts_unav']));
	}
	if(isset($_POST['meta_info'])){
		update_post_meta($post_id, 'meta_info', sanitize_text_field($_POST['meta_info']));
	}
	if(isset($_POST['overlay'])){
		update_post_meta($post_id, 'overlay', sanitize_text_field($_POST['overlay']));
	}
	if(isset($_POST['p_style'])){
		update_post_meta($post_id, 'p_style', sanitize_text_field($_POST['p_style']));
	}
	if(isset($_POST['initial'])){
		update_post_meta($post_id, 'initial', sanitize_text_field($_POST['initial']));
	} 
	
}
add_action('save_post','meta_save_data');



function custom_page_editor() {
    add_meta_box( 
        'page-editor',
        __( 'Page Editor' , 'somnium'),
        'page_editor_render',
        'page',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'custom_page_editor' );



function page_editor_render($page){
	wp_nonce_field(basename(__FILE__), 'custom-nonce');
	$meta_stored_data = get_post_meta($page -> ID);
	
	?>

	<div>
		<div class="meta-row">
			<div class="meta-th">
				<label for="bck_image" class="row-title"><?php _e('Background Image','somnium');?></label>
			</div>
			<div class="meta-td">
				<input type="text" name="bck_image" id="bck_image" value="<?php if( !empty($meta_stored_data['bck_image'])) echo esc_attr($meta_stored_data['bck_image'][0]);?>"/>
			</div>
		</div>
		
		<div class="meta-row">
			<div class="meta-th">
				<label for="img_credit" class="row-title"><?php _e('Background Image Credit Link','somnium');?></label>
			</div>
			<div class="meta-td">
				<input type="text" name="img_credit" id="img_credit" value="<?php if( !empty($meta_stored_data['img_credit'])) echo esc_attr($meta_stored_data['img_credit'][0]);?>"/>
			</div>
		</div>
		
		  <div class="meta-row">
	        <div class="meta-th">
	          <label for="author_sel" class="row-title"><?php _e( 'Display Author Box', 'somnium' )?></label>
	        </div>
	        <div class="meta-td">
	          <select name="author_sel" id="author_sel">
				<?php $yes = __( 'Yes', 'somnium' );$no = __( 'No', 'somnium' );$dfl=__( 'Default', 'somnium' );
	             echo'<option value="select-default"'; if( $meta_stored_data['author_sel'][0]=='select-default'){ echo 'selected="selected"';} echo'>'.$dfl.'</option>
				 <option value="select-yes"'; if( $meta_stored_data['author_sel'][0]=='select-yes'){ echo 'selected="selected"';} echo'>'.$yes.'</option>
	              <option value="select-no"';  if( $meta_stored_data['author_sel'][0]=='select-no'){ echo 'selected="selected"';} echo'>'.$no.'</option>';?>
	          </select>
			</div>
		</div>
		<div class="meta-row">
	        <div class="meta-th">
	          <label for="content_width" class="row-title"><?php _e( 'Choose the the width of content', 'somnium' )?></label>
	        </div>
	        <div class="meta-td">
	          <select name="content_width" id="content_width">
				<?php $fll2 = __( 'Force Full Width', 'somnium' );  $sdf2 = __( 'Default', 'somnium' );
				$sdl2 = __( 'Force Left Sidebar', 'somnium' ); $sdr2 = __( 'Force Right Sidebar', 'somnium' );
				
	             echo'
				 <option value="select-sidebar"'; if( $meta_stored_data['content_width'][0]=='select-sidebar'){ echo 'selected="selected"';} echo'>'.$sdf2.'</option>
	              <option value="select-full-width"';  if( $meta_stored_data['content_width'][0]=='select-full-width'){ echo 'selected="selected"';} echo'>'.$fll2.'</option>
				   <option value="select-sidebar-r"'; if( $meta_stored_data['content_width'][0]=='select-sidebar-r'){ echo 'selected="selected"';} echo'>'.$sdr2.'</option>
				    <option value="select-sidebar-l"'; if( $meta_stored_data['content_width'][0]=='select-sidebar-l'){ echo 'selected="selected"';} echo'>'.$sdl2.'</option>';?>
	          </select>
	    </div>
		</div>
		<div class="meta-row">
	        <div class="meta-th">
	          <label for="date_show" class="row-title"><?php _e( 'Display date of publication', 'somnium' )?></label>
	        </div>
	        <div class="meta-td">
	           <select name="date_show" id="date_show">
				<?php $yes = __( 'Yes', 'somnium' );$no = __( 'No', 'somnium' );$dfl=__( 'Default', 'somnium' );
	             echo'<option value="select-default"'; if( $meta_stored_data['date_show'][0]=='select-default'){ echo 'selected="selected"';} echo'>'.$dfl.'</option>
	              <option value="select-no"';  if( $meta_stored_data['date_show'][0]=='select-no'){ echo 'selected="selected"';} echo'>'.$no.'</option>
				  <option value="select-yes"'; if( $meta_stored_data['date_show'][0]=='select-yes'){ echo 'selected="selected"';} echo'>'.$yes.'</option>';?>
	          </select>
	    </div> 
		</div>
		<div class="meta-row">
	        <div class="meta-th">
	          <label for="meta_info" class="row-title"><?php _e( 'Display meta info', 'somnium' )?></label>
	        </div>
	        <div class="meta-td">
	           <select name="meta_info" id="meta_info">
				<?php $yes = __( 'Yes', 'somnium' );$no = __( 'No', 'somnium' );$dfl=__( 'Default', 'somnium' );
	             echo'<option value="select-default"'; if( $meta_stored_data['meta_info'][0]=='select-default'){ echo 'selected="selected"';} echo'>'.$dfl.'</option>
				 <option value="select-no"';  if( $meta_stored_data['meta_info'][0]=='select-no'){ echo 'selected="selected"';} echo'>'.$no.'</option>
				  <option value="select-yes"'; if( $meta_stored_data['meta_info'][0]=='select-yes'){ echo 'selected="selected"';} echo'>'.$yes.'</option>';?>
	          </select>
	    </div> 
		</div>
		<div class="meta-row">
	        <div class="meta-th">
	          <label for="posts_unav" class="row-title"><?php _e( 'Display posts navigation', 'somnium' )?></label>
	        </div>
	        <div class="meta-td">
	           <select name="posts_unav" id="posts_unav">
				<?php $yes = __( 'Yes', 'somnium' );$no = __( 'No', 'somnium' );$dfl=__( 'Default', 'somnium' );
	             echo'<option value="select-default"'; if( $meta_stored_data['posts_unav'][0]=='select-default'){ echo 'selected="selected"';} echo'>'.$dfl.'</option>
				 <option value="select-no"';  if( $meta_stored_data['posts_unav'][0]=='select-no'){ echo 'selected="selected"';} echo'>'.$no.'</option>
				  <option value="select-yes"'; if( $meta_stored_data['posts_unav'][0]=='select-yes'){ echo 'selected="selected"';} echo'>'.$yes.'</option>';?>
	          </select>
	    </div> 
		</div>
		
		<div class="meta-row">
	        <div class="meta-th">
	          <label for="p_style" class="row-title"><?php _e( 'Choose between styles', 'somnium' )?></label>
	        </div>
	        <div class="meta-td">
	           <select name="p_style" id="p_style">
				<?php $yes = __( 'Page-like', 'somnium' );$no = __( 'Post-like', 'somnium' );$dfl=__( 'Default', 'somnium' );
	             echo'<option value="select-default"'; if( $meta_stored_data['p_style'][0]=='select-default'){ echo 'selected="selected"';} echo'>'.$dfl.'</option>
				 <option value="select-page"'; if( $meta_stored_data['p_style'][0]=='select-page'){ echo 'selected="selected"';} echo'>'.$yes.'</option>
	              <option value="select-post"';  if( $meta_stored_data['p_style'][0]=='select-post'){ echo 'selected="selected"';} echo'>'.$no.'</option>';?>
	          </select>
	    </div> 
		</div>
		<div class="meta-row">
	        <div class="meta-th">
	          <label for="overlay" class="row-title"><?php _e( 'Display Contrasting Overlay over Background Image', 'somnium' )?></label>
	        </div>
	        <div class="meta-td">
	          <select name="overlay" id="overlay">
				<?php $yes = __( 'Yes', 'somnium' );$no = __( 'No', 'somnium' );$dfl=__( 'Default', 'somnium' );
	             echo'<option value="select-default"'; if( $meta_stored_data['overlay'][0]=='select-default'){ echo 'selected="selected"';} echo'>'.$dfl.'</option>
				 <option value="select-yes"'; if( $meta_stored_data['overlay'][0]=='select-yes'){ echo 'selected="selected"';} echo'>'.$yes.'</option>
	              <option value="select-no"';  if( $meta_stored_data['overlay'][0]=='select-no'){ echo 'selected="selected"';} echo'>'.$no.'</option>';?>
	          </select>
	    </div>
		</div>
		<div class="meta-row">
	        <div class="meta-th">
	          <label for="initial" class="row-title"><?php _e( 'Display Initial', 'somnium' )?></label>
	        </div>
	        <div class="meta-td">
	          <select name="initial" id="initial">
				<?php $yes = __( 'Yes', 'somnium' );$no = __( 'No', 'somnium' );$dfl=__( 'Default', 'somnium' );
	             echo'<option value="select-default"'; if( $meta_stored_data['initial'][0]=='select-default'){ echo 'selected="selected"';} echo'>'.$dfl.'</option>
				 <option value="select-yes"'; if( $meta_stored_data['initial'][0]=='select-yes'){ echo 'selected="selected"';} echo'>'.$yes.'</option>
	              <option value="select-no"';  if( $meta_stored_data['initial'][0]=='select-no'){ echo 'selected="selected"';} echo'>'.$no.'</option>';?>
	          </select>
	    </div>
		</div>
	  
	<?php
}
	
function meta_page_save_data($page_id){
	$is_autosave = wp_is_post_autosave($page_id);
	$is_revision = wp_is_post_revision($page_id);
	$is_valid_nonce = (isset($_POST['custom-nonce'])&& wp_verify_nonce($_POST['custom-nonce'], basename(__FILE__))) ? 'true' : 'false';
	if($is_autosave || $is_revision || !$is_valid_nonce){
		return;
	}
	if(isset($_POST['bck_image'])){
		update_post_meta($page_id, 'bck_image', sanitize_text_field($_POST['bck_image']));
	}
	if(isset($_POST['img_post_content'])){
		update_post_meta($page_id, 'img_post_content', sanitize_to_HTML($_POST['img_post_content']));
	}
	if(isset($_POST['img_credit'])){
		update_post_meta($page_id, 'img_credit', sanitize_text_field($_POST['img_credit']));
	}
	
	if(isset($_POST['author_sel'])){
		update_post_meta($page_id, 'author_sel', sanitize_text_field($_POST['author_sel']));
	}
	if(isset($_POST['content_width'])){
		update_post_meta($page_id, 'content_width', sanitize_text_field($_POST['content_width']));
	}
	if(isset($_POST['date_show'])){
		update_post_meta($page_id, 'date_show', sanitize_text_field($_POST['date_show']));
	}
	if(isset($_POST['posts_unav'])){
		update_post_meta($page_id, 'posts_unav', sanitize_text_field($_POST['posts_unav']));
	}
	if(isset($_POST['meta_info'])){
		update_post_meta($page_id, 'meta_info', sanitize_text_field($_POST['meta_info']));
	}
	if(isset($_POST['p_style'])){
		update_post_meta($page_id, 'p_style', sanitize_text_field($_POST['p_style']));
	}
	if(isset($_POST['overlay'])){
		update_post_meta($page_id, 'overlay', sanitize_text_field($_POST['overlay']));
	}
	if(isset($_POST['initial'])){
		update_post_meta($page_id, 'initial', sanitize_text_field($_POST['initial'])); 
	}
}
add_action('save_post','meta_page_save_data');

add_action( 'show_user_profile', 'extra_author_info' );
add_action( 'edit_user_profile', 'extra_author_info' );

function extra_author_info( $user ) {

	echo'<h3>'.__('Extra profile information','somnium').'</h3>
	<h4>'.__('WARNING: This will be publicly shown in author box under posts.','somnium').'</h4>
	<table class="form-table">

		<tr>
			<th><label for="facebook">Facebook</label></th>

			<td>
				<input type="text" name="facebook" id="facebook" value="'.esc_attr( get_the_author_meta( 'facebook', $user->ID ) ).'" class="regular-text" /><br />
				<span class="description">'.__('Please enter your Facebook profile link','somnium').'</span>
			</td>
		</tr>
		
		<tr>
			<th><label for="twitter">Twitter</label></th>

			<td>
				<input type="text" name="twitter" id="twitter" value="'.esc_attr( get_the_author_meta( 'twitter', $user->ID ) ).'" class="regular-text" /><br />
				<span class="description">'.__('Please enter your Twitter account link','somnium').'</span>
			</td>
		</tr>
		
		<tr>
			<th><label for="webpage">Webpage</label></th>

			<td>
				<input type="text" name="webpage" id="webpage" value="'.esc_attr( get_the_author_meta( 'webpage', $user->ID ) ).'" class="regular-text" /><br />
				<span class="description">'.__('Please enter your webpage link','somnium').'</span>
			</td>
		</tr>
		
		<tr>
			<th><label for="emailp">Public Email</label></th>

			<td>
				<input type="text" name="emailp" id="emailp" value="'.esc_attr( get_the_author_meta( 'emailp', $user->ID ) ).'" class="regular-text" /><br />
				<span class="description">'.__('Please enter your public email','somnium').'</span>
			</td>
		</tr>

	</table>';
}

add_action( 'personal_options_update', 'extra_author_info_save' );
add_action( 'edit_user_profile_update', 'extra_author_info_save' );


function extra_author_info_save( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	update_user_meta( $user_id, 'facebook', $_POST['facebook'] );
	update_user_meta( $user_id, 'twitter', $_POST['twitter'] );
	update_user_meta( $user_id, 'webpage', $_POST['webpage'] );
	update_user_meta( $user_id, 'emailp', $_POST['emailp'] );
}


add_theme_support( 'automatic-feed-links' );
if ( ! isset( $content_width ) ) {
	$content_width = 1380;
}

// Code from https://tommcfarlin.com/filter-wp-title/
function custom_wp_title( $title, $separator ) {
	global $paged, $page;
	if ( is_feed() ) {
		return $title;
	} 
	// Add the site name.
	$title .= get_bloginfo( 'name' );
	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $separator $site_description";
	}
	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = sprintf( __( 'Page %s', 'somnium' ), max( $paged, $page ) ) . " $separator $title";
	} // end if
	return $title;
} 
add_filter( 'wp_title', 'custom_wp_title', 10, 2 );



function profilepic_social($ID,$DIR){
					echo get_avatar($ID,96,'',true); 
					echo '<ul class="social_author">';
					$facebook = get_the_author_meta( 'facebook', $ID );
					$twitter = get_the_author_meta( 'twitter',  $ID );
					$webpage = get_the_author_meta( 'webpage',  $ID );
					$email = get_the_author_meta( 'emailp',  $ID );					
					if($facebook!== ''){echo'<li><a target="_blank" href="'.$facebook .'"><img alt="fb-icon" src="'.$DIR.'/images/facebook-icon.png"></a></li>';}
					if($twitter!== ''){echo'<li><a target="_blank" href="'.$twitter.'"><img alt="twt-icon" src="'.$DIR.'/images/twitter-icon.png"></a></li>';}
					if($webpage!== ''){echo'<li><a target="_blank" href="'.$webpage.'"><img alt="net-icon" src="'.$DIR.'/images/net-icon.png"></a></li>';}
					if($email!== ''){echo'<li><a target="_blank" href="mailto:'.$email.'"><img alt="email-icon"src="'.$DIR.'/images/email-icon.png"></a></li>';}
					echo'</ul>';
				}
				function author_box(){
					$authorID =get_the_author_meta( 'ID' );
					$authorName =  get_the_author_meta('display_name');
					$templDIR = get_template_directory_uri();
					echo'<div class="author_info_box">';
					echo'<ul class="author_nav_ul">
							<li id="about_author" class="active author_nav">'.__('About author','somnium').'</li>
							<li id="latest_posts" class="author_nav">'.__('Latest posts','somnium').'</li>
						</ul>';
					
					echo'<div id="about_box" class="author_box">
						<div class="profile_pic">';
							profilepic_social($authorID,$templDIR);
						// FB, Twatter, WebPage, Email
						echo'</div>
						<div class="profile_info">
							<h2>'.__('About', 'somnium').' '.$authorName.'</h2>
							<p>'.get_the_author_meta('description').'</p>
							<p> <a href="'.get_author_posts_url( $authorID ).'">'.__('More posts by','somnium').' '.$authorName.'</a></p>
						</div>
						<div class="clearfix"></div>
					</div>';
					
					echo'<div id="latest_box" class="author_box author_box_posts">
						<div class="profile_pic">';
							profilepic_social($authorID,$templDIR);
						echo'</div>
						<div class="latest_posts">
							<h2>'.__('Latest posts by', 'somnium').' '.$authorName.'</h2>';
							$args = array('post_type' => 'post','author' => $authorID,'posts_per_page'   => 3,);	
							$posts_query = new WP_Query( $args );
							echo '<ul class="latest_posts_ul">';
							while ($posts_query->have_posts()){ 
									$posts_query->the_post(); 
									echo'<li><a href="'. get_permalink().'">'; echo the_title(); echo'</a></li>';
							}
							wp_reset_postdata();	
							echo'</ul>';
							echo'<p> <a href="'.get_author_posts_url( $authorID ).'">'.__('More posts by','somnium').' '.$authorName.'</a></p>
						</div>
						 <div class="clearfix"></div>
					</div>';
					echo'</div>';
				}
				
				function prev_next_navigation($type){
					if($type=='post'){$tpToStr=__('post','somnium');}
					else if($type=='page'){$tpToStr=__('page','somnium');}
					$prev = __('Previous','somnium').' '.$tpToStr;
					$next = __('Next','somnium').' '.$tpToStr;
					echo' <div class="posts-nav"><div class="post_ln next_ln">';
					next_post_link( '%link', $next , FALSE );
					echo'</div>';
					echo' <div class="post_ln prev_ln">';
					previous_post_link( '%link', $prev, FALSE );
					echo'</div></div>';
				}
				
				function post_meta($show_cat=true){
					$category = get_the_category();$firstCategory = $category[0]->cat_name; 
					$cat = get_category_link(get_cat_ID($firstCategory)); $authorLNK = get_the_author_meta('display_name');
					echo'<span>'.__('Author','somnium').' <a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.$authorLNK.'</a> ';
					if($show_cat==true && !is_attachment()){
						echo'  | '.__('Published in','somnium').' ';
						echo '<a href="'.get_category_link(get_cat_ID($category[0]->cat_name)).'">'.$category[0]->cat_name.'</a>';
						for($i=1;isset($category[$i]);$i++){
							echo ', <a href="'.get_category_link(get_cat_ID($category[$i]->cat_name)).'">'.$category[$i]->cat_name.'</a> ';
						}
					}
					$imgCred = get_post_meta(get_the_ID(), 'img_credit', true);
					if(!NullEmpty($imgCred) && is_single()){echo'<a href="'.$imgCred .'"><img alt="image-credit" class="image-credit" title="'.__('Image Credit','somnium').'" src="'.get_template_directory_uri().'/images/icon-camera.png"></a>'; }
					echo'</span>';
				}
				
				
				function post_meta_short(){
					$category = get_the_category();
					echo'<div class="postXtooltips"  data-toggle="tooltip" title="'; the_author(); echo'"><i class="postXicon fa fa-user"></i></div><span> | </span>
						<div class="postXtooltips"  data-toggle="tooltip" title="';
						echo $category[0]->cat_name;
						for($l=1;isset($category[$l]);$l++){
							echo ', '.$category[$l]->cat_name;
						}
						echo'"><i class="postXicon fa fa-folder-open"></i></div><span> | </span>
						<div class="postXtooltips"  data-toggle="tooltip" title="'; comments_number(); echo'"><i class="postXicon fa fa-comments-o"></i></div>';
				}
				
				function post_meta_long(){
					$category = get_the_category();
					echo'<div><i class="postXicon fa fa-user"></i> '.get_the_author().' | 
						<i class="postXicon fa fa-folder-open"></i> ';
						echo $category[0]->cat_name;
						for($l=1;isset($category[$l]);$l++){
							echo ', '.$category[$l]->cat_name;
						}
						echo' | 
						<i class="postXicon fa fa-comments-o"></i> '; echo get_comments_number(); echo'</div>';
				}
				
				/*function caption_shortcode( $atts, $content = null ) {
	$a = shortcode_atts( array(
		'class' => 'caption',
	), $atts );

	return '<span class="' . esc_attr($a['class']) . '">' . $content . '</span>';
}
				
				function st( $atts, $content = null ) {
				$a = shortcode_atts( array(
					'width' => 'start',
				), $atts );
					return '<style>.youtube iframe {width:'.esc_attr($a['width']).';}</style><div class="youtube">'.$content.'</div>';
				}
				add_shortcode( 'start', 'st' );
				
			
				
				
				function dst( $atts, $content = null ) {
				$a = shortcode_atts( array(
					'width' => 'driveStart',
					'height' => 'driveStart',
					'autoheight' => 'driveStart',
				), $atts );
				
					return '<style>.drive iframe {width:'.esc_attr($a['width']).';height:'.esc_attr($a['height']).';}</style><div class="drive '.esc_attr($a['autoheight']).'">'.$content.'</div>';
				}
				add_shortcode( 'drive', 'dst' );
	*/			
				
function getImage($tst,$width, $height){
	if(strpos(pathinfo($tst, PATHINFO_DIRNAME), home_url()) !== false){
			$filename = pathinfo($tst, PATHINFO_DIRNAME).'/'. pathinfo($tst, PATHINFO_FILENAME).'-'.$width.'x'.$height.'.'.pathinfo($tst, PATHINFO_EXTENSION);
			if (@getimagesize($filename)){
				echo $filename;
			}else{
				echo $tst;
			} 
		}else{
			echo $tst; 
		}	
}
				
