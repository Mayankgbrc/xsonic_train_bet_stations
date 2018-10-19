

<!DOCTYPE html>
<head>
	<title>train search via source and destination:</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<style type="text/css">
            body{
                font-family: Arail, sans-serif;
            }
            /* Formatting search box */
            .search-box{
                width: 300px;
                position: relative;
                display: inline-block;
                font-size: 14px;
            }
            .search-box input[type="text"]{
                height: 32px;
                padding: 5px 10px;
                border: 1px solid #CCCCCC;
                font-size: 14px;
            }
            
        </style>
</head>
<body >
    <header class="w3-container w3-teal w3-center">
      <h1>Xsonic Rail Tracking</h1>
    </header>
    <div class="w3-container">
        <form method="get" action="buffer.php">
		<h3>Enter your start station: </h3>
            <input type="text" name="source"  required/>
			<h3>Enter destination : </h3>
             <input type="text" name="destination"  required/>
			 <h3>Choose train start date: </h3>
			 <input id="textbox" type="date" name="date" required></input>
    		<button  type="submit" class="w3-button w3-black w3-round">Search</button>
        </form>
    </div>
    <footer class="w3-container w3-teal w3-center" style="position:fixed;bottom:0;left:0;width:100%;">
      <h4>Developed with <span class="w3-text-red">&hearts;&hearts;</span> by <a href="https://www.facebook.com/mayankgbrc" target="_blank">Mayank Gupta</a> </h4>
    </footer>
</body>
</html>
