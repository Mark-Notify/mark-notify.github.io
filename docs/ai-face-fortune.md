<html lang="th">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>สแกนใบหน้า | Red Gold Face Fortune</title>
    <style>
        :root {
            --bg: #060202;
            --red: #d71515;
            --red-2: #ff3131;
            --gold: #f7c765;
            --gold-2: #ffd98a;
            --muted-gold: #b88a3b;
            --border: rgba(247, 199, 101, 0.5);
            --danger: #ff665c;
            --text: #fff3d2;
            --muted: #c89f5a;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background:
                radial-gradient(circle at 50% 20%, rgba(214, 21, 21, 0.2), transparent 38%),
                radial-gradient(circle at 30% 80%, rgba(247, 199, 101, 0.12), transparent 30%),
                linear-gradient(180deg, #090202, #020000 70%);
            color: var(--text);
            overflow-x: hidden;
        }

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            pointer-events: none;
            background-image:
                linear-gradient(rgba(247, 199, 101, 0.035) 1px, transparent 1px),
                linear-gradient(90deg, rgba(247, 199, 101, 0.035) 1px, transparent 1px);
            background-size: 36px 36px;
            mask-image: radial-gradient(circle at center, black 0%, transparent 72%);
            z-index: 0;
        }

        .app {
            position: relative;
            z-index: 1;
            min-height: 100vh;
            width: min(100%, 480px);
            margin: 0 auto;
            padding: 20px 18px 28px;
            overflow: hidden;
        }

        .app::before,
        .app::after {
            content: "";
            position: absolute;
            width: 240px;
            height: 120px;
            opacity: 0.16;
            pointer-events: none;
            background:
                radial-gradient(circle at 20% 50%, transparent 14px, var(--muted-gold) 15px, transparent 17px),
                radial-gradient(circle at 40% 50%, transparent 20px, var(--muted-gold) 21px, transparent 23px),
                radial-gradient(circle at 62% 50%, transparent 15px, var(--muted-gold) 16px, transparent 18px);
            filter: blur(0.2px);
        }

        .app::before {
            left: -80px;
            top: 120px;
        }

        .app::after {
            right: -110px;
            bottom: 120px;
            transform: rotate(180deg);
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 4px;
        }

        .icon-btn {
            width: 48px;
            height: 48px;
            display: grid;
            place-items: center;
            border: 1px solid var(--border);
            border-radius: 16px;
            color: var(--gold-2);
            background: linear-gradient(145deg, rgba(109, 11, 11, 0.92), rgba(27, 4, 4, 0.76));
            box-shadow: inset 0 0 0 1px rgba(255, 217, 138, 0.1), 0 0 18px rgba(215, 21, 21, 0.18);
        }

        .title-wrap {
            text-align: center;
            margin: 10px 0 16px;
        }

        h1 {
            font-size: clamp(34px, 9vw, 46px);
            line-height: 1.05;
            letter-spacing: -0.05em;
            color: var(--gold-2);
            text-shadow: 0 0 20px rgba(247, 199, 101, 0.34), 0 2px 0 rgba(93, 18, 4, 0.8);
        }

        .privacy-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 12px;
            padding: 8px 14px;
            border: 1px solid rgba(247, 199, 101, 0.42);
            border-radius: 999px;
            background: rgba(12, 2, 2, 0.7);
            color: #e4bd73;
            font-size: 13px;
            box-shadow: 0 0 22px rgba(215, 21, 21, 0.12);
        }

        .scanner {
            position: relative;
            width: 100%;
            aspect-ratio: 0.8;
            margin: 6px auto 18px;
            border-radius: 34px;
            overflow: hidden;
            background: radial-gradient(circle at center, rgba(122, 17, 17, 0.48), rgba(0, 0, 0, 0.86) 62%);
            border: 1px solid rgba(247, 199, 101, 0.23);
            box-shadow: 0 0 40px rgba(215, 21, 21, 0.17), inset 0 0 60px rgba(255, 216, 138, 0.05);
        }

        video {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: scaleX(-1);
            filter: contrast(1.08) saturate(0.95) brightness(0.72);
            opacity: 0.82;
        }

        .camera-placeholder {
            position: absolute;
            inset: 0;
            display: grid;
            place-items: center;
            text-align: center;
            padding: 28px;
            background:
                radial-gradient(circle, rgba(151, 22, 22, 0.24), transparent 44%),
                linear-gradient(180deg, rgba(0, 0, 0, 0.05), rgba(0, 0, 0, 0.8));
            color: var(--muted);
            transition: opacity 0.25s ease;
            z-index: 2;
        }

        .camera-placeholder.hidden {
            opacity: 0;
            pointer-events: none;
        }

        .camera-placeholder.warning strong {
            color: #ffdd95 !important;
        }

        .placeholder-actions {
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 16px;
        }

        .mini-btn {
            border: 1px solid rgba(247, 199, 101, 0.55);
            border-radius: 999px;
            padding: 9px 13px;
            color: var(--gold-2);
            background: rgba(90, 10, 10, 0.78);
            cursor: pointer;
            font-weight: 700;
        }

        .mini-btn.ghost {
            background: rgba(0, 0, 0, 0.45);
            color: var(--muted);
        }

        .demo-face {
            position: absolute;
            inset: 0;
            display: none;
            place-items: center;
            background:
                radial-gradient(circle at 50% 43%, rgba(255, 184, 88, 0.17), transparent 23%),
                radial-gradient(circle at 50% 50%, rgba(255, 43, 43, 0.14), transparent 42%);
            opacity: 0.9;
        }

        .demo-face.active {
            display: grid;
        }

        .avatar {
            width: 47%;
            max-width: 210px;
            aspect-ratio: 0.72;
            border-radius: 47% 47% 42% 42% / 35% 35% 55% 55%;
            background:
                radial-gradient(circle at 35% 42%, #ffdba0 0 3px, transparent 4px),
                radial-gradient(circle at 65% 42%, #ffdba0 0 3px, transparent 4px),
                radial-gradient(circle at 50% 59%, rgba(255, 218, 138, 0.9) 0 2px, transparent 3px),
                radial-gradient(ellipse at 50% 50%, rgba(255, 211, 130, 0.16), rgba(255, 55, 55, 0.03) 60%, transparent 62%);
            border: 1px solid rgba(255, 218, 138, 0.35);
            box-shadow: inset 0 0 40px rgba(255, 211, 130, 0.1), 0 0 36px rgba(255, 49, 49, 0.12);
            position: relative;
        }

        .avatar::before,
        .avatar::after {
            content: "";
            position: absolute;
            left: 30%;
            right: 30%;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255, 218, 138, 0.85), transparent);
        }

        .avatar::before {
            top: 68%;
        }

        .avatar::after {
            top: 78%;
        }

        .hud-ring {
            position: absolute;
            left: 50%;
            top: 50%;
            width: 82%;
            aspect-ratio: 1;
            transform: translate(-50%, -50%);
            border-radius: 50%;
            border: 1px solid rgba(247, 199, 101, 0.34);
            box-shadow: inset 0 0 38px rgba(255, 41, 41, 0.1), 0 0 28px rgba(255, 41, 41, 0.16);
            pointer-events: none;
            z-index: 4;
        }

        .hud-ring::before,
        .hud-ring::after {
            content: "";
            position: absolute;
            inset: -12px;
            border-radius: 50%;
            border: 3px solid transparent;
            border-top-color: var(--red-2);
            border-right-color: rgba(247, 199, 101, 0.78);
            filter: drop-shadow(0 0 10px rgba(255, 49, 49, 0.8));
            animation: spin 4.5s linear infinite;
        }

        .hud-ring::after {
            inset: 18px;
            border-width: 2px;
            border-top-color: rgba(255, 217, 138, 0.8);
            border-left-color: rgba(215, 21, 21, 0.8);
            animation-duration: 7.5s;
            animation-direction: reverse;
        }

        .mesh {
            position: absolute;
            left: 50%;
            top: 49%;
            width: 58%;
            height: 69%;
            transform: translate(-50%, -50%);
            opacity: 0.72;
            pointer-events: none;
            z-index: 5;
        }

        .mesh svg {
            width: 100%;
            height: 100%;
            filter: drop-shadow(0 0 8px rgba(255, 207, 108, 0.6));
        }

        .scan-line-x,
        .scan-line-y {
            position: absolute;
            pointer-events: none;
            z-index: 6;
            background: linear-gradient(90deg, transparent, rgba(255, 49, 49, 0.9), var(--gold-2), rgba(255, 49, 49, 0.9), transparent);
            box-shadow: 0 0 18px rgba(255, 55, 45, 0.9), 0 0 36px rgba(247, 199, 101, 0.45);
        }

        .scan-line-x {
            left: 5%;
            right: 5%;
            height: 2px;
            top: 43%;
            animation: scanX 2.6s ease-in-out infinite alternate;
        }

        .scan-line-y {
            width: 2px;
            height: 78%;
            left: 50%;
            top: 10%;
            transform: translateX(-50%);
            background: linear-gradient(180deg, transparent, rgba(255, 217, 138, 0.9), rgba(255, 49, 49, 0.8), transparent);
        }

        .metric {
            position: absolute;
            width: 70px;
            padding: 10px 8px;
            border: 1px solid rgba(247, 199, 101, 0.54);
            border-radius: 8px;
            background: rgba(9, 2, 2, 0.72);
            color: var(--gold-2);
            text-align: center;
            font-size: 12px;
            box-shadow: inset 0 0 14px rgba(215, 21, 21, 0.22), 0 0 15px rgba(247, 199, 101, 0.08);
            z-index: 7;
        }

        .metric strong {
            display: block;
            margin-top: 3px;
            font-size: 22px;
            color: #fff1c2;
        }

        .metric span {
            display: block;
            margin-top: 4px;
            letter-spacing: 2px;
            color: var(--gold);
        }

        .m-yaw {
            left: 8px;
            top: 30%;
        }

        .m-roll {
            left: 8px;
            bottom: 16%;
        }

        .m-pitch {
            right: 8px;
            top: 30%;
        }

        .m-distance {
            right: 8px;
            bottom: 16%;
        }

        .side-bars {
            position: absolute;
            top: 40%;
            width: 6px;
            height: 110px;
            background: repeating-linear-gradient(to bottom, var(--gold), var(--gold) 4px, transparent 4px, transparent 9px);
            opacity: 0.78;
            filter: drop-shadow(0 0 8px rgba(255, 49, 49, 0.8));
            z-index: 7;
        }

        .side-bars.left {
            left: 3px;
        }

        .side-bars.right {
            right: 3px;
        }

        .status-card,
        .progress-card,
        .debug-card {
            border: 1px solid rgba(247, 199, 101, 0.45);
            background: linear-gradient(180deg, rgba(29, 5, 5, 0.9), rgba(7, 1, 1, 0.86));
            box-shadow: inset 0 0 24px rgba(215, 21, 21, 0.12), 0 0 20px rgba(247, 199, 101, 0.08);
            position: relative;
            overflow: hidden;
        }

        .status-card {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 0;
            border-radius: 22px;
            margin-top: -4px;
        }

        .status-item {
            padding: 18px 8px 14px;
            text-align: center;
            color: var(--gold-2);
            position: relative;
        }

        .status-item:not(:last-child)::after {
            content: "";
            position: absolute;
            right: 0;
            top: 20%;
            width: 1px;
            height: 60%;
            background: linear-gradient(transparent, rgba(247, 199, 101, 0.62), transparent);
        }

        .status-icon {
            width: 54px;
            height: 54px;
            margin: 0 auto 9px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            border: 1px solid rgba(247, 199, 101, 0.65);
            background: radial-gradient(circle, rgba(215, 21, 21, 0.5), rgba(34, 4, 4, 0.7));
            box-shadow: 0 0 18px rgba(215, 21, 21, 0.26);
            font-size: 24px;
        }

        .status-item p {
            font-size: 14px;
            margin-bottom: 8px;
        }

        .check {
            display: inline-grid;
            place-items: center;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            color: #2d1300;
            background: var(--gold);
            font-weight: 900;
        }

        .progress-card {
            margin-top: 14px;
            border-radius: 24px;
            padding: 20px 16px 18px;
            text-align: center;
        }

        .progress-card h2 {
            font-size: 27px;
            line-height: 1.1;
            color: var(--gold-2);
            text-shadow: 0 0 15px rgba(247, 199, 101, 0.2);
            margin-bottom: 16px;
        }

        .progress-row {
            display: grid;
            grid-template-columns: 1fr auto;
            align-items: center;
            gap: 13px;
            margin-bottom: 11px;
        }

        .progress-shell {
            height: 16px;
            border: 1px solid rgba(247, 199, 101, 0.58);
            border-radius: 999px;
            padding: 3px;
            background: rgba(0, 0, 0, 0.42);
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            width: 0%;
            border-radius: 999px;
            background:
                linear-gradient(90deg, var(--red), #ff4837, var(--gold-2)),
                repeating-linear-gradient(90deg, transparent 0 4px, rgba(255, 255, 255, 0.3) 4px 6px);
            box-shadow: 0 0 18px rgba(255, 49, 49, 0.8);
            transition: width 0.25s ease;
        }

        .percent {
            min-width: 66px;
            font-size: 40px;
            font-weight: 800;
            color: #ff684b;
            text-shadow: 0 0 18px rgba(255, 55, 45, 0.55);
        }

        .hint {
            color: var(--muted);
            font-size: 14px;
            margin-bottom: 18px;
        }

        .primary-btn,
        .outline-btn {
            width: 100%;
            min-height: 66px;
            border-radius: 18px;
            font-size: 28px;
            font-weight: 800;
            letter-spacing: -0.03em;
            cursor: pointer;
            transition: transform 0.18s ease, filter 0.18s ease, opacity 0.18s ease;
        }

        .primary-btn {
            border: 1px solid rgba(255, 218, 138, 0.9);
            background:
                linear-gradient(180deg, rgba(255, 73, 46, 0.96), rgba(154, 8, 8, 0.98)),
                radial-gradient(circle at 50% 0%, rgba(255, 217, 138, 0.6), transparent 42%);
            color: #fff1c2;
            box-shadow: 0 0 26px rgba(255, 49, 49, 0.44), inset 0 0 18px rgba(255, 216, 138, 0.25);
        }

        .outline-btn {
            display: none;
            margin-top: 10px;
            min-height: 50px;
            border: 1px solid rgba(247, 199, 101, 0.5);
            background: rgba(0, 0, 0, 0.28);
            color: var(--gold-2);
            font-size: 18px;
        }

        .outline-btn.show {
            display: block;
        }

        .primary-btn:active,
        .outline-btn:active {
            transform: translateY(1px) scale(0.99);
        }

        .primary-btn:disabled,
        .outline-btn:disabled {
            opacity: 0.58;
            cursor: not-allowed;
            filter: grayscale(0.45);
        }

        .secondary-btn {
            margin-top: 13px;
            border: 0;
            background: transparent;
            color: var(--muted);
            font-size: 19px;
            cursor: pointer;
        }

        .debug-card {
            margin-top: 12px;
            border-radius: 18px;
            padding: 12px;
            font-size: 12px;
            color: #e2bd73;
            text-align: left;
            display: none;
        }

        .debug-card.show {
            display: block;
        }

        .debug-card strong {
            color: var(--gold-2);
        }

        .debug-card ul {
            margin: 8px 0 0 18px;
        }

        .toast {
            position: fixed;
            left: 50%;
            bottom: 20px;
            width: min(calc(100% - 34px), 440px);
            transform: translateX(-50%) translateY(120%);
            padding: 13px 16px;
            border: 1px solid rgba(247, 199, 101, 0.4);
            border-radius: 16px;
            background: rgba(8, 1, 1, 0.96);
            color: var(--gold-2);
            z-index: 20;
            box-shadow: 0 0 24px rgba(215, 21, 21, 0.2);
            transition: transform 0.25s ease;
        }

        .toast.show {
            transform: translateX(-50%) translateY(0);
        }

        .particles {
            position: absolute;
            inset: 0;
            pointer-events: none;
            overflow: hidden;
            z-index: 3;
        }

        .particle {
            position: absolute;
            width: 2px;
            height: 2px;
            border-radius: 50%;
            background: var(--gold-2);
            box-shadow: 0 0 8px var(--gold-2);
            animation: float 4s linear infinite;
            opacity: 0.7;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        @keyframes scanX {
            0% {
                top: 34%;
                opacity: 0.72;
            }

            100% {
                top: 60%;
                opacity: 1;
            }
        }

        @keyframes float {
            0% {
                transform: translateY(20px);
                opacity: 0;
            }

            18% {
                opacity: 0.85;
            }

            100% {
                transform: translateY(-90px);
                opacity: 0;
            }
        }

        @media (max-width: 370px) {
            .app {
                padding-inline: 12px;
            }

            .metric {
                width: 60px;
                font-size: 10px;
            }

            .metric strong {
                font-size: 18px;
            }

            .status-item p {
                font-size: 12px;
            }

            .progress-card h2 {
                font-size: 23px;
            }

            .primary-btn {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>
    <main class="app">
        <div class="topbar">
            <button class="icon-btn" type="button" aria-label="ย้อนกลับ">
                <svg width="26" height="26" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>
            <button class="icon-btn" type="button" aria-label="ความเป็นส่วนตัว">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M12 3L20 6.5V12C20 17 16.6 20.2 12 21C7.4 20.2 4 17 4 12V6.5L12 3Z" stroke="currentColor"
                        stroke-width="1.8" />
                    <path d="M9.5 11H14.5V16H9.5V11Z" stroke="currentColor" stroke-width="1.8" />
                    <path d="M10.5 11V9.5C10.5 8.7 11.1 8 12 8C12.9 8 13.5 8.7 13.5 9.5V11" stroke="currentColor"
                        stroke-width="1.8" stroke-linecap="round" />
                </svg>
            </button>
        </div>

        <section class="title-wrap">
            <h1>สแกนใบหน้า</h1>
            <div class="privacy-pill">🛡️ วิเคราะห์บนอุปกรณ์ของคุณ • ไม่บันทึกรูปภาพ</div>
        </section>

        <section class="scanner" aria-label="พื้นที่สแกนใบหน้า">
            <video id="camera" autoplay playsinline muted></video>
            <div id="demoFace" class="demo-face" aria-hidden="true">
                <div class="avatar"></div>
            </div>

            <div id="placeholder" class="camera-placeholder">
                <div>
                    <div id="placeholderIcon" style="font-size:48px;margin-bottom:12px;">📷</div>
                    <strong id="placeholderTitle"
                        style="display:block;color:#ffe2a0;font-size:20px;margin-bottom:8px;">พร้อมเปิดกล้อง</strong>
                    <span id="placeholderText">กดปุ่ม “เริ่มวิเคราะห์” เพื่อขอสิทธิ์ใช้งานกล้อง</span>
                    <div id="placeholderActions" class="placeholder-actions" style="display:none;">
                        <button id="retryCameraBtn" class="mini-btn" type="button">ลองเปิดกล้องอีกครั้ง</button>
                        <button id="demoModeBtn" class="mini-btn ghost" type="button">ดูโหมดจำลอง</button>
                    </div>
                </div>
            </div>

            <div class="particles" id="particles"></div>
            <div class="hud-ring"></div>
            <div class="scan-line-x"></div>
            <div class="scan-line-y"></div>

            <div class="mesh" aria-hidden="true">
                <svg viewBox="0 0 220 280" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <linearGradient id="meshGold" x1="0" x2="1">
                            <stop offset="0" stop-color="#ff4545" />
                            <stop offset="0.55" stop-color="#ffd98a" />
                            <stop offset="1" stop-color="#ff4545" />
                        </linearGradient>
                    </defs>
                    <ellipse cx="110" cy="135" rx="80" ry="118" fill="rgba(255,210,110,0.025)" stroke="url(#meshGold)"
                        stroke-width="1.2" />
                    <path d="M110 18 L110 250 M50 110 L170 110 M45 148 L175 148 M70 70 L150 70 M72 198 L148 198"
                        stroke="url(#meshGold)" stroke-width="0.8" opacity="0.75" />
                    <path d="M56 92 L88 72 L110 84 L132 72 L164 92 L144 128 L110 118 L76 128 Z" fill="none"
                        stroke="url(#meshGold)" stroke-width="0.8" opacity="0.85" />
                    <path d="M72 150 L97 132 L110 144 L123 132 L148 150 L133 178 L110 170 L87 178 Z" fill="none"
                        stroke="url(#meshGold)" stroke-width="0.8" opacity="0.9" />
                    <path d="M74 202 L110 216 L146 202 M88 220 L110 240 L132 220" stroke="url(#meshGold)"
                        stroke-width="0.8" opacity="0.8" fill="none" />
                    <path
                        d="M52 92 L74 150 L70 205 M168 92 L146 150 L150 205 M88 72 L97 132 L87 178 L88 220 M132 72 L123 132 L133 178 L132 220"
                        stroke="url(#meshGold)" stroke-width="0.7" opacity="0.7" fill="none" />
                    <g fill="#ffd98a">
                        <circle cx="110" cy="28" r="3" />
                        <circle cx="72" cy="72" r="2.5" />
                        <circle cx="148" cy="72" r="2.5" />
                        <circle cx="75" cy="112" r="3" />
                        <circle cx="145" cy="112" r="3" />
                        <circle cx="110" cy="118" r="2.5" />
                        <circle cx="97" cy="132" r="2.4" />
                        <circle cx="123" cy="132" r="2.4" />
                        <circle cx="110" cy="148" r="3" />
                        <circle cx="87" cy="178" r="2.4" />
                        <circle cx="133" cy="178" r="2.4" />
                        <circle cx="110" cy="170" r="2.4" />
                        <circle cx="74" cy="205" r="2.5" />
                        <circle cx="146" cy="205" r="2.5" />
                        <circle cx="110" cy="240" r="3" />
                    </g>
                </svg>
            </div>

            <div class="metric m-yaw">YAW<strong>0.2°</strong><span>•••••</span></div>
            <div class="metric m-pitch">PITCH<strong>0.1°</strong><span>•••••</span></div>
            <div class="metric m-roll">ROLL<strong>0.0°</strong><span>•••••</span></div>
            <div class="metric m-distance">DISTANCE<strong>55cm</strong><span>▂▃▅▇</span></div>
            <div class="side-bars left"></div>
            <div class="side-bars right"></div>
        </section>

        <section class="status-card">
            <div class="status-item">
                <div class="status-icon">☀︎</div>
                <p>แสงเพียงพอ</p>
                <span class="check">✓</span>
            </div>
            <div class="status-item">
                <div class="status-icon">◎</div>
                <p>หน้าตรง</p>
                <span class="check">✓</span>
            </div>
            <div class="status-item">
                <div class="status-icon">▱</div>
                <p>ระยะเหมาะสม</p>
                <span class="check">✓</span>
            </div>
        </section>

        <section class="progress-card">
            <h2 id="scanText">พร้อมสแกนใบหน้า</h2>
            <div class="progress-row">
                <div class="progress-shell">
                    <div id="progressFill" class="progress-fill"></div>
                </div>
                <div id="percent" class="percent">0%</div>
            </div>
            <p id="hint" class="hint">ภาพจะไม่ถูกอัปโหลดหรือบันทึกไว้ในระบบ</p>
            <button id="startBtn" class="primary-btn" type="button">⌗ เริ่มวิเคราะห์</button>
            <button id="useDemoBtn" class="outline-btn" type="button">ดู UI ด้วยโหมดจำลอง</button>
            <button id="cancelBtn" class="secondary-btn" type="button">ยกเลิก</button>
        </section>

        <section id="debugCard" class="debug-card" aria-live="polite"></section>
    </main>

    <div id="toast" class="toast"></div>

    <script>
        const video = document.getElementById('camera');
        const placeholder = document.getElementById('placeholder');
        const placeholderIcon = document.getElementById('placeholderIcon');
        const placeholderTitle = document.getElementById('placeholderTitle');
        const placeholderText = document.getElementById('placeholderText');
        const placeholderActions = document.getElementById('placeholderActions');
        const retryCameraBtn = document.getElementById('retryCameraBtn');
        const demoModeBtn = document.getElementById('demoModeBtn');
        const demoFace = document.getElementById('demoFace');
        const startBtn = document.getElementById('startBtn');
        const useDemoBtn = document.getElementById('useDemoBtn');
        const cancelBtn = document.getElementById('cancelBtn');
        const progressFill = document.getElementById('progressFill');
        const percentText = document.getElementById('percent');
        const scanText = document.getElementById('scanText');
        const hint = document.getElementById('hint');
        const toast = document.getElementById('toast');
        const particles = document.getElementById('particles');
        const debugCard = document.getElementById('debugCard');

        let stream = null;
        let scanning = false;
        let progressTimer = null;
        let demoMode = false;

        function showToast(message) {
            toast.textContent = message;
            toast.classList.add('show');
            setTimeout(() => toast.classList.remove('show'), 3800);
        }

        function setProgress(value) {
            const safeValue = Math.max(0, Math.min(100, value));
            progressFill.style.width = safeValue + '%';
            percentText.textContent = safeValue + '%';
        }

        function isSecureCameraContext() {
            return window.isSecureContext || location.hostname === 'localhost' || location.hostname === '127.0.0.1';
        }

        function showCameraHelp(error) {
            const errorName = error?.name || 'CameraError';
            const isPermissionDenied = errorName === 'NotAllowedError' || errorName === 'PermissionDeniedError';
            const isNotFound = errorName === 'NotFoundError' || errorName === 'DevicesNotFoundError';
            const isInsecure = !isSecureCameraContext();

            placeholder.classList.remove('hidden');
            placeholder.classList.add('warning');
            placeholderActions.style.display = 'flex';
            useDemoBtn.classList.add('show');
            startBtn.textContent = '⌗ ลองเปิดกล้องอีกครั้ง';
            startBtn.disabled = false;
            scanText.textContent = 'ยังเปิดกล้องไม่ได้';
            setProgress(0);

            if (isInsecure) {
                placeholderIcon.textContent = '🔒';
                placeholderTitle.textContent = 'ต้องเปิดผ่าน HTTPS หรือ localhost';
                placeholderText.textContent = 'Browser จะอนุญาตกล้องเฉพาะเว็บ HTTPS หรือ localhost เท่านั้น';
                hint.textContent = 'ลองรันด้วย VS Code Live Server, localhost, หรือ deploy ขึ้น HTTPS';
            } else if (isPermissionDenied) {
                placeholderIcon.textContent = '🚫';
                placeholderTitle.textContent = 'กล้องถูกปฏิเสธสิทธิ์';
                placeholderText.textContent = 'กรุณากดอนุญาตกล้องใน browser แล้วลองใหม่ หรือใช้โหมดจำลองเพื่อดู UI ก่อน';
                hint.textContent = 'ถ้าเคยกด Block ให้กดไอคอนรูปกุญแจข้างช่อง URL แล้วเปลี่ยน Camera เป็น Allow';
            } else if (isNotFound) {
                placeholderIcon.textContent = '📷';
                placeholderTitle.textContent = 'ไม่พบกล้องในอุปกรณ์';
                placeholderText.textContent = 'ลองเสียบกล้อง เช็กว่าแอปอื่นไม่ได้ใช้กล้องอยู่ หรือใช้โหมดจำลอง';
                hint.textContent = 'ไม่พบอุปกรณ์กล้องสำหรับ browser นี้';
            } else {
                placeholderIcon.textContent = '⚠️';
                placeholderTitle.textContent = 'เปิดกล้องไม่สำเร็จ';
                placeholderText.textContent = 'อาจเกิดจาก browser, sandbox, permission หรือกล้องถูกใช้งานอยู่';
                hint.textContent = 'ลอง refresh หน้า หรือเปิดใน Chrome/Safari ผ่าน HTTPS/localhost';
            }

            debugCard.classList.add('show');
            debugCard.innerHTML = `
        <strong>Camera debug</strong><br />
        Error: ${escapeHTML(errorName)}${error?.message ? ' — ' + escapeHTML(error.message) : ''}
        <ul>
          <li>ต้องใช้ HTTPS หรือ localhost</li>
          <li>ต้องกด Allow ตอน browser ขอสิทธิ์กล้อง</li>
          <li>ถ้ารันใน iframe/sandbox บางที่อาจเปิดกล้องไม่ได้</li>
          <li>โหมดจำลองช่วยให้ดู UI ได้โดยไม่ใช้กล้อง</li>
        </ul>
      `;
        }

        function escapeHTML(value) {
            return String(value)
                .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;')
                .replace(/'/g, '&#039;');
        }

        async function openCamera() {
            demoMode = false;
            demoFace.classList.remove('active');
            useDemoBtn.classList.remove('show');
            debugCard.classList.remove('show');

            if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
                const error = new Error('navigator.mediaDevices.getUserMedia is not available');
                error.name = 'NotSupportedError';
                showCameraHelp(error);
                return false;
            }

            if (!isSecureCameraContext()) {
                const error = new Error('Camera requires HTTPS or localhost');
                error.name = 'InsecureContextError';
                showCameraHelp(error);
                return false;
            }

            try {
                stream = await navigator.mediaDevices.getUserMedia({
                    video: {
                        facingMode: 'user',
                        width: { ideal: 1280 },
                        height: { ideal: 720 }
                    },
                    audio: false
                });

                video.srcObject = stream;
                await video.play().catch(() => { });
                placeholder.classList.add('hidden');
                placeholder.classList.remove('warning');
                placeholderActions.style.display = 'none';
                return true;
            } catch (error) {
                console.error('Camera open failed:', error);
                showCameraHelp(error);
                return false;
            }
        }

        function stopCamera() {
            if (stream) {
                stream.getTracks().forEach(track => track.stop());
                stream = null;
            }
            video.srcObject = null;
        }

        function activateDemoMode() {
            stopCamera();
            demoMode = true;
            demoFace.classList.add('active');
            placeholder.classList.add('hidden');
            placeholder.classList.remove('warning');
            placeholderActions.style.display = 'none';
            useDemoBtn.classList.remove('show');
            debugCard.classList.add('show');
            debugCard.innerHTML = `
        <strong>Demo mode active</strong><br />
        โหมดนี้ไม่ใช้กล้องจริง ใช้สำหรับดู UI และ test animation เท่านั้น
      `;
            showToast('เปิดโหมดจำลองแล้ว: UI ทำงานได้โดยไม่ต้องใช้กล้อง');
        }

        async function startScan() {
            if (scanning) return;

            const cameraReady = stream || demoMode ? true : await openCamera();
            if (!cameraReady) return;

            scanning = true;
            startBtn.disabled = true;
            useDemoBtn.disabled = true;
            scanText.textContent = 'กำลังสแกนใบหน้า...';
            hint.textContent = demoMode
                ? 'โหมดจำลอง: ใช้ทดสอบหน้าจอโดยไม่เปิดกล้อง'
                : 'กรุณาอย่าขยับศีรษะ และมองตรงไปที่กล้อง';
            setProgress(0);

            let value = 0;
            progressTimer = setInterval(() => {
                value += Math.floor(Math.random() * 9) + 5;
                if (value >= 100) value = 100;
                setProgress(value);

                if (value >= 100) {
                    clearInterval(progressTimer);
                    progressTimer = null;
                    scanning = false;
                    startBtn.disabled = false;
                    useDemoBtn.disabled = false;
                    scanText.textContent = 'สแกนสำเร็จ';
                    hint.textContent = demoMode
                        ? 'โหมดจำลองเสร็จแล้ว: พร้อมต่อ MediaPipe Face Mesh จริงในขั้นต่อไป'
                        : 'เวอร์ชันนี้เป็น UI Demo: ยังไม่ส่งรูปขึ้นเซิร์ฟเวอร์ และยังไม่บันทึกภาพ';
                    startBtn.textContent = '⌗ วิเคราะห์อีกครั้ง';
                    showToast('สแกนเสร็จแล้ว: ขั้นต่อไปค่อยต่อ Face Mesh จริงด้วย MediaPipe');
                }
            }, 230);
        }

        function cancelScan() {
            if (progressTimer) clearInterval(progressTimer);
            progressTimer = null;
            scanning = false;
            demoMode = false;
            startBtn.disabled = false;
            useDemoBtn.disabled = false;
            startBtn.textContent = '⌗ เริ่มวิเคราะห์';
            useDemoBtn.classList.remove('show');
            setProgress(0);
            scanText.textContent = 'พร้อมสแกนใบหน้า';
            hint.textContent = 'ภาพจะไม่ถูกอัปโหลดหรือบันทึกไว้ในระบบ';
            placeholderIcon.textContent = '📷';
            placeholderTitle.textContent = 'พร้อมเปิดกล้อง';
            placeholderText.textContent = 'กดปุ่ม “เริ่มวิเคราะห์” เพื่อขอสิทธิ์ใช้งานกล้อง';
            placeholderActions.style.display = 'none';
            placeholder.classList.remove('warning');
            placeholder.classList.remove('hidden');
            demoFace.classList.remove('active');
            debugCard.classList.remove('show');
            stopCamera();
        }

        function createParticles() {
            for (let i = 0; i < 42; i++) {
                const p = document.createElement('span');
                p.className = 'particle';
                p.style.left = Math.random() * 100 + '%';
                p.style.top = 30 + Math.random() * 70 + '%';
                p.style.animationDelay = Math.random() * 4 + 's';
                p.style.animationDuration = 3 + Math.random() * 4 + 's';
                p.style.opacity = 0.25 + Math.random() * 0.65;
                particles.appendChild(p);
            }
        }

        function runSmokeTests() {
            const tests = [
                ['start button exists', Boolean(startBtn)],
                ['progress fill exists', Boolean(progressFill)],
                ['camera API object is checked safely', typeof openCamera === 'function'],
                ['secure-context check returns boolean', typeof isSecureCameraContext() === 'boolean'],
                ['demo mode function exists', typeof activateDemoMode === 'function'],
                ['permission handler exists', typeof showCameraHelp === 'function']
            ];

            const failed = tests.filter(([, ok]) => !ok);
            if (failed.length) {
                console.warn('Smoke tests failed:', failed.map(([name]) => name));
            } else {
                console.log('Smoke tests passed:', tests.map(([name]) => name));
            }
        }

        startBtn.addEventListener('click', startScan);
        cancelBtn.addEventListener('click', cancelScan);
        retryCameraBtn.addEventListener('click', openCamera);
        demoModeBtn.addEventListener('click', activateDemoMode);
        useDemoBtn.addEventListener('click', () => {
            activateDemoMode();
            startScan();
        });
        window.addEventListener('beforeunload', stopCamera);

        createParticles();
        runSmokeTests();
    </script>
</body>

</html>
