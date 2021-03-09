setup:
	@docker-compose build --no-cache
	@docker-compose up -d --remove-orphans
	@docker-compose exec --user application app composer install --no-interaction
	@docker-compose exec --user application app php -r "file_exists('.env') || copy('.env.example', '.env');"
	@docker-compose exec --user application app php -r "file_exists('.env.testing') || copy('.env.testing.example', '.env.testing');"
	@docker-compose exec --user application app npm install
	@docker-compose exec --user application app php artisan key:generate --ansi
	@docker-compose exec --user application app php artisan migrate --seed
	@docker-compose exec --user application app npm run dev

start:
	@docker-compose stop
	@docker-compose up -d --remove-orphans

stop:
	@docker-compose stop

restart:
	@docker-compose build
	@docker-compose up -d --remove-orphans