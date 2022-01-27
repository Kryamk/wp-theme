<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;

/*-------------------------------------
INDEX
=======================================
#. EL: Section Title
#. EL: About Area
#. EL: Owl Nav
#. EL: Owl Dots
#. EL: Post Slider
#. EL: Doctors Area
#. EL: Schedule
#. EL: Gallrey Tab
#. EL: Gallrey 1
#. EL: Gallrey 2
#. EL: Gallrey 3
#. EL: Call To Action
#. EL: Counter
#. EL: Info Box
#. EL: Text With Title
#. EL: Navigation Menu
#. EL: Contact
#. EL: Slider
#. EL: Price table
#. EL: Departments
#. EL: Services

-------------------------------------*/

$roofix 			= ROOFIX_THEME_PREFIX_VAR;
$primary_color    	= apply_filters( "{$roofix}_primary_color", RDTheme::$options['primary_color'] ); 
$secondery_color  	= apply_filters( "{$roofix}_secondery_color", RDTheme::$options['secondery_color'] ); 
$primary_txt_color  = apply_filters( "{$roofix}_primary_txt_color", RDTheme::$options['primary_txt_color'] ); 
$dark_primary_color  = apply_filters( "{$roofix}_dark_primary_color", RDTheme::$options['dark_primary_color'] ); 

$primary_rgb      	= Helper::hex2rgb( $primary_color );
$secondery_rgb      = Helper::hex2rgb( $secondery_color );
$dark_primary_rgb   = Helper::hex2rgb( $dark_primary_color );

?>

