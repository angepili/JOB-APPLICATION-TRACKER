const BASE_URL = import.meta.env.VITE_BASE_URL;

export async function login({email, password}) {
    const resp = await fetch(`${BASE_URL}/api/login`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({email,password})
    });

    const data = await resp.json();
    
    if (!resp.ok) {
        // Gestione specifica per errore 400 o "invalid credentials"
        if (resp.status === 400 || data.message?.toLowerCase().includes('invalid credentials')) {
            throw new Error('Credenziali non valide. Verifica email e password.');
        }
        // Per altri errori
        throw new Error(data.message || 'Errore durante il login');
    }

    return data;
}