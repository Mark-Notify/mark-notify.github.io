<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MARK | แบ่งเงินตามอัตราส่วน</title>
    <!-- เพิ่ม Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin-top: 50px;
            background-image:url('https://wallpaperaccess.com/full/187161.jpg');
            background-size: cover;
        }
        #result {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">แบ่งเงินตามอัตราส่วน</h1>

        <div class="form-group">
            <label for="principal">เงินต้น (THB):</label>
            <input type="number" class="form-control" id="principal" placeholder="กรอกจำนวนเงินต้น" required>
        </div>

        <div class="form-group">
            <label for="ratio1">อัตราส่วนก้อนที่ 1:</label>
            <input type="number" class="form-control" value="6" id="ratio1" placeholder="กรอกอัตราส่วนก้อนที่ 1" required>
        </div>

        <div class="form-group">
            <label for="ratio2">อัตราส่วนก้อนที่ 2:</label>
            <input type="number" class="form-control" value="4" id="ratio2" placeholder="กรอกอัตราส่วนก้อนที่ 2" required>
        </div>

        <button class="btn btn-primary btn-block" onclick="calculate()">คำนวณ</button>

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
                ก้อนที่ 1: ${part1.toFixed(2)} THB<br>
                ก้อนที่ 2: ${part2.toFixed(2)} THB`;
        }
    </script>

</body>
</html>
