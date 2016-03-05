<?php
class post_box extends WP_Widget {

	function __construct() {
		parent::__construct('post_box', __('Somnium: Post Widget', 'somnium'), 
		array( 'description' => __( 'Display number of post in boxes.', 'somnium' ), ) );
	}

	public function widget( $args, $instance ) {
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}
		global $post;
		echo $args['before_widget'];
			 if( $main[6] == '25%'){$width = 'col-md-3 col-sm-6';}
		else if( $main[6] == '8%'){$width = 'col-md-1 col-sm-6';}
		else if( $main[6] == '17%'){$width = 'col-md-2 col-sm-6';}
		else if( $main[6] == '33%'){$width = 'col-md-4 col-sm-6';}
		else if( $main[6] == '42%'){$width = 'col-md-5 col-sm-6';}
		else if( $main[6] == '50%'){$width = 'col-md-6 col-sm-6';}
		else if( $main[6] == '58%'){$width = 'col-md-7 col-sm-6';}
		else if( $main[6] == '66%'){$width = 'col-md-8 col-sm-6';}
		else if( $main[6] == '75%'){$width = 'col-md-9 col-sm-6';}
		else if( $main[6] == '83%'){$width = 'col-md-10 col-sm-6';}
		else if( $main[6] == '92%'){$width = 'col-md-11 col-sm-6';}
		else if( $main[6] == '100%'){$width = 'col-md-12 col-sm-6';}	
		$args = array(
			'post_type' => 'post',
			'cat' => $main[7],
			'offset'=> $main[4],
		);
		$the_query = new WP_Query( $args );
		for($i=0;$the_query->have_posts() && $i<$main[3];$i++){
			$the_query->the_post();
			if ($main[8]=='No' && $i==0 ){echo'<div '; post_class(array('postw_item',$width)); echo' data-sr="'.$main[5].'">';}
			else if ($main[8]=='Yes' && $i==0 ) {echo'<div style="clear:left" '; post_class(array('postw_item',$width)); echo'  data-sr="'.$main[5].'">';}
			else {echo'<div '; post_class(array('postw_item',$width)); echo'  data-sr="'.$main[5].'">';}
			
			if(has_post_thumbnail() && intval ($main[6]) >= 50){
				$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),  array( 900,300 ), false, ''  );		
				echo'<a href="'.get_permalink().'"><div class="postw_item_inner" style="background-image:url('. $img[0] . ')">';
			}else if(has_post_thumbnail() && intval ($main[6]) < 50){
				$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),  array( 255,300 ), false, ''  );		
				echo'<a href="'.get_permalink().'"><div class="postw_item_inner" style="background-image:url('. $img[0] . ')">';
			}else{
				echo'<a href="'.get_permalink().'"><div class="postw_item_inner" style="'.call_gradient_placeholder().'">';
			}
			echo '<div class="postw_title">
				<h1><span>'.get_the_title().'</span></h1>
			</div>
			<div class="postw_descr"><i class="postw_icon_sticky  fa fa-thumb-tack"></i>
				<div class="postw_descr_inner"><span>';
				echo field_excerpt(get_the_ID() , get_the_content(), $main[2]);
				echo'</span>
			</div></div></div></a></div>';
		}
	}
		
	public function form( $instance ) {
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];	
		}
		fieldProtoNumber('Excerpt lenght in words:',$this->get_field_id( 'in2' ),$this->get_field_name( 'in2' ),$main[2]);
			
		fieldProtoNumber('How many?',$this->get_field_id( 'in3' ),$this->get_field_name( 'in3' ),$main[3]);	
		
		fieldProtoNumber('Posts offset',$this->get_field_id( 'in4' ),$this->get_field_name( 'in4' ),$main[4]);
		
		fieldProtoSelection('Clear after previous row/widget',$this->get_field_id( 'in8' ),$this->get_field_name( 'in8' ),$main[8],array('Yes','No'));
			
		fieldProtoScrollRevealDes('Scroll Reveal',$this->get_field_id( 'in5' ),$this->get_field_name( 'in5' ),$main[5],'For Example: enter left and move 300px over 1s after 0.5s');
			
		fieldProtoSelection('Width of each post',$this->get_field_id( 'in6' ),$this->get_field_name( 'in6' ),$main[6],array('8%','17%','25%','33%','42%','50%','58%','66%','75%','83%','92%','100%'));
		
		fieldProtoCategoryDropdown('Select a category', $this->get_field_name( 'in7' ) ,$main[7], 'name');
		
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

function post_box_load_widget() {
	register_widget( 'post_box' );
}
add_action( 'widgets_init', 'post_box_load_widget' );





class rowspacer_wid extends WP_Widget {

	function __construct() {
		parent::__construct('rowspacer_wid', __('Somnium: Row break', 'somnium'), 
		array( 'description' => __( '(Optional)In case you want to seperate rows but at the same time keep it in the same section.', 'somnium' ), ) );
	}

	public function widget( $args, $instance ) {
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}
		echo $args['before_widget'];
		echo'<div '; if(!NullEmpty($main[1])){echo 'id="'.$main[1].'"';} echo' class="col-md-12 rowSpacer" style="height:'.$main[0].$main[2].'"></div>';	
	}

	public function form( $instance ) {
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}
		
		fieldProtoSelectUnits('Height',$this->get_field_id( 'in0' ),$this->get_field_name( 'in0' ),$main[0], $this->get_field_id( 'in2' ),$this->get_field_name( 'in2' ),$main[2]);
			
		fieldProto('ID (Optional, target of fixed header):',$this->get_field_id( 'in1' ),$this->get_field_name( 'in1' ),$main[1]);
	}
		
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$number=3;
		for($i=0;$i<$number;$i++){
			$instance['in'.$i ] = strip_tags($new_instance['in'.$i]);		
		}	
		return $instance;
	}
	
}
function rowspacer_wid_load_widget() {
	register_widget( 'rowspacer_wid' );
}
add_action( 'widgets_init', 'rowspacer_wid_load_widget' );


