# **Quran API Documentation**

### **Introduction**

The **Quran API** is a modular and production-ready API designed to provide Quranic data efficiently. It includes features for retrieving chapter details, specific verses, and available Quranic editions. The API is fully Dockerized for scalability, security, and ease of deployment. 

This documentation outlines the API's endpoints, usage, and deployment instructions.

---

### **Base URL**

```plaintext
http://localhost:8080
```

All endpoints are accessible directly from the base URL.

---

### **Endpoints**

#### **1. Get Editions List**

- **Description:** Retrieve a list of available Quranic editions (translations, transliterations, etc.).
- **Method:** `POST`
- **Endpoint:** `/`
- **Request Payload:**

  ```json
  {
      "action": "getEditionsList"
  }
  ```

- **Response:**

  ```json
  {
      "status": "success",
      "data": [
          {
              "id": 1,
              "identifier": "quran-simple",
              "language": "ar",
              "name": "Simple Text",
              "englishName": "Quran Simple",
              "format": "text",
              "type": "quran"
          },
          {
              "id": 2,
              "identifier": "en.yusufali",
              "language": "en",
              "name": "Yusuf Ali",
              "englishName": "English Translation",
              "format": "text",
              "type": "translation"
          }
      ]
  }
  ```

- **Error Response:**

  ```json
  {
      "status": "error",
      "message": "No editions found."
  }
  ```

---

#### **2. Get Specific Verse Details**

- **Description:** Retrieve the text and metadata of a specific verse. (defult edition_id set to 20)
- **Method:** `POST`
- **Endpoint:** `/`
- **Request Payload:**

  ```json
  {
      "action": "getVerseDetails",
      "chapter": 2,
      "verse": 255,
      "edition_id": 20
  }
  ```

- **Response:**

  ```json
  {
      "status": "success",
      "data": {
          "verse_text": "Allah! There is no deity except Him, the Ever-Living, the Sustainer of [all] existence...",
          "verse_number": 255,
          "chapter_name": "Al-Baqarah"
      }
  }
  ```

- **Error Response:**

  ```json
  {
      "status": "error",
      "message": "Verse not found."
  }
  ```

---

#### **3. Get Chapter Details**

- **Description:** Retrieve all verses of a chapter, including only the verse text and verse number. (defult edition_id set to 20)
- **Method:** `POST`
- **Endpoint:** `/`
- **Request Payload:**

  ```json
  {
      "action": "getChapterDetails",
      "chapter": 2,
      "edition_id": 20 
  }
  ```

- **Response:**

  ```json
  {
      "status": "success",
      "data": [
          {
              "verse_text": "This is the Book about which there is no doubt...",
              "verse_number": 1
          },
          {
              "verse_text": "This is guidance for those conscious of Allah...",
              "verse_number": 2
          }
      ]
  }
  ```

- **Error Response:**

  ```json
  {
      "status": "error",
      "message": "Chapter not found."
  }
  ```

---

### **Dockerized Deployment**

#### **Prerequisites**

1. Install **Docker** and **Docker Compose**.
2. Ensure the Docker service is running on your system.

---

#### **Folder Structure**

```plaintext
quran-api/
├── controllers/
│   ├── ChapterController.php
│   └── EditionController.php
├── database/
│   └── Database.php
├── models/
│   ├── EditionModel.php
│   └── QuranModel.php
├── routes/
│   └── api.php
├── utils/
│   └── loadEnv.php
├── docker-compose.yml
├── Dockerfile
├── index.php
├── quran.sql
├── README.md
└── test.py
```
---

#### **Deployment Steps**

1. Clone the repository or copy the `quran-api` folder to your server.

2. Run the following command in the `quran-api` folder to build and start the containers:

   ```bash
   docker-compose up --build
   ```

3. Once the containers are up and running, the API will be accessible at:

   ```plaintext
   http://localhost:8080
   ```
---

### **Error Handling**

The API includes robust error handling for all endpoints:

1. **Database Connection Errors:**
   - Ensure the database service is running and the credentials in `docker-compose.yml` match those in the code.

2. **Invalid Input:**
   - Ensure required fields like `chapter`, `verse`, or `action` are provided in the request payload.

3. **No Data Found:**
   - The API returns a standardized error message if no results match the query.

---

### **Scalability and Future Expansion**

- **Modular Design:** Controllers and models are structured to facilitate the addition of new endpoints and features.
- **Dockerized Deployment:** Simplifies scaling and deploying the API in production environments.
- **Multi-Edition Support:** Easily add support for more editions or translations by extending the database.

---

### **API Testing**

You can test the API using tools like **Postman** or **cURL**.

- Example `cURL` Command for `getVerseDetails`:

  ```bash
  curl -X POST http://localhost:8080 -H "Content-Type: application/json" -d '{
      "action": "getVerseDetails",
      "chapter": 2,
      "verse": 255,
      "edition_id": 20
  }'
  ```

---

### **Acknowledgments**

The **Quran API** utilizes the **Quran Database** provided by [Abdullah Ghanem](https://github.com/AbdullahGhanem/quran-database). Special thanks to him for his contribution, which made this API possible. You can explore the database and its resources at the following link:

[Quran Database by Abdullah Ghanem](https://github.com/AbdullahGhanem/quran-database)

---

### **Contact and Support**

For questions or support, please reach out to the development team or refer to the repository's issue tracker.

Enjoy using the Quran API! 😊
