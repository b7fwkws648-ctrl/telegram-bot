FROM php:8.2-cli

WORKDIR /app

COPY bot.php .

CMD ["sh", "-c", "php -S 0.0.0.0:${PORT:-10000} -t /app"]
