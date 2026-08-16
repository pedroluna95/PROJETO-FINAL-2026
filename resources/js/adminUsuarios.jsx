import React, { useEffect, useState } from 'react'
import { createRoot } from 'react-dom/client'

function AdminUsuarios(){
  const [users, setUsers] = useState([])
  const [loading, setLoading] = useState(true)
  const [search, setSearch] = useState('')
  const [modalOpen, setModalOpen] = useState(false)
  const [editing, setEditing] = useState(null)
  const [form, setForm] = useState({ nome:'', email:'', cpf:'', tipo:'aluno', senha:'', matricula:'', siape:'' })

  async function load(q=''){
    setLoading(true)
    const url = '/admin/api/usuarios' + (q ? ('?q=' + encodeURIComponent(q)) : '')
    const res = await fetch(url)
    const data = await res.json()
    setUsers(data)
    setLoading(false)
  }

  useEffect(()=>{ load() }, [])

  function openCreate(){ setEditing(null); setForm({ nome:'', email:'', cpf:'', tipo:'aluno', senha:'', matricula:'', siape:'' }); setModalOpen(true) }
  function openEdit(u){ setEditing(u.user_ID); setForm({ nome:u.Nome, email:u.Email, cpf:u.cpf || '', tipo:u.atribuicao || 'aluno', senha:'', matricula: u.matricula || '', siape: u.siape || '' }); setModalOpen(true) }

  async function save(){
    const cpfDigits = (form.cpf || '').toString().replace(/\D/g,'');
    if (cpfDigits && cpfDigits.length !== 11) { alert('CPF deve conter 11 dígitos'); return }
    if (form.tipo === 'orientador') {
      const s = (form.siape || '').toString().replace(/\D/g,'');
      if (s.length !== 8) { alert('SIAPE deve conter 8 dígitos'); return }
    }

    const payload = { nome: form.nome, email: form.email, cpf: cpfDigits, tipo: form.tipo, matricula: form.matricula || undefined, siape: form.siape || undefined }
    const headers = { 'Content-Type':'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') }
    let res
    if (editing){
      res = await fetch('/admin/api/usuarios/' + editing, { method: 'PUT', headers, body: JSON.stringify(payload) })
    } else {
      if (!form.senha){ alert('Senha é obrigatória ao criar'); return }
      payload.senha = form.senha
      res = await fetch('/admin/api/usuarios', { method: 'POST', headers, body: JSON.stringify(payload) })
    }
    if (res.ok){ setModalOpen(false); load(search) } else { alert('Erro ao salvar') }
  }

  async function destroy(id){ if (!confirm('Confirma exclusão?')) return; const res = await fetch('/admin/api/usuarios/' + id, { method: 'DELETE', headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') } }); if (res.ok) load(search); else alert('Erro ao excluir') }

  return (
    <div>
      <div className="flex items-center justify-between mb-6">
        <h1 className="text-2xl font-bold">Gerenciar Usuários</h1>
        <div>
          <button onClick={openCreate} className="bg-[#0077fc] text-white px-4 py-2 rounded">Novo</button>
        </div>
      </div>

      <div className="mb-4 flex gap-2">
        <input value={search} onChange={e=>setSearch(e.target.value)} placeholder="Pesquisar nome, email, cpf, atribuição" className="flex-1 px-3 py-2 border rounded" />
        <button onClick={()=>load(search)} className="px-3 py-2 border rounded">Buscar</button>
      </div>

      <div className="bg-white border rounded shadow-sm overflow-auto">
        <table className="w-full text-sm">
          <thead>
            <tr className="bg-gray-50 border-b">
              <th className="px-3 py-2 text-left">ID</th>
              <th className="px-3 py-2 text-left">Nome</th>
              <th className="px-3 py-2 text-left">Email</th>
              <th className="px-3 py-2 text-left">CPF</th>
              <th className="px-3 py-2 text-left">Atribuição</th>
              <th className="px-3 py-2">Ações</th>
            </tr>
          </thead>
          <tbody>
            {loading ? (
              <tr><td colSpan={6} className="p-6 text-center">Carregando...</td></tr>
            ) : users.length === 0 ? (
              <tr><td colSpan={6} className="p-6 text-center">Nenhum usuário</td></tr>
            ) : users.map(u => (
              <tr key={u.user_ID} className="hover:bg-gray-50">
                <td className="px-3 py-2">{u.user_ID}</td>
                <td className="px-3 py-2">{u.Nome}</td>
                <td className="px-3 py-2">{u.Email}</td>
                <td className="px-3 py-2">{u.cpf || ''}</td>
                <td className="px-3 py-2">{u.atribuicao || ''}</td>
                <td className="px-3 py-2 text-center">
                  <button onClick={()=>openEdit(u)} className="mr-2 text-blue-600">Editar</button>
                  <button onClick={()=>destroy(u.user_ID)} className="text-red-600">Excluir</button>
                </td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>

      {modalOpen && (
        <div className="fixed inset-0 bg-black/40 flex items-center justify-center z-50 p-4">
          <div className="bg-white rounded-xl shadow-lg w-full max-w-lg p-6">
            <h2 className="text-lg font-semibold mb-4">{editing ? 'Editar' : 'Criar'} Usuário</h2>
            <div className="space-y-3">
              <div>
                <label className="block text-sm">Nome</label>
                <input value={form.nome} onChange={e=>setForm({...form, nome:e.target.value})} className="w-full px-3 py-2 border rounded" />
              </div>
              <div>
                <label className="block text-sm">Email</label>
                <input value={form.email} onChange={e=>setForm({...form, email:e.target.value})} className="w-full px-3 py-2 border rounded" />
              </div>
                <div>
                  <label className="block text-sm">CPF</label>
                  <input inputMode="numeric" maxLength={11} value={form.cpf} onChange={e=>setForm({...form, cpf:e.target.value.replace(/\D/g,'')})} className="w-full px-3 py-2 border rounded" />
                </div>
                <div>
                  <label className="block text-sm">Tipo</label>
                  <select value={form.tipo} onChange={e=>setForm({...form, tipo:e.target.value})} className="w-full px-3 py-2 border rounded">
                    <option value="aluno">Aluno</option>
                    <option value="supervisor">Supervisor</option>
                    <option value="orientador">Orientador</option>
                    <option value="contratante">Contratante</option>
                  </select>
                </div>
                { (form.tipo === 'aluno' || form.tipo === 'supervisor') && (
                  <div>
                    <label className="block text-sm">Matrícula</label>
                    <input value={form.matricula} onChange={e=>setForm({...form, matricula:e.target.value})} className="w-full px-3 py-2 border rounded" />
                  </div>
                ) }
                { form.tipo === 'orientador' && (
                  <div>
                    <label className="block text-sm">SIAPE</label>
                    <input inputMode="numeric" maxLength={8} value={form.siape} onChange={e=>setForm({...form, siape:e.target.value.replace(/\D/g,'')})} className="w-full px-3 py-2 border rounded" />
                  </div>
                )}
              {!editing && (
                <div>
                  <label className="block text-sm">Senha</label>
                  <input value={form.senha} onChange={e=>setForm({...form, senha:e.target.value})} className="w-full px-3 py-2 border rounded" />
                </div>
              )}
            </div>
            <div className="mt-4 flex gap-2 justify-end">
              <button onClick={()=>setModalOpen(false)} className="px-3 py-2 border rounded">Cancelar</button>
              <button onClick={save} className="px-3 py-2 bg-[#0077fc] text-white rounded">Salvar</button>
            </div>
          </div>
        </div>
      )}
    </div>
  )
}

const el = document.getElementById('admin-root')
if (el) createRoot(el).render(React.createElement(AdminUsuarios))

export default AdminUsuarios
