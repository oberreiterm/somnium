<?php 

function sm_recompile_action_local(){
					// Loads the library
					require_once get_template_directory() . "/inc/scss.inc.php";
					$scss = new scssc();
					// Setting default @import paths
					$scss->setImportPaths(get_template_directory()."/sass");
					// Loading the file to the string
					$scssIn =  sm_read_file(get_template_directory() ."/sass/style.scss");
					// Compilation
					$cssOut = $scss->compile($scssIn);
					// Outputs to style.css
					sm_write_file(get_template_directory() ."/style.css", $cssOut);
				}
function sm_get_str_between($str, $start, $end){
					// Prevents from being empty
					$str = ' '.$str;
					// Position of start
					$inPos = strpos($str, $start);
					// Ends if hit the previously added space
					if($inPos == 0){
						return '';
					}
					// Adds length of start
					$inPos += strlen($start);
					// Length of string after start and before end 
					$length = strpos($str, $end, $inPos) - $inPos;
					// Returns string between specified positions
					return substr($str, $inPos, $length);
		}
				
function sm_customizer_register( $wp_customize ) {
	$counter=0;

	if( class_exists( 'WP_Customize_Control' ) ){ 
		class WP_Customize_GoogleFont_Control extends WP_Customize_Control {
			public $type = 'font-picker';
			public $keys = '$primary-bodyfont';
			public $original = 'Montserrat-Light';
			
			public function render_content() {
				if (isset($_GET['ajax'])) {
					if(isset($_GET['apply-'.$this->id]) == true && $counter<1){
						// Loads the file
						$content =  sm_read_file(get_template_directory() ."/sass/_variables.scss");
						// Gets the custom key
						$objectToParse = $this->keys.':';
						// Gets string from $content after $objectToParse and before ';'
						$parsed = sm_get_str_between($content, $objectToParse, ';');
						// Retrieves original key and value
						$parsed = $objectToParse.$parsed;
						// Removes '+' from font name, f.e. Courier+New+700 -> Courier New 700
						$fontName = ' "'.str_replace("+"," ",$this->value()).'"';
						// Removes 3 subsequent digits (font weight)
						$fontName = preg_replace('\'\\:\\d{3}\'', '', $fontName, -1);
						// Creates key with new value
						$fontName = $objectToParse.$fontName;
						// Replaces old with new
						$content = str_replace($parsed,$fontName,$content);
						// Puts it back to file
						sm_write_file(get_template_directory() ."/sass/_variables.scss", $content);
						// Creates new style.css with new values
						sm_recompile_action_local();
						$counter++;
					}
				}
			
				
			
			?>
			<script>
			
				jQuery(document).ready(function () {
					
					jQuery('.apply-<?php echo esc_attr( $this->id ); ?>').click(function(){
						var content =true;
						jQuery.ajax({
							method: 'get',
							url: 'customize.php',
							data: {
								'apply-<?php echo esc_attr( $this->id ); ?>': content,
								'ajax': true
							},
							success: function(){alert('Success!');}
						});
					});
					if(counterX==false){
						jQuery('.gwp-input').fontselect();
						counterX=true;
					}
			});
			//location.reload();
			
			</script>
			
			
				<h3><?php echo esc_html( $this->label); ?></h3>
				<p><?php echo esc_html( $this->description); ?></p>
				<input class="gwp-input" <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>"></input>
				<div class="apply_compile apply-<?php echo esc_attr( $this->id ); ?> button-primary"><?php _e('Apply','somnium'); ?></div>
			<?php
			}
		}
		
		
		
		
		
		
		
		class WP_Customize_SelectFontType_Control extends WP_Customize_Control {
			public $type = 'type-select';
			public $keys = '$primary-bodyfont';
			public $original = 'Montserrat-Light';
			
			public function render_content() {
				
				
					if (isset($_GET['ajax'])) {
						if(isset($_GET['variables_type'])){
						$content =  sm_read_file(get_template_directory() ."/sass/_variables.scss");
						$object= array('$heading-font-light','$heading-font','$primary-bodyfont','$secondary-bodyfont');
						$objectValue = array('Montserrat-Hairline','Montserrat-UltraLight','Montserrat-Light','Montserrat Thin');
						
						for($i=0;$i<4;$i++){
							$objectToParse = $object[$i].':';
							$parsed = sm_get_str_between($content, $objectToParse, ';');
							$parsed = $objectToParse.$parsed;
							$fontName = ' "'.str_replace("+"," ",$objectValue[$i]).'"';
							$fontName = $objectToParse.$fontName;
							$content = str_replace($parsed,$fontName,$content);
						}
						echo  $content;
						
						//echo 'new '.$fontName;
						
		
						sm_write_file(get_template_directory() ."/sass/_variables.scss", $content);
						sm_recompile_action_local();
					}
				}
		
				 
			
			?>
			<script>
			
				jQuery(document).ready(function () {
					
					jQuery('.apply_compile_type').click(function(){
						
						var content_type =true;
						jQuery.ajax({
							method: 'get',
							url: 'customize.php',
							data: {
								'variables_type': content_type,
								'ajax': true
							},
							success: function(){alert('Success!');}
						});
					});
					/*if(counterX==false){
						jQuery('.gwp-input').fontselect();
						counterX=true;
					}*/
			});
			//location.reload();
			
			</script>
				
				<label>
					<?php if ( ! empty( $this->label ) ) : ?>
						<h2 class="font-control-title"><?php echo esc_html( $this->label ); ?></h2>
						<h4>Default Fonts: Montserrat-Hairline, Montserrat-UltraLight, Montserrat-Light, Montserrat Thin</h4>
					<?php endif;
					if ( ! empty( $this->description ) ) : ?>
						<span class="description customize-control-description"><?php echo $this->description; ?></span>
					<?php endif; ?>
				</label>
				<div class="apply_compile_type button-primary"><?php _e('Apply','somnium'); ?></div>
				<?php
			
			}
		}
	}
	
	
	$wp_customize->add_panel( 'page-pan', array(
		
		'priority'       => 1,
  
		'capability'     => 'edit_theme_options',
 
		'theme_supports' => '',
  
		'title'       => __( 'Settings', 'somnium' ),
 
		'description'    => __('Settings for basic setup', 'somnium' ),
	));
	
	
	$wp_customize->add_section( 'general' , array(

			'title'       => __( 'General settings', 'somnium' ),

    	  	'priority'    => 1,
			
			'panel'  => 'page-pan',
			
			'description'    => __('Settings for basic setup', 'somnium' ),

	));
	
	$wp_customize->add_section( 'fonts' , array(

			'title'       => __( 'Fonts', 'somnium' ),

    	  	'priority'    => 1,
			
			'panel'  => 'page-pan',
			

	));
	
	$wp_customize->add_setting( 'font-type',array('sanitize_callback' => 'sanitize_text_field','default' => 'none'));

	$wp_customize->add_control( new WP_Customize_SelectFontType_Control( $wp_customize,'font-type', array(

			'label'    => __('Apply default fonts', 'somnium'),

	      	'section'  => 'fonts',
			
			'description'    => __('By applying all fonts will be changed and CSS will be recompiled.', 'somnium' ),
			
			'type' => 'type-select',

	      	'settings' => 'font-type',

			'priority'    => 1,

	)));

	
	$wp_customize->add_setting( 'font',array('sanitize_callback' => 'sanitize_text_field','default' => 'none'));

	$wp_customize->add_control(new WP_Customize_GoogleFont_Control( $wp_customize,'font', array(

			'label'    => __('Heading Font Light', 'somnium'),
			
			'description'    => __('Save -> Apply ->  Setting Are Now Saved, (Optional) Refresh to Show', 'somnium'),

	      	'section'  => 'fonts',
			
			'type' => 'font-picker',

	      	'settings' => 'font',

			'priority'    => 1,
			
			'keys' => '$heading-font-light',
			
			'original' => 'Montserrat-Hairline',

	)));
	
	$wp_customize->add_setting( 'font2',array('sanitize_callback' => 'sanitize_text_field','default' => 'none'));

	$wp_customize->add_control(new WP_Customize_GoogleFont_Control( $wp_customize,'font2', array(

			'label'    => __('Heading Font', 'somnium'),
			
			'description'    => __('Save -> Apply ->  Setting Are Now Saved, (Optional) Refresh to Show', 'somnium'),

	      	'section'  => 'fonts',
			
			'type' => 'font-picker',

	      	'settings' => 'font2',

			'priority'    => 1,
			
			'keys' => '$heading-font',
			
			'original' => 'Montserrat-UltraLight',

	)));
	
	$wp_customize->add_setting( 'font3',array('sanitize_callback' => 'sanitize_text_field','default' => 'none'));

	$wp_customize->add_control(new WP_Customize_GoogleFont_Control( $wp_customize,'font3', array(

			'label'    => __('Primary Body Font', 'somnium'),
			
			'description'    => __('Save -> Apply ->  Setting Are Now Saved, (Optional) Refresh to Show', 'somnium'),

			'section'  => 'fonts',
			
			'type' => 'font-picker',

	      	'settings' => 'font3',

			'priority'    => 1,
			
			'keys' => '$primary-bodyfont',
			
			'original' => 'Montserrat-Light',

	)));
	
	$wp_customize->add_setting( 'font4',array('sanitize_callback' => 'sanitize_text_field','default' => 'none'));

	$wp_customize->add_control(new WP_Customize_GoogleFont_Control( $wp_customize,'font4', array(

			'label'    => __('Secondary Body Font', 'somnium'),
			
			'description'    => __('Save -> Apply ->  Setting Are Now Saved, (Optional) Refresh to Show', 'somnium'),

	      	'section'  => 'fonts', 
			
			'type' => 'font-picker',

	      	'settings' => 'font4',

			'priority'    => 1,
			
			'keys' => '$secondary-bodyfont',
			
			'original' => 'Montserrat Thin',

	)));
	

	$wp_customize->add_setting( 'sidebar-type',array('sanitize_callback' => 'sanitize_text_field','default' => 'none'));

	$wp_customize->add_control( 'sidebar-type', array(

			'label'    => __('Type of Sidebar on the Front Page', 'somnium'),

	      	'section'  => 'general',
			
			'type' => 'select',
			
			'choices'  => array(
			
				'none'  => __('No sidebar','somnium'),
			
				'left' => __('Left Sidebar','somnium'),
				
				'right' => __('Right Sidebar','somnium'),
				
			),

	      	'settings' => 'sidebar-type',

			'priority'    => 1,

	));
	
	$wp_customize->add_setting( 'sidebarN', array('sanitize_callback' => 'sanitize_text_field', 'default' => 0));

	$wp_customize->add_control(  'sidebarN', array(

	      	'label'    => __('Number of Sidebars For Front Page', 'somnium' ), 

	      	'section'  => 'general',

	      	'settings' => 'sidebarN',

			'priority'    => 1,
			
			'type' => 'number',
			

	));
	
	$wp_customize->add_setting( 'pgsExLn', array('sanitize_callback' => 'sanitize_text_field','default' => 30));

	$wp_customize->add_control(  'pgsExLn', array(

	      	'label'    => __('Excerpt lenght on archive, category, search...', 'somnium' ),
			
			'description'    => __('Maximum 100 Words', 'somnium' ),

	      	'section'  => 'general',

	      	'settings' => 'pgsExLn',

			'priority'    => 1,
			
			'type' => 'number',
			
			'default' => '55',
			
			'input_attrs' => array(
				'max'   => 100, 
		
    ),

	));
	
	$wp_customize->add_setting( 'blog-txt', array('sanitize_callback' => 'sanitize_text_field'));

	$wp_customize->add_control(  'blog-txt', array(

	      	'label'    => __('Blog Index Page Text', 'somnium' ), 

	      	'section'  => 'general',

	      	'settings' => 'blog-txt',

			'priority'    => 1,
			

			

	));
	
	$wp_customize->add_setting( 'archive-bc', array('sanitize_callback' => 'sanitize_text_field'));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'archive-bc', array(

	      	'label'    => __('Archive Background Image', 'somnium'),
			
	      	'section'  => 'general',

	      	'settings' => 'archive-bc',

			'priority'    => 2,

	)));
	
	$wp_customize->add_setting( '404-bc', array('sanitize_callback' => 'sanitize_text_field'));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, '404-bc', array(

	      	'label'    => __('Page 404 Background Image', 'somnium'),
			
	      	'section'  => 'general',

	      	'settings' => '404-bc',

			'priority'    => 2,

	)));
	
	
	$wp_customize->add_setting( 'blog-bc', array('sanitize_callback' => 'sanitize_text_field'));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'blog-bc', array(

	      	'label'    => __('Blog Background Image', 'somnium'),
			
	      	'section'  => 'general',

	      	'settings' => 'blog-bc',

			'priority'    => 2,

	)));
	
	$wp_customize->add_setting( 'search-bc', array('sanitize_callback' => 'sanitize_text_field'));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'search-bc', array(

	      	'label'    => __('Search Background Image', 'somnium'),
			
	      	'section'  => 'general',

	      	'settings' => 'search-bc',

			'priority'    => 2,

	)));
	
	$wp_customize->add_setting( 'category-bc', array('sanitize_callback' => 'sanitize_text_field'));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'category-bc', array(

	      	'label'    => __('Category Background Image', 'somnium'),
			
	      	'section'  => 'general',

	      	'settings' => 'category-bc',

			'priority'    => 2,

	)));
	
	
	$wp_customize->add_setting( 'scroll_top',array('sanitize_callback' => 'sanitize_text_field','default' => 'select-yes'));

	$wp_customize->add_control( 'scroll_top', array(

			'label'    => __('Display Scroll To Top Button?', 'somnium'),

	      	'section'  => 'general',
			
			'type' => 'select',
			
			'choices'  => array(
			
				'select-yes'  => __('Yes','somnium'),
			
				'select-no' => __('No','somnium'),
				
				
				
			),

	      	'settings' => 'scroll_top',

			'priority'    => 1,

	));
	
	
	
	$wp_customize->add_setting( 'page-sidebar-type',array('sanitize_callback' => 'sanitize_text_field','default' => 'right'));

	$wp_customize->add_control( 'page-sidebar-type', array(

			'label'    => __('Type of Sidebar on Pages', 'somnium'),

	      	'section'  => 'pages',
			
			'type' => 'select',
			
			'choices'  => array(
		
				'none'  => __('No sidebar','somnium'),
			
				'left' => __('Left Sidebar','somnium'),
				
				'right' => __('Right Sidebar','somnium'),
				
			),

	      	'settings' => 'page-sidebar-type',

			'priority'    => 1,

	));
	
	$wp_customize->add_setting( 'post-sidebar-type',array('sanitize_callback' => 'sanitize_text_field','default' => 'right'));

	$wp_customize->add_control( 'post-sidebar-type', array(

			'label'    => __('Type of Sidebar on Posts', 'somnium'),

	      	'section'  => 'posts',
			
			'type' => 'select',
			
			'choices'  => array(
			
				'none'  => __('No sidebar','somnium'),
			
				'left' => __('Left Sidebar','somnium'),
				
				'right' => __('Right Sidebar','somnium'),
				
			),

	      	'settings' => 'post-sidebar-type',

			'priority'    => 1,

	));
	
	$wp_customize->add_setting( 'cats-sidebar-type',array('sanitize_callback' => 'sanitize_text_field','default' => 'right'));

	$wp_customize->add_control( 'cats-sidebar-type', array(

			'label'    => __('Type of Sidebar on Categories/Searches', 'somnium'),

	      	'section'  => 'general',
			
			'type' => 'select',
			
			'choices'  => array(
			
				'none'  => __('No sidebar','somnium'),
			
				'left' => __('Left Sidebar','somnium'),
				
				'right' => __('Right Sidebar','somnium'),
				
			),

	      	'settings' => 'cats-sidebar-type',

			'priority'    => 1,

	));
	
	$wp_customize->add_setting( 'page-width',array('sanitize_callback' => 'sanitize_text_field','default' => 'wide'));

	$wp_customize->add_control( 'page-width', array(

			'label'    => __('Width of Website', 'somnium'),

	      	'section'  => 'general',
			
			'type' => 'select',
			
			'choices'  => array(
			
				'wide'  => __('Wide (1380px) (Recommended)','somnium'),
			
				'standard' => __('Standard (1170px)','somnium'),
				
				'narrow' => __('Narrow (960px)','somnium'),
				
			),

	      	'settings' => 'page-width',

			'priority'    => 1,

	));
	
	$wp_customize->add_section( 'posts' , array(

			'title'       => __( 'Post settings', 'somnium' ),

    	  	'priority'    => 1,
			
			'panel'  => 'page-pan',
			
			'description'    => __('Default Settings for Posts', 'somnium' ),

	));
	
	$wp_customize->add_setting( 'pMCStyle',array('sanitize_callback' => 'sanitize_text_field','default' => 'select-modern'));

	$wp_customize->add_control( 'pMCStyle', array(

			'label'    => __('Default Post Style Display', 'somnium'),

	      	'section'  => 'posts',
			
			'type' => 'select',
			
			'choices'  => array(
			
				'select-modern' => __('Modern','somnium'),
			
				'select-classic'  => __('Classic','somnium'),
				
				
			),

	      	'settings' => 'pMCStyle',

			'priority'    => 1,

	));
	
	
	$wp_customize->add_setting( 'pStyle', array('sanitize_callback' => 'sanitize_text_field','default' => 'postLike'));

	$wp_customize->add_control( 'pStyle', array(

			'label'    => __('Default Post Style Display (Modern only)', 'somnium'),

	      	'section'  => 'posts',
			
			'type' => 'select',
			
			'choices'  => array(
			
				'postLike' =>  __('Post-Like','somnium'),
			
				'pageLike'  =>  __('Page-Like','somnium'),
				
				
			),

	      	'settings' => 'pStyle',

			'priority'    => 1,

	));
	
	$wp_customize->add_setting( 'dMeta',array('sanitize_callback' => 'sanitize_text_field','default' => 'yes'));

	$wp_customize->add_control( 'dMeta', array(

			'label'    => __('Default Display Meta', 'somnium'),

	      	'section'  => 'posts',
			
			'type' => 'select',
			
			'choices'  => array(
			
				'yes' =>  __('Yes','somnium'),
			
				'no'  => __('No','somnium'),
				
				
			),

	      	'settings' => 'dMeta',

			'priority'    => 1,

	));
	
	$wp_customize->add_setting( 'oLay',array('sanitize_callback' => 'sanitize_text_field','default' => 'yes'));

	$wp_customize->add_control( 'oLay', array(

			'label'    => __('Default Overlay Display (Modern only)', 'somnium'),

	      	'section'  => 'posts',
			
			'type' => 'select',
			
			'choices'  => array(
			
				'yes' =>  __('Yes','somnium'),
			
				'no'  => __('No','somnium'),
				
				
			),

	      	'settings' => 'oLay',

			'priority'    => 1,

	));
	
	$wp_customize->add_setting( 'dDate',array('sanitize_callback' => 'sanitize_text_field','default' => 'yes'));

	$wp_customize->add_control( 'dDate', array(

			'label'    => __('Default Date Display', 'somnium'),

	      	'section'  => 'posts',
			
			'type' => 'select',
			
			'choices'  => array(
			
				'yes' =>  __('Yes','somnium'),
			
				'no'  => __('No','somnium'),
				
				
			),

	      	'settings' => 'dDate',

			'priority'    => 1,

	));
	
	$wp_customize->add_setting( 'pNav', array('sanitize_callback' => 'sanitize_text_field','default' => 'yes'));

	$wp_customize->add_control( 'pNav', array(

			'label'    => __('Default Navigation Display', 'somnium'),

	      	'section'  => 'posts',
			
			'type' => 'select',
			
			'choices'  => array(
			
				'yes' =>  __('Yes','somnium'),
			
				'no'  => __('No','somnium'),
				
				
			),

	      	'settings' => 'pNav',

			'priority'    => 1,

	));
	
	$wp_customize->add_setting( 'ABoxs', array('sanitize_callback' => 'sanitize_text_field','default' => 'yes'));

	$wp_customize->add_control( 'ABoxs', array(

			'label'    => __('Default Author Box Display', 'somnium'),

	      	'section'  => 'posts',
			
			'type' => 'select',
			
			'choices'  => array(
			
				'yes' =>  __('Yes','somnium'),
			
				'no'  => __('No','somnium'),
				
				
			),

	      	'settings' => 'ABoxs',

			'priority'    => 1,

	));
	
	$wp_customize->add_setting( 'initial', array('sanitize_callback' => 'sanitize_text_field','default' => 'no'));

	$wp_customize->add_control( 'initial', array(

			'label'    => __('Default Initial', 'somnium'),

	      	'section'  => 'posts',
			
			'type' => 'select',
			
			'choices'  => array(
			
				'yes' =>  __('Yes','somnium'),
			
				'no'  => __('No','somnium'),
				
				
			),

	      	'settings' => 'initial',

			'priority'    => 1,

	));
	
	
	$wp_customize->add_section( 'pages' , array(

			'title'       => __( 'Page settings', 'somnium' ),

    	  	'priority'    => 1,
			
			'panel'  => 'page-pan',
			
			'description'    => __('Default Settings for Pages', 'somnium' ),

	));

	
	
	
	
	
	$wp_customize->add_setting( 'pStyle2', array('sanitize_callback' => 'sanitize_text_field','default' => 'pageLike'));

	$wp_customize->add_control( 'pStyle2', array(

			'label'    => __('Default Page Style', 'somnium'),

	      	'section'  => 'pages',
			
			'type' => 'select',
			
			'choices'  => array(
			
				'postLike' => __('Post-Like','somnium'),
			
				'pageLike'  => __('Page-Like','somnium'),
				
				
			),

	      	'settings' => 'pStyle2',

			'priority'    => 1,

	));
	
	$wp_customize->add_setting( 'dMeta2',array('sanitize_callback' => 'sanitize_text_field','default' => 'yes'));

	$wp_customize->add_control( 'dMeta2', array(

			'label'    => __('Default Display Meta', 'somnium'),

	      	'section'  => 'pages',
			
			'type' => 'select',
			
			'choices'  => array(
			
				'yes' => __('Yes','somnium'),
			
				'no'  => __('No','somnium'),
				
				
			),

	      	'settings' => 'dMeta2',

			'priority'    => 1,

	));
	
	$wp_customize->add_setting( 'oLay2',array('sanitize_callback' => 'sanitize_text_field','default' => 'yes'));

	$wp_customize->add_control( 'oLay2', array(

			'label'    => __('Default Overlay Display', 'somnium'),

	      	'section'  => 'pages',
			
			'type' => 'select',
			
			'choices'  => array(
			
				'yes' => __('Yes','somnium'),
			
				'no'  => __('No','somnium'),
				
				
			),

	      	'settings' => 'oLay2',

			'priority'    => 1,

	));
	
	$wp_customize->add_setting( 'dDate2',array('sanitize_callback' => 'sanitize_text_field','default' => 'yes'));

	$wp_customize->add_control( 'dDate2', array(

			'label'    => __('Default Date Display', 'somnium'),

	      	'section'  => 'pages',
			
			'type' => 'select',
			
			'choices'  => array(
			
				'yes' => __('Yes','somnium'),
			
				'no'  => __('No','somnium'),
				
				
			),

	      	'settings' => 'dDate2',

			'priority'    => 1,

	));
	
	$wp_customize->add_setting( 'pNav2',array('sanitize_callback' => 'sanitize_text_field','default' => 'yes'));

	$wp_customize->add_control( 'pNav2', array(

			'label'    => __('Default Navigation Display', 'somnium'),

	      	'section'  => 'pages',
			
			'type' => 'select',
			
			'choices'  => array(
			
				'yes' => __('Yes','somnium'),
			
				'no'  => __('No','somnium'),
				
				
			),

	      	'settings' => 'pNav2',

			'priority'    => 1,

	));
	
	$wp_customize->add_setting( 'ABoxs2',array('sanitize_callback' => 'sanitize_text_field','default' => 'yes'));

	$wp_customize->add_control( 'ABoxs2', array(

			'label'    => __('Default Author Box Display', 'somnium'),

	      	'section'  => 'pages',
			
			'type' => 'select',
			
			'choices'  => array(
			
				'yes' => __('Yes','somnium'),
			
				'no'  => __('No','somnium'),
				
				
			),

	      	'settings' => 'ABoxs2',

			'priority'    => 1,

	));
	
	$wp_customize->add_setting( 'initial2', array('sanitize_callback' => 'sanitize_text_field','default' => 'no'));

	$wp_customize->add_control( 'initial2', array(

			'label'    => __('Default Initial', 'somnium'),

	      	'section'  => 'pages',
			
			'type' => 'select',
			
			'choices'  => array(
			
				'no'  => __('No','somnium'),
			
				'yes' =>  __('Yes','somnium'),
			
				
				
				
			),

	      	'settings' => 'initial2',

			'priority'    => 1,

	));
	
	$wp_customize->add_section( 'sliders' , array(

			'title'       => __( 'Slider settings', 'somnium' ),

    	  	'priority'    => 1,
			
			'panel'  => 'page-pan',
			
			'description'    => __('Default Settings for Slider', 'somnium' ),

	));

	
	$wp_customize->add_setting( 'slider-time', array('sanitize_callback' => 'sanitize_text_field','default' => 5000));

	$wp_customize->add_control(  'slider-time', array(

	      	'label'    => __('Slide Duration in Miliseconds', 'somnium' ),

	      	'section'  => 'sliders',

	      	'settings' => 'slider-time',

			'priority'    => 1,
			
			'type' => 'number',
			
			

	));
	
	
	
	
	$wp_customize->add_setting('slider-display',array('default'    => '0','sanitize_callback' => 'wp_filter_nohtml_kses','default' => 1));
	
	$wp_customize->add_control(
	new WP_Customize_Control(
        $wp_customize,
        'slider-display',
        array(
				
				'label'		=> __( 'Display Main Slider', 'somnium' ),
				
				
				'section'	=> 'sliders',
				
				'settings'	=> 'slider-display',
				
				'type'      => 'checkbox',
				
				'std'         =>  1,
				
				'priority'	=> 4,
				
				
			) 
		) 
	);
	
	$wp_customize->add_setting( 'slider-height', array('sanitize_callback' => 'sanitize_text_field','default' =>100));

	$wp_customize->add_control(  'slider-height', array(

	      	'label'    => __('Slide Height in percents of Viewport Height', 'somnium' ),

	      	'section'  => 'sliders',

	      	'settings' => 'slider-height',

			'priority'    => 1,
			
			'type' => 'number',
			
			

	));
	
	$wp_customize->add_setting( 'classic-padding', array('sanitize_callback' => 'sanitize_text_field','default' => 100));

	$wp_customize->add_control(  'classic-padding', array(

	      	'label'    => __('Padding of "Classic" post in pixels', 'somnium' ),

	      	'section'  => 'posts',

	      	'settings' => 'classic-padding',

			'priority'    => 5,
			
			'type' => 'number',

	));
	
	$wp_customize->add_setting( 'query_posts', array('sanitize_callback' => 'sanitize_text_field','default' => 10));

	$wp_customize->add_control(  'query_posts', array(

	      	'label'    => __('Number of posts per page on archves/searches', 'somnium' ),

	      	'section'  => 'general',

	      	'settings' => 'query_posts',

			'priority'    => 1,
			
			'type' => 'number',

	));
	
	
	$wp_customize->add_section( 'custom-css' , array(

			'title'       => __( 'Your Custom CSS', 'somnium' ),

    	  	'priority'    => 1,

    	  	'description' => __('Input Any CSS Code', 'somnium' ),
			
			'panel'  => 'page-pan',

	));
	
	
	$wp_customize->add_setting( 'css', array('sanitize_callback' => 'wp_kses_post'));

	$wp_customize->add_control(  'css', array(

	      	'label'    => __('Custom CSS', 'somnium' ),

	      	'section'  => 'custom-css',

	      	'settings' => 'css',

			'priority'    => 1,
			
			'type' => 'textarea',

	));
	
	
	$wp_customize->add_section( 'advanced' , array(

			'title'       => __( 'Color Settings', 'somnium'),
			
			'description' => __('By filling any of these options, the settings in "Appearance->Somnium Theme" will be overriden. The options below generate separate stylesheet. This does NOT change SASS files and should be used by regular users as it is more user-friendly.', 'somnium' ),

    	  	'priority'    => 1,
			
			'panel'  => 'page-pan',

    	  

	));
	
	$wp_customize->add_setting( 'body-bc', array('sanitize_callback' => 'sanitize_text_field'));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body-bc', array(

	      	'label'    => __('Body Background Color', 'somnium'),

	      	'section'  => 'advanced',

	      	'settings' => 'body-bc',

			'priority'    => 2,

	)));
	
	$wp_customize->add_setting( 'body-bc-img', array('sanitize_callback' => 'sanitize_text_field'));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'body-bc-img', array(

	      	'label'    => __('Body Background Image', 'somnium'),
			

	      	'section'  => 'advanced',

	      	'settings' => 'body-bc-img',

			'priority'    => 2,

	)));
	
	
	$wp_customize->add_setting( 'header-highlight-color', array('sanitize_callback' => 'sanitize_text_field'));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header-highlight-color', array(

	      	'label'    => __('Header highlight color', 'somnium'),

	      	'section'  => 'advanced',

	      	'settings' => 'header-highlight-color',

			'priority'    => 2,

	)));
	
	$wp_customize->add_setting( 'header-highlight-color-top', array('sanitize_callback' => 'sanitize_text_field'));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header-highlight-color-top', array(

	      	'label'    => __('Header highlight color on top', 'somnium'),

	      	'section'  => 'advanced',

	      	'settings' => 'header-highlight-color-top',

			'priority'    => 2,

	)));
	
	$wp_customize->add_setting( 'content-highlight-color', array('sanitize_callback' => 'sanitize_text_field'));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content-highlight-color', array(

	      	'label'    => __('Content highlight color', 'somnium'),

	      	'section'  => 'advanced',

	      	'settings' => 'content-highlight-color',

			'priority'    => 2,

	)));
	
	
	
	$wp_customize->add_setting( 'content-text-on-image-color', array('sanitize_callback' => 'sanitize_text_field'));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content-text-on-image-color', array(

	      	'label'    => __('Content Text-on-Image color', 'somnium'),

	      	'section'  => 'advanced',

	      	'settings' => 'content-text-on-image-color',

			'priority'    => 2,

	)));
	
	
	$wp_customize->add_setting( 'footer-background-color', array('sanitize_callback' => 'sanitize_text_field'));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer-background-color', array(

	      	'label'    => __('Footer background color', 'somnium'),

	      	'section'  => 'advanced',

	      	'settings' => 'footer-background-color',

			'priority'    => 2,

	)));
	
	$wp_customize->add_setting( 'footer-text-color', array('sanitize_callback' => 'sanitize_text_field'));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer-text-color', array(

	      	'label'    => __('Footer text color', 'somnium'),

	      	'section'  => 'advanced',

	      	'settings' => 'footer-text-color',

			'priority'    => 2,

	)));
	
	$wp_customize->add_setting( 'footer-background', array('sanitize_callback' => 'sanitize_text_field'));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer-background', array(

	      	'label'    => __('Background Image', 'somnium'),

	      	'section'  => 'advanced',

	      	'settings' => 'footer-background',

			'priority'    => 2,

	)));
	
	
	$wp_customize->add_setting( 'content-highlight-color-transparent', array('sanitize_callback' => 'sanitize_text_field'));

	$wp_customize->add_control( 'content-highlight-color-transparent', array(

			'label'    => __('Content highlight color with transparency (input in RGBA format)', 'somnium'),

	      	'section'  => 'advanced',

	      	'settings' => 'content-highlight-color-transparent',

			'priority'    => 4,

	));
	
	$wp_customize->add_setting( 'header-background-color', array('sanitize_callback' => 'sanitize_text_field'));

	$wp_customize->add_control( 'header-background-color', array(

			'label'    => __('Header Background Color (could be inputed in RGBA format)', 'somnium'),

	      	'section'  => 'advanced',

	      	'settings' => 'header-background-color',

			'priority'    => 4,

	));
	
	$wp_customize->add_setting( 'selection-background-color', array('sanitize_callback' => 'sanitize_text_field'));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'selection-background-color', array(

	      	'label'    => __('Selection background color', 'somnium'),

	      	'section'  => 'advanced',

	      	'settings' => 'selection-background-color',

			'priority'    => 2,

	)));
	
	$wp_customize->add_setting( 'selection-color', array('sanitize_callback' => 'sanitize_text_field'));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'selection-color', array(

	      	'label'    => __('Selection Text Color', 'somnium'),

	      	'section'  => 'advanced',

	      	'settings' => 'selection-color',

			'priority'    => 2,

	)));
	

	
	
	
	$wp_customize->add_section( 'footer' , array(

			'title'       => __( 'Footer Settings', 'somnium'),

    	  	'priority'    => 2,

			'panel'  => 'page-pan',

	));

	
	
	$wp_customize->add_setting( 'footer_copyright', array('sanitize_callback' => 'sanitize_text_field'));

	$wp_customize->add_control( 'footer_copyright', array(

			'label'    => __('Copyright Text', 'somnium'),

	      	'section'  => 'footer',

	      	'settings' => 'footer_copyright',

			'priority'    => 4,

	));
	
	$wp_customize->add_setting( 'footer_copyright_y', array('sanitize_callback' => 'sanitize_text_field'));

	$wp_customize->add_control( 'footer_copyright_y', array(

			'label'    => __('Copyright Year', 'somnium'),

	      	'section'  => 'footer',

	      	'settings' => 'footer_copyright_y',

			'priority'    => 5,

	));
	
	$wp_customize->add_setting('footer-theme-display',array('sanitize_callback' => 'wp_filter_nohtml_kses','default' => 1));
	
	$wp_customize->add_control(
	new WP_Customize_Control(
        $wp_customize,
        'footer-theme-display',
        array(
				
				'label'		=> __( 'Display Theme Credits', 'somnium' ),
				
				
				'section'	=> 'footer',
				
				'settings'	=> 'footer-theme-display',
				
				'type'      => 'checkbox',
				
				'std'         =>  1,
				
				'priority'	=> 4,
				
				
			) 
		) 
	);
	

	$wp_customize->add_section('fixed-header',array(
	'title'=> __( 'Fixed Header', 'somnium' ),
	'priority'=> 3,
	'description' => __('These settings are common for every fixed header. To create fixed header go Widgets->Header and create Header widget','somnium'),
	'panel'  => 'page-pan',
	) );
	
 
	
	$wp_customize->add_setting('fixed-header-menu-choice',array('sanitize_callback' => 'wp_filter_nohtml_kses','default' => 1));
	
	$wp_customize->add_control(
	new WP_Customize_Control(
        $wp_customize,
        'fixed-header-menu-choice',
        array(
				
				'label'		=> __( 'Will You Have Any Links to Sections on Front Page?', 'somnium' ),
				
				'description' => __( 'Anchor Links', 'somnium' ),
				
				'section'	=> 'fixed-header',
				
				'settings'	=> 'fixed-header-menu-choice',
				
				'type'      => 'checkbox',
				
				'priority'	=> 4,
				
				
			) 
		) 
	);
	
	$wp_customize->add_setting('fixed-header-gradient',array('default'  => 0,'sanitize_callback' => 'wp_filter_nohtml_kses',));
	
	$wp_customize->add_control(
	new WP_Customize_Control(
        $wp_customize,
        'fixed-header-gradient',
        array(
				
				'label'		=> __( 'Display overlaying contrasting background for top position?', 'somnium' ),
				
				'section'	=> 'fixed-header',
				
				'settings'	=> 'fixed-header-gradient',
				
				'type'      => 'checkbox',
				
				'priority'	=> 4,
				
				
			) 
		) 
	);
	
	$wp_customize->add_setting( 'header-type',array('sanitize_callback' => 'sanitize_text_field','default' => 'standard'));

	$wp_customize->add_control( 'header-type', array(

			'label'    => __('Header Behavior', 'somnium'),

	      	'section'  => 'fixed-header',
			
			'type' => 'select',
			
			'choices'  => array(
			 
				'standard' => __('Standard Fixed','somnium'),
			
				'scrollUp'  => __('Displayed on scroll up','somnium'),
				
				
			),

	      	'settings' => 'header-type',

			'priority'    => 5,

	));
	
	
	$wp_customize->add_section( 'pr-mode' , array(

			'title'       => __( 'Presentation Mode', 'somnium' ),

    	  	'priority'    => 5,
			
			'panel'  => 'page-pan',
			

	));
	
	$wp_customize->add_setting('pr-enable',array('default'  => 0,'sanitize_callback' => 'wp_filter_nohtml_kses',));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize,'pr-enable',
        array(
				
				'label'		=> __( 'Enable Presentation Mode', 'somnium' ),
				
				'section'	=> 'pr-mode',
				
				'settings'	=> 'pr-enable',
				
				'type'      => 'checkbox',
				
				'priority'	=> 4,
				
				
			) 
		) 
	);
	$wp_customize->add_setting('pr-autoplay',array('default'  => 0,'sanitize_callback' => 'wp_filter_nohtml_kses',));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize,'pr-autoplay',
        array(
				
				'label'		=> __( 'Enable Autoplay', 'somnium' ),
				
				'section'	=> 'pr-mode',
				
				'settings'	=> 'pr-autoplay',
				
				'type'      => 'checkbox',
				
				'priority'	=> 4,
				
				
			) 
		) 
	);
	
	$wp_customize->add_setting( 'pr-ap-time', array('sanitize_callback' => 'sanitize_text_field', 'default' => 5000));

	$wp_customize->add_control(  'pr-ap-time', array(

	      	'label'    => __('Autoplay Time', 'somnium' ), 
			
			'description' => __( 'Time in miliseconds', 'somnium' ),

	      	'section'  => 'pr-mode',

	      	'settings' => 'pr-ap-time',

			'priority'    => 5,
			
			'type' => 'number',
			

	));
	 
	$wp_customize->add_setting( 'pr-ap-time-delay', array('sanitize_callback' => 'sanitize_text_field', 'default' => 10000));

	$wp_customize->add_control(  'pr-ap-time-delay', array(

	      	'label'    => __('Delay Time', 'somnium' ), 
			
			'description' => __( 'Delay after mouse wheel movement before restarting autoplay', 'somnium' ),

	      	'section'  => 'pr-mode',

	      	'settings' => 'pr-ap-time-delay',

			'priority'    => 5,
			
			'type' => 'number',
			

	));
	
	$wp_customize->add_setting('pr-scroll',array('default'  => 1,'sanitize_callback' => 'wp_filter_nohtml_kses',));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize,'pr-scroll',
        array(
				
				'label'		=> __( 'Scroll by slides', 'somnium' ),
				
				'description' => __( 'Enables auto scrolling', 'somnium' ),
				
				'section'	=> 'pr-mode',
				
				'settings'	=> 'pr-scroll',
				
				'type'      => 'checkbox',
				
				'priority'	=> 6,
				
				
			) 
		) 
	);
	
	$wp_customize->add_setting('pr-menu',array('default'  => 1,'sanitize_callback' => 'wp_filter_nohtml_kses',));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize,'pr-menu',
        array(
				
				'label'		=> __( 'Display Point Navigation', 'somnium' ),
				
				'description' => __( 'Navigation on the right side of screen', 'somnium' ),
				
				'section'	=> 'pr-mode',
				
				'settings'	=> 'pr-menu',
				
				'type'      => 'checkbox',
				
				'priority'	=> 6,
				
				
			) 
		) 
	);
	
	$wp_customize->add_setting('pr-anim-reset',array('default'  => 1,'sanitize_callback' => 'wp_filter_nohtml_kses',));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize,'pr-anim-reset',
        array(
				
				'label'		=> __( 'Reset ScrollReveal Animations', 'somnium' ),
				
				'description' => __( 'Reset animation for autoplay', 'somnium' ),
				
				'section'	=> 'pr-mode',
				
				'settings'	=> 'pr-anim-reset',
				
				'type'      => 'checkbox',
				
				'priority'	=> 5,
				
				
			) 
		) 
	);
	
	
	$wp_customize->add_setting( 'pr-slide-time', array('sanitize_callback' => 'sanitize_text_field', 'default' => 500));

	$wp_customize->add_control(  'pr-slide-time', array(

	      	'label'    => __('Animation time between slides', 'somnium' ), 
			
			'description' => __( 'Time in miliseconds', 'somnium' ),

	      	'section'  => 'pr-mode',

	      	'settings' => 'pr-slide-time',

			'priority'    => 5,
			
			'type' => 'number',
			

	));
	
	$wp_customize->add_setting('pr-controls',array('default'  => 0,'sanitize_callback' => 'wp_filter_nohtml_kses',));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize,'pr-controls',
        array(
				
				'label'		=> __( 'Display Controls', 'somnium' ),
				
				'description' => __( 'Display Stop/Play buttons publicly', 'somnium' ),
				
				'section'	=> 'pr-mode',
				
				'settings'	=> 'pr-controls',
				
				'type'      => 'checkbox',
				
				'priority'	=> 5,
				
				
			) 
		) 
	);
	
	$wp_customize->add_setting('pr-custom-key',array('default'  => 0,'sanitize_callback' => 'wp_filter_nohtml_kses',));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize,'pr-custom-key',
        array(
				
				'label'		=> __( 'Custom keyboard navigation', 'somnium' ),
				
				'description' => __( 'Navigate between sections by left/right arrow', 'somnium' ),
				
				'section'	=> 'pr-mode',
				
				'settings'	=> 'pr-custom-key',
				
				'type'      => 'checkbox',
				
				'priority'	=> 5,
				
				
			) 
		) 
	);
	

}
add_action( 'customize_register', 'sm_customizer_register' );


