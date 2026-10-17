# Database Schema — Core Entities

This file outlines the initial tables, columns, and relationships for the CGAC platform. Use migrations to create these tables; the names below are canonical and stable.

Notes
- Use BIGINT unsigned for primary keys if you expect growth; otherwise INT unsigned works.
- Use DECIMAL(12,2) or integer minor units for monetary fields (we use DECIMAL(12,2) in NGN).
- All timestamps are stored as DATETIME or TIMESTAMP with timezone handled by server configuration.

Primary tables

1. users
- id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY
- uuid CHAR(36) UNIQUE
- email VARCHAR(255) UNIQUE NOT NULL
- password_hash VARCHAR(255) NOT NULL
- display_name VARCHAR(255)
- phone VARCHAR(32) NULL
- is_active TINYINT(1) DEFAULT 1
- created_at DATETIME
- updated_at DATETIME

2. roles
- id INT AUTO_INCREMENT PRIMARY KEY
- name VARCHAR(100) UNIQUE NOT NULL
- description VARCHAR(255)

3. permissions
- id INT AUTO_INCREMENT PRIMARY KEY
- name VARCHAR(150) UNIQUE NOT NULL
- description VARCHAR(255)

4. role_permissions (junction)
- role_id INT
- permission_id INT
- PRIMARY KEY (role_id, permission_id)

5. user_roles
- user_id INT
- role_id INT
- PRIMARY KEY (user_id, role_id)

6. church_settings
- id INT
- key VARCHAR(100) UNIQUE
- value TEXT
- updated_at DATETIME

7. announcements
- id INT AUTO_INCREMENT
- title VARCHAR(255)
- body TEXT
- starts_at DATETIME NULL
- ends_at DATETIME NULL
- priority INT DEFAULT 0
- is_published TINYINT(1) DEFAULT 0
- created_by INT (user_id)
- created_at DATETIME

8. programme_categories
- id INT AUTO_INCREMENT
- slug VARCHAR(150) UNIQUE
- title VARCHAR(255)
- description TEXT

9. programmes
- id INT AUTO_INCREMENT
- slug VARCHAR(255) UNIQUE
- title VARCHAR(255)
- year INT
- category_id INT
- theme VARCHAR(255)
- bible_reference VARCHAR(255)
- venue VARCHAR(255)
- poster_media_id INT NULL
- description TEXT
- schedule JSON NULL
- start_date DATETIME NULL
- end_date DATETIME NULL
- status ENUM('draft','published','archived') DEFAULT 'draft'
- created_by INT
- created_at DATETIME
- updated_at DATETIME

10. programme_speakers (junction)
- programme_id INT
- speaker_id INT
- role VARCHAR(100)

11. watchwords
- id INT AUTO_INCREMENT
- year INT UNIQUE
- title VARCHAR(255)
- bible_reference VARCHAR(255)
- explanation TEXT
- artwork_media_id INT NULL
- related_programme_id INT NULL
- status ENUM('draft','published')
- created_by INT
- created_at DATETIME

12. conventions
- id INT AUTO_INCREMENT
- year INT
- title VARCHAR(255)
- theme VARCHAR(255)
- start_date DATETIME
- end_date DATETIME
- venue VARCHAR(255)
- poster_media_id INT
- description TEXT
- status ENUM('draft','published','archived')

13. convention_sessions
- id INT AUTO_INCREMENT
- convention_id INT
- session_title VARCHAR(255)
- session_date DATETIME
- day_number INT
- speaker_id INT
- topic VARCHAR(255)
- bible_reference VARCHAR(255)
- video_provider VARCHAR(50)
- video_url VARCHAR(1024)
- audio_url VARCHAR(1024)
- thumbnail_media_id INT
- duration_seconds INT NULL
- status ENUM('draft','published')

14. speakers
- id INT AUTO_INCREMENT
- full_name VARCHAR(255)
- bio TEXT NULL
- photo_media_id INT NULL
- external_profile_url VARCHAR(512) NULL

