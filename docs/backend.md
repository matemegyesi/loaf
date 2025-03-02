# Backend API Documentation

This is the backend API for managing and retrieving data related to myths, legends, images, habitats, sizes, and elements. It is built using the Laravel framework.

## Endpoints

### 1. **Myths**
- **GET** `/myths`  
  Retrieve a list of all myths.

- **GET** `/myths/{id}`  
  Retrieve a specific myth by its ID.

- **POST** `/myths`  
  Create a new myth.

- **PUT** `/myths/{id}`  
  Update an existing myth by its ID.

- **DELETE** `/myths/{id}`  
  Delete a specific myth by its ID.

**Controller:** `MythController`

---

### 2. **Legends**
- **GET** `/legends`  
  Retrieve a list of all legends.

- **GET** `/legends/{id}`  
  Retrieve a specific legend by its ID.

**Controller:** `LegendController`  
**Allowed Methods:** `index`, `show`

---

### 3. **Images**
- **GET** `/images`  
  Retrieve a list of all images.

- **GET** `/images/{image}`  
  Retrieve a specific image by its filename.

- **POST** `/images`  
  Upload and store a new image.

**Controller:** `ImageController`

---

### 4. **Habitats**
- **GET** `/habitats`  
  Retrieve a list of all habitats.

**Controller:** `HabitatController`  
**Route Name:** `habitats.index`

---

### 5. **Sizes**
- **GET** `/sizes`  
  Retrieve a list of all sizes.

**Controller:** `SizeController`  
**Route Name:** `sizes.index`

---

### 6. **Elements**
- **GET** `/elements`  
  Retrieve a list of all elements.

**Controller:** `ElementController`  
**Route Name:** `elements.index`

---

## API Overview

- **Base URL**: `/api`
- **Version**: 1.0

## Authentication

Currently, this API does not require authentication.

---

## Example Responses

### 1. **Myths**
- **GET** `/myths`
```json
[
    {
        "id": 1,
        "name": "The Myth of Fire",
        "description": "A myth about the origin of fire.",
        "created_at": "2025-02-01T12:00:00Z",
        "updated_at": "2025-02-01T12:00:00Z"
    },
    {
        "id": 2,
        "name": "The Myth of Water",
        "description": "A myth about the origin of water.",
        "created_at": "2025-02-02T12:00:00Z",
        "updated_at": "2025-02-02T12:00:00Z"
    }
]