class fbpage_wid extends WP_Widget {

	function __construct() {
		parent::__construct('fbpage_wid', __('Somnium: Facebook Page Plugin', 'somnium'), 
		array( 'description' => __( 'Add your facebook page to sidebar or front page.', 'somnium' ), ) );
	}

	public function widget( $args, $instance ) {
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}
		echo $args['before_widget'];
		
		echo'<div class="facebook_plugin">';
		echo'<div id="fb-root"></div>
			<script>(function(d, s, id) {
				var gt_locale = document.getElementsByTagName("html")[0].getAttribute("lang");
				gt_locale = gt_locale.replace("-", "_");
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/"+gt_locale+"/sdk.js#xfbml=1&version=v2.3";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, "script", "facebook-jssdk"));
			</script>';
		if('on' == $instance['in3']){
			echo'<div class="fb-page like-box" float="true" data-href="'.$main[0].'" data-width="'.$main[5].$main[6].'" data-height="'.$main[1].$main[7].'" data-hide-cover="false"'; if('on' == $instance['in4']){echo'data-show-facepile="true"';}else{echo'data-show-facepile="false"';} if('on' == $instance['in2']){echo'data-show-posts="true"';}else{echo'data-show-posts="false"';}echo'</div>';
		}else{
			echo'<div class="fb-page like-box" float="false" data-href="'.$main[0].'" data-width="'.$main[5].$main[6].'" data-height="'.$main[1].$main[7].'" data-hide-cover="false"'; if('on' == $instance['in4']){echo'data-show-facepile="true"';}else{echo'data-show-facepile="false"';} if('on' == $instance['in2']){echo'data-show-posts="true"';}else{echo'data-show-posts="false"';}echo'</div>';
		}
		echo'</div></div>';
	}
		
	public function form( $instance ) {
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}
		fieldProto('Link of your page:',$this->get_field_id( 'in0' ),$this->get_field_name( 'in0' ),$main[0]);
			
		fieldProtoSelectUnitsDes('Height of the box:',$this->get_field_id( 'in1' ),$this->get_field_name( 'in1' ),$main[1],$this->get_field_id( 'in7' ),$this->get_field_name( 'in7' ),$main[7], 'Default:250px');
			
		fieldProtoSelectUnitsDes('Width of the box:',$this->get_field_id( 'in5' ),$this->get_field_name( 'in5' ),$main[5],$this->get_field_id( 'in6' ),$this->get_field_name( 'in6' ),$main[6],'Default:270px');
			
		fieldProtoCheckbox('Show posts?',$this->get_field_id( 'in2' ),$this->get_field_name( 'in2' ),$main[2]);
			
		fieldProtoCheckbox('Show Faces?',$this->get_field_id( 'in4' ),$this->get_field_name( 'in4' ),$main[4]);
			
		fieldProtoCheckbox('Make it float after the end of sidebar?/Is it in sidebar?',$this->get_field_id( 'in3' ),$this->get_field_name( 'in3' ),$main[3]);
	}
		
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$number=8;
		for($i=0;$i<$number;$i++){
			$instance['in'.$i ] = strip_tags($new_instance['in'.$i]);		
		}	
		return $instance;
	}
}

function fbpage_wid_load_widget() {
	register_widget( 'fbpage_wid' );
}
add_action( 'widgets_init', 'fbpage_wid_load_widget' );




class txtfld_wid extends WP_Widget {

	function __construct() {
		parent::__construct('txtfld_wid', __('Somnium: Text Widget', 'somnium'), 
		array( 'description' => __( 'Resizable widget with title and text.', 'somnium' ), ) );
	}

	public function widget( $args, $instance ) {
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}
		echo $args['before_widget'];
		callDefault($main[7], 40);
		callDefault($main[8], 'px');
		callDefault($main[9], 14);
		callDefault($main[10], 'px');
		
		echo'<div class="section-pad ';
		switch ($main[6]){
			case '25%':
				echo'col-md-3';
				break;
			case '33%':
				echo'col-md-4';
				break;
			case '50%':
				echo'col-md-6';
				break;
			case '66%':
				echo'col-md-8';
				break;
			case '75%':
				echo'col-md-9';
				break;
			case '100%':
				echo'col-md-12';
				break;	
		}
		
		echo'">
		<div class="section-container">
			<div class="col-8-of col-md-12">
				<div class="mop-text section-txt col-md-12" data-sr="'.$main[5].'">';
				if(NullEmpty($main[4])){
					echo'<h2 class="link-title mop-title" style="color:'.$main[2].'">'.$main[0].'</h2>';
					echo'<p style="color:'.$main[3].'">'.$main[1].'<p>';
				}else{
					echo'<a href="'.$main[4].'" ><h2 class="link-title mop-title" style="color:'.$main[2].'">'.$main[0].'</h2></a>';
					echo'<a href="'.$main[4].'" ><p style="color:'.$main[3].'">'.$main[1].'<p></a>';
				}
					
				echo'
				</div>
			</div>
		</div>
		</div>';
		echo $args['after_widget'];
	}
			
	public function form( $instance ) {
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}
		fieldProto('Title:',$this->get_field_id( 'in0' ),$this->get_field_name( 'in0' ),$main[0]);
			
		fieldProtoTextArea('Text:',$this->get_field_id( 'in1' ),$this->get_field_name( 'in1' ),$main[1]);
			
		fieldProtoColorPicker('Title Color:',$this->get_field_id( 'in2' ),$this->get_field_name( 'in2' ),$main[2]);
			
		fieldProtoColorPicker('Text Color:',$this->get_field_id( 'in3' ),$this->get_field_name( 'in3' ),$main[3]);
		
		fieldProtoSelectUnits('Title Size:',$this->get_field_id( 'in7' ),$this->get_field_name( 'in7' ),$main[7],$this->get_field_id( 'in8' ),$this->get_field_name( 'in8' ),$main[8]);
		
		fieldProtoSelectUnits('Text Size:',$this->get_field_id( 'in9' ),$this->get_field_name( 'in9' ),$main[9],$this->get_field_id( 'in10' ),$this->get_field_name( 'in10' ),$main[10]);
			
		fieldProto('Link of This Widget',$this->get_field_id( 'in4' ),$this->get_field_name( 'in4' ),$main[4]);
			
		fieldProtoScrollReveal('Scroll Reveal',$this->get_field_id( 'in5' ),$this->get_field_name( 'in5' ),$main[5]);
		
		fieldProtoSelection('Width of This Widget',$this->get_field_id( 'in6' ),$this->get_field_name( 'in6' ),$main[6],array('25%','33%','50%','66%','75%','100%'));
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

