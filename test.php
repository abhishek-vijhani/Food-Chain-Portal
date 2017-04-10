 <?php 
    require "data_link.php";
        $c="1";
        $name=$_SESSION['Username'];
        $sql="select user_id from user where user_name='$name'";
        $sql_r=mysql_query($sql) or die(mysql_error());
        $sql_f=mysql_fetch_row($sql_r);
        $qry="select * from item_orders where user_id=$sql_f[0]";
        $res=mysql_query($qry) or die(mysql_error());
        $qry="update item_orders set completion='$c' where order_code=$res[0]";
        mysql_query($qry) or die(mysql_error());
    ?>
