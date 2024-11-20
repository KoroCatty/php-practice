<?php
// Add a query parameter to the URL in the browser's address bar:
// http://localhost:8000/?name=John

// http://localhost:8080/starter/06-superglobals/03-get/?query=footballs&sort=asc&limit=10

var_dump($_GET); // array(3) { ["query"]=> string(9) "footballs" ["sort"]=> string(3) "asc" ["limit"]=> string(2) "10" }

echo '<br>';

echo $_GET['query']; // footballs

// security measure (Stop XSS attacks)
echo htmlspecialchars($_GET['name']); // John