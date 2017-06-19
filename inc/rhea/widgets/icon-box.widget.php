<?php
class Rhea_Icon_Box extends WP_Widget {

    public function __construct() {
        $widget_args = array(
            'description' => esc_html__( 'This widget is designed for Right Section sidebar', 'rhea' )
        );
        parent::__construct( 'rhea-icon-box', __( '[Rhea] Icon Box', 'rhea' ), $widget_args );
    }

    function widget($args, $instance) {

        extract($args);

        echo $before_widget;

        ?>

        <div class="about_us_box">
            <div class="header_aboutus_box">
                <div class="pull-left icon-holder">
                    <?php if ( !empty($instance['icon']) ): ?>
                        <i class="fa <?php echo $instance['icon'] ?>"></i>
                    <?php endif ?>
                </div>
                <div class="aboutus_titles pull-left">
                    <?php if ( !empty($instance['title']) ): ?>
                        <h4><?php echo $instance['title'] ?></h4>
                    <?php endif ?>

                    <?php if ( !empty($instance['subtitle']) ): ?>
                        <p><?php echo $instance['subtitle'] ?></p>
                    <?php endif ?>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="aboutus_content">
                <?php if ( !empty($instance['description']) ): ?>
                    <p><?php echo $instance['description'] ?></p>
                <?php endif ?>
            </div>
        </div>

        <?php

        echo $after_widget;

    }

    function update($new_instance, $old_instance) {

        $instance = $old_instance;
        $instance['title'] = stripslashes(wp_filter_post_kses($new_instance['title']));
        $instance['subtitle'] = strip_tags($new_instance['subtitle']);
        $instance['icon'] = strip_tags( $new_instance['icon'] );
        $instance['description'] = strip_tags($new_instance['description']);

        return $instance;

    }

    function form($instance) {
        $icon_holder_class = empty($instance['icon']) ? ' empty-icon' : ''; ?>
        <p>
            <label for="<?php echo $this->get_field_id('icon'); ?>"><?php _e('Icon', 'rhea'); ?></label><br/>
            <div class="fontawesome-icon-container<?php echo $icon_holder_class ?>">
                <input type="hidden" class="widefat" name="<?php echo $this->get_field_name('icon'); ?>" id="<?php echo $this->get_field_id('icon'); ?>" value="<?php if( !empty($instance['icon']) ): echo $instance['icon']; endif; ?>">
                <div class="icon-holder">
        <p>No icon selected :( ... </p>
        <i class="<?php if( !empty($instance['icon']) ): echo $instance['icon']; endif; ?>"></i>
        </div>
        <div class="actions">
            <button type="button" class="button add-icon-button">Select Icon</button>
            <button type="button" class="button change-icon-button">Change Icon</button>
            <button type="button" class="button remove-icon-button">Remove</button>
        </div>
        </div>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'rhea'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php if( !empty($instance['title']) ): echo $instance['title']; endif; ?>" class="widefat">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('subtitle'); ?>"><?php _e('Subtitle', 'rhea'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('subtitle'); ?>" id="<?php echo $this->get_field_id('subtitle'); ?>" value="<?php if( !empty($instance['subtitle']) ): echo $instance['subtitle']; endif; ?>" class="widefat">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('description'); ?>"><?php _e('Description', 'rhea'); ?></label><br/>
            <textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name('description'); ?>" id="<?php echo $this->get_field_id('description'); ?>"><?php if( !empty($instance['description']) ): echo htmlspecialchars_decode($instance['description']); endif; ?></textarea>
        </p>

        <?php

    }

}