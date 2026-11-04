# Lab Sheet 4 — PHP, MySQL and Apache

Questions and concise sample answers based on the supplied lab sheet.

## Q1. Apache local setup
**Question:** Install/start Apache and verify default page at localhost.

**Answer:**
```text
Open XAMPP Control Panel, start Apache, place `index.html` in `htdocs/college/`, then visit `http://localhost/college/`.
```

## Q2. PHP error reporting
**Question:** Enable display_errors and verify phpinfo().

**Answer:**
```text
In php.ini set `display_errors=On` and `error_reporting=E_ALL`, restart Apache. Create `info.php` containing `<?php phpinfo(); ?>` and open `http://localhost/info.php`.
```

## Q3. Create MySQL database
**Question:** Connect to MySQL and create college_db.

**Answer:**
```text
CREATE DATABASE college_db;
USE college_db;
```

## Q4. PDO connection
**Question:** Connect PHP to MySQL using PDO.

**Answer:**
```text
<?php
$host="localhost"; $db="college_db"; $user="root"; $pass="";
try {
 $pdo=new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4",$user,$pass,
   [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
 echo "Database connected";
} catch(PDOException $e) { echo "Connection failed"; }
?>
```

## Q5. Create students table
**Question:** Create students table with id, name, email and enrollment_date.

**Answer:**
```text
<?php
require "db.php";
$sql="CREATE TABLE IF NOT EXISTS students(
 id INT AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(100) NOT NULL,
 email VARCHAR(150) NOT NULL,
 enrollment_date DATE
)";
$pdo->exec($sql); echo "Table created";
?>
```

## Q6. Insert student
**Question:** Insert a student using a prepared statement.

**Answer:**
```text
<?php
require "db.php";
$stmt=$pdo->prepare("INSERT INTO students(name,email,enrollment_date) VALUES(?,?,?)");
$stmt->execute(["Aman","aman@example.com","2026-01-10"]);
echo "Student inserted";
?>
```

## Q7. Display students
**Question:** Fetch and show students in an HTML table.

**Answer:**
```text
<?php
require "db.php";
foreach($pdo->query("SELECT * FROM students") as $row){
 echo htmlspecialchars($row["name"])." - ".htmlspecialchars($row["email"])."<br>";
}
?>
```

## Q8. Update email
**Question:** Update a student's email by ID.

**Answer:**
```text
<?php
require "db.php";
$stmt=$pdo->prepare("UPDATE students SET email=? WHERE id=?");
$stmt->execute(["new@example.com",1]); echo "Rows updated: ".$stmt->rowCount();
?>
```

## Q9. Delete student
**Question:** Delete a student using GET parameter.

**Answer:**
```text
<?php
require "db.php";
$id=filter_input(INPUT_GET,"id",FILTER_VALIDATE_INT);
if($id){$stmt=$pdo->prepare("DELETE FROM students WHERE id=?");$stmt->execute([$id]);echo "Deleted";}else{echo "Invalid ID";}
?>
```

## Q10. Apache virtual host
**Question:** Configure a local custom domain collegeweb.local.

**Answer:**
```text
Add a VirtualHost in Apache config pointing `DocumentRoot` to your project folder, add `127.0.0.1 collegeweb.local` to the system hosts file, restart Apache, then visit `http://collegeweb.local`. Exact config path varies by OS/XAMPP.
```

## Q11. Server variables
**Question:** Display Apache server information using $_SERVER.

**Answer:**
```text
<?php
echo htmlspecialchars($_SERVER["SERVER_SOFTWARE"] ?? "Unknown");
echo "<br>".htmlspecialchars($_SERVER["SERVER_NAME"] ?? "Unknown");
?>
```

## Q12. Login authentication
**Question:** Verify username/password against MySQL records.

**Answer:**
```text
<?php
require "db.php";
$stmt=$pdo->prepare("SELECT password_hash FROM users WHERE username=?");
$stmt->execute([$_POST["username"] ?? ""]);
$row=$stmt->fetch(PDO::FETCH_ASSOC);
if($row && password_verify($_POST["password"] ?? "",$row["password_hash"])) echo "Login successful";
else echo "Invalid login";
?>
```

## Q13. File upload
**Question:** Validate file size and extension before saving.

**Answer:**
```text
<?php
if(isset($_FILES["photo"]) && $_FILES["photo"]["error"]===UPLOAD_ERR_OK){
 $allowed=["jpg","jpeg","png"]; $ext=strtolower(pathinfo($_FILES["photo"]["name"],PATHINFO_EXTENSION));
 if(in_array($ext,$allowed,true) && $_FILES["photo"]["size"]<2*1024*1024){
  $name=bin2hex(random_bytes(8)).".".$ext;
  move_uploaded_file($_FILES["photo"]["tmp_name"],__DIR__."/uploads/".$name);
  echo "Uploaded";
 } else echo "Invalid file";
}
?>
```

## Q14. MySQL privileges
**Question:** Create restricted database user.

**Answer:**
```text
CREATE USER 'webuser'@'localhost' IDENTIFIED BY 'ChangeThisPassword!';
GRANT SELECT, INSERT, UPDATE ON college_db.* TO 'webuser'@'localhost';
FLUSH PRIVILEGES;
```

## Q15. PHP sessions
**Question:** Maintain login state using sessions.

**Answer:**
```text
<?php
session_start();
$_SESSION["username"]="Aman";
echo "Welcome ".htmlspecialchars($_SESSION["username"]);
?>
```

## Q16. Cookies
**Question:** Store and read theme preference.

**Answer:**
```text
<?php
setcookie("theme","dark",time()+86400,"/","",false,true);
echo $_COOKIE["theme"] ?? "Theme saved; reload to read it";
?>
```

## Q17. Export CSV
**Question:** Download students table as CSV.

**Answer:**
```text
<?php
require "db.php";
header("Content-Type: text/csv");
header('Content-Disposition: attachment; filename="students.csv"');
$out=fopen("php://output","w"); fputcsv($out,["ID","Name","Email"]);
foreach($pdo->query("SELECT id,name,email FROM students") as $r) fputcsv($out,$r);
fclose($out);
?>
```

## Q18. Apache logs
**Question:** Inspect error.log and access.log.

**Answer:**
```text
Open Apache's `logs/error.log` for errors and `logs/access.log` for request records. Paths depend on the installation; reproduce a request and review the newest entries.
```

## Q19. Transactions
**Question:** Use PDO beginTransaction, commit and rollback.

**Answer:**
```text
<?php
require "db.php";
try {
 $pdo->beginTransaction();
 $pdo->exec("INSERT INTO audit_log(message) VALUES('New operation')");
 $pdo->commit(); echo "Committed";
} catch(Throwable $e) { if($pdo->inTransaction()) $pdo->rollBack(); echo "Rolled back"; }
?>
```

## Q20. PHP extensions
**Question:** Enable and verify common PHP extensions.

**Answer:**
```text
In php.ini enable the required extensions (for example `extension=mysqli`, `extension=pdo_mysql`, `extension=mbstring`, `extension=curl`), restart Apache and check `phpinfo()` or `php -m`.
```

## Q21. Password hashing
**Question:** Store and verify password hashes.

**Answer:**
```text
<?php
$hash=password_hash("sample-password",PASSWORD_DEFAULT);
if(password_verify("sample-password",$hash)) echo "Password verified";
?>
```
