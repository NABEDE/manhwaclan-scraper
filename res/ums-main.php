<?php
   function manhwaclan_admin_settings()
   {
      $theme = wp_get_theme();
      if ( 'Madara' != $theme->name && 'Madara' != $theme->parent_theme ) {
          echo '<h1>This plugin requires the "Madara" theme to be installed and active on this site before it can function! Please install it from here: <a href="https://mangabooth.com/product/wp-manga-theme-madara/" target="_blank">Madara - WordPress Theme for Manga</a></h1>';
          return;
      }
      if( ! class_exists('WP_MANGA_STORAGE') ) {
          echo '<h1>This plugin requires the "Madara Core" plugin to be installed and active on this site before it can function! Please install it from here: <a href="https://mangabooth.com/product/wp-manga-theme-madara/" target="_blank">Madara - WordPress Theme for Manga</a></h1>';
          return;
      }
   ?>
<div class="wp-header-end"></div>
<div class="wrap gs_popuptype_holder seo_pops">
   <div>
      <form autocomplete="off" id="myForm" method="post" action="<?php if(is_multisite() && is_network_admin()){echo '../options.php';}else{echo 'options.php';}?>">
         <div class="cr_autocomplete">
            <input type="password" id="PreventChromeAutocomplete" 
               name="PreventChromeAutocomplete" autocomplete="address-level4" />
         </div>
         <?php
            settings_fields('manhwaclan_option_group');
            do_settings_sections('manhwaclan_option_group');
            $manhwaclan_Main_Settings = get_option('manhwaclan_Main_Settings', false);
            if (isset($manhwaclan_Main_Settings['manhwaclan_enabled'])) {
                $manhwaclan_enabled = $manhwaclan_Main_Settings['manhwaclan_enabled'];
            } else {
                $manhwaclan_enabled = '';
            }
            if (isset($manhwaclan_Main_Settings['headlessbrowserapi_key'])) {
                $headlessbrowserapi_key = $manhwaclan_Main_Settings['headlessbrowserapi_key'];
            } else {
                $headlessbrowserapi_key = '';
            }
            if (isset($manhwaclan_Main_Settings['deepl_auth'])) {
                $deepl_auth = $manhwaclan_Main_Settings['deepl_auth'];
            } else {
                $deepl_auth = '';
            }
            if (isset($manhwaclan_Main_Settings['manga_storage'])) {
                $manga_storage = $manhwaclan_Main_Settings['manga_storage'];
            } else {
                $manga_storage = '';
            }
            if (isset($manhwaclan_Main_Settings['bing_auth'])) {
                $bing_auth = $manhwaclan_Main_Settings['bing_auth'];
            } else {
                $bing_auth = '';
            }
            if (isset($manhwaclan_Main_Settings['bing_region'])) {
                $bing_region = $manhwaclan_Main_Settings['bing_region'];
            } else {
                $bing_region = '';
            }
            if (isset($manhwaclan_Main_Settings['deppl_free'])) {
                $deppl_free = $manhwaclan_Main_Settings['deppl_free'];
            } else {
                $deppl_free = '';
            }
            if (isset($manhwaclan_Main_Settings['enable_detailed_logging'])) {
                $enable_detailed_logging = $manhwaclan_Main_Settings['enable_detailed_logging'];
            } else {
                $enable_detailed_logging = '';
            }
            if (isset($manhwaclan_Main_Settings['enable_logging'])) {
                $enable_logging = $manhwaclan_Main_Settings['enable_logging'];
            } else {
                $enable_logging = '';
            }
            if (isset($manhwaclan_Main_Settings['enable_cloudflare'])) {
                $enable_cloudflare = $manhwaclan_Main_Settings['enable_cloudflare'];
            } else {
                $enable_cloudflare = '';
            }
            if (isset($manhwaclan_Main_Settings['manga_storage'])) {
                $manga_storage = $manhwaclan_Main_Settings['manga_storage'];
            } else {
                $manga_storage = '';
            }
            if (isset($manhwaclan_Main_Settings['auto_clear_logs'])) {
                $auto_clear_logs = $manhwaclan_Main_Settings['auto_clear_logs'];
            } else {
                $auto_clear_logs = '';
            }
            if (isset($manhwaclan_Main_Settings['rule_timeout'])) {
                $rule_timeout = $manhwaclan_Main_Settings['rule_timeout'];
            } else {
                $rule_timeout = '';
            }
            if (isset($manhwaclan_Main_Settings['request_timeout'])) {
                $request_timeout = $manhwaclan_Main_Settings['request_timeout'];
            } else {
                $request_timeout = '';
            }
            if (isset($manhwaclan_Main_Settings['phantom_timeout'])) {
                $phantom_timeout = $manhwaclan_Main_Settings['phantom_timeout'];
            } else {
                $phantom_timeout = '';
            }
            if (isset($manhwaclan_Main_Settings['phantom_path'])) {
                $phantom_path = $manhwaclan_Main_Settings['phantom_path'];
            } else {
                $phantom_path = '';
            }
            if (isset($manhwaclan_Main_Settings['proxy_url'])) {
                $proxy_url = $manhwaclan_Main_Settings['proxy_url'];
            } else {
                $proxy_url = '';
            }
            if (isset($manhwaclan_Main_Settings['proxy_auth'])) {
                $proxy_auth = $manhwaclan_Main_Settings['proxy_auth'];
            } else {
                $proxy_auth = '';
            }
            if (isset($_GET['settings-updated'])) {
            ?>
         <div id="message" class="updated">
            <p class="cr_saved_notif"><strong>&nbsp;<?php echo esc_html__('Settings saved.', 'ultimate-manga-scraper');?></strong></p>
         </div>
         <?php
            $get = get_option('coderevolution_settings_changed', 0);
            if($get == 1)
            {
                delete_option('coderevolution_settings_changed');
            ?>
         <div id="message" class="updated">
            <p class="cr_failed_notif"><strong>&nbsp;<?php echo esc_html__('Plugin registration failed!', 'ultimate-manga-scraper');?></strong></p>
         </div>
         <?php 
            }
            elseif($get == 2)
            {
                    delete_option('coderevolution_settings_changed');
            ?>
         <div id="message" class="updated">
            <p class="cr_saved_notif"><strong>&nbsp;<?php echo esc_html__('Plugin registration successful!', 'ultimate-manga-scraper');?></strong></p>
         </div>
         <?php 
            }
                }
            ?>
         <div>
            <div class="manhwaclan_class">
               <table class="widefat">
                  <tr>
                     <td>
                        <h1>
                           <span class="gs-sub-heading"><b>Madara Scraper - <?php echo esc_html__('Main Switch:', 'ultimate-manga-scraper');?></b>&nbsp;</span>
                           <span class="cr_07_font">v1.0&nbsp;</span>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Enable or disable this plugin. This acts like a main switch.", 'ultimate-manga-scraper');
                                    ?>
                              </div>
                           </div>
                        </h1>
                     </td>
                     <td>
                        <div class="slideThree">	
                           <input class="input-checkbox" type="checkbox" id="manhwaclan_enabled" name="manhwaclan_Main_Settings[manhwaclan_enabled]"<?php
                              if ($manhwaclan_enabled == 'on')
                                  echo ' checked ';
                              ?>>
                           <label for="manhwaclan_enabled"></label>
                        </div>
                     </td>
                  </tr>
               </table>
            </div>
            <div><?php if($manhwaclan_enabled != 'on'){echo '<div class="crf_bord cr_color_red cr_auto_update">' . esc_html__('This feature of the plugin is disabled! Please enable it from the above switch.', 'ultimate-manga-scraper') . '</div>';}?>
               <table class="widefat">
                  <tr>
                     <td colspan="2">
                        <h3><?php echo esc_html__("Scraping Enhancements:", 'ultimate-manga-scraper');?></h3>
                     </td>
                  </tr>
                  <tr>
                    <td>
                       <div>
                          <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                             <div class="bws_hidden_help_text cr_min_260px">
                                <?php
                                   echo sprintf( wp_kses( __( "If you wish to use the HeadlessBrowserAPI to render JavaScript generated content for your scraped pages, enter your API key here. Get one <a href='%s' target='_blank'>here</a>. If you enter a value here, new options will become available in the 'Use PhantomJs/Puppeteer/Tor To Parse JavaScript On Pages' in importing rule settings.", 'ultimate-manga-scraper'), array(  'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( 'https://headlessbrowserapi.com/pricing/' ) );
                                   ?>
                             </div>
                          </div>
                          <b><a href="https://headlessbrowserapi.com/pricing/" target="_blank"><?php echo esc_html__("HeadlessBrowserAPI Key (Optional)", 'ultimate-manga-scraper');?>:</a></b>
                          <?php
                           $call_count = get_option('headless_calls', false);
                           if($headlessbrowserapi_key != '' && $call_count !== false)
                           {
                              echo esc_html__("Remaining API Calls For Today: ", 'ultimate-manga-scraper') . '<b>' . $call_count . '</b>';
                           }
                          ?>
                          <div class="cr_float_right bws_help_box bws_help_box_right dashicons cr_align_middle"><img class="cr_align_middle" src="<?php echo plugins_url('../images/new.png', __FILE__);?>" alt="new feature"/>
                                                      <div class="bws_hidden_help_text cr_min_260px"><?php echo esc_html__("New feature added to this plugin: it is able to use HeadlessBrowserAPI to scrape with JavaScript rendered content any website from the internet. Also, the Tor node of the API will be able to scrape .onion sites from the Dark Net!", 'ultimate-manga-scraper');?>
                                                      </div>
                                                   </div>
                       </div>
                    </td>
                    <td>
                       <div>
                          <input type="password" autocomplete="off" id="headlessbrowserapi_key" placeholder="<?php echo esc_html__("API key", 'ultimate-manga-scraper');?>" name="manhwaclan_Main_Settings[headlessbrowserapi_key]" value="<?php
                             echo esc_html($headlessbrowserapi_key);
                             ?>"/>
                       </div>
                    </td>
                 </tr>
                  <tr>
                     <td colspan="2">
                        <h3><?php echo esc_html__("Plugin Options:", 'ultimate-manga-scraper');?></h3>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Please check this checkbox if your server has CloudFlare caching active. This is needed to prevent some issues happening, because CloudFlare is limiting the execution time of plugins to 100 seconds.", 'ultimate-manga-scraper');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("My Server Is Using CloudFlare Caching:", 'ultimate-manga-scraper');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="enable_cloudflare" name="manhwaclan_Main_Settings[enable_cloudflare]" onclick="mainChanged()"<?php
                        if ($enable_cloudflare == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Select the storage you wish to use to store scraped manga. To display more options here, set up storage settings in Madara Theme Settings.", 'ultimate-manga-scraper');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Manga Storage Device:", 'ultimate-manga-scraper');?></b>
                        </div>
                     </td>
                     <td>
                        <div>
                           <select id="manga_storage" name="manhwaclan_Main_Settings[manga_storage]" >
                           <?php
                           if(!isset($GLOBALS['wp_manga']))
                           {
                              echo '<option value="local" selected>Local</option>';
                           }
                           else
                           {
                              foreach ( $GLOBALS['wp_manga']->get_available_host() as $host ) 
                              { ?>
                                 <option value="<?php echo esc_attr( $host['value'] ) ?>" <?php selected( $host['value'], $manga_storage ); ?>><?php echo esc_attr( $host['text'] ) ?></option>
                              <?php
                              }
                           }
                           ?>
                           </select>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Do you want to enable logging for rules?", 'ultimate-manga-scraper');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Enable Logging for Rules:", 'ultimate-manga-scraper');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="enable_logging" name="manhwaclan_Main_Settings[enable_logging]" onclick="mainChanged()"<?php
                        if ($enable_logging == 'on')
                            echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="hideLog">
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Do you want to enable detailed logging for rules? Note that this will dramatically increase the size of the log this plugin generates.", 'ultimate-manga-scraper');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Enable Detailed Logging for Rules:", 'ultimate-manga-scraper');?></b>
                        </div>
                     </td>
                     <td>
                        <div class="hideLog">
                           <input type="checkbox" id="enable_detailed_logging" name="manhwaclan_Main_Settings[enable_detailed_logging]"<?php
                              if ($enable_detailed_logging == 'on')
                                  echo ' checked ';
                              ?>>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="hideLog">
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Choose if you want to automatically clear logs after a period of time.", 'ultimate-manga-scraper');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Automatically Clear Logs After:", 'ultimate-manga-scraper');?></b>
                        </div>
                     </td>
                     <td>
                        <div class="hideLog">
                           <select id="auto_clear_logs" name="manhwaclan_Main_Settings[auto_clear_logs]" >
                              <option value="No"<?php
                                 if ($auto_clear_logs == "No") {
                                     echo " selected";
                                 }
                                 ?>><?php echo esc_html__("Disabled", 'ultimate-manga-scraper');?></option>
                              <option value="monthly"<?php
                                 if ($auto_clear_logs == "monthly") {
                                     echo " selected";
                                 }
                                 ?>><?php echo esc_html__("Once a month", 'ultimate-manga-scraper');?></option>
                              <option value="weekly"<?php
                                 if ($auto_clear_logs == "weekly") {
                                     echo " selected";
                                 }
                                 ?>><?php echo esc_html__("Once a week", 'ultimate-manga-scraper');?></option>
                              <option value="daily"<?php
                                 if ($auto_clear_logs == "daily") {
                                     echo " selected";
                                 }
                                 ?>><?php echo esc_html__("Once a day", 'ultimate-manga-scraper');?></option>
                              <option value="twicedaily"<?php
                                 if ($auto_clear_logs == "twicedaily") {
                                     echo " selected";
                                 }
                                 ?>><?php echo esc_html__("Twice a day", 'ultimate-manga-scraper');?></option>
                              <option value="hourly"<?php
                                 if ($auto_clear_logs == "hourly") {
                                     echo " selected";
                                 }
                                 ?>><?php echo esc_html__("Once an hour", 'ultimate-manga-scraper');?></option>
                           </select>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("If you want to use a proxy to crawl webpages, input it's address here. Required format: IP Address/URL:port", 'ultimate-manga-scraper');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Web Proxy Address:", 'ultimate-manga-scraper');?></b>
                        </div>
                     </td>
                     <td>
                        <div>
                           <input type="text" id="proxy_url" placeholder="<?php echo esc_html__("Input web proxy url", 'ultimate-manga-scraper');?>" name="manhwaclan_Main_Settings[proxy_url]" value="<?php echo esc_html($proxy_url);?>"/>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("If you want to use a proxy to crawl webpages, and it requires authentification, input it's authentification details here. Required format: username:password", 'ultimate-manga-scraper');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Web Proxy Authentification:", 'ultimate-manga-scraper');?></b>
                        </div>
                     </td>
                     <td>
                        <div>
                           <input type="text" id="proxy_auth" placeholder="<?php echo esc_html__("Input web proxy auth", 'ultimate-manga-scraper');?>" name="manhwaclan_Main_Settings[proxy_auth]" value="<?php echo esc_html($proxy_auth);?>"/>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Set the timeout (in seconds) for every rule running. I recommend that you leave this field at it's default value (3600).", 'ultimate-manga-scraper');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Timeout for Rule Running (seconds):", 'ultimate-manga-scraper');?></b>
                        </div>
                     </td>
                     <td>
                        <div>
                           <input type="number" id="rule_timeout" step="1" min="0" placeholder="<?php echo esc_html__("Input rule timeout in seconds", 'ultimate-manga-scraper');?>" name="manhwaclan_Main_Settings[rule_timeout]" value="<?php
                              echo esc_html($rule_timeout);
                              ?>"/>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Set the timeout (in seconds) for every rule running. I recommend that you leave this field at it's default value (90).", 'ultimate-manga-scraper');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Timeout for One Request (seconds):", 'ultimate-manga-scraper');?></b>
                        </div>
                     </td>
                     <td>
                        <div>
                           <input type="number" id="request_timeout" step="1" min="0" placeholder="<?php echo esc_html__("Input request timeout in seconds", 'ultimate-manga-scraper');?>" name="manhwaclan_Main_Settings[request_timeout]" value="<?php echo esc_html($request_timeout);?>"/>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td colspan="2">
                     <h3><?php echo esc_html__("Translation Options:", 'ultimate-manga-scraper');?></h3>
                              </td>
                              </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo sprintf( wp_kses( __( "If you wish to use Microsoft for translation, you must enter first a Microsoft 'Access Key'. Learn how to get one <a href='%s' target='_blank'>here</a>. If you enter a value here, new options will become available in the 'Automatically Translate Content To' and 'Source Language' fields.", 'ultimate-manga-scraper'), array(  'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( 'https://coderevolution.ro/knowledge-base/faq/how-to-create-a-microsoft-translator-api-key-from-using-azure-control-panel/' ) );
                                    ?>
                              </div>
                           </div>
                           <b><a href="https://coderevolution.ro/knowledge-base/faq/how-to-create-a-microsoft-translator-api-key-from-using-azure-control-panel/" target="_blank"><?php echo esc_html__("Microsoft Translator Access Key (Optional)", 'ultimate-manga-scraper');?>:</a></b>
                        </div>
                     </td>
                     <td>
                        <div>
                           <input type="password" autocomplete="off" id="bing_auth" placeholder="<?php echo esc_html__("Access key (optional)", 'ultimate-manga-scraper');?>" name="manhwaclan_Main_Settings[bing_auth]" value="<?php
                              echo esc_html($bing_auth);
                              ?>"/>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo sprintf( wp_kses( __( "If you selected a specific region in your Azure Microsoft account, you must enter it here. Learn more <a href='%s' target='_blank'>here</a>. The default is global.", 'ultimate-manga-scraper'), array(  'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( 'https://coderevolution.ro/knowledge-base/faq/how-to-create-a-microsoft-translator-api-key-from-using-azure-control-panel/' ) );
                                    ?>
                              </div>
                           </div>
                           <b><a href="https://coderevolution.ro/knowledge-base/faq/how-to-create-a-microsoft-translator-api-key-from-using-azure-control-panel/" target="_blank"><?php echo esc_html__("Microsoft Translator Region Code (Optional)", 'ultimate-manga-scraper');?>:</a></b>
                        </div>
                     </td>
                     <td>
                        <div>
                           <input type="text" id="bing_region" placeholder="<?php echo esc_html__("global", 'ultimate-manga-scraper');?>" name="manhwaclan_Main_Settings[bing_region]" value="<?php
                              echo esc_html($bing_region);
                              ?>"/>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo sprintf( wp_kses( __( "If you wish to use DeepL for translation, you must enter first a DeepL 'Authentication Key'. Get one <a href='%s' target='_blank'>here</a>. If you enter a value here, new options will become available in the 'Automatically Translate Content To' and 'Source Language' fields.", 'ultimate-manga-scraper'), array(  'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( 'https://www.deepl.com/subscription.html' ) );
                                    ?>
                              </div>
                           </div>
                           <b><a href="https://www.deepl.com/subscription.html" target="_blank"><?php echo esc_html__("DeepL Translator Authentication Key (Optional)", 'ultimate-manga-scraper');?>:</a></b>
                        </div>
                     </td>
                     <td>
                        <div>
                           <input type="password" autocomplete="off" id="deepl_auth" placeholder="<?php echo esc_html__("Auth key (optional)", 'ultimate-manga-scraper');?>" name="manhwaclan_Main_Settings[deepl_auth]" value="<?php
                              echo esc_html($deepl_auth);
                              ?>"/>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Check this checkbox if the above API key is a DeepL free plan key. If it is a PRO key, please uncheck this checkbox.", 'ultimate-manga-scraper');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("The Above Is A DeepL Free API Key:", 'ultimate-manga-scraper');?></b>
                     </td>
                     <td>
                     <input type="checkbox" id="deppl_free" name="manhwaclan_Main_Settings[deppl_free]"<?php
                        if ($deppl_free == 'on')
                           echo ' checked ';
                        ?>>
                     </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <hr/>
                     </td>
                     <td>
                        <hr/>
                     </td>
                  </tr>
                  <tr>
                     <td colspan="2">
                        <h3><?php echo esc_html__("PhantomJS Settings:", 'ultimate-manga-scraper');?></h3>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo sprintf( wp_kses( __( "Set the path on your local server of the phantomjs executable. If you leave this field blank, the default 'phantomjs' call will be used. <a href='%s' target='_blank'>How to install PhantomJs?</a>", 'ultimate-manga-scraper'), array(  'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( "//coderevolution.ro/knowledge-base/faq/how-to-install-phantomjs/" ));
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("PhantomJS Path On Server:", 'ultimate-manga-scraper');?></b>
<?php
                       if($phantom_path != '')
                       {
                           $phantom = manhwaclan_testPhantom();
                           if($phantom === 0)
                           {
                               echo '<br/><span class="cr_red12"><b>' . esc_html__('INFO: PhantomJS not found - please install it on your server or configure the path to it in plugin\'s \'Main Settings\'!', 'ultimate-manga-scraper') . '</b> <a href=\'//coderevolution.ro/knowledge-base/faq/how-to-install-phantomjs/\' target=\'_blank\'>' . esc_html__('How to install PhantomJs?', 'ultimate-manga-scraper') . '</a></span>';
                           }
                           elseif($phantom === -1)
                           {
                               echo '<br/><span class="cr_red12"><b>' . esc_html__('INFO: PhantomJS cannot run - shell exec is not enabled on your server. Please enable it and retry using this feature of the plugin.', 'ultimate-manga-scraper') . '</b></span>';
                           }
                           elseif($phantom === -2)
                           {
                               echo '<br/><span class="cr_red12"><b>' . esc_html__('INFO: PhantomJS cannot run - shell exec is not allowed to run on your server (in disable_functions list in php.ini). Please enable it and retry using this feature of the plugin.', 'ultimate-manga-scraper') . '</b></span>';
                           }
                           elseif($phantom === 1)
                           {
                               echo '<br/><span class="cr_green12"><b>' . esc_html__('INFO: PhantomJS OK', 'ultimate-manga-scraper') . '</b></span>';
                           }
                       }
?>
                        </div>
                     </td>
                     <td>
                        <div>
                           <input type="text" id="phantom_path" placeholder="<?php echo esc_html__("Path to phantomjs", 'ultimate-manga-scraper');?>" name="manhwaclan_Main_Settings[phantom_path]" value="<?php echo esc_html($phantom_path);?>"/>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div>
                           <div class="bws_help_box bws_help_box_right dashicons dashicons-editor-help cr_align_middle">
                              <div class="bws_hidden_help_text cr_min_260px">
                                 <?php
                                    echo esc_html__("Set the timeout (in milliseconds) for every phantomjs running. I recommend that you leave this field at it's default value (15000). If you leave this field blank, the default value will be used.", 'ultimate-manga-scraper');
                                    ?>
                              </div>
                           </div>
                           <b><?php echo esc_html__("Timeout for PhantomJs Execution:", 'ultimate-manga-scraper');?></b>
                        </div>
                     </td>
                     <td>
                        <div>
                           <input type="number" id="phantom_timeout" step="1" min="1" placeholder="<?php echo esc_html__("Input phantomjs timeout in milliseconds", 'ultimate-manga-scraper');?>" name="manhwaclan_Main_Settings[phantom_timeout]" value="<?php echo esc_html($phantom_timeout);?>"/>
                        </div>
                     </td>
                  </tr>
               </table>
               </div>
               </td></tr>
               </table>
            </div>
         </div>
  
   <hr/>
   <div><p class="submit"><input type="submit" name="btnSubmit" id="btnSubmit" class="button button-primary" onclick="unsaved = false;" value="<?php echo esc_html__("Save Settings", 'ultimate-manga-scraper');?>"/></p></div>
   </form>
</div>
<?php
   }
   ?>