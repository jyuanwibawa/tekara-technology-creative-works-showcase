<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Portal - Dashboard Capstone</title>
	<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
	<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:FILL@0..1&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Manrope:wght@600;700&display=swap" rel="stylesheet">
	<script>
		tailwind.config = {
			theme: {
				extend: {
					colors: {
						primary: '#0057c3',
						'primary-container': '#0f6ef0',
						secondary: '#5c5f60',
						'secondary-container': '#e1e3e4',
						error: '#ba1a1a',
						'error-container': '#ffdad6',
						surface: '#fcf9f8',
						'surface-container': '#f0edec',
						'surface-container-high': '#ebe7e7',
						'surface-container-low': '#f6f3f2',
						'surface-container-lowest': '#ffffff',
						'tertiary-fixed': '#e0e3e6',
						'on-surface': '#1c1b1b',
						'on-surface-variant': '#424754',
						'on-primary': '#ffffff',
						'on-primary-container': '#fefcff',
						'on-error': '#ffffff',
						'on-error-container': '#93000a',
						'outline-variant': '#c2c6d7'
					},
					fontFamily: {
						body: ['Inter', 'sans-serif'],
						display: ['Manrope', 'sans-serif']
					}
				}
			}
		};
	</script>
</head>
<body class="bg-white text-on-surface font-body min-h-screen flex overflow-x-hidden">
	@include('dashboard.admin.navigation')

	<main class="flex-1 min-w-0 md:ml-64 flex flex-col min-h-screen overflow-x-hidden">
		@include('dashboard.admin.header')

		<div class="flex-1 p-6 bg-white overflow-y-auto">
			@include('dashboard.admin.content')
		</div>

		@include('dashboard.admin.footer')
	</main>
</body>
</html>
