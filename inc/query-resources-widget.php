<?php

class OpenDev_Query_Resources_Widget extends WP_Widget {

 /**
  * Sets up the widgets name etc
  */
 public function __construct() {
  // widget actual processes
  parent::__construct(
   'opendev_query_resources_widget',
   __('OD Query Resources', 'opendev'),
   array('description' => __('Query resources and displays them in a post or page.', 'opendev'))
  );
 }

 /**
  * Outputs the content of the widget
  *
  * @param array $args
  * @param array $instance
  */
 public function widget( $args, $instance ) {
  // outputs the content of the widget
  echo $args['before_widget'];
  if ( ! empty( $instance['title'] ) ) {
   echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
  }

  global $post;
  if ((!empty($instance['group']) && $instance['group'] != '-1') && (!empty($instance['organization']) && $instance['organization'] != '-1'))
   echo do_shortcode('[wpckan_query_datasets query="' . $instance['query'] . '" organization="' . $instance['organization'] . '" group="' . $instance['group'] . '" include_fields_resources="format"]');
  else if (!empty($instance['organization']) && $instance['organization'] != '-1')
   echo do_shortcode('[wpckan_query_datasets query="' . $instance['query'] .'" organization="' . $instance['organization'] . '" include_fields_resources="format"]');
  else if (!empty($instance['group']) && $instance['group'] != '-1')
   echo do_shortcode('[wpckan_query_datasets query="' . $instance['query'] .'" group="' . $instance['group'] . '" include_fields_resources="format"]');
  else
   echo do_shortcode('[wpckan_query_datasets query="' . $instance['query'] .'" include_fields_resources="format"]');

  echo $args['after_widget'];
 }

 /**
  * Outputs the options form on admin
  *
  * @param array $instance The widget options
  */
 public function form( $instance ) {
  // outputs the options form on admin
  $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Related Resources', 'opendev' );
  $query = $instance['query'];
  $organization = $instance['organization'];
  $organization_list = [];
  if (function_exists('wpckan_api_get_organizations_list')){
   $organization_list = wpckan_api_get_organizations_list();
  }
  $group = $instance['group'];
  $group_list = [];
  if (function_exists('wpckan_api_get_groups_list')){
   $group_list = wpckan_api_get_groups_list();
  }

  ?>
  <p>
   <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
   <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
   <label for="<?php echo $this->get_field_id( 'query' ); ?>"><?php _e( 'Query:' ); ?></label>
   <input class="widefat" id="<?php echo $this->get_field_id( 'query' ); ?>" name="<?php echo $this->get_field_name( 'query' ); ?>" type="text" value="<?php echo esc_attr( $query ); ?>">
   <label for="<?php echo $this->get_field_id( 'organization' ); ?>"><?php _e( 'CKAN Organization:' ); ?></label>
   <select class="widefat" id="<?php echo $this->get_field_id( 'organization' ); ?>" name="<?php echo $this->get_field_name( 'organization' ); ?>">
      <option <?php if($organization == -1) echo 'selected="selected"' ?> value="-1"><?php _e('All','opendev')?></option>
      <?php foreach ($organization_list as $dataset_organization){ ?>
       <option <?php if($dataset_organization['id'] == $organization) echo 'selected="selected"' ?> value="<?php echo $dataset_organization['id']; ?>"><?php echo $dataset_organization['display_name']; ?></option>
      <?php } ?>
    </select>
   <label for="<?php echo $this->get_field_id( 'group' ); ?>"><?php _e( 'CKAN Group:' ); ?></label>
   <select class="widefat" id="<?php echo $this->get_field_id( 'group' ); ?>" name="<?php echo $this->get_field_name( 'group' ); ?>">
      <option <?php if($group == -1) echo 'selected="selected"' ?> value="-1"><?php _e('All','opendev')?></option>
      <?php foreach ($group_list as $dataset_group){ ?>
       <option <?php if($dataset_group['name'] == $group) echo 'selected="selected"' ?> value="<?php echo $dataset_group['name']; ?>"><?php echo $dataset_group['display_name']; ?></option>
      <?php } ?>
    </select>
  </p>
  <?php
 }

 /**
  * Processing widget options on save
  *
  * @param array $new_instance The new options
  * @param array $old_instance The previous options
  */
 public function update( $new_instance, $old_instance ) {
  // processes widget options to be saved
  $instance = array();
  $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
  $instance['query'] = ( ! empty( $new_instance['query'] ) ) ? strip_tags( $new_instance['query'] ) : '';
  $instance['organization'] = ( ! empty( $new_instance['organization'] ) ) ? strip_tags( $new_instance['organization'] ) : '';
  $instance['group'] = ( ! empty( $new_instance['group'] ) ) ? strip_tags( $new_instance['group'] ) : '';

  return $instance;
 }
}

add_action( 'widgets_init', create_function('', 'register_widget("OpenDev_Query_Resources_Widget");'));