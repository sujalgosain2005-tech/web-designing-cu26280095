try:
 cur.execute("DELETE FROM users WHERE id=%s",(1,))
 db.commit()
except mysql.connector.Error as err:
 db.rollback()
 print("Database error:",err)
