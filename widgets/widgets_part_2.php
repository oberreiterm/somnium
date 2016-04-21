<?php
class cr_wid extends WP_Widget {
	
	function __construct() {
		parent::__construct('cr_wid', __('Somnium: Carousel Widget', 'somnium'), 
		array( 'description' => __( 'Carousel displaying multiple images with optional text.', 'somnium' ), ) );
	}


	public function widget( $args, $instance ) {
		$num = $instance[ 'num' ];
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}
		for ($i=0; $i<$num; $i++){
				$img[$i] = $instance[ 'img'.$i ];
				$tit[$i] = $instance[ 'tit'.$i ];
				$sel[$i] = $instance[ 'sel'.$i ];
				$lnk[$i] = $instance[ 'lnk'.$i ];
				$tco[$i] = $instance[ 'tco'.$i ];
		}
		echo $args['before_widget'];
		if (!filter_var($main[5], FILTER_VALIDATE_URL) === false) {
			$main[5] = 'url('.$main[5].')';
		}
		
		echo'<div class="section_wid carousel_sec" >
		<style type="text/css" scoped>.owl-theme .owl-controls .owl-page span {background:'.$main[7].' ;} .owl-nav{color:'.$main[7].' !important;}</style>';
				echo'<div class="section-header">
						<h2 class="white-text" style="color:'.$main[2].'">'.$main[0].'</h2>';
						if( !empty($main[4]) ): echo'<h6 class="white-text wt-subtitle" style="color:'.$main[4].'">'.$main[3].'</h6>';
						endif;	
						echo'</div>';
				echo'<div class="car_container" data-elements-number="'.$main[9].'" data-autoplay-time="'.$main[10].'">
						<div id="owl-demo" class="owl-carousel owl-theme col-md-12">';
						for($i=0;$i<$num;$i++){
							if($sel[$i] == 'Text+Image'){
								echo'<a href="'.$lnk[$i].'">
									<div style="height:'.(intval($main[6])-15).'px" class="item">
										<div class="owl_image" style="background-image:url('.$img[$i].')"></div>
										<p style="color:'.$tco[$i].'">'.$tit[$i].'</p>
									</div>
								</a>';
							}else{
								echo'<a href="'.$lnk[$i].'">
									<div style="height:'.$main[6].'px" class="item">
										<div class="owl_image" style="background-image:url('.$img[$i].');min-height: 100%;"></div>
										</div>
									</a>';
							}
						}
			echo'</div><div class="clearfix"></div></div>';
		echo '</div>';				
	}

	public function form( $instance ) {
		$num = $instance[ 'num' ];
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}
		for ($i=0; $i<$num; $i++){
			$img[$i] = $instance[ 'img'.$i ];
			$tit[$i] = $instance[ 'tit'.$i ];
			$sel[$i] = $instance[ 'sel'.$i ];
			$lnk[$i] = $instance[ 'lnk'.$i ];
			$tco[$i] = $instance[ 'tco'.$i ];
		}
		
		fieldProto('Title',$this->get_field_id( 'in0' ),$this->get_field_name( 'in0' ),$main[0]);
		
		fieldProtoColorPicker('Title Color:',$this->get_field_id( 'in2' ),$this->get_field_name( 'in2' ),$main[2]);
		
		fieldProto('ID (Sticky Header Target):',$this->get_field_id( 'in1' ),$this->get_field_name( 'in1' ),$main[1]);
			
		fieldProto('Subtitle:',$this->get_field_id( 'in3' ),$this->get_field_name( 'in3' ),$main[3]);
			
		fieldProtoColorPicker('Subtitle Color:',$this->get_field_id( 'in4' ),$this->get_field_name( 'in4' ),$main[4]);
		
		fieldProtoSelectUnits('Items Height:',$this->get_field_id( 'in6' ),$this->get_field_name( 'in6' ),$main[6],$this->get_field_id( 'in8' ),$this->get_field_name( 'in8' ),$main[8]);

		fieldProtoColorPicker('Color of Navigation Elements:',$this->get_field_id( 'in7' ),$this->get_field_name( 'in7' ),$main[7]);	
		
		fieldProtoNumber('Autoplay Time(ms):',$this->get_field_id( 'in10' ),$this->get_field_name( 'in10' ),$main[10]);
		
		fieldProtoNumber('Number of elements displayed at the same time:',$this->get_field_id( 'in9' ),$this->get_field_name( 'in9' ),$main[9]);	
		
		fieldProto('Number of elements:',$this->get_field_id( 'num' ),$this->get_field_name( 'num' ),$num);
		
		echo'<h2>'.__('Item Settings','somnium').'</h2>';
		
		for ($i=0; $i<$num; $i++){
			$iCC =$i +1;
			echo'<h1>'.__('Item n.','somnium').$iCC.'</h1>';
			
			fieldProto('Title',$this->get_field_id( 'tit'.$i ),$this->get_field_name( 'tit'.$i ),$tit[$i]);
			
			fieldProtoImageUpload('Image',$this->get_field_id( 'img'.$i ),$this->get_field_name( 'img'.$i ),$img[$i]);
			
			fieldProto('Link',$this->get_field_id( 'lnk'.$i ),$this->get_field_name( 'lnk'.$i ),$lnk[$i]);
			
			fieldProtoColorPicker('Title Color',$this->get_field_id( 'tco'.$i ),$this->get_field_name( 'tco'.$i ),$tco[$i]);
			
			fieldProtoSelection('Type Selection', $this->get_field_id(  'sel'.$i ), $this->get_field_name(  'sel'.$i ), $sel[$i] , array('Text+Image','Image'));
			
			}
		
	}
		
	public function update( $new_instance, $old_instance ) {
		
		$instance = array();
		$instance[ 'num' ] = strip_tags($new_instance['num']);
		$number=11;
		for($i=0;$i<$number;$i++){
			$instance['in'.$i ] = strip_tags($new_instance['in'.$i]);		
		}
		$num = $instance[ 'num' ];
		for ($i=0; $i<$num; $i++){
			$instance['tit'.$i ] = strip_tags($new_instance['tit'.$i]);
			$instance['img'.$i ] = strip_tags($new_instance['img'.$i]);
			$instance['sel'.$i ] = strip_tags($new_instance['sel'.$i]);
			$instance['lnk'.$i ] = strip_tags($new_instance['lnk'.$i]);
			$instance['tco'.$i ] = strip_tags($new_instance['tco'.$i]);
		}
		return $instance;
	}
		
}

