<?php get_head();
include (ABSPATH . FUNC . 'base.php');
?>

<main class="bottom-sheet" id="view" data-nav-state-slug="gamelist">

<div class="divider"> </div>
<div>
    <table class="hoverable">
        <thead>
          <tr>
              <th data-field="game-name">Game Name</th>
              <th data-field="game-genre">Genre</th>
              <th data-field="game-score">Score</th>
              <th data-field="game-website">Website</th>
          </tr>
        </thead>
<?php

$conn = new mysqli('localhost', 'root', 'password', 'games');
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
};

$sql = "SELECT ID, Name, slug, Genre, Link, Score FROM game WHERE approvedstate=1 ";
$result = $conn->query($sql);


if ($result->num_rows > 0) {?>
        <tbody>
        <?php
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo get_base_uri();
            echo "<tr>"
                       ."<td>"."<a href='" . get_base_uri() ."templates/single-game.php?ID=$row[ID]'  data-slug='" .$row["slug"]. "'>".$row["Name"]."</a>"."</td>"
                       ."<td>" . $row["Genre"]. "</td>"
                       ."<td>" . $row["Score"]. "</td>"
                       ."<td>" . "<a href=$row[Link] target=_blank>" . $row["Link"] . "</a>" . "</td>"
                ."</tr>";
        }
       } else {
        echo "0 results";
       }
       
       $conn->close();
       ?>
        </tbody>
    </table>
</div>
</main>

<?php get_foot(); ?>
