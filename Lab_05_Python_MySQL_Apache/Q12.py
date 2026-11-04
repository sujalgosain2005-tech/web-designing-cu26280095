from mysql.connector.pooling import MySQLConnectionPool
pool=MySQLConnectionPool(pool_name="mypool",pool_size=5,host="localhost",user="root",password="",database="python_web_db")
db=pool.get_connection()
# use db; then db.close() returns it to the pool
