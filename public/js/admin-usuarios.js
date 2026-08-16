function getCsrf() {
    const m = document.querySelector('meta[name="csrf-token"]');
    return m ? m.content : '';
}

const emailValidation = (email) => {
    const regex = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/i;
    return regex.test(email);
}

// Remove todos os caracteres não numéricos (mantemos apenas dígitos)
function onlyDigits(value) {
    return (value || '').toString().replace(/\D/g, '');
}

function getUserIdentifier(u) {
    const tipo = (u.atribuicao || '').toLowerCase();
    if (tipo === 'aluno') {
        return u.matricula ? `Matrícula: ${u.matricula}` : 'Matrícula: —';
    }
    if (tipo === 'orientador') {
        return u.siape ? `SIAPE: ${u.siape}` : 'SIAPE: —';
    }
    if (tipo === 'supervisor') {
        // Supervisores não utilizam SIAPE no sistema
        return u.matricula ? `Matrícula: ${u.matricula}` : '—';
    }
    return '—';
}

// Render list on index
async function fetchAndRenderUsers() {
    const tbody = document.getElementById('usuarios-tbody');
    if (!tbody) return;
    tbody.innerHTML = '<tr><td colspan="7" class="p-4">Carregando...</td></tr>';

    const filtroTipo = document.getElementById('filtro-tipo');
    const busca = document.getElementById('busca-usuarios');
    const tipoValue = filtroTipo ? filtroTipo.value : '';
    const buscaValue = busca ? busca.value.trim() : '';

    const params = new URLSearchParams();
    if (buscaValue) params.set('q', buscaValue);
    if (tipoValue) params.set('tipo', tipoValue);

    const res = await fetch('/admin/api/usuarios' + (params.toString() ? `?${params.toString()}` : ''));
    const list = await res.json();
    if (!Array.isArray(list) || list.length === 0) {
        tbody.innerHTML = '<tr><td colspan="7" class="p-4">Nenhum usuário encontrado</td></tr>';
        return;
    }
    tbody.innerHTML = '';
    list.forEach(u => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td class="px-6 py-4">${u.user_ID}</td>
            <td class="px-6 py-4">${u.Nome || ''}</td>
            <td class="px-6 py-4">${u.Email || ''}</td>
            <td class="px-6 py-4">${u.cpf || ''}</td>
            <td class="px-6 py-4">${getUserIdentifier(u)}</td>
            <td class="px-6 py-4">${u.atribuicao || ''}</td>
            <td class="px-6 py-4 text-right">
                <a href="/admin/usuarios/${u.user_ID}/edit" class="text-primary mr-3">Editar</a>
                <button data-id="${u.user_ID}" class="text-red-600 hover:underline btn-delete">Excluir</button>
            </td>
        `;
        tbody.appendChild(tr);
    });

    document.querySelectorAll('.btn-delete').forEach(btn => {
        btn.addEventListener('click', async (e) => {
            const id = e.currentTarget.getAttribute('data-id');
            if (!confirm('Confirmar exclusão?')) return;
            await fetch(`/admin/api/usuarios/${id}`, {
                method: 'DELETE',
                headers: { 'X-CSRF-TOKEN': getCsrf() }
            });
            fetchAndRenderUsers();
        });
    });
}

// Handle form submit for create/edit
async function handleUsuarioForm() {
    const form = document.getElementById('usuario-form');
    if (!form) return;
    const userId = form.getAttribute('data-user-id');
    const nome = document.getElementById('nome');
    const email = document.getElementById('email');
    const senha = document.getElementById('senha');
    const cpf = document.getElementById('cpf');
    const tipo = document.getElementById('tipo');
    const siapeField = document.getElementById('siape');
    const matriculaField = document.getElementById('matricula');

    // CPF: permitir digitar somente números (no frontend) — backend formata ao salvar
    if (cpf) {
        cpf.addEventListener('input', (e) => { e.target.value = onlyDigits(e.target.value).slice(0,11); });
    }
    if (siapeField) {
        siapeField.addEventListener('input', (e) => { e.target.value = onlyDigits(e.target.value).slice(0,8); });
    }

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        if (!emailValidation(email.value)) return alert('Email inválido');

        const tipoSelecionado = tipo ? tipo.value : '';
        if (tipoSelecionado === 'administrador') {
            alert('O administrador já possui login base no banco de dados. Não é possível criar outro administrador no cadastro.');
            return;
        }

        const cpfDigits = cpf ? onlyDigits(cpf.value) : '';
        if (cpf && cpfDigits.length !== 11) return alert('CPF deve conter 11 dígitos');

        const siapeDigits = siapeField ? onlyDigits(siapeField.value) : '';
        if (tipoSelecionado === 'orientador' && siapeDigits.length !== 8) return alert('SIAPE deve conter 8 dígitos');

        const payload = {
            nome: nome.value,
            email: email.value,
            senha: senha ? senha.value : undefined,
            cpf: cpf ? cpfDigits : undefined,
            tipo: tipoSelecionado,
            matricula: matriculaField ? matriculaField.value || undefined : undefined,
            siape: siapeField ? siapeDigits || undefined : undefined,
        };

        const url = userId ? `/admin/api/usuarios/${userId}` : '/admin/api/usuarios';
        const method = userId ? 'PUT' : 'POST';

        const res = await fetch(url, {
            method,
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': getCsrf()
            },
            body: JSON.stringify(payload)
        });

        if (res.ok) {
            window.location.href = '/admin/usuarios';
        } else {
            const err = await res.json().catch(()=>({}));
            alert(err.message || 'Erro ao salvar');
        }
    });

    // If edit page, load user
    if (userId) {
        const res = await fetch(`/admin/api/usuarios/${userId}`);
        if (res.ok) {
            const u = await res.json();
            nome.value = u.Nome || '';
            email.value = u.Email || '';
            cpf.value = onlyDigits(u.cpf || '');
            tipo.value = u.atribuicao || '';
            if (matriculaField) matriculaField.value = u.matricula || '';
            if (siapeField) siapeField.value = onlyDigits(u.siape || '');
        }
    }
}

// Inicialização automática conforme a página
document.addEventListener('DOMContentLoaded', () => {
    const filtroTipo = document.getElementById('filtro-tipo');
    const busca = document.getElementById('busca-usuarios');

    if (filtroTipo) {
        filtroTipo.addEventListener('change', fetchAndRenderUsers);
    }
    if (busca) {
        busca.addEventListener('input', fetchAndRenderUsers);
    }

    fetchAndRenderUsers();
    handleUsuarioForm();
});
