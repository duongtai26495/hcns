document.addEventListener('DOMContentLoaded', function() {
    const maNvInput = document.getElementById('ma_nv');
    const passwordInput = document.getElementById('password');
    const loginButton = document.getElementById('loginButton');
    const loginForm = document.getElementById('loginForm');
    const rememberSwitch = document.querySelector('.remember-switch');
    const loadAniButton = document.querySelector('.load_ani');

    // Hàm kiểm tra tồn tại và khởi tạo các giá trị
    function initializeRememberMe() {
        if (rememberSwitch && maNvInput && passwordInput) {
            const rememberMe = localStorage.getItem('remember-me');
            const savedMaNv = localStorage.getItem('rmb-mnv');

            if (rememberMe === '1') {
                rememberSwitch.classList.add('enabled');
                if (savedMaNv) {
                    maNvInput.value = savedMaNv;
                }
            } else {
                rememberSwitch.classList.remove('enabled');
                maNvInput.value = '';
            }

            validateInputs();
        }
    }

    // Hàm kiểm tra và cập nhật trạng thái của nút đăng nhập
    function validateInputs() {
        if (maNvInput && passwordInput && loginButton) {
            loginButton.disabled = maNvInput.value.trim() === '' || passwordInput.value.trim() === '';
        }
    }

    // Hàm lưu giá trị mã nhân viên nếu remember-me được kích hoạt
    function saveMaNv() {
        if (localStorage.getItem('remember-me') === '1' && maNvInput) {
            localStorage.setItem('rmb-mnv', maNvInput.value);
        }
    }

    // Thêm sự kiện click vào switch để thay đổi trạng thái
    if (rememberSwitch) {
        rememberSwitch.addEventListener('click', function() {
            const isEnabled = rememberSwitch.classList.toggle('enabled');
            localStorage.setItem('remember-me', isEnabled ? '1' : '0');
        });
    }

    // Thêm sự kiện submit vào form đăng nhập
    if (loginForm) {
        loginForm.addEventListener('submit', function(event) {
            event.preventDefault();
            if (loginButton) {
                loginButton.disabled = true;
                const originalButtonText = loginButton.textContent;
                let dots = 0;

                const loadingInterval = setInterval(function() {
                    if (loginButton) {
                        loginButton.textContent = 'Đang đăng nhập' + '.'.repeat(dots + 1);
                        dots = (dots + 1) % 3;
                    }
                }, 500);

                saveMaNv();

                setTimeout(function() {
                    clearInterval(loadingInterval);
                    if (loginButton) {
                        loginButton.textContent = originalButtonText;
                        loginForm.submit();
                    }
                }, 1500);
            }
        });
    }

    // Thêm sự kiện input vào các trường mã nhân viên và mật khẩu để kiểm tra và cập nhật trạng thái nút đăng nhập
    if (maNvInput) {
        maNvInput.addEventListener('input', validateInputs);
    }
    if (passwordInput) {
        passwordInput.addEventListener('input', validateInputs);
    }

    // Gọi hàm khởi tạo
    initializeRememberMe();

    // Thêm sự kiện click vào nút load animation
    if (loadAniButton) {
        loadAniButton.addEventListener('click', function() {
            if (loadAniButton.classList.contains('load_ani')) {
                const originalText = loadAniButton.textContent;
                let dots = 0;
                const loadingInterval = setInterval(() => {
                    loadAniButton.textContent = 'Đang thực hiện' + '.'.repeat(dots + 1);
                    dots = (dots + 1) % 3;
                }, 500);

                setTimeout(() => {
                    clearInterval(loadingInterval);
                    loadAniButton.textContent = originalText;
                }, 5000);
            }
        });
    }

    const form = document.getElementById('createUserForm');
    if(form)
    form.addEventListener('input', function(event) {
        const input = event.target;
        if (input.tagName === 'INPUT' || input.tagName === 'SELECT') {
            validateInput(input);
        }
        toggleSubmitButton();
    });

    function validateInput(input) {
        if (input.value.trim() === '') {
            input.classList.add('border-red-500');
        } else {
            input.classList.remove('border-red-500');
        }
    }

    function toggleSubmitButton() {
        const inputs = form.querySelectorAll('input, select');
        let isValid = true;

        inputs.forEach(function(input) {
            if (input.value.trim() === '') {
                isValid = false;
            }
        });

        const submitButton = form.querySelector('button[type="submit"]');
        if (isValid) {
            submitButton.removeAttribute('disabled');
            submitButton.classList.remove('bg-gray-400', 'cursor-not-allowed');
            submitButton.classList.add('bg-blue-500', 'hover:bg-blue-700', 'cursor-pointer');
        } else {
            submitButton.setAttribute('disabled', true);
            submitButton.classList.remove('bg-blue-500', 'hover:bg-blue-700', 'cursor-pointer');
            submitButton.classList.add('bg-gray-400', 'cursor-not-allowed');
        }
    }


});
