# SRC Verse TV — Movie & Series Streaming Platform

SRC Verse TV is a web-based movie and TV series streaming platform built to provide users with a smooth content browsing experience. The platform allows users to explore movies and series by genres, cast, categories, search filters, and curated homepage sections.

This project includes both a user-facing streaming interface and an admin panel for managing movies, series, cast members, homepage content, and media details.

> Note: This project is created for educational and portfolio purposes. Demo content should only include properly licensed, public-domain, or sample media.

---

## Live Demo

User Website:
https://streamingverse.deveoninc.com/main/

Admin Panel:
Add your admin panel link here

Demo Admin Credentials:

```txt
Email: demo-admin@example.com
Password: Demo@12345
```

> Important: Do not use real production credentials in a public README.

---

## Project Overview

SRC Verse TV is designed like a small OTT/content management platform where users can browse movies and TV series, view complete media details, search content, filter by genre or cast, and add content to their playlist.

The admin panel allows administrators to manage the platform content dynamically, including movies, series, cast records, genre mapping, and homepage sections such as top-rated, featured, trending, or custom movie/series lists.

---

## Key Features

### User Side

* User authentication system
* Browse movies and TV series
* Search movies and series
* Filter content by genre
* Browse content by cast
* View complete movie/series details
* Add movies or series to playlist
* Embedded video viewing support
* Download option for available media
* Organized movie and series listing
* User-friendly content discovery experience

---

### Admin Panel

* Secure admin login
* Add, edit, and delete movies
* Add, edit, and delete TV series
* Add, edit, and delete cast members
* Link cast members with movies and series
* Manage genres and content categories
* Modify homepage sections dynamically
* Control which movies/series appear in selected homepage lists
* Manage sections such as:

  * Top Rated
  * Featured
  * Trending
  * Latest Movies
  * Latest Series
  * Custom Lists

---

## Tech Stack

* PHP
* MySQL
* HTML
* CSS
* JavaScript
* Bootstrap
* SQL Database
* Admin Dashboard
* Authentication System

---

## Database

The project includes a SQL database file for setting up the application locally.

Database file:

```txt
srcversetv.sql
```

Main database modules include:

* Users
* Admin
* Movies
* Series
* Cast
* Genres
* Playlists
* Homepage Sections
* Movie/Series Relationships

---

## Installation Guide

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/src-verse-tv.git
```

### 2. Move Project to Local Server

Move the project folder to your local server directory.

For XAMPP:

```txt
htdocs/src-verse-tv
```

### 3. Create Database

Create a new MySQL database:

```txt
srcversetv
```

### 4. Import SQL File

Import the provided SQL file into your database:

```txt
srcversetv.sql
```

### 5. Configure Database Connection

Update the database connection file with your local database credentials.

Example:

```php
$host = "localhost";
$username = "root";
$password = "";
$database = "srcversetv";
```

### 6. Run the Project

Open the project in your browser:

```txt
http://localhost/src-verse-tv/main/
```

---

## My Role

I developed this project as a full-stack web application and contributed to the complete system flow, including:

* Database design
* Authentication system
* Movie and series management
* Cast and genre linking
* Admin panel development
* User-side browsing experience
* Search and filtering functionality
* Playlist feature
* Homepage content management
* SQL database setup
* Bug fixing and project deployment

---

## Screenshots

Add screenshots here:

```md
![Homepage](screenshots/homepage.png)
![Movie Details](screenshots/movie-details.png)
![Search Page](screenshots/search.png)
![Admin Dashboard](screenshots/admin-dashboard.png)
![Movie Management](screenshots/movie-management.png)
```

Recommended screenshots to add:

* Homepage
* Movie listing page
* Series listing page
* Movie detail page
* Cast detail/browse page
* Search/filter result page
* Playlist page
* Admin dashboard
* Add movie form
* Manage movies table
* Homepage section management page

---

## Folder Structure

```txt
SRC-Verse-TV/
│
├── admin/
│   └── Admin panel files
│
├── main/
│   └── User website files
│
├── utilities/
│   └── Reusable helper files
│
├── srcversetv.sql
│
└── README.md
```

---

## Future Improvements

* Improve UI/UX with a modern responsive design
* Add user profile management
* Add ratings and reviews
* Add watch history
* Add recommendation system
* Add trailer preview support
* Add subscription/payment module
* Add role-based admin permissions
* Add API-based backend structure
* Convert frontend to React
* Add Laravel or Django backend version
* Improve security and validation
* Add pagination and advanced filtering
* Add analytics for most watched content

---

## Security Notes

Before making this repository public, make sure:

* Real admin credentials are removed
* Passwords are changed
* No `.env` or config secrets are uploaded
* No private API keys are included
* No real user data is inside the SQL file
* No copyrighted or unauthorized media files are included
* Demo data is used instead of real content

---

## Disclaimer

This project is developed for educational and portfolio purposes. The repository should only contain source code, sample data, and legally allowed demo content. Any media used in a live demo should be properly licensed, public-domain, or used with permission.

---

## Author

**Syed Sabeer Faisal**
Software Engineer | Full-Stack Developer

GitHub: https://github.com/Syed-Sabeer
LinkedIn: Add your LinkedIn link here
Portfolio: Add your portfolio link here
