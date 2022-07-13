backup-sql:
	mv docker-compose/mysql/imdsound.sql docker-compose/backup/imdsound$$(date +'%Y_%m_%d_%I_%M_%p').sql

mysqldump: backup-sql
	docker exec imdsound-db /usr/bin/mysqldump --no-tablespaces -u imduser --password=root imdsound > docker-compose/mysql/imdsound.sql
