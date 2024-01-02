<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>12-Column Grid Layout</title>
</head>
<body>
    <div class="grid-container">
        <div class="item"></div>
        <div class="item"></div>
        <div class="item"></div>
        <div class="item"></div>
        <div class="item"></div>
        <div class="item"></div>
        <div class="item"></div>
        <div class="item"></div>
        <div class="item"></div>
        <div class="item"></div>
        <div class="item"></div>
        <div class="item"></div>
    </div>

    
</body>

    <style>
        body {
    margin: 0;
   
}

.grid-container {
    
    display: grid;
    justify-content: center;
    grid-template-columns: repeat(12, 72px); /* 12 columns with a width of 72 units each */
    gap: 16px; /* Gutter (spacing) between columns */
    padding: 20px; /* Padding for better visibility */
}

.item {
    background-color: #141313;
    height: 100vh;
    padding: 20px;
    text-align: center;
    opacity: 0.1;
}

    </style>
</html>
