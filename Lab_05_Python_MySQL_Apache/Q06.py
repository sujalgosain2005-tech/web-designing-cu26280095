cur.execute("SELECT id,name,email FROM users")
rows=cur.fetchall()
html="<table><tr><th>ID</th><th>Name</th><th>Email</th></tr>"
for r in rows:
 html += "<tr>"+"".join(f"<td>{v}</td>" for v in r)+"</tr>"
html += "</table>"
print(html)
