#!/bin/bash

if [ -f "backend/.env" ]; then
    export $(grep -v '^#' backend/.env | xargs)
else
    cp backend/.env.example backend/.env
    export $(grep -v '^#' backend/.env | xargs)
fi

if [ -f ".env" ]; then
    echo "A .env fájl már létezik"
else
    ln -s backend/.env
fi

if ! [ -d "frontend/node_modules" ]; then
    docker run --rm -v "$(pwd)/frontend:/app" --entrypoint npm idomi27/vue install
fi

docker compose up -d

docker compose exec backend composer install

if [ -z "${APP_KEY}" ]; then
    docker compose exec backend php artisan key:generate
else
    echo "Az API kulcs már létezik"
fi

FILE_ID="1BNrN-hgb6VXgYJnjmTlvpNap1onyt13E"
ZIP_FILE="downloaded_file.zip"
DEST_DIR="backend/storage/app/images"

curl -L -o "$ZIP_FILE" "https://drive.google.com/uc?export=download&id=$FILE_ID"

if [ $? -ne 0 ]; then
    echo "Download failed!"
    exit 1
fi

mkdir -p "$DEST_DIR"

unzip -o "$ZIP_FILE" -d "$DEST_DIR"

if [ $? -ne 0 ]; then
    echo "Unzipping failed!"
    exit 1
fi

echo "Download and extraction completed successfully!"

rm "$ZIP_FILE"

docker compose exec backend php artisan storage:link

docker compose exec backend php artisan migrate:fresh --seed