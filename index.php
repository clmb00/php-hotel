<?php
    $hotels = [
        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],
    ];

    $categories = array_keys($hotels[0]);

    if(empty($_GET)){
      $filtered_hotels = $hotels;
    } else {
      $filtered_hotels = [];
      foreach($hotels as $hotel){
        $ok = True;
        if(!empty($_GET['rating'])){
          if ($hotel['vote'] < $_GET['rating']) $ok = False;
        }
        if(!empty($_GET['distance'])){
          if ($hotel['distance_to_center'] > $_GET['distance']) $ok = False;
        }
        if(isset($_GET['parking'])){
          if ($hotel['parking'] == false) $ok = False;
        }
        if($ok) $filtered_hotels[] = $hotel;
      }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css' integrity='sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==' crossorigin='anonymous'/>

  <style>
    .my_btn{
      width: 90px;
    }
    form{
      display: flex;
      align-items: center;
    }
    .my_switch_container{
      flex-shrink: 0;
      min-width: 220px;
    }
    .my_input_rating{
      max-width: 280px;
    }
    .my_buttons_wrap{
      flex-shrink: 0;
    }
  </style>

  <title>PHP Hotel</title>
</head>
<body>

    <div class="container">

      <h1 class="my-4">PHP Hotel</h1>

      <h4>Filter Hotels: </h4>
      <form action="./index.php" method="GET" class="mb-3">
        <div class="form-check-inline form-switch my_switch_container">
          <input class="form-check-input" type="checkbox" role="switch" name="parking" id="flexSwitchCheckDefault">
          <label class="form-check-label ms-2" for="flexSwitchCheckDefault">Parking space available</label>
        </div>
        <div class="input-group my_input_rating">
          <span class="input-group-text" id="basic-addon1">Minimum rating </span>
          <input type="text" class="form-control" name="rating" placeholder="1,2,3..." aria-label="Rating" aria-describedby="basic-addon1">
        </div>
        <div class="input-group ms-3">
          <span class="input-group-text" id="basic-addon2">Minimum distance form the center </span>
          <input type="text" class="form-control" name="distance" placeholder="1,2,3..." aria-label="Rating" aria-describedby="basic-addon2">
        </div>
        <div class="my_buttons_wrap ms-3">
          <button type="submit" class="btn btn-primary my_btn">Submit</button>
          <button type="reset" class="btn btn-danger my_btn">Reset</button>
        </div>
      </form>

      <table class="table table-primary table-striped table-hover table-bordered">
        <thead>
          <tr class="table-dark">
            <?php foreach($categories as $category): ?>
              <th scope="col"><?php echo strtoupper(str_replace('_', ' ', $category)) ?></th>
            <?php endforeach; ?>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          <?php foreach($filtered_hotels as $hotel): ?>
            <tr>
            <?php foreach($hotel as $key => $value):
                if(($key == 'name')){
                  echo "<th scope='row'>" . $value . '</th>';
                } elseif($key == 'parking'){
                  echo "<td>" . ($value ? 'Si' : 'No') . '</td>';
                } else{
                  echo '<td>' . $value . '</td>';
                }
            endforeach; ?>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  
</body>
</html>