<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require __DIR__ . '/../dbconfig.php';

try {
    $connection = new PDO("$type:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

try {
    $connection->query("CREATE TABLE article (
    id SERIAL PRIMARY KEY,
    title varchar(255) NOT NULL,
    content varchar(10000) NOT NULL,
    author varchar(255) NOT NULL,
    posted_at timestamp NOT NULL
  )");
} catch (PDOException $e) {
    echo "Query failed: " . $e->getMessage();
}

try {
    $connection->query("INSERT INTO article (title, content, author, posted_at) VALUES
 ('test title', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris porta mauris nisl, vel iaculis quam venenatis quis. Quisque id efficitur dui, eget tempor erat. Fusce hendrerit, sem non porttitor semper, nunc metus pharetra sem, a ultrices lorem leo nec arcu. Vestibulum at interdum velit. Suspendisse vulputate rutrum libero, id placerat ipsum lacinia eu. Fusce vel orci eget augue maximus rhoncus eu non nisl. Cras id sodales risus. Mauris sed ullamcorper lacus, a tempus orci. Donec dignissim ipsum at varius commodo. Nulla a sapien aliquam, maximus neque non, vehicula libero. Nulla a varius purus, at tincidunt diam. Morbi sed urna a diam pretium tincidunt nec at neque. Aliquam consectetur at turpis at consequat. Sed dapibus, quam vel faucibus malesuada, dui lectus lacinia felis, porta posuere dui odio id enim. Vivamus molestie pharetra leo, vitae mattis sapien congue non. Etiam dapibus, diam at interdum tempus, ligula augue commodo nulla, vel fermentum elit est vel justo.', 'test author', '2021-11-30 13:09:55');  ");

    $connection->query("INSERT INTO article (title, content, author, posted_at) VALUES
 ('test title', 'Donec fermentum porttitor metus, quis pulvinar elit ornare congue. Donec dapibus est ut metus fermentum ultricies. Ut eu turpis facilisis, dignissim sem porttitor, congue libero. Fusce volutpat facilisis interdum. Mauris vulputate ultricies mauris a facilisis. Maecenas tincidunt efficitur tincidunt. Etiam tempor maximus tincidunt.', 'test author', '2021-11-30 13:09:55'); ");

    $connection->query("INSERT INTO article (title, content, author, posted_at) VALUES
 ('test title', 'Mauris id feugiat lectus, ut efficitur tellus. Phasellus a arcu vel urna venenatis laoreet. Nullam congue sem ac erat aliquet, ac pulvinar felis fermentum. Sed rutrum nulla sit amet porta suscipit. Etiam consectetur mauris ac arcu scelerisque, ut blandit lectus porta. Pellentesque at ligula a lacus mattis laoreet. Nulla finibus volutpat velit a finibus. In nec condimentum erat. Aliquam erat volutpat. Vestibulum molestie finibus lorem quis egestas. Fusce id mi ac nisl vehicula laoreet. Cras molestie dolor eget nunc laoreet, et sodales velit mollis. Aliquam dignissim leo quis dolor varius, at molestie est hendrerit. Sed lorem tellus, rhoncus at dignissim ac, euismod id sem. Quisque facilisis felis eget ex mattis, sed pretium magna pulvinar. Etiam tincidunt sodales ultrices.', 'test author', '2021-11-30 13:09:55'); ");

    $connection->query("INSERT INTO article (title, content, author, posted_at) VALUES
 ('test title', 'Curabitur ultricies est malesuada ante laoreet condimentum. Nam ullamcorper, mi at dignissim dignissim, turpis tortor tristique ligula, sed rhoncus ipsum sapien sit amet lacus. Curabitur ligula risus, vulputate vel urna ac, gravida maximus erat. Nunc odio urna, sagittis non mi eu, semper tristique magna. Cras vitae mi nec ex sollicitudin hendrerit et vitae urna. Praesent posuere sem in lectus dignissim viverra. Vivamus neque metus, rhoncus ac arcu vel, eleifend molestie neque. Fusce eget varius massa. Praesent eleifend nunc leo, et pretium sapien volutpat a. Nulla consectetur facilisis sapien, at rhoncus nibh cursus maximus. Donec at eleifend lacus, quis mollis eros. Fusce dui augue, rutrum sit amet ipsum porttitor, convallis congue sapien.', 'test author', '2021-11-30 13:09:55'); ");
} catch (PDOException $e) {
    echo "Query failed: " . $e->getMessage();
}

unlink(__FILE__);