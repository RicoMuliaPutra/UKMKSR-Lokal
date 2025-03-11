<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UKM KSR POLIJE</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="flex flex-col h-screen bg-gray-100">

    <!-- Include Navbar -->
    <div id="navbar"></div>

    <!-- Body Content -->
    <main class="container flex-1 p-4 mx-auto">
        <section class="p-6 bg-white rounded-lg shadow-md">
            <h1 class="mb-4 text-2xl font-bold">Welcome to UKM KSR POLIJE</h1>
            <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </section>
    </main>

    <!-- Include Footer -->
    <div id="footer"></div>

    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });

        // Load Navbar and Footer
        fetch('navbar.html')
            .then(response => response.text())
            .then(data => document.getElementById('navbar').innerHTML = data);

        fetch('footer.html')
            .then(response => response.text())
            .then(data => document.getElementById('footer').innerHTML = data);
    </script>
</body>
</html>
