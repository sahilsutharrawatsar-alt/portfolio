<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sahil Suthar | Laravel Developer Portfolio</title>
    <meta name="description"
        content="Portfolio of Sahil Suthar, a PHP Laravel Developer from Rajasthan with 2.6 years of experience.">
    <style>
        :root {
            --bg: #08111f;
            --bg-soft: #101c2f;
            --surface: rgba(10, 20, 37, 0.72);
            --surface-strong: rgba(15, 27, 47, 0.92);
            --line: rgba(255, 255, 255, 0.09);
            --text: #f4efe6;
            --muted: #c8c0b5;
            --primary: #ffb347;
            --primary-deep: #f07a32;
            --accent: #54d3c2;
            --accent-soft: #b8fff7;
            --shadow: 0 24px 70px rgba(0, 0, 0, 0.3);
            --radius-xl: 28px;
            --radius-lg: 22px;
            --radius-md: 16px;
            --container: 1180px;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 5.5rem;
        }

        body {
            margin: 0;
            font-family: "Aptos", "Trebuchet MS", "Segoe UI", sans-serif;
            color: var(--text);
            background:
                radial-gradient(circle at top left, rgba(255, 179, 71, 0.18), transparent 28%),
                radial-gradient(circle at 80% 18%, rgba(84, 211, 194, 0.16), transparent 22%),
                radial-gradient(circle at bottom right, rgba(240, 122, 50, 0.18), transparent 26%),
                linear-gradient(140deg, #06101d 0%, #0e1d31 42%, #09121f 100%);
            min-height: 100vh;
            overflow-x: hidden;
        }

        body::before,
        body::after {
            content: "";
            position: fixed;
            inset: auto;
            width: 28rem;
            height: 28rem;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.2;
            z-index: -2;
            animation: drift 14s ease-in-out infinite;
        }

        body::before {
            top: -8rem;
            left: -8rem;
            background: #ff8a3d;
        }

        body::after {
            right: -10rem;
            bottom: -10rem;
            background: #0db7a7;
            animation-delay: -6s;
        }

        ::selection {
            background: rgba(255, 179, 71, 0.35);
            color: #fff8ee;
        }

        a {
            color: inherit;
            text-decoration: none;
            overflow-wrap: anywhere;
        }

        img {
            max-width: 100%;
            display: block;
        }

        .page-shell {
            position: relative;
            isolation: isolate;
        }

        .grid-overlay {
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(rgba(255, 255, 255, 0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.04) 1px, transparent 1px);
            background-size: 90px 90px;
            mask-image: radial-gradient(circle at center, black 34%, transparent 78%);
            z-index: -1;
            pointer-events: none;
        }

        .container {
            width: min(var(--container), calc(100% - 2rem));
            margin: 0 auto;
        }

        .site-header {
            position: sticky;
            top: 0;
            z-index: 30;
            backdrop-filter: blur(16px);
            background: rgba(5, 10, 18, 0.48);
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
        }

        .nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            padding: 1rem 0;
        }

        .nav-top {
            display: flex;
            align-items: center;
            gap: 1rem;
            flex-shrink: 0;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 0.9rem;
            font-family: "Iowan Old Style", "Palatino Linotype", serif;
            letter-spacing: 0.06em;
        }

        .brand-badge {
            width: 2.85rem;
            height: 2.85rem;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--primary-deep));
            color: #10131d;
            font-weight: 800;
            box-shadow: 0 10px 24px rgba(240, 122, 50, 0.35);
        }

        .brand-copy span {
            display: block;
        }

        .brand-copy span:first-child {
            font-size: 1rem;
            font-weight: 700;
        }

        .brand-copy span:last-child {
            font-size: 0.72rem;
            color: var(--muted);
            letter-spacing: 0.18em;
            text-transform: uppercase;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 1.2rem;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        .nav-links a {
            color: var(--muted);
            font-size: 0.96rem;
            transition: color 0.25s ease, transform 0.25s ease;
        }

        .nav-links a:hover,
        .nav-links a:focus-visible {
            color: var(--text);
            transform: translateY(-2px);
        }

        .nav-toggle {
            display: none;
            align-items: center;
            justify-content: center;
            width: 3rem;
            height: 3rem;
            padding: 0;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.04);
            color: var(--text);
            cursor: pointer;
            transition: background 0.25s ease, border-color 0.25s ease, transform 0.25s ease;
        }

        .nav-toggle:hover,
        .nav-toggle:focus-visible {
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 179, 71, 0.34);
            transform: translateY(-1px);
        }

        .nav-toggle-box {
            display: grid;
            gap: 0.28rem;
        }

        .nav-toggle-line {
            width: 1.2rem;
            height: 2px;
            border-radius: 999px;
            background: currentColor;
            transition: transform 0.25s ease, opacity 0.25s ease;
        }

        .nav-toggle[aria-expanded="true"] .nav-toggle-line:nth-child(1) {
            transform: translateY(0.4rem) rotate(45deg);
        }

        .nav-toggle[aria-expanded="true"] .nav-toggle-line:nth-child(2) {
            opacity: 0;
        }

        .nav-toggle[aria-expanded="true"] .nav-toggle-line:nth-child(3) {
            transform: translateY(-0.4rem) rotate(-45deg);
        }

        .hero {
            padding: 5.4rem 0 4rem;
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1.15fr 0.85fr;
            gap: 2rem;
            align-items: center;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 0.65rem;
            padding: 0.55rem 0.95rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.03);
            color: var(--accent-soft);
            font-size: 0.82rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .eyebrow::before {
            content: "";
            width: 0.55rem;
            height: 0.55rem;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            box-shadow: 0 0 0 0.38rem rgba(255, 179, 71, 0.12);
        }

        h1,
        h2,
        h3 {
            margin: 0;
            line-height: 1.06;
        }

        .hero h1 {
            margin-top: 1.4rem;
            font-size: clamp(3rem, 6vw, 5.5rem);
            font-family: "Iowan Old Style", "Palatino Linotype", serif;
        }

        .hero .accent {
            color: #ffd39a;
            text-shadow: 0 0 24px rgba(255, 179, 71, 0.22);
        }

        .hero p {
            margin: 1.5rem 0 0;
            max-width: 42rem;
            font-size: 1.08rem;
            line-height: 1.8;
            color: var(--muted);
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-top: 2rem;
        }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.65rem;
            min-height: 3.35rem;
            padding: 0.85rem 1.35rem;
            border-radius: 999px;
            border: 1px solid transparent;
            font-weight: 700;
            transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease, background 0.25s ease;
        }

        .button:hover,
        .button:focus-visible {
            transform: translateY(-2px);
        }

        .button-primary {
            color: #10131d;
            background: linear-gradient(135deg, var(--primary), #ffd785);
            box-shadow: 0 16px 34px rgba(255, 179, 71, 0.3);
        }

        .button-secondary {
            border-color: rgba(255, 255, 255, 0.12);
            background: rgba(255, 255, 255, 0.04);
            color: var(--text);
        }

        .button-secondary:hover,
        .button-secondary:focus-visible {
            border-color: rgba(255, 255, 255, 0.25);
            box-shadow: 0 14px 30px rgba(0, 0, 0, 0.22);
        }

        .hero-meta {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 1rem;
            margin-top: 2.3rem;
        }

        .meta-card,
        .panel,
        .card,
        .timeline-item,
        .contact-card {
            position: relative;
            overflow: hidden;
            border: 1px solid var(--line);
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.08), rgba(255, 255, 255, 0.03));
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow);
        }

        .meta-card {
            padding: 1.1rem 1rem;
        }

        .meta-card strong {
            display: block;
            font-size: 1.7rem;
            color: #fff7e6;
            margin-bottom: 0.2rem;
        }

        .meta-card span {
            color: var(--muted);
            font-size: 0.92rem;
        }

        .hero-visual {
            position: relative;
            min-height: 35rem;
        }

        .glow-ring,
        .orbit {
            position: absolute;
            inset: 50% auto auto 50%;
            transform: translate(-50%, -50%);
            border-radius: 50%;
        }

        .glow-ring {
            width: 24rem;
            height: 24rem;
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow:
                0 0 0 1px rgba(255, 179, 71, 0.08),
                inset 0 0 40px rgba(255, 179, 71, 0.08);
            animation: spin 18s linear infinite;
        }

        .glow-ring::before,
        .glow-ring::after {
            content: "";
            position: absolute;
            width: 1rem;
            height: 1rem;
            border-radius: 50%;
            top: 2.7rem;
            left: 50%;
            transform: translateX(-50%);
            background: var(--primary);
            box-shadow: 0 0 24px rgba(255, 179, 71, 0.8);
        }

        .glow-ring::after {
            top: auto;
            bottom: 2.7rem;
            background: var(--accent);
            box-shadow: 0 0 24px rgba(84, 211, 194, 0.75);
        }

        .panel {
            position: absolute;
            backdrop-filter: blur(14px);
        }

        .profile-panel {
            inset: auto 2rem 2.5rem auto;
            width: min(100%, 31rem);
            padding: 1.5rem;
            background:
                linear-gradient(180deg, rgba(255, 255, 255, 0.12), rgba(255, 255, 255, 0.04)),
                linear-gradient(135deg, rgba(255, 179, 71, 0.14), transparent 60%);
            animation: float 6s ease-in-out infinite;
        }

        .profile-panel::after,
        .meta-card::after,
        .card::after,
        .timeline-item::after,
        .contact-card::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, transparent, rgba(255, 255, 255, 0.05), transparent);
            transform: translateX(-100%);
            animation: sheen 8s linear infinite;
        }

        .profile-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }

        .profile-name {
            font-size: 1.55rem;
            font-family: "Iowan Old Style", "Palatino Linotype", serif;
        }

        .profile-role {
            margin-top: 0.3rem;
            color: var(--muted);
        }

        .availability {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            padding: 0.55rem 0.9rem;
            border-radius: 999px;
            background: rgba(84, 211, 194, 0.12);
            color: var(--accent-soft);
            font-size: 0.85rem;
        }

        .availability::before {
            content: "";
            width: 0.5rem;
            height: 0.5rem;
            border-radius: 50%;
            background: #7dffcb;
            box-shadow: 0 0 0 0.3rem rgba(125, 255, 203, 0.12);
        }

        .profile-stats {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 0.9rem;
            margin-top: 1.4rem;
        }

        .mini-card {
            padding: 1rem;
            border-radius: var(--radius-md);
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.06);
        }

        .mini-card strong {
            display: block;
            font-size: 1.4rem;
            color: #fff2dc;
        }

        .mini-card span {
            display: block;
            margin-top: 0.25rem;
            color: var(--muted);
            font-size: 0.9rem;
        }

        .floating-card {
            width: 13rem;
            padding: 1rem;
            border-radius: var(--radius-md);
            background: rgba(9, 18, 34, 0.78);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: var(--shadow);
            backdrop-filter: blur(10px);
            animation: float 5s ease-in-out infinite;
        }

        .floating-card strong {
            display: block;
            font-size: 1rem;
        }

        .floating-card span {
            display: block;
            margin-top: 0.35rem;
            color: var(--muted);
            font-size: 0.88rem;
            line-height: 1.6;
        }

        .card-top {
            position: absolute;
            top: 2rem;
            right: 0;
            animation-delay: -1s;
        }

        .card-left {
            position: absolute;
            left: 0;
            bottom: 9rem;
            animation-delay: -2.5s;
        }

        .card-bottom {
            position: absolute;
            right: 2.6rem;
            bottom: 0;
            width: 11rem;
            animation-delay: -1.75s;
        }

        section {
            padding: 2rem 0 0;
        }

        .section-head {
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .section-head h2 {
            font-size: clamp(2rem, 4vw, 3.2rem);
            font-family: "Iowan Old Style", "Palatino Linotype", serif;
        }

        .section-head p {
            margin: 0;
            max-width: 34rem;
            color: var(--muted);
            line-height: 1.8;
        }

        .about-grid,
        .skills-grid,
        .ai-grid,
        .projects-grid,
        .contact-grid {
            display: grid;
            gap: 1.25rem;
        }

        .about-grid {
            grid-template-columns: 1fr 1fr;
        }

        .card,
        .contact-card {
            padding: 1.5rem;
        }

        .card h3,
        .contact-card h3 {
            font-size: 1.22rem;
            margin-bottom: 0.7rem;
        }

        .card p,
        .contact-card p {
            margin: 0;
            color: var(--muted);
            line-height: 1.8;
        }

        .chips {
            display: flex;
            flex-wrap: wrap;
            gap: 0.7rem;
            margin-top: 1.2rem;
        }

        .chip {
            padding: 0.6rem 0.95rem;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.08);
            color: #f8e9d1;
            font-size: 0.9rem;
        }

        .timeline {
            display: grid;
            gap: 1rem;
        }

        .timeline-item {
            padding: 1.5rem;
        }

        .timeline-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 0.8rem;
        }

        .timeline-top strong {
            font-size: 1.1rem;
        }

        .timeline-top span {
            color: var(--accent-soft);
            font-size: 0.92rem;
        }

        .timeline-item p {
            margin: 0;
            color: var(--muted);
            line-height: 1.8;
        }

        .skills-grid {
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        }

        .ai-grid {
            grid-template-columns: minmax(0, 1.15fr) minmax(320px, 0.85fr);
        }

        .section-note {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.9rem;
            color: var(--accent-soft);
            font-size: 0.82rem;
            letter-spacing: 0.14em;
            text-transform: uppercase;
        }

        .section-note::before {
            content: "";
            width: 0.45rem;
            height: 0.45rem;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            box-shadow: 0 0 0 0.3rem rgba(84, 211, 194, 0.12);
        }

        .skill-note {
            margin-top: 1rem;
            color: var(--muted);
            line-height: 1.75;
        }

        .ai-feature,
        .ai-side-panel {
            padding: 1.6rem;
        }

        .ai-feature {
            background:
                linear-gradient(180deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.03)),
                radial-gradient(circle at top right, rgba(255, 179, 71, 0.16), transparent 32%);
        }

        .ai-side-panel {
            background:
                linear-gradient(180deg, rgba(255, 255, 255, 0.09), rgba(255, 255, 255, 0.03)),
                radial-gradient(circle at top left, rgba(84, 211, 194, 0.14), transparent 36%);
        }

        .ai-feature p,
        .ai-side-panel p {
            color: var(--muted);
        }

        .ai-pillars {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 1rem;
            margin-top: 1.35rem;
        }

        .ai-pillar {
            padding: 1.15rem;
            border-radius: var(--radius-md);
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .ai-pillar strong,
        .ai-tool-item strong {
            display: block;
            color: #fff2dc;
            margin-bottom: 0.35rem;
            font-size: 1rem;
        }

        .ai-pillar span,
        .ai-tool-item span {
            color: var(--muted);
            font-size: 0.94rem;
            line-height: 1.7;
        }

        .ai-tool-list {
            display: grid;
            gap: 0.9rem;
            margin-top: 1.15rem;
        }

        .ai-tool-item {
            padding: 1rem 1.05rem;
            border-radius: var(--radius-md);
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.07);
        }

        .projects-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .skill-list {
            display: grid;
            gap: 0.8rem;
            margin-top: 1rem;
        }

        .skill-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            padding-bottom: 0.8rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .skill-row:last-child {
            padding-bottom: 0;
            border-bottom: 0;
        }

        .skill-row span:last-child {
            color: #ffe6bc;
            font-weight: 700;
        }

        .highlight-band {
            margin-top: 1.25rem;
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 1rem;
        }

        .band-card {
            padding: 1.25rem;
            border-radius: var(--radius-md);
            background: linear-gradient(180deg, rgba(255, 179, 71, 0.12), rgba(84, 211, 194, 0.06));
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .band-card strong {
            display: block;
            margin-bottom: 0.45rem;
            font-size: 1.05rem;
        }

        .band-card span {
            color: var(--muted);
            font-size: 0.92rem;
            line-height: 1.7;
        }

        .contact-grid {
            grid-template-columns: 1.1fr 0.9fr;
            margin-bottom: 4rem;
        }

        .project-card {
            padding: 1.5rem;
        }

        .project-card h3 {
            font-size: 1.25rem;
            margin-bottom: 0.55rem;
        }

        .project-card p {
            margin: 0;
            color: var(--muted);
            line-height: 1.75;
        }

        .project-link {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            margin-top: 1.15rem;
            color: #ffe3b5;
            font-weight: 700;
        }

        .project-link:hover,
        .project-link:focus-visible {
            color: #fff7e8;
        }

        .project-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 0.65rem;
            margin-top: 1rem;
        }

        .contact-card a {
            color: #ffe3b5;
        }

        .contact-card a:hover,
        .contact-card a:focus-visible {
            color: #fff6e5;
        }

        .contact-list {
            display: grid;
            gap: 1rem;
            margin-top: 1.25rem;
        }

        .contact-item {
            padding: 1rem 1.05rem;
            border-radius: 1rem;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.06);
        }

        .contact-item span {
            display: block;
            font-size: 0.82rem;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 0.35rem;
        }

        .footer {
            padding: 0 0 2.5rem;
            color: rgba(244, 239, 230, 0.68);
            font-size: 0.94rem;
        }

        .reveal {
            opacity: 0;
            transform: translateY(28px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }

        .reveal.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        @keyframes drift {

            0%,
            100% {
                transform: translate3d(0, 0, 0) scale(1);
            }

            50% {
                transform: translate3d(1.75rem, -1.3rem, 0) scale(1.06);
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-14px);
            }
        }

        @keyframes spin {
            from {
                transform: translate(-50%, -50%) rotate(0deg);
            }

            to {
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }

        @keyframes sheen {
            0% {
                transform: translateX(-100%);
            }

            18%,
            100% {
                transform: translateX(150%);
            }
        }

        @media (max-width: 1080px) {
            .hero {
                padding: 4.75rem 0 3.5rem;
            }

            .hero-grid,
            .about-grid,
            .contact-grid,
            .skills-grid,
            .ai-grid,
            .projects-grid,
            .highlight-band {
                grid-template-columns: 1fr;
            }

            .hero-visual {
                min-height: 31rem;
                margin-top: 1rem;
            }

            .floating-card {
                width: 12rem;
            }

            .section-head {
                align-items: start;
                flex-direction: column;
            }
        }

        @media (max-width: 760px) {
            .container {
                width: min(var(--container), calc(100% - 1.5rem));
            }

            .nav {
                align-items: stretch;
                flex-direction: column;
                padding: 0.9rem 0 1rem;
            }

            .nav-top {
                justify-content: space-between;
                width: 100%;
            }

            .nav-toggle {
                display: inline-flex;
                flex-shrink: 0;
            }

            .nav-links {
                width: 100%;
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 0.75rem;
                justify-content: start;
                max-height: 0;
                opacity: 0;
                overflow: hidden;
                pointer-events: none;
                padding-top: 0;
                transition: max-height 0.3s ease, opacity 0.25s ease, padding-top 0.25s ease;
            }

            .nav-links.is-open {
                max-height: 20rem;
                opacity: 1;
                pointer-events: auto;
                padding-top: 0.35rem;
            }

            .nav-links a {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                min-height: 2.5rem;
                padding: 0.45rem 0.85rem;
                border-radius: 999px;
                background: rgba(255, 255, 255, 0.04);
                border: 1px solid rgba(255, 255, 255, 0.06);
            }

            .hero {
                padding: 3.5rem 0 3rem;
            }

            .hero h1 {
                font-size: clamp(2.6rem, 11vw, 4rem);
            }

            .hero p,
            .section-head p,
            .card p,
            .contact-card p,
            .timeline-item p {
                font-size: 1rem;
                line-height: 1.7;
            }

            .hero-actions {
                gap: 0.85rem;
            }

            .button {
                width: 100%;
            }

            .hero-meta,
            .profile-stats {
                grid-template-columns: 1fr;
            }

            .hero-visual {
                min-height: 28rem;
            }

            .profile-panel {
                position: relative;
                inset: auto;
                width: 100%;
                margin-top: 6.5rem;
            }

            .card-top {
                right: 0.5rem;
            }

            .card-left {
                left: 0.2rem;
                bottom: 13.5rem;
            }

            .card-bottom {
                right: 1rem;
                bottom: -0.5rem;
            }

            .profile-head,
            .timeline-top,
            .skill-row {
                align-items: start;
                flex-direction: column;
            }

            .card,
            .contact-card,
            .project-card,
            .timeline-item {
                padding: 1.25rem;
            }

            .highlight-band {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .ai-pillars {
                grid-template-columns: 1fr;
            }

            .footer {
                padding-bottom: 2rem;
            }
        }

        @media (max-width: 560px) {
            body::before,
            body::after {
                width: 18rem;
                height: 18rem;
                filter: blur(56px);
            }

            .grid-overlay {
                background-size: 56px 56px;
            }

            .brand {
                gap: 0.7rem;
            }

            .brand-copy span:first-child {
                font-size: 0.92rem;
            }

            .brand-copy span:last-child {
                font-size: 0.66rem;
                letter-spacing: 0.12em;
            }

            .eyebrow {
                font-size: 0.74rem;
                padding: 0.5rem 0.8rem;
            }

            .hero h1 {
                font-size: clamp(2.2rem, 12vw, 2.9rem);
            }

            .hero-visual {
                display: grid;
                gap: 0.9rem;
                min-height: auto;
                padding-top: 9.5rem;
            }

            .glow-ring {
                width: 16rem;
                height: 16rem;
                top: 8rem;
            }

            .floating-card,
            .profile-panel {
                position: relative;
                inset: auto;
                width: 100%;
                margin: 0;
            }

            .floating-card {
                padding: 0.95rem;
            }

            .profile-panel {
                margin-top: 0;
                padding: 1.2rem;
            }

            .meta-card strong,
            .mini-card strong {
                font-size: 1.3rem;
            }

            .highlight-band {
                grid-template-columns: 1fr;
            }

            .ai-feature,
            .ai-side-panel {
                padding: 1.25rem;
            }

            .contact-list {
                gap: 0.8rem;
            }

            .contact-item {
                padding: 0.9rem;
            }
        }

        @media (max-width: 400px) {
            .container {
                width: min(var(--container), calc(100% - 1rem));
            }

            .nav-links {
                grid-template-columns: 1fr;
            }

            .button {
                width: 100%;
            }

            .hero {
                padding-top: 3rem;
            }

            .hero-visual {
                padding-top: 8.5rem;
            }

            .glow-ring {
                width: 13.5rem;
                height: 13.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="page-shell">
        <div class="grid-overlay"></div>

        <header class="site-header">
            <div class="container nav">
                <div class="nav-top">
                    <a class="brand" href="#home">
                        <span class="brand-badge">SS</span>
                        <span class="brand-copy">
                            <span>Sahil Suthar</span>
                            <span>PHP Laravel Developer</span>
                        </span>
                    </a>

                    <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="primary-menu"
                        aria-label="Toggle navigation">
                        <span class="nav-toggle-box" aria-hidden="true">
                            <span class="nav-toggle-line"></span>
                            <span class="nav-toggle-line"></span>
                            <span class="nav-toggle-line"></span>
                        </span>
                    </button>
                </div>

                <nav class="nav-links" id="primary-menu" aria-label="Primary">
                    <a href="#about">About</a>
                    <a href="#experience">Experience</a>
                    <a href="#skills">Skills</a>
                    <a href="#ai-tools">AI Tools</a>
                    <a href="#projects">Projects</a>
                    <a href="#contact">Contact</a>
                </nav>
            </div>
        </header>

        <main>
            <section class="hero" id="home">
                <div class="container hero-grid">
                    <div class="reveal is-visible">
                        <span class="eyebrow">Laravel Developer</span>
                        <h1>
                            Building
                            <span class="accent">clean Laravel products</span>
                            with strong backend thinking.
                        </h1>
                        <p>
                            I'm Sahil Suthar, a PHP Laravel Developer from Rajasthan with 2.6 years of experience
                            building Laravel and CodeIgniter applications, managing SQL-backed systems, and creating
                            responsive interfaces with AJAX, jQuery, JavaScript, HTML, and CSS for real business use.
                        </p>

                        <div class="hero-actions">
                            <a class="button button-primary" href="/resume/SAHIL-SUTHAR-RESUME.pdf" target="_blank"
                            rel="noreferrer">Resume</a>
                            <a class="button button-secondary" href="#contact">Let&apos;s Work Together</a>
                        </div>

                        <div class="hero-meta">
                            <div class="meta-card">
                                <strong>2.6+</strong>
                                <span>Years across Laravel development roles</span>
                            </div>
                            <div class="meta-card">
                                <strong>Govt Projects</strong>
                                <span>Experience building and maintaining portal-based systems</span>
                            </div>
                            <div class="meta-card">
                                <strong>SQL + UI</strong>
                                <span>Backend operations with user-friendly frontend delivery</span>
                            </div>
                        </div>
                    </div>

                    <div class="hero-visual reveal">
                        <div class="glow-ring" aria-hidden="true"></div>

                        <div class="floating-card card-top">
                            <strong>Laravel First</strong>
                            <span>Business workflows, Eloquent ORM, admin panels, and structured backend logic.</span>
                        </div>

                        <div class="floating-card card-left">
                            <strong>Frontend Friendly</strong>
                            <span>AJAX, jQuery, JavaScript, HTML, and CSS for responsive user experiences.</span>
                        </div>

                        <div class="floating-card card-bottom">
                            <strong>Flexible Stack</strong>
                            <span>Laravel, CodeIgniter, SQL, and basic WordPress customization.</span>
                        </div>

                        <div class="panel profile-panel">
                            <div class="profile-head">
                                <div>
                                    <div class="profile-name">Sahil Suthar</div>
                                    <div class="profile-role">PHP Laravel Developer</div>
                                </div>
                                <div class="availability">Open to opportunities</div>
                            </div>

                            <div class="profile-stats">
                                <div class="mini-card">
                                    <strong>PHP</strong>
                                    <span>Core development and backend logic</span>
                                </div>
                                <div class="mini-card">
                                    <strong>Laravel</strong>
                                    <span>Custom web apps and Eloquent-based data handling</span>
                                </div>
                                <div class="mini-card">
                                    <strong>SQL / MySQL</strong>
                                    <span>Backend operations, queries, and database-driven features</span>
                                </div>
                                <div class="mini-card">
                                    <strong>CodeIgniter</strong>
                                    <span>Multi-framework experience for project flexibility</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="about">
                <div class="container">
                    <div class="section-head reveal">
                        <div>
                            <span class="eyebrow">About Me</span>
                            <h2>Practical development with a clean, modern finish.</h2>
                        </div>
                        <p>
                            I enjoy turning requirements into stable Laravel applications that are easy to manage,
                            visually polished, and comfortable for both users and future developers.
                        </p>
                    </div>

                    <div class="about-grid">
                        <article class="card reveal">
                            <h3>Who I Am</h3>
                            <p>
                                I am a Laravel Developer focused on software
                                design, development, and integration. I enjoy building dependable systems, working
                                within tight deadlines, and turning technical requirements into usable web products.
                            </p>
                            <div class="chips">
                                <span class="chip">PHP</span>
                                <span class="chip">Laravel</span>
                                <span class="chip">CodeIgniter</span>
                                <span class="chip">SQL / MySQL</span>
                                <span class="chip">AJAX</span>
                                <span class="chip">jQuery</span>
                                <span class="chip">JavaScript</span>
                                <span class="chip">HTML / CSS</span>
                                <span class="chip">React (Basic)</span>
                                <span class="chip">WordPress</span>
                            </div>
                        </article>

                        <article class="card reveal">
                            <h3>What I Bring</h3>
                            <p>
                                I bring a balanced mix of backend reliability and interface polish. My resume projects
                                show experience in government-oriented platforms, booking flows, and business websites
                                where maintainability, speed, and clear user journeys matter.
                            </p>
                            <div class="highlight-band">
                                <div class="band-card">
                                    <strong>Custom Apps</strong>
                                    <span>Laravel web applications tailored to business workflows.</span>
                                </div>
                                <div class="band-card">
                                    <strong>Data Handling</strong>
                                    <span>SQL and Eloquent-based storage, queries, and management.</span>
                                </div>
                                <div class="band-card">
                                    <strong>Responsive UI</strong>
                                    <span>Dynamic interfaces using AJAX, jQuery, JavaScript, and CSS.</span>
                                </div>
                                <div class="band-card">
                                    <strong>Fast Delivery</strong>
                                    <span>High-quality work under deadlines with practical implementation.</span>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </section>

            <section id="experience">
                <div class="container">
                    <div class="section-head reveal">
                        <div>
                            <span class="eyebrow">Experience</span>
                            <h2>2.6 years building Laravel-based web solutions.</h2>
                        </div>
                        <p>
                            My experience includes a Laravel training role and a current developer role working on
                            real client and government-sector applications using both Laravel and CodeIgniter.
                        </p>
                    </div>

                    <div class="timeline">
                        <article class="timeline-item reveal">
                            <div class="timeline-top">
                                <strong>Veritos Infosolution Pvt Ltd</strong>
                                <span>Mohali, Punjab | 05/2024 - Present</span>
                            </div>
                            <p>
                                Working as a Laravel Developer on government-sector and business web applications.
                                I build and maintain features using Laravel and CodeIgniter, create responsive
                                interfaces with AJAX, jQuery, JavaScript, HTML, and CSS, and manage backend
                                operations with MySQL and SQL. I also handle basic WordPress customization when needed.
                            </p>
                        </article>

                        <article class="timeline-item reveal">
                            <div class="timeline-top">
                                <strong>D2Code Lab Pvt. Ltd</strong>
                                <span>Ellenabad, Haryana | 10/2023 - 05/2024</span>
                            </div>
                            <p>
                                Started in a training-focused Laravel development position where I built custom web
                                applications, worked with Laravel's Eloquent ORM, and handled MySQL-backed data
                                storage and retrieval. This role strengthened my application structure and backend
                                fundamentals.
                            </p>
                        </article>

                        <article class="timeline-item reveal">
                            <div class="timeline-top">
                                <strong>Working Approach</strong>
                                <span>Reliable and Versatile</span>
                            </div>
                            <p>
                                I focus on clear architecture, practical coding, and dependable delivery. Whether I am
                                working on database-heavy backend features or user-facing interface behavior, I aim to
                                keep the code organized, scalable, and easy to maintain.
                            </p>
                        </article>
                    </div>
                </div>
            </section>

            <section id="skills">
                <div class="container">
                    <div class="section-head reveal">
                        <div>
                            <span class="eyebrow">Skills</span>
                            <h2>Tools and capabilities I use to ship solid web apps.</h2>
                        </div>
                        <p>
                            The resume highlights a stack built around PHP frameworks, SQL-backed development,
                            interactive frontend work, and modern AI-assisted productivity for web applications.
                        </p>
                    </div>

                    <div class="skills-grid">
                        <article class="card reveal">
                            <h3>Frameworks & Backend</h3>
                            <div class="skill-list">
                                <div class="skill-row">
                                    <span>PHP</span>
                                    <span>Advanced</span>
                                </div>
                                <div class="skill-row">
                                    <span>Laravel Framework</span>
                                    <span>Advanced</span>
                                </div>
                                <div class="skill-row">
                                    <span>CodeIgniter</span>
                                    <span>Strong</span>
                                </div>
                                <div class="skill-row">
                                    <span>Application Development</span>
                                    <span>Strong</span>
                                </div>
                            </div>
                        </article>

                        <article class="card reveal">
                            <h3>Database & Logic</h3>
                            <div class="skill-list">
                                <div class="skill-row">
                                    <span>SQL / MySQL</span>
                                    <span>Strong</span>
                                </div>
                                <div class="skill-row">
                                    <span>Eloquent ORM</span>
                                    <span>Strong</span>
                                </div>
                                <div class="skill-row">
                                    <span>CRUD Systems</span>
                                    <span>Strong</span>
                                </div>
                                <div class="skill-row">
                                    <span>Data Management</span>
                                    <span>Strong</span>
                                </div>
                            </div>
                        </article>

                        <article class="card reveal">
                            <h3>Frontend & CMS</h3>
                            <div class="skill-list">
                                <div class="skill-row">
                                    <span>AJAX</span>
                                    <span>Strong</span>
                                </div>
                                <div class="skill-row">
                                    <span>jQuery</span>
                                    <span>Strong</span>
                                </div>
                                <div class="skill-row">
                                    <span>HTML, CSS, JavaScript</span>
                                    <span>Strong</span>
                                </div>
                                <div class="skill-row">
                                    <span>React</span>
                                    <span>Basic</span>
                                </div>
                                <div class="skill-row">
                                    <span>Basic WordPress</span>
                                    <span>Working Knowledge</span>
                                </div>
                            </div>
                        </article>

                        <article class="card reveal">
                            <h3>AI-Assisted Workflow</h3>
                            <div class="skill-list">
                                <div class="skill-row">
                                    <span>Prompt-Based Research</span>
                                    <span>Practical</span>
                                </div>
                                <div class="skill-row">
                                    <span>AI Debugging Support</span>
                                    <span>Practical</span>
                                </div>
                                <div class="skill-row">
                                    <span>Content & Copy Drafting</span>
                                    <span>Working</span>
                                </div>
                                <div class="skill-row">
                                    <span>Faster Idea Validation</span>
                                    <span>Working</span>
                                </div>
                            </div>
                            <p class="skill-note">
                                I use AI tools to speed up research, refine interface copy, and unblock development
                                tasks while keeping implementation quality and final review in my own hands.
                            </p>
                        </article>
                    </div>
                </div>
            </section>

            <section id="ai-tools">
                <div class="container">
                    <div class="section-head reveal">
                        <div>
                            <span class="eyebrow">AI Tools</span>
                            <h2>AI-assisted workflows that help me build faster and present work better.</h2>
                        </div>
                        <p>
                            Alongside Laravel development, I use modern AI support for code exploration, debugging,
                            content drafting, and feature planning so I can move faster while keeping delivery clear
                            and practical.
                        </p>
                    </div>

                    <div class="ai-grid">
                        <article class="card ai-feature reveal">
                            <span class="section-note">How I use AI</span>
                            <h3>Practical AI support inside a real development workflow.</h3>
                            <p>
                                AI is most useful to me when it accelerates thinking, not when it replaces judgment.
                                I use it to explore approaches, improve wording, speed up repetitive tasks, and get
                                quicker momentum during planning or debugging before I validate the final result in
                                code.
                            </p>

                            <div class="ai-pillars">
                                <div class="ai-pillar">
                                    <strong>Code Assistance</strong>
                                    <span>Reviewing logic ideas, exploring implementation paths, and reducing trial time.</span>
                                </div>
                                <div class="ai-pillar">
                                    <strong>Debug Support</strong>
                                    <span>Breaking down errors faster and checking alternative fixes during development.</span>
                                </div>
                                <div class="ai-pillar">
                                    <strong>Content Polish</strong>
                                    <span>Improving website copy, project descriptions, and call-to-action clarity.</span>
                                </div>
                                <div class="ai-pillar">
                                    <strong>Planning Speed</strong>
                                    <span>Turning rough ideas into structured tasks, feature notes, and next steps.</span>
                                </div>
                            </div>
                        </article>

                        <aside class="card ai-side-panel reveal">
                            <span class="section-note">Toolset</span>
                            <h3>AI tools and use cases I can bring into projects.</h3>
                            <div class="ai-tool-list">
                                <div class="ai-tool-item">
                                    <strong>ChatGPT</strong>
                                    <span>Useful for brainstorming, feature planning, debugging discussion, and content drafting.</span>
                                </div>
                                <div class="ai-tool-item">
                                    <strong>AI Coding Assistants</strong>
                                    <span>Helpful for speeding up repetitive coding work, code suggestions, and quick exploration.</span>
                                </div>
                                <div class="ai-tool-item">
                                    <strong>Prompt-Driven Research</strong>
                                    <span>Summarizing options, comparing approaches, and getting faster initial direction.</span>
                                </div>
                                <div class="ai-tool-item">
                                    <strong>AI Content Support</strong>
                                    <span>Refining portfolio copy, service messaging, and user-facing text for stronger presentation.</span>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </section>

            <section id="projects">
                <div class="container">
                    <div class="section-head reveal">
                        <div>
                            <span class="eyebrow">Projects</span>
                            <h2>Selected work from my resume and professional experience.</h2>
                        </div>
                        <p>
                            These project links reflect the kind of platforms I have worked on, including public
                            portals, business websites, and online booking-oriented experiences.
                        </p>
                    </div>

                    <div class="projects-grid">
                        <article class="card project-card reveal">
                            <h3>BCMR Portal</h3>
                            <p>
                                A public-facing web platform where clean structure, reliable information flow, and a
                                stable backend experience are essential.
                            </p>
                            <div class="project-tags">
                                <span class="chip">CodeIgniter</span>
                                <span class="chip">PHP</span>
                                <span class="chip">SQL</span>
                                <span class="chip">jQuery</span>
                                <span class="chip">Responsive UI</span>
                            </div>
                            <a class="project-link" href="https://bcmr.net.in/" target="_blank" rel="noreferrer">Visit
                                Project</a>
                        </article>

                        <article class="card project-card reveal">
                            <h3>Haryana Medical Council</h3>
                            <p>
                                A government-oriented website experience requiring dependable structure, responsive
                                layouts, and maintainable application flow.
                            </p>
                            <div class="project-tags">
                                <span class="chip">CodeIgniter</span>
                                <span class="chip">PHP</span>
                                <span class="chip">SQL</span>
                                <span class="chip">jQuery</span>
                                <span class="chip">Responsive UI</span>
                            </div>
                            <a class="project-link" href="https://haryanamedicalcouncil.org/" target="_blank"
                                rel="noreferrer">Visit Project</a>
                        </article>

                        <article class="card project-card reveal">
                            <h3>Progress IT Solutions</h3>
                            <p>
                                A business-focused website emphasizing presentation, responsive frontend delivery, and
                                practical web implementation for service visibility.
                            </p>
                            <div class="project-tags">
                                <span class="chip">Laravel</span>
                                <span class="chip">PHP</span>
                                <span class="chip">SQL</span>
                                <span class="chip">AJAX</span>
                                <span class="chip">jQuery</span>
                                <span class="chip">Responsive UI</span>
                                <span class="chip">HTML</span>
                                <span class="chip">CSS</span>
                                <span class="chip">JavaScript</span>
                            </div>
                            <a class="project-link" href="https://progressitsolutions.in/" target="_blank"
                                rel="noreferrer">Visit Project</a>
                        </article>

                        <article class="card project-card reveal">
                            <h3>Elior Booking</h3>
                            <p>
                                A booking-centered web experience where user journey, interaction flow, and responsive
                                page behavior play an important role.
                            </p>
                            <div class="project-tags">
                                <span class="chip">Laravel</span>
                                <span class="chip">AJAX</span>
                                <span class="chip">jQuery</span>
                                <span class="chip">Responsive UI</span>
                                <span class="chip">HTML</span>
                                <span class="chip">CSS</span>
                                <span class="chip">JavaScript</span>
                                <span class="chip">Booking Flow</span>
                            </div>
                            <a class="project-link" href="https://eliorbooking.com/" target="_blank"
                                rel="noreferrer">Visit Project</a>
                        </article>
                    </div>
                </div>
            </section>

            <section id="contact">
                <div class="container">
                    <div class="section-head reveal">
                        <div>
                            <span class="eyebrow">Contact</span>
                            <h2>Let's build your next Laravel project.</h2>
                        </div>
                        <p>
                            If you need a dependable PHP Laravel developer for a business site, custom system, or
                            backend-driven product, I would be happy to connect.
                        </p>
                    </div>

                    <div class="contact-grid">
                        <article class="contact-card reveal">
                            <h3>Get In Touch</h3>
                            <p>
                                I'm available for freelance projects, long-term work, and collaborative development
                                roles. The resume button on this page now opens my attached PDF directly.
                            </p>

                            <div class="hero-actions">
                                <a class="button button-primary" href="mailto:sahilsutharrawatsar@gmail.com">Email
                                    Me</a>
                                <a class="button button-secondary" href="tel:6377628517">Call Me</a>
                            </div>
                        </article>

                        <aside class="contact-card reveal">
                            <h3>Contact Details</h3>
                            <div class="contact-list">
                                <div class="contact-item">
                                    <span>Name</span>
                                    <a href="#home">Sahil Suthar</a>
                                </div>
                                <div class="contact-item">
                                    <span>Location</span>
                                    <a href="#about">Asarjana, Nohar, Rajasthan - 335523</a>
                                </div>
                                <div class="contact-item">
                                    <span>Email</span>
                                    <a href="mailto:sahilsutharrawatsar@gmail.com">sahilsutharrawatsar@gmail.com</a>
                                </div>
                                <div class="contact-item">
                                    <span>Phone</span>
                                    <a href="tel:6377628517">6377628517</a>
                                </div>
                                <div class="contact-item">
                                    <span>Languages</span>
                                    <a href="#skills">Hindi, English</a>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </section>
        </main>

        <footer class="footer">
            <div class="container">
                Created by Sahil Suthar with Laravel, custom styling, and lightweight animation.
            </div>
        </footer>
    </div>

    <script>
        const navToggle = document.querySelector('.nav-toggle');
        const navLinks = document.querySelector('.nav-links');
        const revealElements = document.querySelectorAll('.reveal');

        const syncMobileNav = () => {
            if (!navToggle || !navLinks) {
                return;
            }

            if (window.innerWidth > 760) {
                navToggle.setAttribute('aria-expanded', 'false');
                navLinks.classList.remove('is-open');
            }
        };

        if (navToggle && navLinks) {
            navToggle.addEventListener('click', () => {
                const isOpen = navToggle.getAttribute('aria-expanded') === 'true';
                navToggle.setAttribute('aria-expanded', String(!isOpen));
                navLinks.classList.toggle('is-open', !isOpen);
            });

            navLinks.querySelectorAll('a').forEach((link) => {
                link.addEventListener('click', () => {
                    navToggle.setAttribute('aria-expanded', 'false');
                    navLinks.classList.remove('is-open');
                });
            });

            window.addEventListener('resize', syncMobileNav);
            syncMobileNav();
        }

        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.2,
        });

        revealElements.forEach((element, index) => {
            if (!element.classList.contains('is-visible')) {
                element.style.transitionDelay = `${Math.min(index * 80, 280)}ms`;
            }

            revealObserver.observe(element);
        });
    </script>
</body>

</html>
