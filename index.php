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
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css' integrity='sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==' crossorigin='anonymous'/>

  <title>PHP Hotel</title>
</head>
<body>

    <div class="container">
      <h1 class="my-4">PHP Hotel</h1>
      <table class="table table-primary table-striped table-hover table-bordered">
        <thead>
          <tr class="table-dark">
            <?php foreach($categories as $category): ?>
              <th scope="col"><?php echo strtoupper(str_replace('_', ' ', $category)) ?></th>
            <?php endforeach; ?>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          <?php foreach($hotels as $hotel): ?>
            <tr>
            <?php foreach($hotel as $key => $value): ?>
              <?php echo ($key == 'name') ? ("<th scope='row'>" . $value . '</th>') : ('<td>' . $value . '</td>'); ?>
            <?php endforeach; ?>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  
</body>
</html>