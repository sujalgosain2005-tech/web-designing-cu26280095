search="A%"
cur.execute("SELECT id,name,email FROM users WHERE name LIKE %s",(search,))
print(cur.fetchall())
