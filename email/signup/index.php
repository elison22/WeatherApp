<!DOCTYPE html>
<html>

<head>
  <title>Weather Notifier Signup</title>
</head>

<body>

  <form action="signup.php" method='POST'>
    <!-- <label for='name'>Name</label>
    <input id='name' type='text' name='username'/>
    <br/>
     -->
    <label for='email'>Email</label>
    <input id='email' type='text' name='email'/>
    <br/>
    
    <p>Services (please select all for which you would like to be notified)</p>
    <label for='rain'>Rain</label>
    <input id='rain' type='checkbox' value='1' name='notifications[rain]'/>
    <br/>
    
    <label for='snow'>Snow</label>
    <input id='snow' type='checkbox' value='1' name='notifications[snow]'/>
    <br/>
    
    <label for='wind'>High Wind</label>
    <input id='wind' type='checkbox' value='1' name='notifications[wind]'/>
    <br/>
    
    <label for='low-temp'>High Temperatures</label>
    <input id='low-temp' type='checkbox' value='1' name='notifications[low_temperatures]'/>
    <br/>
    
    <label for='high-temp'>Low Temperatures</label>
    <input id='high-temp' type='checkbox' value='1' name='notifications[high_temperatures]'/>
    <br/>
    
    <label for='all'>I want to be notified everyday, regardless of the weather</label>
    <input id='all' type='checkbox' value='1' name='notifications[all]'/>
    <br/>

    <input type='submit'/>
    <br/>
  </form>
</body>

</html>