function somnium_advanced_css(){
	echo'<style type="text/css">';
	$page_width = get_theme_mod('page-width','wide');
	
	$width=1170;
	if($page_width == 'standard'){$width=1170;}
	else if($page_width == 'wide'){$width=1380;}
	else if($page_width == 'narrow'){$width=960;}
	
	echo'#fixed-header-inner, .content-sidebar, .footer_cont, .container{
		max-width:'.$width.'px;
	}';
	if ($width<=1170){
		echo'@media (min-width: 1200px){
			.container {
				width: '.$width.'px;
			}
		}';
	}else{
		echo'@media (min-width: 1400px){
			.container {
				width: '.$width.'px;
			}
		}';
	}
	echo'body{
		background-color:'.get_theme_mod('body-bc').';
	}
	.whitTr a, .whitTr{
		color:'.get_theme_mod('header-highlight-color-top').' !important;
		
		}
	#fixed-header.whitTr li a:hover, #fixed-header-menu.whitTr .current a{
		border-color: '.get_theme_mod('header-highlight-color-top').' !important;
	}
	#fixed-header, #fixed-header a {
		color:'.get_theme_mod('header-highlight-color').';
		}

	#fixed-header li a:hover, #fixed-header-menu .current a{
		border: 1px solid '.get_theme_mod('header-highlight-color').';
		}

	@media (max-width:780px) { 
		#fixed-header-menu li a{ 
			color: '.get_theme_mod('header-highlight-color').' !important;
		}
	}

	.social_author > li, .postX-sticky, .article-sticky, .post_ln:hover, #primary .date, .site-content .date, .page-numbers:hover, .page-numbers.current, .wid-post .date_wid, .date_wid, button, input[type="button"], input[type="reset"], input[type="submit"]{ 
		background-color:'.get_theme_mod('content-highlight-color').';
	}
		
	.page-numbers, a:focus, a:hover, .latest_posts_ul a{
		color:'.get_theme_mod('content-highlight-color').';
	}
	.srcfi::-webkit-input-placeholder{
		color:'.get_theme_mod('content-highlight-color').';
	}
	.srcfi:-moz-placeholder{
		color:'.get_theme_mod('content-highlight-color').';
	}
	
	.srcfi:-ms-input-placeholder{
		color:'.get_theme_mod('content-highlight-color').';
	}
	
	.srcbt,#srcdv, #fixed-header-menu .sub-menu, .page-numbers, .srcinput{
		border-color:'.get_theme_mod('content-highlight-color').';
	}
	.highlight-border{
		border-color:'.get_theme_mod('content-highlight-color').' !important;
	}
	
	::selection {
		background: '.get_theme_mod('selection-background-color').';
		color:'.get_theme_mod('selection-color').';
	}
	::-moz-selection {
		background: '.get_theme_mod('selection-background-color').';
		color:'.get_theme_mod('selection-color').';
	}
	
	@media (max-width: 991px){
		#fixed-header-menu-image-div {
			background-color:'.get_theme_mod('content-highlight-color').';
		}
	}
	
	
	button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover{
		background-color:'.get_theme_mod('content-highlight-color-darker').';
	}


	.btt-cta, .cta_tit, .ref-but {
		color: '.get_theme_mod('content-text-on-image-color').';
	}

	.ref-but{ 
		border: 2px solid '.get_theme_mod('content-text-on-image-color').';
		}

	#fixed-header {
		background-color:'.get_theme_mod('header-background-color').';
		}
		
	@media (max-width:780px) {
		#fixed-header-menu {
			background-color: '.get_theme_mod('header-background-color').';
			}  
	}

	.custom-button:hover, .ref-but:hover, .btt-cta:hover, .custom-button:hover, .inner {    
		background-color: '.get_theme_mod('content-highlight-color-transparent').';
	}		
			
	.footer_class{    
		background: '.get_theme_mod('footer-background-color').';
		}		
		
	.footer_class,  .footer_widgets li a:hover, .footer_widgets li a{    
			color: '.get_theme_mod('footer-text-color').';
		}	
		
	.footer_widgets li a:hover, .footer_widgets li a{ 		
		border: 1px solid '.get_theme_mod('footer-text-color').';
		}

	';
	$padding=get_theme_mod('classic-padding', 100);
	echo'
		@media screen and (min-width: 991px) {
		.article-classic article{
				padding-left:'.$padding.'px;
				padding-right:'.$padding.'px;
			}
		}';
		
	
	$slHeight=get_theme_mod('slider-height',100);
	$slMn = ((intval($slHeight))/2)-10; 
	$slMg = ((intval($slHeight))/2)-5; 
	echo'
	@media screen and (min-width: 991px) {
		.slider-title{
			margin-top:'.$slMn.'vh;
		}
		
		.button-hoSec{
			height:'.$slHeight.'vh;
		}
		
		.slider-custom{
			height:'.$slHeight.'vh;
		}
		
		.cst-button{
			margin-top:'.$slMg.'vh;
		}
	}
	@media screen and (max-width: 991px) {
		.slider-title{
			margin-top:35vh;
		}
	
		.button-hoSec{
			height:100vh;
		}
		
		.slider-custom{
			height:100vh;
		}
		.cst-button{
			margin-top:45vh;
		}
	}
	@media screen and (max-height: 400px){
		.slider-title {
			margin-top: 25vh;
		}
	}
	';
	
	
	
	
	echo'</style>';
}

