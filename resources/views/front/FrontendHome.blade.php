<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hamdy Store - قريبًا</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* إعادة ضبط الأنماط */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            width: 100%;
            height: 100%;
            overflow-x: hidden;
        }

        body {
            font-family: 'Cairo', sans-serif;
            background-color: #f0f8ff;
            color: #333;
            direction: rtl;
            text-align: right;
            line-height: 1.6;
        }

        /* حاوية الصفحة */
        .coming-soon-container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #f7fbff 0%, #e8f4ff 100%);
            position: relative;
            overflow: hidden;
            padding: 20px;
        }

        /* خلفية متحركة */
        .background-animation {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 0;
        }

        .circle {
            position: absolute;
            border-radius: 50%;
            opacity: 0.08;
            animation: float 20s infinite linear;
            filter: blur(1px);
        }

        .circle:nth-child(1) {
            width: 300px;
            height: 300px;
            background-color: #0071bc;
            top: 10%;
            right: 10%;
            animation-delay: 0s;
        }

        .circle:nth-child(2) {
            width: 200px;
            height: 200px;
            background-color: #0099ff;
            bottom: 20%;
            left: 15%;
            animation-delay: -5s;
        }

        .circle:nth-child(3) {
            width: 150px;
            height: 150px;
            background-color: #0071bc;
            top: 50%;
            left: 10%;
            animation-delay: -10s;
        }

        .circle:nth-child(4) {
            width: 250px;
            height: 250px;
            background-color: #0099ff;
            bottom: 10%;
            right: 20%;
            animation-delay: -15s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0) rotate(0deg) scale(1);
            }
            33% {
                transform: translateY(-30px) rotate(120deg) scale(1.05);
            }
            66% {
                transform: translateY(30px) rotate(240deg) scale(0.95);
            }
        }

        /* المحتوى الرئيسي */
        .content {
            position: relative;
            z-index: 1;
            text-align: center;
            padding: 40px;
            max-width: 900px;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 25px;
            box-shadow: 0 20px 60px rgba(0, 113, 188, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        /* الشعار */
        .logo-container {
            margin-bottom: 20px;
            animation: fadeInDown 1.2s ease-out;
        }

        .logo {
            max-width: 280px;
            height: auto;
            margin-bottom: 5px;
            filter: drop-shadow(0 5px 15px rgba(0, 0, 0, 0.1));
        }

        .logo-text {
            font-size: 2.2rem;
            font-weight: 800;
            background: linear-gradient(to right, #0071bc, #0099ff);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            letter-spacing: -0.5px;
            text-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        /* العنوان الرئيسي */
        .main-title {
            font-size: 3.2rem;
            font-weight: 800;
            margin-bottom: 25px;
            background: linear-gradient(135deg, #0071bc 0%, #0099ff 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            animation: fadeInUp 1s ease-out 0.3s both;
            text-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        /* النص */
        .message {
            font-size: 1.4rem;
            margin-bottom: 30px;
            color: #555;
            line-height: 1.8;
            animation: fadeInUp 1s ease-out 0.6s both;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        .highlight {
            color: #0071bc;
            font-weight: 700;
            position: relative;
            display: inline-block;
        }

        .highlight::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(to right, #0071bc, #0099ff);
            border-radius: 2px;
        }

        /* قسم التطبيقات المتاحة الآن */
        .apps-available {
            margin: 40px 0;
            animation: fadeInUp 1s ease-out 0.8s both;
        }

        .apps-title {
            font-size: 1.8rem;
            margin-bottom: 25px;
            color: #0071bc;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .apps-title i {
            font-size: 1.5rem;
        }

        .apps-badges {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .app-badge {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .app-badge:hover {
            transform: translateY(-8px);
        }

        .badge-icon {
            width: 80px;
            height: 80px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            font-size: 2.5rem;
            color: white;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .android-badge .badge-icon {
            background: linear-gradient(135deg, #3DDC84, #2BB673);
        }

        .ios-badge .badge-icon {
            background: linear-gradient(135deg, #007AFF, #0056CC);
        }

        .badge-text {
            font-size: 1.1rem;
            font-weight: 700;
            color: #333;
        }

        .badge-subtext {
            font-size: 0.9rem;
            color: #666;
            margin-top: 5px;
        }

        /* العداد */
        .countdown {
            display: flex;
            justify-content: center;
            gap: 25px;
            margin: 50px 0;
            animation: fadeInUp 1s ease-out 1s both;
        }

        .countdown-item {
            background: linear-gradient(145deg, #ffffff, #f0f8ff);
            border-radius: 20px;
            padding: 30px 25px;
            min-width: 130px;
            box-shadow: 10px 10px 30px rgba(0, 113, 188, 0.05),
                       -5px -5px 20px rgba(255, 255, 255, 0.8);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
        }

        .countdown-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(to right, #0071bc, #0099ff);
        }

        .countdown-item:hover {
            transform: translateY(-12px) scale(1.05);
            box-shadow: 15px 15px 40px rgba(0, 113, 188, 0.1),
                       -8px -8px 25px rgba(255, 255, 255, 0.9);
        }

        .countdown-value {
            font-size: 3.2rem;
            font-weight: 800;
            color: #0071bc;
            margin-bottom: 8px;
            text-shadow: 0 3px 6px rgba(0, 0, 0, 0.05);
        }

        .countdown-label {
            font-size: 1.1rem;
            color: #0099ff;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        /* فاصل زخرفي */
        .divider {
            width: 100px;
            height: 5px;
            background: linear-gradient(to right, #0071bc, #0099ff);
            margin: 30px auto;
            border-radius: 5px;
            animation: fadeInUp 1s ease-out 0.9s both;
        }

        /* نموذج البريد الإلكتروني */
        .subscription-form {
            max-width: 550px;
            margin: 50px auto;
            animation: fadeInUp 1s ease-out 1.2s both;
        }

        .form-title {
            font-size: 1.6rem;
            margin-bottom: 25px;
            color: #333;
            font-weight: 700;
        }

        .input-group {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .email-input {
            padding: 20px 30px;
            border: 2px solid #e0e0e0;
            border-radius: 15px;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            outline: none;
            font-family: 'Cairo', sans-serif;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: inset 3px 3px 10px rgba(0, 0, 0, 0.03);
        }

        .email-input:focus {
            border-color: #0099ff;
            box-shadow: 0 0 0 4px rgba(0, 153, 255, 0.15);
            transform: translateY(-2px);
        }

        .submit-button {
            background: linear-gradient(135deg, #0071bc 0%, #0099ff 100%);
            color: white;
            border: none;
            padding: 20px 45px;
            border-radius: 15px;
            font-size: 1.3rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(0, 113, 188, 0.25);
            font-family: 'Cairo', sans-serif;
            position: relative;
            overflow: hidden;
        }

        .submit-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
        }

        .submit-button:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0, 113, 188, 0.35);
        }

        .submit-button:hover::before {
            left: 100%;
        }

        .submit-button:active {
            transform: translateY(0);
        }

        /* الشبكات الاجتماعية */
        .social-links {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 60px;
            animation: fadeInUp 1s ease-out 1.5s both;
        }

        .social-link {
            width: 65px;
            height: 65px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(145deg, #ffffff, #f0f8ff);
            color: #666;
            font-size: 1.6rem;
            box-shadow: 8px 8px 20px rgba(0, 113, 188, 0.08),
                       -5px -5px 15px rgba(255, 255, 255, 0.8);
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            text-decoration: none;
        }

        .social-link:hover {
            transform: translateY(-8px) scale(1.1);
            color: white;
            box-shadow: 12px 12px 30px rgba(0, 113, 188, 0.12),
                       -8px -8px 20px rgba(255, 255, 255, 0.9);
        }

        .social-link.facebook:hover {
            background: linear-gradient(135deg, #1877F2, #0d5bb5);
        }

        .social-link.instagram:hover {
            background: linear-gradient(45deg, #405DE6, #833AB4, #C13584, #E1306C, #FD1D1D);
        }

        .social-link.twitter:hover {
            background: linear-gradient(135deg, #1DA1F2, #0d8bd9);
        }

        /* التأثيرات */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* شعار موجة في الأسفل */
        .wave {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
            transform: rotate(180deg);
            z-index: 0;
        }

        .wave svg {
            position: relative;
            display: block;
            width: calc(100% + 1.3px);
            height: 120px;
        }

        .wave .shape-fill {
            fill: rgba(0, 113, 188, 0.08);
        }

        /* التكيف مع الشاشات الصغيرة */
        @media (max-width: 768px) {
            .content {
                padding: 30px 20px;
                border-radius: 20px;
            }
            
            .main-title {
                font-size: 2.5rem;
            }
            
            .message {
                font-size: 1.2rem;
            }
            
            .apps-title {
                font-size: 1.5rem;
            }
            
            .badge-icon {
                width: 70px;
                height: 70px;
                font-size: 2rem;
            }
            
            .countdown {
                flex-wrap: wrap;
                gap: 20px;
            }
            
            .countdown-item {
                min-width: 110px;
                padding: 25px 20px;
            }
            
            .countdown-value {
                font-size: 2.8rem;
            }
            
            .logo-text {
                font-size: 1.8rem;
            }
            
            .circle:nth-child(1),
            .circle:nth-child(2),
            .circle:nth-child(3),
            .circle:nth-child(4) {
                width: 150px;
                height: 150px;
            }
        }

        @media (max-width: 480px) {
            .coming-soon-container {
                padding: 15px;
            }
            
            .content {
                padding: 25px 15px;
                border-radius: 15px;
            }
            
            .main-title {
                font-size: 2rem;
            }
            
            .message {
                font-size: 1.1rem;
                margin-bottom: 20px;
            }
            
            .apps-badges {
                gap: 20px;
            }
            
            .badge-icon {
                width: 60px;
                height: 60px;
                font-size: 1.8rem;
            }
            
            .badge-text {
                font-size: 1rem;
            }
            
            .badge-subtext {
                font-size: 0.8rem;
            }
            
            .countdown-item {
                min-width: 90px;
                padding: 20px 15px;
            }
            
            .countdown-value {
                font-size: 2.2rem;
            }
            
            .countdown-label {
                font-size: 1rem;
            }
            
            .social-link {
                width: 55px;
                height: 55px;
                font-size: 1.4rem;
            }
            
            .submit-button {
                padding: 18px 35px;
                font-size: 1.2rem;
            }
            
            .email-input {
                padding: 18px 25px;
            }
        }

        /* تحسينات إضافية */
        .copyright {
            margin-top: 40px;
            font-size: 0.9rem;
            color: #888;
            animation: fadeInUp 1s ease-out 1.8s both;
        }

        .pulse {
            display: inline-block;
            width: 12px;
            height: 12px;
            background-color: #0071bc;
            border-radius: 50%;
            margin-right: 8px;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(0.8);
                opacity: 0.7;
            }
            50% {
                transform: scale(1.1);
                opacity: 1;
            }
            100% {
                transform: scale(0.8);
                opacity: 0.7;
            }
        }
    </style>
</head>
<body>
    <div class="coming-soon-container">
        <!-- خلفية متحركة -->
        <div class="background-animation">
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
        </div>

        <!-- المحتوى الرئيسي -->
        <div class="content">
            <!-- الشعار -->
            <div class="logo-container">
                <div id="logo-placeholder">
                    <div class="logo-text">HAMDY STORE</div>
                </div>
            </div>

            <!-- العنوان الرئيسي -->
            <h1 class="main-title">متجرنا قريبًا!</h1>

            <!-- فاصل زخرفي -->
            <div class="divider"></div>

            <!-- الرسالة -->
            <p class="message">
                نحن نعمل بجد لإطلاق <span class="highlight">Hamdy Store</span>، تجربة تسوق استثنائية ستغير مفهوم التسوق عبر الإنترنت. 
                كن أول من يعلم عند الإطلاق واحصل على عروض خاصة <span class="pulse"></span>
            </p>

            <!-- قسم التطبيقات المتاحة -->
            <div class="apps-available">
                <h3 class="apps-title">
                    <i class="fas fa-mobile-alt"></i>
                    التطبيقات متوفرة الآن!
                </h3>
                <div class="apps-badges">
                    <a href="https://play.google.com/store/apps" target="_blank" class="app-badge android-badge">
                        <div class="badge-icon">
                            <i class="fab fa-android"></i>
                        </div>
                        <div class="badge-text">تطبيق Android</div>
                        <div class="badge-subtext">حمّله الآن من Google Play</div>
                    </a>
                    <a href="https://apps.apple.com" target="_blank" class="app-badge ios-badge">
                        <div class="badge-icon">
                            <i class="fab fa-apple"></i>
                        </div>
                        <div class="badge-text">تطبيق iOS</div>
                        <div class="badge-subtext">حمّله الآن من App Store</div>
                    </a>
                </div>
            </div>

            <!-- العداد -->
            <div class="countdown">
                <div class="countdown-item">
                    <div class="countdown-value" id="days">00</div>
                    <div class="countdown-label">أيام</div>
                </div>
                <div class="countdown-item">
                    <div class="countdown-value" id="hours">00</div>
                    <div class="countdown-label">ساعات</div>
                </div>
                <div class="countdown-item">
                    <div class="countdown-value" id="minutes">00</div>
                    <div class="countdown-label">دقائق</div>
                </div>
                <div class="countdown-item">
                    <div class="countdown-value" id="seconds">00</div>
                    <div class="countdown-label">ثواني</div>
                </div>
            </div>

            <!-- نموذج الاشتراك -->
            <div class="subscription-form">
                <h3 class="form-title">اشترك ليصلك الخبر أولاً</h3>
                <div class="input-group">
                    <input type="email" class="email-input" placeholder="بريدك الإلكتروني" required>
                    <button type="submit" class="submit-button">إشعارني عند الإطلاق</button>
                </div>
            </div>

            <!-- الشبكات الاجتماعية -->
            <div class="social-links">
                <a href="#" class="social-link facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="social-link instagram">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="social-link twitter">
                    <i class="fab fa-twitter"></i>
                </a>
            </div>

            <!-- حقوق النشر -->
            <div class="copyright">
                © 2024 Hamdy Store. جميع الحقوق محفوظة.
            </div>
        </div>

        <!-- موجة في الأسفل -->
        <div class="wave">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
            </svg>
        </div>
    </div>

    <script>
        // تاريخ الإطلاق المحدد
        const launchDate = new Date('2026-12-01T00:00:00').getTime();
        
        function updateCountdown() {
            const now = new Date().getTime();
            const timeLeft = launchDate - now;
            
            if (timeLeft < 0) {
                document.querySelector('.countdown').innerHTML = 
                    '<div style="font-size: 2rem; color: #0071bc; font-weight: 700; padding: 20px;">🎉 تم الإطلاق! زورونا الآن 🎉</div>';
                return;
            }
            
            const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
            const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);
            
            document.getElementById('days').textContent = days.toString().padStart(2, '0');
            document.getElementById('hours').textContent = hours.toString().padStart(2, '0');
            document.getElementById('minutes').textContent = minutes.toString().padStart(2, '0');
            document.getElementById('seconds').textContent = seconds.toString().padStart(2, '0');
            
            // تأثير عند تغيير الثواني
            if (seconds === 59) {
                document.getElementById('seconds').style.color = '#0099ff';
                setTimeout(() => {
                    document.getElementById('seconds').style.color = '#0071bc';
                }, 300);
            }
        }
        
        // تحديث العداد كل ثانية
        setInterval(updateCountdown, 1000);
        updateCountdown(); // التشغيل الأولي
        
        // معالجة نموذج الاشتراك
        document.querySelector('.submit-button').addEventListener('click', function(e) {
            e.preventDefault();
            const emailInput = document.querySelector('.email-input');
            const email = emailInput.value.trim();
            
            if (!email || !email.includes('@') || !email.includes('.')) {
                emailInput.style.borderColor = '#ff4757';
                emailInput.style.boxShadow = '0 0 0 4px rgba(255, 71, 87, 0.15)';
                setTimeout(() => {
                    emailInput.style.borderColor = '#e0e0e0';
                    emailInput.style.boxShadow = 'inset 3px 3px 10px rgba(0, 0, 0, 0.03)';
                }, 2000);
                return;
            }
            
            // تأثير عند النجاح
            this.innerHTML = '<i class="fas fa-check"></i> تم الاشتراك!';
            this.style.background = 'linear-gradient(135deg, #2ed573, #1dd1a1)';
            this.style.boxShadow = '0 8px 25px rgba(46, 213, 115, 0.25)';
            
            // هنا يمكن إضافة كود إرسال البريد الإلكتروني
            console.log(`تم الاشتراك بالبريد: ${email}`);
            
            setTimeout(() => {
                this.innerHTML = 'إشعارني عند الإطلاق';
                this.style.background = 'linear-gradient(135deg, #0071bc 0%, #0099ff 100%)';
                this.style.boxShadow = '0 8px 25px rgba(0, 113, 188, 0.25)';
                emailInput.value = '';
            }, 3000);
        });
        
        // إضافة تأثيرات للدوائر المتحركة
        document.querySelectorAll('.circle').forEach((circle, index) => {
            circle.style.animationDuration = `${20 + index * 5}s`;
        });
        
        // تأثيرات إضافية عند التمرير
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const rate = scrolled * -0.5;
            
            document.querySelectorAll('.circle').forEach(circle => {
                circle.style.transform = `translateY(${rate}px)`;
            });
        });
    </script>
</body>
</html>