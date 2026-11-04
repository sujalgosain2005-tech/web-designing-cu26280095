import subprocess
subprocess.run(["mysqldump","-u","root","-p","python_web_db","-r","backup.sql"],check=True)
# Enter password securely when prompted; do not hard-code it.
