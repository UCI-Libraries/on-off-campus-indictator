# on-off-campus-indictator
Some sample code for Drupal 8 sites to have an indictor as to whether connections are on/off campus

The module has specific ip ranges that are checked with php and depending on whether if statements true or false you a message is set. All of the code can be updated in the LibVpnChecker.php file in the Block directory uci_lib_vpn_check/src/Plugin/Block/

To install in Drupal 8 just upload the uci_lib_vpn_check folder to your modules custom folder, enable the module. Then finally add block in a region in the structure > block layout admin page.
