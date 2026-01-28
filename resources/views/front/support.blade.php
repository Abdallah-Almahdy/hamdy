<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تواصل معانا</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Cairo', 'Segoe UI', Arial, sans-serif;
            background: #f8fafc;
            color: #2d3748;
            line-height: 1.6;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #4299e1 0%, #3182ce 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
        }

        .header h1 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .header p {
            opacity: 0.9;
            font-size: 16px;
        }

        .content {
            padding: 40px 30px;
        }

        .contact-section {
            margin-bottom: 30px;
        }

        .contact-section:last-child {
            margin-bottom: 0;
        }

        .section-title {
            font-size: 18px;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .contact-item {
            background: #f7fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 8px;
            transition: all 0.2s ease;
        }

        .contact-item:hover {
            border-color: #4299e1;
            background: #ebf8ff;
        }

        .contact-item:last-child {
            margin-bottom: 0;
        }

        .contact-label {
            font-weight: 500;
            color: #4a5568;
            font-size: 14px;
            margin-bottom: 4px;
        }

        .contact-value {
            color: #2d3748;
            font-size: 16px;
        }

        .contact-value a {
            color: #3182ce;
            text-decoration: none;
        }

        .contact-value a:hover {
            text-decoration: underline;
        }

        .footer {
            background: #f7fafc;
            padding: 20px 30px;
            text-align: center;
            color: #718096;
            font-size: 14px;
            border-top: 1px solid #e2e8f0;
        }

        @media (max-width: 480px) {
            body {
                padding: 10px;
            }

            .header {
                padding: 30px 20px;
            }

            .header h1 {
                font-size: 24px;
            }

            .content {
                padding: 30px 20px;
            }

            .footer {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>تواصل معانا</h1>
            <p>هنا كل المعلومات اللي تحتاجها عشان توصلنا</p>
        </div>

        <div class="content">
            <div class="contact-section">
                <div class="section-title">
                    📧 الإيميل
                </div>
                <div class="contact-item">
                    <div class="contact-label">الدعم الفني والاستفسارات</div>
                    <div class="contact-value">
                        <a href="mailto:Wecare@kolyoummarket.com">Wecare@kolyoummarket.com</a>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-label">الشكاوى والمقترحات</div>
                    <div class="contact-value">
                        <a href="mailto:Wecare@kolyoummarket.com">Wecare@kolyoummarket.com</a>
                    </div>
                </div>
            </div>

            <div class="contact-section">
                <div class="section-title">
                    📞 التليفون
                </div>
                <div class="contact-item">
                    <div class="contact-label">خدمة العملاء</div>
                    <div class="contact-value">
                        <a href="tel:+201100056629">01100056629</a>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-label">الدعم الفني</div>
                    <div class="contact-value">
                        <a href="tel:+201030083513">01030083513</a>
                    </div>
                </div>
            </div>

            <div class="contact-section">
                <div class="section-title">
                    📍 العنوان
                </div>
                <div class="contact-item">
                    <div class="contact-label">المكتب الرئيسي</div>
                    <div class="contact-value">
                        الشارع الي جانب مونجيني في السلام2وبيودي علي مدرسه فيوتشر, مدينة النور، شارع الخدمات,
                        في, محافظة السويس
                    </div>
                </div>
            </div>

            <div class="contact-section">
                <div class="section-title">
                    🌐 المواقع والروابط
                </div>
                <div class="contact-item">
                    <div class="contact-label">الموقع الرسمي</div>
                    <div class="contact-value">
                        <a href="https://www.kolyoummarket.com" target="_blank">https://www.kolyoummarket.com</a>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-label">مركز المساعدة</div>
                    <div class="contact-value">
                        <a href="https://help.kolyoummarket.com/support"
                            target="_blank">https://www.kolyoummarket.com/support</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <p>متاحين ليك على مدار الساعة عشان نساعدك في أي حاجة تحتاجها</p>
        </div>
    </div>
</body>

</html>
