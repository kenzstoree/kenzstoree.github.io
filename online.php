<!DOCTYPE html>
<html>
<head>
    <title>طلبات</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
</head>
<body>
        <style>
    table {
        border: 1px solid black;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid black;
        padding: 8px;
    }
    </style>

    <?php
        $servername = "sql110.epizy.com";
        $username = "epiz_33877004";
        $password = "FJvUGGJo04PVn";
        $dbname = "epiz_33877004_mahdawi14";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
// التحقق من اتصال قاعدة البيانات
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// استعلام SQL لاسترداد البيانات
$sql = "SELECT id, name, phone, adress, customer_quantity, note FROM my_table ORDER BY id DESC"; // يتم ترتيب الجدول حسب id بترتيب تنازلي
$result = $conn->query($sql);

// عرض البيانات في جدول
if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Name</th><th>Phone</th><th>adress</th><th>quantity</th><th>note</th><th>Delete</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td>" . $row["phone"]. "</td><td>" . $row["adress"]. "</td><td>" . $row["customer_quantity"]. "</td><td>" . $row["note"]. "</td>";
        echo '<td><button onclick="deleteRow('.$row["id"].')">Delete</button></td></tr>';
    }
    echo "</table>";
} else {
    echo "0 results";
}

// إغلاق الاتصال بقاعدة البيانات
$conn->close();

// إضافة الجافاسكريبت لحذف الصف
echo '
<script>
function deleteRow(id) {
    if (confirm("Are you sure you want to delete this row?")) {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "delete.php?id=" + id);
        xhr.onload = function() {
            // do something with the response, if needed
            location.reload(); // reload the page
        }
        xhr.send();
    }
}
</script>
';

    ?>
</body>
</html>
