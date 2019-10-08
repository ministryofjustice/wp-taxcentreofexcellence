<?php get_template_part('head'); ?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K8LPRJ7" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div id="skiplink-container">
  <div>
    <a href="#content" class="skiplink">Skip to Content</a>
  </div>
</div>

<header role="banner" id="global-header" class="">
  <div class="header-wrapper">
    <div class="header-global">
      <div class="header-logo">
        <a href="<?= esc_url(home_url('/')); ?>" title="" id="logo" class="content">
          <img src="<?php echo get_template_directory_uri(); ?>/dist/images/gov.uk_logotype_crown_invert_trans.png" width="35" height="31" alt="">
          <h1 class="heading--inline"><?php bloginfo('name'); ?></h1>
        </a>
      </div>
      <div class="header-search">
        <div style="float:right;"> <?= get_search_form() ?></div>
      </div>
    </div>

  </div>
</header>

<div id="global-header-bar"></div>
