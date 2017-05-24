<?php

class sc_wid extends WP_Widget {
	
	function __construct() {
		parent::__construct('sc_wid', __('Somnium: Section Widget', 'somnium'), 
		array( 'description' => __( 'Creates section in which widgets can be inserted.', 'somnium' ), ) );
	}


	public function widget( $args, $instance ) {
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}
		echo $args['before_widget'];
		if( empty($main[5])){
			$main[5] = null;
		}
		if( empty($main[6])){
			$main[6] = null;
		}
		if( empty($main[1])){
			$main[1] = null;
		}
		if($main[5]==''){
			$cont=$main[6];
		}else{
			$cont=$main[5];
			if (!filter_var($main[5], FILTER_VALIDATE_URL) === false) {
				$cont = 'url('.$main[5].')';
			}	
		}
		echo'<section class="section_wid section" '; if(!sm_NullEmpty($main[1])){echo 'id="'.$main[1].'"';}  if(!sm_NullEmpty($cont)){echo ' style="background:'.$cont.'"';} 
		echo'><div class="container">';
					if( !empty($main[0])){echo'<div class="section-header"><h2 class="white-text" style="color:'.$main[2].'">'.$main[0].'</h2>';
						if( !empty($main[3])){echo'<h6 class="white-text wt-subtitle" style="color:'.$main[4].'">'.$main[3].'</h6>';}
						echo'</div>';
					}
					echo'<div class="row" >
							<div class="col-md-12">';		
	}

	public function form( $instance ) {
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}
		if(!isset($main)){
			$main = array('','','','','','','','','','','');
		}
		sm_fieldProto('Title',$this->get_field_id( 'in0' ),$this->get_field_name( 'in0' ),$main[0]);
		
		sm_fieldProtoColorPicker('Title Color:',$this->get_field_id( 'in2' ),$this->get_field_name( 'in2' ),$main[2]);
		
		sm_fieldProto('ID (Sticky Header Target):',$this->get_field_id( 'in1' ),$this->get_field_name( 'in1' ),$main[1]);
			
		sm_fieldProto('Subtitle:',$this->get_field_id( 'in3' ),$this->get_field_name( 'in3' ),$main[3]);
			
		sm_fieldProtoColorPicker('Subtitle Color:',$this->get_field_id( 'in4' ),$this->get_field_name( 'in4' ),$main[4]);
			
		sm_fieldProtoImageUploadDes('Background Image:',$this->get_field_id( 'in5' ),$this->get_field_name( 'in5' ),$main[5],'To use color, empty this field.');
		
		sm_fieldProtoColorPicker('Background Color:',$this->get_field_id( 'in6' ),$this->get_field_name( 'in6' ),$main[6]);
	}
		
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$number=7;
		for($i=0;$i<$number;$i++){
			$instance['in'.$i ] = strip_tags($new_instance['in'.$i]);		
		}
		return $instance;
	}
		
}

function sc_wid_load_widget() {
	register_widget( 'sc_wid' );
}
add_action( 'widgets_init', 'sc_wid_load_widget' );


class sc_end extends WP_Widget {

	function __construct() {
		parent::__construct('sc_end', __('Somnium: Section End Widget', 'somnium'), 
		array( 'description' => __( 'Closes previously opened section with Section Widget.', 'somnium' ), ));
	}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		echo '</div></div></div></section>';
	}
		
	public function form( $instance ) {
	}
		
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		return $instance;
	}		
} 

function sc_end_load_widget() {
	register_widget( 'sc_end' );
}
add_action( 'widgets_init', 'sc_end_load_widget' );




class header_search extends WP_Widget {

	function __construct() {
		parent::__construct('header_search', __('Somnium: Search Form for Header', 'somnium'), 
		array( 'description' => __( 'Adds search to fixed header.', 'somnium' ), ));
	}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		add_theme_support( 'html5', array( 'search-form' ) );
		echo'
		<div class=search-form-header>
				<form class="srcfm search-form" role="search" method="get" action="'.home_url( '/' ).'">
					
						<div id="srcdv">
							<input type="search" class="srcfi search-field" placeholder="'.__( 'Search', 'somnium' ).'" value="'.get_search_query().'" name="s" title="'.__( 'Search for:', 'somnium' ).'" />
							
								<button type="submit" class="srcbt search-submit" >
									<img class="srcim" alt="search" src="'.get_template_directory_uri().'/images/search.png">
								</button>
							
						</div>
					
