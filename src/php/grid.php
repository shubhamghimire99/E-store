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

    .grid-container {

        display: grid;
        justify-content: center;
        grid-template-columns: repeat(12, 72px);
       
        gap: 16px;
        
        padding: 20px;
       
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