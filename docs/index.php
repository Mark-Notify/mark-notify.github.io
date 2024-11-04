<?php

if (!empty($_POST['data'])) {
  // พยายาม unserialize ข้อมูลที่ส่งมา หากมีข้อมูลเป็นรูปแบบ serialize
  $data = @unserialize($_POST['data']);
  if ($data !== false) {
    // ถ้า unserialize สำเร็จ แสดงข้อมูล
    echo json_encode($data, true);
    exit;
  } elseif (json_decode($_POST['data'], true) !== null) {
    // ตรวจสอบว่าข้อมูลเป็น JSON ที่ถูกต้อง
    echo $_POST['data'];
    exit;
  } else {
    // กรณีที่ข้อมูลไม่ใช่รูปแบบ serialize หรือ JSON ที่ถูกต้อง
    echo 'Invalid data format';
    exit;
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Oops...</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sixtyfour+Convergence&display=swap" rel="stylesheet">
  <style>
    h1 {
      line-height: 80vh;
      font-size: 100px;
      color: #fff;
    }

    body {
      background-color: #000;
      font-family: "Sixtyfour Convergence", sans-serif;
      font-optical-sizing: auto;
      font-weight: 400;
      font-style: normal;
      font-variation-settings:
        "BLED" 0,
        "SCAN" 0,
        "XELA" 0,
        "YELA" 0;
    }
  </style>
</head>

<body>
  <center>
    <h1>Oops...</h1>
  </center>
</body>

</html>