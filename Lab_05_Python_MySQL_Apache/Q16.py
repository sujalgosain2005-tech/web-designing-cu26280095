import json
cur.execute("SELECT id,name,email FROM users")
print("Content-Type: application/json\n")
print(json.dumps(cur.fetchall(),default=str))
