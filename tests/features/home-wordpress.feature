Feature: Home wordpress

  Scenario: Load initial page
    Given a page load wordpress
    Then see a title of my blog
    And I should be on "/wp-admin/install.php"