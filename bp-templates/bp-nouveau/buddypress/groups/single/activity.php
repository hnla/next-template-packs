<?php
/**
 * BuddyPress - Groups Activity
 *
 * @package BuddyPress
 * @subpackage bp-nouveau
 */

?>

<?php

/**
 * Fires before the display of the group activity post form.
 *
 * @since 1.2.0
 */
do_action( 'bp_before_group_activity_post_form' ); ?>

<?php if ( is_user_logged_in() && bp_group_is_member() ) : ?>

	<?php bp_get_template_part( 'activity/post-form' ); ?>

<?php endif; ?>

<?php

/**
 * Fires after the display of the group activity post form.
 *
 * @since 1.2.0
 */
do_action( 'bp_after_group_activity_post_form' ); ?>

<div class="item-list-tabs" id="subnav" role="navigation">
	<ul>
		<li class="feed"><a href="<?php bp_group_activity_feed_link(); ?>" title="<?php esc_attr_e( 'RSS Feed', 'bp-nouveau' ); ?>" class="no-ajax"><span class="bp-screen-reader-text"><?php _e( 'RSS', 'bp-nouveau' ); ?></span></a></li>

		<?php bp_nouveau_search_form(); ?>

		<li id="activity-filter-select" class="last filter">
			<label for="activity-filter-by"><span class="bp-screen-reader-text"><?php _e( 'Show:', 'bp-nouveau' ); ?></span></label>
			<select id="activity-filter-by" data-bp-filter="activity">

				<?php bp_nouveau_filter_options() ;?>

			</select>
		</li>
	</ul>
</div><!-- .item-list-tabs -->

<?php

/**
 * Fires before the display of the group activities list.
 *
 * @since 1.2.0
 */
do_action( 'bp_before_group_activity_content' ); ?>

<div class="activity single-group">

	<ul id="activity-stream" class="activity-list item-list" data-bp-list="activity">

		<li id="bp-activity-ajax-loader">loading</li>

	</ul>

</div><!-- .activity -->

<?php

/**
 * Fires after the display of the group activities list.
 *
 * @since 1.2.0
 */
do_action( 'bp_after_group_activity_content' ); ?>
