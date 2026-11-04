# Lab Sheet 5 — Python, MySQL and Apache

Questions and concise sample answers based on the supplied lab sheet.

## Q1. Apache Python CGI/WSGI
**Question:** Configure Apache to run Python CGI/WSGI and test Hello World.

**Answer:**
```python
For CGI, enable the CGI module and configure a CGI directory according to your Apache installation. A minimal script: `#!/usr/bin/env python3\nprint('Content-Type: text/plain\\n')\nprint('Hello World')`. Make it executable where required. WSGI setup differs by OS and Apache package.
```

## Q2. Install connector
**Question:** Install mysql-connector-python or PyMySQL.

**Answer:**
```python
Run: `python -m pip install mysql-connector-python`
```

## Q3. Connect and get server version
**Question:** Connect to MySQL and query server version.

**Answer:**
```python
import mysql.connector
db=mysql.connector.connect(host="localhost",user="root",password="",database="college_db")
cur=db.cursor(); cur.execute("SELECT VERSION()")
print(cur.fetchone()[0]); cur.close(); db.close()
```

## Q4. Create database and users table
**Question:** Create python_web_db and users table.

**Answer:**
```python
import mysql.connector
db=mysql.connector.connect(host="localhost",user="root",password="")
cur=db.cursor()
cur.execute("CREATE DATABASE IF NOT EXISTS python_web_db")
cur.execute("USE python_web_db")
cur.execute("CREATE TABLE IF NOT EXISTS users(id INT AUTO_INCREMENT PRIMARY KEY,name VARCHAR(100),email VARCHAR(150))")
db.commit(); cur.close(); db.close()
```

## Q5. Insert multiple users
**Question:** Use executemany() to insert records.

**Answer:**
```python
cur.executemany("INSERT INTO users(name,email) VALUES(%s,%s)",[
 ("Aman","aman@example.com"),("Riya","riya@example.com")])
db.commit()
```

## Q6. Return HTML records
**Question:** Fetch users and format an HTML response.

**Answer:**
```python
cur.execute("SELECT id,name,email FROM users")
rows=cur.fetchall()
html="<table><tr><th>ID</th><th>Name</th><th>Email</th></tr>"
for r in rows:
 html += "<tr>"+"".join(f"<td>{v}</td>" for v in r)+"</tr>"
html += "</table>"
print(html)
```

## Q7. CGI form input
**Question:** Read form data with cgi module and insert into MySQL.

**Answer:**
```python
import cgi, mysql.connector, html
form=cgi.FieldStorage()
name=form.getfirst("name","")
email=form.getfirst("email","")
db=mysql.connector.connect(host="localhost",user="root",password="",database="python_web_db")
cur=db.cursor()
cur.execute("INSERT INTO users(name,email) VALUES(%s,%s)",(name,email))
db.commit()
print("Content-Type: text/html\n")
print("<p>Saved</p>")
cur.close(); db.close()
```

## Q8. Update user
**Question:** Update profile by user ID.

**Answer:**
```python
cur.execute("UPDATE users SET name=%s,email=%s WHERE id=%s",("Aman","new@example.com",1))
db.commit()
```

## Q9. Delete with exception handling
**Question:** Delete record and handle errors.

**Answer:**
```python
try:
 cur.execute("DELETE FROM users WHERE id=%s",(1,))
 db.commit()
except mysql.connector.Error as err:
 db.rollback()
 print("Database error:",err)
```

## Q10. Apache htaccess
**Question:** Configure handlers for Python scripts.

**Answer:**
```python
Apache handler directives are server-specific. Enable the required CGI/WSGI module and configure the script directory in the Apache virtual-host configuration. Avoid enabling execution for untrusted upload folders.
```

## Q11. Parameterized query
**Question:** Use parameterized SQL to prevent injection.

**Answer:**
```python
search="A%"
cur.execute("SELECT id,name,email FROM users WHERE name LIKE %s",(search,))
print(cur.fetchall())
```

## Q12. Connection pooling
**Question:** Use MySQL connection pool.

**Answer:**
```python
from mysql.connector.pooling import MySQLConnectionPool
pool=MySQLConnectionPool(pool_name="mypool",pool_size=5,host="localhost",user="root",password="",database="python_web_db")
db=pool.get_connection()
# use db; then db.close() returns it to the pool
```

## Q13. Database logging
**Question:** Log errors and timestamps.

**Answer:**
```python
import logging
from datetime import datetime
logging.basicConfig(filename="db_errors.log",level=logging.ERROR)
try:
    # run database operation here
    pass
except Exception:
    logging.exception("Database error at %s",datetime.now())
```

## Q14. CSV bulk insert
**Question:** Read CSV and bulk insert rows.

**Answer:**
```python
import csv
with open("users.csv",newline="",encoding="utf-8") as f:
 rows=[(r["name"],r["email"]) for r in csv.DictReader(f)]
cur.executemany("INSERT INTO users(name,email) VALUES(%s,%s)",rows)
db.commit()
```

## Q15. SQLAlchemy ORM
**Question:** Map Python class to MySQL table.

**Answer:**
```python
from sqlalchemy import create_engine,String,Integer
from sqlalchemy.orm import DeclarativeBase, Mapped, mapped_column
class Base(DeclarativeBase): pass
class User(Base):
    __tablename__="users"
    id: Mapped[int]=mapped_column(Integer,primary_key=True)
    name: Mapped[str]=mapped_column(String(100))
engine=create_engine("mysql+mysqlconnector://root:password@localhost/python_web_db")
Base.metadata.create_all(engine)
```

## Q16. JSON endpoint
**Question:** Return JSON from database query.

**Answer:**
```python
import json
cur.execute("SELECT id,name,email FROM users")
print("Content-Type: application/json\n")
print(json.dumps(cur.fetchall(),default=str))
```

## Q17. Database backup
**Question:** Export schema/data to SQL file.

**Answer:**
```python
import subprocess
subprocess.run(["mysqldump","-u","root","-p","python_web_db","-r","backup.sql"],check=True)
# Enter password securely when prompted; do not hard-code it.
```

## Q18. Session handling
**Question:** Maintain user session in Python web app.

**Answer:**
```python
Use the session facility provided by your web framework (for example Flask `session`). Configure a strong secret key from an environment variable and store only minimal session data.
```

## Q19. Validate inputs
**Question:** Validate/sanitize form data before SQL write.

**Answer:**
```python
name=(input("Name: ") or "").strip()
email=(input("Email: ") or "").strip()
if not name or len(name)>100 or "@" not in email:
    raise ValueError("Invalid input")
cur.execute("INSERT INTO users(name,email) VALUES(%s,%s)",(name,email))
db.commit()
```

## Q20. Virtual environment
**Question:** Create and configure venv for deployment.

**Answer:**
```python
Run `python -m venv .venv`, activate it (`.venv\\Scripts\\activate` on Windows or `source .venv/bin/activate` on macOS/Linux), then install dependencies with `pip install mysql-connector-python`. Configure Apache/WSGI to use that environment's interpreter.
```

## Q21. Analytical report
**Question:** Generate counts and averages for dashboard.

**Answer:**
```python
cur.execute("SELECT COUNT(*), AVG(id) FROM users")
count,avg_id=cur.fetchone()
print({"user_count":count,"average_id":avg_id})
```
