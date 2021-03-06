<!DOCTYPE html>
<html>
  <title>Simple Sign up from</title>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
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
      .icon {
      font-size: 110px;
      display: flex;
      justify-content: center;
      color: #4286f4;
      }
      button {
      background-color: #4286f4;
      color: white;
      padding: 14px 0;
      margin: 10px 0;
      border: none;
      cursor: grab;
      width: 48%;
      }
      h1 {
      text-align:center;
      fone-size:18;
      }
      button:hover {
      opacity: 0.8;
      }
      .formcontainer {
      text-align: center;
      margin: 24px 300px 12px;
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
    <form action="{{url('usersubmit')}}" method="POST">
    @csrf
      <h1>User Sign Up</h1>
      {{session('msg')}}
      <div class="icon">
        <i class="fas fa-user-circle"></i>
      </div>
      <div class="formcontainer">
      <div class="container">
      <input type="hidden" name="usertype" value="byuser">
        <label for="name"><strong>Name</strong></label>
        <input type="text" placeholder="Enter Name" name="name" required>

        <label for="email"><strong>E-mail</strong></label>
        <input type="text" placeholder="Enter E-mail" name="email" required>

        <label for="email"><strong>Mobile</strong></label>
        <input type="text" placeholder="Enter Mobile no" name="mobile" required>

        <label for="address"><strong>Address</strong></label>
        <input type="text" placeholder="Enter Address here" name="address" required>

        <label for="password"><strong>Password</strong></label>
        <input type="password" placeholder="Password" name="password" required>

        <label for="confirm password"><strong>Confirm Password</strong></label>
        <input type="password" placeholder="Confirm  Password" name="cpassword" required>

      </div>
      <button type="submit"><strong>SIGN UP</strong></button>
      
    </form>

          <a href="{{url('home')}}">Go to Home Page</a>
          
  </body>
</html>