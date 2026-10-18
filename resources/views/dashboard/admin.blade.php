<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Portal - Dashboard Capstone</title>
	<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
	<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@400&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
	@vite(['resources/css/dashboard/admin.css', 'resources/js/dashboard/admin.js'])
</head>
<body class="bg-slate-50 text-slate-800 font-sans min-h-screen flex antialiased overflow-x-hidden">
	@include('dashboard.admin.navigation')

	<main class="flex-1 min-w-0 md:ml-64 flex flex-col min-h-screen overflow-x-hidden">
		@include('dashboard.admin.header')

		<div class="flex-1 p-5 sm:p-8 bg-slate-50 overflow-y-auto pb-12">
			@include('dashboard.admin.content')
		</div>

		@include('dashboard.admin.footer')
	</main>
</body>
</html>
