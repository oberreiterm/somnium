<?php

class sl_wid extends WP_Widget {

	function __construct() {
		parent::__construct('sl_wid', __('Somnium: Slide Widget', 'somnium'), 
		array( 'description' => __( 'Adds slide to slider.', 'somnium' ), ) );
	}

	public function widget( $args, $instance ) {
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}
		if(!isset($main)){
			$main = array('','','','','','','','','','','','','');
		}
		echo $args['before_widget']; 
		if(sm_NullEmpty($main[6])){$bckS=sm_call_gradient_placeholder();}else{$bckS = 'background-image:url('.$main[6].')';}
		echo'<div class="cst-sl" style="'.$bckS.'">';
		if('on' == $instance['in10']){
			$checkb = 'contr';
		}else{$checkb = '';} 
		echo'<div class="cst-sl-inner '.$checkb.'">';
		echo'<h1 style="color:'.$main[3].'" class="slider-title"><span>'.$main[0].'</span></h1>
				<h3 style="color:'.$main[5].'"  class="slider-descr"><span>'.$main[4].'</span></h3>';
				if($main[7] !=''){
					echo'<div class="buttons">
						<a href="'.$main[9].'" class=" custom-button" style="color:'.$main[8].'; border-color:'.$main[8].'">'.$main[7].'</a>
					</div>';
				}
			echo'</div></div>';					
	}		

	public function form( $instance ) {
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}

		if(!isset($main)){
			$main = array('','','','','','','','','','','','','');
		}
		
		sm_fieldProto('Title:',$this->get_field_id( 'in0' ),$this->get_field_name( 'in0' ),$main[0]);

		sm_fieldProtoColorPicker('Title Color',$this->get_field_id( 'in3' ),$this->get_field_name( 'in3' ),$main[3]);
		
		sm_fieldProto('Description',$this->get_field_id( 'in4' ),$this->get_field_name( 'in4' ),$main[4]);
		
		sm_fieldProtoColorPicker('Description Color',$this->get_field_id( 'in5' ),$this->get_field_name( 'in5' ),$main[5]);
		
		sm_fieldProtoImageUpload('Background Image',$this->get_field_id( 'in6' ),$this->get_field_name( 'in6' ),$main[6]);
		
		sm_fieldProtoCheckbox('Display Contrasting Layer',$this->get_field_id( 'in10' ),$this->get_field_name( 'in10' ),$main[10]);
		
		sm_fieldProto('Button Title',$this->get_field_id( 'in7' ),$this->get_field_name( 'in7' ),$main[7]);
		
		sm_fieldProtoColorPicker('Button Color',$this->get_field_id( 'in8' ),$this->get_field_name( 'in8' ),$main[8]);
		
		sm_fieldProto('Button URL',$this->get_field_id( 'in9' ),$this->get_field_name( 'in9' ),$main[9]);

	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$number=11;
		for($i=0;$i<$number;$i++){
			$instance['in'.$i ] = strip_tags($new_instance['in'.$i]);		
		}
		return $instance;
	}
	
} 

function sl_wid_load_widget() {
	register_widget( 'sl_wid' );
}
add_action( 'widgets_init', 'sl_wid_load_widget' );






class html_vid_wid extends WP_Widget {

	function __construct() {
		parent::__construct('html_vid_wid', __('Somnium: Video Slide Widget', 'somnium'), 
		array( 'description' => __( 'Adds slide capable of HTML5 videos (WebM, MP4, OGG) and Youtube Embed Videos.', 'somnium' ), ) );
	}

