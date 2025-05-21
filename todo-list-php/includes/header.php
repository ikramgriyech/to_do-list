<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Style the header */
        header {
    background-color: rgba(104, 101, 79, 0.5); /* 50% transparent background */
    color: rgb(237, 234, 215); /* Keep text color solid */
    
    text-align: center;
}

#h{
    color: rgb(237, 234, 215);
    text-align: center;
    font-size: 19px;
    margin-left: 5px;
    margin-top: 17px;
    text-shadow: 
        -2px -2px 0  rgb(69, 66, 46),  
         2px -2px 0   rgb(69, 66, 46),  
        -2px  2px 0  rgb(69, 66, 46),  
         2px  2px 0   rgb(69, 66, 46); 

}
.position{
    display: flex;
    justify-content: space-between;
}

/* Style the navigation menu */
nav ul {
     list-style: none; /* Remove bullet points */ 
text-align: center;
display: flex;
margin-top: 30px;
}

nav ul li {
    display: inline; /* Display links in a row */
    margin: 0 15px;
    text-shadow: 
        -2px -2px 0  rgb(69, 66, 46),  
         2px -2px 0   rgb(69, 66, 46),  
        -2px  2px 0  rgb(69, 66, 46),  
         2px  2px 0   rgb(69, 66, 46); 


}

/* Style the navigation links */
nav ul li a {
    color: rgb(237, 234, 215);
    text-decoration: none;
    font-weight: bold;
}

nav ul li a:hover {
    text-decoration: underline; /* Underline on hover */
}
</style>
</head>
<body>
    <header>
        <div class="position">
            <h1 id="h"> To Do List</h1>
            <nav>
            
                <ul>
                
                        <li><a href="/todo-list-php/index.php">Home</a></li>
                            <?php
                                    if (isset($_SESSION["user_id"])) {
                                    echo '<li><a href="/todo-list-php/list.php">My lists</a></li>';
                                    echo '<li><a href="/todo-list-php/auth/logout.php" onclick="return confirm(\'Are you sure you want to logout?\');">Logout</a></li>';
                                    }
                                ?>


                </ul>
            </nav>
            </div>
    </header>
</body>
</html>