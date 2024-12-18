<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>คำนวณปริมาณ Dopamine</title>
    <!-- Basic SEO Meta Tags -->
    <meta name="description" content="Medical Helper Tool - Calculate, manage, and adjust medication dosage with ease. Perfect for healthcare professionals and patients.">
    <meta name="keywords" content="Medical Helper, Medication dosage calculator, Healthcare tools, Prescription management, Dosage adjustment">
    <meta name="robots" content="index, follow">
    <meta name="author" content="Mark Notify">

    <!-- Open Graph Tags for Social Media -->
    <meta property="og:title" content="Medical Helper Tool">
    <meta property="og:description" content="A tool designed to help calculate and adjust medication dosages.">
    <meta property="og:image" content="https://example.com/path-to-your-medical-tool-image.jpg">
    <meta property="og:url" content="https://mark-notify.github.io/medical">
    <meta property="og:type" content="website">

    <!-- เพิ่ม Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
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

        button {
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
        <h1 class="text-center mb-4">คำนวณปริมาณยา</h1>

        <div class="form-group">
            <label for="dose">ปริมาณยา ที่ต้องใช้ (mg)</label>
            <input type="number" class="form-control form-control-lg text-center" id="dose"
                placeholder="กรอกปริมาณยา (mg)" required>
        </div>

        <div class="form-group">
            <label for="concentration">ความเข้มข้นของยา (mg/ml)</label>
            <input type="number" class="form-control form-control-lg text-center" id="concentration" value="25">
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