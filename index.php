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

  // creo un array vuoto per pushare gli hotel filtrati
  $filteredArray = [];


  // filtro per parcheggio
  $parkingValue = isset($_GET['search_parking']) ? $_GET['search_parking'] : false;
  

  if ($parkingValue) {
    foreach ($hotels as $hotel) {
      if ($hotel['parking']) {
        $filteredArray[] = $hotel;
      }
    }

    $hotels = $filteredArray;
  };

  // filtro per voto
  $voteValue = isset($_GET['search_vote']) ? $_GET['search_vote'] : '0';

  // devo resettare l'array di filtraggio per evitare stampe doppie
  $filteredArray = [];

  foreach ($hotels as $hotel) {
    if ($hotel['vote'] >= $voteValue) {
      $filteredArray[] = $hotel;
    }
  }
  $hotels = $filteredArray;
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css' integrity='sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==' crossorigin='anonymous'/>

  <title>Results Hotel</title>

</head>
<body>
  <div class="container py-5">

  <!-- FORM PER FILTRAGGIO -->
    <form actions="index.php" method="GET" class="row">

      <div class="col-2">
        <select class="form-select" id="inlineFormSelectPref" name="search_vote">
          <option selected value="0">Vote</option>
          <option value="0">0</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
      </div>
  
      <div class="col-2">
        <select class="form-select" id="inlineFormSelectPref" name="search_parking">
          <option selected value="0">Parcheggio</option>
          <option value= "1">Si</option>
          <option value= "0">Non importante</option>
        </select>
      </div>
  
      <div class="col-3">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  <!-- END FORM PER FILTRAGGIO -->

  <!-- TABELLA HOTEL -->
    <table class="table mt-5">
      <thead>
        <tr>
          <?php if (count($hotels) > 0 ): ?> 
            <?php foreach($hotels[0] as $key => $hotel): ?>
            <th scope="col" class="text-center"><?php echo strtoupper(str_replace('_', ' ', $key)) ?></th>
            <?php endforeach; ?>
          <?php endif; ?>

        </tr>
      </thead>
      <tbody>
        
        <?php foreach($hotels as $hotel): ?>
        <tr class="text-center">
          <td><?php echo $hotel['name'] ?></td>
          <td><?php echo $hotel['description'] ?></td>
          <td><?php echo $hotel['parking'] ? 'Si' : 'No' ?></td>
          <td><?php echo $hotel['vote'] ?></td>
          <td><?php echo $hotel['distance_to_center'] ?> Km</td>
        </tr>
        <?php endforeach; ?>

      </tbody>
    </table>
  <!-- END TABELLA HOTEL -->

  </div>
  
</body>
</html>