function txtfld_wid_load_widget() {
	register_widget( 'txtfld_wid' );
}
add_action( 'widgets_init', 'txtfld_wid_load_widget' );




/*class proj_wid extends WP_Widget {

	function __construct() {
		parent::__construct('proj_wid', __('Somnium: Project Widget', 'somnium'), 
		array( 'description' => __( 'Display unique element for presenting your projects.', 'somnium' ), ) );
	}

	public function widget( $args, $instance ) {
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}
		echo $args['before_widget'];
		callDefault($main[10], 40);
		callDefault($main[11], 'px');
		callDefault($main[12], 14);
		callDefault($main[13], 'px');

		echo'<div id="section-pad"  class="col-md-6" style="height:'.$main[8].$main[9].'">
				<div class="section-container">
					<a href="'.$main[2].'">
						<div id="col-4-of" class="col-md-6 col-md-offset-3 rnd-bor" data-sr="'.$main[7].'">
							<div class="image-hover-txt" id="mopback" style="background:url('.$main[3].')"></div>';
							//<img id="mopimg" src="'.$main[4].'">	
							switch ($main[14]){
								case 'Super Title':
									echo'<h1 style="font-size:'.$main[20].$main[21].'">'.$main[19].'</h1>';
									break;
								case 'Font Awesome Icon':
									echo'<div class="icon-widget-center"><i style="font-size:'.$main[20].$main[21].'; color:'.$main[17].'" class="fa '.$main[18].'"></i></div>';
									break;
								case 'SVG Icon':
									echo'<img class="iconWid svg" src="'.$main[16].'"/>';
									break;
								case 'Image':
									echo'<img class="iconWid " src="'.$main[16].'"/>';
									break; 
							}	
						echo'</div>
					</a>
					<div id="col-8-of" class="col-md-12">
						<div id="mop-text" class="section-txt col-md-12" data-sr="'.$main[7].'">
							<a href="'.$main[2].'"><h1 class="link-title mop-title" style="color:'.$main[5].'; font-size:'.$main[10].$main[11].'">'.$main[0].'</h1></a>
							<p style="color:'.$main[6].'; font-size:'.$main[12].$main[13].'">'.$main[1].'<p>
						</div>
					</div>
				</div>
			</div>';
			echo $args['after_widget'];
	}
			
	public function form( $instance ) {
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}

		fieldProto('Title',$this->get_field_id( 'in0' ),$this->get_field_name( 'in0' ),$main[0]);
			
		fieldProtoTextArea('Text',$this->get_field_id( 'in1' ),$this->get_field_name( 'in1' ),$main[1]);
		
		fieldProtoSelectUnits('Title Size:',$this->get_field_id( 'in10' ),$this->get_field_name( 'in10' ),$main[10],$this->get_field_id( 'in11' ),$this->get_field_name( 'in11' ),$main[11]);
		
		fieldProtoSelectUnits('Text Size:',$this->get_field_id( 'in12' ),$this->get_field_name( 'in12' ),$main[12],$this->get_field_id( 'in13' ),$this->get_field_name( 'in13' ),$main[13]);
			
		fieldProto('Link of Widget',$this->get_field_id( 'in2' ),$this->get_field_name( 'in2' ),$main[2]);
			
		fieldProtoIconSelection('Icon Select',$this->get_field_id( 'in14' ),$this->get_field_name( 'in14' ),$main[14],array('Image','SVG Icon','Font Awesome Icon', 'Super Title'));
		
		echo"<script>
	
		function expand(tit,tit_tit,tit_sit,tit_siz,tit_uns,svg,svg_tit,img,img_tit,img_upl,faw,faw_tit){
			
			var sl = jQuery('.icon-select-".$this->get_field_id( 'in14' )." option:selected').val();
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
			var tit = jQuery('#".$this->get_field_id( 'in19' )."');
			var tit_tit = jQuery('h3[for=".$this->get_field_id( 'in19' )."]');
			
			var tit_sit = jQuery('h3[for=".$this->get_field_id( 'in20' )."]');
			var tit_siz = jQuery('#".$this->get_field_id( 'in20' )."');
			
			var tit_uns = jQuery('#".$this->get_field_id( 'in21' )."');
			
			var svg = jQuery('#".$this->get_field_id( 'in17' )."');
			var svg_tit = jQuery('h3[for=".$this->get_field_id( 'in17' )."]');
			
			var img = jQuery('#".$this->get_field_id( 'in16' )."');
			var img_tit = jQuery('h3[for=".$this->get_field_id( 'in16' )."]');
			var img_upl = jQuery('.upload_image_button');
			
			var faw = jQuery('#".$this->get_field_id( 'in18' )."');
			var faw_tit = jQuery('h3[for=".$this->get_field_id( 'in18' )."]');
			
			hide(tit,tit_tit,tit_sit,tit_siz,tit_uns,svg,svg_tit,img,img_tit,img_upl,faw,faw_tit);
			
			jQuery('#trigger-add-menu".$this->get_field_id( 'in15' )."').click(function(){
				expand(tit,tit_tit,tit_sit,tit_siz,tit_uns,svg,svg_tit,img,img_tit,img_upl,faw,faw_tit);
				
			});
		});
		</script>
		
		<div id='trigger-add-menu".$this->get_field_id( 'in15' )."' class='button-primary' >".__('Show Settings','somnium')."</div>";
		
		fieldProtoImageUpload('Icon:',$this->get_field_id( 'in16' ),$this->get_field_name( 'in16' ),$main[16]);
	
		fieldProtoColorPicker('Color:',$this->get_field_id( 'in17' ),$this->get_field_name( 'in17' ),$main[17]);
		
		fieldProtoIconPicker('Select Icon:',$this->get_field_id( 'in18' ),$this->get_field_name( 'in18' ),$main[18]);
		
		fieldProto('Super Title:',$this->get_field_id( 'in19' ),$this->get_field_name( 'in19' ),$main[19]);
			
		fieldProtoSelectUnits('Size:',$this->get_field_id( 'in20' ),$this->get_field_name( 'in20' ),$main[20],$this->get_field_id( 'in21' ),$this->get_field_name( 'in21' ),$main[21]);
		
		
		
		fieldProtoIconSelection('Icon Select',$this->get_field_id( 'in22' ),$this->get_field_name( 'in22' ),$main[22],array('Image','SVG Icon','Font Awesome Icon', 'Super Title'));
		
		echo"<script>
	
		function expand(tit,tit_tit,tit_sit,tit_siz,tit_uns,svg,svg_tit,img,img_tit,img_upl,faw,faw_tit){
			
			var sl = jQuery('.icon-select-".$this->get_field_id( 'in22' )." option:selected').val();
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
			var tit = jQuery('#".$this->get_field_id( 'in27' )."');
			var tit_tit = jQuery('h3[for=".$this->get_field_id( 'in27' )."]');
			
			var tit_sit = jQuery('h3[for=".$this->get_field_id( 'in28' )."]');
			var tit_siz = jQuery('#".$this->get_field_id( 'in28' )."');
			
			var tit_uns = jQuery('#".$this->get_field_id( 'in29' )."');
			
			var svg = jQuery('#".$this->get_field_id( 'in25' )."');
			var svg_tit = jQuery('h3[for=".$this->get_field_id( 'in25' )."]');
			
			var img = jQuery('#".$this->get_field_id( 'in24' )."');
			var img_tit = jQuery('h3[for=".$this->get_field_id( 'in24' )."]');
			var img_upl = jQuery('.upload_image_button');
			
			var faw = jQuery('#".$this->get_field_id( 'in26' )."');
			var faw_tit = jQuery('h3[for=".$this->get_field_id( 'in26' )."]');
			
			hide(tit,tit_tit,tit_sit,tit_siz,tit_uns,svg,svg_tit,img,img_tit,img_upl,faw,faw_tit);
			
			jQuery('#trigger-add-menu".$this->get_field_id( 'in23' )."').click(function(){
				expand(tit,tit_tit,tit_sit,tit_siz,tit_uns,svg,svg_tit,img,img_tit,img_upl,faw,faw_tit);
				
			});
		}) ;
		</script>
		
		<div id='trigger-add-menu".$this->get_field_id( 'in23' )."' class='button-primary' >".__('Show Settings','somnium')."</div>";
		
		fieldProtoImageUpload('Icon:',$this->get_field_id( 'in24' ),$this->get_field_name( 'in24' ),$main[24]);
	
		fieldProtoColorPicker('Color:',$this->get_field_id( 'in25' ),$this->get_field_name( 'in25' ),$main[25]);
		
		fieldProtoIconPicker('Select Icon:',$this->get_field_id( 'in26' ),$this->get_field_name( 'in26' ),$main[26]);
		
		fieldProto('Super Title:',$this->get_field_id( 'in27' ),$this->get_field_name( 'in27' ),$main[27]);
			
		fieldProtoSelectUnits('Size:',$this->get_field_id( 'in28' ),$this->get_field_name( 'in28' ),$main[28],$this->get_field_id( 'in29' ),$this->get_field_name( 'in29' ),$main[29]);
		
		
		
		fieldProtoImageUpload('Image on Hover',$this->get_field_id( 'in3' ),$this->get_field_name( 'in3' ),$main[3]);
			
		fieldProtoImageUpload('Image',$this->get_field_id( 'in4' ),$this->get_field_name( 'in4' ),$main[4]);
			
		fieldProtoColorPicker('Title Color',$this->get_field_id( 'in5' ),$this->get_field_name( 'in5' ),$main[5]);
			
		fieldProtoColorPicker('Text Color',$this->get_field_id( 'in6' ),$this->get_field_name( 'in6' ),$main[6]);

		fieldProtoScrollReveal('Scroll Reveal',$this->get_field_id( 'in7' ),$this->get_field_name( 'in7' ),$main[7]);
			
		fieldProtoSelectUnits('Height',$this->get_field_id( 'in8' ),$this->get_field_name( 'in8' ),$main[8],$this->get_field_id( 'in9' ),$this->get_field_name( 'in9' ),$main[9]);
	}
		
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$number=30;
		for($i=0;$i<$number;$i++){
			$instance['in'.$i ] = strip_tags($new_instance['in'.$i]);		
		}
		return $instance;
	}
	
}
function proj_wid_load_widget() {
	register_widget( 'proj_wid' );
}
add_action( 'widgets_init', 'proj_wid_load_widget' );

*/ 