15. sermons
- id INT AUTO_INCREMENT
- title VARCHAR(255)
- speaker_id INT
- date DATETIME
- scripture JSON NULL
- description TEXT
- video_url VARCHAR(1024) NULL
- audio_url VARCHAR(1024) NULL
- thumbnail_media_id INT NULL
- duration_seconds INT NULL
- transcript TEXT NULL
- status ENUM('draft','published')

16. media_assets
- id INT AUTO_INCREMENT
- uuid CHAR(36)
- file_name VARCHAR(255)
- mime_type VARCHAR(100)
- file_size INT
- storage_path VARCHAR(1024)
- uploaded_by INT
- is_public TINYINT(1) DEFAULT 1
- metadata JSON NULL
- created_at DATETIME

17. galleries / gallery_items
- gallery table with id, title, description
- gallery_items: gallery_id, media_asset_id, sort_order

18. livestream_settings
- id INT
- provider ENUM('youtube','vimeo','facebook','manual')
- provider_config JSON
- is_live TINYINT(1) DEFAULT 0
- current_service_title VARCHAR(255)
- next_service_schedule JSON

19. giving_categories
- id INT AUTO_INCREMENT
- slug VARCHAR(150) UNIQUE
- title VARCHAR(255)
- description TEXT
- is_active TINYINT(1)

20. payment_transactions
- id INT AUTO_INCREMENT
- reference VARCHAR(128) UNIQUE
- provider VARCHAR(50)
- provider_reference VARCHAR(255)
- amount DECIMAL(12,2)
- currency CHAR(3) DEFAULT 'NGN'
- status ENUM('pending','successful','failed','cancelled')
- giving_category_id INT NULL
- metadata JSON NULL
- created_at DATETIME
- verified_at DATETIME NULL

21. payment_webhook_events
- id INT AUTO_INCREMENT
- transaction_id INT NULL
- provider VARCHAR(50)
- payload JSON
- signature VARCHAR(512)
- processed_at DATETIME NULL

22. prayer_requests
- id INT AUTO_INCREMENT
- name VARCHAR(255) NULL
- contact VARCHAR(255) NULL
- request TEXT
- consent_given TINYINT(1)
- assigned_to INT NULL
- is_public TINYINT(1) DEFAULT 0
- status ENUM('new','assigned','prayed','archived')
- created_at DATETIME

23. testimonies
- id INT AUTO_INCREMENT
- title VARCHAR(255)
- body TEXT
- author_name VARCHAR(255) NULL
- approved_by INT NULL
- is_published TINYINT(1) DEFAULT 0
- created_at DATETIME

24. contact_submissions
- id INT AUTO_INCREMENT
- name, email, subject, message, created_at

25. audit_logs
- id BIGINT AUTO_INCREMENT
- user_id INT NULL
- action VARCHAR(100)
- target_table VARCHAR(150)
- target_id VARCHAR(64) NULL
- details JSON NULL
- ip_address VARCHAR(45) NULL
- created_at DATETIME

Indexes & constraints
- Add indexes on (year), (category_id), (speaker_id), (status) for programmes/sermons
- Unique constraints: watchwords.year; programmes.slug; users.email; payment_transactions.reference
- Foreign keys for referential integrity: (programme.category_id -> programme_categories.id), (sermons.speaker_id -> speakers.id), etc.

Internationalisation & extensibility
- Store human-readable text in UTF8MB4
- Use JSON columns carefully for schedules, scripture arrays, and provider configs

Data import/export
- Provide CSV import templates for watchwords and programmes with validation and row-level error reporting

Migration timeline
- Phase 1 migrations: users, roles, permissions, role_permissions, user_roles, church_settings, media_assets
- Phase 2 migrations: programme_categories, programmes, programme_speakers, watchwords
- Phase 3 migrations: conventions, convention_sessions, sermons, speakers, galleries
- Payments migrations during Phase 6

