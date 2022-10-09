<?php include "connect.php" ?>

<html>
<head><meta charsrt = "utf-8">
<script>
function confirmDelete(username){
    var ans = confirm("ต้องการลบข้อมูลของ username " + username);
    if(ans==true)
        document.location = "delete.php?username=" + username;
}
</script>
</head>

<body>
<?php
    $stmt = $pdo->prepare("SELECT * FROM member");
    $stmt->execute();
    while($row = $stmt->fetch()){
        echo "ชื่อสมาชิก: ".$row["username"]. "<br>";
        echo "รหัสผ่าน: ".$row["password"]. "<br>";
        echo "ชื่อ: ".$row["name"]. "<br>";
        echo "ที่อยู่: ".$row["address"]. "<br>";
        echo "เบอร์โทร: ".$row["mobile"]. "<br>";
        echo "อีเมล: ".$row["email"]. "<br>";?>
        <a href= '#' onclick=confirmDelete("<?=$row["username"]?>")>ลบ</a>
        <?php echo "<hr>\n";
    }
    ?>
    </body>
    </html>