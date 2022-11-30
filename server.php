<?php
$string = file_get_contents("todo.json");
$todos = json_decode($string, true);

if (isset($_POST["newTodo"])) {
    $new_todo = $_POST["newTodo"];
    $todos[] =  ["text" => $new_todo, "done" => false];
    file_put_contents("todo.json", json_encode($todos));
} elseif (isset($_POST["removeTodo"])) {
    $remove_todo = $_POST["removeTodo"];
    unset($todos[$remove_todo]);
    file_put_contents("todo.json", json_encode($todos));
} elseif (isset($_POST["toggleDone"])) {
    $toggle_done = $_POST["toggleDone"];
    $todos[$toggle_done]["done"] = !$todos[$toggle_done]["done"];
    file_put_contents("todo.json", json_encode($todos));
}

header("Content-Type: application/json");
echo json_encode($todos);
