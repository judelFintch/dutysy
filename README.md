Customs Management and Accounting Software
Overview

This is a customs and logistics management software built using Laravel and Livewire. It is designed to help customs companies efficiently track and manage truck movements, declarations, and accounting processes. The software provides real-time updates, detailed reporting, and streamlined operations for better decision-making and control.

This tool also incorporates accounting and financial management features, enabling you to monitor cash flow, track expenses and revenues, and generate financial reports in multiple currencies (USD and CDF).
Features
Truck Movement Management

    Monitor truck entries and exits from the customs agency.
    Real-time updates on truck statuses and declarations.
    Record and track detailed truck information, including declaration numbers and statuses (Pending, Approved, Rejected).

Accounting and Financial Management

    Manage financial records for transactions in USD and CDF currencies.
    Track cash flow between multiple accounts (entries and exits).
    Record payments for customs duties, logistics expenses, and other charges.
    Generate financial reports with detailed insights into revenues, expenses, and account balances.
    Prevent errors with real-time validation for funds and currencies.

Customs Declaration Management

    Manage and monitor declarations for trucks entering and exiting customs.
    View detailed statuses and updates for each declaration.
    Generate reports for declarations to analyze customs operations.

Reporting

    Generate detailed PDF reports for:
        Financial transactions: Summarized by date, currency, or account.
        Truck movements: Entries, exits, and declaration statuses.
    Summarize financial data, such as total revenues, total expenses, and cash flow across accounts.
    Download or print reports for auditing or submission.

User-Friendly Dashboard

    Centralized view of all operations, including financial and logistics data.
    Graphical summaries of key metrics using charts and tables.
    Real-time notifications for pending or critical financial and logistics operations.

Real-Time Validation and Feedback

    Ensure data accuracy with built-in validation for truck declarations and financial inputs.
    Receive instant feedback for missing or incorrect data.

Technology Stack

    Backend: Laravel 10.x
    Frontend: Livewire and Blade templates
    Database: MySQL
    PDF Generation: DomPDF
    Charting: Chart.js
    CSS Framework: Bootstrap 5

Installation

    Clone the repository:

git clone https://github.com/your-repo/customs-management-software.git
cd customs-management-software

Install dependencies:

composer install
npm install

Set up environment variables:

    Copy .env.example to .env:

cp .env.example .env

Update the database connection details in .env:

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=customs_management
    DB_USERNAME=root
    DB_PASSWORD=yourpassword

Run migrations and seeders:

php artisan migrate --seed

Serve the application:

    php artisan serve
    npm run dev

    Access the application: Open your browser and navigate to http://127.0.0.1:8000.

Usage
Accounting Module

The accounting module enables you to track all financial activities efficiently:
1. Recording Transactions

    Incoming Funds: Record payments made to the customs agency for duties, fees, or services.
    Outgoing Funds: Track payments for expenses like logistics, salaries, or other operational costs.
    Transactions are automatically validated to ensure sufficient funds in the source account.

2. Managing Accounts

    View and manage balances for multiple accounts (e.g., USD account, CDF account).
    Accounts are updated in real-time after every transaction.

3. Financial Reports

    Generate detailed reports that include:
        Revenues and expenses by currency.
        Total balances for all accounts.
        Summaries of cash inflow and outflow over a selected date range.
    Export reports in PDF format for auditing or review.

4. Currencies

    Transactions can be recorded in USD or CDF, with real-time validation to prevent overdrafts.
    Automatically categorize transactions by currency in reports.

Truck Monitoring

    Add trucks and their details when entering or exiting the customs agency.
    Monitor declaration statuses (Pending, Approved, Rejected).
    Use the dashboard to view summaries and metrics of truck movements.

Screenshots
Dashboard

Accounting Module

Reports

Development
Models

    Truck: Represents the details of trucks (e.g., registration, status, declaration).
    Transaction: Manages financial transactions (e.g., amount, currency, type).
    Account: Manages account balances and tracks financial movements.
    User: Handles user authentication and access control.

Components

    DashboardComponent:
        Displays summaries for truck movements and financial data.
    TransactionReportComponent:
        Generates reports for transactions and accounting data.
    TruckManagementComponent:
        Handles truck entry, exit, and declaration tracking.
    AccountManagementComponent:
        Manages accounts and tracks balances in USD and CDF.

Contribution

    Fork the repository.
    Create a feature branch:

git checkout -b feature-name

Commit your changes:

git commit -m "Add a new feature"

Push to the branch:

    git push origin feature-name

    Open a pull request.

License

This project is licensed under the MIT License.
Contact

For inquiries or support, please contact:
Email: support@customsmanagement.com
Website: Customs Management

This README.md provides a comprehensive overview of the software, now emphasizing accounting and financial management aspects. Let me know if you need additional adjustments!