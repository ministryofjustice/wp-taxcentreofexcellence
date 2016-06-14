<?php

namespace Roots\Sage\Commands;

use WP_CLI;
use WP_CLI_Command;

class Migrate_Homepage_Fields_To_Flexible_Content extends WP_CLI_Command {

  /**
   * Holds the layouts for the main_content field.
   *
   * @var array
   */
  private $main_content = array();

  /**
   * Holds the layouts for the sidebar_content field.
   *
   * @var array
   */
  private $sidebar_content = array();

  /**
   * Migrate old homepage ACF fields to the new Flexible Content fields model.
   */
  public function __invoke() {
    $page_id = $this->get_homepage_id();
    $this->migrate_content();
    update_field('field_57582891838bc', $this->main_content, $page_id);
    update_field('field_57582b6d630c8', $this->sidebar_content, $page_id);
  }

  /**
   * Pull the content and migrate it to the new main_content and sidebar_content fields.
   */
  private function migrate_content() {
    $page_id = $this->get_homepage_id();

    // Welcome text
    $page = get_post($page_id);
    $this->add_text_section($this->main_content, 'Welcome', $page->post_content);

    // Tax guides
    $header = 'Tax guidance and training guides';
    $links = get_field('tax_guides', $page_id);
    $this->add_link_list($this->main_content, $header, $links);

    // Tax contacts
    $fields = array(
      'header' => 'Contact us',
    );
    $this->add_layout($this->main_content, 'department_contacts', $fields);

    // Our offerings
    $header = 'Our offerings';
    $links = get_field('our_offerings', $page_id);
    $this->add_link_list($this->sidebar_content, $header, $links);

    // Quick links
    // Promote Quick link 'headings' to become their own link list sections
    $links = get_field('quick_links', $page_id);
    $link_lists = array(
      array(
        'header' => 'Quick links',
        'links' => array(),
      ),
    );
    $i = 0;

    foreach ($links as $k => $link) {
      if ($link['type'] == 'Heading') {
        $i++;
        $link_lists[$i] = array(
          'header' => $link['name'],
          'links' => array(),
        );
      } else {
        $link_lists[$i]['links'][] = $link;
      }
    }

    foreach ($link_lists as $link_list) {
      $this->add_link_list($this->sidebar_content, $link_list['header'], $link_list['links']);
    }

    // Done
    WP_CLI::success('Fields have been migrated.');
  }

  /**
   * Get the ID of the homepage.
   *
   * @return int
   */
  private function get_homepage_id() {
    return (int) get_option('page_on_front');
  }

  /**
   * Add a layout to the supplied flexible content field.
   *
   * @param array $flexi Flexible content field.
   * @param string $type The type of section to add: text_section, link_list, department_contacts
   * @param array $fields A key/value array of fields for the section.
   */
  private function add_layout(&$flexi, $type, $fields) {
    $flexi[] = array_merge($fields, array(
      'acf_fc_layout' => $type,
    ));
  }

  /**
   * Convenience method to add a new text section to the supplied flexible content field array.
   *
   * @param array $flexi Flexible content field.
   * @param string $header Section header
   * @param string $content HTML content for the section
   */
  private function add_text_section(&$flexi, $header, $content) {
    $data = array(
      'header' => $header,
      'content' => $content,
    );

    $this->add_layout($flexi, 'text_section', $data);
  }

  /**
   * Convenience method to add a new link list section to the supplied flexible content field array.
   *
   * @param array $flexi Flexible content field.
   * @param string $header Section header
   * @param array $links Array of links, each an array with keys: 'type', 'name', and 'file' or 'link'
   */
  private function add_link_list(&$flexi, $header, $links) {
    $data = array(
      'header' => $header,
      'links' => $links,
    );

    $this->add_layout($flexi, 'link_list', $data);
  }

}
