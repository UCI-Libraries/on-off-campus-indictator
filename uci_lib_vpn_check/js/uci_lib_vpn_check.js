(function($, D) {
  $(document).ready(function() {
  
  //$('.block-uci-lib-vpn-check .vpn-result').hide();
  
  $(".block-uci-lib-vpn-check .vpn-test-button").click(function () {
    $(".block-uci-lib-vpn-check .vpn-result").fadeToggle("slow");
  });
    
 }); // document.ready 
})(jQuery, Drupal);
