# Main README

## Project Name
Mythorium

## Description
A full-stack web application built using Vue.js for the frontend and Laravel for the backend.

## Tech Stack
- **Frontend:** Vue.js 3, Vue Router, Pinia
- **Backend:** Laravel, MySQL
- **Authentication:** Laravel Sanctum

## Installation Guide

### Clone the Repository
```sh
git clone http://gitlab.neumann-bp.edu.hu/bread/pals-gcs-va-mm.git repo
cd repo
./start.sh
```

## Project Structure
```
/root
  /frontend  # Vue.js frontend
  /backend   # Laravel backend
  /proxy
  /swagger
  /docs  
```

## API Documentation
Refer to [backend](backend.md) for API details.

# Frontend README

## Project Structure
```
/src
  /components  # Vue components
  /views      # Pages
  /router     # Vue Router
  /store      # State Management (Pinia/Vuex)
```
# Backend README

## API Routes
- **GET /api/users** - Fetch all users
- **POST /api/login** - User login
```