# AIM:
To make a reading year manager using the goodreads API. The user can do the following things:
* generate a reading year(starting date,end date and number of books).
* Search books(goodreads API used for this).
* Add books to your reading year.
* Keep a record of the books you have read/want to read.

# APIs USED:
Goodreads API:
We make queries to the goodreads API to get information like ratings,description and reviews from the API provided
   
# REQUIREMENTS:
Secret key and developer key is required to access the API.
The developer key is used for making queries while the secret key is used for making major to the goodreads account of a user.

# LANGUAGES/DATABASE USED:
php5 and sqlite3

# Improvements:
* For displaying your shelf(marked books), repeated queries are made to get the book's name through API. This is inefficient.The books name can be stored in the database for a faster application.
* A competitive concept can be introduced to let users see how others are doing with their goals.
* Rather than a standalone application, we can integrate this to the facebook or make an android app or make an extension for more convenient use.
* We can further use goodreads genre based lists to generate a list of books which can be a user's reading goals for the year. This requires special permissions from the side of goodreads owner and the chances are slim even though the app is for educational rather than commercial purposes.
