<?php
class gm_wid extends WP_Widget {

	function __construct() {
		parent::__construct('gm_wid', __('Somnium: Google Maps Section', 'somnium'), 
		array( 'description' => __( 'Adds section with Google Maps.', 'somnium' ), ) );
	}

	public function widget( $args, $instance ) {
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}
		echo $args['before_widget'];
		if (!filter_var($main[5], FILTER_VALIDATE_URL) === false) {
			$main[5] = 'url('.$main[5].')';
		}
		
		echo'<section class="section section_wid" '; if(!NullEmpty($main[1])){echo 'id="'.$main[1].'"';} echo' style="background:'.$main[5].'">';
		if(isset($main[9]) && $main[9] !== ''){
			echo " <script async defer src='https://maps.googleapis.com/maps/api/js?key=".$main[9]."&callback=initMap' type='text/javascript'></script>";
			if($instance['in15'] == "on"){
				echo'<script>
				(function($){
					function lel(){
						var h = $(window).outerHeight();
						var u = 50;
						var i=0;
						if($("#wpadminbar").length>0){
							i= $("#wpadminbar").innerHeight();
						}
						var x = h - $(".container_gmaps > .section-header").outerHeight() -u -i;
						$("#gmaps").css({"height":x}); 
					}
					$(window).ready(function(){lel();});
				})(jQuery);
				</script>';
			}
		}
				echo'<div class="container_gmaps" >
					<div class="section-header">
						<h2 class="white-text" style="color:'.$main[2].'">'.$main[0].'</h2>';
		if( !empty($main[3]) ): echo'<h6 class="white-text" style="color:'.$main[4].'">'.$main[3].'</h6>';endif;echo'</div>';
		if(NullEmpty($main[12])){$main[12]='Standard';}
		echo'<div id="gmaps" data-maps="'.$main[6].'/'.$main[7].'/'.$main[8].'" data-maps-hue="'.$main[10].'" '; 
		if(!NullEmpty($main[13]) && !NullEmpty($main[14]) && $instance['in15'] != "on"){echo' style="height:'.$main[13].$main[14].'" ';}
		echo'data-maps-saturation="'.$main[11].'" data-map-type="'.$main[12].'"></div>';
		echo '</div></section>';				
	}
	public function form( $instance ) {
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}

		fieldProto('Title',$this->get_field_id( 'in0' ),$this->get_field_name( 'in0' ),$main[0]);
		
		fieldProtoColorPicker('Title Color:',$this->get_field_id( 'in2' ),$this->get_field_name( 'in2' ),$main[2]);
		
		fieldProto('ID (Sticky Header Target):',$this->get_field_id( 'in1' ),$this->get_field_name( 'in1' ),$main[1]);
			
		fieldProto('Subtitle:',$this->get_field_id( 'in3' ),$this->get_field_name( 'in3' ),$main[3]);
			
		fieldProtoColorPicker('Subtitle Color:',$this->get_field_id( 'in4' ),$this->get_field_name( 'in4' ),$main[4]);
			
		fieldProtoImageUpload('Background:',$this->get_field_id( 'in5' ),$this->get_field_name( 'in5' ),$main[5], 'Input any Background');
		
		fieldProtoCheckboxDes('Full Height (100vh)',$this->get_field_id( 'in15' ),$this->get_field_name( 'in15' ),$main[15],'This options adjust height to fit within browser window');
		
		fieldProtoSelectUnits('Height:',$this->get_field_id( 'in13' ),$this->get_field_name( 'in13' ),$main[13],$this->get_field_id( 'in14' ),$this->get_field_name( 'in14' ),$main[14]);
		
		echo'<h2>'; _e('Maps Settigs','somnium');echo'</h2>';
		
		fieldProtoDes('Google Maps JavaScript API key',$this->get_field_id( 'in9' ),$this->get_field_name( 'in9' ),$main[9],'More info here: https://developers.google.com/maps/documentation/javascript/get-api-key');
		
		fieldProto('Latitude of center:',$this->get_field_id( 'in6' ),$this->get_field_name( 'in6' ),$main[6]);
		
		fieldProto('Longitude of center:',$this->get_field_id( 'in7' ),$this->get_field_name( 'in7' ),$main[7]);
			
		fieldProtoNumber('Zoom:',$this->get_field_id( 'in8' ),$this->get_field_name( 'in8' ),$main[8]);
		
		fieldProtoColorPicker('Hue of Map:',$this->get_field_id( 'in10' ),$this->get_field_name( 'in10' ),$main[10]);
		
		fieldProtoNumber('Saturation (min -100, max 100):',$this->get_field_id( 'in11' ),$this->get_field_name( 'in11' ),$main[11], 1, -100, 100);
		
		fieldProtoSelection('Map Type',$this->get_field_id( 'in12' ),$this->get_field_name( 'in12' ),$main[12] ,array('Standard','Hybrid','Satellite','Terrain'));
					
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$number=16;
		for($i=0;$i<$number;$i++){
			$instance['in'.$i ] = strip_tags($new_instance['in'.$i]);		
		}
		
		return $instance;
	}
	
}

