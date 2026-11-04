cur.execute("UPDATE users SET name=%s,email=%s WHERE id=%s",("Aman","new@example.com",1))
db.commit()
