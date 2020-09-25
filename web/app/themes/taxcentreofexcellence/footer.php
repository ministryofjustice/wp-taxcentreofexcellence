<footer class="group js-footer" id="footer" role="contentinfo">
  <div class="footer-wrapper">
    <p><a href="mailto:taxation@justice.gsi.gov.uk" class="report-problem-link email-link">Report a problem </a><br></p>
    <p><a href="mailto:taxation@justice.gov.uk" class="report-problem-link email-link">Submit your feedback </a></p>
    <div class="footer-menu-container">
      <?php
        $footer_menu_args = array(
          'container' => 'nav',
          'container_class' => 'footer-nav',
          'theme_location'  => 'footer-menu',
        );

        wp_nav_menu( $footer_menu_args );
      ?>
    </div>
    <div class="footer-meta">
      <div class="footer-meta-inner">
        Built by <a href="https://mojdigital.blog.gov.uk/">MOJ Digital</a>
      </div>
      <div class="copyright">
        <a href="http://www.nationalarchives.gov.uk/information-management/re-using-public-sector-information/copyright-and-re-use/crown-copyright/">© Crown copyright</a>
      </div>
    </div>
  </div>
</footer>