function gm_wid_load_widget() {
	register_widget( 'gm_wid' );
}
add_action( 'widgets_init', 'gm_wid_load_widget' );




class icn_wid extends WP_Widget {

	function __construct() {
		parent::__construct('icn_wid', __('Somnium: Text-Icon Widget', 'somnium'), 
		array( 'description' => __( 'Adds widget with icon and text.', 'somnium' ), ) );
	}

	public function widget( $args, $instance ) {
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}
		echo $args['before_widget'];
	
		callDefault($main[12], 40);
		callDefault($main[13], 'px');
		callDefault($main[4], 40);
		callDefault($main[8], 'px');
		callDefault($main[14], 14);
		callDefault($main[15], 'px');
		$selRes='';
		switch ($main[7]){
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
		echo'<div class="iconCont '.$selRes.'" data-sr="'.$main[5].'" data-svg-color="'.$main[9].'">';
		if(!NullEmpty($main[16])){
			echo'<a href="'.$main[16].'">';
		}
		switch ($main[11]){
			case 'Super Title':
				echo'<h1 style="font-size:'.$main[4].$main[8].'">'.$main[3].'</h1>';
				break;
			case 'Font Awesome Icon':
				echo'<div class="icon-widget-center"><i style="font-size:'.$main[4].$main[8].'; color:'.$main[9].'" class="fa '.$main[10].'"></i></div>';
				break;
			case 'SVG Icon':
				echo'<img alt="iconWid" class="iconWid svg" '; if(!NullEmpty($main[2])){echo'src="'.$main[2].'"';}else{echo'src="#"';} echo'/>';
				break;
			case 'Image':
				echo'<img alt="iconWid" class="iconWid " '; if(!NullEmpty($main[2])){echo'src="'.$main[2].'"';}else{echo'src="#"';} echo'/>';
				break;
		}	
		echo'<hr class="spinHrSpacer"><div class="underspin"><h1 style="font-size:'.$main[12].$main[13].'">'.$main[0].'</h1><p style="font-size:'.$main[14].$main[15].'">'.$main[1].'</p></div>'.(!NullEmpty($main[16]) ? '</a>' : '').'</div>';		
	}

	public function form( $instance ) {
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}

		fieldProto('Title',$this->get_field_id( 'in0' ),$this->get_field_name( 'in0' ),$main[0]);
			
		fieldProtoTextArea('Text',$this->get_field_id( 'in1' ),$this->get_field_name( 'in1' ),$main[1]);
		
		fieldProtoSelectUnits('Title Size:',$this->get_field_id( 'in12' ),$this->get_field_name( 'in12' ),$main[12],$this->get_field_id( 'in13' ),$this->get_field_name( 'in13' ),$main[13]);
		
		fieldProtoSelectUnits('Text Size:',$this->get_field_id( 'in14' ),$this->get_field_name( 'in14' ),$main[14],$this->get_field_id( 'in15' ),$this->get_field_name( 'in15' ),$main[15]);
		
		fieldProto('Link:',$this->get_field_id( 'in16' ),$this->get_field_name( 'in16' ),$main[16]);
			
