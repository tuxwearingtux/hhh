<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>
<?php
//first we are gonna get your FTP settings
include "./config.php";
//select language
    if($lang == "nl"){
	    include "lang/nl.php";
    }
    else{
        include "lang/en.php";
    }
//create session
if($_GET['action'] == "login"){
    session_id(md5($_SERVER['REMOTE_ADDR']));
	session_start();
    $_SESSION['ftpserver'] = $_POST['server'];
    $_SESSION['ftpuser'] = $_POST['user'];
    $_SESSION['ftppass'] = $_POST['pass'];
	session_write_close();
}
//if ?action=log out destroy session
elseif($_GET['action'] == "log out"){
    session_id(md5($_SERVER['REMOTE_ADDR']));
    session_start();
    session_unset();
    session_destroy();
}
else{
    session_id(md5($_SERVER['REMOTE_ADDR']));
    session_start();
}
if(!empty($_POST['server']) && !empty($_POST['user']) && !empty($_POST['pass'])){
//get form input
    $server = $_POST['server'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
}
?>
<?php
echo "Zelotypisti FTP :: " . $_SESSION['ftpuser'] . "@" . $_SESSION['ftpserver'] . "";

?> :: Bèta Version
</title>
<style type="text/css">
<!--
.setup {
	color: #000000;
	font-family: Verdana;
	font-size: 10px;
	margin-left: 5px;
	margin-top: 5px;
	margin-right: 5px;
	margin-bottom: 5px;
}
body {
	background-color: #ECE9D8;
	background-image: url(./images/bg.png);
	background-repeat: repeat-x;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 5px;
}
.logo{
background-image:url(./images/logo.png);
background-repeat:no-repeat;
background-position:right;
}
.style3{
font-family:Verdana;
	font-size: 14px;
	color: #FFFFFF;
}
.style4{
font-family:Verdana;
	font-size: 24px;
	color: #FFFFFF;
}
body,td,th {
	font-family: Verdana;
	font-size: 10px;
	color: #000000;
}
a:link {
	color: #333333;
}
a:visited {
	color: #333333;
}
a:hover {
	color: #666666;
}
a:active {
	color: #333333;
}
-->
</style>
<SCRIPT LANGUAGE='JAVASCRIPT' TYPE='TEXT/JAVASCRIPT'>
 <!--
var win=null;
function NewWindow(mypage,myname,w,h,pos,infocus){
if(pos=="random"){myleft=(screen.width)?Math.floor(Math.random()*(screen.width-w)):100;mytop=(screen.height)?Math.floor(Math.random()*((screen.height-h)-75)):100;}
if(pos=="center"){myleft=(screen.width)?(screen.width-w)/2:100;mytop=(screen.height)?(screen.height-h)/2:100;}
else if((pos!='center' && pos!="random") || pos==null){myleft=0;mytop=20}
settings="width=" + w + ",height=" + h + ",top=" + mytop + ",left=" + myleft + ",scrollbars=no,location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=no";win=window.open(mypage,myname,settings);
win.focus();}
// -->
</script>
</head>

<body>
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="100"><table width="100%" height="100" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td class="style3">
		<?php
/*==================================================*/
/*====This code is part of Zelotypisti webrowser====*/
/*==================================================*/
/*                   Creator info:                  */
/*==================================================*/
/*Made by:      Nick Mulder, YPM Design             */
/*URL:         http://www.ypm-design.com            */
/*E-Mail:      nickmulder@ypm-design.com            */
/*==================================================*/
/*                  Project info:                   */
/*==================================================*/
/*URL:     http://zelotypisti.sourceforge.net       */
/*E-mail:     zelotypisti@ypm-design.com            */
/*==================================================*/
/*                  License info:                   */
/*==================================================*/
/*Name:    GNU General Public License (GPL)         */
/*==================================================*/
/*=========Copyright © YPM Design 2006-2007=========*/
/*==================================================*/

if(!empty($_SESSION['ftpserver']) && !empty($_SESSION['ftpuser']) && !empty($_SESSION['ftppass'])){
//get form input
    $server = $_SESSION['ftpserver'];
    $user = $_SESSION['ftpuser'];
    $pass = $_SESSION['ftppass'];
//connect to your FTP server
    $conn_id = ftp_connect($server);
//login on the server with username and password specified in form
	$login_result = ftp_login($conn_id, $user, $pass);
//check the connection
    if ((!$conn_id) || (!$login_result)) { //if failed echo an error
        echo "$connection_failed!<br/>";
        echo "$connection_failed_tried $server<br/> $connected2 $user.<br/>";
        echo "$connection_failed_check";
        exit;
    }
    else { //if connected echo confirmation message
        echo "<div class='style4'>Zelotypisti FTP <i>Bèta</i></div><br/>$connected1 $server.<br/> $connected2 <i>$user</i>";
	}
}
else{
$server = "";
$user = "";
$pass = "";
echo "<div class='style4'>Zelotypisti FTP <i>Bèta</i></div><br/><br/>";
}
if($_GET['action'] == "delete"){
    $fdel = $_GET['fdel'];
    ftp_delete($conn_id, $fdel);
}
if($_GET['action'] == "rmdir"){
    $fdel = $_GET['fdel'];
    ftp_rmdir($conn_id, $fdel);
}
?></td>
		<td width="150">
		<!--       Begin SourceForge Logo's     -->
		<!-- You can leave this when publishing -->
		<a href="http://sourceforge.net">
		<img src="http://sflogo.sourceforge.net/sflogo.php?group_id=184906&amp;type=1" width="88" height="31" border="0" alt="SourceForge.net Logo" />
		</a>
		<br />
        <a href="http://sourceforge.net/donate/index.php?group_id=184906">
		<img src="http://images.sourceforge.net/images/project-support.jpg" width="88" height="32" border="0" alt="Support This Project" />
		</a>
		<!--        End SourceForge Logo's      -->
		</td>
        <td width="200" class="logo">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td class="setup"><table width="100%" border="0" cellspacing="5" cellpadding="5">
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
		  <form action="index.php?action=login" method="post">
		  <label><?=$login_server;?>:</label><input type="text" id="server" name="server" value="<?=$_SESSION['ftpserver'];?>" />
		  <label><?=$login_user;?>:</label><input type="text" id="user" name="user" value="<?=$_SESSION['ftpuser'];?>" />
		  <label><?=$login_pass;?>:</label><input type="password" id="pass" name="pass" value="<?=$_SESSION['ftppass'];?>" />
		  <label><input type="submit" id="submit" name="submit" value="<?=$login_connect;?>" /></label>
<?php
if (!empty($login_result)){
    echo '<input type="button" id="action" name="action" value="' . $login_logout . '" onclick="window.location = ';
	echo "'";
	echo 'index.php?action=log out';
	echo "'";
	echo '" />
		  <input type="hidden" id="action" name="action" value="' . $upload . '" onclick="';
	echo "javascript:LaunchWindow2('?file=" . $_GET['file'] . "')";
	echo '" />
		  ';
}
?>
		  </form><hr />
<?php
echo'
	<td width="30" height="25"></td>
    <td>' . $ftp_filename . '</td>
	<td width="75" height="25"><div align="center">' . $ftp_md5 . '</div></td>
	<td width="75" height="25"><div align="center">' . $ftp_chmod . '</div></td>
    <td width="75" height="25"><div align="center">' . $ftp_rename . '</div></td>
	<td width="75" height="25"><div align="center">' . $ftp_edit . '</div></td>
    <td width="75" height="25"><div align="center">' . $ftp_delete . '</div></td>
    <td width="75" height="25">' . $ftp_size . '</td>
    </tr>';
echo'
	<tr><td width="30" height="25"><a href="javascript:history.go(-1)"><img src="images/folder.png" border="0" /></a></td>
    <td><a href="javascript:history.go(-1)">...</a></td>
	<td width="75" height="25"><div align="center">-</div></td>
	<td width="75" height="25"><div align="center">-</div></td>
    <td width="75" height="25"><div align="center">-</div></td>
	<td width="75" height="25"><div align="center">-</div></td>
    <td width="75" height="25"><div align="center">-</div></td>
    <td width="75" height="25">-</td>
    </tr>';
?>

          
        
<?php
//get the lenght of the current dir
$init_dir_len = strlen($init_dir);
// define and get contents of the current directory
if(!empty($_GET['file'])){
	$dir = $_GET['file'];
}
else{
	$dir = $init_dir;
}
$contents = ftp_nlist($conn_id, $dir);
// output $contents
sort($contents, SORT_STRING);
for($i = 0; $i < count($contents); $i++){
   	if(count(explode(".", $contents[$i])) != 1){
		$file = substr($contents[$i], 1);
	}
	else{
		$file = $contents[$i];
	}
	$size = ftp_size($conn_id, $file);// get filesize
	$music = array('.mp3','.wav','.wma','.wmv','.avi','.mpg','.flv','mpeg','.asx'); // array with music & video extensions
	$image = array('.jpg','.bmp','.png','.gif','jpeg','.ico'); // array with image extensions
	$web = array('.php','.htm','html','.css','.xml','.js','.txt','.jsp','.log'); // array with webpage (editable) extensions
	$archive = array('.zip','.rar','.tar','.jar','.iso','.cab','.7z'); // array with archive extensions
	$programm = array('.exe','.com'); // array with programm extensions
	$word = array('.doc','.rtf'); // array with MS Word extensions
echo"
          <tr>
            <td width='30' height='25'>";
if($size == "-1"){
	echo"<a href='?file=" . $contents[$i] . "' target='_top'><img src='images/folder.png' border='0'/></a>";
	$link = "<a href='?file=" . $contents[$i] . "' target='_top'>" . substr($contents[$i], $init_dir_len) . "</a>";
}
elseif(in_array(strtolower(substr($contents[$i],-4)), $music)){
    echo'<a href="ftp://' . $user . ':' . $pass . '@' . $server . '' . $contents[$i] . '" target="_top">
	     <img src="images/music.png"  border="0" />
		 </a>';
	$link = '<a href="ftp://' . $user . ':' . $pass . '@' . $server . '' . $contents[$i] . '"  target="_top" >' . substr($contents[$i], 				             $init_dir_len) . '
	         </a>';
}
elseif(in_array(strtolower(substr($contents[$i],-4)), $image)){
    echo'<a href="ftp://' . $user . ':' . $pass . '@' . $server . '' . $contents[$i] . '" target="_blank">
	     <img src="images/image.png"  border="0" />
		 </a>';
	$link = '<a href="ftp://' . $user . ':' . $pass . '@' . $server . '' . $contents[$i] . '"  target="_blank" >' . substr($contents[$i], 				             $init_dir_len) . '
	         </a>';
}
elseif(in_array(strtolower(substr($contents[$i],-4)), $web)){
    echo'<a href="ftp://' . $user . ':' . $pass . '@' . $server . '' . $contents[$i] . '" target="_blank">
	     <img src="images/web.png"  border="0" />
		 </a>';
	$link = '<a href="ftp://' . $user . ':' . $pass . '@' . $server . '' . $contents[$i] . '"  target="_blank" >' . substr($contents[$i], 				             $init_dir_len) . '
	         </a>';
}
elseif(in_array(strtolower(substr($contents[$i],-3)), $web)){
    echo'<a href="ftp://' . $user . ':' . $pass . '@' . $server . '' . $contents[$i] . '" target="_blank">
	     <img src="images/web.png"  border="0" />
		 </a>';
	$link = '<a href="ftp://' . $user . ':' . $pass . '@' . $server . '' . $contents[$i] . '"  target="_blank" >' . substr($contents[$i], 				             $init_dir_len) . '
	         </a>';
}
elseif(in_array(strtolower(substr($contents[$i],-4)), $archive)){
    echo'<a href="ftp://' . $user . ':' . $pass . '@' . $server . '' . $contents[$i] . '" target="_top">
	     <img src="images/archive.png"  border="0" />
		 </a>';
	$link = '<a href="ftp://' . $user . ':' . $pass . '@' . $server . '' . $contents[$i] . '"  target="_top" >' . substr($contents[$i], 				             $init_dir_len) . '
	         </a>';
}
elseif(in_array(strtolower(substr($contents[$i],-3)), $archive)){
    echo'<a href="ftp://' . $user . ':' . $pass . '@' . $server . '' . $contents[$i] . '" target="_top">
	     <img src="images/archive.png"  border="0" />
		 </a>';
	$link = '<a href="ftp://' . $user . ':' . $pass . '@' . $server . '' . $contents[$i] . '"  target="_top" >' . substr($contents[$i], 				             $init_dir_len) . '
	         </a>';
}
elseif(in_array(strtolower(substr($contents[$i],-4)), $programm)){
    echo'<a href="ftp://' . $user . ':' . $pass . '@' . $server . '' . $contents[$i] . '" target="_top">
	     <img src="images/programm.png"  border="0" />
		 </a>';
	$link = '<a href="ftp://' . $user . ':' . $pass . '@' . $server . '' . $contents[$i] . '"  target="_top" >' . substr($contents[$i], 				             $init_dir_len) . '
	         </a>';
}
elseif(in_array(strtolower(substr($contents[$i],-4)), $word)){
    echo'<a href="ftp://' . $user . ':' . $pass . '@' . $server . '' . $contents[$i] . '" target="_blank">
	     <img src="images/word.png"  border="0" />
		 </a>';
	$link = '<a href="ftp://' . $user . ':' . $pass . '@' . $server . '' . $contents[$i] . '"  target="_blank" >' . substr($contents[$i], 				             $init_dir_len) . '
	         </a>';
}
else{
    echo'<a href="ftp://' . $user . ':' . $pass . '@' . $server . '' . $contents[$i] . '" target="_top">
	     <img src="images/else.png"  border="0" />
		 </a>';
	$link = '<a href="ftp://' . $user . ':' . $pass . '@' . $server . '' . $contents[$i] . '"  target="_top" >' . substr($contents[$i], 				             $init_dir_len) . '
	         </a>';
}
			
echo"			</td><td>" . $link . "</td>
            <td height='25'><div align='center'>";
if($size == "-1"){
echo "-" ;
}
else{
	echo '<a href="javascript:NewWindow(';
	echo "'md5sum.php?md5file=ftp://"  . $user . ":" . $pass . "@" . $server . "" . $contents[$i] .			  	           "','md5sum','300','50','center','front');";
	echo '"><img src="images/md5sum.png" width="25" height="25" border="0" /></a>';
}
			/*echo'</div></td>
            <td height="25"><div align="center">';
if($size == "-1"){
echo "-" ;
}
else{
	echo '<a href="javascript:NewWindow(';
	echo "'chmod.php?file=" . $contents[$i] . "','chmod','350','300','center','front');";
	echo '"><img src="images/chmod.png" width="25" height="25" border="0" /></a>';
}
			echo'</div></td> */
			echo'
            <td height="25"><div align="center">';
			echo "<img src='images/rename.png' width='25' height='25' border='0' /></a></div></td>
            <td height='25'><div align='center'>";

if(in_array(strtolower(substr($contents[$i],-4)), $web)){
    echo"
	<img src='images/edit.png' width='25' height='25' />";
}
elseif(in_array(strtolower(substr($contents[$i],-3)), $web)){
    echo"
	<img src='images/edit.png' width='25' height='25' />";
}
else{
    echo "-";
}
			echo"</div></td>
            <td height='25'><div align='center'>";
			if($size == "-1"){
			    echo'
			    <a href="index.php?file=' . $_GET['file'] . '&fdel=' . $contents[$i] . '&action=rmdir">';
			}
			else{
			    echo'
			    <a href="index.php?file=' . $_GET['file'] . '&fdel=' . $contents[$i] . '&action=delete">';
			}
			echo "<img src='images/delete.png' width='25' height='25' border='0' /></a></div></td>
			<td height='25'>";


$mb = (1024 * 1024);
if ($size == "-1"){//if $contents[$i] is a folder...
    $filesize = "-";
    $kb = "";
}
elseif($size >= $mb){//check if the file is bigger than 1 mb, calculate to MBs and round at 3 decimals
    $filesize = round(($size/1024/1024), 3);
    $kb = " MB";
}
else{//else =P
    $filesize = round(($size/1024), 3); // make the size calculate to KBs and round at 3 decimals
    $kb = " KB";
}

echo "$filesize $kb";
echo'
</td>
          </tr>';
}
?></table></td>
      </tr>
      <tr>
        <td><div align="center"><br />
  <table width="100%">
  <tr>
  <td height="25" width="25">
  <img src='images/folder.png' border='0'/>
  </td>
   <td width="80">
    <div align="left"><?=$legenda_folder;?>
    </div></td>
   <td height="25" width="25">
   <img src='images/music.png' border='0'/>
   </td>
   <td width="80">
     <div align="left"><?=$legenda_media;?>
     </div></td>
	<td height="25" width="25">
	<img src='images/image.png' border='0'/>
	</td>
   <td width="80">
	  <div align="left"><?=$legenda_image;?>
      </div></td>
	  	<td height="25" width="25">
	<img src='images/web.png' border='0'/>
	</td>
   <td width="80">
	  <div align="left"><?=$legenda_webpage;?>
      </div></td>
	 <td height="25" width="25"> 
	 <img src='images/else.png' border='0'/>
	 </td>
   <td width="80"> <div align="left"><?=$legenda_unknown;?></div></td>
	 	  	<td height="25" width="25">
	<img src='images/word.png' border='0'/>
	</td>
   <td width="80">
	  <div align="left"><?=$legenda_word;?>
      </div></td>
	 	  	<td height="25" width="25">
	<img src='images/archive.png' border='0'/>
	</td>
   <td width="80">
	  <div align="left"><?=$legenda_archive;?>
      </div></td>
	 	  	<td height="25" width="25">
	<img src='images/programm.png' border='0'/>
	</td>
   <td width="80">
	  <div align="left"><?=$legenda_programm;?>
      </div></td>
	 
	 </tr></table></td>
      </tr>
    </table>
	</td>
  </tr>
</table>
</div>
</body>
</html>