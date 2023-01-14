<?php
require('./blocks/head.php');
require('./connect.php');

if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {

    $element_id = mysqli_real_escape_string($conn, $_GET["id"]);

    $sql = "SELECT id, title, subtitle, descript, author FROM data WHERE id = '$element_id'";

    if($result = mysqli_query($conn, $sql)) {

        if(mysqli_num_rows($result) > 0) {

            foreach($result as $row){
                $data_title = $row['title'];
                $data_subtitle = $row['subtitle'];
                $data_description = $row['descript'];
                $data_author = $row['author'];
            
                echo "<h3>Обновление данных:</h3>
                    <form method='post'>
                        <input type='hidden' name='id' value='$element_id' />
                        <p>Заголовок:
                        <input type='text' name='title' value='$data_title' /></p>
                        <p>Подзаголовок:
                        <input type='text' name='subtitle' value='$data_subtitle' /></p>
                        <p>Описание:
                        <textarea name='description'> $data_description </textarea></p>
                        <p>Автор:
                        <input type='text' name='author' value='$data_author' /></p>
                        <input type='submit' value='Сохранить'>
                </form>";
            }
        } else {
            echo "<div>Данные не найдены!</div>";
        }
        mysqli_free_result($result);
    } else {
        echo "Ошибка: " . mysqli_error($conn);
    }

} elseif (isset($_POST["id"]) && isset($_POST["title"]) && isset($_POST["subtitle"]) && isset($_POST["description"]) && isset($_POST["author"])) {
      
    $element_id = mysqli_real_escape_string($conn, $_POST["id"]);
    $element_title = mysqli_real_escape_string($conn, $_POST["title"]);
    $element_subtitle = mysqli_real_escape_string($conn, $_POST["subtitle"]);
    $element_descript = mysqli_real_escape_string($conn, $_POST["description"]);
    $element_author = mysqli_real_escape_string($conn, $_POST["author"]);
      
    $sql = "UPDATE data SET title = '$element_title', subtitle = '$element_subtitle', 
                descript = '$element_descript', author = '$element_author'
                    WHERE id = '$element_id'";

    if($result = mysqli_query($conn, $sql)){
        header("Location: index.php");
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
}
else{
    echo "Некорректные данные";
}

mysqli_close($conn);

require('./blocks/footer.php');
?>