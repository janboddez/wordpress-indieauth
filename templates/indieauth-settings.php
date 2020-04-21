<div class="wrap">
	<h1><?php esc_html_e( 'IndieAuth Settings', 'indieauth' ); ?></h1>

<?php $checked = get_option( 'indieauth_config', 'local' ); ?>

	<form method="post" action="options.php">
		<?php settings_fields( 'indieauth' ); ?>

		<h2 class="title"><?php _e( 'IndieAuth', 'indieauth' ); ?></h2>

		<p><?php _e( 'With IndieAuth, you can use your blog, to log into sites like the IndieWeb-Wiki. Please run a Site Health check to ensure this will work with your site', 'indieauth' ); ?></p>

		<table class="form-table">
			<tbody>

				<tr>
					<th>
						<?php _e( 'Endpoints', 'indieauth' ); ?>
					</th>
					<td>
						<p>
							<?php _e( 'Authorization Endpoint:', 'indieauth' ); ?><br />
							<code><?php echo indieauth_get_authorization_endpoint(); ?></code>
						</p>
						<p>
							<?php _e( 'Token Endpoint:', 'indieauth' ); ?><br />
							<code><?php echo indieauth_get_token_endpoint(); ?></code>
						</p>
					</td>
				</tr>
				<tr>
					<th>
						<?php _e( 'Configuration', 'indieauth' ); ?>
					</th>
					<td>
						<p><input type="radio" name="indieauth_config" value="local" <?php checked( $checked, 'local' ); ?>><strong><?php _e( 'Use Your Own Site as an IndieAuth Endpoint', 'indieauth' ); ?></strong> <br />
						<?php _e( 'The endpoint is hosted entirely inside your WordPress instance and requires no external server. When you try to log into a client with your URL you will be presented with your WordPress login screen after which you will be asked if you wish to grant the client permission to act as you. This is the recommended option.', 'indieauth' ); ?>
						</p>
						<p><input type="radio" name="indieauth_config" value="remote" <?php checked( $checked, 'remote' ); ?>> <strong><?php _e( 'Use Another Site as an IndieAuth Endpoint', 'indieauth' ); ?></strong> <br />
						<?php _e( 'For those who do not wish to host their own IndieAuth endpoint or delegate their site authentication to another site. By default, this is indieauth.com which is free for use, but can be any endpoint.', 'indieauth' ); ?>
						</p>
					</td>
				</tr>
				<tr>
					<th>
						<?php _e( 'Set User to Represent Site URL', 'indieauth' ); ?>
					</th>
					<td>
						<label for="indieauth_root_user">
							<?php wp_dropdown_users(
								array(
									'show_option_all' => __( 'None', 'indieauth' ),
									'name' => 'indieauth_root_user',
									'id' => 'indieauth_root_user',
									'show' => 'display_name_with_login',
									'selected' => get_option( 'indieauth_root_user' )
								)
							); ?>
							<?php _e( 'Set a User who will represent the URL of the site', 'indieauth' ); ?>
						</label>
					</td>
				</tr>
			</tbody>
		</table>

		<h2 class="title"><?php _e( 'Web Sign-In', 'indieauth' ); ?></h2>

		<p><?php _e( 'Enable Web Sign-In for your blog, so others can use IndieAuth or RelMeAuth to log into this site.', 'indieauth' ); ?></p>

		<table class="form-table">
			<tbody>
				<tr>
					<th>
						<?php _e( 'Use IndieAuth login', 'indieauth' ); ?>
					</th>
					<td>
						<label for="indieauth_show_login_form">
							<input type="checkbox" name="indieauth_show_login_form" id="indieauth_show_login_form" value="1" <?php
								echo checked( true, get_option( 'indieauth_show_login_form' ) );  ?> />
							<?php _e( 'Add a link to the login form to authenticate using an IndieAuth endpoint.', 'indieauth' ); ?>
						</label>
					</td>
				</tr>
			</tbody>
		</table>

		<?php do_settings_fields( 'indieauth', 'web_signin' ); ?>

		<?php do_settings_sections( 'indieauth' ); ?>

		<?php submit_button(); ?>
	</form>
</div>
