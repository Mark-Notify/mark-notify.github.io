<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Programmer Helper Tool</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link
    href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
    rel="stylesheet">
  <style>
    body {
      margin-top: 35px;
      background-image: url('https://wallpaperaccess.com/full/187161.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed;
      font-family: "Prompt", sans-serif;
      font-weight: 400;
      font-style: normal;
    }

    h1,
    h2,
    h3,
    h4,
    h5 {
      color: #fff;
      font-family: "Prompt", sans-serif;
      font-weight: 900;
      font-style: normal;
    }

    .input-area {
      width: 100%;
      height: 250px;
      font-size: 18px;
      padding: 10px;
      border: 2px solid #ced4da;
      border-radius: 4px;
      margin-bottom: 20px;
    }

    label {
      color: #fff;
      font-size: 23px;
    }

    header {
      display: none !important;
    }

    #editor {
      width: 100%;
      height: 300px;
      border: 1px solid #ced4da;
      border-radius: 4px;
      padding-top: 40px;
      padding-bottom: 20px;
      background-color: #1e1e1e;
      /* เพิ่มระยะห่างที่ด้านบน */
    }
  </style>
</head>

<body>
  <div class="container">
    <!-- <h1 class="text-center mb-4">Programmer Helper Tool</h1> -->

    <div class="form-group">
      <label for="inputData">Input Data (JSON or Serialized)</label>
      <textarea id="inputData" class="input-area" placeholder="Paste your JSON or serialized data here..."></textarea>
    </div>

    <h3 class="mt-4">Formatted Output </h3><button class="btn btn-secondary btn-sm float-right" onclick="copyToClipboard()">Copy</button>
    <div id="editor"></div>
  </div>

  <!-- เพิ่มไลบรารี php-unserialize -->
  <script src="https://cdn.jsdelivr.net/npm/php-unserialize@0.0.1/php-unserialize.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/require.js/2.3.6/require.min.js"></script>

  <script>
    // Load Monaco Editor
    require.config({
      paths: {
        'vs': 'https://cdn.jsdelivr.net/npm/monaco-editor@0.21.2/min/vs'
      }
    });
    require(['vs/editor/editor.main'], function () {
      window.editor = monaco.editor.create(document.getElementById('editor'), {
        value: '',
        language: 'json',
        theme: 'vs-dark',
        automaticLayout: true
      });
    });

    document.getElementById('inputData').addEventListener('input', processData); // Auto process on input

    function processData() {
      const inputData = document.getElementById('inputData').value;
      let result = '';

      // Function to check if input is valid JSON
      function isJSON(data) {
        try {
          JSON.parse(data);
          return true;
        } catch (e) {
          return false;
        }
      }

      try {
        if (isJSON(inputData)) {
          // Handle JSON data
          const jsonData = JSON.parse(inputData);
          result = JSON.stringify(jsonData, null, 4); // Pretty format with 4 spaces
          window.editor.setValue(result); // Set result in Monaco Editor
          monaco.editor.setModelLanguage(window.editor.getModel(), 'json');
        } else {
          // Handle serialized data using PHPUnserialize library
          const unserializedData = PHPUnserialize.unserialize(inputData); // Use PHPUnserialize
          result = JSON.stringify(unserializedData, null, 4); // Convert unserialized data to JSON and format
          window.editor.setValue(result); // Set result in Monaco Editor
          monaco.editor.setModelLanguage(window.editor.getModel(), 'json');
        }
      } catch (error) {
        window.editor.setValue('Error: Invalid input data!');
        monaco.editor.setModelLanguage(window.editor.getModel(), 'plaintext');
      }
    }

    function copyToClipboard() {
      const output = window.editor.getValue();
      navigator.clipboard.writeText(output)
        .then(() => {
          alert('Output copied to clipboard!');
        })
        .catch(err => {
          alert('Failed to copy output: ', err);
        });
    }
  </script>
</body>

</html>