<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code


/*User defined function*/
define('TITLE','Booking My Taxi');
define('ADMIN_TITLE','Booking My Taxi Admin Panel');
define('ADMIN_EMAIL','admin@mowebify.com');
define('BOOKING_EMAIL','info@mowebify.com');

define('CURRENCY','&pound;');

define('STRIPE_SECRET','sk_test_y4IzEfbCTF5O6n8YnTTbhoSl'); //sk_test_8sfoGneONm0baoidovHGutih // sk_test_JeqMqd3uGnxRQmQUWgKrFe7U
define('STRIPE_PUBLISH','pk_test_kqE2POPpIi1UhVtfqypkJVx3'); //pk_test_tYCcbzua1Cx1WMvuZvcKyVFj // pk_test_XzRWlKcfOs80Ok4GGeMsqr20

define('GOOGLE_PLACE','AIzaSyDtFUynkvvH1frH5vB5LhYKyHdZJDAtvHo'); // AIzaSyAO5VWoVSXCXwZb3Ecne_HzrLhi-9Dgs_Y

// LOCAL
//define('FB_KEY','1608705872759230');
//define('FB_SECRET','014430803a81b01a596c8fbbc46a9cea');
//define('GOOGLE_KEY','827628162385-9n79930kogg4usun2rqnf3415f0rfmon.apps.googleusercontent.com'); 
//define('GOOGLE_SECRET','ISZSVn6AjHZaqOX9IiZlnflc'); 

// LIVE
define('FB_KEY','335139640186471');
define('FB_SECRET','219f03459d2b874cadb19258f7508a14');
define('GOOGLE_KEY','827628162385-8vcemurdcmra2rbv9tmglrit8qhiu2n2.apps.googleusercontent.com');
define('GOOGLE_SECRET','MX9x_rxblmxaMPS6LpT2AjYO');


define('MSG_ACCOUNT_VERIFIED','Booking My Taxi | Account Verified');
define('MSG_ACCOUNT_PENDING','Booking My Taxi | Account Created & Bank details will verify soon');

