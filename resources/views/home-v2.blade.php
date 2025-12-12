<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bookoo — Curated Literature for the Discerning Reader</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=IBM+Plex+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --cream: #FBF8F3;
            --burgundy: #8B2635;
            --burgundy-dark: #6B1E2A;
            --charcoal: #1A1A1A;
            --warm-gray: #9B8B7E;
            --light-gold: #D4AF6A;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'IBM Plex Sans', system-ui, sans-serif;
            background: var(--cream);
            color: var(--charcoal);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Decorative corner elements */
        .corner-decoration {
            position: absolute;
            width: 60px;
            height: 60px;
            opacity: 0.15;
        }

        .corner-decoration::before,
        .corner-decoration::after {
            content: '';
            position: absolute;
            background: var(--burgundy);
        }

        .corner-decoration::before {
            width: 2px;
            height: 100%;
        }

        .corner-decoration::after {
            width: 100%;
            height: 2px;
        }

        .corner-tl {
            top: 0;
            left: 0;
        }

        .corner-tr {
            top: 0;
            right: 0;
            transform: rotate(90deg);
        }

        .corner-bl {
            bottom: 0;
            left: 0;
            transform: rotate(-90deg);
        }

        .corner-br {
            bottom: 0;
            right: 0;
            transform: rotate(180deg);
        }

        /* Grain texture overlay */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 400 400' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)'/%3E%3C/svg%3E");
            opacity: 0.025;
            pointer-events: none;
            z-index: 9999;
        }

        /* Header */
        header {
            position: relative;
            background: var(--charcoal);
            color: var(--cream);
            border-bottom: 3px solid var(--burgundy);
        }

        nav {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem 4rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            animation: fadeInDown 0.8s ease-out;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logo h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 700;
            font-style: italic;
            letter-spacing: -0.02em;
            color: var(--cream);
        }

        .logo-icon {
            width: 50px;
            height: 50px;
            position: relative;
        }

        .logo-icon::before,
        .logo-icon::after {
            content: '';
            position: absolute;
            background: var(--burgundy);
            border-radius: 2px;
        }

        .logo-icon::before {
            width: 30px;
            height: 42px;
            left: 0;
            top: 4px;
            transform: rotate(-8deg);
        }

        .logo-icon::after {
            width: 30px;
            height: 42px;
            right: 0;
            top: 4px;
            transform: rotate(8deg);
        }

        .nav-links {
            display: flex;
            gap: 3rem;
            align-items: center;
        }

        .nav-links a {
            color: var(--cream);
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 400;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            position: relative;
            transition: color 0.3s ease;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 1px;
            background: var(--burgundy);
            transition: width 0.3s ease;
        }

        .nav-links a:hover {
            color: var(--light-gold);
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .cart-btn {
            background: var(--burgundy);
            color: var(--cream);
            padding: 0.75rem 1.5rem;
            border: none;
            cursor: pointer;
            font-family: 'IBM Plex Sans', sans-serif;
            font-size: 0.9rem;
            font-weight: 500;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            transition: all 0.3s ease;
        }

        .cart-btn:hover {
            background: var(--burgundy-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(139, 38, 53, 0.3);
        }

        /* Hero Section */
        .hero {
            position: relative;
            max-width: 1400px;
            margin: 0 auto;
            padding: 8rem 4rem 6rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
            animation: fadeIn 1s ease-out 0.2s backwards;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-subtitle {
            font-size: 0.85rem;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: var(--burgundy);
            font-weight: 500;
            margin-bottom: 1.5rem;
            opacity: 0;
            animation: fadeInUp 0.8s ease-out 0.4s forwards;
        }

        .hero h2 {
            font-family: 'Playfair Display', serif;
            font-size: 4.5rem;
            line-height: 1.1;
            font-weight: 700;
            color: var(--charcoal);
            margin-bottom: 2rem;
            opacity: 0;
            animation: fadeInUp 0.8s ease-out 0.5s forwards;
        }

        .hero p {
            font-size: 1.15rem;
            line-height: 1.8;
            color: var(--warm-gray);
            max-width: 500px;
            margin-bottom: 3rem;
            opacity: 0;
            animation: fadeInUp 0.8s ease-out 0.6s forwards;
        }

        .hero-cta {
            display: inline-flex;
            gap: 2rem;
            opacity: 0;
            animation: fadeInUp 0.8s ease-out 0.7s forwards;
        }

        .btn-primary {
            background: var(--burgundy);
            color: var(--cream);
            padding: 1rem 2.5rem;
            text-decoration: none;
            font-weight: 500;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            border: 2px solid var(--burgundy);
        }

        .btn-primary:hover {
            background: var(--burgundy-dark);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(139, 38, 53, 0.25);
        }

        .btn-secondary {
            background: transparent;
            color: var(--charcoal);
            padding: 1rem 2.5rem;
            text-decoration: none;
            font-weight: 500;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            font-size: 0.9rem;
            border: 2px solid var(--charcoal);
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background: var(--charcoal);
            color: var(--cream);
            transform: translateY(-2px);
        }

        .hero-image {
            position: relative;
            opacity: 0;
            animation: fadeInRight 1s ease-out 0.6s forwards;
        }

        .hero-image-stack {
            position: relative;
            height: 500px;
        }

        .hero-book-card {
            position: absolute;
            background: white;
            box-shadow: 0 20px 60px rgba(0,0,0,0.15);
            padding: 2rem;
            width: 280px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hero-book-card:hover {
            transform: translateY(-10px) !important;
            box-shadow: 0 30px 80px rgba(0,0,0,0.2);
        }

        .hero-book-card:nth-child(1) {
            top: 0;
            left: 0;
            transform: rotate(-3deg);
            z-index: 3;
        }

        .hero-book-card:nth-child(2) {
            top: 60px;
            right: 0;
            transform: rotate(5deg);
            z-index: 2;
        }

        .hero-book-card:nth-child(3) {
            bottom: 0;
            left: 50px;
            transform: rotate(-2deg);
            z-index: 1;
        }

        .hero-book-cover {
            height: 200px;
            background: linear-gradient(135deg, var(--burgundy), var(--burgundy-dark));
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Playfair Display', serif;
            color: white;
            font-size: 1.2rem;
            text-align: center;
            padding: 1rem;
        }

        .hero-book-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--charcoal);
        }

        .hero-book-author {
            font-size: 0.85rem;
            color: var(--warm-gray);
        }

        /* Featured Books Section */
        .featured-section {
            max-width: 1400px;
            margin: 6rem auto;
            padding: 0 4rem;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            margin-bottom: 4rem;
            padding-bottom: 2rem;
            border-bottom: 1px solid rgba(26, 26, 26, 0.1);
        }

        .section-header h3 {
            font-family: 'Playfair Display', serif;
            font-size: 3rem;
            font-weight: 700;
            color: var(--charcoal);
        }

        .section-header a {
            color: var(--burgundy);
            text-decoration: none;
            font-size: 0.9rem;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: gap 0.3s ease;
        }

        .section-header a:hover {
            gap: 1rem;
        }

        .books-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 3rem;
        }

        .book-card {
            background: white;
            transition: all 0.4s ease;
            position: relative;
            cursor: pointer;
            animation: fadeInUp 0.6s ease-out backwards;
        }

        .book-card:nth-child(1) { animation-delay: 0.1s; }
        .book-card:nth-child(2) { animation-delay: 0.2s; }
        .book-card:nth-child(3) { animation-delay: 0.3s; }
        .book-card:nth-child(4) { animation-delay: 0.4s; }
        .book-card:nth-child(5) { animation-delay: 0.5s; }
        .book-card:nth-child(6) { animation-delay: 0.6s; }
        .book-card:nth-child(7) { animation-delay: 0.7s; }
        .book-card:nth-child(8) { animation-delay: 0.8s; }

        .book-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 30px 80px rgba(0,0,0,0.15);
        }

        .book-cover {
            height: 380px;
            background: linear-gradient(135deg, var(--warm-gray), var(--charcoal));
            position: relative;
            overflow: hidden;
            margin-bottom: 1.5rem;
        }

        .book-cover::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, transparent 60%, rgba(0,0,0,0.4));
        }

        .book-year {
            position: absolute;
            bottom: 1rem;
            right: 1rem;
            background: rgba(255,255,255,0.9);
            padding: 0.3rem 0.8rem;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.05em;
            z-index: 2;
        }

        .book-info {
            padding: 0 1.5rem 1.5rem;
        }

        .book-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--charcoal);
            line-height: 1.3;
            min-height: 2.6rem;
        }

        .book-author {
            font-size: 0.9rem;
            color: var(--warm-gray);
            margin-bottom: 1rem;
        }

        .book-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1rem;
            border-top: 1px solid rgba(26, 26, 26, 0.06);
        }

        .book-pages {
            font-size: 0.8rem;
            color: var(--warm-gray);
            letter-spacing: 0.03em;
        }

        .book-country {
            font-size: 0.75rem;
            color: var(--burgundy);
            letter-spacing: 0.05em;
            text-transform: uppercase;
            font-weight: 500;
        }

        .add-to-cart {
            margin-top: 1rem;
            width: 100%;
            background: var(--charcoal);
            color: var(--cream);
            border: none;
            padding: 0.9rem;
            cursor: pointer;
            font-family: 'IBM Plex Sans', sans-serif;
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            transition: all 0.3s ease;
            opacity: 0;
        }

        .book-card:hover .add-to-cart {
            opacity: 1;
        }

        .add-to-cart:hover {
            background: var(--burgundy);
        }

        /* Categories Section */
        .categories-section {
            background: var(--charcoal);
            color: var(--cream);
            padding: 6rem 0;
            position: relative;
        }

        .categories-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, transparent, var(--burgundy), transparent);
        }

        .categories-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 4rem;
        }

        .categories-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 2rem;
            margin-top: 3rem;
        }

        .category-card {
            background: rgba(251, 248, 243, 0.05);
            border: 1px solid rgba(251, 248, 243, 0.1);
            padding: 2.5rem 1.5rem;
            text-align: center;
            text-decoration: none;
            color: var(--cream);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .category-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--burgundy);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .category-card:hover {
            background: rgba(251, 248, 243, 0.1);
            border-color: var(--burgundy);
            transform: translateY(-5px);
        }

        .category-card:hover::before {
            transform: scaleX(1);
        }

        .category-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            display: block;
        }

        .category-name {
            font-size: 0.9rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            font-weight: 500;
        }

        /* Newsletter Section */
        .newsletter-section {
            background: var(--burgundy);
            color: var(--cream);
            padding: 5rem 0;
            position: relative;
            overflow: hidden;
        }

        .newsletter-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 0 4rem;
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .newsletter-section h3 {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .newsletter-section p {
            font-size: 1.1rem;
            margin-bottom: 2.5rem;
            opacity: 0.9;
        }

        .newsletter-form {
            display: flex;
            gap: 1rem;
            max-width: 600px;
            margin: 0 auto;
        }

        .newsletter-input {
            flex: 1;
            padding: 1.2rem 1.5rem;
            border: 2px solid rgba(251, 248, 243, 0.3);
            background: rgba(251, 248, 243, 0.1);
            color: var(--cream);
            font-family: 'IBM Plex Sans', sans-serif;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .newsletter-input::placeholder {
            color: rgba(251, 248, 243, 0.5);
        }

        .newsletter-input:focus {
            outline: none;
            border-color: var(--cream);
            background: rgba(251, 248, 243, 0.15);
        }

        .newsletter-btn {
            background: var(--charcoal);
            color: var(--cream);
            border: none;
            padding: 1.2rem 2.5rem;
            cursor: pointer;
            font-family: 'IBM Plex Sans', sans-serif;
            font-size: 0.9rem;
            font-weight: 500;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            transition: all 0.3s ease;
        }

        .newsletter-btn:hover {
            background: var(--cream);
            color: var(--burgundy);
            transform: translateY(-2px);
        }

        /* Footer */
        footer {
            background: var(--charcoal);
            color: var(--cream);
            padding: 4rem 0 2rem;
        }

        .footer-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 4rem;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 4rem;
            margin-bottom: 3rem;
        }

        .footer-brand h4 {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-style: italic;
            margin-bottom: 1rem;
        }

        .footer-brand p {
            font-size: 0.95rem;
            line-height: 1.7;
            color: rgba(251, 248, 243, 0.7);
            max-width: 350px;
        }

        .footer-column h5 {
            font-size: 0.85rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            margin-bottom: 1.5rem;
            font-weight: 600;
        }

        .footer-column ul {
            list-style: none;
        }

        .footer-column li {
            margin-bottom: 0.8rem;
        }

        .footer-column a {
            color: rgba(251, 248, 243, 0.7);
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .footer-column a:hover {
            color: var(--light-gold);
        }

        .footer-bottom {
            padding-top: 2rem;
            border-top: 1px solid rgba(251, 248, 243, 0.1);
            text-align: center;
            color: rgba(251, 248, 243, 0.5);
            font-size: 0.85rem;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .books-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .categories-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 768px) {
            nav {
                padding: 1.5rem 2rem;
            }

            .hero {
                grid-template-columns: 1fr;
                padding: 4rem 2rem;
            }

            .hero h2 {
                font-size: 3rem;
            }

            .hero-image {
                display: none;
            }

            .books-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 2rem;
            }

            .categories-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .footer-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <nav>
            <div class="logo">
                <div class="logo-icon"></div>
                <h1>Bookoo</h1>
            </div>
            <div class="nav-links">
                <a href="#">Collections</a>
                <a href="#">New Arrivals</a>
                <a href="#">Classics</a>
                <a href="#">About</a>
                <button class="cart-btn">Cart (0)</button>
            </div>
        </nav>
    </header>

    <!-- Featured Books Section -->
    <section id="featured" class="featured-section">
        <div class="section-header">
            <h3>Featured Classics</h3>
            <a href="#">View All →</a>
        </div>
        <div class="books-grid">
            <div class="book-card">
                <div class="book-cover">
                    <div class="book-year">1958</div>
                </div>
                <div class="book-info">
                    <h4 class="book-title">Things Fall Apart</h4>
                    <p class="book-author">Chinua Achebe</p>
                    <div class="book-meta">
                        <span class="book-pages">209 pages</span>
                        <span class="book-country">Nigeria</span>
                    </div>
                    <button class="add-to-cart">Add to Collection</button>
                </div>
            </div>

            <div class="book-card">
                <div class="book-cover">
                    <div class="book-year">1813</div>
                </div>
                <div class="book-info">
                    <h4 class="book-title">Pride and Prejudice</h4>
                    <p class="book-author">Jane Austen</p>
                    <div class="book-meta">
                        <span class="book-pages">226 pages</span>
                        <span class="book-country">UK</span>
                    </div>
                    <button class="add-to-cart">Add to Collection</button>
                </div>
            </div>

            <div class="book-card">
                <div class="book-cover">
                    <div class="book-year">1967</div>
                </div>
                <div class="book-info">
                    <h4 class="book-title">One Hundred Years of Solitude</h4>
                    <p class="book-author">Gabriel García Márquez</p>
                    <div class="book-meta">
                        <span class="book-pages">417 pages</span>
                        <span class="book-country">Colombia</span>
                    </div>
                    <button class="add-to-cart">Add to Collection</button>
                </div>
            </div>

            <div class="book-card">
                <div class="book-cover">
                    <div class="book-year">1866</div>
                </div>
                <div class="book-info">
                    <h4 class="book-title">Crime and Punishment</h4>
                    <p class="book-author">Fyodor Dostoevsky</p>
                    <div class="book-meta">
                        <span class="book-pages">551 pages</span>
                        <span class="book-country">Russia</span>
                    </div>
                    <button class="add-to-cart">Add to Collection</button>
                </div>
            </div>

            <div class="book-card">
                <div class="book-cover">
                    <div class="book-year">1922</div>
                </div>
                <div class="book-info">
                    <h4 class="book-title">Ulysses</h4>
                    <p class="book-author">James Joyce</p>
                    <div class="book-meta">
                        <span class="book-pages">228 pages</span>
                        <span class="book-country">Ireland</span>
                    </div>
                    <button class="add-to-cart">Add to Collection</button>
                </div>
            </div>

            <div class="book-card">
                <div class="book-cover">
                    <div class="book-year">1851</div>
                </div>
                <div class="book-info">
                    <h4 class="book-title">Moby Dick</h4>
                    <p class="book-author">Herman Melville</p>
                    <div class="book-meta">
                        <span class="book-pages">378 pages</span>
                        <span class="book-country">USA</span>
                    </div>
                    <button class="add-to-cart">Add to Collection</button>
                </div>
            </div>

            <div class="book-card">
                <div class="book-cover">
                    <div class="book-year">1925</div>
                </div>
                <div class="book-info">
                    <h4 class="book-title">Mrs Dalloway</h4>
                    <p class="book-author">Virginia Woolf</p>
                    <div class="book-meta">
                        <span class="book-pages">216 pages</span>
                        <span class="book-country">UK</span>
                    </div>
                    <button class="add-to-cart">Add to Collection</button>
                </div>
            </div>

            <div class="book-card">
                <div class="book-cover">
                    <div class="book-year">1987</div>
                </div>
                <div class="book-info">
                    <h4 class="book-title">Beloved</h4>
                    <p class="book-author">Toni Morrison</p>
                    <div class="book-meta">
                        <span class="book-pages">321 pages</span>
                        <span class="book-country">USA</span>
                    </div>
                    <button class="add-to-cart">Add to Collection</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section id="categories" class="categories-section">
        <div class="categories-container">
            <div class="section-header">
                <h3>Browse by Era & Origin</h3>
            </div>
            <div class="categories-grid">
                <a href="#" class="category-card">
                    <span class="category-icon">📖</span>
                    <div class="category-name">Ancient Texts</div>
                </a>
                <a href="#" class="category-card">
                    <span class="category-icon">🏛️</span>
                    <div class="category-name">Classical</div>
                </a>
                <a href="#" class="category-card">
                    <span class="category-icon">✒️</span>
                    <div class="category-name">Renaissance</div>
                </a>
                <a href="#" class="category-card">
                    <span class="category-icon">🎭</span>
                    <div class="category-name">Modern Drama</div>
                </a>
                <a href="#" class="category-card">
                    <span class="category-icon">🌍</span>
                    <div class="category-name">World Literature</div>
                </a>
                <a href="#" class="category-card">
                    <span class="category-icon">📚</span>
                    <div class="category-name">Contemporary</div>
                </a>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="newsletter-section">
        <div class="newsletter-container">
            <h3>Join Our Literary Circle</h3>
            <p>Receive curated recommendations, author insights, and exclusive offers delivered to your inbox monthly.</p>
            <form class="newsletter-form">
                <input type="email" class="newsletter-input" placeholder="Enter your email address" required>
                <button type="submit" class="newsletter-btn">Subscribe</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <h4>Bookoo</h4>
                    <p>A curated collection of the world's finest literary works. We believe in the transformative power of great books and the enduring wisdom they contain.</p>
                </div>
                <div class="footer-column">
                    <h5>Discover</h5>
                    <ul>
                        <li><a href="#">New Arrivals</a></li>
                        <li><a href="#">Best Sellers</a></li>
                        <li><a href="#">Staff Picks</a></li>
                        <li><a href="#">Gift Guide</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h5>About</h5>
                    <ul>
                        <li><a href="#">Our Story</a></li>
                        <li><a href="#">Mission</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Careers</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h5>Help</h5>
                    <ul>
                        <li><a href="#">Shipping</a></li>
                        <li><a href="#">Returns</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Privacy</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 Bookoo. Celebrating literary excellence since 2025.</p>
            </div>
        </div>
    </footer>
</body>
</html>
