document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('contactForm');
    const charCount = document.getElementById('charCount');
    const mensagem = document.getElementById('mensagem');
    const telefone = document.getElementById('telefone');
    const submitBtn = document.getElementById('submitBtn');
    const MAX_CHARS = 500;

    if (!form || !charCount || !mensagem || !telefone || !submitBtn) return;

    mensagem.addEventListener('input', () => {
        let len = mensagem.value.length;
        if (len > MAX_CHARS) {
            mensagem.value = mensagem.value.slice(0, MAX_CHARS);
            len = MAX_CHARS;
        }

        charCount.textContent = `${len} / ${MAX_CHARS}`;
        charCount.classList.toggle('near-limit', len >= 400 && len < MAX_CHARS);
        charCount.classList.toggle('at-limit', len >= MAX_CHARS);
        setFieldState(mensagem, rules.mensagem(mensagem.value));
    });

    telefone.addEventListener('input', () => {
        let v = telefone.value.replace(/\D/g, '');
        if (v.length > 11) v = v.slice(0, 11);
        if (v.length > 10) v = v.replace(/^(\d{2})(\d{5})(\d{4})$/, '($1) $2-$3');
        else if (v.length > 6) v = v.replace(/^(\d{2})(\d{4})(\d+)$/, '($1) $2-$3');
        else if (v.length > 2) v = v.replace(/^(\d{2})(\d+)$/, '($1) $2');
        telefone.value = v;
    });

    const rules = {
        nome: v => !v.trim() ? 'Nome é obrigatório.' : v.trim().length < 3 ? 'Digite ao menos 3 caracteres.' : '',
        email: v => !v.trim() ? 'E-mail é obrigatório.' : !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v.trim()) ? 'Informe um e-mail válido.' : '',
        assunto: v => !v ? 'Selecione um assunto.' : '',
        mensagem: v => !v.trim() ? 'Mensagem é obrigatória.' : v.trim().length < 10 ? 'Mínimo de 10 caracteres.' : '',
        aceite: c => !c ? 'Aceite a Política de Privacidade.' : ''
    };

    function setFieldState(el, msg) {
        const errEl = document.getElementById(`erro-${el.id}`);
        el.classList.toggle('is-error', !!msg);
        el.classList.toggle('is-valid', !msg && el.value.trim() !== '');
        if (errEl) errEl.textContent = msg;
        return !msg;
    }

    ['nome', 'email', 'assunto', 'mensagem'].forEach(id => {
        const el = document.getElementById(id);
        if (!el) return;
        el.addEventListener('blur', () => {
            const msg = rules[id] ? rules[id](el.value) : '';
            setFieldState(el, msg);
        });
    });

    function validateAll() {
        let ok = true;
        [['nome', 'nome'], ['email', 'email'], ['assunto', 'assunto'], ['mensagem', 'mensagem']].forEach(([id, rule]) => {
            const el = document.getElementById(id);
            const msg = rules[rule](el.value);
            if (!setFieldState(el, msg)) ok = false;
        });

        const aceiteEl = document.getElementById('aceite');
        const aceiteMsg = rules.aceite(aceiteEl.checked);
        const aceiteErr = document.getElementById('erro-aceite');
        if (aceiteMsg) {
            if (aceiteErr) aceiteErr.textContent = aceiteMsg;
            ok = false;
        } else if (aceiteErr) {
            aceiteErr.textContent = '';
        }

        return ok;
    }

    form.addEventListener('submit', e => {
        const mensagemValida = rules.mensagem(mensagem.value);
        setFieldState(mensagem, mensagemValida);

        if (!validateAll()) {
            e.preventDefault();
            const firstError = form.querySelector('.is-error');
            if (firstError) firstError.focus();
            return;
        }

        submitBtn.disabled = true;
        submitBtn.classList.add('loading');
    });
});
