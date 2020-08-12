<?php

require_once "config.php";

$id = $_GET["id"];
mysqli_query($link,"DELETE FROM questions WHERE id=$id");
?>
<script type="text/javascript">
	window.location = "edit_question.php";
</script>