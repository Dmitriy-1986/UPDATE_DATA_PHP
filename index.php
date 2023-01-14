<?php
require('./blocks/head.php');
require('./connect.php');

$sql_data = "SELECT id, title, subtitle, descript, author FROM data";

if($result = mysqli_query($conn, $sql_data)) {
    foreach($result as $row) {
        $data_id = $row['id'];
        $data_title = $row['title'];
        $data_subtitle = $row['subtitle'];
        $data_description = $row['descript'];
        $data_author = $row['author'];
        

        echo '<h1>' . $data_title . '</h1>';
        echo '<p>'  . $data_subtitle . '</p>';
        echo '<p>'  . $data_description . '</p>';
        echo '<b>'  . $data_author . '</b>';
        echo '<p><a href="update.php?id=' . $data_id . '">Изменить</a></p><hr>';
    }
    mysqli_free_result($result);
} else {
    echo 'Ошибка: ' . mysqli_error($conn);
}

mysqli_close($conn);

require('./blocks/footer.php');

/**
 * INSERT INTO `data` (`title`, `subtitle`, `description`, `author`) 
 * VALUES (
 *  'Index PHP', 
 *  'Work with PHP Project', 
 *  'Lorem ipsum dolor sit amet, consectetur adipiscing elit...', 
 *  'Dovgal Dima'
 * );
 */