<?php
// PHP 8.2 Portfolio — Panchal Dhairya
$name = "Panchal Dhairya";
$title = "Full-Stack Developer";
$php_version = phpversion();
$year = date('Y');

$skills = [
    ["name" => "PHP 8.2", "level" => 92, "color" => "#00f5ff"],
    ["name" => "MySQL / MariaDB", "level" => 88, "color" => "#f5a623"],
    ["name" => "JavaScript / Node.js", "level" => 85, "color" => "#00f5ff"],
    ["name" => "Laravel / Symfony", "level" => 80, "color" => "#f5a623"],
    ["name" => "Docker / DevOps", "level" => 75, "color" => "#00f5ff"],
    ["name" => "REST APIs", "level" => 90, "color" => "#f5a623"],
];

$projects = [
    [
        "title" => "CI/CD DevOps Pipeline",
        "desc" => "Automated Jenkins → GitHub → Azure App Service pipeline on RHEL 9 with zero-downtime deployments.",
        "tags" => ["Jenkins", "Azure", "RHEL 9", "Bash"],
        "icon" => "⚙️"
    ],
    [
        "title" => "PHP 8.2 REST API",
        "desc" => "High-performance RESTful API with JWT authentication, rate limiting, and OpenAPI documentation.",
        "tags" => ["PHP 8.2", "MySQL", "JWT", "Docker"],
        "icon" => "🔗"
    ],
    [
        "title" => "Real-Time Dashboard",
        "desc" => "Live analytics dashboard with WebSocket data streams, Chart.js visualizations, and role-based access.",
        "tags" => ["PHP", "WebSockets", "Chart.js", "Redis"],
        "icon" => "📊"
    ],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $name ?> — Portfolio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Share+Tech+Mono&family=Sora:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --cyan: #00f5ff;
            --amber: #f5a623;
            --bg: #020812;
            --bg2: #050f1f;
            --bg3: #071628;
            --glass: rgba(0, 245, 255, 0.04);
            --border: rgba(0, 245, 255, 0.15);
            --text: #c8dff0;
            --dim: #4a6a85;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        html { scroll-behavior: smooth; }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: 'Sora', sans-serif;
            overflow-x: hidden;
            cursor: none;
        }

        /* CUSTOM CURSOR */
        .cursor {
            position: fixed; width: 12px; height: 12px;
            background: var(--cyan); border-radius: 50%;
            pointer-events: none; z-index: 9999;
            transform: translate(-50%, -50%);
            transition: transform 0.1s, width 0.2s, height 0.2s, opacity 0.2s;
            mix-blend-mode: screen;
        }
        .cursor-ring {
            position: fixed; width: 36px; height: 36px;
            border: 1px solid var(--cyan); border-radius: 50%;
            pointer-events: none; z-index: 9998;
            transform: translate(-50%, -50%);
            transition: all 0.15s ease;
            opacity: 0.5;
        }

        /* GRID BG */
        body::before {
            content: '';
            position: fixed; inset: 0;
            background-image:
                linear-gradient(rgba(0,245,255,0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0,245,255,0.03) 1px, transparent 1px);
            background-size: 60px 60px;
            pointer-events: none; z-index: 0;
        }

        /* SCANLINE */
        body::after {
            content: '';
            position: fixed; inset: 0;
            background: repeating-linear-gradient(
                0deg,
                transparent,
                transparent 2px,
                rgba(0,0,0,0.08) 2px,
                rgba(0,0,0,0.08) 4px
            );
            pointer-events: none; z-index: 1;
        }

        /* NAV */
        nav {
            position: fixed; top: 0; left: 0; right: 0;
            z-index: 100;
            display: flex; align-items: center; justify-content: space-between;
            padding: 1.2rem 4rem;
            background: rgba(2, 8, 18, 0.85);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
        }
        .nav-logo {
            font-family: 'Orbitron', monospace;
            font-weight: 900; font-size: 1.1rem;
            color: var(--cyan);
            letter-spacing: 0.15em;
            text-shadow: 0 0 20px var(--cyan);
        }
        .nav-logo span { color: var(--amber); }
        .nav-links { display: flex; gap: 2.5rem; list-style: none; }
        .nav-links a {
            font-family: 'Share Tech Mono', monospace;
            font-size: 0.8rem; color: var(--dim);
            text-decoration: none; letter-spacing: 0.1em;
            text-transform: uppercase;
            transition: color 0.3s;
            position: relative;
        }
        .nav-links a::after {
            content: ''; position: absolute; left: 0; bottom: -4px;
            width: 0; height: 1px; background: var(--cyan);
            transition: width 0.3s;
        }
        .nav-links a:hover { color: var(--cyan); }
        .nav-links a:hover::after { width: 100%; }
        .nav-php {
            font-family: 'Share Tech Mono', monospace;
            font-size: 0.72rem; color: var(--amber);
            background: rgba(245,166,35,0.1);
            border: 1px solid rgba(245,166,35,0.3);
            padding: 0.3rem 0.8rem; border-radius: 2px;
        }

        /* SECTIONS */
        section { position: relative; z-index: 2; }

        /* HERO */
        .hero {
            min-height: 100vh;
            display: flex; align-items: center;
            padding: 8rem 4rem 4rem;
            position: relative; overflow: hidden;
        }
        .hero-glow {
            position: absolute;
            width: 600px; height: 600px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(0,245,255,0.08) 0%, transparent 70%);
            top: 50%; left: 60%; transform: translate(-50%, -50%);
            animation: pulse-glow 4s ease-in-out infinite;
        }
        .hero-glow-2 {
            position: absolute;
            width: 400px; height: 400px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(245,166,35,0.06) 0%, transparent 70%);
            top: 20%; left: 30%;
            animation: pulse-glow 6s ease-in-out infinite reverse;
        }
        @keyframes pulse-glow {
            0%, 100% { transform: translate(-50%, -50%) scale(1); opacity: 1; }
            50% { transform: translate(-50%, -50%) scale(1.1); opacity: 0.6; }
        }

        .hero-content { max-width: 700px; }
        .hero-tag {
            font-family: 'Share Tech Mono', monospace;
            font-size: 0.78rem; color: var(--amber);
            letter-spacing: 0.25em; text-transform: uppercase;
            margin-bottom: 1.5rem;
            display: flex; align-items: center; gap: 0.8rem;
        }
        .hero-tag::before {
            content: ''; display: block;
            width: 40px; height: 1px; background: var(--amber);
        }
        .hero-name {
            font-family: 'Orbitron', monospace;
            font-size: clamp(2.8rem, 6vw, 5rem);
            font-weight: 900; line-height: 1;
            color: #fff;
            text-shadow: 0 0 60px rgba(0,245,255,0.3);
            margin-bottom: 0.3rem;
            animation: glitch-flicker 8s infinite;
        }
        @keyframes glitch-flicker {
            0%, 94%, 100% { text-shadow: 0 0 60px rgba(0,245,255,0.3); }
            95% { text-shadow: -3px 0 var(--amber), 3px 0 var(--cyan), 0 0 60px rgba(0,245,255,0.3); }
            96% { text-shadow: 3px 0 var(--amber), -3px 0 var(--cyan), 0 0 60px rgba(0,245,255,0.3); }
            97% { text-shadow: 0 0 60px rgba(0,245,255,0.3); }
        }
        .hero-title-text {
            font-family: 'Orbitron', monospace;
            font-size: clamp(1rem, 2.5vw, 1.4rem);
            font-weight: 400; color: var(--cyan);
            letter-spacing: 0.2em;
            margin-bottom: 2rem;
        }
        .hero-desc {
            font-size: 1rem; color: var(--dim);
            line-height: 1.8; max-width: 520px;
            margin-bottom: 3rem;
        }
        .hero-desc strong { color: var(--text); }
        .hero-btns { display: flex; gap: 1.2rem; flex-wrap: wrap; }
        .btn-primary {
            font-family: 'Share Tech Mono', monospace;
            font-size: 0.85rem; letter-spacing: 0.1em; text-transform: uppercase;
            padding: 0.9rem 2rem;
            background: var(--cyan); color: var(--bg);
            border: none; border-radius: 2px;
            cursor: none; text-decoration: none;
            font-weight: bold;
            clip-path: polygon(0 0, calc(100% - 12px) 0, 100% 12px, 100% 100%, 0 100%);
            transition: all 0.3s;
            box-shadow: 0 0 30px rgba(0,245,255,0.3);
        }
        .btn-primary:hover {
            box-shadow: 0 0 60px rgba(0,245,255,0.6);
            transform: translateY(-2px);
        }
        .btn-ghost {
            font-family: 'Share Tech Mono', monospace;
            font-size: 0.85rem; letter-spacing: 0.1em; text-transform: uppercase;
            padding: 0.9rem 2rem;
            background: transparent; color: var(--cyan);
            border: 1px solid var(--border);
            border-radius: 2px; cursor: none; text-decoration: none;
            clip-path: polygon(12px 0, 100% 0, 100% calc(100% - 12px), calc(100% - 12px) 100%, 0 100%, 0 12px);
            transition: all 0.3s;
        }
        .btn-ghost:hover {
            background: var(--glass);
            border-color: var(--cyan);
            box-shadow: 0 0 20px rgba(0,245,255,0.1);
        }

        /* PHP VERSION BADGE */
        .php-badge {
            position: absolute; right: 6rem; top: 50%; transform: translateY(-50%);
            text-align: center;
        }
        .php-badge-inner {
            width: 180px; height: 180px;
            border: 1px solid var(--border);
            border-radius: 50%;
            display: flex; flex-direction: column;
            align-items: center; justify-content: center;
            background: var(--glass);
            backdrop-filter: blur(10px);
            animation: rotate-ring 12s linear infinite;
            position: relative;
        }
        .php-badge-inner::before {
            content: '';
            position: absolute; inset: -8px;
            border-radius: 50%;
            border: 1px dashed rgba(0,245,255,0.2);
            animation: rotate-ring 8s linear infinite reverse;
        }
        @keyframes rotate-ring {
            from { box-shadow: 0 0 30px rgba(0,245,255,0.1), inset 0 0 30px rgba(0,245,255,0.05); }
            50% { box-shadow: 0 0 50px rgba(0,245,255,0.2), inset 0 0 50px rgba(0,245,255,0.1); }
            to { box-shadow: 0 0 30px rgba(0,245,255,0.1), inset 0 0 30px rgba(0,245,255,0.05); }
        }
        .php-badge-label {
            font-family: 'Share Tech Mono', monospace;
            font-size: 0.65rem; color: var(--amber);
            letter-spacing: 0.2em; text-transform: uppercase;
        }
        .php-badge-version {
            font-family: 'Orbitron', monospace;
            font-size: 1.6rem; font-weight: 900; color: var(--cyan);
            text-shadow: 0 0 20px var(--cyan);
        }

        /* SHARED SECTION STYLES */
        .section-header {
            text-align: center; margin-bottom: 4rem;
        }
        .section-tag {
            font-family: 'Share Tech Mono', monospace;
            font-size: 0.72rem; color: var(--amber);
            letter-spacing: 0.3em; text-transform: uppercase;
            margin-bottom: 1rem; display: block;
        }
        .section-title {
            font-family: 'Orbitron', monospace;
            font-size: clamp(1.8rem, 4vw, 2.8rem);
            font-weight: 700; color: #fff;
        }
        .section-title span { color: var(--cyan); }
        .section-line {
            width: 60px; height: 2px;
            background: linear-gradient(90deg, var(--cyan), transparent);
            margin: 1.2rem auto 0;
        }

        /* ABOUT */
        .about { padding: 8rem 4rem; background: var(--bg2); }
        .about-grid {
            max-width: 1100px; margin: 0 auto;
            display: grid; grid-template-columns: 1fr 1fr; gap: 5rem;
            align-items: center;
        }
        .about-text p {
            color: var(--dim); line-height: 1.9; margin-bottom: 1.2rem;
        }
        .about-text strong { color: var(--text); }
        .about-stats {
            display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;
            margin-top: 2.5rem;
        }
        .stat-card {
            background: var(--glass);
            border: 1px solid var(--border);
            padding: 1.2rem; border-radius: 4px;
            position: relative; overflow: hidden;
        }
        .stat-card::before {
            content: ''; position: absolute; top: 0; left: 0;
            width: 3px; height: 100%; background: var(--cyan);
        }
        .stat-num {
            font-family: 'Orbitron', monospace;
            font-size: 2rem; font-weight: 900; color: var(--cyan);
            text-shadow: 0 0 20px rgba(0,245,255,0.4);
        }
        .stat-label {
            font-family: 'Share Tech Mono', monospace;
            font-size: 0.72rem; color: var(--dim);
            text-transform: uppercase; letter-spacing: 0.1em;
        }
        .terminal-box {
            background: #010810;
            border: 1px solid var(--border);
            border-radius: 6px; overflow: hidden;
            font-family: 'Share Tech Mono', monospace;
        }
        .terminal-bar {
            background: #0a1628;
            padding: 0.6rem 1rem;
            display: flex; align-items: center; gap: 0.5rem;
            border-bottom: 1px solid var(--border);
        }
        .t-dot { width: 10px; height: 10px; border-radius: 50%; }
        .t-red { background: #ff5f56; }
        .t-yellow { background: #ffbd2e; }
        .t-green { background: #27c93f; }
        .terminal-body { padding: 1.5rem; font-size: 0.82rem; line-height: 2; }
        .t-comment { color: #3a5a7a; }
        .t-key { color: var(--amber); }
        .t-val { color: var(--cyan); }
        .t-str { color: #98c379; }
        .t-cursor {
            display: inline-block; width: 8px; height: 14px;
            background: var(--cyan); vertical-align: middle;
            animation: blink 1s step-end infinite;
        }
        @keyframes blink { 50% { opacity: 0; } }

        /* SKILLS */
        .skills { padding: 8rem 4rem; }
        .skills-grid {
            max-width: 900px; margin: 0 auto;
            display: flex; flex-direction: column; gap: 1.8rem;
        }
        .skill-row { display: flex; flex-direction: column; gap: 0.5rem; }
        .skill-meta {
            display: flex; justify-content: space-between;
            align-items: center;
        }
        .skill-name {
            font-family: 'Share Tech Mono', monospace;
            font-size: 0.85rem; color: var(--text);
            letter-spacing: 0.05em;
        }
        .skill-pct {
            font-family: 'Orbitron', monospace;
            font-size: 0.75rem; font-weight: 700;
        }
        .skill-bar-track {
            height: 4px; background: rgba(255,255,255,0.05);
            border-radius: 2px; overflow: hidden;
            position: relative;
        }
        .skill-bar-fill {
            height: 100%; border-radius: 2px;
            position: relative;
            animation: skill-load 1.5s cubic-bezier(0.16,1,0.3,1) both;
        }
        .skill-bar-fill::after {
            content: ''; position: absolute; right: 0; top: -2px;
            width: 8px; height: 8px; border-radius: 50%;
            background: inherit;
            box-shadow: 0 0 10px currentColor;
        }
        @keyframes skill-load { from { width: 0; } }

        /* PROJECTS */
        .projects { padding: 8rem 4rem; background: var(--bg2); }
        .projects-grid {
            max-width: 1100px; margin: 0 auto;
            display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 1.5rem;
        }
        .project-card {
            background: var(--glass);
            border: 1px solid var(--border);
            border-radius: 4px; padding: 2rem;
            position: relative; overflow: hidden;
            transition: all 0.4s cubic-bezier(0.16,1,0.3,1);
            cursor: none;
        }
        .project-card::before {
            content: ''; position: absolute;
            top: -50%; left: -50%;
            width: 200%; height: 200%;
            background: radial-gradient(circle at center, rgba(0,245,255,0.04) 0%, transparent 60%);
            opacity: 0; transition: opacity 0.4s;
        }
        .project-card:hover {
            border-color: rgba(0,245,255,0.4);
            transform: translateY(-4px);
            box-shadow: 0 20px 60px rgba(0,0,0,0.4), 0 0 30px rgba(0,245,255,0.05);
        }
        .project-card:hover::before { opacity: 1; }
        .project-corner {
            position: absolute; top: 0; right: 0;
            width: 0; height: 0;
            border-style: solid;
            border-width: 0 30px 30px 0;
            border-color: transparent var(--cyan) transparent transparent;
            opacity: 0.4; transition: opacity 0.3s;
        }
        .project-card:hover .project-corner { opacity: 1; }
        .project-icon { font-size: 2rem; margin-bottom: 1rem; }
        .project-title {
            font-family: 'Orbitron', monospace;
            font-size: 1rem; font-weight: 700;
            color: #fff; margin-bottom: 0.8rem;
        }
        .project-desc {
            font-size: 0.88rem; color: var(--dim);
            line-height: 1.7; margin-bottom: 1.5rem;
        }
        .project-tags { display: flex; flex-wrap: wrap; gap: 0.5rem; }
        .tag {
            font-family: 'Share Tech Mono', monospace;
            font-size: 0.68rem; letter-spacing: 0.08em;
            padding: 0.2rem 0.6rem;
            background: rgba(0,245,255,0.06);
            border: 1px solid rgba(0,245,255,0.2);
            border-radius: 2px; color: var(--cyan);
        }

        /* CONTACT */
        .contact { padding: 8rem 4rem; text-align: center; }
        .contact-inner { max-width: 600px; margin: 0 auto; }
        .contact-desc {
            color: var(--dim); font-size: 1rem;
            line-height: 1.8; margin-bottom: 3rem;
        }
        .contact-links {
            display: flex; justify-content: center;
            gap: 1rem; flex-wrap: wrap; margin-top: 2rem;
        }
        .contact-link {
            font-family: 'Share Tech Mono', monospace;
            font-size: 0.78rem; letter-spacing: 0.1em;
            color: var(--dim); text-decoration: none;
            padding: 0.6rem 1.2rem;
            border: 1px solid var(--border); border-radius: 2px;
            transition: all 0.3s;
            display: flex; align-items: center; gap: 0.5rem;
        }
        .contact-link:hover {
            color: var(--cyan); border-color: var(--cyan);
            background: var(--glass);
        }

        /* FOOTER */
        footer {
            border-top: 1px solid var(--border);
            padding: 2rem 4rem;
            display: flex; justify-content: space-between; align-items: center;
            position: relative; z-index: 2;
        }
        .footer-copy {
            font-family: 'Share Tech Mono', monospace;
            font-size: 0.72rem; color: var(--dim);
        }
        .footer-php {
            font-family: 'Share Tech Mono', monospace;
            font-size: 0.72rem; color: var(--amber);
        }

        /* PARTICLES */
        #particles { position: fixed; inset: 0; pointer-events: none; z-index: 1; }

        /* ANIMATIONS */
        .fade-up {
            opacity: 0; transform: translateY(30px);
            animation: fade-up 0.8s cubic-bezier(0.16,1,0.3,1) forwards;
        }
        @keyframes fade-up {
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 768px) {
            nav { padding: 1rem 1.5rem; }
            .nav-links { display: none; }
            .hero { padding: 6rem 1.5rem 3rem; flex-direction: column; }
            .php-badge { position: static; transform: none; margin-top: 3rem; }
            .about { padding: 5rem 1.5rem; }
            .about-grid { grid-template-columns: 1fr; gap: 3rem; }
            .skills, .projects, .contact { padding: 5rem 1.5rem; }
            footer { flex-direction: column; gap: 0.5rem; text-align: center; }
        }
    </style>
</head>
<body>

<!-- Custom Cursor -->
<div class="cursor" id="cursor"></div>
<div class="cursor-ring" id="cursorRing"></div>

<!-- Particles Canvas -->
<canvas id="particles"></canvas>

<!-- NAV -->
<nav>
    <div class="nav-logo">PD<span>.</span>DEV</div>
    <ul class="nav-links">
        <li><a href="#about">About</a></li>
        <li><a href="#skills">Skills</a></li>
        <li><a href="#projects">Projects</a></li>
        <li><a href="#contact">Contact</a></li>
    </ul>
    <div class="nav-php">PHP <?= htmlspecialchars($php_version) ?></div>
</nav>

<!-- HERO -->
<section class="hero" id="home">
    <div class="hero-glow"></div>
    <div class="hero-glow-2"></div>

    <div class="hero-content">
        <div class="hero-tag fade-up" style="animation-delay:0.1s">Full-Stack Developer</div>
        <h1 class="hero-name fade-up" style="animation-delay:0.2s"><?= $name ?></h1>
        <div class="hero-title-text fade-up" style="animation-delay:0.35s">Building Tomorrow's Web</div>
        <p class="hero-desc fade-up" style="animation-delay:0.45s">
            Crafting <strong>high-performance</strong> web applications with <strong>PHP 8.2</strong>, 
            modern DevOps pipelines, and scalable backend architectures. 
            From code to cloud — automated, tested, deployed.
        </p>
        <div class="hero-btns fade-up" style="animation-delay:0.55s">
            <a href="#projects" class="btn-primary">View Projects</a>
            <a href="#contact" class="btn-ghost">Get In Touch</a>
        </div>
    </div>

    <div class="php-badge fade-up" style="animation-delay:0.7s">
        <div class="php-badge-inner">
            <div class="php-badge-label">Running</div>
            <div class="php-badge-version"><?= htmlspecialchars($php_version) ?></div>
            <div class="php-badge-label" style="color:var(--text)">PHP</div>
        </div>
    </div>
</section>

<!-- ABOUT -->
<section class="about" id="about">
    <div class="section-header">
        <span class="section-tag">// 01 — about</span>
        <h2 class="section-title">Who <span>I Am</span></h2>
        <div class="section-line"></div>
    </div>
    <div class="about-grid">
        <div class="about-text">
            <p>I'm <strong>Panchal Dhairya</strong>, a passionate full-stack developer obsessed with clean code, elegant architectures, and automated everything.</p>
            <p>My stack centers around <strong>PHP 8.2</strong> — leveraging fibers, readonly properties, enums, and intersection types to build APIs and platforms that don't just work, they <strong>scale</strong>.</p>
            <p>When I'm not writing backend logic, I'm automating deployment pipelines with <strong>Jenkins</strong>, shipping containers with <strong>Docker</strong>, and deploying to the cloud with <strong>Azure</strong>.</p>
            <div class="about-stats">
                <div class="stat-card">
                    <div class="stat-num">8.2</div>
                    <div class="stat-label">PHP Version</div>
                </div>
                <div class="stat-card">
                    <div class="stat-num">3+</div>
                    <div class="stat-label">Years Coding</div>
                </div>
                <div class="stat-card">
                    <div class="stat-num">15+</div>
                    <div class="stat-label">Projects Built</div>
                </div>
                <div class="stat-card">
                    <div class="stat-num">∞</div>
                    <div class="stat-label">Coffee Consumed</div>
                </div>
            </div>
        </div>
        <div>
            <div class="terminal-box">
                <div class="terminal-bar">
                    <div class="t-dot t-red"></div>
                    <div class="t-dot t-yellow"></div>
                    <div class="t-dot t-green"></div>
                    <span style="font-family:'Share Tech Mono',monospace;font-size:0.72rem;color:var(--dim);margin-left:0.5rem">portfolio.php</span>
                </div>
                <div class="terminal-body">
                    <div><span class="t-comment">// Developer Profile</span></div>
                    <div><span class="t-key">$dev</span> = [</div>
                    <div>&nbsp;&nbsp;<span class="t-str">'name'</span> &nbsp;&nbsp;&nbsp;&nbsp;=> <span class="t-val">'<?= $name ?>'</span>,</div>
                    <div>&nbsp;&nbsp;<span class="t-str">'role'</span> &nbsp;&nbsp;&nbsp;&nbsp;=> <span class="t-val">'Full-Stack Dev'</span>,</div>
                    <div>&nbsp;&nbsp;<span class="t-str">'php'</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=> <span class="t-val">'<?= $php_version ?>'</span>,</div>
                    <div>&nbsp;&nbsp;<span class="t-str">'location'</span> => <span class="t-val">'India 🇮🇳'</span>,</div>
                    <div>&nbsp;&nbsp;<span class="t-str">'open'</span> &nbsp;&nbsp;&nbsp;&nbsp;=> <span class="t-val">true</span>,</div>
                    <div>];</div>
                    <br>
                    <div><span class="t-comment">// <?= date('D, d M Y H:i:s') ?></span></div>
                    <div><span class="t-key">echo</span> <span class="t-str">"Ready to build!"</span>; <span class="t-cursor"></span></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SKILLS -->
<section class="skills" id="skills">
    <div class="section-header">
        <span class="section-tag">// 02 — skills</span>
        <h2 class="section-title">Tech <span>Arsenal</span></h2>
        <div class="section-line"></div>
    </div>
    <div class="skills-grid">
        <?php foreach ($skills as $i => $skill): ?>
        <div class="skill-row" style="animation: fade-up 0.6s <?= $i * 0.1 ?>s both">
            <div class="skill-meta">
                <span class="skill-name"><?= htmlspecialchars($skill['name']) ?></span>
                <span class="skill-pct" style="color:<?= $skill['color'] ?>"><?= $skill['level'] ?>%</span>
            </div>
            <div class="skill-bar-track">
                <div class="skill-bar-fill" style="width:<?= $skill['level'] ?>%;background:linear-gradient(90deg,<?= $skill['color'] ?>88,<?= $skill['color'] ?>);animation-delay:<?= $i * 0.12 ?>s"></div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- PROJECTS -->
<section class="projects" id="projects">
    <div class="section-header">
        <span class="section-tag">// 03 — projects</span>
        <h2 class="section-title">What I've <span>Built</span></h2>
        <div class="section-line"></div>
    </div>
    <div class="projects-grid">
        <?php foreach ($projects as $i => $proj): ?>
        <div class="project-card" style="animation: fade-up 0.7s <?= $i * 0.15 ?>s both">
            <div class="project-corner"></div>
            <div class="project-icon"><?= $proj['icon'] ?></div>
            <div class="project-title"><?= htmlspecialchars($proj['title']) ?></div>
            <div class="project-desc"><?= htmlspecialchars($proj['desc']) ?></div>
            <div class="project-tags">
                <?php foreach ($proj['tags'] as $tag): ?>
                <span class="tag"><?= htmlspecialchars($tag) ?></span>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- CONTACT -->
<section class="contact" id="contact">
    <div class="section-header">
        <span class="section-tag">// 04 — contact</span>
        <h2 class="section-title">Let's <span>Connect</span></h2>
        <div class="section-line"></div>
    </div>
    <div class="contact-inner">
        <p class="contact-desc">
            Open to freelance projects, collaborations, and full-time opportunities. 
            Let's build something remarkable together.
        </p>
        <a href="mailto:dhairya@example.com" class="btn-primary" style="display:inline-block">
            Send a Message →
        </a>
        <div class="contact-links">
            <a href="https://github.com/hsjadeja-7117" class="contact-link" target="_blank">
                <span>⌥</span> GitHub
            </a>
            <a href="#" class="contact-link">
                <span>in</span> LinkedIn
            </a>
            <a href="#" class="contact-link">
                <span>↗</span> Resume
            </a>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer>
    <div class="footer-copy">© <?= $year ?> <?= $name ?>. All rights reserved.</div>
    <div class="footer-php">PHP <?= htmlspecialchars($php_version) ?> · <?= date('Y-m-d') ?></div>
</footer>

<script>
// CURSOR
const cursor = document.getElementById('cursor');
const ring = document.getElementById('cursorRing');
let mx = 0, my = 0, rx = 0, ry = 0;
document.addEventListener('mousemove', e => { mx = e.clientX; my = e.clientY; });
function animCursor() {
    cursor.style.left = mx + 'px'; cursor.style.top = my + 'px';
    rx += (mx - rx) * 0.12; ry += (my - ry) * 0.12;
    ring.style.left = rx + 'px'; ring.style.top = ry + 'px';
    requestAnimationFrame(animCursor);
}
animCursor();
document.querySelectorAll('a, button, .project-card').forEach(el => {
    el.addEventListener('mouseenter', () => { cursor.style.width = '20px'; cursor.style.height = '20px'; ring.style.transform = 'translate(-50%,-50%) scale(1.5)'; });
    el.addEventListener('mouseleave', () => { cursor.style.width = '12px'; cursor.style.height = '12px'; ring.style.transform = 'translate(-50%,-50%) scale(1)'; });
});

// PARTICLES
const canvas = document.getElementById('particles');
const ctx = canvas.getContext('2d');
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;
window.addEventListener('resize', () => { canvas.width = window.innerWidth; canvas.height = window.innerHeight; });
const pts = Array.from({length: 60}, () => ({
    x: Math.random() * canvas.width, y: Math.random() * canvas.height,
    vx: (Math.random() - 0.5) * 0.3, vy: (Math.random() - 0.5) * 0.3,
    r: Math.random() * 1.5 + 0.5
}));
function drawParticles() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    pts.forEach(p => {
        p.x += p.vx; p.y += p.vy;
        if (p.x < 0) p.x = canvas.width; if (p.x > canvas.width) p.x = 0;
        if (p.y < 0) p.y = canvas.height; if (p.y > canvas.height) p.y = 0;
        ctx.beginPath(); ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
        ctx.fillStyle = 'rgba(0,245,255,0.4)'; ctx.fill();
    });
    pts.forEach((a, i) => pts.slice(i+1).forEach(b => {
        const d = Math.hypot(a.x - b.x, a.y - b.y);
        if (d < 120) {
            ctx.beginPath(); ctx.moveTo(a.x, a.y); ctx.lineTo(b.x, b.y);
            ctx.strokeStyle = `rgba(0,245,255,${0.08 * (1 - d/120)})`; ctx.lineWidth = 0.5; ctx.stroke();
        }
    }));
    requestAnimationFrame(drawParticles);
}
drawParticles();

// SCROLL REVEAL
const obs = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) { e.target.style.animationPlayState = 'running'; } });
}, { threshold: 0.1 });
document.querySelectorAll('.skill-row, .project-card').forEach(el => {
    el.style.animationPlayState = 'paused'; obs.observe(el);
});
</script>
</body>
</html>