		fieldProtoIconSelection('Icon Select',$this->get_field_id( 'in11' ),$this->get_field_name( 'in11' ),$main[11],array('Image','SVG Icon','Font Awesome Icon', 'Super Title'));
		
		echo"<script>
	
		function expand(tit,tit_tit,tit_sit,tit_siz,tit_uns,svg,svg_tit,img,img_tit,img_upl,faw,faw_tit){
			
			var sl = jQuery('.icon-select-".$this->get_field_id( 'in11' )." option:selected').val();
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
			var tit = jQuery('#".$this->get_field_id( 'in3' )."');
			var tit_tit = jQuery('h3[for=".$this->get_field_id( 'in3' )."]');
			
			var tit_sit = jQuery('h3[for=".$this->get_field_id( 'in4' )."]');
			var tit_siz = jQuery('#".$this->get_field_id( 'in4' )."');
			
			var tit_uns = jQuery('#".$this->get_field_id( 'in8' )."');
			
			var svg = jQuery('#".$this->get_field_id( 'in9' )."');
			var svg_tit = jQuery('h3[for=".$this->get_field_id( 'in9' )."]');
			
			var img = jQuery('#".$this->get_field_id( 'in2' )."');
			var img_tit = jQuery('h3[for=".$this->get_field_id( 'in2' )."]');
			var img_upl = jQuery('h3[for=".$this->get_field_id( 'in2' )."]').siblings('.upload_image_button');
			
			var faw = jQuery('#".$this->get_field_id( 'in10' )."');
			var faw_tit = jQuery('h3[for=".$this->get_field_id( 'in10' )."]');
			
			hide(tit,tit_tit,tit_sit,tit_siz,tit_uns,svg,svg_tit,img,img_tit,img_upl,faw,faw_tit);
			
			jQuery('#trigger-add-menu".$this->get_field_id( 'in0' )."').click(function(){
				expand(tit,tit_tit,tit_sit,tit_siz,tit_uns,svg,svg_tit,img,img_tit,img_upl,faw,faw_tit);
				
			})
		})
		</script>
		
		<div id='trigger-add-menu".$this->get_field_id( 'in0' )."' class='button-primary' >".__('Show Settings','somnium')."</div>";
		
		fieldProtoImageUpload('Icon:',$this->get_field_id( 'in2' ),$this->get_field_name( 'in2' ),$main[2]);
	
		fieldProtoColorPicker('Color:',$this->get_field_id( 'in9' ),$this->get_field_name( 'in9' ),$main[9]);
		
		fieldProtoIconPicker('Select Icon:',$this->get_field_id( 'in10' ),$this->get_field_name( 'in10' ),$main[10]);
		
		fieldProto('Super Title:',$this->get_field_id( 'in3' ),$this->get_field_name( 'in3' ),$main[3]);
			
		fieldProtoSelectUnits('Size:',$this->get_field_id( 'in4' ),$this->get_field_name( 'in4' ),$main[4],$this->get_field_id( 'in8' ),$this->get_field_name( 'in8' ),$main[8]);
		
			
		fieldProtoScrollRevealDes('Scroll Reveal:',$this->get_field_id( 'in5' ),$this->get_field_name( 'in5' ),$main[5], 'For Example: enter left and move 300px over 1s after 0.5s');
			
		fieldProtoSelection('Width of This Widget',$this->get_field_id( 'in7' ),$this->get_field_name( 'in7' ),$main[7] ,array('8%','17%','25%','33%','50%','100%'));
	}
		
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$number=18;
		for($i=0;$i<$number;$i++){
			$instance['in'.$i ] = strip_tags($new_instance['in'.$i]);		
		}
		return $instance;
	}
		
} 

function icn_wid_load_widget() {
	register_widget( 'icn_wid' );
}
add_action( 'widgets_init', 'icn_wid_load_widget' );






class qr_wid extends WP_Widget {

	function __construct() {
		parent::__construct('qr_wid', __('Somnium: Query Widget', 'somnium'), 
		array( 'description' => __( 'Adds widget for displaying recent posts in compact format.', 'somnium' ), ) );
	}


