<!DOCTYPE html>
<html lang="en">
<head>
    <title>TEMPLATE CREATION</title>

    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <style type="text/css" media="screen">
        canvas {
            background:url(<?php echo "https://www.billegoat.gq/".$bills_id['billFilePath'] ?>);
            background-size: contain;
        }
    </style>
</head>

<body>
    <h1>TEMPLATE CREATION UI</h1>
    
    <p><span id="msg">Press the "Load Bill" button to start defining the template</span></p>
    <p><button id="generateCanvas">Load Bill</button>
        <button id="submitLogo">Submit as Logo</button>
        <button id="submitDate">Submit as Due Date</button>
        <button id="submitAmount">Submit as Amount Due</button>
    
    </p>
    <div id="canvas">
    </div>
    
    <script src="https://www.billegoat.gq/templateUI/script.js"></script>
    
    <?php
    if (isset($_POST['submit'])) {

    }
    ?>
    
</body>

</html>