function cr_wid_load_widget() {
	register_widget( 'cr_wid' );
}
add_action( 'widgets_init', 'cr_wid_load_widget' );



class co_end extends WP_Widget {

	function __construct() {
		parent::__construct('co_end', __('Somnium: Conctacts Section', 'somnium'), 
		array( 'description' => __( 'Section designed to display contact form.', 'somnium' ), ) );
	}

	public function widget( $args, $instance ) {
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}
		echo $args['before_widget'];
		if(isset($_POST['submitted'])){
				
				if(trim($_POST['myname']) === ''){
					$nameError = __('* Please enter your name.','somnium');
					$hasError = true;
				}else{
					$name = trim($_POST['myname']);
				}
			
				if(trim($_POST['myemail']) === ''){
					$emailError = __('* Please enter your email address.','somnium');
					$hasError = true;
				}else if(!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['myemail']))){
					$emailError = __('* You entered an invalid email address.','somnium');
					$hasError = true;
				}else{
					$email = trim($_POST['myemail']);
				}
				
				if(trim($_POST['mysubject']) === ''){
					$subjectError = __('* Please enter a subject.','somnium');
					$hasError = true;
				}else{
					$subject = trim($_POST['mysubject']);
				}
			
				if(trim($_POST['mymessage']) === ''){
					$messageError = __('* Please enter a message.','somnium');
					$hasError = true;
				}else{
					$message = stripslashes(trim($_POST['mymessage']));
				}
				
				if(!isset($hasError)){
					$emailTo = $main[3];
					if(isset($emailTo) && $emailTo != ""){
						if( empty($subject) ){
							$subject = 'From '.$name;
						}
						$body = "Name: $name \n\nEmail: $email \n\n Subject: $subject \n\n Message: $message";
						$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
						wp_mail($emailTo, $subject, $body, $headers);
						$emailSent = true;
					}else{
						$emailSent = false;
					}
				}	
		}
		echo'<section class="section contact-us" data-parallax="scroll" data-image-src="'.$main[5].'"   id="contact">';
		?>	
				<div class="container">
					<div class="section-header">
						<?php
							echo'<h2 style="color:'.$main[2].'" class="white-text">'.$main[0].'</h2>';
							if( !empty($main[1])){echo '<h6 style="color:'.$main[2].'" class="white-text">'.$main[1].'</h6>';}	
						?>
					</div>
					<div class="row">
						<?php
							if(isset($emailSent) && $emailSent == true){
								echo '<h5 class="error ">'; _e('Thanks, your email was sent successfully!','somnium');echo'</h5 >';
							}elseif(isset($_POST['submitted'])){
								echo '<h5  class="error ">';_e('Sorry, an error occured.','somnium'); echo'</h5 >';
							}
							if(isset($nameError) && $nameError != ''){
								echo '<h5  class="error ">'.$nameError.'</h5>';
							}
							if(isset($emailError) && $emailError != ''){
								echo '<h5  class="error ">'.$emailError.'</h5>';
							}
							if(isset($subjectError) && $subjectError != ''){
								echo '<h5  class="error ">'.$subjectError.'</h5>';
							}
							if(isset($messageError) && $messageError != ''){
								echo '<h5  class="error ">'.$messageError.'</h5>';
							}
						?>
						<form method="POST" onSubmit="this.scrollPosition.value=document.body.scrollTop" class="contact-form">
							<input type="hidden" name="scrollPosition">
							<input type="hidden" name="submitted" id="submitted" value="true" />
							<div class="col-lg-4 col-sm-4" data-sr="enter left after 0s over 1s">
								<input type="text" name="myname" placeholder="<?php _e('Name','somnium');?>" class="form-control input-box" value="<?php if(isset($_POST['myname'])) echo $_POST['myname'];?>">
							</div>
							<div class="col-lg-4 col-sm-4" data-sr="enter left after 0s over 1s">
								<input type="email" name="myemail" placeholder="<?php  _e('Email','somnium');?>" class="form-control input-box" value="<?php if(isset($_POST['myemail'])) echo $_POST['myemail'];?>">
							</div>
							<div class="col-lg-4 col-sm-4" data-sr="enter left after 0s over 1s">
								<input type="text" name="mysubject" placeholder="<?php  _e('Subject','somnium');?>" class="form-control input-box" value="<?php if(isset($_POST['mysubject'])) echo $_POST['mysubject'];?>">
							</div>
							<div class="col-md-12" data-sr="enter right after 0s over 1s">
								<textarea name="mymessage" class="form-control textarea-box" placeholder="<?php _e('Message','somnium');?>"><?php if(isset($_POST['mymessage'])) { echo stripslashes($_POST['mymessage']); } ?></textarea>
							</div>
							<?php
								echo '<button class=" custom-button " type="submit" data-sr="enter left after 0s over 1s">';  _e('Send','somnium');echo'</button>';
							?>
						</form>
					</div>
				</div> 
			</section> 
		<?php
	}	
		

	public function form( $instance ) {
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}

		fieldProto('Title',$this->get_field_id( 'in0' ),$this->get_field_name( 'in0' ),$main[0]);
		
		fieldProto('Subtitle',$this->get_field_id( 'in1' ),$this->get_field_name( 'in1' ),$main[1]);
			
		fieldProtoColorPicker('Title and Subtitle Color',$this->get_field_id( 'in2' ),$this->get_field_name( 'in2' ),$main[2]);
			
		fieldProto('Email Address',$this->get_field_id( 'in3' ),$this->get_field_name( 'in3' ),$main[3]);
			
		fieldProto('Button Label',$this->get_field_id( 'in4' ),$this->get_field_name( 'in4' ),$main[4]);
			
		fieldProtoImageUpload('Background Image',$this->get_field_id( 'in5' ),$this->get_field_name( 'in5' ),$main[5]);
			
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

