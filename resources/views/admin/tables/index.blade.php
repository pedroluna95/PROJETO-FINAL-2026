@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container mx-auto p-6">
    <h1 class="mb-4 text-2xl font-semibold">Visualizador de tabelas autorizadas</h1>
    <div id="tables-status" class="mb-4 text-sm text-gray-600">Carregando tabelas...</div>
    <div id="tables-list" class="space-y-4"></div>
</div>
<script>
(async () => {
    const status = document.getElementById('tables-status');
    const list = document.getElementById('tables-list');
    try {
        const response = await fetch('/admin/api/tables', {credentials: 'same-origin'});
        if (!response.ok) throw new Error('Não foi possível carregar as tabelas.');
        const tables = await response.json();
        list.innerHTML = tables.map(table => `<button class="mr-2 rounded bg-blue-600 px-3 py-2 text-white" data-table="${table}">${table}</button>`).join('');
        status.textContent = 'Selecione uma tabela autorizada.';
        list.querySelectorAll('[data-table]').forEach(button => button.addEventListener('click', async () => {
            const res = await fetch('/admin/api/tables/' + encodeURIComponent(button.dataset.table));
            const rows = await res.json();
            const pre = document.createElement('pre');
            pre.className = 'mt-4 overflow-auto rounded bg-gray-100 p-4 text-sm';
            pre.textContent = JSON.stringify(rows, null, 2);
            list.appendChild(pre);
        }));
    } catch (error) { status.textContent = error.message; }
})();
</script>
@endsection
