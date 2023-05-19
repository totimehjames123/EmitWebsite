<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">    
    <style>
        *::-webkit-scrollbar{
            display: none;
        }
        *{
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        body{
            margin: 0;
            padding: 0;
        }
        header{
            width: 100%;
            height: 100px;
            background: rgb(169, 243, 169);
            box-shadow: 2px 4px 6px darkslategray; 
            position: relative;
        }

        header .logo{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-weight: bold;
            color: darkslategray;
            font-size: 70px;
            margin: 0;
            cursor: pointer;
            width: 250px;
            padding: 0;
            position: absolute;
            margin-left: 50px;
        }
        header .logo::first-letter{
            color: green;
            font-size: 50px;
            font-family: cursive;
        }

        /* Profile Picture */
        header .profile{
            display: flex;
            justify-content: right;
            align-items: right;
            margin-right: 100px;
        }
        header .profile .profilepicture{
            width: 70px;
            height: 70px;
            border-radius: 100%;
            padding: 5px;
            box-shadow: 2px 3px 5px gray;
        }
        header .profile h1{
            margin: 30px 50px 0;
            color: darkslategray;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: lighter;
            font-size: 25px;
            text-shadow: 1px 2px 3px green;
        }
        header .profile h1, header .profile .profilepicture{
            float: left;
        }
        /* main */
        main {
            width: 100%;
            height: 80vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        main form{
            text-align: left;
            margin: auto;
            padding: 50px;
            border-radius: 12px;
            background: whitesmoke;
            box-shadow: 2px 4px 6px darkslategray;
        }
        main form input[type="file"]::-webkit-file-upload-button{
            background: green;
            border: none;
            margin-top: -8px;
            margin-left: -8px;
            padding: 10px;
            border-top-left-radius: 12px;
            border-bottom-left-radius: 12px;
            color: white;
        }
        main form .typed{
            box-shadow: 2px 4px 6px darkslategray;
            margin: 20px 0 20px 0;
            padding: 10px;
            width: 80%;
            height: 20px;
            border-radius: 15px;
            border: none;
            font-family: Arial;
        }
        main form label{
            font-size: 25px;
            color: darkslategray;
            font-family: Arial;
        }
        main form .caption{
            border: none;
            box-shadow: 2px 4px 6px darkslategray;
            padding: 8px;
            margin-top: 20px;
            font-size: 15px;
            font-family: Arial;
        }
        main form .caption:focus{
            outline: none;
        }
        main form button{
            width: 100%;
            height: 50px;
            font-size: 20px;
            font-family: Arial;
            border: none;
            border-radius: 5px;
            margin-top: 20px;
            color: white;
            background-color: blue;
            box-shadow: 2px 4px 6px darkslategray;
        }
        main form button:hover{
            opacity: 0.7;
        }
        
        /* Mobile Phones */
        @media screen and (max-width: 767px){
            *{
                overflow-x: hidden;
                margin: 0;
            }
            header{
                display: none;

            }
            header .logo{
                font-size: 30px;
                margin-top: 0px;
                margin-left: 0px;
                width: 70px;
                position: absolute;
                float: left;
            }
            header .logo::first-letter{
                font-size: 30px;
            }
        
            header .profile{
                width: 90%;
                float: left;
                height: 40px;
                right: 20%;
                justify-content: right;
                margin-top: 10px;
            }

            header .profile h1{
                margin: 0;
                font-size: 20px;
                word-wrap: break-word;
            }
            header .profile .profilepicture{
                width: 25px;
                height: 25px;
                padding: 2px;
            }
            main form{
                width: 80%;
                height: 50vh;
                margin: 20px 0 20px 0;
                padding: 20% 0 20% 5%;
                overflow: scroll;

            }
            main form input[type="file"]{
                width: 80%;
                padding: 2%;
            }
            main form .caption{
                width: 80%;
            }
            main form button{
                width: 85%;
                height: 40px;
                padding: 0;
            }
            main form label{
                font-size: 20px;
            }
                        
        }
    </style>
</head>

<body>
    
    <header>
        <h1 class="logo">eMit</h1>
        <div class="profile">
            <h1><?php echo $_SESSION['myFullName']; ?></h1>
            <div class="profileContainer"><?php echo $_SESSION['myProfile']; ?></div>
        </div>
    </header>
    <main>
        <form action="post_data_remarks.php" method="post" enctype="multipart/form-data" id="myForm">
            <label for="image" style="color:darkslategray; margin-bottom: 0; padding-bottom: 0;">Upload an image</label><br>
            <input required type="file" name="fileToUpload" id="fileToUpload" class="typed" accept="image/*" style="background: white; color: black;"><br>
            
            <label for="caption" style="color:darkslategray; margin-bottom: 0; padding-bottom: 0;">Add a caption</label><br>
            <textarea required name="caption" id="caption" cols="40" rows="10" class="caption"></textarea><br>
            <button type="submit" id="submit">Post</button>
        </form>
    </main>
    
</body>
</html>