function co_end_load_widget() {
	register_widget( 'co_end' );
}
add_action( 'widgets_init', 'co_end_load_widget' );


class recentPost_wid extends WP_Widget {

	function __construct() {
		parent::__construct('recentPost_wid', __('Somnium: Recent Posts', 'somnium'), 
		array( 'description' => __( 'Display recent posts in sidebar.', 'somnium' ), ) );
	}

	public function widget( $args, $instance ) {
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}
		echo $args['before_widget'];
		$args = array(
			'post_type' => 'post',
			'cat' => $main[3],
			'offset'=> $main[2],
		);
		$the_query = new WP_Query( $args );
		echo'<div>';
		echo'<h2 class="widgettitle">'.$main[0].'</h2>';
		echo'<ul class="srp-ul">';
		for($i=0;$the_query->have_posts() && $i<$main[1];$i++){
			$the_query->the_post();
			echo'<li class=srp-li style="background:'.$main[4].'">';
			if(has_post_thumbnail()){
				$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),  array( 60,60 ) , false, ''  );
				echo '<a href="'.get_permalink().'"><div class="srp" ><img alt="post_img" src="'. $img[0] .'"></div>';
			}
			else{
				echo '<a href="'.get_permalink().'"><div class="srp" style="'. call_gradient_placeholder().'"></div>';
			}
			echo'<h4>'.get_the_title().'</h4>
			<span>'.get_the_date('F j, Y').'</span>
			</a></li>';
		}
		echo'</ul>
		</div>';
	}

	public function form( $instance ) {
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}
		fieldProto('Title',$this->get_field_id( 'in0' ),$this->get_field_name( 'in0' ),$main[0]);
			
		fieldProtoNumber('Number of posts',$this->get_field_id( 'in1' ),$this->get_field_name( 'in1' ),$main[1]);
			
		fieldProtoNumber('Posts offset',$this->get_field_id( 'in2' ),$this->get_field_name( 'in2' ),$main[2]);
			
		fieldProtoColorPicker('Background of items',$this->get_field_id( 'in4' ),$this->get_field_name( 'in4' ),$main[4]);
			
		fieldProtoCategoryDropdown('Select a category', $this->get_field_name('in3'), $main[3], 'name');
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$number=5;
		for($i=0;$i<$number;$i++){
			$instance['in'.$i ] = strip_tags($new_instance['in'.$i]);		
		}
		return $instance;
	}
	
}

