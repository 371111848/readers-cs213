# Readers

The Group Reading Management Web-App

## Requirements

We recommended using [XAMPP](https://www.apachefriends.org/index.html). Alternatively, You need the following:
 * PHP (7.4.x)
 * Apache (2.4.x) with **rewrite_mod** enabled

 *It is required to have Internet Connection to use CDN based libraries (CSS & JS)*.

## Getting Started

Download all files and move them to your root folder (ex. www, htdocs), access the web app using your Internet Browser by going to ``http://localhost``, ``http://127.0.0.1`` or your specific hostname.

Go to the dashboard and find ***Upload Data*** on the sidebar.

You need to upload 3 CSV files:
* Members Data - with the attributes: (id, name, phone, email)
* Books Data - with the attributes: (id, title, pages, category)
* Reading Data - with the attributes; (member_id, book_id)

***Note:** You can use the sample data in **sampledata** folder.*

## Usage
After successfully uploading your data, you can enjoy using the app with 4 main tabs:
* Dashboard - Statistic view of your data
* Members - All about your Members info and readings
* Books - Where you can check the list of books information
* Categories - Check the categories and its information

***Note:** You can always update the data by re-uploading the data using ***Upload Data*** page.*
