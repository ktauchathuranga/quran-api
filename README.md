# **Quran API Documentation**

### **Introduction**

The **Quran API** is a modular and production-ready API designed to provide Quranic data efficiently. It includes features for retrieving chapter details, specific verses, and available Quranic editions. The API is fully Dockerized for scalability, security, and ease of deployment. 

This documentation outlines the API's endpoints, usage, and deployment instructions.

**Server Status:** **<span style='color: green;'>UP</span>**

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


## Available Editions

This API provides access to multiple translations and tafsirs (interpretations) of the Quran in various languages. Below is a list of available editions, each with a unique identifier (ID), language name, translation name, English name, and type. You can reference the `id` for each edition when making requests to the API.


| ID | Language | Name | English Name | Type |
| --- | -------- | ---- | ------------ | ---- |
| 1 | Arabic | تفسير المیسر | King Fahad Quran Complex | tafsir |
| 2 | Azerbaijani | Məmmədəliyev & Bünyadov | Vasim Mammadaliyev and Ziya Bunyadov | translation |
| 3 | Azerbaijani | Musayev | Alikhan Musayev | translation |
| 4 | Bengali | মুহিউদ্দীন খান | Muhiuddin Khan | translation |
| 5 | Czech | Hrbek | Preklad I. Hrbek | translation |
| 6 | Czech | Nykl | A. R. Nykl | translation |
| 7 | German | Abu Rida | Abu Rida Muhammad ibn Ahmad ibn Rassoul | translation |
| 8 | German | Bubenheim & Elyas | A. S. F. Bubenheim and N. Elyas | translation |
| 9 | German | Khoury | Adel Theodor Khoury | translation |
| 10 | German | Zaidan | Amir Zaidan | translation |
| 11 | Divehi | ދިވެހި | Office of the President of Maldives | translation |
| 12 | English | Ahmed Ali | Ahmed Ali | translation |
| 13 | English | Ahmed Raza Khan | Ahmed Raza Khan | translation |
| 14 | English | Arberry | A. J. Arberry | translation |
| 15 | English | Asad | Muhammad Asad | translation |
| 16 | English | Daryabadi | Abdul Majid Daryabadi | translation |
| 17 | English | Hilali & Khan | Muhammad Taqi-ud-Din al-Hilali and Muhammad Muhsin Khan | translation |
| 18 | English | Pickthall | Mohammed Marmaduke William Pickthall | translation |
| 19 | English | Qaribullah & Darwish | Hasan al-Fatih Qaribullah and Ahmad Darwish | translation |
| 20 | English | Saheeh International | Saheeh International | translation |
| 21 | English | Sarwar | Muhammad Sarwar | translation |
| 22 | English | Yusuf Ali | Abdullah Yusuf Ali | translation |
| 23 | Persian | آیتی | AbdolMohammad Ayati | translation |
| 24 | Persian | فولادوند | Mohammad Mahdi Fooladvand | translation |
| 25 | Persian | الهی قمشه‌ای | Mahdi Elahi Ghomshei | translation |
| 26 | Persian | مکارم شیرازی | Naser Makarem Shirazi | translation |
| 27 | French | Hamidullah | Muhammad Hamidullah | translation |
| 28 | Hausa | Gumi | Abubakar Mahmoud Gumi | translation |
| 29 | Hindi | फ़ारूक़ ख़ान & नदवी | Suhel Farooq Khan and Saifur Rahman Nadwi | translation |
| 30 | Indonesian | Bahasa Indonesia | Unknown | translation |
| 31 | Italian | Piccardo | Hamza Roberto Piccardo | translation |
| 32 | Japanese | Japanese | Unknown | translation |
| 33 | Korean | Korean | Unknown | translation |
| 34 | Kurdish | ته‌فسیری ئاسان | Burhan Muhammad-Amin | translation |
| 35 | Malayalam | അബ്ദുല്‍ ഹമീദ് & പറപ്പൂര്‍ | Cheriyamundam Abdul Hameed and Kunhi Mohammed Parappoor | translation |
| 36 | Dutch | Keyzer | Salomo Keyzer | translation |
| 37 | Norwegian | Einar Berg | Einar Berg | translation |
| 38 | Polish | Bielawskiego | Józefa Bielawskiego | translation |
| 39 | Portuguese | El-Hayek | Samir El-Hayek | translation |
| 40 | Romanian | Grigore | George Grigore | translation |
| 41 | Russian | Кулиев | Elmir Kuliev | translation |
| 42 | Russian | Османов | Magomed-Nuri Osmanovich Osmanov | translation |
| 43 | Russian | Порохова | V. Porokhova | translation |
| 44 | Sindhi | امروٽي | Taj Mehmood Amroti | translation |
| 45 | Somali | Abduh | Mahmud Muhammad Abduh | translation |
| 46 | Albanian | Sherif Ahmeti | Sherif Ahmeti | translation |
| 47 | Albanian | Feti Mehdiu | Feti Mehdiu | translation |
| 48 | Albanian | Efendi Nahi | Hasan Efendi Nahi | translation |
| 49 | Swedish | Bernström | Knut Bernström | translation |
| 50 | Swahili | Al-Barwani | Ali Muhsin Al-Barwani | translation |
| 51 | Tamil | ஜான் டிரஸ்ட் | Jan Turst Foundation | translation |
| 52 | Tajik | Оятӣ | AbdolMohammad Ayati | translation |
| 53 | Thai | ภาษาไทย | King Fahad Quran Complex | translation |
| 54 | Turkish | Süleyman Ateş | Suleyman Ates | translation |
| 55 | Turkish | Alİ Bulaç | Alİ Bulaç | translation |
| 56 | Turkish | Diyanet İşleri | Diyanet Isleri | translation |
| 57 | Turkish | Abdulbakî Gölpınarlı | Abdulbaki Golpinarli | translation |
| 58 | Turkish | Öztürk | Yasar Nuri Ozturk | translation |
| 59 | Turkish | Çeviriyazı | Muhammet Abay | transliteration |
| 60 | Turkish | Diyanet Vakfı | Diyanet Vakfi | translation |
| 61 | Turkish | Elmalılı Hamdi Yazır | Elmalili Hamdi Yazir | translation |
| 62 | Turkish | Suat Yıldırım | Suat Yildirim | translation |
| 63 | Turkish | Edip Yüksel | Edip Yüksel | translation |
| 64 | Tatar | Yakub Ibn Nugman | Yakub Ibn Nugman | translation |
| 65 | Uighur | محمد صالح | Muhammad Saleh | translation |
| 66 | Urdu | احمد علی | Ahmed Ali | translation |
| 67 | Urdu | جالندہری | Fateh Muhammad Jalandhry | translation |
| 68 | Urdu | علامہ جوادی | Syed Zeeshan Haider Jawadi | translation |
| 69 | Urdu | احمد رضا خان | Ahmed Raza Khan | translation |
| 70 | Urdu | طاہر القادری | Tahir ul Qadri | translation |
| 71 | Uzbek | Мухаммад Содик | Muhammad Sodik Muhammad Yusuf | translation |
| 72 | English | Maududi | Abul Ala Maududi | translation |
| 73 | English | Shakir | Mohammad Habib Shakir | translation |
| 74 | English | Transliteration | English Transliteration | transliteration |
| 75 | Spanish | Cortes | Julio Cortes | translation |
| 76 | Persian | انصاریان | Hussain Ansarian | translation |
| 77 | Arabic | Simple | Simple | quran |
| 78 | Arabic | Simple Clean | Simple Clean | quran |
| 79 | Arabic | Simple Enhanced | Simple Enhanced | quran |
| 80 | Arabic | Simple Minimal | Simple Minimal | quran |
| 81 | Arabic | Uthmani Minimal | Uthmani Minimal | quran |
| 82 | Arabic | Uthamani | Uthamani | quran |
| 83 | Bulgarian | Теофанов | Tzvetan Theophanov | translation |
| 84 | Bosnian | Mlivo | Mustafa Mlivo | translation |
| 85 | Persian | بهرام پور | Abolfazl Bahrampour | translation |
| 86 | Spanish | Asad | Muhammad Asad - Abdurrasak Pérez | translation |
| 87 | Persian | خرمشاهی | Baha'oddin Khorramshahi | translation |
| 88 | Persian | مجتبوی | Sayyed Jalaloddin Mojtabavi | translation |
| 89 | Hindi | फ़ारूक़ ख़ान & अहमद | Muhammad Farooq Khan and Muhammad Ahmed | translation |
| 90 | Indonesian | Quraish Shihab | Muhammad Quraish Shihab et al. | translation |
| 91 | Malay | Basmeih | Abdullah Muhammad Basmeih | translation |
| 92 | Russian | Абу Адель | Abu Adel | translation |
| 93 | Russian | Крачковский | Ignaty Yulianovich Krachkovsky | translation |
| 94 | Russian | Аль-Мунтахаб | Ministry of Awqaf, Egypt | translation |
| 95 | Russian | Саблуков | Gordy Semyonovich Sablukov | translation |
| 96 | Urdu | محمد جوناگڑھی | Muhammad Junagarhi | translation |
| 97 | Urdu | ابوالاعلی مودودی | Abul A'ala Maududi | translation |
| 98 | Chinese | Ma Jian | Ma Jian | translation |
| 99 | Chinese | Ma Jian (Traditional) | Ma Jian | translation |
| 100 | Persian | خرمدل | Mostafa Khorramdel | translation |
| 101 | Persian | معزی | Mohammad Kazem Moezzi | translation |
| 102 | Bosnian | Korkut | Besim Korkut | translation |
| 103 | Arabic | تفسير الجلالين | Jalal ad-Din al-Mahalli and Jalal ad-Din as-Suyuti | tafsir |
| 104 | Arabic | Tajweed | Tajweed | quran |
| 105 | Arabic | Word By Word | Word By Word | quran |
| 130 | Arabic | Kids | Kids | quran |
| 131 | Arabic | Corpus | Corpus | quran |
| 132 | Sinhala | Naseem Ismail | Naseem Isamil and Masoor Maulana, Kaleel | translation |
| 133 | Arabic | Buck | Buck | translation |
| 134 | Chinese | Ma Zhong Gang | 马仲刚 | translation |

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