function recentPost_wid_load_widget() {
	register_widget( 'recentPost_wid' );
}
add_action( 'widgets_init', 'recentPost_wid_load_widget' );






class hdr extends WP_Widget {

	function __construct() {
		parent::__construct('hdr', __('Somnium: Header Widget', 'somnium'), 
		array( 'description' => __( 'Widget for displaying header on header area.', 'somnium' ), ) );
	}

	public function widget( $args, $instance ) {
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}
		echo $args['before_widget'];
		echo'<style>.whitTr #fixed-header-title{width:'.$main[3].'px;} #fixed-header-title{width:'.$main[4].'px;}</style>';
		if (!filter_var($main[0], FILTER_VALIDATE_URL) === false && !filter_var($main[2], FILTER_VALIDATE_URL) === false) {
			$fix_hdr_title_top= '<img class="topLogo"  src="' . esc_attr( $main[0] ) . '" alt="' . esc_attr( get_bloginfo( 'description' ) ) . '" />';
			$fix_hdr_title= '<img class="restLogo"  src="' . esc_attr( $main[2] ) . '" alt="' . esc_attr( get_bloginfo( 'description' ) ) . '" />';
		}else{
			$fix_hdr_title = get_bloginfo( 'name' );
		}
		echo'<div id="fixed-header-title-menu">
				<div id="fixed-header-name">
					<a id="fixed-header-title" href="'.get_site_url().'">'.$fix_hdr_title_top.$fix_hdr_title.'</a>
				</div>';		
				echo'<div id="fixed-header-menu-image-div"><img alt="menu_image" id="fixed-header-menu-image-image" src="'.get_template_directory_uri().'/images/menu-alt.png"></div>';
				$menu_args = array(
					'menu'			=> $main[1],
					'depth'			=> 2,
					'menu_id'		=> 'fixed-header-menu',
					'container'		=> '',
					'fallback_cb'	=> '',
					'menu_class' => 'active',
				);
				wp_nav_menu( $menu_args );
		echo'</div>';
	}

	public function form( $instance ) {
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}
		fieldProtoImageUploadDes('Logo to the top',$this->get_field_id( 'in0' ),$this->get_field_name( 'in0' ),$main[0],'Leave this blank in order to show sitename');
		
		fieldProtoNumber('Set container width for top logo (px)',$this->get_field_id( 'in3' ),$this->get_field_name( 'in3' ),$main[3]);	
	
		fieldProtoImageUploadDes('Logo for the rest of website',$this->get_field_id( 'in2' ),$this->get_field_name( 'in2' ),$main[2],'Leave this blank in order to show sitename');
		
		fieldProtoNumber('Set container width for logo (px)',$this->get_field_id( 'in4' ),$this->get_field_name( 'in4' ),$main[4]);	
			
		fieldProtoDes('Name of menu:',$this->get_field_id( 'in1' ),$this->get_field_name( 'in1' ),$main[1],'Name of menu to display');
		
	}

	public function update( $new_instance, $old_instance ) {
			$instance = array();
			$number=5;
			for($i=0;$i<$number;$i++){
				$instance['in'.$i ] = strip_tags($new_instance['in'.$i]);		
			}
			return $instance;
	}	
}

function hdr_load_widget() {
	register_widget( 'hdr' );
}
add_action( 'widgets_init', 'hdr_load_widget' );




