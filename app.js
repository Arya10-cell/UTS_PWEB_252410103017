
document.addEventListener('click', (e) => {
    if (!e.target.closest('[data-theme-toggle]')) return;
    const isDark = document.documentElement.classList.toggle('dark');
    localStorage.setItem('theme', isDark ? 'dark' : 'light');
});


function toast(message, type = 'success') {
    const root = document.getElementById('toast-root');
    if (!root) return;

    const el = document.createElement('div');
    const color = type === 'error' ? 'bg-rose-500' : 'bg-emerald-500';
    el.className = `animate-toast flex items-center gap-2 rounded-xl ${color} px-4 py-3 text-sm font-medium text-white shadow-lg transition duration-300`;
    el.textContent = message;
    root.appendChild(el);

    setTimeout(() => {
        el.classList.add('opacity-0', 'translate-x-4');
        setTimeout(() => el.remove(), 300);
    }, 2800);
}
window.toast = toast;


const loginForm = document.getElementById('login-form');

if (loginForm) {
    const validators = {
        email: (v) => (/^\S+@\S+\.\S+$/.test(v) ? '' : 'Format email tidak valid'),
        password: (v) => (v.length >= 6 ? '' : 'Password minimal 6 karakter'),
    };

    const showError = (name, msg) => {
        const input = loginForm.elements[name];
        const p = loginForm.querySelector(`[data-error-for="${name}"]`);
        input.classList.toggle('border-rose-500', !!msg);
        input.classList.toggle('ring-rose-500/30', !!msg);
        p.textContent = msg;
        p.classList.toggle('hidden', !msg);
    };

    Object.keys(validators).forEach((name) => {
        loginForm.elements[name].addEventListener('input', (e) => {
            showError(name, validators[name](e.target.value));
        });
    });

    const pwToggle = document.querySelector('[data-toggle-password]');
    pwToggle?.addEventListener('click', () => {
        const pw = loginForm.elements.password;
        pw.type = pw.type === 'password' ? 'text' : 'password';
        pwToggle.textContent = pw.type === 'password' ? 'Tampilkan' : 'Sembunyikan';
    });

    loginForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        let valid = true;
        Object.keys(validators).forEach((name) => {
            const msg = validators[name](loginForm.elements[name].value);
            showError(name, msg);
            if (msg) valid = false;
        });

        if (!valid) {
            toast('Periksa kembali isian kamu', 'error');
            return;
        }

        const btn = loginForm.querySelector('button[type="submit"]');
        btn.disabled = true;
        btn.querySelector('[data-label]').textContent = 'Memproses...';
        btn.querySelector('[data-spinner]').classList.remove('hidden');

        await new Promise((r) => setTimeout(r, 1000));

        toast('Berhasil masuk! Mengalihkan...');
        setTimeout(() => (window.location.href = loginForm.dataset.redirect), 800);
    });
}

const todoApp = document.getElementById('todo-app');

if (todoApp) {
    const KEY = 'todos';
    let todos = JSON.parse(localStorage.getItem(KEY) ?? '[]');

    const list = todoApp.querySelector('[data-todo-list]');
    const form = todoApp.querySelector('form');
    const input = form.querySelector('input');
    const save = () => localStorage.setItem(KEY, JSON.stringify(todos));

    const render = () => {
        list.innerHTML = '';

        if (todos.length === 0) {
            list.innerHTML = '<li class="py-8 text-center text-sm text-slate-400">Belum ada tugas. Tambahkan yang pertama!</li>';
        }

        todos.forEach((t) => {
            const li = document.createElement('li');
            li.className = 'animate-toast group flex items-center gap-3 rounded-xl border border-slate-100 bg-slate-50/60 p-3 transition hover:shadow-md dark:border-slate-800 dark:bg-slate-800/50';

            li.innerHTML = `
                <button type="button" data-toggle class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full border-2 text-xs transition
                    ${t.done ? 'border-emerald-500 bg-emerald-500 text-white' : 'border-slate-300 dark:border-slate-600'}">
                    ${t.done ? '✓' : ''}
                </button>
                <span class="flex-1 text-sm ${t.done ? 'line-through text-slate-400' : ''}"></span>
                <button type="button" data-delete class="text-sm text-rose-500 opacity-0 transition group-hover:opacity-100">Hapus</button>
            `;

            li.querySelector('span').textContent = t.text;

            li.querySelector('[data-toggle]').onclick = () => {
                t.done = !t.done;
                save();
                render();
            };

            li.querySelector('[data-delete]').onclick = () => {
                todos = todos.filter((x) => x !== t);
                save();
                render();
                toast('Tugas dihapus');
            };

            list.appendChild(li);
        });

        const done = todos.filter((t) => t.done).length;
        document.querySelector('[data-stat="total"]').textContent = todos.length;
        document.querySelector('[data-stat="done"]').textContent = done;
        document.querySelector('[data-stat="pending"]').textContent = todos.length - done;
        document.querySelector('[data-progress]').style.width = todos.length ? `${(done / todos.length) * 100}%` : '0%';
    };

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        const text = input.value.trim();
        if (!text) {
            toast('Tulis tugas dulu', 'error');
            return;
        }
        todos.unshift({ text, done: false });
        input.value = '';
        save();
        render();
        toast('Tugas ditambahkan');
    });

    render();
}