	public function widget( $args, $instance ) {
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}
		echo $args['before_widget'];
		$args = array(
			'post_type' => 'post',
			'cat' => $main[5],
		);	
		if($main[1]>=8){$main[1] = 8;}
		if( $main[4] == '50%'){echo'<div class="query-widget col-md-6">';}
		else if( $main[4] == '100%'){echo'<div class="query-widget col-md-12">';}
		if(isset($main[0])){echo'<h1>'. $main[0] .'</h1>';	}
		// The Query
		$the_query = new WP_Query( $args );
		$the_query2 = new WP_Query( $args );
		// The Loop
		if ( $the_query->have_posts() ) {
			echo'<div class="wid-query col-md-12" data-sr="'.$main[3].'">';
				echo'<div class="col-md-8 col-sm-8 wid-news">';
					$the_query->the_post();
					echo '<div '; post_class(array('wid-first', 'wid-post')); echo'><a href="' . get_permalink() . '"><p>' . get_the_title() . '</p><div class="date_wid"><div class="day_d">'.get_the_date('j').'</div><div class="month_d">'.get_the_date('M').'</div></div></a><img alt="triangle" class="wid-img-poi" src="'.get_template_directory_uri().'/images/triangle.png'.'"></div>';
					$xcnt =0;
					while ( $the_query->have_posts() && $xcnt < ($main[1]-1)) {
						$the_query->the_post();
						echo '<div '; post_class('wid-post'); echo'><a href="' . get_permalink() . '"><p>' . get_the_title() . '</p><div class="date_wid"><div class="day_d">'.get_the_date('j').'</div><div class="month_d">'.get_the_date('M').'</div></div></a><img alt="triangle" class="wid-img-poi" src="'.get_template_directory_uri().'/images/triangle.png'.'"></div>';
						$xcnt++;
					}
				echo '</div>';
				echo'<div class="col-md-4 col-sm-4 wid-images">';
					$xcnt =0;
					while ( $the_query2->have_posts() && $xcnt < $main[1]) {
						$the_query2->the_post();
						if(has_post_thumbnail()){
							$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),  array( 432,360 ), false, ''  );		
							echo'<div class="wid-post-img '.$main[1].'" style="background-image:url('. $img[0] . ')">';
						}
						else{
							echo'<div class="wid-post-img '.$main[1].'" style="background-image:url('.get_template_directory_uri().'/images/placeholder.png'.')">';
						}
						echo'<a href="' . get_permalink() . '"><div class="wid-post-dsc"><p>' . field_excerpt(get_the_ID() , get_the_content(), $main[2]) . '</p></div></a></div>';
					$xcnt++;
					}
				echo'</div>
			</div>
		</div>';
			}else {echo'<h1>No Posts Found!</h1>';}
		// Restore Data 
		wp_reset_postdata();			
	}

	public function form( $instance ) {
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}
		fieldProto('Title',$this->get_field_id( 'in0' ),$this->get_field_name( 'in0' ),$main[0]);
			
		fieldProtoNumberDes('Number of news:',$this->get_field_id( 'in1' ),$this->get_field_name( 'in1' ),$main[1], 'Maximum 8 news', 1, 0, 8);
			
		fieldProtoNumber('Number of Description Excerpt Words:',$this->get_field_id( 'in2' ),$this->get_field_name( 'in2' ),$main[2]);
			
		fieldProtoScrollRevealDes('Scroll Reveal:',$this->get_field_id( 'in3' ),$this->get_field_name( 'in3' ),$main[3],'For Example: enter left and move 300px over 1s after 0.5s');
			
		fieldProtoSelection('Width of This Widget',$this->get_field_id( 'in4' ),$this->get_field_name( 'in4' ),$main[4] ,array('50%','100%'));
		
		fieldProtoCategoryDropdown('Category selection', $this->get_field_name( 'in5' ), $main[5],'name');
			
	}
		
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$number=6;
		for($i=0;$i<$number;$i++){
			$instance['in'.$i ] = strip_tags($new_instance['in'.$i]);		
		}
		return $instance;
	}
	
}

function qr_wid_load_widget() {
	register_widget( 'qr_wid' );
}
add_action( 'widgets_init', 'qr_wid_load_widget' );
