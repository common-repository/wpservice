<?php if( !class_exists("WPServiceCom") ) exit; ?>
<div class="wrap wpservicecom-wrap">

    <div class='wpservicecom-header' >

        <a class='wpservicecom-logo' href="https://service.com" target="_blank"></a>

        <div class="wpservicecom-header-content" >
            <p>We provide a free way for your customers to Chat, Hire and Pay - Right from your own webite! Select from the options below to add to your site right now! Manage customers, quotes/invoices and projects with our platform. Even manage your business on the go with our mobile apps</p>
        </div>

        <div class="wpservicecom-stores">
            <a href="https://itunes.apple.com/us/app/pro-tools-for-service.com/id1051149040?mt=8" target="_blank" class="wpservicecom-applestore">App Store</a>
            <a href="https://play.google.com/store/apps/details?id=com.service.pro&amp;hl=en" target="_blank" class="wpservicecom-playstore">Play Store</a>
        </div>

        <div class="wpservicecom-links" >
            
            <div class="wpservicecom-link" >
                <a href="https://service.com/" target="_blank" >Local home improvement and repair | Service.com</a>
                <p>Service.com is the easiest way to Chat, Hire, and Pay for home improvement.<br/>Search for Quality Contractors and pay safely and securely</p>
            </div>
            
            <div class="wpservicecom-link" >
               <a href="https://play.google.com/store/apps/details?id=com.service.pro&amp;hl=en" target="_blank" >Pro Tools - Android Apps on Google Play</a>
                <p>Get service.com home service leads at no upfront cost with Service Pro Tools.</p>
            </div>
            
            <div class="wpservicecom-link" >
                <a href="https://itunes.apple.com/us/app/pro-tools-for-service.com/id1051149040?mt=8" target="_blank" >Pro Tools for Service.com service professionals on the App Store</a>
                <p>Read reviews, compare customer ratings, see screenshots, and learn more about Pro Tools for Service.com service professionals.<br/>Download Pro Tools for Service.com service professionals and enjoy it on your iPhone, iPad, and iPod touch.</p>
            </div>

        </div>

    </div>

    <h1>Create Your Service Section</h1>
    
    <div class="wpservicecom-shortcode <?php echo !$this->validate_options()?"error":""; ?>">
        <?php if( $this->validate_options() ) : ?>
   		<p>Please add this shortcode to your page or post <code>[wpservice]</code></p>
        <?php elseif( !$opts["slug"] ) : ?>
        <p>Enter your slug.</p>
        <?php elseif( !$opts["button"] ) : ?>
        <p>Select button style.</p>
        <?php elseif( !$opts["terms"] ) : ?>
        <p>Please accept out terms.</p>
        <?php endif; ?>
    </div>

    <div class="wpservicecom-content" >
     
        <form name="form" method="post" action="options-general.php?page=wpservicecom-settings" id="wpservicecom_form">

            <input type="hidden" name="action" value="wpservicecom_save">
            <?php wp_nonce_field( 'wpservicecom_save', 'wpservicecom_nonce' ); ?>

            <h3>Create the service button or content</h3>

            <table class="form-table" >
                <tr>
                    <th><label for="wpservicecom_slug" >Service.com Slug:</label></th>
                    <td>
                        <span>https://service.com/<input type="text" name="wpservicecom_slug" value="<?php echo esc_attr($opts["slug"]); ?>" id="wpservicecom_slug" /></span>
                        <span>&nbsp;or&nbsp;</span>
                        <a href="https://service.com/register" class="button button-primary" target="_blank">Register to get page</a><br/>
                        <span class="description" >enter your slug from service.com</span>
                    </td>
                </tr>
                <tr>
                    <th>Button Type:</th>
                    <td>
                        <div class="wpservicecom-buttons" >
                            <div class="wpservicecom-button-row" >
                                <div class="wpservicecom-button wpservicecom-button-chat-white" >
                                    <input type="radio" name="wpservicecom_button" value="chat-white" id="wpservicecom_button_chat_white" <?php checked($opts["button"],"chat-white"); ?> />
                                    <label for="wpservicecom_button_chat_white" ></label>
                                </div>
                                <div class="wpservicecom-button wpservicecom-button-book-white" >
                                    <input type="radio" name="wpservicecom_button" value="book-white" id="wpservicecom_button_book_white" <?php checked($opts["button"],"book-white"); ?> />
                                    <label for="wpservicecom_button_book_white" ></label>
                                </div>
                                <div class="wpservicecom-button wpservicecom-button-pay-white" >
                                    <input type="radio" name="wpservicecom_button" value="pay-white" id="wpservicecom_button_pay_white" <?php checked($opts["button"],"pay-white"); ?> />
                                    <label for="wpservicecom_button_pay_white" ></label>
                                </div>
                            </div>
                            <div class="wpservicecom-button-row" >
                                <div class="wpservicecom-button wpservicecom-button-chat-black" >
                                    <input type="radio" name="wpservicecom_button" value="chat-black" id="wpservicecom_button_chat_black" <?php checked($opts["button"],"chat-black"); ?> />
                                    <label for="wpservicecom_button_chat_black" ></label>
                                </div>
                                <div class="wpservicecom-button wpservicecom-button-book-black" >
                                    <input type="radio" name="wpservicecom_button" value="book-black" id="wpservicecom_button_book_black" <?php checked($opts["button"],"book-black"); ?> />
                                    <label for="wpservicecom_button_book_black" ></label>
                                </div>
                                <div class="wpservicecom-button wpservicecom-button-pay-black" >
                                    <input type="radio" name="wpservicecom_button" value="pay-black" id="wpservicecom_button_pay_black" <?php checked($opts["button"],"pay-black"); ?> />
                                    <label for="wpservicecom_button_pay_black" ></label>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th><label for="wpservicecom_optional" >Optional Text:</label></th>
                    <td>
                        <div id="wpservicecom_optional_wrap" >
                            <textarea id="wpservicecom_optional_text" name="wpservicecom_optional_text" ><?php echo esc_textarea($opts["optional_text"]); ?></textarea><br/>
                            <span class='description' >leave empty to hide</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th><label for="wpservicecom_terms" >Terms:</label></th>
                    <td>
                        <label><input type="checkbox" value="1" name="wpservicecom_terms" id="wpservicecom_terms" <?php checked( $opts["terms"],1); ?> /> Please, review our Term and Conditions.  Paying via e-check has no fee, debit card fee is 1% and credit card fee is 3% percent - Note: that there will be no service fee if the lead originated from your own site. If we provide you with a lead, then we charge a success fee of 4-7% but remember, you can set your own charges for the quoted service.</label>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <div id="wpservicecom_validation" ></div>
                        <input type="submit" class="button button-primary" value="Save Settings" id="wpservicecom_submit" />
                        <p class="wpservicecom_powered_by">Powered by <a href="https://service.com/" target="_blank">service.com</a></p>
                    </td>
                </tr>
            </table>

        </form>

     </div>
</div>