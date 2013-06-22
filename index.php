<?PHP
  session_start();
  define('PHP_FIREWALL_REQUEST_URI', strip_tags( $_SERVER['REQUEST_URI'] ) );
  define('PHP_FIREWALL_ACTIVATION', true );
	if ( is_file( @dirname(__FILE__).'/php-firewall/firewall.php' ) )
	include_once( @dirname(__FILE__).'/php-firewall/firewall.php' );
  require("user/config.php");
  require("user/rights.inc.php");
  require("user/functions.inc.php");
  $sqlHp = mysql_connect(SQL_HP_HOST, SQL_HP_USER, SQL_HP_PASS);
  $sqlServ = mysql_connect(SQL_HOST, SQL_USER, SQL_PASS);
?>
        <?PHP
          if(isset($_GET['s']) && !empty($_GET['s']))
          {
            if(file_exists("./main/".$_GET['s'].".php")) 
            {
              include("./main/".$_GET['s'].".php");
            }
            else {
              include("main/acasa.php");
            }
          } else 
          {
            include("main/acasa.php");
          }
        ?>
<?PHP
  mysql_close();
?>
