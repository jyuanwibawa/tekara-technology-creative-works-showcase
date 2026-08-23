/* =============================================================
   resources/js/auth/login.js
   Script khusus halaman login – Sistem Autentikasi UB
   ============================================================= */

document.addEventListener('DOMContentLoaded', () => {

    // -----------------------------------------------------------------
    // Toggle show / hide password
    // -----------------------------------------------------------------
    const toggleBtn  = document.getElementById('toggle-password');
    const pwdInput   = document.getElementById('password');
    const iconEye    = document.getElementById('icon-eye');
    const iconEyeOff = document.getElementById('icon-eye-off');

    if (toggleBtn && pwdInput) {
        toggleBtn.addEventListener('click', () => {
            const isHidden   = pwdInput.type === 'password';
            pwdInput.type    = isHidden ? 'text' : 'password';

            iconEye   .classList.toggle('hidden',  isHidden);
            iconEyeOff.classList.toggle('hidden', !isHidden);

            toggleBtn.setAttribute(
                'aria-label',
                isHidden ? 'Sembunyikan password' : 'Tampilkan password'
            );
        });
    }

    // -----------------------------------------------------------------
    // Loading state saat form di-submit
    // -----------------------------------------------------------------
    const form     = document.getElementById('login-form');
    const btnLogin = document.getElementById('btn-login');
    const btnText  = document.getElementById('btn-text');
    const spinner  = document.getElementById('spinner');

    if (form && btnLogin) {
        form.addEventListener('submit', () => {
            btnLogin.disabled    = true;
            btnText.textContent  = 'Memproses...';
            spinner.classList.remove('hidden');
        });
    }

    // -----------------------------------------------------------------
    // Animasi shake pada card jika ada error dari server
    // -----------------------------------------------------------------
    const errorAlert = document.getElementById('error-alert');
    const loginCard  = document.getElementById('login-card');

    if (errorAlert && loginCard) {
        loginCard.classList.add('shake');
        loginCard.addEventListener('animationend', () => {
            loginCard.classList.remove('shake');
        }, { once: true });
    }

    // -----------------------------------------------------------------
    // Auto-focus ke field pertama yang kosong / ada error
    // -----------------------------------------------------------------
    const usernameInput = document.getElementById('username');

    if (usernameInput) {
        if (!usernameInput.value) {
            usernameInput.focus();
        } else if (pwdInput) {
            pwdInput.focus();
        }
    }

});