class orb_wid extends WP_Widget {

	function __construct() {
		parent::__construct('orb_wid', __('Somnium: Orbit Widget', 'somnium'), 
		array( 'description' => __( 'Multiple elemensts orbitting a center one.', 'somnium' ), ) );
	}


	public function widget( $args, $instance ) {
		$orb = array ();
		$num = $instance[ 'num' ];	
		callDefault($main[12], 30);
		callDefault($main[13], 'px');
		for ($i=0; $i<$num; $i++){
				$orb[$i] = $instance[ 'orb'.$i ];
				$rad[$i] = $instance[ 'rad'.$i ];
				$img[$i] = $instance[ 'img'.$i ];
				$tit[$i] = $instance[ 'tit'.$i ];
				$txt[$i] = $instance[ 'txt'.$i ];
				$bco[$i] = $instance[ 'bco'.$i ];
				$tco[$i] = $instance[ 'tco'.$i ];
				$tln[$i] = $instance[ 'tln'.$i ];
				
			}
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}
		echo $args['before_widget'];		
		for ($i=0; $i<$num; $i++){
				$orb[$i] =  esc_attr($orb[$i]);
				$rad[$i] =  esc_attr($rad[$i]);
				$img[$i] =  esc_attr($img[$i]);
				$tit[$i] =  esc_attr($tit[$i]);
				$txt[$i] =  esc_attr($txt[$i]);
				$bco[$i] =  esc_attr($bco[$i]);
				$tco[$i] =  esc_attr($tco[$i]);
				$tln[$i] =  esc_attr($tln[$i]);
			}
		if(isMobile() == false && 'on' == $instance['in1'] || isMobile() == true && 'on' == $instance['in0']  ){			
			echo'<div class="framec '; 
			if( $main[8] == '100%'):echo'col-md-12';endif;
			if( $main[8] == '50%'):echo'col-md-6';endif;
			echo'" data-sr="'.$main[10].'">
			<div class="centerC" style="background-color:'.$main[7].'">';
			if (empty($main[9]) == false){
				echo'<img src="'.$main[9].'" />';
			}else{ echo'<h3 style="color:'.$main[6].'; font-size:'.$main[12].$main[13].'">'.$main[5].'</h3>';} 
			echo'</div>
			<div class="orbit_class" data-orbit="'.$main[3].'">';
			for ($i=0; $i<$num; $i++){
				echo'<div class="orbit" data-orbit="'.$i.'s'.$orb[$i].'s'.$rad[$i].'">
						<div class="content_holder" style="background-color:'.$bco[$i].'">';
							if (empty($img[$i]) == false){
							echo'<a href="'.$tln[$i].'"><img id="img'.$i.'" class="content_img" src="'.$img[$i].'" alt="Image" /></a>';
							}
							else {echo'<a href="'.$tln[$i].'"><h3 style="color:'.$tco[$i].'">'.$tit[$i].'</h3><p style="color:'.$tco[$i].'">'.$txt[$i].'</p></a>';}
						echo'</div>
					</div>';	
			}
			echo'</div><div class="line_class">';
			if ('on' == $instance['in4']){
				for ($i=0; $i<$num; $i++){
				echo'<div class="o_line"></div>';
				}
			}
			echo'</div></div>';
		}
	}

	public function form( $instance ) {	
		$num = $instance[ 'num' ];
		for ($i=0; $i<$num; $i++){
			$orb[$i] = $instance[ 'orb'.$i ];
			$rad[$i] = $instance[ 'rad'.$i ];
			$img[$i] = $instance[ 'img'.$i ];
			$tit[$i] = $instance[ 'tit'.$i ];
			$txt[$i] = $instance[ 'txt'.$i ];
			$bco[$i] = $instance[ 'bco'.$i ];
			$tco[$i] = $instance[ 'tco'.$i ];
			$tln[$i] = $instance[ 'tln'.$i ];	
		}
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}
		_e('<h2>General settings</h2>', 'somnium');
			
		fieldProtoCheckbox('Show on Mobile Devices?',$this->get_field_id( 'in0' ),$this->get_field_name( 'in0' ),$main[0]);
			
		fieldProtoCheckbox('Show on Desktop?',$this->get_field_id( 'in1' ),$this->get_field_name( 'in1' ),$main[1]);
			
		fieldProto('Number of Elements',$this->get_field_id( 'num' ),$this->get_field_name( 'num' ),$num);
			
		fieldProtoDes('Elements with Counter Clockwise Spin',$this->get_field_id( 'in3' ),$this->get_field_name( 'in3' ),$main[3],'State numbers seperated with "-"  f.e. "1-3-4-6"');
			
		fieldProtoCheckbox('Include Lines Towards Objects?',$this->get_field_id( 'in4' ),$this->get_field_name( 'in4' ),$main[4]);
			
		fieldProto('Center Title',$this->get_field_id( 'in5' ),$this->get_field_name( 'in5' ),$main[5]);
		
		fieldProtoSelectUnits('Title Size:',$this->get_field_id( 'in12' ),$this->get_field_name( 'in12' ),$main[12],$this->get_field_id( 'in13' ),$this->get_field_name( 'in13' ),$main[13]);
			
		fieldProtoColorPicker('Title Color',$this->get_field_id( 'in6' ),$this->get_field_name( 'in6' ),$main[6]);

		fieldProtoColorPicker('Title Background Color',$this->get_field_id( 'in7' ),$this->get_field_name( 'in7' ),$main[7]);

		fieldProto('Center Image',$this->get_field_id( 'in9' ),$this->get_field_name( 'in9' ),$main[9]);
			
		fieldProtoScrollRevealDes('Scroll Reveal',$this->get_field_id( 'in10' ),$this->get_field_name( 'in10' ),$main[10],'For Example: enter left and move 300px over 1s after 0.5s');
			
		fieldProtoSelection('Width of This Widget',$this->get_field_id( 'in8' ),$this->get_field_name( 'in8' ),$main[8] ,array('50%','100%'));
		
		for ($i=0; $i<$num; $i++){
		
			$iCC =$i +1;
			echo'
			<h3>'; _e('Element n.', 'somnium'); echo $iCC.'</h3>
			<p>
			<label for="'; echo $this->get_field_id( 'orb'.$i ); echo'">'; _e( 'Orbit duration n.', 'somnium' );echo $iCC.'</label> 
			<input class="widefat" id="';echo $this->get_field_id( 'orb'.$i ); echo'" name="'; echo $this->get_field_name( 'orb'.$i ); echo'" type="text" value="';echo esc_attr( $orb[$i] ); echo'" />
			</p>';
			
			echo'<p>
			<label for="'; echo $this->get_field_id( 'rad'.$i ); echo'">'; _e( 'Radius n.' , 'somnium'); echo $iCC.'</label>  
			<input class="widefat" id="';echo $this->get_field_id( 'rad'.$i ); echo'" name="'; echo $this->get_field_name( 'rad'.$i ); echo'" type="text" value="';echo esc_attr( $rad[$i] ); echo'" />
			</p>';
			
			echo'
			<h4>'; _e('Choose Between Image/Title+Text version', 'somnium');echo'</h4>
			<p>
			<label for="'; echo $this->get_field_id( 'img'.$i ); echo'">'; _e( 'Image of n.', 'somnium' ); echo $iCC.'</label> 
			<p>';_e('Leave This Blank, If You want Title/Text Version', 'somnium');echo'</p>
			<input class="widefat" id="';echo $this->get_field_id( 'img'.$i ); echo'" name="'; echo $this->get_field_name( 'img'.$i ); echo'" type="text" value="';echo esc_attr( $img[$i] ); echo'" />
			</p>';
			
			echo'<p>
			<label for="'; echo $this->get_field_id( 'tit'.$i ); echo'">';  _e( 'Title of n.', 'somnium' ); echo $iCC.'</label> 
			<input class="widefat" id="';echo $this->get_field_id( 'tit'.$i ); echo'" name="'; echo $this->get_field_name( 'tit'.$i ); echo'" type="text" value="';echo esc_attr( $tit[$i] ); echo'" />
			</p>';
			
			echo'<p>
			<label for="'; echo $this->get_field_id( 'txt'.$i ); echo'">';  _e( 'Text of n.', 'somnium' ); echo $iCC.'</label> 
			<textarea class="widefat" id="';echo $this->get_field_id( 'txt'.$i ); echo'" name="'; echo $this->get_field_name( 'txt'.$i ); echo'" type="text">'; echo esc_attr( $txt[$i] ); echo'</textarea>
			</p>';
			
			echo'<p>
			<label for="'; echo $this->get_field_id( 'bco'.$i ); echo'">';  _e( 'Background color of n.', 'somnium' );echo $iCC.'</label>  
			<textarea class="widefat" id="';echo $this->get_field_id( 'bco'.$i ); echo'" name="'; echo $this->get_field_name( 'bco'.$i ); echo'" type="text">'; echo esc_attr( $bco[$i] ); echo'</textarea>
			</p>';
			
			echo'<p>
			<label for="'; echo $this->get_field_id( 'tco'.$i ); echo'">';  _e( 'Text color of n.', 'somnium' );echo $iCC.'</label> 
			<textarea class="widefat" id="';echo $this->get_field_id( 'tco'.$i ); echo'" name="'; echo $this->get_field_name( 'tco'.$i ); echo'" type="text">'; echo esc_attr( $tco[$i] ); echo'</textarea>
			</p>';
			
			echo'<p>
			<label for="'; echo $this->get_field_id( 'tln'.$i ); echo'">';  _e( 'Link of n.', 'somnium' );  echo $iCC.'</label> 
			<textarea class="widefat" id="';echo $this->get_field_id( 'tln'.$i ); echo'" name="'; echo $this->get_field_name( 'tln'.$i ); echo'" type="text">'; echo esc_attr( $tln[$i] ); echo'</textarea>
			</p>';
		}		
	}
		
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance[ 'num' ] = strip_tags($new_instance['num']);
		$num = $instance[ 'num' ];
		for ($i=0; $i<$num; $i++){
			$instance['orb'.$i ] = strip_tags($new_instance['orb'.$i]);
			$instance['rad'.$i ] = strip_tags($new_instance['rad'.$i]);
			$instance['img'.$i ] = strip_tags($new_instance['img'.$i]);
			$instance['tit'.$i ] = strip_tags($new_instance['tit'.$i]);
			$instance['txt'.$i ] = strip_tags($new_instance['txt'.$i]);
			$instance['bco'.$i ] = strip_tags($new_instance['bco'.$i]);
			$instance['tco'.$i ] = strip_tags($new_instance['tco'.$i]);
			$instance['tln'.$i ] = strip_tags($new_instance['tln'.$i]);
			}
		$number=11;
		for($i=0;$i<$number;$i++){
			$instance['in'.$i ] = strip_tags($new_instance['in'.$i]);		
		}
		return $instance;
	}
		
}

