<style>
    :root {
        --rp-surface: #ffffff;
        --rp-ink: #1a2332;
        --rp-muted: #5b6b7c;
        --rp-line: #d8dee6;
        --rp-accent: #0f6b5c;
        --rp-accent-soft: #e6f4f1;
        --rp-danger: #b42318;
        --rp-danger-soft: #fef3f2;
        --rp-radius: 12px;
        --rp-shadow: 0 1px 2px rgba(26, 35, 50, 0.06), 0 8px 24px rgba(26, 35, 50, 0.04);
    }
    .rp-card {
        background: var(--rp-surface);
        border: 1px solid var(--rp-line);
        border-radius: var(--rp-radius);
        box-shadow: var(--rp-shadow);
        overflow: hidden;
    }
    .rp-card-head {
        display: flex; align-items: center; justify-content: space-between;
        gap: 12px; padding: 18px 20px; border-bottom: 1px solid var(--rp-line);
        flex-wrap: wrap;
    }
    .rp-card-head h1 { margin: 0; font-size: 1.1rem; }
    .rp-card-body { padding: 20px; }
    .rp-btn {
        display: inline-flex; align-items: center; justify-content: center;
        gap: 6px; border: 1px solid transparent; border-radius: 10px;
        padding: 9px 14px; font: inherit; font-weight: 600; cursor: pointer;
        text-decoration: none; line-height: 1.2;
    }
    .rp-btn:hover { text-decoration: none; filter: brightness(0.97); }
    .rp-btn-primary { background: var(--rp-accent); color: #fff; }
    .rp-btn-secondary { background: #fff; color: var(--rp-ink); border-color: var(--rp-line); }
    .rp-btn-danger { background: var(--rp-danger-soft); color: var(--rp-danger); border-color: #f5c2c0; }
    .rp-btn-sm { padding: 6px 10px; font-size: 0.85rem; border-radius: 8px; }
    table.rp-table { width: 100%; border-collapse: collapse; }
    .rp-table th, .rp-table td {
        text-align: right; padding: 12px 14px; border-bottom: 1px solid var(--rp-line);
        vertical-align: middle;
    }
    .rp-table th { font-size: 0.78rem; text-transform: uppercase; letter-spacing: 0.04em; color: var(--rp-muted); }
    .rp-table tr:last-child td { border-bottom: 0; }
    .rp-actions { display: flex; gap: 8px; flex-wrap: wrap; }
    .rp-field { margin-bottom: 18px; }
    .rp-field label { display: block; font-weight: 600; margin-bottom: 6px; }
    .rp-field input[type="text"], .rp-field input[type="search"] {
        width: 100%; max-width: 420px; padding: 10px 12px;
        border: 1px solid var(--rp-line); border-radius: 10px; font: inherit;
        background: #fff;
    }
    .rp-group { margin-bottom: 18px; border: 1px solid var(--rp-line); border-radius: 12px; overflow: hidden; }
    .rp-group-title {
        padding: 10px 14px; background: #f7f9fb; font-weight: 700; font-size: 0.92rem;
        border-bottom: 1px solid var(--rp-line);
    }
    .rp-ability {
        display: grid; grid-template-columns: minmax(160px, 1.2fr) repeat(3, minmax(90px, 1fr));
        gap: 8px; align-items: center; padding: 12px 14px; border-bottom: 1px solid var(--rp-line);
    }
    .rp-ability:last-child { border-bottom: 0; }
    .rp-ability-code { color: var(--rp-muted); font-size: 0.82rem; display: block; margin-top: 2px; }
    .rp-choice {
        display: flex; align-items: center; justify-content: center; gap: 6px;
        padding: 8px; border-radius: 8px; border: 1px solid var(--rp-line); cursor: pointer;
        background: #fff; font-size: 0.85rem;
    }
    .rp-choice:has(input:checked) {
        border-color: var(--rp-accent); background: var(--rp-accent-soft); color: var(--rp-accent); font-weight: 600;
    }
    .rp-chip {
        display: inline-flex; padding: 3px 8px; border-radius: 999px;
        background: #eef2f6; color: var(--rp-muted); font-size: 0.8rem; margin: 2px;
    }
    .rp-empty { padding: 28px; text-align: center; color: var(--rp-muted); }
    .rp-footer-actions { display: flex; gap: 10px; flex-wrap: wrap; margin-top: 8px; }
    .rp-search { display: flex; gap: 8px; flex-wrap: wrap; align-items: center; }
    @media (max-width: 720px) {
        .rp-ability { grid-template-columns: 1fr; gap: 10px; }
        .rp-choice { justify-content: flex-start; }
    }
</style>
