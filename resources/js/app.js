
$(function(){


    const maNvInput = $('#ma_nv');
    const passwordInput = $('#password');
    const loginButton = $('#loginButton');
    const loginForm = $('#loginForm');
    const rememberSwitch = $('.remember-switch');
    const loadAniButton = $('.load_ani');

    // Hàm kiểm tra tồn tại và khởi tạo các giá trị
    function initializeRememberMe() {
        if (rememberSwitch.length && maNvInput.length && passwordInput.length) {
            const rememberMe = localStorage.getItem('remember-me');
            const savedMaNv = localStorage.getItem('rmb-mnv');

            if (rememberMe === '1') {
                rememberSwitch.addClass('enabled');
                if (savedMaNv) {
                    maNvInput.val(savedMaNv);
                }
            } else {
                rememberSwitch.removeClass('enabled');
                maNvInput.val('');
            }

            validateInputs();
        }
    }

    // Hàm kiểm tra và cập nhật trạng thái của nút đăng nhập
    function validateInputs() {
        if (maNvInput.length && passwordInput.length && loginButton.length) {
            loginButton.prop('disabled', maNvInput.val().trim() === '' || passwordInput.val().trim() === '');
        }
    }

    // Hàm lưu giá trị mã nhân viên nếu remember-me được kích hoạt
    function saveMaNv() {
        if (localStorage.getItem('remember-me') === '1' && maNvInput.length) {
            localStorage.setItem('rmb-mnv', maNvInput.val());
        }
    }

    // Thêm sự kiện click vào switch để thay đổi trạng thái
    if (rememberSwitch.length) {
        rememberSwitch.on('click', function() {
            const isEnabled = rememberSwitch.toggleClass('enabled').hasClass('enabled');
            localStorage.setItem('remember-me', isEnabled ? '1' : '0');
        });
    }

    // Thêm sự kiện submit vào form đăng nhập
    if (loginForm.length) {
        loginForm.on('submit', function(event) {
            event.preventDefault();
            if (loginButton.length) {
                loginButton.prop('disabled', true);
                const originalButtonText = loginButton.text();
                let dots = 0;

                const loadingInterval = setInterval(function() {
                    loginButton.text('Đang đăng nhập' + '.'.repeat(dots + 1));
                    dots = (dots + 1) % 3;
                }, 500);

                saveMaNv();

                setTimeout(function() {
                    clearInterval(loadingInterval);
                    loginButton.text(originalButtonText);
                    loginForm.off('submit').submit();
                }, 1500);
            }
        });
    }

    // Thêm sự kiện input vào các trường mã nhân viên và mật khẩu để kiểm tra và cập nhật trạng thái nút đăng nhập
    if (maNvInput.length) {
        maNvInput.on('input', validateInputs);
    }
    if (passwordInput.length) {
        passwordInput.on('input', validateInputs);
    }

    // Gọi hàm khởi tạo
    initializeRememberMe();

    // Thêm sự kiện click vào nút load animation
    if (loadAniButton.length) {
        loadAniButton.on('click', function() {
            if (loadAniButton.hasClass('load_ani')) {
                const originalText = loadAniButton.text();
                let dots = 0;
                const loadingInterval = setInterval(() => {
                    loadAniButton.text('Đang thực hiện' + '.'.repeat(dots + 1));
                    dots = (dots + 1) % 3;
                }, 500);

                setTimeout(() => {
                    clearInterval(loadingInterval);
                    loadAniButton.text(originalText);
                }, 5000);
            }
        });
    }

    const form = $('#createUserForm');
    if (form.length) {
        form.on('input', function(event) {
            const input = $(event.target);
            if (input.is('input') || input.is('select')) {
                validateInput(input);
            }
            toggleSubmitButton();
        });

        function validateInput(input) {
            if (input.val().trim() === '') {
                input.addClass('border-red-500');
            } else {
                input.removeClass('border-red-500');
            }
        }

        function toggleSubmitButton() {
            const inputs = form.find('input, select');
            let isValid = true;

            inputs.each(function() {
                if ($(this).val().trim() === '') {
                    isValid = false;
                }
            });

            const submitButton = form.find('button[type="submit"]');
            if (isValid) {
                submitButton.prop('disabled', false);
                submitButton.removeClass('bg-gray-400 cursor-not-allowed').addClass('bg-blue-500 hover:bg-blue-700 cursor-pointer');
            } else {
                submitButton.prop('disabled', true);
                submitButton.removeClass('bg-blue-500 hover:bg-blue-700 cursor-pointer').addClass('bg-gray-400 cursor-not-allowed');
            }
        }
    }
    $(".date_picker").flatpickr({
        altInput: true,
        altFormat: "d-m-Y", // Hiển thị định dạng cho người dùng
        dateFormat: "Y-m-d", 
        locale: 'vn'
    });

    const drawerMenu = $('.drawer-menu')
    drawerMenu.addClass('-translate-x-full')
    $('.menu-icon').click(function() {
        drawerMenu.toggleClass('-translate-x-full'); // Thêm hoặc xoá class Tailwind để di chuyển menu
    });
});

