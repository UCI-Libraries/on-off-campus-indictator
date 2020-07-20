<?php
/**
 * @file
 * Contains \Drupal\custom_location\Plugin\Block.
 */

namespace Drupal\uci_lib_vpn_check\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Cache\UncacheableDependencyTrait;
use Symfony\Component\HttpFoundation;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Provides a 'custom location' block.
 *
 * @Block(
 *   id = "uci_lib_vpn_check_block",
 *   admin_label = @Translation("UCI Libraries VPN Checker Block"),
 *   category = @Translation("Custom")
 * )
 */
class LibVpnChecker extends BlockBase {
  
  use UncacheableDependencyTrait;
  
  /**
   * {@inheritdoc}
   */
  public function build() {
    $ip_address = \Drupal::request()->getClientIp();
    $html = $ip_address;
    
    $range_low_ip_one = '128.195.64.100';
    $range_high_ip_one = '128.195.79.254';
    
    $range_low_ip_two = '128.195.0.1';
    $range_high_ip_two = '128.195.255.254';
    
    $range_low_ip_three = '128.200.0.1';
    $range_high_ip_three = '128.200.255.254';
    
    $range_low_ip_four = '160.87.0.1';
    $range_high_ip_four = '160.87.255.254';
    
    $range_low_ip_five = '169.234.0.1';
    $range_high_ip_five = '169.234.127.254';
    
    $range_low_ip_six = '192.5.19.1';
    $range_high_ip_six = '192.5.19.254';
    
    $range_low_ip_seven = '160.87.85.1';
    $range_high_ip_seven = '160.87.85.255';
    
    $range_low_ip_eight = '160.87.243.1';
    $range_high_ip_eight = '160.87.243.255';
    
    $range_low_ip_nine = '160.87.244.1';
    $range_high_ip_nine = '160.87.244.255';
    
    $range_low_ip_ten = '160.87.245.1';
    $range_high_ip_ten = '160.87.245.255';
    
    $pass_result = '<div class="vpn-result"><div class="vpn-status connected">You are <strong>ON</strong> the UCI IP range, so you <strong>CAN</strong> access library resources. You are either on the UCI campus, or you are using the VPN from off campus.</div></div>';
    $fail_result = '<div class="vpn-result"><div class="vpn-status no-connection">You are <strong>OFF</strong> the UCI IP range, so you <strong>CANNOT</strong> access library resources. You need to be on the UCI campus, or you need to use the VPN from off campus.</div></div>';
    
    if ($ip_address <= $range_high_ip_one && $range_low_ip_one <= $ip_address) {
      $range_result = $pass_result;
    } elseif ($ip_address <= $range_high_ip_two && $range_low_ip_two <= $ip_address) {
      $range_result = $pass_result;
    } elseif ($ip_address <= $range_high_ip_three && $range_low_ip_three <= $ip_address) {
      $range_result = $pass_result;
    } elseif ($ip_address <= $range_high_ip_four && $range_low_ip_four <= $ip_address) {
      $range_result = $pass_result;
    } elseif ($ip_address <= $range_high_ip_five && $range_low_ip_five <= $ip_address) {
      $range_result = $pass_result;
    } elseif ($ip_address <= $range_high_ip_six && $range_low_ip_six <= $ip_address) {
      $range_result = $pass_result;
    } elseif ($ip_address <= $range_high_ip_seven && $range_low_ip_seven <= $ip_address) {
      $range_result = $fail_result;
    } elseif ($ip_address <= $range_high_ip_eight && $range_low_ip_eight <= $ip_address) {
      $range_result = $fail_result;
    } elseif ($ip_address <= $range_high_ip_nine && $range_low_ip_nine <= $ip_address) {
      $range_result = $fail_result;
    } elseif ($ip_address <= $range_high_ip_ten && $range_low_ip_ten <= $ip_address) {
      $range_result = $fail_result;
    } else {
      $range_result = $fail_result;
    }
    
    $test_button = '<div class="test-vpn"><span class="vpn-test-button btn">Test VPN</span><p>Please refresh your browser and click test to test if you are connected to the UCIFull VPN</p></div>';
    
    // Do NOT cache a page with this block on it.
    \Drupal::service('page_cache_kill_switch')->trigger();
    
    return array(
      '#type' => 'markup',
      '#markup' => '<div class="content">' . $range_result . "</div>",
      '#attached' => array(
        'library' => array(
          'uci_lib_vpn_check/global',
        ),
      ),
    );
  }
  
  public function getCacheMaxAge() {
    return 0;
  }
}
