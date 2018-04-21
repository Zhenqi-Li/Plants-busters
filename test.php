<?php
    function ShowTable($table_name){
        $conn=mysqli_connect("localhost","root","","project",3308);
        if(!$conn){
            echo "Fail!";
        }
        mysqli_query($conn, "set names utf8");
        $sql="select * from $table_name";
        $res=mysqli_query($conn,$sql);
        $rows=mysqli_affected_rows($conn);
        $colums=mysqli_num_fields($res);
        echo "test's database"."$table_name"."information is ：<br/>";
        echo "total".$rows."rows ".$colums."columns<br/>";
         
        echo "<table style='border-color: #efefef;' border='1px' cellpadding='5px' cellspacing='0px'><tr>";
        for($i=0; $i < $colums; $i++){
            $field_info = mysqli_fetch_field_direct($res, $i);
            echo "<th>$field_info->name</th>";
        }
        echo "</tr>";
        while($row=mysqli_fetch_row($res)){
            echo "<tr>";
            for($i=0; $i<$colums; $i++){
                echo "<td>$row[$i]</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    ShowTable("user_details");
?>