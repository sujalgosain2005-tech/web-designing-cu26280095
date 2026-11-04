import mysql.connector
db=mysql.connector.connect(host="localhost",user="root",password="")
cur=db.cursor()
cur.execute("CREATE DATABASE IF NOT EXISTS python_web_db")
cur.execute("USE python_web_db")
cur.execute("CREATE TABLE IF NOT EXISTS users(id INT AUTO_INCREMENT PRIMARY KEY,name VARCHAR(100),email VARCHAR(150))")
db.commit(); cur.close(); db.close()