function orb_wid_load_widget() {
	register_widget( 'orb_wid' );
}
add_action( 'widgets_init', 'orb_wid_load_widget' );




 
class callToAc_wid extends WP_Widget {
	
	function __construct() {
		parent::__construct('callToAc_wid', __('Somnium: Call to Action Widget', 'somnium'), 
		array( 'description' => __( 'Display an engaging widget with background, text and button.', 'somnium' ), ) );
	}

	public function widget( $args, $instance ) {
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}
		echo $args['before_widget'];
		if(isMobile() == false && 'on' == $instance['in1'] || isMobile() == true && 'on' == $instance['in0']  ){			
			echo'<section  class="para_con_s" ><div class="para_con" >';
			echo'<div class="parallax_cta" data-parallax="scroll" data-image-src="'.$main[4].'"  ></div><div class="cta_div" >';
			if('on' == $instance['in2']){
				echo'<style>.fixed_image{ position: relative;height: 100%;z-index:0;}</style>';
				echo'<h1 style="font-size:'.$main[7].$main[8].'" class="cta_tit col-md-12">'.$main[3].'</h1>';
				echo'<a href="'.$main[6].'" class="col-md-12">';
			}else{
				echo'<h1 style="font-size:'.$main[7].$main[8].'" class="cta_tit col-md-8">'.$main[3].'</h1>';
				echo'<a href="'.$main[6].'" class="col-md-4">';
			}
			echo'<div class="btt-cta">'.$main[5].'</div></a></div></div></section>';
		}
	}
			
	public function form( $instance ) {
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}
			
		fieldProtoCheckbox('Show on Mobile?',$this->get_field_id( 'in0' ),$this->get_field_name( 'in0' ),$main[0]);
		
		fieldProtoCheckbox('Show on desktop?',$this->get_field_id( 'in1' ),$this->get_field_name( 'in1' ),$main[1]);
			
		fieldProtoCheckbox('In Sidebar?',$this->get_field_id( 'in2' ),$this->get_field_name( 'in2' ),$main[2]);
			
		fieldProto('Title',$this->get_field_id( 'in3' ),$this->get_field_name( 'in3' ),$main[3]);
		
		fieldProtoSelectUnits('Title Size:',$this->get_field_id( 'in7' ),$this->get_field_name( 'in7' ),$main[7],$this->get_field_id( 'in8' ),$this->get_field_name( 'in8' ),$main[8]);
		
		fieldProtoImageUpload('Background Image',$this->get_field_id( 'in4' ),$this->get_field_name( 'in4' ),$main[4]);
			
		fieldProto('Button Title',$this->get_field_id( 'in5' ),$this->get_field_name( 'in5' ),$main[5]);
			
		fieldProto('Button Link',$this->get_field_id( 'in6' ),$this->get_field_name( 'in6' ),$main[6]);	
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

