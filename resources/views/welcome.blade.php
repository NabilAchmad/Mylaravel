<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Enterprise Solutions</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #1a237e 0%, #0d47a1 100%);
            margin: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
        }

        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .container {
            background: rgba(255, 255, 255, 0.98);
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            max-width: 800px;
            width: 90%;
            text-align: center;
        }

        .logo {
            width: 150px;
            margin-bottom: 20px;
        }

        h1 {
            color: #1a237e;
            font-size: 2.8rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .welcome-text {
            color: #37474f;
            font-size: 1.2rem;
            line-height: 1.6;
            margin-bottom: 2rem;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .feature-item {
            padding: 15px;
        }

        .feature-icon {
            font-size: 2rem;
            color: #1a237e;
            margin-bottom: 10px;
        }

        .feature-title {
            font-weight: 600;
            color: #1a237e;
            margin-bottom: 5px;
        }

        .cta-button {
            display: inline-block;
            padding: 15px 40px;
            background: linear-gradient(45deg, #1a237e, #283593);
            color: white;
            text-decoration: none;
            border-radius: 25px;
            font-weight: 600;
            letter-spacing: 1px;
            transition: all 0.4s ease;
            box-shadow: 0 4px 15px rgba(26, 35, 126, 0.3);
            position: relative;
            overflow: hidden;
        }

        .cta-button:hover {
            background: linear-gradient(45deg, #283593, #1a237e);
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(26, 35, 126, 0.4);
        }

        .cta-button:active {
            transform: translateY(-1px);
            box-shadow: 0 3px 10px rgba(26, 35, 126, 0.3);
        }

        .cta-button::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to right, transparent, rgba(255,255,255,0.2), transparent);
            transform: translateX(-100%);
        }

        .cta-button:hover::after {
            animation: shine 1.5s infinite;
        }

        @keyframes shine {
            100% {
                transform: translateX(100%);
            }
        }

        .button-group {
            margin-top: 30px;
        }

        .register-link {
            display: inline-block;
            padding: 12px 30px;
            color: #1a237e;
            text-decoration: none;
            font-weight: 500;
            margin-left: 20px;
            border: 2px solid #1a237e;
            border-radius: 25px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .register-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 100%;
            background: #1a237e;
            transition: all 0.3s ease;
            z-index: -1;
        }

        .register-link:hover {
            color: white;
        }

        .register-link:hover::before {
            width: 100%;
        }

        @media (max-width: 768px) {
            .container {
                padding: 30px;
            }

            h1 {
                font-size: 2.2rem;
            }

            .welcome-text {
                font-size: 1.1rem;
            }

            .button-group {
                display: flex;
                flex-direction: column;
                gap: 15px;
                align-items: center;
            }

            .register-link {
                margin-left: 0;
                width: 80%;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="{{ asset('images/logo.png') }}" alt="Enterprise Logo" class="logo">
        <h1>Enterprise Solutions</h1>
        <p class="welcome-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Et animi alias laborum atque aperiam nihil nam nobis, neque beatae ducimus, perspiciatis suscipit esse voluptate illo veniam adipisci reprehenderit quos ex numquam porro cupiditate.</p>
        
        <div class="features">
            <div class="feature-item">
                <div class="feature-icon">🚀</div>
                <div class="feature-title">Inovasi Teknologi</div>
                <p>Solusi teknologi terkini untuk bisnis Anda</p>
            </div>
            <div class="feature-item">
                <div class="feature-icon">🛡️</div>
                <div class="feature-title">Keamanan Terjamin</div>
                <p>Sistem keamanan berlapis untuk data Anda</p>
            </div>
            <div class="feature-item">
                <div class="feature-icon">💼</div>
                <div class="feature-title">Solusi Bisnis</div>
                <p>Optimalkan efisiensi operasional Anda</p>
            </div>
        </div>

        <div class="button-group">
            <a href="{{ route('login') }}" class="cta-button">Masuk</a>
            <a href="{{ route('register') }}" class="register-link">Daftar Enterprise Account</a>
        </div>
    </div>
</body>
</html>