/*-------------------------------------
#. EL: Section Title
---------------------------------------*/
?>
.elementor-2410 .elementor-element.elementor-element-79b5630 .section-heading::after{
	background-color: <?php echo esc_html( $primary_color ); ?>;	
}
.rt-el-paragraph-title .rtin-title span {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.elementor-8 .elementor-element.elementor-element-2da73e0 .rtin-subtitle{
	color: <?php echo esc_html( $primary_color ); ?>;
}
.elementor-8 .elementor-element.elementor-element-2da73e0 .section-heading::after {
	background: <?php echo esc_html( $primary_color ); ?>;
}
.heading-layout1.theme4.style1::after,
.heading-layout1.theme3.style1::after {	
	background-color: <?php echo esc_html( $primary_color ); ?>;	
}
.heading-layout1.theme4.style1 p,
.heading-layout1.theme2.style1 p,
.heading-layout1.theme3.style1 p{
	color: <?php echo esc_html( $primary_color ); ?>;
}
.rt-el-title.style2 .rtin-title:after,
.rt-el-twt-3.rtin-dark .rtin-title:after{
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.heading-layout1::after {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.slick-slider-layout1 .slick-nav-wrap .slick-nav .nav-item.slick-current {
	border: none;
	background-color: <?php echo esc_html( $dark_primary_color ); ?>;
}
.progress-box-layout2 .inner-item .item-icon i,
.single-team-box-layout1 .item-content .item-social li,
.single-team-box-layout1 .item-content .item-mail i,
.service-box-layout5 .service-list li i,
.more-info-box .item-content div.process-list .sl-number,
.comments-area .main-comments .comment-meta .reply-area a,

.blog-box-layout1-new .item-content .item-date i,
.single-blog-box-layout1 .entry-meta li a:hover,
.blog-box-layout4 .item-content .btn-area li .item-btn i,
.blog-box-layout4 .item-content .entry-meta li a:hover,
.widget ul > li:hover::before,
.about-info-list .about-info li::after,
.service-box-layout6 .item-content .item-title a:hover,
.about-box-layout8 .item-content .list-item li i,
.blog-box-layout3 .item-content .entry-meta li a:hover,
.blog-box-layout3 .item-content .item-title a:hover,
.team-box-layout3 .item-content .item-social li a:hover,
.project-box-layout3 .project-single-content .item-content .item-heading .item-title a:hover,
.header-topbar-layout2 .phone-number i::before,
.progress-box-layout1 .progress-content .item-content .count-number,
.team-box-layout2 .item-img .item-btn-wrap a i,
.project-box-layout2-new .project-box .item-content .item-title a:hover,
.project-box-layout2-new .project-box .item-content .item-btn:hover,
.project-box-layout2 .item-content .item-btn-wrap .item-btn:hover,
.project-box-layout2 .item-content .item-heading .item-title a:hover,
.service-box-layout3 .item-content .btn-fill-lg i,
.about-box-layout5 .about-box-img:hover .sl-number,
.blog-box-layout1 .item-content .item-title a:hover,
.footer-bottom-wrap-layout1 .copyright a:hover,
.blog-box-layout1 .item-content .entry-meta li a:hover,
.elementor-588 .elementor-element.elementor-element-387889b .progress-box-style .item-icon i,
.heading-layout1 .item-subtitle,
.about-box-layout4 .about-box-img:hover .sl-number,
.wrapper .text-Primary,
.footer-wrap-layout1-new .footer-box-layout1 ul.menu > li:hover:before,
.blog-box-layout1-new .item-content .item-btn i,
.blog-box-layout1-new .item-content .item-btn:hover,
.blog-box-layout1-new .item-content .entry-meta li a:hover,
.process-box-layout1 .item-icon i:before,
.blog-box-layout1-new .item-content .item-title a:hover,
.service-box-layout1-new:hover .item-icon i:before,
.service-box-layout1-new .item-btn i,
.about-box-layout2 .item-subtitle,
.service-box-layout7 .item-icon i:before,
.header-topbar-layout1 .topbar-information .media .item-icon,
.team-box-layout2-new:hover .item-content .item-title a:hover,
.team-box-layout2-new:hover .item-content .social-icon li a:hover,
.service-box-layout2 .service-box-media .item-icon.icon-layout-2 i:before,
.item-single-image .item-img .item-icon .play-btn:hover i:before{
	color: <?php echo esc_html( $primary_color ); ?>;
}
.progress-box-layout1-new svg {
    fill: <?php echo esc_html( $dark_primary_color ); ?>;
}
.ghost-btn-md:hover,
.process-box-layout1:hover .item-icon {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.service-box-layout3d .item-content .btn-fill-lg:hover {
	background:<?php echo esc_html( $primary_color ); ?> !important;
}

.widget-search-box .stylish-input-group .input-group-addon:hover {
	background: <?php echo esc_html( $primary_color ); ?> !important;	
}

.bg-Primary,
.item-btn.rtin-style-1 {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}

.service-box-layout7 .item-content .title-style:after,
.team-box-layout2 .item-img .item-btn-wrap a:hover,
.team-box-layout2 .item-content .item-heading .item-title a:hover,
.header-topbar-layout1 .topbar-information .media:hover .item-icon,
.contact-wrap-layout-after:before,
.header-action-layout1 .offcanvas-menu-btn,
.action-box-layout1.btn-right-clip,
.process-list .title-style::after,
.more-info-box .item-content div.process-list:hover .sl-number,
.comments-area h3.comment-title::after,
.blog-box-layout4 .item-content .btn-area li .item-btn:hover,
.blog-box-layout4 .item-img .top-item,
.service-box-layout3d .item-content .title-style::after,
.widget-banner .banner-img .item-content .item-btn,
.service-box-layout3d .item-content .btn-fill-lg,
.service-box-layout6:hover .item-img .item-icon,
.why-choose-box-layout1 .item-content .title-style::after,
.heading-layout1 .title-style::after,
.team-box-layout4 .item-content .item-heading::after,
.service-box-layout6 .item-content .title-style:after,
.blog-box-layout3 .item-img .top-item,
.team-box-layout3 .item-content .item-heading::after,
.project-box-layout3 .project-single-content .item-content .item-heading::after,
.btn-fill-md:hover,
.about-box-layout8 .item-img .item-icon .play-btn,
.blog-box-layout2 .item-img .top-item,
.blog-box-layout2 .item-content .item-tag:hover,
.nav-control-layout1b .owl-nav .owl-prev, .nav-control-layout1b .owl-nav .owl-prev,
.select2-container--classic.select2-container--open .select2-selection--single .select2-selection__arrow,
.team-box-layout2 .item-content .item-heading::after,
.project-box-layout2 .item-content .item-btn-wrap .item-btn,
.service-box-layout2 .service-box-media:hover .item-icon.icon-layout-1,
.service-box-layout3 .item-content .title-style::after,
.footer-box-layout1 .footer-form-box .contact-form-box .form-group .item-btn,
.footer-box-layout1 .footer-social li a:hover,
.footer-box-layout1 .footer-title::after,
.contact-box-layout1 .media .item-icon,
.blog-box-layout1 .item-content .item-tag:hover,
.blog-box-layout1 .item-img .top-item,
.service-box-layout1 .item-img .sl-number,
.video-wrapper-inner .popup-video .player-wave .waves,
.ghost-btn-xl:hover,
.footer-wrap-layout1-new .footer-box-layout1 .footer-title:after,
.footer-wrap-layout1-new .footer-box-layout1 .footer-social ul li a:hover,
.contact-box-layout1-new .contact-box:hover .media .item-icon,
.team-box-layout1-new:hover .item-img .item-icon a,
.project-box-layout1-new .project-box-img:hover .item-content,
.header-menu.menu-layout1 .header-action-layout1,
.header-action-layout1 ul .header-action-btn .item-btn,
.slick-slider-layout1 .slick-content .slick-slider .item-img .item-content .item-btn:before,
.contact-box-layout3 .form-group .submit-btn,
.service-box-layout2-new .item-content .item-title:after,
.team-box-layout2-new .item-content .item-title:after,
.site.site-wrp .elementor-accordion .elementor-accordion-item .elementor-tab-title:hover,
.widget-form .contact-form-box .form-group .item-btn,
.site.site-wrp .elementor-accordion .elementor-accordion-item .elementor-tab-title.elementor-active,
.nav-control-layout1-new.owl-theme .owl-nav .owl-prev:hover,
.nav-control-layout1-new.owl-theme .owl-nav .owl-next:hover,
.widget-download .item-list > div a:hover,
.slider-box-form .about-box-layout3.services-sidebar .wpcf7-submit.item-btn,
.item-single-image .item-img .item-icon .play-btn,             
.project-box-layout4 .item-content .item-heading:after{
	background-color: <?php echo esc_html( $primary_color ); ?>;
}

.single-blog-box-layout1 .blog-author .item-social li a:hover,
.single-blog-box-layout1 .item-tag-area .item-social ul li a:hover,
.blog-box-layout1 .item-content .item-tag,
.widget-search-box .stylish-input-group .input-group-addon,
.project-box-layout2 .item-content,        
.widget-banner .banner-img .item-content,
.slider-box-form .about-box-layout3.services-sidebar .wpcf7-submit.item-btn:hover,
.service-box-layout7:hover,
.widget-download .item-list > div a,
.item-btn.rtin-style-1:hover,
.widget-form .contact-form-box .form-group .item-btn:hover,
.team-box-layout3 .item-content .item-heading:before,
.btn-fill-xl:hover,
.nav-control-layout1-new.owl-theme .owl-nav .owl-prev,
.nav-control-layout1-new.owl-theme .owl-nav .owl-next,
.team-box-layout2-new:hover,
.about-box-layout4-new .item-img .item-experience,
.header-menu.menu-layout2.rt-sticky,
.contact-wrap-layout-after,
.circle-btn:before,
.header-style-1 .header-action-btn .item-btn:hover,
.header-menu.menu-layout1,
.about-box-layout1-new .item-img:after,
.contact-box-layout1-new .contact-box .media .item-icon,
.project-box-layout1-new .project-box-img .item-content,
.footer-wrap-layout1-new .footer-box-layout1 .footer-form-box .contact-form-box .form-group .item-btn:hover,
.team-box-layout1-new .item-img .item-icon a,
.slick-slider-layout1 .slick-content .slick-slider .item-img .item-content .item-btn:hover:before {
	background-color: <?php echo esc_html( $secondery_color ); ?>;
	
}
.project-box-layout4 .item-img:after {  
    background: linear-gradient(to top, <?php echo esc_html( $primary_color ); ?>, transparent);  
}

.project-box-layout4 .item-content .btn-fill-md:hover{	
	background-color: <?php echo esc_html( $secondery_color ); ?> !important;	
}
.slick-slider-layout1 .slick-content .slick-slider .item-img .item-content .item-btn:hover:after {
    border-color: <?php echo esc_html( $secondery_color ); ?>;
}

.slick-slider-layout1 .slick-content .slick-slider .item-img .item-content .item-btn:after {   
    border: 2px solid <?php echo esc_html( $primary_color ); ?>;
}

.header-style-1 .header-action-btn .item-btn,
.contact-box-layout3 .form-group .submit-btn,
.header-topbar-layout1 .topbar-information .media:hover .item-icon {   
    border: 1px solid <?php echo esc_html( $primary_color ); ?>;
}

.header-style-1 .header-action-btn .item-btn:hover {   
    border: 1px solid <?php echo esc_html( $secondery_color ); ?>;
}

.post-each.post-each-single .entry-content-area .entry-tags span i,
.service-box-layout2:hover .item-icon i:before,
.widget-contact-info .media .item-icon i,
.news-meta-info.mar20-ul li i,
.blog-box-layout4 .item-content .entry-meta li i,
.post-each .entry-content-area:hover .entry-meta-2 li.vcard-author i,
.post-each .entry-content-area:hover .entry-meta-2 li.vcard-comments i,
.post-each .entry-content-area:hover .entry-meta-1 span.updated i,
.team-box-layout2-new .item-content .item-title a,
.blog-box-layout1-new .item-content .item-btn,
.service-box-layout1-new .item-btn,
.service-box-layout1-new:hover .item-title a,
 .secondery_color,
 .blog-box-layout1-new .item-content .item-btn:hover i{
	color:<?php echo esc_html( $secondery_color ); ?>;
	
}


.nav-control-layout3 .owl-nav div:hover,
.contact-box-layout1-new .contact-box:hover .media .item-icon {
	background:<?php echo esc_html( $primary_color ); ?> !important;	
}

@keyframes pulse {
  0% {
    box-shadow: 0 0 0 0 <?php echo esc_html( $primary_color ); ?>;
  }
  40% {
    box-shadow: 0 0 0 50px rgba(255, 194, 17, 0);
  }
  70% {
    box-shadow: 0 0 0 50px rgba(255, 194, 17, 0);
  }
  100% {
    box-shadow: 0 0 0 0 rgba(255, 194, 17, 0);
  }
}

.about-box-layout1d {

	background-color: rgba(<?php echo esc_html( $secondery_rgb ); ?>, 0.8);	
}

.team-box-layout4:hover .item-img img {	
	border-color: <?php echo esc_html( $primary_color ); ?>;
}
.nav-control-layout1b .owl-nav .owl-prev, .nav-control-layout1b .owl-nav .owl-next{
	background-color: <?php echo esc_html( $primary_color ); ?> !important;
}
.btn-fill-lg:hover{
	background-color: <?php echo esc_html( $primary_color ); ?> !important;
}
.project-box-layout1 .item-content .item-btn {
	border: 1px solid <?php echo esc_html( $primary_color ); ?>;
}
.service-box-layout1:hover .item-img {
	border-color: <?php echo esc_html( $primary_color ); ?>;	
}

.team-box-layout1:hover .item-content,
.about-box-layout1 {
	background-color: rgba(<?php echo esc_html( $secondery_rgb ); ?>, 0.95);	
}

.primary-border {
	border: 1px solid <?php echo esc_html( $primary_color ); ?>;
}


.slick-slider-layout1 .slick-nav-wrap .slick-nav .nav-item:hover{
	background-color: <?php echo esc_html( $dark_primary_color ); ?>;
}
.primary-bg {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.secondery-bg {
	background-color: <?php echo esc_html( $secondery_color ); ?>;
}

.isotop-btn-1 .current.nav-item {
	background-color: <?php echo esc_html( $primary_color ); ?>;
	border-color: <?php echo esc_html( $primary_color ); ?>;
	box-shadow: 0px 5px 21px 0px rgba(<?php echo esc_html( $secondery_rgb ); ?>, 0.6);
}

.blog-box-layout3 .item-img .top-item .item-date::after,
.blog-box-layout2 .item-img .top-item .item-date::after {
	box-shadow: 0px 5px 5px 0px rgba(<?php echo esc_html( $secondery_rgb ); ?>, 0.6);
}
.blog-box-layout3 .item-img .top-item .item-date::before,
.blog-box-layout2 .item-img .top-item .item-date::before {	
	box-shadow: 0px 5px 5px 0px rgba(<?php echo esc_html( $secondery_rgb ); ?>, 0.6);
}
.nav-control-layout1 .owl-nav .owl-prev,
.nav-control-layout1 .owl-nav .owl-next{
	background: <?php echo esc_html( $primary_color ); ?> !important;
}
.nav-control-layout1b .owl-nav .owl-prev,
.nav-control-layout1b .owl-nav .owl-next
{
	background: <?php echo esc_html( $primary_color ); ?> !important;
}



.service-box-layout4 .item-content {	
	background-color: rgba(<?php echo esc_html( $secondery_rgb ); ?>, 0.8);	
}
.nav-control-layout1w .owl-nav .owl-prev, .nav-control-layout1w .owl-nav .owl-next {	
	background: <?php echo esc_html( $primary_color ); ?> !important;
}

<?php
/*-------------------------------------
#. EL: Owl Dots
---------------------------------------*/
?>
.rt-owl-dot .owl-theme .owl-dots .owl-dot.active span,
.rt-owl-dot .owl-theme .owl-dots .owl-dot:hover span {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}

<?php
/*-------------------------------------
#. EL: Post Slider
---------------------------------------*/
?>
.rt-el-post-slider .rtin-item .rtin-content-area .date-time {
		color: <?php echo esc_html( $primary_color ); ?>;
}
.rt-el-post-slider .rtin-item .rtin-content-area .rtin-header .rtin-title a:hover,
.rt-el-post-slider .rtin-item .rtin-content-area .read-more-btn i,
.rt-el-post-slider .rtin-item .rtin-content-area .read-more-btn:hover {
	color: <?php echo esc_html( $primary_color ); ?>;
}

 
<?php
/*-------------------------------------
#. EL: Gallrey Tab
---------------------------------------*/
?>
.rt-isotope-wrapper .isotop-btn .current {
	background-color: <?php echo esc_html( $primary_color ); ?>;
	color: <?php echo esc_html( $primary_txt_color ); ?>;
}
.rt-isotope-wrapper .isotop-btn a:hover {
	background-color: <?php echo esc_html( $primary_color ); ?>;
	color: <?php echo esc_html( $primary_txt_color ); ?>;
}
.isotop-btn .current,
.rt-el-gallrey-tab .current {
	background-color: <?php echo esc_html( $primary_color ); ?>;
	color: <?php echo esc_html( $primary_txt_color ); ?>;
}
.isotop-btn a:hover,
.rt-el-gallrey-tab a:hover {
	background-color: <?php echo esc_html( $primary_color ); ?>;
	color: <?php echo esc_html( $primary_txt_color ); ?>;
}
.rt-el-gallrey-tab a {
	border: 1px solid <?php echo esc_html( $primary_color ); ?>;
}