function callToAc_wid_load_widget() {
	register_widget( 'callToAc_wid' );
}
add_action( 'widgets_init', 'callToAc_wid_load_widget' );




class fancyimg_wid extends WP_Widget {

	function __construct() {
		parent::__construct('fancyimg_wid', __('Somnium: Tile Widget', 'somnium'), 
		array( 'description' => __( 'Display a tile with background, title and text.', 'somnium' ), ) );
	}


	public function widget( $args, $instance ) {
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}
		echo $args['before_widget'];
		if (!filter_var($main[2], FILTER_VALIDATE_URL) === false) {
			$main[2] = 'url('.$main[2].')';
		}
		callDefault($main[9], 40);
		callDefault($main[10], 'px');
		callDefault($main[11], 14);
		callDefault($main[12], 'px');
		
		echo'<div class="rowc ';
		switch ($main[7]){
			case '25%':
				echo'col-md-3 col-sm-3';
				break;
			case '33%':
				echo'col-md-4 col-sm-4';
				break;
			case '50%':
				echo'col-md-6 col-sm-6';
				break;
			case '66%':
				echo'col-md-8 col-sm-8';
				break;
			case '75%':
				echo'col-md-9 col-sm-9';
				break;
			case '100%':
				echo'col-md-12 col-sm-12';
				break;	
		}
		echo'" data-sr="'.$main[6].'" >
		<div class="cellG" style="height:'.$main[5].$main[8].'; background-image:'.$main[2].'">
			<a href="'.$main[3].'">
				<div class="inner" >
					<div class="tag-im" style="color:'.$main[4].'">
						<h1 style="font-size:'.$main[9].$main[10].'" class="Th1">'.$main[0].'</h1>
						<p style="font-size:'.$main[11].$main[12].'">'.$main[1].'</p>
					</div>
				</div>
			</a>
		</div>
	</div>';
	echo $args['after_widget'];
	}

	public function form( $instance ) {
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}
		fieldProto('Title',$this->get_field_id( 'in0' ),$this->get_field_name( 'in0' ),$main[0]);
			
		fieldProto('Description',$this->get_field_id( 'in1' ),$this->get_field_name( 'in1' ),$main[1]);
		
		fieldProtoSelectUnits('Title Size:',$this->get_field_id( 'in9' ),$this->get_field_name( 'in9' ),$main[9],$this->get_field_id( 'in10' ),$this->get_field_name( 'in10' ),$main[10]);
		
		fieldProtoSelectUnits('Description Size:',$this->get_field_id( 'in11' ),$this->get_field_name( 'in11' ),$main[11],$this->get_field_id( 'in12' ),$this->get_field_name( 'in12' ),$main[12]);
			
		fieldProtoImageUpload('Background',$this->get_field_id( 'in2' ),$this->get_field_name( 'in2' ),$main[2]);
			
		fieldProto('Link',$this->get_field_id( 'in3' ),$this->get_field_name( 'in3' ),$main[3]);
			
		fieldProtoColorPicker('Color',$this->get_field_id( 'in4' ),$this->get_field_name( 'in4' ),$main[4]);
			
		fieldProtoSelectUnits('Height',$this->get_field_id( 'in5' ),$this->get_field_name( 'in5' ),$main[5],$this->get_field_id( 'in8' ),$this->get_field_name( 'in8' ),$main[8]);
			
		fieldProtoScrollRevealDes('Scroll Reveal',$this->get_field_id( 'in6' ),$this->get_field_name( 'in6' ),$main[6],'For Example: enter left and move 300px over 1s after 0.5s' );

		fieldProtoSelection('Width of This Widget',$this->get_field_id( 'in7' ),$this->get_field_name( 'in7' ),$main[7] ,array('25%','33%','50%','66%','75%','100%'));

	}
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$number=13;
		for($i=0;$i<$number;$i++){
			$instance['in'.$i ] = strip_tags($new_instance['in'.$i]);		
		}
		return $instance;
	}
		
} 

