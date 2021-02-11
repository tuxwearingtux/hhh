<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
body {
	background-color: #ECE9D8;
}
-->
</style></head>

<body>
  <div align="center">
    <input name="textfield" type="text" value="<?=md5(file_get_contents($_GET['md5file']));?>" size="40" maxlength="32" />
    <br />
    <input name="Close" type="submit" id="Close" value="Close" onclick="javascript:window.close()" />
  </div>
</body>
</html>
