<?php
$driver = 'mysql';
$database = "dbname=w3schools";
$dsn = "$driver:host=localhost;$database";

$username = 'root';
$password = 'chkdsk';

try {
    $conn = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo $e->getMessage();
}

$sql = 'SELECT  * FROM orders LIMIT 2';
$stmt = $conn->prepare($sql);
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

    $trackId = $row['OrderID']; //Tive que fazer isso
    $trackTitle = $row['CustomerID']; //Tive que fazer isso
    $trackPath = $row['EmployeeID']; //Tive que fazer isso
    $trackPlaylist = $row['OrderDate']; //Tive que fazer isso
    ?>
<div class="col-md-6 col-sm-12 col-xs-12" >
          <div class="x_panel">
            <div class="x_title">
              <h2><?php echo $trackTitle ?> <small> <?php echo $trackId ?> </small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Settings 1</a>
                    </li>
                    <li><a href="#">Settings 2</a>
                    </li>
                  </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
            <div class="row">

                <audio style=" width: 100%; max-width: 600px" id="<?php echo $trackId ?>" controls>
                    <source src="https://www.w3schools.com/html/horse.ogg" type="audio/mp3">
                </audio>

                <input id="vol-control_<?php echo $trackId; ?>" data-id="<?php echo $trackId; ?>" class="volume"
                 type="range" min="0" max="100" step="1" />

                <button onclick="document.getElementById('<?php echo $trackId ?>').play()" class="reproduzir">Reproduzir o áudio</button>
                <button onclick="document.getElementById('<?php echo $trackId ?>').pause()" class="pausar">Pausar o áudio</button>.

            </div>
            </div>
          </div>
         </div>
  <?php
}
?>
   <script>
   var volume = document.getElementsByClassName("volume");

   var reproduzir = document.getElementsByClassName("reproduzir");

   var pausar = document.getElementsByClassName("pausar");

   for(let i = 0; i < reproduzir.length; i++){

    reproduzir[i].onclick = function(ev){

    }
   }

   for(let i = 0; i < pausar.length; i++){

   }


                for(let i = 0; i < volume.length; i++){
                    volume[i].oninput = function(ev){
                        var id = ev.target.id;
                       var val  = ev.target.value;
                        var player = document.getElementById(id.split("_")[1]);

                        console.log('Before: ' + player.volume);
                            player.volume = val / 100;
                            console.log('After: ' + player.volume);
                    }
                }

                </script>
