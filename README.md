# Unity_Care_V2
# 🏥 Unity Care Clinic – Backend V2

## 📌 Description
Unity Care Clinic V2 est un backend web PHP orienté objet permettant la gestion complète d’une clinique médicale :
authentification multi-rôles, rendez-vous médicaux, prescriptions et statistiques, avec un haut niveau de sécurité.

---

## 🚀 Fonctionnalités
- Authentification sécurisée (Admin, Doctor, Patient)
- Gestion des sessions PHP
- Contrôle d’accès basé sur les rôles (RBAC)
- Gestion des rendez-vous médicaux
- Gestion des prescriptions et médicaments
- Dashboard avec statistiques
- Protection XSS, CSRF et SQL Injection
- Architecture OOP robuste (PHP 8)

---


## 🛠️ Technologies utilisées
- PHP 8 (OOP)
- MySQL
- HTML5 / CSS3
- JavaScript (AJAX)
- PDO
- UML
- Git / GitHub

---
## Structure de projet ###

unity-care-clinic/
│
├── config/
│   ├── database.php          
│   └── app.php        
├── public/            
│   ├── index.php             
│   ├── login.php
│   ├── logout.php
│
│   ├── admin/
│   │   ├── dashboard.php
│   │   ├── departments.php
│   │   ├── doctors.php
│   │   ├── patients.php
│   │   ├── medications.php
│   │   ├── appointments.php
│   │   └── stats.php
│   │
│   ├── doctor/
│   │   ├── dashboard.php
│   │   ├── appointments.php
│   │   ├── prescriptions.php
│   │   └── patients.php
│   │
│   ├── patient/
│   │   ├── dashboard.php
│   │   ├── appointments.php
│   │   ├── book-appointment.php
│   │   └── prescriptions.php
│   │
│   └── assets/
│       ├── css/
│       ├── js/
│       └── images/
│
├── classes/
│   ├── Database.php          
│   │
│   ├── models/
│   │   ├── User.php           # abstract
│   │   ├── Admin.php
│   │   ├── Doctor.php
│   │   ├── Patient.php
│   │   ├── Appointment.php
│   │   ├── Prescription.php
│   │   └── Medication.php
│   │
│   ├── repositories/
│   │   ├── BaseRepository.php # abstract CRUD
│   │   ├── UserRepository.php
│   │   ├── DoctorRepository.php
│   │   ├── PatientRepository.php
│   │   ├── AppointmentRepository.php
│   │   ├── PrescriptionRepository.php
│   │   └── MedicationRepository.php
│   │
│   └── utils/
│       ├── Session.php        # gestion $_SESSION
│       ├── Validator.php      # validation + XSS
│       ├── Csrf.php           # tokens CSRF
│       └── Auth.php           # requireLogin / requireRole
│
├── includes/
│   ├── autoload.php           # autoload des classes
│   ├── header.php
│   ├── footer.php
│   └── navbar.php
│
├── sql/
│   └── schema.sql             # DB + tables + data test
│
├── docs/
│   ├── ERD.png
│   ├── UML-classes.png
│   ├── UML-usecases.png
│   └── README-assets.md
│
├── README.md
└── .gitignore