class sp_wid extends WP_Widget {

	function __construct() {
		parent::__construct('sp_wid', __('Somnium: Spin Widget', 'somnium'), 
		array( 'description' => __( 'Adds widget for displaying percentage and text.', 'somnium' ), ) );
	}

	public function widget( $args, $instance ) {
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}
		echo $args['before_widget'];
		if (!filter_var($main[5], FILTER_VALIDATE_URL) === false) {
			$main[5] = 'url('.$main[5].')';
		}
		
		if (!filter_var($main[6], FILTER_VALIDATE_URL) === false) {
			$main[6] = 'url('.$main[6].')';
		}
		callDefault($main[9], 40);
		callDefault($main[10], 'px');
		callDefault($main[11], 14);
		callDefault($main[12], 'px');
		$selRes='';
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
		
		$main[2]= $main[2].'%';
		echo'<div class="spinCont '.$selRes.'" data-sr="'.$main[7].'">';
		if(!NullEmpty($main[13])){
			echo'<a href="'.$main[13].'">';
		}
		echo'<div class="spin">
		<div class="base"></div>
		<div class="base basel base2" style="background:'.$main[5].'" data-spin="'.$main[4].'"></div>
		<div class="base basel base3" style="background:'.$main[5].'"></div>
		<div class="base basel base4" style="background:'.$main[5].'"></div>
		<div class="round" style="background:'.$main[6].'"><p class="roundP" style="color:'.$main[3].';">'.$main[2].'</p></div></div>
		<hr class="spinHrSpacer">
		<div class="underspin"><h1 style="font-size:'.$main[9].$main[10].'">'.$main[0].'</h1><p style="font-size:'.$main[11].$main[12].'">'.$main[1].'</p></div>'.(!NullEmpty($main[13]) ? '</a>' : '').'
		</div>';			
	} 
			
	public function form( $instance ) {
		for($i=0;isset($instance['in'.$i ]);$i++){
			$main[$i] = $instance['in'.$i];			
		}
		fieldProto('Title',$this->get_field_id( 'in0' ),$this->get_field_name( 'in0' ),$main[0]);
			
		fieldProtoTextArea('Text',$this->get_field_id( 'in1' ),$this->get_field_name( 'in1' ),$main[1]);
		
		fieldProtoSelectUnits('Title Size:',$this->get_field_id( 'in9' ),$this->get_field_name( 'in9' ),$main[9],$this->get_field_id( 'in10' ),$this->get_field_name( 'in10' ),$main[10]);
		
		fieldProtoSelectUnits('Description Size:',$this->get_field_id( 'in11' ),$this->get_field_name( 'in11' ),$main[11],$this->get_field_id( 'in12' ),$this->get_field_name( 'in12' ),$main[12]);
		
		fieldProto('Link',$this->get_field_id( 'in13' ),$this->get_field_name( 'in13' ),$main[13]);
			
		fieldProtoNumber('Percentage to Show:',$this->get_field_id( 'in2' ),$this->get_field_name( 'in2' ),$main[2],1,0,100);
				
		fieldProtoDes('Percentage Color:',$this->get_field_id( 'in3' ),$this->get_field_name( 'in3' ),$main[3], 'Input any background');
			
		fieldProtoNumber('Duration of Animation in seconds:',$this->get_field_id( 'in4' ),$this->get_field_name( 'in4' ),$main[4]);
			
		fieldProtoDes('Progress bar background:',$this->get_field_id( 'in5' ),$this->get_field_name( 'in5' ),$main[5], 'Input any background');
			
		fieldProtoDes('Circle background:',$this->get_field_id( 'in6' ),$this->get_field_name( 'in6' ),$main[6], 'Input any background');
			
		fieldProtoScrollRevealDes('Scroll Reveal:',$this->get_field_id( 'in7' ),$this->get_field_name( 'in7' ),$main[7],'For Example: enter left and move 300px over 1s after 0.5s');
			
		fieldProtoSelection('Width of This Widget',$this->get_field_id( 'in8' ),$this->get_field_name( 'in8' ),$main[8] ,array('8%','17%','25%','33%','50%','100%'),'');

	}
		
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$number=14;
		for($i=0;$i<$number;$i++){
			$instance['in'.$i ] = strip_tags($new_instance['in'.$i]);		
		}
		return $instance;
	}
		
} 

function sp_wid_load_widget() {
	register_widget( 'sp_wid' );
}
add_action( 'widgets_init', 'sp_wid_load_widget' );
