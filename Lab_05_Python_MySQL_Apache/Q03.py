import mysql.connector
db=mysql.connector.connect(host="localhost",user="root",password="",database="college_db")
cur=db.cursor(); cur.execute("SELECT VERSION()")
print(cur.fetchone()[0]); cur.close(); db.close()
