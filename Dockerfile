FROM php:8.2

WORKDIR /app

COPY . .

RUN apt install 


CMD ["php", "artisan", "serve"]