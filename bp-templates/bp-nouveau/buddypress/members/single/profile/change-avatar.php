<?php
/**
 * BuddyPress - Members Profile Change Avatar
 *
 * @since 1.0.0
 *
 * @package BP Nouveau
 */

?>

<h2 class="screen-heading"><?php _e( 'Change Profile Photo', 'bp-nouveau' ); ?></h2>

<?php bp_nouveau_xprofile_hook( 'before', 'avatar_upload_content' ); ?>

<?php if ( !(int)bp_get_option( 'bp-disable-avatar-uploads' ) ) : ?>

	<p class="bp-feedback info"><span class="bp-help-text"><?php _e( 'Your profile photo will be used on your profile and throughout the site. If there is a <a href="http://gravatar.com">Gravatar</a> associated with your account email we will use that, or you can upload an image from your computer.', 'bp-nouveau' ); ?></span></p>

	<form action="" method="post" id="avatar-upload-form" class="standard-form" enctype="multipart/form-data">

		<?php if ( 'upload-image' == bp_get_avatar_admin_step() ) : ?>

			<?php wp_nonce_field( 'bp_avatar_upload' ); ?>
			<p class="bp-help-text"><?php _e( 'Click below to select a JPG, GIF or PNG format photo from your computer and then click \'Upload Image\' to proceed.', 'bp-nouveau' ); ?></p>

			<p id="avatar-upload">
				<label for="file" class="bp-screen-reader-text"><?php _e( 'Select an image', 'bp-nouveau' ); ?></label>
				<input type="file" name="file" id="file" />
				<input type="submit" name="upload" id="upload" value="<?php esc_attr_e( 'Upload Image', 'bp-nouveau' ); ?>" />
				<input type="hidden" name="action" id="action" value="bp_avatar_upload" />
			</p>

			<?php if ( bp_get_user_has_avatar() ) : ?>
				<p class="bp-help-text"><?php _e( "If you'd like to delete your current profile photo but not upload a new one, please use the delete profile photo button.", 'bp-nouveau' ); ?></p>
				<p><a class="button edit" href="<?php bp_avatar_delete_link(); ?>" title="<?php esc_attr_e( 'Delete Profile Photo', 'bp-nouveau' ); ?>"><?php _e( 'Delete My Profile Photo', 'bp-nouveau' ); ?></a></p>
			<?php endif; ?>

		<?php endif; ?>

		<?php if ( 'crop-image' == bp_get_avatar_admin_step() ) : ?>

			<p class="bp-help-text screen-header"><?php _e( 'Crop Your New Profile Photo', 'bp-nouveau' ); ?></p>

			<img src="<?php bp_avatar_to_crop(); ?>" id="avatar-to-crop" class="avatar" alt="<?php esc_attr_e( 'Profile photo to crop', 'bp-nouveau' ); ?>" />

			<div id="avatar-crop-pane">
				<img src="<?php bp_avatar_to_crop(); ?>" id="avatar-crop-preview" class="avatar" alt="<?php esc_attr_e( 'Profile photo preview', 'bp-nouveau' ); ?>" />
			</div>

			<input type="submit" name="avatar-crop-submit" id="avatar-crop-submit" value="<?php esc_attr_e( 'Crop Image', 'bp-nouveau' ); ?>" />

			<input type="hidden" name="image_src" id="image_src" value="<?php bp_avatar_to_crop_src(); ?>" />
			<input type="hidden" id="x" name="x" />
			<input type="hidden" id="y" name="y" />
			<input type="hidden" id="w" name="w" />
			<input type="hidden" id="h" name="h" />

			<?php wp_nonce_field( 'bp_avatar_cropstore' ); ?>

		<?php endif; ?>

	</form>

	<?php
	/**
	 * Load the Avatar UI templates
	 *
	 * @since  2.3.0
	 */
	bp_avatar_get_templates(); ?>

<?php else : ?>

	<p class="bp-help-text"><?php _e( 'Your profile photo will be used on your profile and throughout the site. To change your profile photo, please create an account with <a href="http://gravatar.com">Gravatar</a> using the same email address as you used to register with this site.', 'bp-nouveau' ); ?></p>

<?php endif; ?>

<?php bp_nouveau_xprofile_hook( 'after', 'avatar_upload_content' );
