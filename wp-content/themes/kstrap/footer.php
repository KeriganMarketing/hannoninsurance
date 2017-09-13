<?php
/**
 * @package KMA
 * @subpackage kstrap
 * @since 1.0
 * @version 1.2
 */
//$socialLinks = new SocialSettingsPage();
$frontpage = get_option('page_on_front');
$phonenumber = (get_post_meta($frontpage, contact_information_phone_number, true) != '' ? get_post_meta($frontpage, contact_information_phone_number, true) : '');
$address = (get_post_meta($frontpage, contact_information_address, true) ? get_post_meta($frontpage, contact_information_address, true) : '');
$faialogo = (get_post_meta($frontpage, contact_information_faia_logo, true) ? get_post_meta($frontpage, contact_information_faia_logo, true) : '');
$tclogo = (get_post_meta($frontpage, contact_information_trusted_choice_logo, true) ? get_post_meta($frontpage, contact_information_trusted_choice_logo, true) : '');
?>
    <div id="sticky-footer" class="unstuck">
        <div id="bot">
            <div class="text-center">
                <div class="wave">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25.09 14.55" style="width: 80px;"><path class="wavepath" d="M25.09,14.55S23-.6,11.11,1.87C2.25,3.72,0,0,0,0S.34,12.55,10.55,9.75C18.08,7.69,25.09,14.55,25.09,14.55Z"/></svg>
                </div>
            </div>
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-3 text-center">
                        <div class="footer-logos">
                            <img src="<?php echo $faialogo; ?>" alt="Florida Association of Insurance Agents" >
                            <img src="<?php echo $tclogo; ?>" alt="Trusted Choice Independent Insurance Agents" >
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <?php wp_nav_menu(
                            [
                                'theme_location'  => 'footer-menu',
                                'container'       => '',
                                'container_id'    => 'navbar-footer',
                                'menu_class'      => 'nav justify-content-center text-center',
                                'fallback_cb'     => '',
                                'menu_id'         => 'footer-menu',
                                'walker'          => new WP_Bootstrap_Navwalker(),
                            ]
                        ); ?>
                    </div>
                    <div class="col-lg-3 text-center">
                        <div class="contact-info">
                            <p><a href="tel:<?php echo $phonenumber; ?>" ><?php echo $phonenumber; ?></a></p>
                            <p><?php echo nl2br($address); ?>
                            <p><a href="/privacy-policy/" >Privacy Policy</a></p>
                        </div>
                    </div>
                </div>
                <div class="row no-gutters justify-content-center align-items-center">
                    <div class="col-md-6 col-lg-4 my-auto justify-content-center text-center">
                        <p class="copyright">&copy;<?php echo date('Y'); ?> Hannon Insurance. All Rights Reserved.</p>
                    </div>
                    <div class="col-md-3 col-lg-2 my-auto justify-content-center text-center">
                        <p class="siteby"><svg version="1.1" id="kma" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="14" width="20" viewBox="0 0 12.5 8.7" style="enable-background:new 0 0 12.5 8.7;" xml:space="preserve">
                                <defs><style>.kma{fill:#b4be35;}</style></defs>
                                <path class="kma" d="M6.4,0.1c0,0,0.1,0.3,0.2,0.9c1,3,3,5.6,5.7,7.2l-0.1,0.5c0,0-0.4-0.2-1-0.4C7.7,7,3.7,7,0.2,8.5L0.1,8.1
                                c2.8-1.5,4.8-4.2,5.7-7.2C6,0.4,6.1,0.1,6.1,0.1H6.4L6.4,0.1z"/>
                            </svg> <a href="https://keriganmarketing.com">Site by KMA</a>.</p>
                    </div>
                </div>
            </div><!-- .container -->
        </div>
    </div>
</div>
<?php wp_footer(); ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-104409790-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>
