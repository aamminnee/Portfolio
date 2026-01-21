<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<link rel="stylesheet" href="public/css/style.css">

<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    primary: '#3B82F6', // blue
                    secondary: '#8B5CF6', // violet
                    dark: '#0F172A',
                    darker: '#020617',
                    glass: 'rgba(255, 255, 255, 0.05)',
                    // adding colors from contact/projects pages to global config
                    accent: '#fbbf24', 
                },
                fontFamily: {
                    sans: ['Inter', 'sans-serif'],
                }
            }
        }
    }
</script>