				</form>
			</div>
			<button type="submit" class="srcinput search" >
				<img class="srcim" alt="search_button" src="'.get_template_directory_uri().'/images/search.png">
			</button>';
	}
		
	public function form( $instance ) {
	}
		
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		return $instance;
	}		
} 

function header_search_load_widget() {
	register_widget( 'header_search' );
}
add_action( 'widgets_init', 'header_search_load_widget' );





class postX extends WP_Widget {

	function __construct() {
		parent::__construct('postX', __('Somnium: Post Widget n.2', 'somnium'), 
		array( 'description' => __( 'Displays Post Widget.', 'somnium' ), ));
	}

	public function widget( $args, $instance ) {
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}
		if(!isset($main)){
			$main = array('','','',2,0,'','','');
		}

		echo $args['before_widget'];
	
		$args = array(
			'post_type' => 'post',
			'cat' => $main[7],
			'offset' => $main[4],
			
		);	
		$the_query = new WP_Query( $args );
		$i=1;
		$evOd;
		while ( $the_query->have_posts() && $i<=$main[3] ) {
			$i++;
			if($i % 2 == 0){$evOd='clearfix0';}else{$evOd='clearfix1';}
			$the_query->the_post();
			if($i % 2 == 0){echo'<article id="post-'; echo the_ID(); echo'" data-sr="'.$main[5].'" '; post_class(array('postX', 'col-md-6', 'col-sm-6',$evOd)); echo'><div class="postXinner">';}
			else{echo'<article id="post-'; echo the_ID(); echo'" data-sr="'.$main[6].'" '; post_class(array('postX', 'col-md-6', 'col-sm-6',$evOd)); echo'><div class="postXinner">';}
			if ( has_post_thumbnail()){
				echo'<div class="postX-img-wrap col-md-5">
				<a href="'; echo the_permalink(); echo'" title="'; echo the_title_attribute(); echo'" >';
				the_post_thumbnail(array(253,253)); 
				echo'</a></div>
				<div class="postX-text col-md-7">';
			}else{
				echo'<div class="postX-img-wrap  col-md-5" >
				<a href="'; echo the_permalink(); echo'" title="'; echo the_title_attribute(); echo'" >
				 <div style="'.sm_call_gradient_placeholder().'" class="post-gradient"></div>';
				echo'</a></div>
				<div class="postX-text col-md-7">';
			}
			echo'<div class="date postX-date">
								<h2>'.get_the_date('j').'</h2>
								<p>'.get_the_date('M, Y').'</p>
							</div>';
			echo'<div class="postX-sticky">
								<i class="postXicon fa fa-thumb-tack"></i>
							</div>';

		echo'<div class="list-post-top">

		<header class="entry-header-cat">

			<h2 class="postX-title"><a href="'; echo the_permalink(); echo'" rel="bookmark">'; echo the_title(); echo'</a></h2>';

			if ( 'post' == get_post_type() ){

				echo'<div class="entry-meta-cat meta-tooltips">';
					//post_meta();
					//; the_author(); echo
					sm_post_meta_short();
				echo'</div>';

			}
			
			echo'<div class="postX-entry-summary">';
			echo sm_field_excerpt(get_the_ID() , get_the_excerpt(), $main[2] ,'... <a class="moretag" href="'. get_permalink(get_the_ID()) . '">'.__('[More]','somnium').'</a>');
				
		echo'</div>';
		echo'</header>';
		echo'</div>
			</div><div class="clearfix"></div></div> 
		<div class="clearfix"></div></article>';
	}
	echo'<div class="clearfix"></div>';
	wp_reset_postdata();
	}
		
	public function form( $instance ) {
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}
	
		if(!isset($main)){
			$main = array('','','','','','','','','','','');
		}
		
		sm_fieldProtoNumber('Excerpt lenght in words:',$this->get_field_id( 'in2' ),$this->get_field_name( 'in2' ),$main[2]);
			
		sm_fieldProtoNumber('How many?',$this->get_field_id( 'in3' ),$this->get_field_name( 'in3' ),$main[3]);	
		
		sm_fieldProtoNumber('Posts offset',$this->get_field_id( 'in4' ),$this->get_field_name( 'in4' ),$main[4]);
			
		sm_fieldProtoScrollRevealDes('Scroll Reveal for Left Side',$this->get_field_id( 'in5' ),$this->get_field_name( 'in5' ),$main[5],'For Example: enter left and move 300px over 1s after 0.5s');
		
		sm_fieldProtoScrollRevealDes('Scroll Reveal for Right Side',$this->get_field_id( 'in6' ),$this->get_field_name( 'in6' ),$main[6],'For Example: enter left and move 300px over 1s after 0.5s');
		
		sm_fieldProtoCategoryDropdown('Select a category', $this->get_field_name( 'in7' ), $main[7], 'name');
	
		
	}	
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$number=9;
		for($i=0;$i<$number;$i++){
			$instance['in'.$i ] = strip_tags($new_instance['in'.$i]);		
		}
		
		return $instance;
	}		
} 

