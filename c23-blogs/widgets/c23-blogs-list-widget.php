<?php
add_action( 'widgets_init', 'wpdocs_register_widgets' );

function wpdocs_register_widgets() {
	register_widget( 'Blogs_Widget' );
}

class Blogs_Widget extends WP_Widget {

	function __construct() {
		// Instantiate the parent object.
		parent::__construct( false, __( 'Blogs List Widget') );
	}
	// WIDGET Frontend
	function widget( $args, $instance ) {

		echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
        echo 'Blogs Custom Widget';
        echo $args['after_widget'];
	}
	// Widget backend
	function form($instance){ ?>
		<div class="text-center"><?php echo 'Blogs List Widget'; ?></div>
		<hr>

		<p>
			<label style="margin-bottom: 13px;    display: inline-block;" for="<?php echo $this->get_field_id( 'limit' ); ?>"><?php echo ( 'Number of Events to display:'); ?></label>
			<select id="<?php echo $this->get_field_id( 'limit' ); ?>" name="<?php echo $this->get_field_name( 'limit' ); ?>" class="widefat limitSelect">
				<?php
					$arrDisplayEvents = array(1,2,3,4,5,6,7,8,9,10,15,20);
					foreach ( $arrDisplayEvents as $intBlogsCount ) {
					?>
						<option <?php if ( $intBlogsCount == $instance['limit'] ) {
							echo 'selected="selected"';
						} ?> > <?php echo $intBlogsCount; ?> 
						</option>
			<?php 	} ?>
			</select>
		</p>
		<?php

	}
	// Update/Save
	public function update( $NewInstance, $OldInstance ) {
		$instance = array();

		$instance['limit'] = $NewInstance['limit'];

		return $instance;
	}
}
