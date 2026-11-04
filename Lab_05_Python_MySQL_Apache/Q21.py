cur.execute("SELECT COUNT(*), AVG(id) FROM users")
count,avg_id=cur.fetchone()
print({"user_count":count,"average_id":avg_id})
