<?php
/**
 * DokuWiki LemonLDAP:NG authentication plugin
 * https://www.dokuwiki.org/plugin:authlemonldap
 *
 *
 * @license GPL 2 http://www.gnu.org/licenses/gpl-2.0.html
 * @author  David Kreitschmann
 */

// must be run within Dokuwiki
if(!defined('DOKU_INC')) die();


class auth_plugin_authlemonldap extends DokuWiki_Auth_Plugin {

  public function __construct() {
    global $conf;
    parent::__construct();
    $this->cando['logout'] = false;
    $this->cando['external'] = true;
  }

  public function trustExternal($user, $pass, $sticky = false) {
    global $USERINFO;
    if (isset($_SERVER['HTTP_AUTH_USER'])) {
      $_SERVER['REMOTE_USER'] = $_SERVER['HTTP_AUTH_USER'];
      $USERINFO['name'] = $_SERVER['HTTP_AUTH_CN'];
      $USERINFO['mail'] = $_SERVER['HTTP_AUTH_MAIL'];
      $USERINFO['grps'] = explode(';', str_replace("; ", ";", base64_decode($_SERVER['HTTP_AUTH_GROUPS'])));
      return true;
    }
    return false;
  }

  public function useSessionCache($user) {
    return false;
  }
}

