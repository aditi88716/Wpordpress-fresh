<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Road_Themes
 * @since Road Themes 1.0
 */
?>
<?php global $road_opt; 
if(is_ssl()){
	$road_opt['logo_main']['url'] = str_replace('http:', 'https:', $road_opt['logo_main']['url']);
}
?>
		<div class="header-container layout2 skin2">
			<div class="header">
				<div class="container">
					<div class="header-inner">
						<div class="row">
							<div class="col-xs-12 col-md-3">
								<?php if( isset($road_opt['logo_main']['url']) ){ ?>
									<div class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo esc_url($road_opt['logo_main']['url']); ?>" alt="" /></a></div>
								<?php
								} else { ?>
									<h1 class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
									<?php
								} ?>
							</div>
							<div class="col-xs-12 col-md-9">
								<?php if( class_exists('WC_Widget_Product_Categories') && class_exists('WC_Widget_Product_Search') ) { ?>
									<div class="header-search">
										<div class="cate-toggler"><?php _e('All Categories', 'roadthemes');?></div>
										<?php the_widget('WC_Widget_Product_Categories', array('hierarchical' => true, 'title' => 'Categories', 'orderby' => 'order')); ?>
										<?php the_widget('WC_Widget_Product_Search', array('title' => 'Search')); ?>
									</div>
								<?php } ?>

								<div class="top-link">
									<?php if ( class_exists( 'WC_Widget_Cart' ) ) {
											the_widget('Custom_WC_Widget_Cart'); 
									} ?>
									<div class="header-login-form">
										<span class="lock-icon">Icon</span>
										<div class="acc-form">
											<div class="acc-form-inner">
												<div class="acc-form-padding">
												<?php if ( is_user_logged_in() ) {
													$current_user = wp_get_current_user();
													_e('Welcome ', 'roadthemes');
													echo esc_html($current_user->user_firstname);
													?>
													<p class="acc-buttons">
														<a class="acc-btn logout-link" href="<?php echo wp_logout_url(home_url()); ?>" title="<?php echo _e('Logout', 'roadthemes');?>"><?php echo _e('Logout', 'roadthemes');?></a>
														<a class="acc-btn" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','roadthemes'); ?>"><?php _e('My Account','roadthemes'); ?></a>
													</p>
												<?php } else { ?>
													<h3 class="widget-title"><?php echo esc_html($road_opt['login_title']); ?></h3>
												<?php 
													wp_login_form( array('form_id' => 'top-loginform') ); ?>
													<div class="acc-link">
														<a class="lost-pwlink" href="<?php echo wp_lostpassword_url( get_permalink() ); ?>" title="<?php _e('Lost Password','roadthemes'); ?>"><?php _e('Lost Password','roadthemes'); ?></a>
														<?php wp_register('', ''); ?>
													</div><?php
												} ?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="nav-container">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-md-9 col-md-push-3">
								<div class="horizontal-menu">
									<div class="visible-large">
										<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'primary-menu-container', 'menu_class' => 'nav-menu' ) ); ?>
									</div>
									<div class="visible-small mobile-menu">
										<div class="nav-container">
											<div class="mbmenu-toggler"><?php echo esc_html($road_opt['mobile_menu_label']);?><span class="mbmenu-icon"></span></div>
											<?php wp_nav_menu( array( 'theme_location' => 'mobilemenu', 'container_class' => 'mobile-menu-container', 'menu_class' => 'nav-menu' ) ); ?>
										</div>
									</div>
								</div>
							</div>
						
							<div class="col-xs-12 col-md-3 col-md-pull-9">
								<?php
								$cat_menu_class = '';
								if(isset($road_opt['categories_menu_home']) && $road_opt['categories_menu_home']) {
									$cat_menu_class .=' show_home';
								}
								if(isset($road_opt['categories_menu_sub']) && $road_opt['categories_menu_sub']) {
									$cat_menu_class .=' show_inner';
								}
								?>
								<div class="categories-menu visible-large <?php echo esc_attr($cat_menu_class); ?>">
									<div class="catemenu-toggler"><i class="fa fa-bars"></i><span><?php if(isset($road_opt)) { echo esc_html($road_opt['categories_menu_label']); } else { _e('Category', 'roadthemes'); } ?></span><i class="fa fa-chevron-circle-down"></i></div>
									<?php wp_nav_menu( array( 'theme_location' => 'categories', 'container_class' => 'categories-menu-container', 'menu_class' => 'categories-menu' ) ); ?>
									<div class="morelesscate">
										<span class="morecate"><i class="fa fa-plus"></i><?php if ( isset($road_opt['categories_more_label']) && $road_opt['categories_more_label']!='' ) { echo esc_html($road_opt['categories_more_label']); } else { _e('More Categories', 'roadthemes'); } ?></span>
										<span class="lesscate"><i class="fa fa-minus"></i><?php if ( isset($road_opt['categories_less_label']) && $road_opt['categories_less_label']!='' ) { echo esc_html($road_opt['categories_less_label']); } else { _e('Close Menu', 'roadthemes'); } ?></span>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div><!-- .header -->
			<div class="clearfix"></div>
		</div>