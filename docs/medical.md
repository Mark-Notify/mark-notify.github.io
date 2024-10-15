<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>คำนวณปริมาณ Dopamine</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">คำนวณปริมาณยา</h1>

        <div class="form-group">
            <label for="dose">ปริมาณยา ที่ต้องใช้ (mg)</label>
            <input type="number" class="form-control form-control-lg text-center" id="dose" placeholder="กรอกปริมาณยา (mg)" required>
        </div>

        <div class="form-group">
            <label for="concentration">ความเข้มข้นของยา (mg/ml)</label>
            <input type="number" class="form-control form-control-lg text-center" id="concentration" value="25">
        </div>

        <button class="btn btn-primary btn-lg btn-block" onclick="calculate()">คำนวณ</button>

        <div id="result" class="alert alert-info mt-4" role="alert" style="display: none;"></div>
    </div>

    <script>
        function calculate() {
            const dose = parseFloat(document.getElementById("dose").value);
            const concentration = parseFloat(document.getElementById("concentration").value);

            if (isNaN(dose) || dose <= 0) {
                document.getElementById("result").style.display = "block";
                document.getElementById("result").innerHTML = "กรุณากรอกปริมาณยาให้ถูกต้อง";
                return;
            }

            // คำนวณปริมาณที่ต้องดูดออกมา (ml)
            const volume = dose / concentration;

            document.getElementById("result").style.display = "block";
            document.getElementById("result").innerHTML =
                `ผลลัพธ์:<br> 
                ต้องดูดยา xxx จำนวน ${volume.toFixed(2)} ml เพื่อให้ได้ ${dose.toLocaleString()} mg`;
        }
    </script>
</body>
</html>
