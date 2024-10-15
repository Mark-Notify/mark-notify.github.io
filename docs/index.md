<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MARK | แบ่งเงินตามอัตราส่วน</title>
    <!-- เพิ่ม Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
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

        #result {
            margin-top: 20px;
            font-weight: bold;
        }

        label {
            color: #fff;
            font-size: 23px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center mb-4">แบ่งเงินตามอัตราส่วน</h1>

        <div class="form-group">
            <label for="principal">เงินต้น (THB)</label>
            <input type="number" class="form-control form-control-lg text-center" id="principal" placeholder="กรอกจำนวนเงินต้น" autofocus
                required>
        </div>

        <div class="form-group">
            <label for="ratio1">อัตราส่วนก้อนที่ 1</label>
            <input type="number" class="form-control form-control-lg text-center" value="6" id="ratio1"
                placeholder="กรอกอัตราส่วนก้อนที่ 1" required>
        </div>

        <div class="form-group">
            <label for="ratio2">อัตราส่วนก้อนที่ 2</label>
            <input type="number" class="form-control form-control-lg text-center" value="4" id="ratio2"
                placeholder="กรอกอัตราส่วนก้อนที่ 2" required>
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
            const principal = parseFloat(document.getElementById("principal").value);
            const ratio1 = parseFloat(document.getElementById("ratio1").value);
            const ratio2 = parseFloat(document.getElementById("ratio2").value);

            if (isNaN(principal) || isNaN(ratio1) || isNaN(ratio2) || principal <= 0 || ratio1 <= 0 || ratio2 <= 0) {
                document.getElementById("result").style.display = "block";
                document.getElementById("result").innerHTML = "กรุณากรอกข้อมูลให้ถูกต้อง";
                return;
            }

            const totalRatio = ratio1 + ratio2;
            const part1 = (ratio1 / totalRatio) * principal;
            const part2 = (ratio2 / totalRatio) * principal;

            document.getElementById("result").style.display = "block";
            document.getElementById("result").innerHTML =
                `ผลลัพธ์:<br> 
                ก้อนที่ 1 | ${ratio1} ส่วน : ${part1.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 })} THB<br> 
                ก้อนที่ 2 | ${ratio2} ส่วน : ${part2.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 })} THB`;
        }
    </script>
</body>

</html>