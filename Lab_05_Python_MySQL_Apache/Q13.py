import logging
from datetime import datetime
logging.basicConfig(filename="db_errors.log",level=logging.ERROR)
try:
    # run database operation here
    pass
except Exception:
    logging.exception("Database error at %s",datetime.now())
