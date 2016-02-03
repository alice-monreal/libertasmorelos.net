<?php
// $Id: page.tpl.php,v 1.9 2010/11/07 21:48:56 dries Exp $

/**
 * @file
 * Bartik's theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template normally located in the
 * modules/system folder.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $hide_site_name: TRUE if the site name has been toggled off on the theme
 *   settings page. If hidden, the "element-invisible" class is added to make
 *   the site name visually hidden, but still accessible.
 * - $hide_site_slogan: TRUE if the site slogan has been toggled off on the
 *   theme settings page. If hidden, the "element-invisible" class is added to
 *   make the site slogan visually hidden, but still accessible.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['header']: Items for the header region.
 * - $page['featured']: Items for the featured region.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['triptych_first']: Items for the first triptych.
 * - $page['triptych_middle']: Items for the middle triptych.
 * - $page['triptych_last']: Items for the last triptych.
 * - $page['footer_firstcolumn']: Items for the first footer column.
 * - $page['footer_secondcolumn']: Items for the second footer column.
 * - $page['footer_thirdcolumn']: Items for the third footer column.
 * - $page['footer_fourthcolumn']: Items for the fourth footer column.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see bartik_process_page()
 */
?>



<div id="page-wrapper"><div id="page">

  <div id="header" class="<?php print $secondary_menu ? 'with-secondary-menu': 'without-secondary-menu'; ?>"><div class="section clearfix">

    <?php if ($logo): ?>
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
        <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />        
      </a>
    <?php endif; ?>

    <?php if ($site_name || $site_slogan): ?>
      <div id="name-and-slogan"<?php if ($hide_site_name && $hide_site_slogan) { print ' class="element-invisible"'; } ?>>

        <?php if ($site_slogan): ?>
          <div id="site-slogan"<?php if ($hide_site_slogan) { print ' class="element-invisible"'; } ?>>
            <?php print $site_slogan; ?>
          </div>
        <?php endif; ?>

        <?php if ($site_name): ?>
          <?php if ($title): ?>
            <div id="site-name"<?php if ($hide_site_name) { print ' class="element-invisible"'; } ?>>
              <strong>
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
              </strong>
            </div>
          <?php else: /* Use h1 when the content title is empty */ ?>
            <h1 id="site-name"<?php if ($hide_site_name) { print ' class="element-invisible"'; } ?>>
              <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
            </h1>
          <?php endif; ?>
        <?php endif; ?>

        <p id="site-description"> Peri&oacute;dico Digital </p>
      </div> <!-- /#name-and-slogan -->
    <?php endif; ?>

    <div class="social-networks">
      <span class="social-network facebook"> </span>
      <span class="social-network twitter">  </span>
      <span class="social-network youtube">  </span>
    </div>

    <!-- <?php print_r ($main_menu); ?> -->

    <?php print render($page['header']); ?>

    <?php if ($main_menu): ?>
      <div id="nav-bar">
        <div id="main-menu" class="navigation">
          <?php print theme('links__system_main_menu', array(
            'links' => $main_menu,
            'attributes' => array(
              'id' => 'main-menu-links',
              'class' => array('links', 'clearfix'),
            ),
            'heading' => array(
              'text' => t('Main menu'),
              'level' => 'h2',
              'class' => array('element-invisible'),
            ),
          )); ?>
        </div> <!-- /#main-menu -->
      </div>

    <?php endif; ?>

    <?php if ($secondary_menu): ?>
      <div id="secondary-menu" class="navigation">
        <?php print theme('links__system_secondary_menu', array(
          'links' => $secondary_menu,
          'attributes' => array(
            'id' => 'secondary-menu-links',
            'class' => array('links', 'inline', 'clearfix'),
          ),
          'heading' => array(
            'text' => t('Secondary menu'),
            'level' => 'h2',
            'class' => array('element-invisible'),
          ),
        )); ?>
      </div> <!-- /#secondary-menu -->
    <?php endif; ?>

  </div></div> <!-- /.section, /#header -->

  <?php if ($messages): ?>
    <div id="messages"><div class="section clearfix">
      <?php print $messages; ?>
    </div></div> <!-- /.section, /#messages -->
  <?php endif; ?>

  <?php if ($page['featured']): ?>
    <div id="featured"><div class="section clearfix">
      <?php print render($page['featured']); ?>
    </div></div> <!-- /.section, /#featured -->
  <?php endif; ?>

  <div id="main-wrapper" class="clearfix"><div id="main" class="clearfix">

    <?php if ($breadcrumb): ?>
      <div id="breadcrumb"><?php print $breadcrumb; ?></div>
    <?php endif; ?>

    <?php if ($page['sidebar_first']): ?>
      <div id="sidebar-first" class="column sidebar"><div class="section">
        <?php print render($page['sidebar_first']); ?>
      </div></div> <!-- /.section, /#sidebar-first -->
    <?php endif; ?>

    <div id="content" class="column"><div class="section">
      <?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      <?php if ($title): ?>
        <h1 class="title" id="page-title">
          <?php print $title; ?>
        </h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php if ($tabs): ?>
        <div class="tabs">
          <?php print render($tabs); ?>
        </div>
      <?php endif; ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links">
          <?php print render($action_links); ?>
        </ul>
      <?php endif; ?>
      <?php

        // articulo(s)
        $nid = 0;
        if (arg(0) == 'node' && is_numeric(arg(1))) {
            $nid = arg(1);
        }

        $node = node_load($nid);
        // if ($node) {
        //   // print "Node: $node->nid with title $node->title";
        // } else {
        //   // print "NODE IS EMPTY";
        // }

        $content = $page["content"]["system_main"]["nodes"][$node->nid];
        $content_type = $content["#bundle"];

        // Global base url
        Global $base_url;

        if($content_type == "articulo"){

          // Counter process

          $query       = "SELECT A.entity_id, A.field_visited_value FROM {field_data_field_visited} A WHERE A.entity_id = ".$node->nid." LIMIT 1";
          $fdfVisited  = db_query($query)->fetchAll();
          $visitedValue= intval($fdfVisited[0]->field_visited_value);

          $query = db_update('field_data_field_visited')
            ->fields(array(
              'field_visited_value' => $visitedValue + 1,
            ))
            ->condition('entity_id', $node->nid, '=')
            ->execute();

          // Article is created by default '0' value on field_visited_value
          // $nid = db_insert('node')
          //   ->fields(array(
          //     'title' => 'Example',
          //     'uid' => 3,
          //     'created' => REQUEST_TIME,
          //   ))
          //   ->execute();

          // Cover Image
          $cover_image = $content["body"]["#object"]->field_image_cover["und"][0]["filename"];
          $cover = $base_url.'/sites/default/files/'.$cover_image;

          // Cover Title
          $cover_title = $content["body"]["#object"]->field_title["und"][0]["value"];
          // Cover Description
          $cover_description = $content["body"]["#object"]->field_description["und"][0]["value"];

          // Title
          $title = $content["body"]["#object"]->title;
          // Author
          $author = $content["body"]["#object"]->field_author["und"][0]["value"];
          // Date (de la publicación)
          $post_date = $content["body"]["#object"]->field_date["und"][0]["value"];
          // Profile image 
          $profile = $content["body"]["#object"]->field_image_profile["und"][0]["filename"];

          // Body
          $body = $content["body"]["#object"]->body["und"][0]["value"];

          // Social Networks
          $redes_sociales = $page['content']['service_links_service_links']['#children'];

          // Date Format
          $days = array(
                'Mon' => 'Lunes',
                'Tue' => 'Martes',
                'Wed' => 'Mi&eacute;rcoles',
                'Thu' => 'Jueves',
                'Fri' => 'Viernes',
                'Sat' => 'S&aacute;bado',  
                'Sun' => 'Domingo' );
              
          $months = array(
            '01' => 'Enero',      '02' => 'Febrero',
            '03' => 'Marzo',      '04' => 'Abril',
            '05' => 'Mayo',       '06' => 'Junio',
            '07' => 'Julio',      '08' => 'Agosto',
            '09' => 'Septiembre', '10' => 'Octubre',
            '11' => 'Noviembre',  '12' => 'Diciembre' );

          $date = $post_date;
          for($i=0; $i<2; $i++){
            $day   = substr($date, 0, 2);
            $month = substr($date, 3, 2);
            $year  = substr($date, 6, 4);
            if($i === 0){
              $dateformat = $month.'/'.$day.'/'.$year;
              $time = strtotime($dateformat);
              $date = date('d-m-Y-D', $time);
            }else{
              $nday  = substr($date, 11, 3);
              $dateformat = $days[$nday].' '.$day.' de '.$months[$month].' de '.$year;
            }                
          }

          // Images gallery
          $images_gallery = array();
          for($ig = 0; $ig < 10; $ig++){
            $ig_n = $ig+1;
            $ig_num = 'field_image_gallery_'.$ig_n;
            $ig_image_array = $content["body"]["#object"]->$ig_num;
            
            if(!empty($ig_image_array)){
              $ig_image_name = $ig_image_array['und'][0]['filename'];
              $ig_image = '"'.$base_url.'/sites/default/files/'.$ig_image_name.'"';
              array_push($images_gallery, $ig_image);
            }
          }

          $ig_slider = "<div class='article_igallery_slider'>";

          for($igs = 0; $igs < sizeof($images_gallery); $igs++){
              $ig_slider .= "
              <a class='fancybox-button' rel='fancybox-button' href=".$images_gallery[$igs]." title=''>
                  <div class='article_igallery_slide' style='background-image: url(".$images_gallery[$igs].")'>
                  </div>
              </a>
              ";
          }

          $ig_slider .= "</div>";
      ?>

          <style>
            .section{
              /*width: 750px;*/
              /* margin: 0 auto;
              padding: 0; */
            }
          </style>
          <a class='fancybox-button' rel='fancybox-button' href="<?php print $cover?>" title=''>
            <div class="article_cover_container" style="background-image: url('<?php print $cover?>');">
              <div class="article_cover_content">
                <div class="article_wrapper">
                  <p class="article_cover_title"> <?php print $cover_title ?> </p>
                  <p class="article_cover_description"> <?php print $cover_description ?>  </p>
                </div>
              </div>
            </div>
          </a>

          <div class="article_social_buttons"> 
              <?php print ($page['content']['service_links_service_links']['#markup']); ?>
          </div>

          <div class="article_container">
            <div class="article_adds">
              <p> Publicidad </p>
            </div>
            <p class="ac_title"> <?php print $title; ?> </p>
            <p class="ac_author_date"> <?php print $author ?>, <?php print $dateformat; ?> </p>
            <p class="ac_body"> <?php print $body ?> </p>
          </div>          

          <div class="article_images_gallery">
            <p> Galer&iacute;a de im&aacute;genes </p>
            <?php print $ig_slider; ?>
          </div>

          <div class="article_releated_notes">
            <p> Visita m&aacute;s noticias </p>

            <p class="enlaces"> Enlace 1 </p>
            <p class="enlaces"> Enlace 2 </p>
          </div>

          <div class="article_comments">
            <p> Comentarios </p>
            <?php print ($page['content']['facebook_comments_block_fb_comments']['#markup']); ?>
          </div>

      <?php
          // print_r ($page['content']);
        }
        elseif($content_type == "opinion"){
          
          // Cover Image
          $cover_image = $content["#node"]->field_opinion_cover["und"][0]["filename"];
          $cover = $base_url.'/sites/default/files/'.$cover_image;

          // Cover Title
          $cover_title = $content["#node"]->title;
          // Cover Description
          $cover_description = $content["#node"]->field_opinion_summary["und"][0]["value"];

          // Title
          $title = $content["#node"]->title;
          // Author
          $author = $content["#node"]->field_opinion_author["und"][0]["value"];
          // Date (de la publicación)
          $post_date =  $content["#node"]->field_opinion_date["und"][0]["value"];
          // Profile image 
          $profile =  $content["#node"]->field_opinion_profile["und"][0]["filename"];

          // Body
          $body = $content["#node"]->body["und"][0]["value"];

          // Tags
          // $tags = $content["#node"]->field_opinion_tags["und"][0]["value"]

          // Social Networks
          // $redes_sociales = $page['content']['service_links_service_links']['#children'];
          // print_r($redes_sociales);

          // Date Format
          $days = array(
                'Mon' => 'Lunes',
                'Tue' => 'Martes',
                'Wed' => 'Mi&eacute;rcoles',
                'Thu' => 'Jueves',
                'Fri' => 'Viernes',
                'Sat' => 'S&aacute;bado',  
                'Sun' => 'Domingo' );
              
          $months = array(
            '01' => 'Enero',      '02' => 'Febrero',
            '03' => 'Marzo',      '04' => 'Abril',
            '05' => 'Mayo',       '06' => 'Junio',
            '07' => 'Julio',      '08' => 'Agosto',
            '09' => 'Septiembre', '10' => 'Octubre',
            '11' => 'Noviembre',  '12' => 'Diciembre' );

          $date = $post_date;
          for($i=0; $i<2; $i++){
            $day   = substr($date, 0, 2);
            $month = substr($date, 3, 2);
            $year  = substr($date, 6, 4);
            if($i === 0){
              $dateformat = $month.'/'.$day.'/'.$year;
              $time = strtotime($dateformat);
              $date = date('d-m-Y-D', $time);
            }else{
              $nday  = substr($date, 11, 3);
              $dateformat = $days[$nday].' '.$day.' de '.$months[$month].' de '.$year;
            }                
          }

          // Images gallery
          // $images_gallery = array();
          // for($ig = 0; $ig < 10; $ig++){
          //   $ig_n = $ig+1;
          //   $ig_num = 'field_image_gallery_'.$ig_n;
          //   $ig_image_array = $content["body"]["#object"]->$ig_num;
            
          //   if(!empty($ig_image_array)){
          //     $ig_image_name = $ig_image_array['und'][0]['filename'];
          //     $ig_image = '"'.$base_url.'/sites/default/files/'.$ig_image_name.'"';
          //     array_push($images_gallery, $ig_image);
          //   }
          // }

          // $ig_slider = "<div class='article_igallery_slider'>";

          // for($igs = 0; $igs < sizeof($images_gallery); $igs++){
          //     $ig_slider .= "
          //     <a class='fancybox-button' rel='fancybox-button' href=".$images_gallery[$igs]." title=''>
          //         <div class='article_igallery_slide' style='background-image: url(".$images_gallery[$igs].")'>
          //         </div>
          //     </a>
          //     ";
          // }

          // $ig_slider .= "</div>";

          // print_r ($page['content']);
          // print_r ($body);
      ?>
          <a class='fancybox-button' rel='fancybox-button' href="<?php print $cover?>" title=''>
            <div class="article_cover_container" style="background-image: url('<?php print $cover?>');">
              <div class="article_cover_content">
                <div class="article_wrapper">
                  <p class="article_cover_title"> <?php print $cover_title ?> </p>
                  <p class="article_cover_description"> <?php print $cover_description ?>  </p>
                </div>
              </div>
            </div>
          </a>

          <div class="article_social_buttons"> 
              <?php print ($page['content']['service_links_service_links']['#markup']); ?>
          </div>

          <div class="article_container">
            <div class="article_adds">
              <p> Publicidad </p>
            </div>
            <p class="ac_title"> <?php print $title; ?> </p>
            <p class="ac_author_date"> <?php print $author ?>, <?php print $dateformat; ?> </p>
            <p class="ac_body"> <?php print $body ?> </p>
          </div>          

          <div class="article_images_gallery">
            <p> Galer&iacute;a de im&aacute;genes </p>
            <?php print $ig_slider; ?>
          </div>

          <div class="article_releated_notes">
            <p> Visita m&aacute;s noticias </p>

            <p class="enlaces"> Enlace 1 </p>
            <p class="enlaces"> Enlace 2 </p>
          </div>

          <div class="article_comments">
            <p> Comentarios </p>
            <?php print ($page['content']['facebook_comments_block_fb_comments']['#markup']); ?>
          </div>

      <?php
        }
        else{
          print render($page['content']);
        }

      ?>
      <?php print $feed_icons; ?>

    </div></div> <!-- /.section, /#content -->

    <?php if ($page['sidebar_second']): ?>
      <div id="sidebar-second" class="column sidebar"><div class="section">
        <?php print render($page['sidebar_second']); ?>
      </div></div> <!-- /.section, /#sidebar-second -->
    <?php endif; ?>

  </div></div> <!-- /#main, /#main-wrapper -->

  <?php if ($page['triptych_first'] || $page['triptych_middle'] || $page['triptych_last']): ?>

    <div id="triptych-wrapper"><div id="triptych" class="clearfix">
      <?php print render($page['triptych_first']); ?>
      <?php print render($page['triptych_middle']); ?>
      <?php print render($page['triptych_last']); ?>
    </div></div> <!-- /#triptych, /#triptych-wrapper -->
  <?php endif; ?>

  <div id="footer-wrapper"><div class="section">

    <?php if ($page['footer_firstcolumn'] || $page['footer_secondcolumn'] || $page['footer_thirdcolumn'] || $page['footer_fourthcolumn']): ?>
      <div id="footer-columns" class="clearfix">
        <?php print render($page['footer_firstcolumn']); ?>
        <?php print render($page['footer_secondcolumn']); ?>
        <?php print render($page['footer_thirdcolumn']); ?>
        <?php print render($page['footer_fourthcolumn']); ?>
      </div> <!-- /#footer-columns -->
    <?php endif; ?>

    <?php if ($page['footer']): ?>
      <div id="footer" class="clearfix">
        <?php print render($page['footer']); ?>
      </div> <!-- /#footer -->
    <?php endif; ?>

  </div></div> <!-- /.section, /#footer-wrapper -->

</div></div> <!-- /#page, /#page-wrapper -->
