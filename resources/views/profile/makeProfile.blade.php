<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Update Profile</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

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

    .container {
        background: white;
        width: 100%;
        max-width: 600px;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 20px 50px rgba(0,0,0,0.3);
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    .profile-preview {
        text-align: center;
        margin-bottom: 20px;
    }

    .profile-preview img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #667eea;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 6px;
        font-weight: bold;
        color: #444;
    }

    input {
        width: 100%;
        padding: 10px;
        border: 2px solid #ddd;
        border-radius: 8px;
        outline: none;
        transition: 0.3s;
    }

    input:focus {
        border-color: #667eea;
    }

    .btn {
        width: 100%;
        padding: 12px;
        border: none;
        background: #667eea;
        color: white;
        font-size: 16px;
        border-radius: 8px;
        cursor: pointer;
        margin-top: 10px;
        transition: 0.3s;
    }

    .btn:hover {
        background: #5a67d8;
        transform: translateY(-2px);
    }

    .file-input {
        padding: 8px;
        background: #f4f4f4;
    }

    .note {
        font-size: 12px;
        color: #888;
        margin-top: 5px;
    }
</style>
</head>

<body>

<div class="container">

    <h2>Update Profile</h2>

    <!-- Profile Image Preview -->
    <div class="profile-preview">
        <img src="{{ asset('storage/'.($profile->image ?? 'default.png')) }}" alt="Profile">
    </div>

    <form action="{{ url('/profile/customizeProfile') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Phone -->
        <div class="form-group">
            <label>Phone Number</label>
            <input type="text" name="phone"
                   value="{{ old('phone', $profile->phone ?? '') }}"
                   placeholder="Enter phone number">
        </div>

        <!-- Image -->
        <div class="form-group">
            <label>Profile Image</label>
            <input type="file" name="image" class="file-input" accept="image/*">
            <div class="note">Max size 5MB (jpg, png, webp)</div>
        </div>

        <button type="submit" class="btn">Save Changes</button>

    </form>

</div>

</body>
</html>