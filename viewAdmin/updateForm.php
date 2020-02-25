
<!DOCTYPE html>
<html>
  <head>
    <title>Simple login form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <style>
      html, body {
      display: flex;
      justify-content: center;
      font-family: Roboto, Arial, sans-serif;
      font-size: 15px;
      }
      form {
      border: 5px solid #f1f1f1;
      }
      input[type=text], input[type=password] {
      width: 100%;
      padding: 16px 8px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
      }
      button {
      background-color: #8ebf42;
      color: white;
      padding: 14px 0;
      margin: 10px 0;
      border: none;
      cursor: grabbing;
      width: 20%;
      margin-left: 370px;
      }
      h1 {
      text-align:center;
      font-size:18;
      }
      button:hover {
      opacity: 0.8;
      }
      .formcontainer {
      text-align: left;
      margin: 24px 50px 12px;
      }
      .container {
      padding: 16px 0;
      text-align:left;
      }
      span.psw {
      float: right;
      padding-top: 0;
      padding-right: 15px;
      }
      /* Change styles for span on extra small screens */
      @media screen and (max-width: 300px) {
      span.psw {
      display: block;
      float: none;
      }
    </style>
  </head>

  <body>
  <form action="update.php" enctype="multipart/form-data" method="POST">
      <h1>Update Form</h1>
      <div class="formcontainer">
      <hr/>
      <div class="container">
        <label for="uname"><strong>Username</strong></label>
        <input type="text" placeholder="Enter Username" name="uname" required>

        <label for="email"><strong>Email</strong></label>
             <input type="text" name="email" required placeholder="Enter your Email">
             <label for="is_admin"><strong>Admin</strong></label>
             <input type="text" name="is_admin" required placeholder="is admin:"><br><br>
            
             <label for="room_No"><strong>Room Number </strong></label>
             <input type="text" name="room_No" placeholder="Enter your Room Number">
             <label for="ext"><strong>Ext</strong></label>
             <input type="text" name="ext" placeholder="Enter your Ext">
             <label for="profile_path"><strong>Profile path </strong></label><br><br>
        
             <input type="file" name="file" id="file"><br><br>
      </div>
      <button type="submit" name="update">Update</button>
      
    </form>
  </body>
</html>