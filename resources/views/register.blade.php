<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <title>Register | MoneyFlow</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #6366f1;
            --primary-light: #818cf8;
            --primary-dark: #4f46e5;
            --success: #10b981;
            --danger: #ef4444;
            --dark: #1e293b;
            --light: #f8fafc;
            --gray: #94a3b8;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f1f5f9;
            color: var(--dark);
            background-image: url('https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-blend-mode: overlay;
            background-color: rgba(255, 255, 255, 0.9);
        }
        
        .register-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 100%;
            max-width: 450px;
            animation: fadeInUp 0.6s ease;
        }
        
        .register-header {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            padding: 2rem;
            text-align: center;
        }
        
        .register-header h3 {
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .register-header p {
            opacity: 0.8;
            font-size: 0.9rem;
        }
        
        .register-body {
            padding: 2rem;
            background-color: white;
        }
        
        .form-control {
            border-radius: 8px;
            padding: 0.75rem 1rem;
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: var(--primary-light);
            box-shadow: 0 0 0 0.25rem rgba(99, 102, 241, 0.25);
        }
        
        .form-label {
            font-weight: 500;
            margin-bottom: 0.5rem;
        }
        
        .btn-register {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border: none;
            border-radius: 8px;
            padding: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }
        
        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(99, 102, 241, 0.3);
        }
        
        .register-footer {
            padding: 1.5rem;
            background-color: #f8fafc;
            text-align: center;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .register-footer a {
            color: var(--primary);
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .register-footer a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }
        
        .input-group-text {
            background-color: transparent;
            border-right: none;
        }
        
        .input-with-icon {
            border-left: none;
            padding-left: 0;
        }
        
        .password-strength {
            height: 4px;
            background-color: #e2e8f0;
            border-radius: 2px;
            margin-top: 0.5rem;
            overflow: hidden;
        }
        
        .password-strength-bar {
            height: 100%;
            width: 0%;
            background-color: var(--danger);
            transition: width 0.3s ease, background-color 0.3s ease;
        }
        
        .password-requirements {
            margin-top: 0.5rem;
            font-size: 0.75rem;
            color: var(--gray);
        }
        
        .requirement {
            display: flex;
            align-items: center;
            margin-bottom: 0.25rem;
        }
        
        .requirement i {
            margin-right: 0.5rem;
            font-size: 0.6rem;
        }
        
        .requirement.valid {
            color: var(--success);
        }
        
        .requirement.valid i {
            color: var(--success);
        }
        
        .divider {
            display: flex;
            align-items: center;
            margin: 1.5rem 0;
            color: var(--gray);
            font-size: 0.8rem;
        }
        
        .divider::before, .divider::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .divider::before {
            margin-right: 1rem;
        }
        
        .divider::after {
            margin-left: 1rem;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .terms-check {
            display: flex;
            align-items: flex-start;
            margin-bottom: 1rem;
        }
        
        .terms-check .form-check-input {
            margin-top: 0.25rem;
        }
        
        .terms-text {
            font-size: 0.8rem;
            margin-left: 0.5rem;
            color: var(--gray);
        }
        
        .terms-text a {
            color: var(--primary);
            text-decoration: none;
        }
        
        .terms-text a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center vh-100 px-3">
        <div class="register-card">
            <div class="register-header">
                <div class="mb-3">
                    <i class="bi bi-cash-stack" style="font-size: 2.5rem;"></i>
                </div>
                <h3>Create Your Account</h3>
                <p>Start managing your finances today</p>
            </div>
            
            <div class="register-body">
                <form action="{{ url('actionRegister') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                            <input type="text" class="form-control input-with-icon" id="name" name="name" 
                                   placeholder="John Doe" value="{{ old('name') }}" required />
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <input type="email" class="form-control input-with-icon" id="email" name="email" 
                                   placeholder="your@email.com" value="{{ old('email') }}" required />
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <input type="password" class="form-control input-with-icon" id="password" name="password" 
                                   placeholder="Create a password" required />
                        </div>
                        <div class="password-strength">
                            <div class="password-strength-bar" id="passwordStrengthBar"></div>
                        </div>
                        <div class="password-requirements" id="passwordRequirements">
                            <div class="requirement" id="reqLength">
                                <i class="bi bi-circle"></i>
                                <span>At least 8 characters</span>
                            </div>
                            <div class="requirement" id="reqUpper">
                                <i class="bi bi-circle"></i>
                                <span>At least 1 uppercase letter</span>
                            </div>
                            <div class="requirement" id="reqNumber">
                                <i class="bi bi-circle"></i>
                                <span>At least 1 number</span>
                            </div>
                            <div class="requirement" id="reqSpecial">
                                <i class="bi bi-circle"></i>
                                <span>At least 1 special character</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                            <input type="password" class="form-control input-with-icon" id="confirmPassword" 
                                   name="password_confirmation" placeholder="Confirm your password" required />
                        </div>
                        <div id="passwordMatch" class="mt-1" style="font-size: 0.75rem;"></div>
                    </div>
                    
                    <div class="terms-check">
                        <input class="form-check-input" type="checkbox" id="agreeTerms" required>
                        <label class="terms-text" for="agreeTerms">
                            I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
                        </label>
                    </div>
                    
                    <button type="submit" class="btn btn-register w-100 mb-3">
                        <i class="bi bi-person-plus me-2"></i> Create Account
                    </button>
                </form>
            </div>
            
            <div class="register-footer">
                <p class="mb-0">Already have an account? <a href="{{ url('login') }}">Sign in</a></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"></script>
    <script>
        // Password strength indicator
        const passwordInput = document.getElementById('password');
        const passwordStrengthBar = document.getElementById('passwordStrengthBar');
        const confirmPasswordInput = document.getElementById('confirmPassword');
        const passwordMatch = document.getElementById('passwordMatch');
        
        passwordInput.addEventListener('input', function() {
            const password = this.value;
            let strength = 0;
            
            // Check length
            if (password.length >= 8) {
                strength += 25;
                document.getElementById('reqLength').classList.add('valid');
                document.getElementById('reqLength').querySelector('i').className = 'bi bi-check-circle-fill';
            } else {
                document.getElementById('reqLength').classList.remove('valid');
                document.getElementById('reqLength').querySelector('i').className = 'bi bi-circle';
            }
            
            // Check uppercase letters
            if (/[A-Z]/.test(password)) {
                strength += 25;
                document.getElementById('reqUpper').classList.add('valid');
                document.getElementById('reqUpper').querySelector('i').className = 'bi bi-check-circle-fill';
            } else {
                document.getElementById('reqUpper').classList.remove('valid');
                document.getElementById('reqUpper').querySelector('i').className = 'bi bi-circle';
            }
            
            // Check numbers
            if (/[0-9]/.test(password)) {
                strength += 25;
                document.getElementById('reqNumber').classList.add('valid');
                document.getElementById('reqNumber').querySelector('i').className = 'bi bi-check-circle-fill';
            } else {
                document.getElementById('reqNumber').classList.remove('valid');
                document.getElementById('reqNumber').querySelector('i').className = 'bi bi-circle';
            }
            
            // Check special characters
            if (/[^A-Za-z0-9]/.test(password)) {
                strength += 25;
                document.getElementById('reqSpecial').classList.add('valid');
                document.getElementById('reqSpecial').querySelector('i').className = 'bi bi-check-circle-fill';
            } else {
                document.getElementById('reqSpecial').classList.remove('valid');
                document.getElementById('reqSpecial').querySelector('i').className = 'bi bi-circle';
            }
            
            // Update strength bar
            passwordStrengthBar.style.width = strength + '%';
            
            // Update color based on strength
            if (strength < 50) {
                passwordStrengthBar.style.backgroundColor = 'var(--danger)';
            } else if (strength < 75) {
                passwordStrengthBar.style.backgroundColor = '#f59e0b';
            } else {
                passwordStrengthBar.style.backgroundColor = 'var(--success)';
            }
            
            // Check password match if confirm password has value
            if (confirmPasswordInput.value) {
                checkPasswordMatch();
            }
        });
        
        // Password match checker
        confirmPasswordInput.addEventListener('input', checkPasswordMatch);
        
        function checkPasswordMatch() {
            if (passwordInput.value && confirmPasswordInput.value) {
                if (passwordInput.value === confirmPasswordInput.value) {
                    passwordMatch.innerHTML = '<i class="bi bi-check-circle-fill text-success me-1"></i> Passwords match';
                } else {
                    passwordMatch.innerHTML = '<i class="bi bi-exclamation-circle-fill text-danger me-1"></i> Passwords do not match';
                }
            } else {
                passwordMatch.innerHTML = '';
            }
        }
        
        // Simple animation for form elements
        document.addEventListener('DOMContentLoaded', function() {
            const formElements = document.querySelectorAll('.form-control, .btn-register, .btn-outline-secondary');
            formElements.forEach((el, index) => {
                setTimeout(() => {
                    el.style.opacity = '1';
                    el.style.transform = 'translateY(0)';
                }, index * 100);
            });
        });
    </script>
</body>
</html>