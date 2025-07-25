```markdown
# 🏋️ Gym Management Platform – Web Application

A full-stack web application simulating the operations of a modern gym.
Designed with modular dashboards for clients, trainers, and administrators,
this platform enables class scheduling, e-commerce, media sharing, and role-based access control.

---

## 📂 Project Structure

- `Ffitness-site/` – Client-side interface  
- `trainer-dashboard1/` – Trainer dashboard  
- `admin-dashboard/` – Admin dashboard  
- `project.sql` – Centralized database schema

---

## 🔍 How It Works

### 👥 Client Features
- 🔐 Sign up / Log in to access platform features
- 📅 Browse the weekly gym schedule and trainer-specific schedules
- 💪 Book private classes or join group sessions
- 📺 Watch workout videos uploaded by trainers
- 🛒 Shop gym equipment and supplements through the integrated store
- 🖼️ Explore gym photos in the gallery
- 🧾 View personal orders history
- 💳 Manage balance: clients pay at the gym, and admins credit it to their online account

### 🧑‍💼 Admin Features
- 🛍️ Manage store inventory (add/edit/delete products)
- 📆 Edit the general weekly class schedule
- 👤 Oversee client registrations and platform activity
- 📜 Review historical changes across the system
- 🏋️ Add trainer profiles and manage trainer accounts
- ⭐ View trainer ratings and uploaded workouts
- 🗑️ Moderate and delete inappropriate or outdated content

### 🏋️ Trainer Features
- 📅 Manage personal schedule, accept bookings, set time off
- 🎥 Upload and delete workout videos
- ✅ Control availability for private or group sessions

---

## 🛠️ Technologies Used

- **Frontend**: HTML, CSS, JavaScript  
- **Backend**: PHP  
- **Database**: MySQL (`project.sql`)  
- **Version Control**: Git & GitHub  
- **Architecture**: Role-based modular design with client-server communication

---

## 📌 Setup Instructions

1. Clone the repository:
   ```
   git clone https://github.com/your-username/gym-management-platform.git
   ```
2. Import `project.sql` into your MySQL database
3. Configure database credentials in PHP connection files
4. Launch each interface via your local server (e.g., XAMPP, WAMP)

---

## 📷 Gallery Preview

Explore the gym’s environment and amenities through photo albums in the client dashboard.

---

## 📎 Notes

- Data validation and error handling implemented across forms  
- GUI designed using Swing principles for clarity and usability  
- Trainers and clients interact dynamically based on real-time booking and video uploads  
- Balance updates reflect in-client purchases and physical payments entered by admins  

---

## 👩‍💻 Contributors

Created collaboratively by Charelle Yazbeck and 3 of her classmates for the *Développement Web* course at CNAM University, Beirut.

---

## 🧠 Future Enhancements

- 📲 Mobile responsiveness and design updates  
- 📈 Admin dashboard analytics (visitor counts, class popularity)  
- 🧾 Printable invoices and receipts  
- 🔔 Notification system for bookings and product updates  
```