function fancyimg_wid_load_widget() {
	register_widget( 'fancyimg_wid' );
}
add_action( 'widgets_init', 'fancyimg_wid_load_widget' );





class img_wid extends WP_Widget {

	function __construct() {
		parent::__construct('img_wid', __('Somnium: Picture Widget', 'somnium'), 
		array( 'description' => __( 'Display a picture with various formatting options.', 'somnium' ), ) );
	}

	public function widget( $args, $instance ) {
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}
		echo $args['before_widget'];
		echo'<div class="';
		if( $main[5] == '25%'){echo'col-md-3';}
		else if( $main[5] == '33%'){echo'col-md-4';}
		else if( $main[5] == '50%'){echo'col-md-6';}
		else if( $main[5] == '66%'){echo'col-md-8';}
		else if( $main[5] == '75%'){echo'col-md-9';}
		else if( $main[5] == '100%'){echo'col-md-12';}
		echo' single-img" data-sr="'.$main[4].'">
		<div class="single-img-ud" style="height:'.$main[1].$main[7].'; background-image:url('.$main[0].')">';
		if( $main[6] == 'Picture with a Box'){echo'<a href="'.$main[2].'"><div class="ref-but">'.$main[3].'</div></a>';}
		echo'</div></div>';	
	}
			
	public function form( $instance ) {
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}
			
		fieldProtoImageUpload('Background Image',$this->get_field_id( 'in0' ),$this->get_field_name( 'in0' ),$main[0]);
			
		fieldProtoSelectUnits('Block Height',$this->get_field_id( 'in1' ),$this->get_field_name( 'in1' ),$main[1],$this->get_field_id( 'in7' ),$this->get_field_name( 'in7' ),$main[7]);
			
		fieldProto('Box Link',$this->get_field_id( 'in2' ),$this->get_field_name( 'in2' ),$main[2]);
			
		fieldProto('Box Text',$this->get_field_id( 'in3' ),$this->get_field_name( 'in3' ),$main[3]);
			
		fieldProtoScrollRevealDes('Scroll Reveal',$this->get_field_id( 'in4' ),$this->get_field_name( 'in4' ),$main[4],'For Example: enter left and move 300px over 1s after 0.5s');
			
		fieldProtoSelection('Width of This Widget',$this->get_field_id( 'in5' ),$this->get_field_name( 'in5' ),$main[5] ,array('25%','33%','50%','66%','75%','100%'));
			
		fieldProtoSelection('Type of this Widget',$this->get_field_id( 'in6' ),$this->get_field_name( 'in6' ),$main[6] ,array('Simple Picture', 'Picture with a Box'));
	}
		
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$number=8;
		for($i=0;$i<$number;$i++){
			$instance['in'.$i ] = strip_tags($new_instance['in'.$i]);		
		}
		return $instance;
	}
	
}

