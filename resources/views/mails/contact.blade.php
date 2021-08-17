<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Message</title>
</head>
<body>
    <h1 class="red">hai ricevuto un nuovo messaggio</h1>
    <div>
        
        <strong>Name:{{$lead->name}}</strong><br>
        <strong>Email:{{$lead->email}}</strong><br>
        <p><strong>Message:{{$lead->message}}</strong></p><br>  
      
     

    </div>
</body>
</html>