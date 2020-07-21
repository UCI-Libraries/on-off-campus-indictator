# on-off-campus-indictator
Some sample code for Drupal 8 sites to have an indictor as to whether connections are on/off campus. This version of the module is a block that will get your ip address on page load and displays either an on or off campus connection message. 

The way we set it up for the libraries in our Connect page https://www.lib.uci.edu/connect there's a Test My VPN Connection button that opens a bootstrap modal containing an iframe of another page that has our custom VPN Check block. Every time the button gets clicked on there's JS reloading the iframe so that the user doesn't have to reload the page. 

The module has specific ip ranges that are checked with php and depending on whether if statements are true or false a message is set. All of the code can be updated in the LibVpnChecker.php file in the Block directory uci_lib_vpn_check/src/Plugin/Block/

To install in Drupal 8 just upload the uci_lib_vpn_check folder to your modules custom folder, enable the module. Then add VPN Check block in a region in the structure > block layout admin page.