function postX_load_widget() {
	register_widget( 'postX' );
}
add_action( 'widgets_init', 'postX_load_widget' );



class boxX extends WP_Widget {

	function __construct() {
		parent::__construct('boxX', __('Somnium: Box Widget', 'somnium'), 
		array( 'description' => __( 'Displays customizable box with icon.', 'somnium' ), ));
	}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}
		
		switch ($main[8]){
			case '8%':
				$selRes = 'col-md-1';
				break;
			case '17%':
				$selRes = 'col-md-2';
				break;
			case '25%':
				$selRes = 'col-md-3';
				break;
			case '33%':
				$selRes = 'col-md-4';
				break;
			case '50%':
				$selRes = 'col-md-6';
				break;
			case '100%':
				$selRes = 'col-md-12';
				break;
		}
		
		switch ($main[15]){
			case '0%':
				$rightOffset = '';
				break;
			case '8%':
				$leftOffset = 'col-md-offset-1';
				break;
			case '17%':
				$leftOffset = 'col-md-offset-2';
				break;
			case '25%':
				$leftOffset = 'col-md-offset-3';
				break;
			case '33%':
				$leftOffset = 'col-md-offset-4';
				break;
			case '42%':
				$leftOffset = 'col-md-offset-5';
				break;
			case '50%':
				$leftOffset = 'col-md-offset-6';
				break;
			case '58%':
				$leftOffset = 'col-md-offset-7';
				break;
			case '66%':
				$leftOffset = 'col-md-offset-8';
				break;
			case '75%':
				$leftOffset = 'col-md-offset-9';
				break;
			case '83%':
				$leftOffset = 'col-md-offset-10';
				break;
			case '92%':
				$leftOffset = 'col-md-offset-11';
				break;
			case '100%':
				$leftOffset = 'col-md-offset-12';
				break;
		}
		
		switch ($main[16]){
			case '0%':
				$rightOffset = '';
				break;
			case '8%':
				$rightOffset = 'col-md-offset-right-1';
				break;
			case '17%':
				$rightOffset = 'col-md-offset-right-2';
				break;
			case '25%':
				$rightOffset = 'col-md-offset-right-3';
				break;
			case '33%':
				$rightOffset = 'col-md-offset-right-4';
				break;
			case '42%':
				$rightOffset = 'col-md-offset-right-5';
				break;
			case '50%':
				$rightOffset = 'col-md-offset-right-6';
				break;
			case '58%':
				$rightOffset = 'col-md-offset-right-7';
				break;
			case '66%':
				$rightOffset = 'col-md-offset-right-8';
				break;
			case '75%':
				$rightOffset = 'col-md-offset-right-9';
				break;
			case '83%':
				$rightOffset = 'col-md-offset-right-10';
				break;
			case '92%':
				$rightOffset = 'col-md-offset-right-11';
				break;
			case '100%':
				$rightOffset = 'col-md-offset-right-12';
				break;
		}
		
		
		echo'<div class="boxX  '.$selRes.' col-sm-6 '.$leftOffset.' '.$rightOffset.'" data-sr="'.$main[9].'" style="border-radius:'.$main[11].$main[12].';">';
			if(isset($main[21])){echo'<a href="'.$main[21].'" >';}
			echo'<div class="boxXinner" style="background:'.$main[10].'; padding:'.$main[19].$main[20].' '.$main[17].$main[18].' '.$main[19].$main[20].' '.$main[17].$main[18].'" ><div class="boxXicon" data-svg-color="'.$main[2].'">';
			
			
				
				if( $main[7] == 'Font Awesome Icon'){echo'<div class="icon-widget-center"><i style="font-size:'.$main[5].$main[6].'; color:'.$main[2].'" class="boxXi fa '.$main[3].'"></i></div>';}
				
				else if( $main[7] == 'SVG Icon' ){echo'<img alt="iconWid" class="iconWid svg" '; if(!sm_NullEmpty($main[1])){echo'src="'.$main[1].'"';}else{echo'src="#"';} echo'/>';}
				
				else if( $main[7] == 'Image'){echo'<img alt="iconWid" class="iconWid " '; if(!sm_NullEmpty($main[1])){echo'src="'.$main[1].'"';}else{echo'src="#"';} echo'/>';}	
					
			echo'</div>
			<div class="boxXtitle"><h1 class="boxXtit" style="color:'.$main[13].'; font-size:'.$main[22].$main[23].'">'.$main[14].'</h1></div></div>';
			if(isset($main[21])){echo'</a>';}
		echo'</div>';
		
	}
		
	public function form( $instance ) {
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}
		if(!isset($main)){
			$main = array('','','','','','','','','','','','','','','','','','','','','','','','','','','','');
		}
		
		sm_fieldProtoIconSelection('Icon Select',$this->get_field_id( 'in7' ),$this->get_field_name( 'in7' ),$main[7],array('Image','SVG Icon','Font Awesome Icon'));
		echo"<script>
	
		
		function expand(tit,tit_tit,tit_sit,tit_siz,tit_uns,svg,svg_tit,img,img_tit,img_upl,faw,faw_tit){
			
			
			var sl = jQuery('.icon-select-".$this->get_field_id( 'in7' )." option:selected').val();
			console.log(sl);
			switch(sl){
				case 'Image':
					hide(tit,tit_tit,tit_sit,tit_siz,tit_uns,svg,svg_tit,img,img_tit,img_upl,faw,faw_tit);
					img.toggle('fast');
						img_tit.toggle('fast');
						img_upl.toggle('fast');
					break;
				
				case 'SVG Icon':
					hide(tit,tit_tit,tit_sit,tit_siz,tit_uns,svg,svg_tit,img,img_tit,img_upl,faw,faw_tit);
					img.toggle('fast');
						img_tit.toggle('fast');
						img_upl.toggle('fast');
					svg.toggle('fast');
						svg_tit.toggle('fast');
					break;
				
				case 'Font Awesome Icon':
					hide(tit,tit_tit,tit_sit,tit_siz,tit_uns,svg,svg_tit,img,img_tit,img_upl,faw,faw_tit);
					faw.toggle('fast');
						faw_tit.toggle('fast');
					tit_sit.toggle('fast');
						tit_siz.toggle('fast');
						tit_uns.toggle('fast');
					svg.toggle('fast');
						svg_tit.toggle('fast');
					break;
				
				case 'Super Title':
					hide(tit,tit_tit,tit_sit,tit_siz,tit_uns,svg,svg_tit,img,img_tit,img_upl,faw,faw_tit);
					tit.toggle('fast');
						tit_tit.toggle('fast');
					tit_sit.toggle('fast');
						tit_siz.toggle('fast');
						tit_uns.toggle('fast');
					svg.toggle('fast');
						svg_tit.toggle('fast');
					break;
			}
		}
		
		function hide(tit,tit_tit,tit_sit,tit_siz,tit_uns,svg,svg_tit,img,img_tit,img_upl,faw,faw_tit){
			tit.css({'display':'none'});
				tit_tit.css({'display':'none'});
			tit_sit.css({'display':'none'});
				tit_siz.css({'display':'none'});
				tit_uns.css({'display':'none'});
			svg.css({'display':'none'});
				svg_tit.css({'display':'none'});
			img.css({'display':'none'});
				img_tit.css({'display':'none'});
				img_upl.css({'display':'none'});
			faw.css({'display':'none'});
				faw_tit.css({'display':'none'});
		}
		
		
		jQuery(document).ready(function(){
			var tit = jQuery('#".$this->get_field_id( 'in4' )."');
			var tit_tit = jQuery('h3[for=".$this->get_field_id( 'in4' )."]');
			
			var tit_sit = jQuery('h3[for=".$this->get_field_id( 'in5' )."]');
			var tit_siz = jQuery('#".$this->get_field_id( 'in5' )."');
			
			var tit_uns = jQuery('#".$this->get_field_id( 'in6' )."');
			
			var svg = jQuery('#".$this->get_field_id( 'in2' )."');
			var svg_tit = jQuery('h3[for=".$this->get_field_id( 'in2' )."]');
			
			var img = jQuery('#".$this->get_field_id( 'in1' )."');
			var img_tit = jQuery('h3[for=".$this->get_field_id( 'in1' )."]');
			var img_upl = jQuery('h3[for=".$this->get_field_id( 'in2' )."]').siblings('.upload_image_button');
			
			var faw = jQuery('#".$this->get_field_id( 'in3' )."');
			var faw_tit = jQuery('h3[for=".$this->get_field_id( 'in3' )."]');
			
			hide(tit,tit_tit,tit_sit,tit_siz,tit_uns,svg,svg_tit,img,img_tit,img_upl,faw,faw_tit);
			
			jQuery('#trigger-add-menu".$this->get_field_id( 'in0' )."').click(function(){
				expand(tit,tit_tit,tit_sit,tit_siz,tit_uns,svg,svg_tit,img,img_tit,img_upl,faw,faw_tit);
				
			})
		})
		</script>
		
		<div id='trigger-add-menu".$this->get_field_id( 'in0' )."' class='button-primary' >".__('Show Settings','somnium')."</div>";
		
		sm_fieldProtoImageUpload('Icon:',$this->get_field_id( 'in1' ),$this->get_field_name( 'in1' ),$main[1]);
	
		sm_fieldProtoColorPicker('Color:',$this->get_field_id( 'in2' ),$this->get_field_name( 'in2' ),$main[2]);
		
		sm_fieldProtoIconPicker('Select Icon:',$this->get_field_id( 'in3' ),$this->get_field_name( 'in3' ),$main[3]);
		
		sm_fieldProto('Super Title:',$this->get_field_id( 'in4' ),$this->get_field_name( 'in4' ),$main[4]);
			
		sm_fieldProtoSelectUnits('Size:',$this->get_field_id( 'in5' ),$this->get_field_name( 'in5' ),$main[5],$this->get_field_id( 'in6' ),$this->get_field_name( 'in6' ),$main[6]);
		
		sm_fieldProtoColorPicker('Background Color:',$this->get_field_id( 'in10' ),$this->get_field_name( 'in10' ),$main[10]);
		
		sm_fieldProtoSelectUnits('Border radius',$this->get_field_id( 'in11' ),$this->get_field_name( 'in11' ),$main[11],$this->get_field_id( 'in12' ),$this->get_field_name( 'in12' ),$main[12]);
		
		sm_fieldProto('Title:',$this->get_field_id( 'in14' ),$this->get_field_name( 'in14' ),$main[14]);
		
		sm_fieldProtoColorPicker('Title Color:',$this->get_field_id( 'in13' ),$this->get_field_name( 'in13' ),$main[13]);
		
		sm_fieldProtoSelectUnits('Title Size',$this->get_field_id( 'in22' ),$this->get_field_name( 'in22' ),$main[22],$this->get_field_id( 'in23' ),$this->get_field_name( 'in23' ),$main[23]);
		
		sm_fieldProto('Link:',$this->get_field_id( 'in21' ),$this->get_field_name( 'in21' ),$main[21]);
		
		sm_fieldProtoSelectUnits('Padding of left/right',$this->get_field_id( 'in17' ),$this->get_field_name( 'in17' ),$main[17],$this->get_field_id( 'in18' ),$this->get_field_name( 'in18' ),$main[18]);
		
		sm_fieldProtoSelectUnits('Padding of top/bottom',$this->get_field_id( 'in19' ),$this->get_field_name( 'in19' ),$main[19],$this->get_field_id( 'in20' ),$this->get_field_name( 'in20' ),$main[20]);	
		
		sm_fieldProtoScrollRevealDes('Scroll Reveal:',$this->get_field_id( 'in9' ),$this->get_field_name( 'in9' ),$main[9], 'For Example: enter left and move 300px over 1s after 0.5s');
		
		sm_fieldProtoSelection('Width of This Widget',$this->get_field_id( 'in8' ),$this->get_field_name( 'in8' ),$main[8] ,array('8%','17%','25%','33%','50%','100%'));
		
		sm_fieldProtoSelection('Offset on left',$this->get_field_id( 'in15' ),$this->get_field_name( 'in15' ),$main[15],array('0%','8%','17%','25%','33%','42%','50%','58%','66%','75%','83%','92%','100%'));
		
		sm_fieldProtoSelection('Offset on right',$this->get_field_id( 'in16' ),$this->get_field_name( 'in16' ),$main[16],array('0%','8%','17%','25%','33%','42%','50%','58%','66%','75%','83%','92%','100%'));
		
	}
		
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$number=24;
		for($i=0;$i<$number;$i++){
			$instance['in'.$i ] = strip_tags($new_instance['in'.$i]);		
		}
		return $instance;
	}		
} 

function boxX_load_widget() {
	register_widget( 'boxX' );
}
add_action( 'widgets_init', 'boxX_load_widget' );




















