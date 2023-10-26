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

  // foreach ($hotels as $hotel) {
  //   var_dump($hotel['name']);
  //   var_dump($hotel['description']);
  //   var_dump($hotel['parking']);
  //   var_dump($hotel['vote']);
  //   var_dump($hotel['distance_to_center']);
  // }

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

    <form actions="index.pxh" method="GET" class="row">

      <div class="col-2">
        <select class="form-select" id="inlineFormSelectPref" name="search_vote">
          <option selected>Vote</option>
          <option value="0">0</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
      </div>
  
      <div class="col-2">
        <select class="form-select" id="inlineFormSelectPref" name="search_parching">
          <option selected>Parcheggio</option>
          <option value="1">Si</option>
          <option value="2">Non importante</option>
        </select>
      </div>
  
      <div class="col-3">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>




<table class="table mt-5">
  <thead>
    <tr>
      <?php foreach($hotels[0] as $key => $hotel): ?>
      <th scope="col" class="text-center"><?php echo strtoupper(str_replace('_', ' ', $key)) ?></th>
      <?php endforeach; ?>

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


  </div>
  
</body>
</html>