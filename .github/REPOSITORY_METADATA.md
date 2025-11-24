# Repository Metadata Configuration

This directory contains the metadata configuration for the GitHub repository.

## Repository Description

The repository description should be set to:

```
A web-based Seat Plan Management and Smart Attendance System using PHP for educational institutions to efficiently manage seating arrangements for examinations and automate attendance tracking with QR codes
```

## Repository Topics

The following topics should be added to the repository:

- `php`
- `mysql`
- `attendance-system`
- `seat-planning`
- `qr-code`
- `exam-management`
- `education`
- `bootstrap`
- `pdf-generation`
- `web-application`
- `student-management`
- `fpdf`
- `xampp`
- `admit-card`

## How to Apply

### Option 1: Manual Update (via GitHub Web Interface)

1. Go to the repository page on GitHub
2. Click on the **⚙️ Settings** button (gear icon) next to "About" on the right sidebar
3. Add the description in the "Description" field
4. Add the topics in the "Topics" field (comma-separated or press Enter after each)
5. Click **Save changes**

### Option 2: Using GitHub CLI

If you have the GitHub CLI (`gh`) installed and authenticated:

```bash
# Set repository description
gh repo edit md-zeon/seat-plan-management-and-smart-attendance-system --description "A web-based Seat Plan Management and Smart Attendance System using PHP for educational institutions to efficiently manage seating arrangements for examinations and automate attendance tracking with QR codes"

# Add topics (one at a time or all at once)
gh repo edit md-zeon/seat-plan-management-and-smart-attendance-system --add-topic php,mysql,attendance-system,seat-planning,qr-code,exam-management,education,bootstrap,pdf-generation,web-application,student-management,fpdf,xampp,admit-card
```

### Option 3: Using GitHub API

```bash
# Using curl with GitHub API (requires authentication token)
curl -X PATCH \
  -H "Accept: application/vnd.github.v3+json" \
  -H "Authorization: token YOUR_GITHUB_TOKEN" \
  https://api.github.com/repos/md-zeon/seat-plan-management-and-smart-attendance-system \
  -d '{
    "description": "A web-based Seat Plan Management and Smart Attendance System using PHP for educational institutions to efficiently manage seating arrangements for examinations and automate attendance tracking with QR codes",
    "topics": ["php", "mysql", "attendance-system", "seat-planning", "qr-code", "exam-management", "education", "bootstrap", "pdf-generation", "web-application", "student-management", "fpdf", "xampp", "admit-card"]
  }'
```

## Metadata File

The `repository-metadata.json` file contains the structured data for these settings in JSON format for programmatic access.
