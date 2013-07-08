<?php

require_once dirname(__FILE__) . '/../../lib/authentication.inc.php';

/**
 * Test class for Authentication.
 */
class AuthenticationTest extends PHPUnit_Framework_TestCase {

  private $local_server = 'localhost';
  private $local_db_username = 'isa_svn';
  private $local_db_password = 'isa_svn';
  private $local_db_name = 'isa_svn';
  private $isa_server = 'localhost';
  private $isa_db_username = 'isa_web';
  private $isa_db_password = 'isa_web';
  private $isa_db_name = 'isa_web';
  private $obj;

  /**
   * Sets up the fixture, for example, opens a network connection.
   * This method is called before a test is executed.
   */
  protected function setUp($authContext = 'subversion', $uri_prefix = 'svn') {
    $this->obj = new Authentication(
        $this->local_server,
        $this->local_db_username,
        $this->local_db_password,
        $this->local_db_name,
        $this->isa_server,
        $this->isa_db_username,
        $this->isa_db_password,
        $this->isa_db_name,
        $authContext,
        $uri_prefix
    );
  }

  /**
   * Tears down the fixture, for example, closes a network connection.
   * This method is called after a test is executed.
   */
  protected function tearDown() {
    // NOTHING
  }

  /**
   * @covers Authentication::exit_auth_status
   */
  public function testSubversionContext() {
    // Check a not existing account
    $login = 'dummy_user';
    $password = 'lct';
    $uri = '/svn/joinup/branches/123.txt';
    $this->assertEquals(USER_NOT_AUTHORISED, $this->obj->exit_auth_status($login, $password, $uri),
      'Check that the Authentication of a Dummy user fails');

    // Check a contributor account
    $login = 'lct_con';
    $this->assertEquals(USER_AUTHORISED, $this->obj->exit_auth_status($login, $password, $uri),
      'Check that the permission of a Contributor user succeeded on the branches');

    $uri = '/svn/joinup/trunk/123.txt';
    $this->assertEquals(USER_NOT_AUTHORISED, $this->obj->exit_auth_status($login, $password, $uri),
      'Check that the permission of a Contributor user fails on the trunk');

    // Check a developer account
    $login = 'lct_dev';
    $uri = '/svn/joinup/branches/123.txt';
    $this->assertEquals(USER_AUTHORISED, $this->obj->exit_auth_status($login, $password, $uri),
      'Check that the permission of a Developer user succeeded on the branches');
    $uri = '/svn/joinup/trunk/123.txt';
    $this->assertEquals(USER_AUTHORISED, $this->obj->exit_auth_status($login, $password, $uri),
      'Check that the permission of a Developer user succeeded on the trunk');
    $uri = '/svn/joinup/123.txt';
    $this->assertEquals(USER_NOT_AUTHORISED, $this->obj->exit_auth_status($login, $password, $uri),
      'Check that the permission of a Developer user fails outside of the regular repository');

    // Check a owner account
    $login = 'admin';
    $uri = '/svn/joinup/branches/123.txt';
    $this->assertEquals(USER_AUTHORISED, $this->obj->exit_auth_status($login, $password, $uri),
      'Check that the permission of a Owner user succeeded on the branches');
    $uri = '/svn/joinup/trunk/123.txt';
    $this->assertEquals(USER_AUTHORISED, $this->obj->exit_auth_status($login, $password, $uri),
      'Check that the permission of a Owner user succeeded on the trunk');
    $uri = '/svn/joinup/123.txt';
    $this->assertEquals(USER_NOT_AUTHORISED, $this->obj->exit_auth_status($login, $password, $uri),
      'Check that the permission of a Owner user fails outside of the regular repository');
  }

  /**
   * @covers Authentication::exit_auth_status
   */
  public function testWebdavContext() {
    $this->setUp('webdav', 'webdav');
    // Check a not existing account
    $login = 'dummy_user';
    $password = 'lct';
    $uri = '/webdav/joinup/branches/123.txt';
    $this->assertEquals(USER_NOT_AUTHORISED, $this->obj->exit_auth_status($login, $password, $uri),
      'Check that the Authentication of a Dummy user fails on the webdav');

    // Check a contributor account
    $login = 'lct_con';
    $uri = '/webdav/joinup/trunk/123.txt';
    $this->assertEquals(USER_AUTHORISED, $this->obj->exit_auth_status($login, $password, $uri),
      'Check that the permission of a Contributor user succeeded on the webdav');

    // Check a developer account
    $login = 'lct_dev';
    $uri = '/webdav/joinup/trunk/123.txt';
    $this->assertEquals(USER_AUTHORISED, $this->obj->exit_auth_status($login, $password, $uri),
      'Check that the permission of a Developer user succeeded on the trunk');
    $uri = '/webdav/joinup/123.txt';
    $this->assertEquals(USER_AUTHORISED, $this->obj->exit_auth_status($login, $password, $uri),
      'Check that the permission of a Developer user fails outside of the regular repository');

    // Check a owner account
    $login = 'admin';
    $uri = '/webdav/joinup/branches/123.txt';
    $this->assertEquals(USER_AUTHORISED, $this->obj->exit_auth_status($login, $password, $uri),
      'Check that the permission of a Owner user succeeded on the branches');
    $uri = '/webdav/joinup/trunk/123.txt';
    $this->assertEquals(USER_AUTHORISED, $this->obj->exit_auth_status($login, $password, $uri),
      'Check that the permission of a Owner user succeeded on the trunk');
    $uri = '/webdav/joinup/123.txt';
    $this->assertEquals(USER_AUTHORISED, $this->obj->exit_auth_status($login, $password, $uri),
      'Check that the permission of a Owner user fails outside of the regular repository');
  }
  
  public function testOther(){
    $this->setUp( 'subversion', 'joinup-svn' );
    $login = 'lct_con';
    $password = 'lct';
    $uri = '/joinup-svn/joinup/!svn/act/309372f1-c34a-654e-91b1-d8ea3271c6c6';
    $this->assertEquals(USER_AUTHORISED, $this->obj->exit_auth_status($login, $password, $uri),
      'Check that the permission of a developer user succeeded on the trunk');
  }

}

?>
