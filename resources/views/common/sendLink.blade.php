<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Forgot Password</title>

  <style>

    *{
      margin:0;
      padding:0;
      box-sizing:border-box;
      font-family:Arial, sans-serif;
    }

    body{
      height:100vh;
      display:flex;
      justify-content:center;
      align-items:center;
      background:linear-gradient(135deg,#4f46e5,#7c3aed);
    }

    .container{
      width:400px;
      background:white;
      padding:40px 30px;
      border-radius:15px;
      box-shadow:0 10px 25px rgba(0,0,0,0.2);
    }

    .container h2{
      text-align:center;
      margin-bottom:15px;
      color:#1e293b;
    }

    .container p{
      text-align:center;
      color:#64748b;
      margin-bottom:30px;
      font-size:14px;
      line-height:1.5;
    }

    .input-group{
      margin-bottom:20px;
    }

    .input-group label{
      display:block;
      margin-bottom:8px;
      font-weight:bold;
      color:#334155;
    }

    .input-group input{
      width:100%;
      padding:14px;
      border:1px solid #cbd5e1;
      border-radius:10px;
      outline:none;
      font-size:15px;
      transition:0.3s;
    }

    .input-group input:focus{
      border-color:#6366f1;
      box-shadow:0 0 5px rgba(99,102,241,0.4);
    }

    .submit-btn{
      width:100%;
      padding:14px;
      border:none;
      background:#4f46e5;
      color:white;
      font-size:16px;
      border-radius:10px;
      cursor:pointer;
      transition:0.3s;
      font-weight:bold;
    }

    .submit-btn:hover{
      background:#4338ca;
    }

    .back-login{
      text-align:center;
      margin-top:20px;
    }

    .back-login a{
      text-decoration:none;
      color:#4f46e5;
      font-size:14px;
      font-weight:bold;
    }

    .back-login a:hover{
      text-decoration:underline;
    }

  </style>
</head>
<body>

  <div class="container">

    <h2>Forgot Password</h2>

    <p>
      Enter your registered email address below.  
      We will send you a password reset link.
    </p>

    <form action="{{url('common/sendLink')}}" method="POST">
       @csrf 
      <div class="input-group">
        <label>Email Address</label>

        <input 
          type="email"
          name="email"
          placeholder="Enter your email"
          required
        >
      </div>

      <button type="submit" class="submit-btn">
        Send Reset Link
      </button>

    </form>

    <div class="back-login">
      <a href="{{url('/common/login')}}">Back to Login</a>
    </div>

  </div>

</body>
</html>