function include_fotns(){
		$header_font=get_theme_mod('font');
		$header_font2=get_theme_mod('font2');
		$header_font3=get_theme_mod('font3');
		$header_font4=get_theme_mod('font4');
		echo (!sm_NullEmpty($header_font)&& $header_font != "none" ?"<link href='https://fonts.googleapis.com/css?family=".$header_font."&subset=latin-ext,latin' rel='stylesheet' type='text/css'>" : "");
		echo (!sm_NullEmpty($header_font2)&& $header_font2 != "none" ?"<link href='https://fonts.googleapis.com/css?family=".$header_font2."&subset=latin-ext,latin' rel='stylesheet' type='text/css'>" : "");
		echo (!sm_NullEmpty($header_font3)&& $header_font3 != "none" ?"<link href='https://fonts.googleapis.com/css?family=".$header_font3."&subset=latin-ext,latin' rel='stylesheet' type='text/css'>" : "");
		echo (!sm_NullEmpty($header_font4)&& $header_font4 != "none" ?"<link href='https://fonts.googleapis.com/css?family=".$header_font4."&subset=latin-ext,latin' rel='stylesheet' type='text/css'>" : "");
	}
add_action( 'wp_head', 'include_fotns');





function generate_js()
	{
        echo'<script type="text/javascript">';
			echo'jQuery(window).ready(function(){';
			if(get_theme_mod('fixed-header-menu-choice','1')== '1'){
				echo'if(jQuery("#fixed-header-menu").length > 0){';
				echo"var htmlToPaste = '<li id=\"menu-item-PREPENDED\" class=\"menu-item menu-item-type-custom menu-item-object-custom menu-item-PREPENDED\"><a href=\"' +location.protocol + '//' + location.host + '/' + '#slider-custom\" style=\"padding-left: 75.13px; padding-right: 75.13px;\">About</a></li>';";
				echo"jQuery('#fixed-header-menu').prepend(htmlToPaste);}";
			}
			echo'});';
         echo'</script>';
}
add_action( 'wp_head', 'generate_js', 100);



