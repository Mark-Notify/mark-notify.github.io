<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OT Calculator</title>
  <!-- เพิ่ม Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
    rel="stylesheet">
  <style>
    body {
      margin-top: 50px;
      background-image: url('https://wallpaperaccess.com/full/187161.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed;
      font-family: "Prompt", sans-serif;
      font-weight: 400;
      font-style: normal;
    }

    h1 {
      color: #fff;
      font-family: "Prompt", sans-serif;
      font-weight: 900;
      font-style: normal;
    }

    #result {
      margin-top: 20px;
      font-weight: bold;
    }

    label {
      color: #fff;
      font-size: 23px;
    }

    header {
      display: none !important;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1 class="text-center mb-4">คำนวณค่าโอที</h1>

    <div class="form-group">
      <label for="salary">เงินเดือน (THB)</label>
      <input type="number" class="form-control form-control-lg text-center" id="salary" placeholder="กรอกจำนวนเงินเดือน"
        autofocus required>
    </div>

    <div class="form-group">
      <label for="otHours">จำนวนชั่วโมงโอที</label>
      <input type="number" class="form-control form-control-lg text-center" id="otHours"
        placeholder="กรอกจำนวนชั่วโมงโอที" required>
    </div>

    <div class="form-group">
      <label for="otRate">อัตราค่าโอที (เช่น 1.5 เท่า)</label>
      <input type="number" class="form-control form-control-lg text-center" id="otRate" value="1.5" required>
    </div>

    <button class="btn btn-primary btn-lg btn-block" onclick="calculate()">คำนวณ</button>

    <div id="result" class="alert alert-info mt-4" role="alert" style="display: none;"></div>
  </div>

  <!-- Bootstrap JS และ jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>
    function calculate() {
      const salary = parseFloat(document.getElementById("salary").value);
      const otHours = parseFloat(document.getElementById("otHours").value);
      const otRate = parseFloat(document.getElementById("otRate").value);

      if (isNaN(salary) || isNaN(otHours) || isNaN(otRate) || salary <= 0 || otHours <= 0 || otRate <= 0) {
        document.getElementById("result").style.display = "block";
        document.getElementById("result").innerHTML = "กรุณากรอกข้อมูลให้ถูกต้อง";
        return;
      }

      // คำนวณค่าโอที: สมมติว่าเดือนนึงมี 240 ชั่วโมงทำงาน
      const hourlyRate = salary / 240;
      const otPay = otHours * hourlyRate * otRate;

      document.getElementById("result").style.display = "block";
      document.getElementById("result").innerHTML =
        `ผลลัพธ์:<br> ค่าโอทีที่คุณจะได้รับคือ: ${otPay.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 })} THB`;
    }
  </script>
</body>

</html>