# GUIFinalProject @xlzhen @lov1 

Graphical User Interface Final Project

Declaration of Intent to Graduate(DIG) Form Genterator - for UMass Lowell CS students

The application is a web DIG (Declare Intention to Graduate) form generator for UMass Lowell Computer Science students. This project include both front-end and back-end design and implementation. The application accepts a student's unofficial transcript download from school's website and generate a PDF version DIG form for view. 
In order to extract information from PDF files, we used an external library that helps to convert pdf file into txt format. Then we feed the txt file into our regular expressions in order to extract detailed course informations (course name, term, grade). The extracted detailed course informations are used to compare with course requirements (db), judge whether the course is a required course or not.
We created our own relational course database, populated all the course information and built connection between UI interface and backend database via MySQL and phpMyAdmin. As for front-end design, we used bootstrap and jQuery validation along with HTML+CSS for better view and input validation. 
