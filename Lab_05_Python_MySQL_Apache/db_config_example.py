# Reusable MySQL connection example
import mysql.connector
def connect_db():
    return mysql.connector.connect(
        host="localhost", user="root", password="YOUR_PASSWORD",
        database="python_web_db"
    )
