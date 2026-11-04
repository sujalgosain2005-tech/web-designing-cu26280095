import csv
with open("users.csv",newline="",encoding="utf-8") as f:
 rows=[(r["name"],r["email"]) for r in csv.DictReader(f)]
cur.executemany("INSERT INTO users(name,email) VALUES(%s,%s)",rows)
db.commit()
