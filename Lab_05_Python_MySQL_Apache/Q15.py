from sqlalchemy import create_engine,String,Integer
from sqlalchemy.orm import DeclarativeBase, Mapped, mapped_column
class Base(DeclarativeBase): pass
class User(Base):
    __tablename__="users"
    id: Mapped[int]=mapped_column(Integer,primary_key=True)
    name: Mapped[str]=mapped_column(String(100))
engine=create_engine("mysql+mysqlconnector://root:password@localhost/python_web_db")
Base.metadata.create_all(engine)
