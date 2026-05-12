<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Signup</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-2xl">
    
    <h2 class="text-2xl font-bold text-center mb-6">Create Account</h2>

    <form class="space-y-4">

      <!-- Name -->
      <div class="grid grid-cols-2 gap-4">
        <input type="text" placeholder="First Name"
          class="border p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />

        <input type="text" placeholder="Last Name"
          class="border p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />
      </div>

      <!-- Email -->
      <input type="email" placeholder="Email Address"
        class="w-full border p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />

      <!-- Role -->
      <select
        class="w-full border p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
        <option value="">Select Role</option>
        <option value="admin">Admin</option>
        <option value="author">Author</option>
        <option value="user">User</option>
      </select>

      <!-- Password -->
      <input type="password" placeholder="Password"
        class="w-full border p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />

      <!-- Address -->
      <textarea placeholder="Address"
        class="w-full border p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>

      <!-- Age -->
      <input type="number" placeholder="Age"
        class="w-full border p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />

      <!-- Submit -->
      <button type="submit"
        class="w-full bg-blue-500 text-white p-3 rounded-lg hover:bg-blue-600 transition">
        Sign Up
      </button>

    </form>

    <!-- Login Redirect -->
    <p class="text-center text-sm mt-4">
      Already have an account?
      <a href="#" class="text-blue-500 hover:underline">Login</a>
    </p>

  </div>

</body>
</html>