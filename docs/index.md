<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบ่งเงินตามอัตราส่วน</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        label, input {
            margin: 5px 0;
        }
        #result {
            margin-top: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>แบ่งเงินตามอัตราส่วน</h1>

    <label for="principal">เงินต้น (THB):</label>
    <input type="number" id="principal" placeholder="กรอกจำนวนเงินต้น" required>
    <br>

    <label for="ratio1">อัตราส่วนก้อนที่ 1:</label>
    <input type="number" value="6" id="ratio1" placeholder="กรอกอัตราส่วนก้อนที่ 1" required>
    <br>

    <label for="ratio2">อัตราส่วนก้อนที่ 2:</label>
    <input type="number" value="4" id="ratio2" placeholder="กรอกอัตราส่วนก้อนที่ 2" required>
    <br>

    <button onclick="calculate()">คำนวณ</button>

    <div id="result"></div>

    <script>
        function calculate() {
            const principal = parseFloat(document.getElementById("principal").value);
            const ratio1 = parseFloat(document.getElementById("ratio1").value);
            const ratio2 = parseFloat(document.getElementById("ratio2").value);

            if (isNaN(principal) || isNaN(ratio1) || isNaN(ratio2) || principal <= 0 || ratio1 <= 0 || ratio2 <= 0) {
                document.getElementById("result").innerHTML = "กรุณากรอกข้อมูลให้ถูกต้อง";
                return;
            }

            const totalRatio = ratio1 + ratio2;
            const part1 = (ratio1 / totalRatio) * principal;
            const part2 = (ratio2 / totalRatio) * principal;

            document.getElementById("result").innerHTML = 
                `ผลลัพธ์:<br> 
                ก้อนที่ 1: ${part1.toFixed(2)} THB<br> 
                ก้อนที่ 2: ${part2.toFixed(2)} THB`;
        }
    </script>
</body>
</html>