	public function widget( $args, $instance ) {
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}
		if(!isset($main)){
			$main = array('','','','','','','','','','','','','');
		}
		echo $args['before_widget'];
		if(isMobile() == false && 'on' == $instance['in2'] || isMobile() == true && 'on' == $instance['in1']  ){
			echo'<div  class="cst-sl " >';
			if('on' == $instance['in19']){
				$checkb = 'contr';
			}else{$checkb = '';} 
			echo'<div class="cst-sl-inner '.$checkb.'">';
			echo'<div class="cst-sl-inner cst-sl-html5" style="background-image:url('.$main[6].')">
				<h1 style="color:'.$main[3].'" class="slider-title"><span>'.$main[0].'</span></h1>
				<h3 style="color:'.$main[5].'"  class="slider-descr"><span>'.$main[4].'</span></h3>';
				if($main[7] !=''){
					echo'<div class="buttons">
					<a href="'.$main[9].'" class=" custom-button " style="color:'.$main[8].'; border-color:'.$main[8].'">'.$main[7].'</a>
				</div>';
				}	
			echo'</div>
			<video class="html5vid" autoplay muted loop poster="'.$main[10].'">';
				if( !empty($main[11]) ): echo'<source src="'.$main[11].'" type="video/webm">';endif; 
				if( !empty($main[12]) ): echo'<source src="'.$main[12].'" type="video/mp4">';endif;
				if( !empty($main[13]) ): echo'<source src="'.$main[13].'" type="video/ogg">';endif;
			echo'</video>';	
			if( !empty($main[14]) ){
				echo'<iframe class="'; 
				if( $main[18] == '16:9'):echo'v16by9';endif;
				if( $main[18] == '2.35:1'):echo'v235';endif;
				if( $main[18] == '4:3'):echo'v4by3';endif;
				echo' html5vid yt_video" id="ytplayer"  src="https://www.youtube.com/embed/'.$main[14].'?';

				if ('on' == $instance['in15']){echo'loop=1';}
				else {echo'loop=0';}

				echo'&vq=';

				if( $main[17] == '360p'){echo'medium';}
				else if ( $main[17] == '480p'){echo'large';}
				else if ( $main[17] == '720p'){echo'hd720p';}
				else if ( $main[17] == '1080p'){echo'hd1080p';}

				echo'&autoplay=1&controls=0&iv_load_policy=3&';

				if ('on' == $instance['in16']){echo'enablejsapi=1';}
				else {echo'enablejsapi=0';}
				echo'&playlist='.$main[14].'" frameborder="0" ></iframe>';
			}
			echo'</div></div>';
		}//isMobile	
	}
			
	public function form( $instance ) {
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}
		if(!isset($main)){
			$main = array('','','','','','','','','','','','','','','','','','','','','','','','','','');
		}
		sm_fieldProto('Title:',$this->get_field_id( 'in0' ),$this->get_field_name( 'in0' ),$main[0]);

		sm_fieldProtoCheckbox('Show on mobile?',$this->get_field_id( 'in1' ),$this->get_field_name( 'in1' ),$main[1]);

		sm_fieldProtoCheckbox('Show on desktop?',$this->get_field_id( 'in2' ),$this->get_field_name( 'in2' ),$main[2]);

		sm_fieldProtoColorPicker('Title Color',$this->get_field_id( 'in3' ),$this->get_field_name( 'in3' ),$main[3]);
		
		sm_fieldProto('Description',$this->get_field_id( 'in4' ),$this->get_field_name( 'in4' ),$main[4]);
		
		sm_fieldProtoColorPicker('Description Color',$this->get_field_id( 'in5' ),$this->get_field_name( 'in5' ),$main[5]);
		
		sm_fieldProtoImageUpload('Background Image',$this->get_field_id( 'in6' ),$this->get_field_name( 'in6' ),$main[6]);
		
		sm_fieldProtoCheckbox('Display Contrasting Layer',$this->get_field_id( 'in19' ),$this->get_field_name( 'in19' ),$main[19]);
		
		sm_fieldProto('Button Title',$this->get_field_id( 'in7' ),$this->get_field_name( 'in7' ),$main[7]);
		
		sm_fieldProtoColorPicker('Button Color',$this->get_field_id( 'in8' ),$this->get_field_name( 'in8' ),$main[8]);
		
		sm_fieldProto('Button URL',$this->get_field_id( 'in9' ),$this->get_field_name( 'in9' ),$main[9]);
		
		echo'<h2>';_e( 'Video','somnium' );echo'</h2>';
		echo'<h4>'; _e( 'Choose One or More Video Formats','somnium' ); echo'</h4>';
		echo'<p>';_e( 'Fields with Undesired Video Formats Leave Blank','somnium' );echo'</p>';
		
		sm_fieldProtoImageUpload('First Frame of the Video (HTML)',$this->get_field_id( 'in10' ),$this->get_field_name( 'in10' ),$main[10]);
		
		sm_fieldProto('WebM Video URL',$this->get_field_id( 'in11' ),$this->get_field_name( 'in11' ),$main[11]);
		
		sm_fieldProto('MP4 Video URL',$this->get_field_id( 'in12' ),$this->get_field_name( 'in12' ),$main[12]);
		
		sm_fieldProto('OGG Video URL',$this->get_field_id( 'in13' ),$this->get_field_name( 'in13' ),$main[13]);
		
		echo'<h2>'; _e( 'Youtube','somnium' ); echo' </h2>';
		
		sm_fieldProtoDes('Unique Youtube Video Code',$this->get_field_id( 'in14' ),$this->get_field_name( 'in14' ),$main[14],'For Example (Input the Bold Section): youtube.com/watch?v=<b>cbut2K6zvJY</b></p>');
		
		sm_fieldProtoCheckbox('Loop Video?',$this->get_field_id( 'in15' ),$this->get_field_name( 'in15' ),$main[15]);
		
		sm_fieldProtoCheckbox('Mute Video?',$this->get_field_id( 'in16' ),$this->get_field_name( 'in16' ),$main[16]);
		
		sm_fieldProtoSelection('Quality Settings',$this->get_field_id( 'in17' ),$this->get_field_name( 'in17' ),$main[17],array('360p', '480p', '720p', '1080p'));
		
		sm_fieldProtoSelection('Aspect Ratio of YT Video',$this->get_field_id( 'in18' ),$this->get_field_name( 'in18' ),$main[18],array('16:9', '2.35:1', '4:3'));

	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$number=20;
		for($i=0;$i<$number;$i++){
			$instance['in'.$i ] = strip_tags($new_instance['in'.$i]);		
		}
		return $instance;
	}
	
}

