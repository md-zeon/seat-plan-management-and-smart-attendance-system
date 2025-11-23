# Seat Plan Management and Smart Attendance System

A web-based Seat Plan Management and Smart Attendance System using PHP. The system aims to efficiently manage seating arrangements for examinations, events, or classrooms, and streamline the attendance process through a smart, automated approach. This solution will help institutions or organizations to optimize seating plans, reduce manual errors, and provide accurate attendance tracking in real-time

## 🚀 Features

### Student Panel

- **Registration & Login**: Secure student account creation and authentication
- **Course Enrollment**: Students can enroll in available courses
- **Admit Cards**: Generate and download personalized admit cards (PDF format)
- **Attendance Marking**: Mark attendance using QR codes during exams
- **Exam Schedule**: View assigned seats and room allocations

### Teacher/Admin Panel

- **Dashboard Overview**: Statistics on students, courses, and attendance
- **Course Management**: Add, edit, and delete courses
- **Exam Management**: Schedule exams with date/time and room assignments
- **Room Management**: Configure examination rooms with seating capacity
- **Student Management**: Add, edit, and delete student records
- **Attendance Tracking**: Monitor real-time attendance and generate reports

### Core Functionality

- **Dynamic Seat Planning**: Automated seat allocation for optimal exam hall usage
- **QR Code Integration**: Seamless attendance marking via QR codes
- **Real-time Monitoring**: Live tracking of student attendance
- **PDF Generation**: Generate admit cards and seat allocation reports
- **Responsive Design**: Mobile-friendly interface for all device types

## 🛠 Technology Stack

- **Backend**: PHP 7.4+
- **Database**: MySQL
- **Frontend**: Bootstrap 5, HTML5, CSS3, JavaScript
- **Libraries**:
  - FPDF - PDF generation
  - FPDI - PDF manipulation
  - phpqrcode - QR code generation
  - libern/qr-code-reader - QR code scanning
- **Server**: Apache (XAMPP/WAMP recommended)

## 📋 Prerequisites

- XAMPP or WAMP server
- PHP 7.4 or higher
- MySQL 8.0 or higher
- Web browser (Chrome, Firefox, Edge)

## 🔧 Installation

1. **Clone the Repository**

   ```bash
   git clone https://github.com/md-zeon/seat-plan-management-and-smart-attendance-system.git
   ```

2. **Move to XAMPP htdocs**

   - Copy the project folder to `C:\xampp\htdocs\`

3. **Setup Database**

   - Start XAMPP Control Panel
   - Start Apache and MySQL services
   - Open phpMyAdmin (`http://localhost/phpmyadmin`)
   - Create a new database named `exammanagement`
   - Import the `exammanagement.sql` file from the project root

4. **Configure Database Connection**

   - The database connection is configured in `dbconnection.php`
   - Default settings work with XAMPP defaults

5. **Access the Application**
   - Open `http://localhost/seat-plan-management-and-smart-attendance-system/` in your browser

## 📖 Usage

### Default Login Credentials

#### Admin/Teacher

- **teacher id**: 1
- **Password**: t

#### Students (Sample Data)

- Student ID: 1, Password: s1
- Student ID: 2, Password: s2
- Student ID: 3, Password: s3

### Basic Workflow

1. **Student Registration**

   - Students can register via the homepage signup form
   - Or admin can add students through the admin panel

2. **Course Management**

   - Admin creates courses and assigns students
   - Students enroll in available courses

3. **Exam Scheduling**

   - Admin schedules exams with date/time
   - Assigns rooms and allocates seats automatically

4. **Seat Planning**

   - System optimizes seat arrangements
   - Generates QR codes for each student

5. **Attendance Tracking**
   - Students scan QR codes to mark attendance
   - Admin monitors real-time attendance stats

## 📁 Project Structure

```text
├── index.php                 # Homepage with login/signup modals
├── adminlogincore.php       # Admin login processing
├── studentlogincore.php     # Student login processing
├── studentsignupcore.php    # Student registration processing
├── dbconnection.php         # Database connection configuration
├── exammanagement.sql       # Database schema and sample data
├── assets/                  # Static assets (favicon, images)
├── css/                     # Bootstrap and custom styles
├── student/                 # Student panel
│   ├── index.php           # Student dashboard
│   ├── courslist.php       # Available courses
│   ├── examlist.php        # Scheduled exams
│   ├── viewroom.php        # Seat assignments
│   ├── admitcard.php       # Admit card generation
│   ├── qrmaker/           # QR code generation functionality
│   ├── card/              # PDF generation with FPDF/FPDI
│   └── assets/            # Student panel assets
└── teacher/                # Teacher/Admin panel
    ├── index.php          # Admin dashboard
    ├── coursemanagement/  # Course CRUD operations
    ├── exammanagement/    # Exam CRUD operations
    ├── roommanagement/    # Room CRUD operations
    ├── studentmanagement/ # Student CRUD operations
    ├── qrcodescanner/     # QR code attendance scanning
    └── assets/            # Admin panel assets
```

## 🗄️ Database Schema

### Core Tables

- **attendance**: Tracks student attendance records
- **student**: Student information and credentials
- **teacher**: Teacher/admin account details
- **course**: Available courses/subjects
- **exam**: Scheduled examination details with JSON room/seat data
- **room**: Examination room configurations
- **enroll**: Student-course enrollment relationships
- **avaiableseat**: Daily room availability tracking

## 🙏 Acknowledgments

- Developed for Jahangirnagar University
- Uses open-source libraries including FPDF, Bootstrap, and QR code readers
- Built with educational institution management in mind

## 📞 Support

For questions or issues, please create an issue in the GitHub repository or contact the maintainers.

---

**Note**: This system is designed to work on PHP 7.4+ with MySQL 8.0+. Ensure all prerequisites are met before deployment.