function img_wid_load_widget() {
	register_widget( 'img_wid' );
}
add_action( 'widgets_init', 'img_wid_load_widget' );






class ref_l_wid extends WP_Widget {

	function __construct() {
		parent::__construct('ref_l_wid', __('Somnium: Reference Widget', 'somnium'), 
		array( 'description' => __( 'Widget displaying text, title and image, ideal for use as reference of your work.', 'somnium' ), ) );
	}

	public function widget( $args, $instance ) {
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}
		callDefault($main[9], 40);
		callDefault($main[10], 'px');
		callDefault($main[11], 14);
		callDefault($main[12], 'px');
		echo $args['before_widget'];
		echo'<section class="section-pad">
			<div class="section-container">
				<div class="col-8-of col-md-12">';
				if($main[8] == 'Left'){
					echo'<div  class="ref-block section-txt col-md-8" data-sr="'.$main[7].'">
						<a href="'.$main[2].'"><h2 class="link-title"  style="color:'.$main[5].';font-size:'.$main[9].$main[10].'">'.$main[0].'</h2></a>
						<p  style="color:'.$main[6].'; font-size:'.$main[11].$main[12].'">'.$main[1].'</p>
					</div>';
				}else{}
					echo'<div id="col-4-of" class="col-md-4" data-sr="'.$main[7].'">
						<a href="'.$main[2].'">
							<div class="ref-left-text image-hover-txt" id="refback"><div class="ref-but ref-but2">'.$main[3].'</div></div>
						</a>
						<div class ="ref-img"  style="background-image:url('.$main[4].')"></div>
					</div>';
				if($main[8] == 'Right'){
					echo'<div  class="ref-block section-txt col-md-8" data-sr="'.$main[7].'">
						<a href="'.$main[2].'"><h2 class="link-title"  style="color:'.$main[5].';font-size:'.$main[9].$main[10].'">'.$main[0].'</h2></a>
						<p  style="color:'.$main[6].'; font-size:'.$main[11].$main[12].'">'.$main[1].'</p>
					</div>';
				}else{}
				echo'</div></div></section>';
				echo $args['after_widget'];
	}

	public function form( $instance ) {
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}

		fieldProto('Title',$this->get_field_id( 'in0' ),$this->get_field_name( 'in0' ),$main[0]);
			
		fieldProtoTextArea('Text',$this->get_field_id( 'in1' ),$this->get_field_name( 'in1' ),$main[1]);
		
		fieldProtoSelectUnits('Title Size:',$this->get_field_id( 'in9' ),$this->get_field_name( 'in9' ),$main[9],$this->get_field_id( 'in10' ),$this->get_field_name( 'in10' ),$main[10]);
		
		fieldProtoSelectUnits('Text Size:',$this->get_field_id( 'in11' ),$this->get_field_name( 'in11' ),$main[11],$this->get_field_id( 'in12' ),$this->get_field_name( 'in12' ),$main[12]);
			
		fieldProto('Link',$this->get_field_id( 'in2' ),$this->get_field_name( 'in2' ),$main[2]);
			
		fieldProto('Text on Image Hover',$this->get_field_id( 'in3' ),$this->get_field_name( 'in3' ),$main[3]);
			
		fieldProtoImageUpload('Image',$this->get_field_id( 'in4' ),$this->get_field_name( 'in4' ),$main[4]);
			
		fieldProtoColorPicker('Title Color',$this->get_field_id( 'in5' ),$this->get_field_name( 'in5' ),$main[5]);
			
		fieldProtoColorPicker('Text Color',$this->get_field_id( 'in6' ),$this->get_field_name( 'in6' ),$main[6]);

		fieldProtoScrollRevealDes('Scroll Reveal',$this->get_field_id( 'in7' ),$this->get_field_name( 'in7' ),$main[7],'For Example: enter left and move 300px over 1s after 0.5s');
		
		fieldProtoSelection('Text on:',$this->get_field_id( 'in8' ),$this->get_field_name( 'in8' ),$main[8] ,array('Left', 'Right'));
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$number=13;
		for($i=0;$i<$number;$i++){
			$instance['in'.$i ] = strip_tags($new_instance['in'.$i]);		
		}
		return $instance;
	}

} 

function ref_l_wid_load_widget() {
	register_widget( 'ref_l_wid' );
}
add_action( 'widgets_init', 'ref_l_wid_load_widget' );