function html_vid_wid_load_widget() {
	register_widget( 'html_vid_wid' );
}
add_action( 'widgets_init', 'html_vid_wid_load_widget' );


class sl_q_wid extends WP_Widget {

	function __construct() {
		parent::__construct('sl_q_wid', __('Somnium: Slider Post Widget', 'somnium'), 
		array( 'description' => __( 'Adds slide which dynamically displays recent post.', 'somnium' ), ) );
	}

	public function widget( $args, $instance ) {
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}
		if(!isset($main)){
			$main = array('','','','','','','','','','','','','');
		}
		echo $args['before_widget'];
		if(''==$main[5]){$main[5]=1;}
		if(''==$main[3]){$main[3]='Explore';}
		$main[5]--;
		$args = array(
			'post_type' => 'post',
			'cat' => $main[6],
			'offset'=> $main[5],
		);	
		// The Query
		$the_query = new WP_Query( $args );
		$the_query2 = new WP_Query( $args );
		// The Loop
		if ( $the_query->have_posts() ) {	
			$the_query->the_post();
			if(sm_NullEmpty($main[7])){
				if(has_post_thumbnail()){
					$img = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), array(1920, 1080) , false, ''  );
					echo '<div  class="cst-sl" style="background-image:url('. $img[0] . ')">';
				}
				else{
					echo '<div  class="cst-sl" style="'.sm_call_gradient_placeholder().'">';
				}
			}else{
				echo '<div  class="cst-sl" style="background-image:url('. $main[7] . ')">';
			}
			if('on' == $instance['in8']){
				$checkb = 'contr';
			}else{$checkb = '';} 
			echo'<div class="cst-sl-inner '.$checkb.'">';
			echo'<h1 style="color:'.$main[0].'" class="slider-title"><span>' . get_the_title() . '</span></h1>';
			echo'<h3 style="color:'.$main[1].'"  class="slider-descr"><span>';
			echo sm_field_excerpt(get_the_ID() , get_the_excerpt(), $main[2]) .'</span></h3>
			<div class="buttons"><a href="' . get_permalink() . '" class=" custom-button " style="color:'.$main[4].'; border-color:'.$main[4].'">'.$main[3].'</a></div></div>';
			echo'</div>'; 
		}			
	}
		
	public function form( $instance ) {
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}
		if(!isset($main)){
			$main = array('','','','','','','','','','','','','');
		}		
		sm_fieldProtoColorPicker('Title Color:',$this->get_field_id( 'in0' ),$this->get_field_name( 'in0' ),$main[0]);
			
		sm_fieldProtoColorPicker('Description Color:',$this->get_field_id( 'in1' ),$this->get_field_name( 'in1' ),$main[1]);
			
		sm_fieldProtoNumber('Number of Description Excerpt Words:',$this->get_field_id( 'in2' ),$this->get_field_name( 'in2' ),$main[2]);
			
		sm_fieldProto('Button Title:',$this->get_field_id( 'in3' ),$this->get_field_name( 'in3' ),$main[3]);
			
		sm_fieldProtoColorPicker('Button Color:',$this->get_field_id( 'in4' ),$this->get_field_name( 'in4' ),$main[4]);
		
		sm_fieldProtoCheckbox('Display Contrasting Layer',$this->get_field_id( 'in8' ),$this->get_field_name( 'in8' ),$main[8]);
		
		sm_fieldProtoImageUploadDes('Optional Background Image',$this->get_field_id( 'in7' ),$this->get_field_name( 'in7' ),$main[7],'If left blank, thumbnail will be used');
			
		sm_fieldProtoNumberDes('Number in a sequence (descending order):',$this->get_field_id( 'in5' ),$this->get_field_name( 'in5' ),$main[5],'1 = first post, 2 = second post');
		
		sm_fieldProtoCategoryDropdown('Select a category',$this->get_field_name( 'in6' ),$main[6],'name');
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

function sl_q_wid_load_widget() {
	register_widget( 'sl_q_wid' );
}
add_action( 'widgets_init', 'sl_q_wid_load_widget' );
