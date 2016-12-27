<!DOCTYPE html>
<html>
<head>
    <style> 
        h2{
            color:black;
            text-align: center;
        }
        p {
            font-family: ;
            font-size: 20px;
        }
        form{
            border-style: dotted;
            border-radius: 25px;
            background-color: lightblue;
            padding-top: 50px;
            padding-right: 30px;
            padding-bottom: 50px;
            padding-left: 50px;
            background-size: 15px;
        }

    </style>
    <title>Welcome</title>
</head>
<body>
    <h2>Tip Calculator</h2>
    <form action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <p>Bill subtotal: $
            <?php
            echo '<input type="text" name="bill" value ="'.$_POST['bill'].'">';
            ?>
             </p>
            <p>Tip percentage:</p><br>
            <p>
            <?php
            for ($i = 0; $i < 3; $i++)
            {
                if($_POST['tip_percent'] == 10 + $i * 5 )
                {
                    echo '<input type="radio" name="tip_percent" value="'.(10 + $i * 5).'"checked>'. " " .(10 + $i * 5).'%'; 
                }
                else
                {
                    echo '<input type="radio" name="tip_percent" value="'.(10 + $i * 5).'">'. " " .(10 + $i * 5).'%';   
                }
            }
            ?>
            </p><br>
            <input type="submit" name="submit" value="Submit" />
    </form>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    
        $bill = trim($_POST["bill"]);
        $bill = stripslashes($bill);
        $bill = htmlspecialchars($bill); 
        
        $tip_percent = trim($_POST["tip_percent"]);
        $tip_percent = stripslashes($tip_percent);
        $tip_percent = htmlspecialchars($tip_percent);

        //Checks if the data is numeric as it should be
        if(is_numeric($bill) && is_numeric($tip_percent) && ($bill > 0)) { 
        if($tip_percent < 0) // Making sure that percentage doesnt go into negatives
        $tip_percent = 0; //If it does, set it to 0
        
        $tip = ($tip_percent / 100) * $bill; 
        echo "<br>Tip amount: $".$tip; //prints out the tip amount
        $total = $tip + $bill; 
        echo "<br>Total: $". $total;// Prints out the total

        }
        else{
            echo "<br> Bill is Invalid";
            echo "<br> Enter a positive integer";
        }
} 
?>

</body>
</html>
