<?php
// for redirection to subdomain

function url_origin( $s, $use_forwarded_host = false )
{
    $ssl      = ( ! empty( $s['HTTPS'] ) && $s['HTTPS'] == 'on' );
    $sp       = strtolower( $s['SERVER_PROTOCOL'] );
    $protocol = substr( $sp, 0, strpos( $sp, '/' ) ) . ( ( $ssl ) ? 's' : '' );
    $port     = $s['SERVER_PORT'];
    $port     = ( ( ! $ssl && $port=='80' ) || ( $ssl && $port=='443' ) ) ? '' : ':'.$port;
    $host     = ( $use_forwarded_host && isset( $s['HTTP_X_FORWARDED_HOST'] ) ) ? $s['HTTP_X_FORWARDED_HOST'] : ( isset( $s['HTTP_HOST'] ) ? $s['HTTP_HOST'] : null );
    $host     = isset( $host ) ? $host : $s['SERVER_NAME'] . $port;
    echo $host;
    return $protocol . '://' . $host;
    
}

function full_url( $s, $use_forwarded_host = false )
{
    return url_origin( $s, $use_forwarded_host ) . $s['REQUEST_URI'];
}
echo $_SERVER['SERVER_NAME'];


$siteName='';
if($_SERVER['SERVER_NAME']!="")
{
$sitePostName=$_SERVER['SERVER_NAME'];
$siteNameCheck = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $sitePostName);
   if($siteNameCheck)
   {
     include("dbConnect.php");
     	$sql="select * from users where u_name='".$_SERVER["SERVER_NAME"]."'";
  	$result=mysqli_query($conn,$sql);
    	$count = mysqli_num_rows($result);
                    if($count == 1){
                        header("Location: feedback.php");
                    }else{
                        echo "User Not Available";
                    }
        	
   }
   else
  {
    header("Location: 404.php");
   }
}
?>
