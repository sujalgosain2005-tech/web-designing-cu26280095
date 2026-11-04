cur.executemany("INSERT INTO users(name,email) VALUES(%s,%s)",[
 ("Aman","aman@example.com"),("Riya","riya@example.com")])
db.commit()