function generate_css()
	{
        echo' <style type="text/css">';
            
			if(get_theme_mod('fixed-header-menu-choice','1')== '1'){
			echo'#fixed-header-menu > .menu-item:nth-child(1) {display:none !important;}';
			}
         echo'</style>';
}
add_action( 'wp_head', 'generate_css');

function loadVar(){
	
	$header_type=get_theme_mod('header-type');
	
	$slider_display=get_theme_mod('slider-display',1);
	
	$slider_time=get_theme_mod('slider-time',7000);
	
	$header_gradient=get_theme_mod('fixed-header-gradient',0);
	
	$scroll_top = get_theme_mod('scroll_top','select-yes');
	
	$pr_enable = get_theme_mod('pr-enable',0);
	
	$pr_autoplay = get_theme_mod('pr-autoplay',0);
	
	$pr_ap_time = get_theme_mod('pr-ap-time',5000);
	
	$pr_ap_time_delay = get_theme_mod('pr-ap-time-delay',10000);
	
	$pr_menu = get_theme_mod('pr-menu',1);
	
	$pr_scroll = get_theme_mod('pr-scroll',1);
	
	$pr_anim_reset = get_theme_mod('pr-anim-reset',1);
	
	$pr_slide_time = get_theme_mod('pr-slide-time',500);
	
	$pr_controls = get_theme_mod('pr-controls',0);
	
	$pr_custom_key = get_theme_mod('pr-custom-key',0);
	
	
	
	
	wp_localize_script('main-script', 'customizer', array(
	
		'slider_time' => $slider_time,
		
		'header_type'=> $header_type, 
		
		'slider_display' => $slider_display,
		
		'header_gradient'=> $header_gradient,
		
		'scroll_top' => $scroll_top,
		
		'pr_enable' => $pr_enable,
		
		'pr_autoplay' => $pr_autoplay,
		
		'pr_ap_time' => $pr_ap_time,
		
		'pr_ap_time_delay' => $pr_ap_time_delay,
		
		'pr_menu' => $pr_menu, 
		
		'pr_scroll' => $pr_scroll, 
		
		'pr_anim_reset' => $pr_anim_reset, 
		
		'pr_slide_time' => $pr_slide_time,
		
		'pr_controls' => $pr_controls,
		
		'pr_custom_key' => $pr_custom_key,
		
	));
}
add_action('wp_enqueue_scripts', 'loadVar');
