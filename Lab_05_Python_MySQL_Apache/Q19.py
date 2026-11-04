name=(input("Name: ") or "").strip()
email=(input("Email: ") or "").strip()
if not name or len(name)>100 or "@" not in email:
    raise ValueError("Invalid input")
cur.execute("INSERT INTO users(name,email) VALUES(%s,%s)",(name,email))
db.commit()
