/* =============================================================
   resources/js/dashboard/admin.js
   Script & Tailwind Configuration khusus Admin Dashboard
   ============================================================= */

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

document.addEventListener('DOMContentLoaded', () => {
    // Admin Dashboard Initialization
});
