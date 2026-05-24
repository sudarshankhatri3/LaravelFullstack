<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #667eea, #764ba2);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .profile-card {
            background: #fff;
            width: 100%;
            max-width: 900px;
            border-radius: 20px;
            display: grid;
            grid-template-columns: 1fr 2fr;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0,0,0,0.3);
        }

        .left {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 40px;
            text-align: center;
        }

        .left img {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid white;
            margin-bottom: 15px;
        }

        .left h2 {
            font-size: 22px;
            margin-bottom: 5px;
        }

        .left p {
            font-size: 14px;
            opacity: 0.9;
        }

        .right {
            padding: 40px;
        }

        .section-title {
            font-size: 18px;
            margin-bottom: 20px;
            color: #333;
            font-weight: bold;
        }

        .info {
            margin-bottom: 15px;
        }

        .info label {
            font-weight: 600;
            color: #666;
            font-size: 13px;
        }

        .info p {
            font-size: 15px;
            color: #222;
            margin-top: 3px;
        }

        .btn {
            margin-top: 20px;
            display: inline-block;
            padding: 10px 18px;
            background: #667eea;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn:hover {
            background: #5a67d8;
        }

        @media (max-width: 768px) {
            .profile-card {
                grid-template-columns: 1fr;
                text-align: center;
            }
        }
    </style>
</head>
<body>

<div class="profile-card">

    <!-- LEFT SIDE -->
    <div class="left">

        <img src="{{ asset('storage/'.$user->profile->image) }}" alt="Profile">

        <h2>{{ $user->first_name. ' '. $user->last_name  }}</h2>
        <p>{{ $user->email }}</p>

        <p style="margin-top:10px;">
            <p>{{ $user->role  }}</p>
        </p>

    </div>

    <!-- RIGHT SIDE -->
    <div class="right">

        <div class="section-title">Profile Information</div>

        <div class="info">
            <label>Full Name</label>
            <p>{{ $user->first_name. ' '. $user->last_name  }}</p>
        </div>

        <div class="info">
            <label>Email Address</label>
            <p>{{ $user->email }}</p>
        </div>

        <div class="info">
            <label>Phone</label>
            <p>{{ $user->profile->phone }}</p>
        </div>

        <div class="info">
            <label>Role</label>
            <p>{{ $user->role  }}</p>
        </div>

        <div class="info">
            <label>Joined Date</label>
            <p>{{ $user->created_at->format('Y-m-d') }}</p>
        </div>

        <a href="/vendor/dashboard" class="btn">Back to Dashboard</a>
        <a href="{{ url('/profile/customizeProfile') }}" class="btn" style="margin-left:10px; background:#38a169;">Customize Profile</a>

    </div>

</div>

</body>
</html>