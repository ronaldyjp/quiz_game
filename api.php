<!DOCTYPE html>
<html>
<head>
<title>API</title>
</head>
<body>

<h1>API</h1>

<?php

$files = [
    "/api/test.php",
    "/api/event.php",
    "/api/game.php?game_id=1&event_id=1",
    "/api/show_question.php?question_id=1&event_id=1",
    "/api/user.php?email=user1_1@asjas.org",
    "/api/answer.php?user_id=1&event_id=1&question_id=1&answer=1",
    "/api/report.php?event_id=1",
];

foreach ($files as $value) {
	echo "<a href='./$value' target='api'>$value</a><br>";
}

?>


</body>
</html> 