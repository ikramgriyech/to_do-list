<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bungee&family=Chewy&family=Dancing+Script:wght@400..700&family=Protest+Revolution&family=Silkscreen:wght@400;700&display=swap" rel="stylesheet">
 
   <style>
    body{
    background-image: url('../img/img1.jpg') ;/* Replace with your image URL */
    background-size: cover; /* Makes the image cover the whole page */
    background-position: center; /* Centers the image */
    background-repeat: no-repeat; /* Prevents repeating */
    height: 320px; 
    font-family: "Bungee", sans-serif;
    font-weight: 400;
    font-style: normal;
}

    

#title{
    
    color:rgb(248, 243, 208);
    text-align: center;
    font-size: 30px;
    margin-top: 15px;
    text-shadow: 
        -2px -2px 0  rgb(69, 66, 46),  
         2px -2px 0   rgb(69, 66, 46),  
        -2px  2px 0  rgb(69, 66, 46),  
         2px  2px 0   rgb(69, 66, 46); 

   
}

    p {
    font-size: 20px; /* Adjust text size */
    color:rgb(251, 245, 201); /* Text color */
    line-height: 1.5; /* Space between lines */
    text-align: justify; /* Align text */
    margin: 10px 0; /* Space around the paragraph */
    margin: 60px;
    text-shadow: 
        -1px -1px 0  rgb(69, 66, 46),  
         1px -1px 0   rgb(69, 66, 46),  
        -1px  1px 0  rgb(69, 66, 46),  
         1px  1px 0   rgb(69, 66, 46); 

}
button {
    background: linear-gradient(to right,rgb(198, 247, 174),rgb(246, 186, 169)); /* Soft pink gradient */
    color: rgb(69, 66, 46) ;
    font-size: 16px;
    font-weight: bold;
    padding: 13px 36px;
    border: none;
    border-radius: 20px; /* Rounded corners */
    cursor: pointer;
    transition: 0.3s;
    margin-left: 57px;
    border: rgb(69, 66, 46) 1px solid;
}

button:hover {
    background: linear-gradient(to right, #fad0c4,rgb(165, 218, 162)); /* Reverse gradient */
    transform: scale(1.05); /* Slight zoom effect */
}


   </style>
</head>
<body>
    <?php include("includes/header.php");?>
    <div class="container">
        <h1 id="title">Update Your To-Do List </h1>
        <p>Welcome to the To-Do List Update page 🌷 Here you can add, update, and manage your tasks. Keep track of important things you need to do, set deadlines, and mark tasks as completed once they are done! </p>
    </div>
    <div>
    <a href="/todo-list-php/auth/register.php">
    <button onclick="window.location.href='auth/register.php'">Register</button>
</a>


    </div>

<?php include("includes/footer.php");?>
    
</body>
</html>