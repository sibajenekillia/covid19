
<?php require_once('Connections/HSRMZAMBIA.php'); ?>
<?php require_once('Connections/HSRMZAMBIA.php'); ?>
<?php require_once('Connections/HSRMZAMBIA.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE response SET citizen_name=%s, citizen_phone=%s, citizen_address=%s, p_idd=%s, d_idd=%s, t_idd=%s, date_time=%s WHERE response_id=%s",
                       GetSQLValueString($_POST['citizen_name'], "text"),
                       GetSQLValueString($_POST['citizen_phone'], "text"),
                       GetSQLValueString($_POST['citizen_address'], "text"),
                       GetSQLValueString($_POST['p_idd'], "int"),
                       GetSQLValueString($_POST['d_idd'], "int"),
                       GetSQLValueString($_POST['t_idd'], "int"),
                       GetSQLValueString($_POST['date_time'], "date"),
                       GetSQLValueString($_POST['response_id'], "int"));

  mysql_select_db($database_HSRMZAMBIA, $HSRMZAMBIA);
  $Result1 = mysql_query($updateSQL, $HSRMZAMBIA) or die(mysql_error());

  $updateGoTo = "index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO response (response_id, citizen_name, citizen_phone, citizen_address, p_idd, d_idd, t_idd, date_time) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['response_id'], "int"),
                       GetSQLValueString($_POST['citizen_name'], "text"),
                       GetSQLValueString($_POST['citizen_phone'], "text"),
                       GetSQLValueString($_POST['citizen_address'], "text"),
                       GetSQLValueString($_POST['p_idd'], "int"),
                       GetSQLValueString($_POST['d_idd'], "int"),
                       GetSQLValueString($_POST['t_idd'], "int"),
                       GetSQLValueString($_POST['date_time'], "date"));

  mysql_select_db($database_HSRMZAMBIA, $HSRMZAMBIA);
  $Result1 = mysql_query($insertSQL, $HSRMZAMBIA) or die(mysql_error());
}

if ((isset($_GET['response_id'])) && ($_GET['response_id'] != "")) {
  $deleteSQL = sprintf("DELETE FROM response WHERE response_id=%s",
                       GetSQLValueString($_GET['response_id'], "int"));

  mysql_select_db($database_HSRMZAMBIA, $HSRMZAMBIA);
  $Result1 = mysql_query($deleteSQL, $HSRMZAMBIA) or die(mysql_error());
}

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$maxRows_combined = 10;
$pageNum_combined = 0;
if (isset($_GET['pageNum_combined'])) {
  $pageNum_combined = $_GET['pageNum_combined'];
}
$startRow_combined = $pageNum_combined * $maxRows_combined;

mysql_select_db($database_HSRMZAMBIA, $HSRMZAMBIA);
$query_combined = "SELECT * FROM response";
$query_limit_combined = sprintf("%s LIMIT %d, %d", $query_combined, $startRow_combined, $maxRows_combined);
$combined = mysql_query($query_limit_combined, $HSRMZAMBIA) or die(mysql_error());
$row_combined = mysql_fetch_assoc($combined);

if (isset($_GET['totalRows_combined'])) {
  $totalRows_combined = $_GET['totalRows_combined'];
} else {
  $all_combined = mysql_query($query_combined);
  $totalRows_combined = mysql_num_rows($all_combined);
}
$totalPages_combined = ceil($totalRows_combined/$maxRows_combined)-1;
$query_combined = "SELECT * FROM response";
$combined = mysql_query($query_combined, $HSRMZAMBIA) or die(mysql_error());
$row_combined = mysql_fetch_assoc($combined);
$totalRows_combined = mysql_num_rows($combined);

mysql_select_db($database_HSRMZAMBIA, $HSRMZAMBIA);
$query_Recordset1 = "SELECT * FROM town";
$Recordset1 = mysql_query($query_Recordset1, $HSRMZAMBIA) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_HSRMZAMBIA, $HSRMZAMBIA);
$query_Recordset2 = "SELECT p_name FROM province";
$Recordset2 = mysql_query($query_Recordset2, $HSRMZAMBIA) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

mysql_select_db($database_HSRMZAMBIA, $HSRMZAMBIA);
$query_Recordset3 = "SELECT * FROM response";
$Recordset3 = mysql_query($query_Recordset3, $HSRMZAMBIA) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "HSRM ZAMBIA DATABASE!";
?>
<style type="text/css">
.bg {
	color: #00F;
}
.red {
	color: #F00;
}
.blue {
	color: #00F;
}
</style>
<p>&nbsp;</p>
<p><strong>RESPONSES</strong></p>
<table border="0">
  <tr class="blue">
    <td><u>response_id</u></td>
    <td><u>citizen name</u></td>
    <td><u>citizen phone</u></td>
    <td><u>citizen address</u></td>
    <td><u>date time</u></td>
  </tr>
  <?php do { ?>
    <tr>
      <td class="red"><?php echo $row_combined['response_id']; ?></td>
      <td><?php echo $row_combined['citizen_name']; ?></td>
      <td><?php echo $row_combined['citizen_phone']; ?></td>
      <td><?php echo $row_combined['citizen_address']; ?></td>
      <td><?php echo $row_combined['date_time']; ?></td>
    </tr>
    <?php } while ($row_combined = mysql_fetch_assoc($combined)); ?>
</table>
<p>&nbsp;</p>
<p>&nbsp;

</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php
mysql_free_result($combined);

mysql_free_result($Recordset3);
?>
